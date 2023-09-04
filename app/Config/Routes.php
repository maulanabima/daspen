<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Home::dashboard');

// Auth Route
$routes->get('/register', 'Auth::viewRegister');
$routes->post('/saveregister', 'Auth::register');
$routes->get('/login', 'Auth::viewLogin');
$routes->post('/savelogin', 'Auth::login');
