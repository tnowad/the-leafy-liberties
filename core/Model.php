<?php
namespace Core;

use Core\Database;
use Exception;

abstract class Model
{
  protected string $table = '';

  protected $columns = [];

  protected $data = [];

  public function __construct()
  {
    if ($this->table === '') {
      throw new Exception('Table name is not defined in the model class');
    }
    if (empty($this->columns)) {
      try {
        $this->columns = $this->getColumns();
      } catch (Exception $e) {
        throw new Exception($e->getMessage());
      }
    }
  }

  public function getColumns()
  {
    $sql = "SHOW COLUMNS FROM $this->table";
    $stmt = Database::getInstance()->getConnection()->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $columns = [];
    while ($row = $result->fetch_assoc()) {
      $columns[] = $row;
    }
    return $columns;
  }

  public function __get($name)
  {
    if (in_array($name, $this->columns)) {
      return $this->data[$name];
    }
    return null;
  }

  public function __set($name, $value)
  {
    if (in_array($name, $this->columns)) {
      $this->data[$name] = $value;
    }
  }

  public function save()
  {
    $columns = [];
    $values = [];
    foreach ($this->data as $key => $value) {
      $columns[] = $key;
      $values[] = $value;
    }
    $columns = implode(',', $columns);
    $values = implode(',', $values);
    $sql = "INSERT INTO $this->table ($columns) VALUES ($values)";
    $stmt = Database::getInstance()->getConnection()->prepare($sql);
    $stmt->execute();
    return $stmt->affected_rows;
  }

}