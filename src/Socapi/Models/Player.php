<?php

namespace Socapi\Models;

class Player
{
    private
        $id,
        $name,
        $position,
        $team,
        $db;
    
    public function __construct(\Doctrine\DBAL\Driver\Connection $db, $teamId, $id)
    {
        $this->db = $db;
        $this->hydrate($teamId, $id);
    }
    
    private function hydrate($teamId, $id)
    {
        // FIXME prototype without tests
        $player = $this->db->fetchAssoc(
            'SELECT * FROM player WHERE id = ? AND team = ?',
            array((int) $id, $teamId)
        );
        
        $this->id = (int) $id;
        $this->name = $player['name'];
        $this->position = $player['position'];
        $this->team = new Team($this->db, $player['team']);
    }
    
    public function toArray()
    {
        return array(
            'id' => $this->id,
            'name' => $this->name,
            'position' => $this->position,
            'team' => $this->team->toArray(),
        );
    }
}