<?php

use Core\App;
use Core\Database;
use Core\Response;

$db = App::resolve(Database::class);

$current_user_id = getCurrentUserID();

$id = $_POST['id'];
$method = $_POST['_method'];

$note = $db->query('select * from notes where id = :id', [
  ':id' => $id,
])->findOrFail();

authorize($note['user_id'] !== $current_user_id, Response::FORBIDDEN);

$db->query('delete from notes where id = :id', [
  ':id' => $id
]);

header('location: /');
exit();