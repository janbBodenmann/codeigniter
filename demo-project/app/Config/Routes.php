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