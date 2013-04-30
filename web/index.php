<?php

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Yaml\Yaml;

require '../src/bootstrap.php';

$startTime = microtime(true);

$app = new Silex\Application();
$app['debug'] = true;

$password = '';
$config = Yaml::parse('../config/db.yml');
if(isset($config['db']['password']))
{
    $password = $config['db']['password'];
}

$app->register(new Silex\Provider\ServiceControllerServiceProvider());
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'   => 'pdo_mysql',
        'host'     => 'localhost',
        'dbname'   => 'socapi',
        'user'     => 'socapi',
        'password' => $password,
        'charset'  => 'utf8'
    ),
));

$app->mount('/league/1/teams/{teamId}/players', new Socapi\Controllers\PlayerControllerProvider());
$app->mount('/league/1/teams', new Socapi\Controllers\TeamControllerProvider());

$app->after(function (Request $request, Response $response) use($startTime){
    $response->headers->set('X-Generation-Time', microtime(true) - $startTime);
});

$app->run();