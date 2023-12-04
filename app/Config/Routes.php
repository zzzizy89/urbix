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

// Seccion controlador Home
$routes->get('/', 'Home::index');
$routes->get('intro', 'Home::index');
$routes->get('intro_about', 'Home::intro_about');
$routes->get('intro_catalogo', 'Home::intro_catalogo');
$routes->get('intro_contacto', 'Home::intro_contacto');
$routes->get('intro_login', 'Home::intro_login');
$routes->get('intro_inicio', 'Home::intro_inicio');
$routes->get('intro_dashboard', 'Home::intro_dashboard');
$routes->get('inicio', 'Home::inicio');
$routes->get('about', 'Home::about');
$routes->get('contact', 'Home::contact');

// Seccion controlador Login
$routes->get('/login', 'Login::index');
$routes->post('/login', 'Login::do_login');

// Seccion controlador Register
$routes->get('/register', 'Register::index');
$routes->post('/register', 'Register::do_register');

// Seccion controlador Dashboard
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/home', 'Dashboard::home');
$routes->get('logout', 'Dashboard::logout');
$routes->post('update', 'Dashboard::update'); // Ruta para actualizar el nombre de usuario
$routes->post('upload-profile-image', 'Dashboard::uploadProfileImage'); // Ruta para cargar la imagen de perfil

// Seccion controlador Productos

$routes->get('catalogo', 'Productos::catalogo');
$routes->get('desc_producto', 'Productos::desc_producto');
$routes->get('listar', 'Productos::index');
$routes->get('crear', 'Productos::crear');
$routes->post('guardar', 'Productos::guardar');
$routes->get('eliminar/(:num)', 'Productos::eliminar/$1');
$routes->get('editar/(:num)', 'Productos::editar/$1');
$routes->post('actualizar', 'Productos::actualizar');
$routes->get('inicio', 'Productos::inicio');
$routes->get('about', 'Productos::about');


// seccion controlador Email2

$routes->post('enviar__email', 'Email2::enviar_email');


// seccion controlador Carrito

// Ruta sin parámetro
$routes->get('carrito','Carrito::index');
// Ruta con parámetro
$routes->get('carritop/(:any)','Carrito::index/$1');
$routes->post('carrito/guar','Carrito::guardar');
//
$routes->get('productof/(:any)', 'Carrito::filtrarPorTipo/$1');

// seccion controlador Carrito2

$routes->get('carrito2','carrito2::index');
$routes->get('carrito2/eliminarcar/(:num)', 'carrito2::eliminarcar/$1');
$routes->post('carrito2/actualizarcar/', 'carrito2::actualizarcar');

// seccion controlador Comprass

$routes->get('comprar/', 'Comprass::index');
$routes->get('checkout', 'Comprass::check');
$routes->get('realizar_compra/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)', 'Comprass::confirmarCompra/$1/$2/$3/$4/$5/$6/$7/$8');

// seccion controlador Compradir

$routes->get('realizar_compra_dir/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)', 'Compradir::Compradirecta/$1/$2/$3/$4/$5/$6/$7/$8');
$routes->get('compra_dir/', 'Compradir::index');
$routes->post('compradirca/', 'Compradir::Compradirtotal');
$routes->get('cancelcompradir/', 'Compradir::cancelcompradir');

//Control de compras
$routes->get('control_compras/', 'Controlcompras::index');
$routes->get('gencompras/', 'Controlcompras::gencompras');
$routes->get('compras/', 'Controlcompras::usercompras');


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




//$routes->get('completado/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)', 'catalogo::completado/$1/$2/$3/$4/$5/$6/$7');






