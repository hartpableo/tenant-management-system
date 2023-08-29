<?php

use Core\Router;

$router = new Router();

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

/**
 * ==================
 * ===== Routes =====
 * ==================
 */
$router->get('/login', 'Managers/login')->only('guest');
$router->post('/manager/authenticate', 'Managers/authenticate')->only('guest');
$router->get('/', 'Tenants/index')->only('auth');
$router->get('/tenants/create', 'Tenants/create')->only('auth');
$router->post('/tenant/store', 'Tenants/store')->only('auth');
$router->delete('/tenant/delete', 'Tenants/destroy')->only('auth');
$router->get('/tenant/profile', 'Tenants/show')->only('auth');
$router->get('/tenant/edit', 'Tenants/edit')->only('auth');
$router->patch('/tenant/update', 'Tenants/update')->only('auth');