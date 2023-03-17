<?php

namespace Config;

// Create a new instance of our RouteCollection class.
use App\Controllers\Usuarios;

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

$routes->post('login','Usuarios::autenticacaoUser',['as' => 'entrar']);

//rotas relacionadas aos usuários
$routes->get('usuarios','Usuarios::index',['as'=>'usuarios']);
$routes->group('usuarios', static function ($routes) {
    $routes->get('exibir/(:num)', 'Usuarios::exibir/$1',['as'=>'exibiUsuarios']);
    $routes->get('editar/(:num)', 'Usuarios::editar/$1',['as'=>'editarUsuarios']);
    $routes->get('excluir/(:num)', 'Usuarios::excluir/$1',['as'=>'excluirUsuarios']);
    $routes->post('atualizar', 'Usuarios::atualizar',['as'=>'atualizarUsuarios']);
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
