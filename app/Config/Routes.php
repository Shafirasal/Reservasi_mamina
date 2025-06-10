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
// $routes->get('index', 'UlasanController::index');
$routes->post('simpan', 'UlasanController::simpan');

// Fitur Broadcast
$routes->get('broadcast/(:num)','BroadcastController::send/$1');


$routes->get('form-ulasan', 'UlasanController::index');
$routes->post('simpan', 'UlasanController::simpan');

$routes->get('kirim_ulasan/(:num)', 'BroadcastUlasanController::kirim_ulasan/$1');