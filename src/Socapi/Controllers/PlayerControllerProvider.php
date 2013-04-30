<?php

namespace Socapi\Controllers;

use Silex\Application;
use Silex\ControllerProviderInterface;

class PlayerControllerProvider implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $app['player.controller'] = $app->share(function() use($app) {
            return new PlayerController($app['db']);
        });
        
        // creates a new controller based on the default route
        $controllers = $app['controllers_factory'];
        
        $controllers->get('/{playerId}', 'player.controller:playerAction')
            ->assert('playerId', '\d+')
            ->assert('teamId', '\d+');
        
        $controllers->get('/', 'player.controller:playersAction')
            ->assert('teamId', '\d+');
            
        return $controllers;
    }
}
