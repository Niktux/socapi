<?php

namespace Socapi\Models\Parser;

class ORM
{
    private
        $db;

    public function __construct()
    {
        $dsn = 'mysql:host=127.0.0.1;port=3306;dbname=lfp';
        $this->db = new PDO($dsn, 'root', '');
    }

    public function getTeamInfo($lfpName)
    {
        $r = $this->query($q = sprintf(
            "SELECT id, promoted FROM lfp_team WHERE lfp_name = '%s'",
            utf8_decode($lfpName)
        ));
        
        $row = $r->fetch();

        if($row === false)
        {
            throw new Exception('Unable to find team ' . $lfpName);
        }

        return $row;
    }
    
    public function getTeamPlayers($teamId)
    {
        $st = $this->query(sprintf('SELECT * FROM lfp_player WHERE club = %d', $teamId));
        
        return $st;
    }
    
    public function fetchAllPlayers($position = null)
    {
        $positionCond = '';
        if($position !== null)
        {
            $positionCond = sprintf("WHERE position = '%s'", $position);
        }
        
        $st = $this->query("SELECT * FROM lfp_player $positionCond ORDER BY lfp_name ASC");
        
        return $st;
    }
    
    public function storePlayerPoints($day, $playerId, $points)
    {
        $sql = sprintf(
            "REPLACE INTO lfp_player_points (%s) VALUES (%s)",
            sprintf('player, day, %s', implode(', ', array_keys($points))),
            sprintf('%d, %d, %s', $playerId, $day, implode(', ', $points))
        );
        
        $this->query($sql);
    }
    
    public function removePreviousComputedPoints($day)
    {
        $sql = sprintf("DELETE FROM lfp_player_points WHERE day = %d", $day);
        
        $this->query($sql);
    }
    
    public function lastDayComputed()
    {
        $sql = "SELECT MAX(day) AS lastDay FROM lfp_player_points ";
        
        $st = $this->query($sql);
        $row = $st->fetch();
        
        return $row !== false ? $row['lastDay'] : -1;
    }
    
    public function getRanking($day = null, $line = 'all')
    {
        $filters = array();
        if($day !== null && is_numeric($day) && $day > 0 && $day <= 38)
        {
            $filters[] = sprintf("day = %d", intval($day));
        }
        
        $lineCond = '';
        switch($line)
        {
            case 'd': $filters[] = "(p.position = 'g' OR p.position = 'd')"; break;
            case 'm': $filters[] = "(p.position = 'md' OR p.position = 'mo')"; break;
            case 'a': $filters[] = "p.position = 'a'"; break;
        }
        
        $filterString = '';
        if(!empty($filters))
        {
            $filterString = sprintf(" WHERE %s ", implode(' AND ', $filters));
        }
        
        $sql = <<< SQL
SELECT ut.userId, u.name, sum(points) AS pts
FROM lfp_user_team AS ut
INNER JOIN lfp_player_points AS pp ON ut.playerId = pp.player
INNER JOIN lfp_user AS u ON ut.userId = u.id
INNER JOIN lfp_player AS p ON p.id = pp.player
$filterString
GROUP BY ut.userId
ORDER BY pts DESC
SQL;
        
        return $this->formatRanking($sql);
    }
    
    private function formatRanking($sql)
    {
        $ranking = array();
        
        $st = $this->query($sql);
        
        $cla = 1;
        while($row = $st->fetch(PDO::FETCH_ASSOC))
        {
            $line = array(
                'rank' => $cla++,
                'points' => $row['pts'],
                'userId' => $row['userId'],
                'user' => utf8_encode($row['name'])
            );
            
            $ranking[] = $line;
        }
        
        return $ranking;
    }
    
