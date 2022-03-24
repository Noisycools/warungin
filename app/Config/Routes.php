<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Warungin::index');
$routes->get('/contact_us', 'Email::index');
$routes->get('/daftar_belanja', 'Pages::daftar_belanja', ['filter' => 'role:user']);
$routes->get('/homepage', 'Pages::homepage');
$routes->get('/product', 'Pages::product');
$routes->get('/profile', 'Pages::profile');
$routes->get('/checkout', 'DaftarBelanja::checkout', ['filter' => 'role:user']);
$routes->get('/histori_transaksi', 'Pages::histori_transaksi', ['filter' => 'role:user']);
$routes->get('/kurir', 'Pages::kurir', ['filter' => 'role:kurir']);
$routes->get('/kurir_verif', 'Pages::kurir_verif', ['filter' => 'role:kurir']);

// *** ADMIN ***
$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('admin/product', 'Product::index', ['filter' => 'role:admin']);
$routes->get('admin/product/create', 'Product::create', ['filter' => 'role:admin']);
$routes->get('/product/edit/(:segment)', 'Product::edit/$1');
$routes->delete('/product/(:num)', 'Product::delete/$1');
$routes->get('/product/laporan', 'Product::laporan');
$routes->get('admin/customer', 'Customer::index', ['filter' => 'role:admin']);
$routes->get('admin/customer/create', 'Customer::create', ['filter' => 'role:admin']);
$routes->get('/customer/edit/(:segment)', 'Customer::edit/$1');
$routes->delete('/customer/(:num)', 'Customer::delete/$1');
$routes->get('/customer/laporan', 'Customer::laporan');
$routes->get('admin/transaction', 'Transaction::index', ['filter' => 'role:admin']);
$routes->get('admin/transaction/create', 'Transaction::create', ['filter' => 'role:admin']);
$routes->get('/transaction/edit/(:segment)', 'Transaction::edit/$1');
$routes->delete('/transaction/(:segment)', 'Transaction::delete/$1');
$routes->get('/transaction/laporan', 'Transaction::laporan');
$routes->get('admin/report', 'Report::index', ['filter' => 'role:admin']);


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
