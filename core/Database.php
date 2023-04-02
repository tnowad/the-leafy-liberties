<?php
namespace Library;

use Library\DotEnv;
use mysqli;

class Database
{
  private static $instance = null;
  private static $connection = null;

  private function __construct()
  {
    $host = DotEnv::get('DB_HOST');
    $user = DotEnv::get('DB_USER');
    $password = DotEnv::get('DB_PASSWORD');
    $database = DotEnv::get('DB_DATABASE');
    self::$connection = new mysqli($host, $user, $password, $database);
    if (self::$connection->connect_error) {
      die('Connection failed: ' . self::$connection->connect_error);
    }
  }

  public static function getInstance()
  {
    if (self::$instance === null) {
      self::$instance = new Database();
    }
    return self::$instance;
  }

  public function getConnection()
  {
    return self::$connection;
  }
}