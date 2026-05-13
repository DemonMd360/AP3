<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Page d'accueil
$routes->get('/', 'Home::index');

$routes->post('personne/create', 'PersonneController::create');

// Auth
$routes->post('auth/login', 'AuthController::login');
$routes->post('auth/register', 'AuthController::register');
$routes->get('auth/logout', 'AuthController::logout');

// Admin
$routes->get('admin', 'AdminController::index');
$routes->get('admin/delete/(:num)', 'AdminController::delete/$1');

// Routes protégées par JWT
$routes->group('', ['filter' => 'jwt'], function ($routes) {

    // Edition / suppression de personne
    $routes->post('personne/edit/(:num)', 'PersonneController::edit/$1');
    $routes->post('personne/delete/(:num)', 'PersonneController::delete/$1');

    // API REST Personne
    $routes->resource('personne');
});
