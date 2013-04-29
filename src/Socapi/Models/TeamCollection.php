<?php

namespace Socapi\Models;

class TeamCollection
{
    private
        $db;
    
    public function __construct(\Doctrine\DBAL\Driver\Connection $db)
    {
        $this->db = $db;
    }
    
    public function fetch($offset = 0, $limit = false)
    {
        // FIXME prototype without tests
        $rows = $this->db->fetchAll('SELECT id FROM teams');
        
        $teams = array();
        foreach($rows as $row)
        {
            $teams[] = new Team($this->db, $row['id']);
        }
        
        return $teams;
    }
}