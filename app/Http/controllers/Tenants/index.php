<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$tenants = $db->query('select * from tenants')->findAll();

view('tenants/index', [
  'tenants' => $tenants
]);