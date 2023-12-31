<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('User');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'User::index');
$routes->post('login/validate_credentials', 'User::validate_credentials');
$routes->get('welcome', 'User::admin_welcome');

// sidebar
$routes->get('admin/customer', 'Customer::index');
$routes->match(['get', 'post'],'admin/purchase', 'Customer::purchase');
$routes->get('admin/purchases', 'Customer::purchases');
// $routes->get('admin/customer/add', 'Customer::add');
$routes->match(['get', 'post'], 'admin/customer/edit/(:num)', 'Customer::update/$1');
$routes->match(['get', 'post'], 'admin/customer/info/(:any)', 'Customer::info');
$routes->get('admin/customer/total_partners/(:any)', 'Customer::total_partners');
$routes->get('admin/customer/total_purchase/(:any)', 'Customer::total_purchase');
$routes->get('admin/micro', 'Customer::micro');
$routes->get('admin/macro', 'Customer::macro');
$routes->get('admin/mega', 'Customer::mega');
$routes->get('admin/customer/partners_master', 'Customer::partners_master');
$routes->get('admin/customer/purchase_master', 'Customer::purchase_master');
$routes->match(['get', 'post'],'admin/update_user', 'Customer::update_user');

$routes->match(['get', 'post'],'update_customer', 'Customer::update_customer');

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
