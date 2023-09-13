<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

$tenantsData = $db->query('select id, name, email, contact, room, rent_start from tenants order by id asc')->findAll();

if (!isset($_POST) || !count($tenantsData)) {
  Session::flash('errors', [
    'export_error' => 'Something went wrong with the export!'
  ]);

  redirect();
}

$datenow = date('M-Y--') . time();
$columnNames = [
  'ID',
  'Name',
  'Email Address',
  'Contact Number',
  'Room',
  'Rent Started'
];

header("Content-Type: application/csv");
header("Content-Disposition: attachment; filename=Tenants-Data--{$datenow}.csv");
header("Pragma: no-cache");

$outputFile = fopen('php://output', 'r+');

// Write column names to the file
fputcsv($outputFile, $columnNames);

// Write table data to the file
foreach ($tenantsData as $tenant) :
  fputcsv($outputFile, $tenant);
endforeach;

fclose($outputFile);