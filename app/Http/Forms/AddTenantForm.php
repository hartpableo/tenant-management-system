<?php

namespace Http\Forms;

use Core\App;
use Core\Image;
use Core\Database;
use Core\Formatter;
use Core\Validator;
use Http\Forms\Form;
use Core\ValidationException;

class AddTenantForm extends Form
{
  public function __construct(public array $attributes)
  {
    if (!Validator::string($attributes['name'], 2, INF)) $this->errors['name_error'] = 'Name is invalid!';
    if (!Validator::email($attributes['email'])) $this->errors['email_error'] = 'Email is invalid!';
    if (!Validator::contactNumber($attributes['contact'], 15, 20)) $this->errors['contact_error'] = 'Contact number is invalid!';
    if (!Validator::string($attributes['room'], 2, INF)) $this->errors['room_error'] = 'Room is invalid!';
    if (!Validator::date($attributes['rent_start'])) $this->errors['date_error'] = 'Rent start date is missing!';
    if (!Validator::imageValidate($attributes['profile_image'])) $this->errors['image_error'] = 'Image is invalid!';
  }

  public static function validate($attributes)
  {
    $instance = new static($attributes);

    return $instance->failed() ? $instance->throw() : $instance;
  }

  public function register($attributes = []) 
  {
    App::resolve(Database::class)->query('INSERT INTO tenants(name, email, contact, profile_image, room, rent_start) VALUES(:name, :email, :contact, :profile_image, :room, :rent_start)', [
      ':name' => $attributes['name'],
      ':email' => $attributes['email'],
      ':contact' => Formatter::phoneNumber($attributes['contact']),
      ':profile_image' => Image::handleImage($attributes['profile_image']['name']),
      ':room' => $attributes['room'],
      ':rent_start' => convertDate($attributes['rent_start']),
    ]);
  }

  public function throw()
  {
    ValidationException::throw($this->getErrors(), $this->attributes);
  }
}