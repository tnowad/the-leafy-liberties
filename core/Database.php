<?php

namespace Core;

use mysqli;
use Utils\DotEnv;

class Database
{
  private static $instance = null;
  private static $connection = null;

  private function __construct()
  {
    $host = DotEnv::get('DB_HOST');
    $user = DotEnv::get('DB_USER');
    $password = DotEnv::get('DB_PASSWORD');
    $database = DotEnv::get('DB_NAME');
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

  public static function execute($sql, $params = [])
  {
    $stmt = self::$connection->prepare($sql);
    if (count($params) > 0) {
      $types = '';
      foreach ($params as $param) {
        if (is_int($param)) {
          $types .= 'i';
        } elseif (is_float($param)) {
          $types .= 'd';
        } elseif (is_string($param)) {
          $types .= 's';
        } else {
          $types .= 'b';
        }
      }
      $stmt->bind_param($types, ...$params);
    }
    $stmt->execute();
    return $stmt;
  }

  public static function prepare($sql)
  {
    return self::$connection->prepare($sql);
  }

  public static function fetchOne($sql, $params = [])
  {
    $stmt = self::execute($sql, $params);
    $result = $stmt->get_result();
    return $result->fetch_assoc();
  }

  public static function fetchAll($sql, $params = [])
  {
    $stmt = self::execute($sql, $params);
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public static function getLastInsertId($table, $primaryKey)
  {
    $sql = "SELECT $primaryKey FROM $table ORDER BY $primaryKey DESC LIMIT 1";
    $result = self::fetchOne($sql);
    return $result[$primaryKey];
  }
}