<?php

namespace Http\Forms;

use Core\App;
use Core\Database;
use Core\Validator;
use Http\Forms\Form;

class RegistrationForm extends Form
{
  public function validate($name, $email, $password)
  {
    if (!Validator::string($name, 2, INF)) $this->errors['name_error'] = 'Name is invalid!';
    if (!Validator::email($email)) $this->errors['email_error'] = 'Email is invalid!';
    if (!Validator::string($password, 7, 255)) $this->errors['password_error'] = 'Password is invalid!';

    return empty($this->errors);
  }

  public function register($name, $email, $password) 
  {
    App::resolve(Database::class)->query('INSERT INTO users(name, email, password) VALUES(:name, :email, :password)', [
      ':name' => $name,
      ':email' => $email,
      ':password' => password_hash($password, PASSWORD_BCRYPT)
    ]);
  }
}