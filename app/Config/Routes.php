<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//dashboard
$routes->get('/', 'Home::index');
$routes->get('dashboard', 'ReservasiController::index'); 
$routes->get('reservasi/edit/(:num)', 'ReservasiController::edit/$1');     // tampilkan form edit
$routes->post('reservasi/update/(:num)', 'ReservasiController::update/$1'); // simpan hasil edit


//Fitur Reservasi
$routes->get('create', 'ReservasiController::create');
$routes->post('store', 'ReservasiController::store');
$routes->get('cari_pelanggan', 'ReservasiController::cari_pelanggan');

// Fitur Ulasan
$routes->get('index', 'UlasanController::index');
$routes->post('simpan', 'UlasanController::simpan');

