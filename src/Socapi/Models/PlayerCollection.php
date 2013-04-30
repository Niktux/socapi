<?php

namespace Socapi\Models;

class PlayerCollection
{
    private
        $teamId,
        $db;
    
    public function __construct(\Doctrine\DBAL\Driver\Connection $db, $teamId)
    {
        $this->db = $db;
        $this->teamId = (int) $teamId;
    }
    
    public function fetch(/*$offset = 0, $limit = false*/)
    {
        // FIXME prototype without tests
        $rows = $this->db->fetchAll('SELECT id FROM player WHERE team = ?', array($this->teamId));
        
        $players = array();
        foreach($rows as $row)
        {
            $players[] = new Player($this->db, $this->teamId, $row['id']);
        }
        
        return $players;
    }
}