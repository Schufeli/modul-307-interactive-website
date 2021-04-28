<?php
require 'core/bootstrap.php';

$routes = [
	'/' => 'DashboardController@index',
	'/dashboard' => 'DashboardController@index',
	'/create' => 'DashboardController@create',
	'/edit' => 'DashboardController@edit',
	'/update' => 'DashboardController@update',
];

$db = [
	'name'     => 'hippibank',
	'username' => 'root',
	'password' => '',
];

$router = new Router($routes);
$router->run($_GET['url'] ?? '');