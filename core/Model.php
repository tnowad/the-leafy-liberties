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
    $query = "SELECT * FROM $table WHERE $primaryKey = ?";
    $params = ['id' => $id];
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
    $params = ['value' => $value];
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
    // if id is set, update record else insert new record into database
    if (isset($this->attributes[$this->primaryKey])) {
      return $this->update();
    } else {
      return $this->insert();
    }
  }

  public function insert()
  {
    $table = static::table();
    $fields = array_keys($this->attributes);
    $values = array_values($this->attributes);
    $placeholders = array_fill(0, count($values), '?');
    $query = "INSERT INTO $table (" . implode(', ', $fields) . ") VALUES (" . implode(', ', $placeholders) . ")";
    $result = Database::getInstance()->execute($query, $values);

    if (!$result) {
      throw new Exception("Failed to insert record into $table");
    }

    return true;
  }

  public function update()
  {
    $table = static::table();
    $primaryKey = $this->primaryKey;
    $fields = array_keys($this->attributes);
    $values = array_values($this->attributes);
    $placeholders = array_map(function ($field) {
      return "$field = ?";
    }, $fields);
    $query = "UPDATE $table SET " . implode(', ', $placeholders) . " WHERE $primaryKey = ?";
    $values[] = $this->attributes[$primaryKey];
    $result = Database::getInstance()->execute($query, $values);

    if (!$result) {
      throw new Exception("Failed to update record in $table");
    }

    return true;
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

  public static function findOne($params = [])
  {
    $table = static::table();
    $query = "SELECT * FROM $table WHERE ";
    $conditions = [];
    $values = [];

    foreach ($params as $field => $value) {
      $conditions[] = "$field = :$field";
      $values[":$field"] = $value;
    }

    $query .= implode(' AND ', $conditions);

    $result = Database::getInstance()->fetchOne($query, $values);

    if (!$result) {
      return false;
    }

    return new static($result);
  }

  public function __set($name, $value)
  {
    if (in_array($name, $this->fillable)) {
      $this->attributes[$name] = $value;
    }
  }

  public function __get($name)
  {
    if (array_key_exists($name, $this->attributes)) {
      return $this->attributes[$name];
    }
  }
}