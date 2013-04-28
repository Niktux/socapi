<?php

namespace Socapi\Models\Parser;

class LFPResults
{
    const
        CACHE_DIR = 'cache/results',
        FILE_EXTENSION = '.cache';
    
    private
        $parser;
    
    public function __construct(LFPParser $parser)
    {
        $this->parser = $parser;
    }
    
    public function lastDayInCache()
    {
        $max = -1;
        
        foreach(new DirectoryIterator(self::CACHE_DIR) as $file)
        {
            $baseName = $file->getBasename(self::FILE_EXTENSION);
            if(is_numeric($baseName) && $baseName > $max)
            {
                $max = $baseName;
            }
        }
        
        return $max;
    }
    
    public function import($day)
    {
        $results = $this->parser->parse($day);
        $this->storeCache($day, $results);
        
        return $results;
    }
    
    private function storeCache($day, $results)
    {
        file_put_contents($this->fileCache($day), serialize($results));
    }
    
    private function fileCache($day)
    {
        return sprintf('%s/%d%s', self::CACHE_DIR, $day, self::FILE_EXTENSION);
    }
    
    private function readCache($day)
    {
        $results = array();
        
        $cacheFile = $this->fileCache($day);
        if(file_exists($cacheFile))
        {
            $cacheData = file_get_contents($cacheFile);
            $results = unserialize($cacheData);
        }
        
        return $results;
    }
    
    public function get($day)
    {
        $results = $this->readCache($day);
        
        if(empty($results))
        {
            $results = $this->import($day);
        }
        
        return $results;
    }
    
    public function availableResultDays()
    {
        $days = array();
        
        foreach(new DirectoryIterator(self::CACHE_DIR) as $file)
        {
            $baseName = $file->getBasename(self::FILE_EXTENSION);
            if(is_numeric($baseName))
            {
                $days[] = $baseName;
            }
        }
               
        rsort($days);
        
        return $days;
    }
    
}