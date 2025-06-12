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

$routes->get('/produtos', 'Produtos::index');
$routes->get('/produtos/index', 'Produtos::index');
$routes->get('/produtos/new', 'Produtos::new');
$routes->post('/produtos/create', 'Produtos::create');
$routes->get('/produtos/edit/(:any)', 'Produtos::edit/$1');
$routes->post('/produtos/update', 'Produtos::update');
$routes->post('/produtos/search', 'Produtos::search');
$routes->get('/produtos/delete/(:any)', 'Produtos::delete/$1');

$routes->get('/usuarios', 'Usuarios::index');
$routes->get('/usuarios/index', 'Usuarios::index');
$routes->get('/usuarios/new', 'Usuarios::new');
$routes->post('/usuarios/create', 'Usuarios::create');
$routes->get('/usuarios/edit/(:any)', 'Usuarios::edit/$1');
$routes->get('/usuarios/delete/(:any)', 'Usuarios::delete/$1');
$routes->post('/usuarios/update', 'Usuarios::update');
$routes->post('/usuarios/search', 'Usuarios::search');

$routes->get('/usuarios/edit_senha', 'Usuarios::edit_senha');
$routes->post('/usuarios/salvar_senha', 'Usuarios::salvar_senha');

$routes->get('/usuarios/edit_nivel', 'Usuarios::edit_nivel');
$routes->post('/usuarios/salvar_nivel', 'Usuarios::salvar_nivel');

$routes->get('/login', 'Login::index');
$routes->get('/login/index', 'Login::index');
$routes->post('/login/logar', 'Login::logar');
$routes->get('/login/logout', 'Login::logout');


$routes->get('/admin', 'Admin::index');
$routes->get('/admin/index', 'Admin::index');

$routes->get('/user', 'User::index');
$routes->get('/user/index', 'User::index');

$routes->get('/imgprodutos', 'Imgprodutos::index');
$routes->get('/imgprodutos/index', 'Imgprodutos::index');
$routes->get('/imgprodutos/new', 'Imgprodutos::new');
$routes->post('/imgprodutos/create', 'Imgprodutos::create');
$routes->get('/imgprodutos/edit/(:any)', 'Imgprodutos::edit/$1');
$routes->post('/imgprodutos/update', 'Imgprodutos::update');
$routes->post('/imgprodutos/search', 'Imgprodutos::search');
$routes->get('/imgprodutos/delete/(:any)', 'Imgprodutos::delete/$1');

$routes->get('/enderecos', 'Enderecos::index');
$routes->get('/enderecos/index', 'Enderecos::index');
$routes->get('/enderecos/new', 'Enderecos::new');
$routes->post('/enderecos/create', 'Enderecos::create');
$routes->get('/enderecos/edit/(:any)', 'Enderecos::edit/$1');
$routes->get('/enderecos/delete/(:any)', 'Enderecos::delete/$1');
$routes->post('/enderecos/update', 'Enderecos::update');
$routes->post('/enderecos/search', 'Enderecos::search');

$routes->get('/clientes', 'Clientes::index');
$routes->get('/clientes/index', 'Clientes::index');
$routes->get('/clientes/new', 'Clientes::new');
$routes->post('/clientes/create', 'Clientes::create');
$routes->get('/clientes/edit/(:any)', 'Clientes::edit/$1');
$routes->get('/clientes/delete/(:any)', 'Clientes::delete/$1');
$routes->post('/clientes/update', 'Clientes::update');
$routes->post('/clientes/search', 'Clientes::search');

$routes->get('/funcionarios', 'Funcionarios::index/');
$routes->post('/funcionarios/create', 'Funcionarios::create');
$routes->post('/funcionarios/store', 'Funcionarios::store');
$routes->get('/funcionarios/new', 'Funcionarios::new');
$routes->get('/funcionarios/edit/(:any)', 'Funcionarios::edit/$1');
$routes->post('/funcionarios/update/(:num)', 'Funcionarios::update/$1');
$routes->get('/funcionarios/delete/(:num)', 'Funcionarios::delete/$1');

$routes->get('/funcionarios', 'Funcionarios::index');
$routes->get('/funcionarios/index', 'Funcionarios::index');
$routes->get('/funcionarios/new', 'Funcionarios::new');
$routes->post('/funcionarios/create', 'Funcionarios::create');
$routes->get('/funcionarios/edit/(:any)', 'Funcionarios::edit/$1');
$routes->get('/funcionarios/delete/(:any)', 'Funcionarios::delete/$1');
$routes->post('/funcionarios/update', 'Funcionarios::update');
$routes->post('/funcionarios/search', 'Funcionarios::search');

$routes->get('/estoques', 'Estoques::index');
$routes->get('/estoques/index', 'Estoques::index');
$routes->get('/estoques/new', 'Estoques::new');
$routes->post('/estoques/create', 'Estoques::create');
$routes->get('/estoques/edit/(:any)', 'Estoques::edit/$1');
$routes->get('/estoques/delete/(:any)', 'Estoques::delete/$1');
$routes->post('/estoques/update', 'Estoques::update');
$routes->post('/estoques/search', 'Estoques::search');

$routes->get('entregas', 'Entregas::index/');
$routes->post('entregas/create', 'Entregas::create');
$routes->post('entregas/store', 'Entregas::store');
$routes->get('/entregas/new', 'Entregas::new');
$routes->get('entregas/edit/(:any)', 'Entregas::edit/$1');
$routes->post('entregas/update', 'Entregas::update');
$routes->get('entregas/delete/(:num)', 'Entregas::delete/$1');

$routes->get('/vendas', 'Vendas::index');
$routes->get('/vendas/index', 'Vendas::index');
$routes->get('/vendas/new', 'Vendas::new');
$routes->post('/vendas/create', 'Vendas::create');
$routes->get('/vendas/edit/(:any)', 'Vendas::edit/$1');
$routes->get('/vendas/delete/(:any)', 'Vendas::delete/$1');
$routes->post('/vendas/update', 'Vendas::update');
$routes->post('/vendas/search', 'Vendas::search');

$routes->get('/pedidos', 'Pedidos::index');
$routes->get('/pedidos/index', 'Pedidos::index');
$routes->get('/pedidos/new', 'Pedidos::new');
$routes->post('/pedidos/create', 'Pedidos::create');
$routes->get('/pedidos/edit/(:any)', 'Pedidos::edit/$1');
$routes->get('/pedidos/delete/(:any)', 'Pedidos::delete/$1');
$routes->post('/pedidos/update', 'Pedidos::update');
$routes->post('/pedidos/search', 'Pedidos::search');





