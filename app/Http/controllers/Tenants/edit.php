<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$tenant = $db->query('select * from tenants where id = :id', [
  ':id' => $_GET['id'],
])->findOrFail();

view('tenants/edit', [
  'errors' => [],
  'tenant' => $tenant
]);