<?php

use Core\Session;

view('users/login', [
  'title' => 'Login',
  'errors' => Session::get('errors')
]);