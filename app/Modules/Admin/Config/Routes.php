<?php

if(!isset($routes))
{ 
	$routes = \Config\Services::routes(true);
	$routes->setAutoRoute(true);
}

$routes->group('admin', ['namespace' => 'App\Modules\Admin\Controllers'], function($subroutes){
	$subroutes->setAutoRoute(true);


	/*** Route for Dashboard ***/
	$subroutes->add('dashboard', 'Dashboard::index');
	$subroutes->post('dashboard/replace/?(:alphanum)?', 'Dashboard::replace/$1');
	$subroutes->delete('dashboard/delete/(:alphanum)', 'Dashboard::delete/$1');
	$subroutes->add('dashboard/tes', 'Dashboard::tes');
	$subroutes->add('dashboard/nestable', 'Dashboard::nestable');

	/*** Route for Dashboard2 ***/
	$subroutes->add('dashboard2', 'Dashboard2::index');
	$subroutes->add('dashboard2/tes', 'Dashboard2::tes');
	$subroutes->add('dashboard2/nestable', 'Dashboard2::nestable');

});