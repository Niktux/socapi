<?php

namespace Socapi\Storage;

use Socapi\Commands\Outputable;

class FileStorage implements Storage
{
    use Outputable;
    
    private
        $rootPath;
    
    public function __construct($rootPath)
    {
        $this->writeDir($rootPath);
        $this->rootPath = rtrim($rootPath, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
    }
    
    public function read($key)
    {
        $path = $this->getPath($key);
        
        if($this->exists($path))
        {
            $this->writeln('Read ' . $path);
            return file_get_contents($path);
        }
        
        throw new \InvalidArgumentException("$key does not exist");
    }
    
    public function write($key, $value)
    {
        $path = $this->getPath($key);
        $this->writeDir(dirname($path));
        $this->writeln('Write ' . $path);
        
        return file_put_contents($path, $value) !== false;
    }
    
    private function writeDir($path)
    {
        if(is_dir($path) === false )
        {
            mkdir($path, 0755, true);
        }
    }
    
    private function exists($path)
    {
        return is_file($path);
    }
    
    public function valid($key, $ttl = false)
    {
        $path = $this->getPath($key);
        
        if($this->exists($path))
        {
            $expiration = filemtime($path) + $ttl;
            
            if($expiration > time())
            {
                $this->writeln('Cache is valid : ' . $key);
                
                return true;
            }
        }
        
        $this->writeln('Cache is invalid : ' . $key);
        
        return false;
    }
    
    private function getPath($key)
    {
        return $this->rootPath . ltrim($key, DIRECTORY_SEPARATOR);
    }
}
