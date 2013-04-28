<?php

namespace Socapi\Models\Import\Remote;

use Socapi\Storage\Storage;
use Socapi\Storage\NullStorage;

class LFPLoader implements Loader
{
    const
        ROOT_URL_PATTERN = 'http://www.lfp.fr/ligue1/competitionPluginCalendrierResultat/changeCalendrierJournee?sai=%d&jour=%d';
    
    private
        $cache,
        $season;
    
    public function __construct($season)
    {
        $this->cache = new NullStorage();
        $this->season = $season;
    }
    
    public function setCacheDriver(Storage $storage)
    {
        $this->cache = $storage;
    }
    
    public function load($day)
    {
        $key = sprintf('day/%d.cache', $day);
        
        if($this->cache->valid($key, 86400))
        {
            return $this->cache->read($key);
        }
        
        $url = $this->computeUrl($day);
        $html = file_get_contents($url);
        
        $this->cache->write($key, $html);
        
        return $html;
    }
    
    private function computeUrl($day)
    {
        return sprintf(self::ROOT_URL_PATTERN, $this->season, $day);
    }
    
    public function loadMatch($matchId)
    {
        $key = sprintf('matches/%d.cache', $matchId);
        
        if($this->cache->valid($key, 86400))
        {
            return $this->cache->read($key);
        }
        
        $url = sprintf('http://www.lfp.fr/ligue1/feuille_match/%d', $matchId);
        $html = file_get_contents($url);
        
        $this->cache->write($key, $html);
        
        return $html;
    }
}