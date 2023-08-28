<?php

namespace Core;

use PDO;
use Core\Response;

class Database 
{
  public $connection;
  protected $statement;

  public function __construct()
  {
    $dsn = 'mysql:host=' . DBHOST . ';dbname=' . DBNAME . ';charset=utf8mb4';
    $this->connection = new PDO($dsn, DBUSER, DBPASS, [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
  }

  public function query($query, $params = [])
  {
    $this->statement = $this->connection->prepare($query);
    $this->statement->execute($params);
    
    return $this;
  }

  public function find()
  {
    return $this->statement->fetch();
  }

  public function findAll()
  {
    return $this->statement->fetchAll();
  }

  public function findOrFail()
  {
    $result = $this->find();
    
    if (!$result) abort(Response::NOT_FOUND);

    return $result;
  }
}