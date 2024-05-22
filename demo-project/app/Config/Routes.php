<?php

use App\Controllers\page1;
use App\Controllers\page2;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/page1','page1::index');
$routes->get('/page2', [page2::class,'index']);

//$routes->resource('api/v1/cars', ['filter' => 'check_api_key']);
$routes->resource('api/v1/cars', ['filter' => 'jwt']);
service('auth')->routes($routes);


// app/Config/Routes.php
$routes->post('auth/jwt', '\App\Controllers\Auth\LoginController::jwtLogin');
$route['send-email'] = 'EmailController/sendEmail';


