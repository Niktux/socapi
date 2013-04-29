<?php

namespace Socapi\Import;

class LFPPlayerParser
{
    private
        $loader;
    
    public function __construct(Remote\Loader $loader)
    {
        $this->loader = $loader;
    }
    
    public function parse($teamUrlFormatted)
    {
        $html = $this->loader->loadPlayers($teamUrlFormatted);

        return $this->extractPlayers($html);
    }
    
    private function extractPlayers($html)
    {
        $html = $this->reduceHtmlToStaffBlock($html);
        $positions = explode('<h2 class="titre_bg_4">', $html);
        array_shift($positions);
        
        $players = array();
        
        foreach($positions as $position)
        {
            $players = array_merge($players, $this->processPositionBlock($position));
        }
        
        return $players;
    }
    
    private function reduceHtmlToStaffBlock($html)
    {
        $parts = explode('<div id="bloc_effectif" class="bloc_infos">', $html);
        $html = $parts[1];
        $parts = explode('<div id="bloc_calendrier" class="bloc_infos">', $html);
        
        return $parts[0];
    }
    
    private function processPositionBlock($html)
    {
        $players = array();
        
        $parts = explode('</h2>', $html);
        $position = $this->translatePosition($parts[0]);
        $html = $parts[1];
         
        if(preg_match_all(
            '~<a class="nom" href="/joueur/([^"]+)" class="lien_fiche">(?P<nom>[^<]+)</a><span class="prenom">(?P<prenom>[^<]*)</span>.*<li><a class="chiffre" href="/joueur/\1#bloc_temps" class="lien_fiche">(?P<played>\d{1,2})</a><span class="legende">Matchs?</span></li>~Us',
            $html,
            $matches
        ))
        {
            foreach($matches['nom'] as $index => $name)
            {
                $firstName = $matches['prenom'][$index];
                $players[] = empty($firstName) ? $name : sprintf('%s %s', $firstName, $name);
            }
        }
         
        return array($position => $players);
    }
    
    private function translatePosition($position)
    {
        $mapping = array(
            'Gardiens' => 'g',
            'Défenseurs' => 'd',
            'Milieux' => 'md',
            'Attaquants' => 'a',
        );
        
        return $mapping[$position];
    }
}