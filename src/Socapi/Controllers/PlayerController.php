<?php

namespace Socapi\Controllers;

use Socapi\Models\Player;
use Socapi\Models\PlayerCollection;

use Symfony\Component\HttpFoundation\JsonResponse;

class PlayerController
{
    private
        $db;
    
    public function __construct(\Doctrine\DBAL\Driver\Connection $db)
    {
        $this->db = $db;
    }
    
    public function playerAction($teamId, $playerId)
    {
        $player = new Player($this->db, $teamId, $playerId);
        
        return new JsonResponse($player->toArray());
    }
    
    public function playersAction($teamId)
    {
        $collection = new PlayerCollection($this->db, $teamId);
        $players = $collection->fetch();
    
        return new JsonResponse(array_map(function ($player){
            return $player->toArray();
        }, $players));
    }
}