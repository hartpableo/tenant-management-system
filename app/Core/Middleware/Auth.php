<?php

namespace Core\Middleware;

use Core\Response;

class Auth 
{
  public function handle()
  {
    if (!isset($_SESSION['user'])) 
    {
      // header('location: /');
      abort(Response::FORBIDDEN);
      exit();
    }
  }
}