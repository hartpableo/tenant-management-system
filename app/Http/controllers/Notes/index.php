<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$current_user_id = getCurrentUserID();

$notes = $db->query('select * from notes where user_id = :user_id', [
  ':user_id' => $current_user_id
])->findAll();

view('notes/index', [
  'title' => 'All Notes',
  'notes' => $notes
]);