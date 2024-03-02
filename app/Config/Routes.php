<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');
$routes->add('LoginValidation/', 'Login::login_validation');
$routes->add('Panel-Principal', 'Home::index', ['as' => 'Panel-Principal']);
$routes->add('Salir', 'Home::logout');
$routes->add('Modulo-Usuarios', 'Users::index', ['as' => 'Modulo-Usuarios']);
$routes->add('Modulo-Usuarios/Save/(:any)', 'Users::save/$1');
$routes->add('Reporte-Ventas', 'Sales::index', ['as' => 'Reporte-Ventas']);