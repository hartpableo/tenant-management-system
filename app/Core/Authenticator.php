<?php

namespace Core;

use Core\App;
use Core\Session;
use Core\Database;

class Authenticator 
{
  public function attempt($name, $email, $password) 
  {
    $user = App::resolve(Database::class)->query('select * from users where email = :email', [
      ':email' => $email
    ])->find();

    if ($user && $user['name'] === $name && password_verify($password, $user['password'])) {

      $this->login([
        'id' => $user['id'],
        'name' => $name,
        'email' => $email,
      ]);

      return true;

    }
  }

  public function emailExists($email)
  {
    $user = App::resolve(Database::class)->query('select * from users where email = :email', [
      ':email' => $email
    ])->find();

    if ($user) return true;
  }

  public function tenantExists($attributes = [])
  {
    $tenant = App::resolve(Database::class)->query('select * from tenants where name = :name and email = :email and contact = :contact and room = :room and rent_start = :rent_start', [
      ':name' => $attributes['name'],
      ':email' => $attributes['email'],
      ':contact' => $attributes['contact'],
      ':room' => $attributes['room'],
      ':rent_start' => $attributes['rent_start']
    ])->find();

    if ($tenant) return true;
  }

  public function login($user = []) {
    Session::put('user', $user);
    session_regenerate_id(true);
  }
  
  public function logout() {
    Session::destroy();
  }
}