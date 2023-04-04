<?php
namespace Core;

use Core\Database;
use Exception;

abstract class Model
{
  protected $table;

  protected string $primaryKey = 'id';

  protected $fillable = [];

  protected $attributes = [];

  public function __construct($attributes = [])
  {
    $this->attributes = $attributes;
  }

  public static function table()
  {
    $instance = new static;
    return $instance->table ?? strtolower(get_called_class()) . 's';
  }

  public static function find($id)
  {
    $table = static::table();
    $primaryKey = (new static )->primaryKey;
    $query = "SELECT * FROM $table WHERE $primaryKey = :id";
    $params = [':id' => $id];
    $result = Database::getInstance()->fetchOne($query, $params);

    if (!$result) {
      throw new Exception("Record not found with $primaryKey = $id");
    }

    return new static($result);
  }

  public static function where($field, $value)
  {
    $table = static::table();
    $query = "SELECT * FROM $table WHERE $field = :value";
    $params = [':value' => $value];
    $results = Database::getInstance()->fetchAll($query, $params);

    return array_map(function ($result) {
      return new static($result);
    }, $results);
  }

  public static function all()
  {
    $table = static::table();
    $query = "SELECT * FROM $table";
    $results = Database::getInstance()->fetchAll($query);

    return array_map(function ($result) {
      return new static($result);
    }, $results);
  }

  public function save()
  {
    $table = static::table();
    $primaryKey = $this->primaryKey;

    if (empty($this->attributes[$primaryKey])) {
      $query = "INSERT INTO $table ";
      $params = [];
      $columns = [];
      $values = [];

      foreach ($this->fillable as $field) {
        if (isset($this->attributes[$field])) {
          $columns[] = $field;
          $values[] = ':' . $field;
          $params[':' . $field] = $this->attributes[$field];
        }
      }

      $query .= '(' . implode(', ', $columns) . ') ';
      $query .= 'VALUES (' . implode(', ', $values) . ')';

      $result = Database::getInstance()->execute($query, $params);

      if (!$result) {
        throw new Exception("Failed to insert record into $table");
      }

      $this->attributes[$primaryKey] = Database::getInstance()->getLastInsertId($table, $primaryKey);
    } else {
      $query = "UPDATE $table SET ";
      $params = [];
      $columns = [];

      foreach ($this->fillable as $field) {
        if (isset($this->attributes[$field])) {
          $columns[] = $field . ' = :' . $field;
          $params[':' . $field] = $this->attributes[$field];
        }
      }

      $query .= implode(', ', $columns);
      $query .= " WHERE $primaryKey = :$primaryKey";
      $params[':' . $primaryKey] = $this->attributes[$primaryKey];

      $result = Database::getInstance()->execute($query, $params);

      if (!$result) {
        throw new Exception("Failed to update record in $table");
      }
    }
  }

  public function delete()
  {
    $table = static::table();
    $primaryKey = $this->primaryKey;
    $query = "DELETE FROM $table WHERE $primaryKey = :$primaryKey";
    $params = [':' . $primaryKey => $this->attributes[$primaryKey]];
    $result = Database::getInstance()->execute($query, $params);

    if (!$result) {
      throw new Exception("Failed to delete record from $table");
    }

    return true;
  }

  public function __get($name)
  {
    if (array_key_exists($name, $this->attributes)) {
      return $this->attributes[$name];
    }
  }

  public function __set($name, $value)
  {
    if (in_array($name, $this->fillable)) {
      $this->attributes[$name] = $value;
    }
  }
}