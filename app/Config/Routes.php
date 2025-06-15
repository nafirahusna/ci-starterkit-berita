<?php

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('DashboardController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// $routes->setAutoRoute(true); // boleh aktifkan/disable sesuai kebutuhan

// -----------------------
// Routes Public (Auth)
// -----------------------
$routes->get('login',     'AuthController::login',    ['as'=>'login']);
$routes->post('login',    'AuthController::attempt');
$routes->get('register',  'AuthController::register', ['as'=>'register']);
$routes->post('register', 'AuthController::store');
$routes->get('logout',    'AuthController::logout',   ['filter'=>'auth', 'as'=>'logout']);

// -----------------------
// Dashboard (Protected)
// -----------------------
$routes->get('/',          'DashboardController::index', ['filter'=>'auth']);

// -----------------------
// Category CRUD (Protected)
// -----------------------
$routes->group('categories', ['filter'=>'auth'], function($r) {
    $r->get('',              'CategoryController::index');
    $r->get('create',        'CategoryController::create');
    $r->post('store',        'CategoryController::store');
    $r->get('edit/(:num)',   'CategoryController::edit/$1');
    $r->post('update/(:num)','CategoryController::update/$1');
    $r->get('delete/(:num)', 'CategoryController::delete/$1');
});

// -----------------------
// News CRUD + Approval + Slugify (Protected)
// -----------------------
$routes->group('news', ['filter'=>'auth'], function($r) {
    $r->get('',              'NewsController::index');
    $r->get('create',        'NewsController::create');
    $r->post('store',        'NewsController::store');
    $r->get('edit/(:num)',   'NewsController::edit/$1');
    $r->post('update/(:num)','NewsController::update/$1');
    $r->get('delete/(:num)', 'NewsController::delete/$1');
    $r->get('approve/(:num)','NewsController::approve/$1');
    $r->get('slugify',       'NewsController::slugify');
});

// -----------------------
// User Management (Admin Only)
// -----------------------
$routes->group('users', ['filter'=>['auth','roleAdmin']], function($r) {
    $r->get('',              'UserController::index');
    $r->get('create',        'UserController::create');
    $r->post('store',        'UserController::store');
    $r->get('edit/(:num)',   'UserController::edit/$1');
    $r->post('update/(:num)','UserController::update/$1');
    $r->get('delete/(:num)', 'UserController::delete/$1');
});
