<?php

namespace Socapi\Import\Remote;

interface Loader
{
    public function load($day);
    public function loadMatch($matchId);
    public function loadPlayers($teamUrlFormatted);
}