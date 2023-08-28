<?php

use Core\App;
use Core\Session;
use Core\Database;
use Core\Validator;
use Core\Authenticator;
use Http\Forms\RegistrationForm;

$db = App::resolve(Database::class);

$errors = [];

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Validate user register
$form = new RegistrationForm();

if ($form->validate($name, $email, $password)) {

  // Validate email of user and cancel registration if email already exists
  if ((new Authenticator())->emailExists($email)) {
    $form->addError('auth_error', 'Email is already in use!');
    Session::flash('errors', $form->getErrors());
    redirect('/user/register');
  }

  // Register new user if email is unique
  $form->register($name, $email, $password);
  Session::flash('message', [
    'registered' => 'You have successfully registered! Log in to continue.'
  ]);

  redirect('/user/login');
  
}