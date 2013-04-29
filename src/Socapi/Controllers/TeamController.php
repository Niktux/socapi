<?php

namespace Socapi\Controllers;

use Socapi\Models\Team;
use Socapi\Models\TeamCollection;

use Symfony\Component\HttpFoundation\JsonResponse;

class TeamController
{
    private
        $db;
    
    public function __construct(\Doctrine\DBAL\Driver\Connection $db)
    {
        $this->db = $db;
    }
    
    public function teamAction($leagueId, $teamId)
    {
        $team = new Team($this->db, $teamId);
        
        return new JsonResponse($team->toArray());
    }
    
    public function teamsAction($leagueId)
    {
        $collection = new TeamCollection($this->db);
        $teams = $collection->fetch();
    
        return new JsonResponse(array_map(function ($team){
            return $team->toArray();
        }, $teams));
    }
}