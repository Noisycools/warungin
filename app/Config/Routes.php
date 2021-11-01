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
$routes->get('/daftar_belanja', 'Pages::daftar_belanja');
$routes->get('/homepage', 'Pages::homepage');
$routes->get('/product', 'Pages::product');
$routes->get('/admin', 'Admin::index');
$routes->get('admin/product', 'Product::index');
$routes->get('admin/product/create', 'Product::create');
$routes->get('/product/edit/(:segment)', 'Product::edit/$1');
$routes->delete('/product/(:num)', 'Product::delete/$1');
$routes->get('admin/customer', 'Customer::index');
$routes->get('admin/customer/create', 'Customer::create');
$routes->get('/customer/edit/(:segment)', 'Customer::edit/$1');
$routes->delete('/customer/(:num)', 'Customer::delete/$1');
$routes->get('admin/transaction', 'Transaction::index');
$routes->get('admin/transaction/create', 'Transaction::create');
$routes->get('/transaction/edit/(:segment)', 'Transaction::edit/$1');
$routes->delete('/transaction/(:segment)', 'Transaction::delete/$1');
$routes->get('/profile', 'Pages::profile');

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
