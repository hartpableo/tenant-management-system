<?php

use Core\App;
use Core\Database;
use Core\Response;

$db = App::resolve(Database::class);

$current_user_id = getCurrentUserID();

$note = $db->query('select * from notes where id = :id', [
  ':id' => $_GET['id'],
])->findOrFail();

authorize($note['user_id'] !== $current_user_id, Response::NOT_FOUND);

view('notes/show', [
  'title' => "Note #{$note['id']}",
  'note' => $note
]);