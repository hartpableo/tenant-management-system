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

//  Notes
$router->get('/', 'Tenants/index');
$router->get('/tenants/create', 'Tenants/create');