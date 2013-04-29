<?php

namespace Socapi\Controllers;

use Silex\Application;
use Silex\ControllerProviderInterface;

class TeamControllerProvider implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $app['team.controller'] = $app->share(function() use($app) {
           return new TeamController($app['db']);
        });
        
        // creates a new controller based on the default route
        $controllers = $app['controllers_factory'];
        
        $controllers->get('/{teamId}', 'team.controller:teamAction');
        $controllers->get('/', 'team.controller:teamsAction');
        
        return $controllers;
    }
}
