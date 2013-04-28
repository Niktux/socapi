<?php

namespace Socapi\Models\Parser;

class LFPPlayerParser
{
    const
        CACHE_DIR = 'cache/players/',
        FILE_EXTENSION = '.cache';
    
    private
        $excludeNoPlayPlayers;
    
    public function __construct($excludeNoPlayPlayers = false)
    {
        $this->excludeNoPlayPlayers = $excludeNoPlayPlayers;
    }
    
    public function parse($teamUrlFormatted, $force = false)
    {
        $html = $this->getHtml($teamUrlFormatted, $force);

        return $this->extractPlayers($html);
    }
    
    private function getHtml($teamUrlFormatted, $force = false)
    {
        $file = self::CACHE_DIR . $teamUrlFormatted . self::FILE_EXTENSION;
        if($force === false && file_exists($file))
        {
            return file_get_contents($file);
        }
        
        $url = sprintf('http://www.lfp.fr/club/%s', $teamUrlFormatted);
        
        $html = file_get_contents($url);
        if($html === false)
        {
            throw new Exception($url . ' not found');
        }
        
        file_put_contents($file, $html);
        
        return $html;
    }
    
    private function extractPlayers($html)
    {
        $html = $this->reduceHtmlToStaffBlock($html);
        $positions = explode('<h2 class="titre_bg_4">', $html);
        array_shift($positions);
        
        $players = array();
        
        foreach($positions as $position)
        {
            $players = array_merge($players, $this->processPositionBlock($position));
        }
        
        return $players;
    }
    
    private function reduceHtmlToStaffBlock($html)
    {
        $parts = explode('<div id="bloc_effectif" class="bloc_infos">', $html);
        $html = $parts[1];
        $parts = explode('<div id="bloc_calendrier" class="bloc_infos">', $html);
        
        return $parts[0];
    }
    
    private function processPositionBlock($html)
    {
        $players = array();
        
        $parts = explode('</h2>', $html);
        $position = $this->translatePosition($parts[0]);
        $html = $parts[1];
         
        if(preg_match_all(
            '~<a class="nom" href="/joueur/([^"]+)" class="lien_fiche">(?P<nom>[^<]+)</a><span class="prenom">(?P<prenom>[^<]*)</span>.*<li><a class="chiffre" href="/joueur/\1#bloc_temps" class="lien_fiche">(?P<played>\d{1,2})</a><span class="legende">Matchs?</span></li>~Us',
            $html,
            $matches
        ))
        {
            foreach($matches['nom'] as $index => $name)
            {
                $played = $matches['played'][$index];
                if($this->excludeNoPlayPlayers === false || $played > 0)
                {
                    $firstName = $matches['prenom'][$index];
                    $players[] = empty($firstName) ? $name : sprintf('%s %s', $firstName, $name);;
                }
            }
        }
         
        return array($position => $players);
    }
    
    private function translatePosition($position)
    {
        $mapping = array(
            'Gardiens' => 'g',
            'Défenseurs' => 'd',
            'Milieux' => 'md',
            'Attaquants' => 'a',
        );
        
        return $mapping[$position];
    }
}