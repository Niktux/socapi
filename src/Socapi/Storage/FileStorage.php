<?php

namespace Socapi\Storage;

class FileStorage implements Storage
{
    private
        $rootPath;
    
    public function __construct($rootPath)
    {
        if(is_dir($rootPath) === false)
        {
            mkdir($rootPath, 755, true);
        }
        
        $this->rootPath = rtrim($rootPath, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
    }
    
    public function read($key)
    {
        $path = $this->getPath($key);
        
        if($this->exists($path))
        {
            return file_get_contents($path);
        }
        
        throw new \InvalidArgumentException("$key does not exist");
    }
    
    public function write($key, $value)
    {
        $path = $this->getPath($key);
        
        return file_put_contents($path, $value) !== false;
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
                return true;
            }
        }
        
        return false;
    }
    
    private function getPath($key)
    {
        return $this->rootPath . ltrim($key, DIRECTORY_SEPARATOR);
    }
}
