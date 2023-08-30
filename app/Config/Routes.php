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
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Auth::index', ['filter' => 'logged_in', 'filter' => 'base_url']);
$routes->get('/login', 'Auth::index', ['filter' => 'logged_in']);
$routes->post('/login/auth', 'Auth::login');
$routes->get('/logout', 'Auth::logout');

$routes->group('admin', ['filter' => 'authenticate', 'filter' => 'admin'], function ($routes) {
    $routes->add('dashboard', 'Admin\Home::index');
    $routes->resource('classes', ['controller' => 'Admin\Classes']);
    $routes->add('users', 'Admin\User::index');
    $routes->add('perkuliahan', 'Admin\MajorSubject::index');
    $routes->resource('pengajaran', ['controller' => 'Admin\Teaching']);
    $routes->add('grup-mhs', 'Admin\StudentGroup::index');
});
$routes->group('d', ['filter' => 'authenticate', 'filter' => 'teacher'], function ($routes) {
    $routes->add('classes', 'D\Classes::index');
    $routes->add('classes/(.*)', 'D\Classes::show/$1');
    $routes->add('students/classes/(.*)', 'D\Classes::studentList/$1');
    $routes->resource('lessons', ['controller' => 'D\Lessons']);
    $routes->add('calendar', 'Calendar::index');
});
$routes->group('', ['filter' => 'authenticate', 'filter' => 'student'], function ($routes) {
    $routes->resource('m/classes');
    $routes->add('m/calendar', 'Calendar::index');
});
$routes->get('download/calendar', 'Download::calendar');
$routes->get('download/submit/(.*)', 'Download::mhsSubmit/$1');

// $routes->get('/dashboard', function () {
//     return view('dashboard');
// });
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
