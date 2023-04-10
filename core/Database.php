<?php

namespace Core;

use Exception;
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

    self::$connection->select_db($database);
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

  public static function execute($query, $params = [])
  {
    $connection = static::getInstance()->getConnection();
    $statement = $connection->prepare($query);
    if (!$statement) {
      throw new Exception("Database query preparation failed: " . $connection->error);
    }
    if (!empty($params)) {
      $types = str_repeat("s", count($params));
      $bindParams = array_merge([$types], $params);
      $bindParamsRefs = array();
      foreach ($bindParams as $key => $value) {
        $bindParamsRefs[$key] = &$bindParams[$key];
      }
      call_user_func_array(array($statement, 'bind_param'), $bindParamsRefs);
    }
    // ($params);
    $result = $statement->execute();
    if (!$result) {
      throw new Exception("Database query execution failed: " . $connection->error);
    }

    return $statement;
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

  public static function lastInsertId($table, $primaryKey)
  {
    $sql = "SELECT $primaryKey FROM $table ORDER BY $primaryKey DESC LIMIT 1";
    $result = self::fetchOne($sql);
    return $result[$primaryKey];
  }
}
