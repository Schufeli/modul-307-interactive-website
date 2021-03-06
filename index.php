<?php
require 'core/bootstrap.php';

$routes = [
	'/' => 'DashboardController@index',
	'/dashboard' => 'DashboardController@index',
	'/create' => 'DashboardController@create',
	'/edit' => 'DashboardController@edit',
	'/update' => 'DashboardController@update',
	'/complete' => 'DashboardController@complete'
];

$router = new Router($routes);
$router->run($_GET['url'] ?? '');