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
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/about', 'Home::about');
$routes->get('/services', 'Home::services');
$routes->get('/berita/(:segment)', 'Home::berita/$1');
$routes->get('/berita/(:segment)/(:segment)', 'Home::detail_berita/$1/$2');
$routes->get('/wisata/(:segment)', 'Home::wisata/$1');
$routes->get('/wisata/(:segment)/(:segment)', 'Home::detail_wisata/$1/$2');
$routes->get('/admin', 'Admin::akun', ['filter' => 'login']);
$routes->get('/admin/akun', 'Admin::akun', ['filter' => 'login']);
$routes->get('/admin/akun', 'Admin::akun', ['filter' => 'role:super-admin']);
$routes->get('/admin/news', 'Admin::news', ['filter' => 'login']);
$routes->get('/admin/news', 'Admin::news', ['filter' => 'role:admin,super-admin']);
$routes->get('/admin/travel', 'Admin::travel', ['filter' => 'login']);
$routes->get('/admin/travel', 'Admin::travel', ['filter' => 'role:admin,super-admin']);
$routes->get('/admin/contact', 'Admin::contact', ['filter' => 'login']);
$routes->get('/admin/contact', 'Admin::contact', ['filter' => 'role:admin,super-admin']);

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
