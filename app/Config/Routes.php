<?php

defined('SYSTEMPATH') || exit('No direct script access allowed');

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

// Praktikum 1: Routing halaman dasar public
$routes->get('/', 'Home::index');
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');

// Praktikum 2: Artikel public dan detail
$routes->get('/artikel', 'Artikel::index');
$routes->get('/artikel/(:segment)', 'Artikel::view/$1');

// Praktikum 4: Login admin dipisah dari public
$routes->match(['get', 'post'], '/admin/login', 'User::login');
$routes->get('/admin/logout', 'User::logout');
$routes->match(['get', 'post'], '/user/login', 'User::login'); // alias agar tetap sesuai modul
$routes->get('/user/logout', 'User::logout');
$routes->get('/logout', 'User::logout');
$routes->get('/user', 'User::index', ['filter' => 'auth']);

// Praktikum 8: AJAX sederhana
$routes->get('/ajax', 'AjaxController::index');
$routes->get('/ajax/getData', 'AjaxController::getData');
$routes->delete('/ajax/delete/(:num)', 'AjaxController::delete/$1');
$routes->get('/ajax/delete/(:num)', 'AjaxController::delete/$1');

// Admin area dengan filter auth
$routes->group('admin', ['filter' => 'auth'], static function ($routes) {
    $routes->get('/', 'Admin::dashboard');
    $routes->get('dashboard', 'Admin::dashboard');
    $routes->get('artikel', 'Artikel::admin_index');
    $routes->match(['get', 'post'], 'artikel/add', 'Artikel::add');
    $routes->match(['get', 'post'], 'artikel/edit/(:num)', 'Artikel::edit/$1');
    $routes->get('artikel/toggle-terbaru/(:num)', 'Artikel::toggleTerbaru/$1');
    $routes->get('artikel/delete/(:num)', 'Artikel::delete/$1');
});

// Praktikum 10: REST API artikel
$routes->options('post', 'Post::options');
$routes->options('post/(:num)', 'Post::options');
$routes->get('post', 'Post::index');
$routes->get('post/(:num)', 'Post::show/$1');

// Praktikum 13: Endpoint login API untuk frontend VueJS SPA
$routes->options('api/login', 'Api\Auth::options');
$routes->post('api/login', 'Api\Auth::login');

// Praktikum 14: Method manipulasi data API wajib membawa Authorization: Bearer <token>
$routes->post('post', 'Post::create', ['filter' => 'apiauth']);
$routes->put('post/(:num)', 'Post::update/$1', ['filter' => 'apiauth']);
$routes->patch('post/(:num)', 'Post::update/$1', ['filter' => 'apiauth']);
$routes->delete('post/(:num)', 'Post::delete/$1', ['filter' => 'apiauth']);
