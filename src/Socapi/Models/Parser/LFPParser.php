<?php

namespace Socapi\Models\Parser;

class LFPParser
{
    const
        ROOT_URL_PATTERN = 'http://www.lfp.fr/ligue1/competitionPluginCalendrierResultat/changeCalendrierJournee?sai=%d&jour=%d',
        DELAYED = -2,
        PARSE_ERROR = -42;
    
    private
        $season;
    
    public function __construct($season)
    {
        $this->season = $season;
    }
    
    private function computeUrl($day)
    {
        return sprintf(self::ROOT_URL_PATTERN, $this->season, $day);
    }
    
    public function parse($day)
    {
        $url = $this->computeUrl($day);
        $html = file_get_contents($url);
        
        // file_put_contents("cache/html/$day.html", $html);
        
        $matches = $this->extractMatchesUrls($html);
        $results = $this->processMatches($matches);

        return $results;
    }
    
    private function getRegexPatterns()
    {
        $patterns = array(
            'home' => '~<td class="domicile">.*<a href="/club/.*">(?<home>.*)</a>.*</td>.*<td class="logo">~Us',
            'away' => '~<td class="exterieur">.*<a href="/club/.*">(?<away>.*)</a>.*</td>.*<td class="video">~Us',
            'link' => '~<td class="stats">.*(?<link><img src="/images/picto_stats.png"|<a href="/ligue1/feuille_match/\d+".*>.*</a>).*</td>~Us'
        );
        
        return $patterns;
    }
    
    private function extractMatchesUrls($html)
    {
        $result = array();
        $patterns = $this->getRegexPatterns();
        
        foreach($patterns as $key => $pattern)
        {
            if(preg_match_all($pattern, $html, $matches))
            {
                $result[$key] = array_map('trim', $matches[$key]);
            }
        }
        
        $result['link'] = array_map(array($this, function(){
            
            if($link === '<img src="/images/picto_stats.png"')
            {
                return self::DELAYED;
            }
            
            if(preg_match('~/ligue1/feuille_match/(?<id>\d+)~', $link, $matches))
            {
                return $matches['id'];
            }
            
            return self::PARSE_ERROR;
            
        }), $result['link']);
        
        return $result;
    }
    
    private function processMatches(array $matches)
    {
        $info = array();
        $keys = array_keys($this->getRegexPatterns());
        $nbMatches = count($matches[$keys[0]]);
        
        for($m = 0; $m < $nbMatches; $m++)
        {
            $match = array();
            foreach($keys as $key)
            {
                if(! array_key_exists($m, $matches[$key]))
                {
                    throw new Exception(sprintf('Parse error : missing key %s in match %d', $key, $m));
                }
                
                $match[$key] = $matches[$key][$m];
            }
            
            $info[] = $this->retrieveMatchInformation($match);
        }

        return $info;
    }
    
    private function retrieveMatchInformation(array $match)
    {
        if(is_numeric($match['link']) && $match['link'] > 0)
        {
            $url = sprintf('http://www.lfp.fr/ligue1/feuille_match/%d', $match['link']);
            $html = file_get_contents($url);
            
            $info = $this->parseMatchInfo($html);
            $match = array_merge($match, $info);
        }
        else
        {
            $missingIndexes = array('scorers_home', 'scorers_away', 'csc_home', 'csc_away');
            foreach($missingIndexes as $index)
            {
                $match[$index] = array();
            }
            
            $match['cards_home'] = array('yellow' => array(), 'red' => array());
            $match['cards_away'] = array('yellow' => array(), 'red' => array());
        }
        
        return $match;
    }
    
    private function parseMatchInfo($html)
    {
        $info = array();
        
        $patterns = array(
            'score' => '~<span class="buts">(?<score>\d+)</span>~Us',
            'scorers_home' => '~<div id="buts">.*<ul class="club_dom(?<scorers_home>.*)</ul>~Us',
            'scorers_away' => '~<div id="buts">.*<ul class="club_ext(?<scorers_away>.*)</ul>~Us',
            'cards_home' => '~<div id="cartons">.*<ul class="club_dom(?<cards_home>.*)</ul>~Us',
            'cards_away' => '~<div id="cartons">.*<ul class="club_ext(?<cards_away>.*)</ul>~Us',
        );
        
        foreach($patterns as $key => $pattern)
        {
            if(preg_match_all($pattern, $html, $matches))
            {
                $info[$key] = array_map('trim', $matches[$key]);
            }
        }
        
        $filteredScorers = $this->filterScorers($info['scorers_home'][0]);
        $info['scorers_home'] = $filteredScorers['scorers'];
        $info['csc_away'] = $filteredScorers['csc'];

        $filteredScorers = $this->filterScorers($info['scorers_away'][0]);
        $info['scorers_away'] = $filteredScorers['scorers'];
        $info['csc_home'] = $filteredScorers['csc'];

        $info['cards_home'] = $this->filterCards($info['cards_home'][0]);
        $info['cards_away'] = $this->filterCards($info['cards_away'][0]);
        
        return $info;
    }
    
    private function filterScorers($scorerHtml)
    {
        $result = array('scorers' => array(), 'csc' => array());
        
        if(preg_match_all('~<a href="/joueur/.*">(?<scorers>.*</a>.*(\(csc\))?.*)</li>~Us', $scorerHtml, $matches))
        {
            
            foreach($matches['scorers'] as $scorer)
            {
                $parts = explode('</a>', $scorer);
                $scorer = $this->filterPlayerName(trim($parts[0]));
                
                $key = 'scorers';
                if(stripos($parts[1], '(csc)') !== false)
                {
                    $key = 'csc';
                }
                
                $result[$key][] = $scorer;
            }
        }
        
        return $result;
    }
    
    private function filterCards($cardsHtml)
    {
        $result = array('yellow' => array(), 'red' => array());
        
        if(preg_match_all('~">Carton (?<color>\S+)</span>.*<a href="/joueur/.*">(?<players>.*)</a>~Us', $cardsHtml, $matches))
        {
        
            foreach($matches['players'] as $index => $player)
            {
                $color = $matches['color'][$index];
                $result[$this->colorCardMapping($color)][] = $this->filterPLayerName(trim($player));
            }
        }
        
        return $result;
    }
    
    private function colorCardMapping($html)
    {
        $map = array('jaune' => 'yellow', 'rouge' => 'red');
        
        $color = 'yellow';
        if(isset($map[$html]))
        {
            $color = $map[$html];
        }
        
        return $color;
    }
    
    private function filterPlayerName($name)
    {
        return str_replace('&#039;', "'", $name);
    }
    
}