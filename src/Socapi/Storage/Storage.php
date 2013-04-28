<?php

namespace Socapi\Storage;

interface Storage
{
    /**
     * @param string $key
     * @return string
     */
    public function read($key);
    
    /**
     * @param string $key
     * @param mixed $value
     * @return boolean
     */
    public function write($key, $value);
    
    /**
     * @param string $key
     * @param int|false $ttl
     * @return boolean
     */
    public function valid($key, $ttl = false);
}