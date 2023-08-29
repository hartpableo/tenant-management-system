<?php

namespace Http\Forms;

class SearchForm extends Form 
{
  public function __construct($searchValue)
  {
    // if (!Validator::string($attributes['name'], 2, INF)) $this->errors['name_error'] = 'Name is invalid!';
  }
}