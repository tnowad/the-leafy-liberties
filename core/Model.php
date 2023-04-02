<?php
namespace Core;

use Core\Database;
use Exception;

abstract class Model
{
  protected string $table = '';

  /**
   * columns is an array of column names in the table contains in $table property of the model class
   * it will connect to the database and get the columns of the table and store it in this property to be used later
   */
  protected $columns = null;

  public function __construct()
  {
    if ($this->table === '') {
      throw new Exception('Table name is not defined in the model class');
    }
    if ($this->columns === null) {
      $this->columns = $this->getColumns();
    }
    echo '<pre>';
    print_r($this->columns);
    echo '</pre>';
  }

  public function getColumns()
  {
    $sql = "SHOW COLUMNS FROM $this->table";
    $stmt = Database::getInstance()->getConnection()->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $columns = [];
    while ($row = $result->fetch_assoc()) {
      $columns[] = $row['Field'];
    }
    return $columns;
  }

  public function createTable($columns = [])
  {
    $sql = "CREATE TABLE $this->table (";
    // key - value pair
    foreach ($columns as $column => $type) {
      $sql .= "$column $type,";
    }
    // remove the last comma
    $sql = rtrim($sql, ',');
    $sql .= ")";
    echo $sql;
    $stmt = Database::getInstance()->getConnection()->prepare($sql);
    $stmt->execute();
  }
}