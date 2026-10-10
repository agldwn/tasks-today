<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Public pages
$routes->get('/', 'Tasks::index');
$routes->get('/tasks', 'Tasks::all');
$routes->get('/profile', 'Tasks::profile');
$routes->get('/about', 'Tasks::about');

// Authentication
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::attemptLogin');
$routes->get('/logout', 'Auth::logout');

// Protected task actions
$routes->get('/tasks/new', 'Tasks::create', ['filter' => 'auth']);
$routes->post('/tasks', 'Tasks::store', ['filter' => 'auth']);

$routes->get('/tasks/edit/(:num)', 'Tasks::edit/$1', [
    'filter' => 'auth'
]);

$routes->post('/tasks/update/(:num)', 'Tasks::update/$1', [
    'filter' => 'auth'
]);

$routes->post('/tasks/delete/(:num)', 'Tasks::delete/$1', [
    'filter' => 'auth'
]);