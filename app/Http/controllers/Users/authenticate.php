<?php

use Core\Session;
use Core\Authenticator;
use Http\Forms\LoginForm;

$attributes = [
  'name' => $_POST['name'],
  'email' => $_POST['email'],
  'password' => $_POST['password']
];

$form = LoginForm::validate($attributes);

$signedIn = (new Authenticator())->attempt($attributes['name'], $attributes['email'], $attributes['password']);

// Validate User
if (!$signedIn) $form->addError('errors', 'User does not exist!')->throw();

Session::flash('message', [
  'logged_in' => 'You have successfully logged in!'
]);

redirect();