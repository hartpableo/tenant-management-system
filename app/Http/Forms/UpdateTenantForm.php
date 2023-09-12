<?php

namespace Http\Forms;

use Core\App;
use Core\Image;
use Core\Database;
use Core\Formatter;
use Core\Validator;
use Http\Forms\Form;
use Core\ValidationException;

class UpdateTenantForm extends Form
{
  public function __construct(public array $attributes)
  {
    if (!Validator::string($attributes['name'], 2, INF)) $this->errors['name_error'] = 'Name is invalid!';
    if (!Validator::email($attributes['email'])) $this->errors['email_error'] = 'Email is invalid!';
    if (!Validator::contactNumber($attributes['contact'], 15, 20)) $this->errors['contact_error'] = 'Contact number is invalid!';
    if (!Validator::string($attributes['room'], 2, INF)) $this->errors['room_error'] = 'Room is invalid!';
    if (!Validator::imageValidate($attributes['profile_image'])) $this->errors['image_error'] = 'Image is invalid!';
  }

  public static function validate($attributes)
  {
    $instance = new static($attributes);
    return ($instance->failed()) ? $instance->throw() : $instance;
  }

  public function updateTenant($attributes = []) 
  {
    App::resolve(Database::class)->query('update tenants set name = :name, email = :email, contact = :contact, profile_image = :profile_image, room = :room where id = :id', [
      ':id' => $_POST['id'],
      ':name' => $attributes['name'],
      ':email' => $attributes['email'],
      ':contact' => Formatter::phoneNumber($attributes['contact']),
      ':profile_image' => Image::handleImage($attributes['profile_image']['name']),
      ':room' => $attributes['room']
    ]);
  }

  public function throw()
  {
    ValidationException::throw($this->getErrors(), $this->attributes);
  }
}