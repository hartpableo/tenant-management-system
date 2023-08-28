<?php

use Core\App;
use Core\Database;
use Core\Response;
use Core\Validator;

$db = App::resolve(Database::class);

$current_user_id = getCurrentUserID();

$note = $db->query('select * from notes where id = :id', [
  ':id' => $_POST['id'],
])->findOrFail();

authorize($note['user_id'] !== $current_user_id, Response::NOT_FOUND);

$errors = [];

if (!Validator::string($_POST['body'], 1, 1000)) $errors['body'] = 'A body of no more than 1000 characters is required!';

if (!empty($errors)) {
  return view('notes/edit', [
    'title' => "Note #{$note['id']}",
    'note' => $note,
    'errors' => $errors
  ]);
}

$db->query('update notes set body = :body where id = :id', [
  ':body' => $_POST['body'],
  ':id' => $_POST['id']
]);

header("location: /note?id={$note['id']}");
exit();