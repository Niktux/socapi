<?php

namespace Socapi\Models\Import\Remote;

interface Loader
{
    public function load($day);
    public function loadMatch($matchId);
}