    public function getDetailedRanking($uid, $day = null)
    {
        $dayCond = '';
        if($day !== null && is_numeric($day))
        {
            $dayCond = sprintf(' AND day = %d', intval($day));
        }
        
        $sql = <<< SQL
SELECT pp.player AS playerId, p.lfp_name AS player, p.position, SUM(pp.points) AS points, t.name AS club
FROM lfp_user_team AS ut
INNER JOIN lfp_player_points AS pp ON ut.playerId = pp.player
INNER JOIN lfp_player AS p ON p.id = pp.player
INNER JOIN lfp_team AS t ON t.id = p.club
WHERE ut.userId = $uid
$dayCond
GROUP BY pp.player
ORDER BY points DESC
SQL;
        
        $ranking = array();
        
        $st = $this->query($sql);
        while($row = $st->fetch(PDO::FETCH_ASSOC))
        {
            $line = array(
            	'playerId' => utf8_encode($row['playerId']),
                'player' => utf8_encode($row['player']),
                'club' => utf8_encode($row['club']),
                'position' => $row['position'],
                'points' => $row['points'],
            );
        
            $ranking[] = $line;
        }
        
        return $ranking;
    }
    
    public function insertPlayer($name, $position, $clubId, $value)
    {
        $sql = sprintf(
            "INSERT INTO lfp_player (lfp_name, position, club, rank) VALUES ('%s', '%s', %d, %d)",
            $name,
            $position,
            $clubId,
            $value
        );
        
        var_dump($sql);
        
        $this->query($sql);
    }
    
    public function createAccount($login)
    {
        $sql = sprintf(
            "INSERT INTO lfp_user (name) VALUES ('%s')",
            $login
        );
        
        $st = $this->query($sql);
        
        return $this->db->lastInsertId();
    }
    
    public function getPlayerId($lfpName)
    {
        $r = $this->query($q = sprintf(
            "SELECT id FROM lfp_player WHERE lfp_name = '%s'",
            utf8_decode($lfpName)
        ));
        
        $row = $r->fetch();

        if($row === false)
        {
            throw new Exception('Unable to find player ' . $lfpName);
        }

        return $row;
    }
    
    public function createUserTeam($userId, array $playerIds)
    {
        foreach($playerIds as $player)
        {
            $this->query(sprintf(
                "INSERT INTO lfp_user_team (userId, playerId) VALUES (%d, %d)",
                $userId,
                $player
            ));
        }
    }
    
    public function getPlayerHistory($id)
    {
        $sql = <<<SQL
SELECT *
FROM lfp_player_points
WHERE player = $id
ORDER BY day DESC
SQL;

        return $this->query($sql);
    }
    
    public function getSummarizedPlayerHistory($id)
    {
        $sql = <<<SQL
SELECT SUM(points) AS points, SUM(team_goal_for) AS team_goal_for, SUM(team_goal_against) AS team_goal_against,
SUM(scored_goal) AS scored_goal, SUM(home_win) AS home_win, SUM(away_win) AS away_win,
SUM(yellow_card) AS yellow_card, SUM(red_card) AS red_card, SUM(promoted_win) AS promoted_win,
SUM(goal_difference) AS goal_difference, SUM(own_goal) AS own_goal, SUM(away_draw) AS away_draw
FROM lfp_player_points
WHERE player = $id
SQL;

        $st = $this->query($sql);
        if($st !== false)
        {
            $row = $st->fetch();

            if($row !== false)
            {
                return $row;
            }
        }
    
        throw new Exception('Unable to find player #' . $id);
    }
    
    public function getPlayerInfo($id)
    {
        $sql = <<< SQL
SELECT p.id, p.lfp_name AS name, c.lfp_name AS clubName, c.id AS clubId
FROM lfp_player AS p
INNER JOIN lfp_team AS c ON p.club = c.id
WHERE p.id = $id
SQL;

        $st = $this->query($sql);
        if($st !== false)
        {
            $row = $st->fetch();

            if($row !== false)
            {
                return $row;
            }
        }
    
        throw new Exception('Unable to find player #' . $id);
    }
    
    private function query($sql)
    {
        return $this->db->query($sql);
    }
}
