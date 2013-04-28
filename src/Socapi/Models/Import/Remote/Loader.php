<?php

namespace Socapi\Models\Import\Remote;

class Loader
{
    const
        ROOT_URL_PATTERN = 'http://www.lfp.fr/ligue1/competitionPluginCalendrierResultat/changeCalendrierJournee?sai=%d&jour=%d';
    
    private
        $season;
    
    public function __construct($season)
    {
        $this->season = $season;
    }
    
    public function load($day)
    {
        $url = $this->computeUrl($day);
        $html = file_get_contents($url);
        
        // file_put_contents("cache/html/$day.html", $html);
        
        return $html;
    }
    
    private function computeUrl($day)
    {
        return sprintf(self::ROOT_URL_PATTERN, $this->season, $day);
    }
    
    public function loadMatch($matchId)
    {
        $url = sprintf('http://www.lfp.fr/ligue1/feuille_match/%d', $matchId);
        $html = file_get_contents($url);
        
        return $html;
    }
}