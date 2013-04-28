<?php

namespace Socapi\Storage;

class NullStorage implements Storage
{
    public function read($key)
    {
        return '';
    }
    
    public function write($key, $value)
    {
        return false;
    }
    
    public function valid($key, $ttl = false)
    {
        return false;
    }
}