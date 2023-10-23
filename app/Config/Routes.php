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
$routes->get('/', 'Home::index');

$routes->get('/login', 'Login::index');
$routes->get('/register', 'Register::index');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/home', 'Dashboard::home');
$routes->get('logout', 'Dashboard::logout');
$routes->post('update', 'Dashboard::update'); // Ruta para actualizar el nombre de usuario
$routes->post('upload-profile-image', 'Dashboard::uploadProfileImage'); // Ruta para cargar la imagen de perfil
$routes->get('intro', 'home::index');
$routes->get('intro_catalogo', 'home::intro_catalogo');
$routes->get('intro_contacto', 'home::intro_contacto');
$routes->get('intro_login', 'home::intro_login');
$routes->get('intro_inicio', 'home::intro_inicio');
$routes->get('intro_dashboard', 'home::intro_dashboard');
$routes->post('/login', 'Login::do_login');
$routes->post('/register', 'Register::do_register');
$routes->get('catalogo', 'Productos::catalogo');
$routes->get('desc_producto', 'Productos::desc_producto');
$routes->get('contact', 'home::contact');

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


$routes->get('listar', 'Productos::index');
$routes->get('crear', 'Productos::crear');
$routes->post('guardar', 'Productos::guardar');
$routes->get('eliminar/(:num)', 'Productos::eliminar/$1');
$routes->get('editar/(:num)', 'Productos::editar/$1');
$routes->post('actualizar', 'Productos::actualizar');

$routes->get('inicio', 'home::inicio');
$routes->get('inicio', 'Productos::inicio');
$routes->get('about', 'Productos::about');
$routes->get('catalogo', 'catalogo::shop');
$routes->get('completado', 'catalogo::completado');
$routes->get('form_email', 'Email::index');
$routes->post('enviar_email', 'Email::enviar_email');
$routes->get('inicio', 'Emaill::index');
$routes->post('enviar__email', 'Email2::enviar__email');
$routes->get('test', 'Test::index');
$routes->get('carrito','Carrito::index');
$routes->post('carrito/guar','Carrito::guardar');
$routes->get('carrito2','Carrito2::index');
$routes->get('carrito2/eliminarcar/(:num)', 'Carrito2::eliminarcar/$1');
$routes->post('carrito2/actualizarcar/', 'Carrito2::actualizarcar');