<?php

namespace Core;

use Core\Database;
use Exception;

abstract class Model
{
  protected $table;
  protected $primaryKey = 'id';
  protected $fillable = [];
  protected $attributes = [];
  protected static $db;

  public function __construct($attributes = [])
  {
    $this->attributes = $attributes;
    self::$db = Database::getInstance();
  }

  public static function find($id)
  {
    $table = (new static )->table;
    $primaryKey = (new static )->primaryKey;
    $query = "SELECT * FROM $table WHERE $primaryKey = ?";
    $result = self::$db->select($query, [$id]);
    if (!empty($result)) {
      return new static($result[0]);
    }
    return null;
  }

  public static function findOne($params)
  {
    $table = (new static )->table;
    $query = "SELECT * FROM $table WHERE ";
    $values = [];
    foreach ($params as $key => $value) {
      $query .= "$key = ? AND ";
      $values[] = $value;
    }
    $query = rtrim($query, " AND ");
    $result = self::$db->select($query, $values);
    if (!empty($result)) {
      return new static($result[0]);
    }
    return null;
  }

  public static function where($params)
  {
    $table = (new static )->table;
    $primaryKey = (new static )->primaryKey;
    $query = "SELECT * FROM $table WHERE ";
    $values = [];
    foreach ($params as $key => $value) {
      $query .= "$key = ? AND ";
      $values[] = $value;
    }
    $query = rtrim($query, " AND ");
    $result = self::$db->select($query, $values);
    $models = [];
    foreach ($result as $row) {
      $models[] = new static($row);
    }
    return $models;
  }

  public static function all()
  {
    $table = (new static )->table;
    $query = "SELECT * FROM $table";
    $result = self::$db->select($query);
    $models = [];
    foreach ($result as $row) {
      $models[] = new static($row);
    }
    return $models;
  }

  public function save()
  {
    $table = $this->table;
    $primaryKey = $this->primaryKey;
    $fillable = $this->fillable;
    $attributes = array_intersect_key($this->attributes, array_flip($fillable));
    $columns = implode(", ", array_keys($attributes));
    $placeholders = implode(", ", array_fill(0, count($attributes), "?"));
    $values = array_values($attributes);

    if (isset($this->attributes[$primaryKey])) {
      // Update an existing model
      $id = $this->attributes[$primaryKey];
      $setClause = implode(" = ?, ", array_keys($attributes)) . " = ?";
      $query = "UPDATE $table SET $setClause WHERE $primaryKey = ?";
      $values[] = $id;
      self::$db->update($query, $values);
    } else {
      // Create a new model
      $query = "INSERT INTO $table ($columns) VALUES ($placeholders)";
      self::$db->insert($query, $values);
      $this->attributes[$primaryKey] = self::$db->getLastInsertedId();
    }
  }

  public function delete()
  {
    $table = $this->table;
    $primaryKey = $this->primaryKey;
    $id = $this->attributes[$primaryKey];
    $query = "DELETE FROM $table WHERE $primaryKey = ?";
    self::$db->delete($query, [$id]);
  }
  public function toJson()
  {
    return json_encode($this->attributes);
  }

  public function __get($key)
  {
    return $this->attributes[$key] ?? null;
  }

  public function __set($key, $value)
  {
    $this->attributes[$key] = $value;
  }
}