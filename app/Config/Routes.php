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
$routes->setDefaultController('Website');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.

$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// Every public route answers HEAD as well as GET. CodeIgniter treats HEAD as a
// verb of its own, so a plain get() route replies 404 to a HEAD request, which
// would make uptime monitors report the site as down.
$verbs = ['GET', 'HEAD'];

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->match($verbs, '/', 'Website::index');
$routes->match($verbs, '/topic/(:segment)', 'Website::topic/$1');
$routes->match($verbs, '/topic/(:segment)/(:segment)', 'Website::topic/$1/$2');
$routes->match($verbs, '/forum/(:segment)', 'Website::forum/$1');
$routes->match($verbs, '/forum/(:segment)/(:segment)', 'Website::forum/$1/$2');
$routes->match($verbs, '/attachment/(:num)', 'Attachment::download/$1');

// Redirects
$routes->match($verbs, '/best-content', 'Redirects::redirect_to_home_page');
$routes->match($verbs, '/some/edit/link/(:segment)', 'Redirects::redirect_to_home_page');
$routes->match($verbs, '/tags/(:segment)/(:segment)', 'Redirects::redirect_to_home_page');
$routes->match($verbs, '/tags/(:segment)', 'Redirects::redirect_to_home_page');
$routes->match($verbs, '/user/(:segment)', 'Redirects::redirect_to_home_page');

$routes->cli('sitemap/generate', 'Sitemap::generate');

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
