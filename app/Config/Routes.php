<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::index');
$routes->get('/cidades', 'Cidades::index');
$routes->get('/cidades/new', 'Cidades::new');
$routes->get('/cidades/edit/(:any)', 'Cidades::edit/$1');
$routes->get('/cidades/delete/(:any)', 'Cidades::delete/$1');


