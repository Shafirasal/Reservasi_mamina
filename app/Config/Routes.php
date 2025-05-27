<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('dashboard', 'ReservasiController::index'); 
$routes->get('reservasi/create', 'ReservasiController::create');  // tampilkan form create
$routes->post('reservasi/store', 'ReservasiController::store');   // proses simpan data
