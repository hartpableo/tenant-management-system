<?php

namespace Http\Forms;

use Core\App;
use Core\Database;
use Core\Formatter;
use Core\Validator;
use Core\ValidationException;

class UpdateTenantForm extends Form
{
  public function __construct(public array $attributes)
  {
    if (!Validator::string($attributes['name'], 2, INF)) $this->errors['name_error'] = 'Name is invalid!';
    if (!Validator::email($attributes['email'])) $this->errors['email_error'] = 'Email is invalid!';
    if (!Validator::contactNumber($attributes['contact'], 15, 20)) $this->errors['contact_error'] = 'Contact number is invalid!';
    if (!Validator::string($attributes['room'], 2, INF)) $this->errors['room_error'] = 'Room is invalid!';
  }

  public static function validate($attributes)
  {
    $instance = new static($attributes);

    return $instance->failed() ? $instance->throw() : $instance;
  }

  public function updateTenant($attributes = []) 
  {
    App::resolve(Database::class)->query('update tenants set name = :name, email = :email, contact = :contact, room = :room where id = :id', [
      ':id' => $attributes['id'],
      ':name' => $attributes['name'],
      ':email' => $attributes['email'],
      ':contact' => Formatter::phoneNumber($attributes['contact']),
      ':room' => $attributes['room']
    ]);
  }

  public function throw()
  {
    ValidationException::throw($this->getErrors(), $this->attributes);
  }
}