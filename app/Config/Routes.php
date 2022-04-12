<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->group('',['filter'=>'AuthCheck'], function($routes){
    /*agregar todas las rutas necesitan estar protegidas por este filtro*/
    $routes->get('/back-end', 'Dashboard::index');
    $routes->get('/back-end/profile', 'Dashboard::profile');
});

$routes->group('',['filter'=>'AlreadyLoggedIn'], function($routes){
    /*agregar todas las rutas necesitan estar protegidas por este filtro*/
    $routes->get('/auth', 'Auth::index');
    $routes->get('/auth/registro', 'Auth::registro');
});

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
/*Vista de los platillos*/
$routes->get('/homes', 'Base');
$routes->get('listar', 'Platillos::index');
$routes->get('crear', 'Platillos::crear');
$routes->post('guardar', 'Platillos::guardar');
$routes->get('borrar/(:num)', 'Platillos::borrar/$1');
$routes->get('editar/(:num)', 'Platillos::editar/$1');
$routes->post('actualizar', 'Platillos::actualizar');
/*Vista de las bebidas*/
$routes->get('listar1', 'Bebidas::index1');
$routes->get('crear1', 'Bebidas::crear1');
$routes->post('guardar1', 'Bebidas::guardar1');
$routes->get('borrar1/(:num)', 'Bebidas::borrar1/$1');
$routes->get('editar1/(:num)', 'Bebidas::editar1/$1');
$routes->post('actualizar1', 'Bebidas::actualizar1');
/*Vista de los comentarios*/
$routes->get('listar3', 'Comentarios::index2');
$routes->post('guardarC', 'Comentarios::guardarC');
$routes->get('borrarC/(:num)', 'Comentarios::borrarC/$1');
