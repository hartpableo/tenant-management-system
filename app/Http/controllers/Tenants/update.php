<?php

use Core\App;
use Core\Session;
use Core\Database;
use Http\Forms\UpdateTenantForm;

$db = App::resolve(Database::class);

$attributes = [
  'id' => $_POST['id'],
  'name' => trim($_POST['name']),
  'email' => $_POST['email'],
  'contact' => $_POST['contact'],
  'room' => $_POST['room']
];

$tenant = $db->query('select * from tenants where id = :id', [
  ':id' => $_POST['id'],
])->findOrFail();

$form = UpdateTenantForm::validate($attributes);

if (!$form) redirect('/tenant/edit');

$form->updateTenant($attributes);

Session::flash('message', [
  'updated' => "Success! {$tenant['name']}'s profile has been updated."
]);

redirect("/tenant/profile?id={$tenant['id']}");