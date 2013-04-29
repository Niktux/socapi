<?php

use Symfony\Component\Yaml\Yaml;

require '../src/bootstrap.php';

$app = new Silex\Application();

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

$app->mount('/league/{leagueId}/teams', new Socapi\Controllers\TeamControllerProvider());

$app->run();