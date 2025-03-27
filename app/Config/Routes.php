<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::index');

$routes->get('/cidades', 'Cidades::index');
$routes->get('/cidades/index', 'Cidades::index');
$routes->get('/cidades/new', 'Cidades::new');
$routes->post('/cidades/create', 'Cidades::create');
$routes->get('/cidades/edit/(:any)', 'Cidades::edit/$1');
$routes->post('/cidades/update', 'Cidades::update');
$routes->post('/cidades/search', 'Cidades::search');
$routes->get('/cidades/delete/(:any)', 'Cidades::delete/$1');

$routes->get('/categorias', 'Categorias::index');
$routes->get('/categorias/index', 'Categorias::index');
$routes->get('/categorias/new', 'Categorias::new');
$routes->post('/categorias/create', 'Categorias::create');
$routes->get('/categorias/edit/(:any)', 'Categorias::edit/$1');
$routes->post('/categorias/update', 'Categorias::update');
$routes->post('/categorias/search', 'Categorias::search');
$routes->get('/categorias/delete/(:any)', 'Categorias::delete/$1');
