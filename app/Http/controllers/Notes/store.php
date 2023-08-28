<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$current_user_id = getCurrentUserID();
echo $current_user_id;

$errors = [];

if (!Validator::string($_POST['body'], 1, 1000)) $errors['body'] = 'A body of no more than 1000 characters is required!';

if (!empty($errors)) {
  return view('notes/create', [
    'title' => 'Create Note',
    'errors' => $errors
  ]);
}

$db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
  'body' => $_POST['body'],
  'user_id' => $current_user_id,
]);

redirect('/');
exit();