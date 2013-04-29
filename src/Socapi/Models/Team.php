<?php

namespace Socapi\Models;

class Team
{
    private
        $id,
        $name,
        $db;
    
    public function __construct(\Doctrine\DBAL\Driver\Connection $db, $id)
    {
        $this->db = $db;
        $this->hydrate($id);
    }
    
    private function hydrate($id)
    {
        // FIXME prototype without tests
        $team = $this->db->fetchAssoc('SELECT * FROM teams WHERE id = ?', array((int) $id));
        
        $this->id = (int) $id;
        $this->name = $team['name'];
    }
    
    public function toArray()
    {
        return array(
            'id' => $this->id,
            'name' => $this->name,
            'players' => array(),
        );
    }
}