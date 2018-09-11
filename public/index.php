<?php 

require_once '../vendor/autoload.php';

use Cristianmgb\PhpApiRest\Core\ManagerRouter;

$base_path = "\/php-api-rest/";


// add your routes
$route = new ManagerRouter();
$map = $route->router();


$map->get('index', $base_path, [
	'controller' => 'IndexController',
	'action' => 'index'
]);

$map->post('user', $base_path.'user', [
	'controller' => 'UserController',
	'action' => 'getUser'
]);

$map->get('users', $base_path.'users', [
	'controller' => 'UserController',
	'action' => 'params'
]);


$route->manager();
