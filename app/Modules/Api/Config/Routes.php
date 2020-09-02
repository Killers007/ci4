<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('api', ['namespace' => 'App\Modules\Api\Controllers'], function($subroutes){

	/*** Route for Auth ***/
	$subroutes->add('auth/privateKey', 'Auth::privateKey');
	$subroutes->add('auth/register', 'Auth::register');
	$subroutes->add('auth/login', 'Auth::login');
	$subroutes->add('auth', 'Auth::index');
	$subroutes->add('auth/show/(:alphanum)', 'Auth::show/$1');
	$subroutes->add('auth/new', 'Auth::new');
	$subroutes->add('auth/create', 'Auth::create');
	$subroutes->add('auth/edit/(:alphanum)', 'Auth::edit/$1');
	$subroutes->add('auth/update/(:alphanum)', 'Auth::update/$1');
	$subroutes->add('auth/delete/(:alphanum)', 'Auth::delete/$1');
	$subroutes->add('auth/setModel/(:alphanum)', 'Auth::setModel/$1');
	$subroutes->add('auth/setFormat/(:alphanum)', 'Auth::setFormat/$1');
	$subroutes->add('auth/respond/(:alphanum)/(:num)/(:alphanum)', 'Auth::respond/$1/$2/$3');
	$subroutes->add('auth/fail/(:alphanum)/(:num)/(:alphanum)/(:alphanum)', 'Auth::fail/$1/$2/$3/$4');
	$subroutes->add('auth/respondCreated/(:alphanum)/(:alphanum)', 'Auth::respondCreated/$1/$2');
	$subroutes->add('auth/respondDeleted/(:alphanum)/(:alphanum)', 'Auth::respondDeleted/$1/$2');
	$subroutes->add('auth/respondUpdated/(:alphanum)/(:alphanum)', 'Auth::respondUpdated/$1/$2');
	$subroutes->add('auth/respondNoContent/(:alphanum)', 'Auth::respondNoContent/$1');
	$subroutes->add('auth/failUnauthorized/(:alphanum)/(:alphanum)/(:alphanum)', 'Auth::failUnauthorized/$1/$2/$3');
	$subroutes->add('auth/failForbidden/(:alphanum)/(:alphanum)/(:alphanum)', 'Auth::failForbidden/$1/$2/$3');
	$subroutes->add('auth/failNotFound/(:alphanum)/(:alphanum)/(:alphanum)', 'Auth::failNotFound/$1/$2/$3');
	$subroutes->add('auth/failValidationError/(:alphanum)/(:alphanum)/(:alphanum)', 'Auth::failValidationError/$1/$2/$3');
	$subroutes->add('auth/failResourceExists/(:alphanum)/(:alphanum)/(:alphanum)', 'Auth::failResourceExists/$1/$2/$3');
	$subroutes->add('auth/failResourceGone/(:alphanum)/(:alphanum)/(:alphanum)', 'Auth::failResourceGone/$1/$2/$3');
	$subroutes->add('auth/failTooManyRequests/(:alphanum)/(:alphanum)/(:alphanum)', 'Auth::failTooManyRequests/$1/$2/$3');
	$subroutes->add('auth/failServerError/(:alphanum)/(:alphanum)/(:alphanum)', 'Auth::failServerError/$1/$2/$3');
	$subroutes->add('auth/setResponseFormat/(:alphanum)', 'Auth::setResponseFormat/$1');

	/*** Route for Home ***/
	$subroutes->add('home', 'Home::index');
	$subroutes->add('home/show/(:alphanum)', 'Home::show/$1');
	$subroutes->add('home/new', 'Home::new');
	$subroutes->add('home/create', 'Home::create');
	$subroutes->add('home/edit/(:alphanum)', 'Home::edit/$1');
	$subroutes->add('home/update/(:alphanum)', 'Home::update/$1');
	$subroutes->add('home/delete/(:alphanum)', 'Home::delete/$1');
	$subroutes->add('home/setModel/(:alphanum)', 'Home::setModel/$1');
	$subroutes->add('home/setFormat/(:alphanum)', 'Home::setFormat/$1');
	$subroutes->add('home/respond/(:alphanum)/(:num)/(:alphanum)', 'Home::respond/$1/$2/$3');
	$subroutes->add('home/fail/(:alphanum)/(:num)/(:alphanum)/(:alphanum)', 'Home::fail/$1/$2/$3/$4');
	$subroutes->add('home/respondCreated/(:alphanum)/(:alphanum)', 'Home::respondCreated/$1/$2');
	$subroutes->add('home/respondDeleted/(:alphanum)/(:alphanum)', 'Home::respondDeleted/$1/$2');
	$subroutes->add('home/respondUpdated/(:alphanum)/(:alphanum)', 'Home::respondUpdated/$1/$2');
	$subroutes->add('home/respondNoContent/(:alphanum)', 'Home::respondNoContent/$1');
	$subroutes->add('home/failUnauthorized/(:alphanum)/(:alphanum)/(:alphanum)', 'Home::failUnauthorized/$1/$2/$3');
	$subroutes->add('home/failForbidden/(:alphanum)/(:alphanum)/(:alphanum)', 'Home::failForbidden/$1/$2/$3');
	$subroutes->add('home/failNotFound/(:alphanum)/(:alphanum)/(:alphanum)', 'Home::failNotFound/$1/$2/$3');
	$subroutes->add('home/failValidationError/(:alphanum)/(:alphanum)/(:alphanum)', 'Home::failValidationError/$1/$2/$3');
	$subroutes->add('home/failResourceExists/(:alphanum)/(:alphanum)/(:alphanum)', 'Home::failResourceExists/$1/$2/$3');
	$subroutes->add('home/failResourceGone/(:alphanum)/(:alphanum)/(:alphanum)', 'Home::failResourceGone/$1/$2/$3');
	$subroutes->add('home/failTooManyRequests/(:alphanum)/(:alphanum)/(:alphanum)', 'Home::failTooManyRequests/$1/$2/$3');
	$subroutes->add('home/failServerError/(:alphanum)/(:alphanum)/(:alphanum)', 'Home::failServerError/$1/$2/$3');
	$subroutes->add('home/setResponseFormat/(:alphanum)', 'Home::setResponseFormat/$1');

	/*** Route for Mahasiswa ***/
	$subroutes->add('mahasiswa', 'Mahasiswa::index');
	$subroutes->add('mahasiswa/get/(:alphanum)', 'Mahasiswa::get/$1');
	$subroutes->add('mahasiswa/post/(:alphanum)', 'Mahasiswa::post/$1');
	$subroutes->add('mahasiswa/show/(:alphanum)', 'Mahasiswa::show/$1');
	$subroutes->add('mahasiswa/new', 'Mahasiswa::new');
	$subroutes->add('mahasiswa/create', 'Mahasiswa::create');
	$subroutes->add('mahasiswa/edit/(:alphanum)', 'Mahasiswa::edit/$1');
	$subroutes->add('mahasiswa/update/(:alphanum)', 'Mahasiswa::update/$1');
	$subroutes->add('mahasiswa/delete/(:alphanum)', 'Mahasiswa::delete/$1');
	$subroutes->add('mahasiswa/setModel/(:alphanum)', 'Mahasiswa::setModel/$1');
	$subroutes->add('mahasiswa/setFormat/(:alphanum)', 'Mahasiswa::setFormat/$1');
	$subroutes->add('mahasiswa/respond/(:alphanum)/(:num)/(:alphanum)', 'Mahasiswa::respond/$1/$2/$3');
	$subroutes->add('mahasiswa/fail/(:alphanum)/(:num)/(:alphanum)/(:alphanum)', 'Mahasiswa::fail/$1/$2/$3/$4');
	$subroutes->add('mahasiswa/respondCreated/(:alphanum)/(:alphanum)', 'Mahasiswa::respondCreated/$1/$2');
	$subroutes->add('mahasiswa/respondDeleted/(:alphanum)/(:alphanum)', 'Mahasiswa::respondDeleted/$1/$2');
	$subroutes->add('mahasiswa/respondUpdated/(:alphanum)/(:alphanum)', 'Mahasiswa::respondUpdated/$1/$2');
	$subroutes->add('mahasiswa/respondNoContent/(:alphanum)', 'Mahasiswa::respondNoContent/$1');
	$subroutes->add('mahasiswa/failUnauthorized/(:alphanum)/(:alphanum)/(:alphanum)', 'Mahasiswa::failUnauthorized/$1/$2/$3');
	$subroutes->add('mahasiswa/failForbidden/(:alphanum)/(:alphanum)/(:alphanum)', 'Mahasiswa::failForbidden/$1/$2/$3');
	$subroutes->add('mahasiswa/failNotFound/(:alphanum)/(:alphanum)/(:alphanum)', 'Mahasiswa::failNotFound/$1/$2/$3');
	$subroutes->add('mahasiswa/failValidationError/(:alphanum)/(:alphanum)/(:alphanum)', 'Mahasiswa::failValidationError/$1/$2/$3');
	$subroutes->add('mahasiswa/failResourceExists/(:alphanum)/(:alphanum)/(:alphanum)', 'Mahasiswa::failResourceExists/$1/$2/$3');
	$subroutes->add('mahasiswa/failResourceGone/(:alphanum)/(:alphanum)/(:alphanum)', 'Mahasiswa::failResourceGone/$1/$2/$3');
	$subroutes->add('mahasiswa/failTooManyRequests/(:alphanum)/(:alphanum)/(:alphanum)', 'Mahasiswa::failTooManyRequests/$1/$2/$3');
	$subroutes->add('mahasiswa/failServerError/(:alphanum)/(:alphanum)/(:alphanum)', 'Mahasiswa::failServerError/$1/$2/$3');
	$subroutes->add('mahasiswa/setResponseFormat/(:alphanum)', 'Mahasiswa::setResponseFormat/$1');

});