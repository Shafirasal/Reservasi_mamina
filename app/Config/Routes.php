<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('dashboard', 'ReservasiController::index'); 
$routes->get('create', 'ReservasiController::create');
$routes->post('store', 'ReservasiController::store');
$routes->get('cari_pelanggan', 'ReservasiController::cari_pelanggan');