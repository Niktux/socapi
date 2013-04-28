<?php

namespace Socapi\Models\Import\Remote;
use Socapi\Storage\Storage;
use Socapi\Storage\NullStorage;

class LFPLoader implements Loader
{
    const ROOT_URL_PATTERN = 'http://www.lfp.fr/ligue1/competitionPluginCalendrierResultat/changeCalendrierJournee?sai=%d&jour=%d';

    private $cache, $season;

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
        $url = sprintf(self::ROOT_URL_PATTERN, $this->season, $day);

        return $this->get($url, $key);
    }

    public function loadMatch($matchId)
    {
        $key = sprintf('matches/%d.cache', $matchId);
        $url = sprintf('http://www.lfp.fr/ligue1/feuille_match/%d', $matchId);

        return $this->get($url, $key);
    }
    
    public function loadPlayers($teamUrlFormatted)
    {
        $key = sprintf('players/%s.cache', $teamUrlFormatted);
        $url = sprintf('http://www.lfp.fr/club/%s', $teamUrlFormatted);

        return $this->get($url, $key);
    }
    
    private function get($url, $cacheKey, $ttl = 86400)
    {
        if($this->cache->valid($cacheKey, $ttl))
        {
            return $this->cache->read($cacheKey);
        }
        
        $html = file_get_contents($url);
        $this->cache->write($cacheKey, $html);
        
        return $html;
    }
}
