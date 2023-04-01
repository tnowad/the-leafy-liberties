<?php
namespace Models;

use Library\Database;

class BaseModel
{
  protected $table;
  protected $db;
  public function __construct()
  {
    $this->db = Database::getInstance()->getConnection();
  }


  public function all()
  {
    $sql = "SELECT * FROM $this->table";
    $result = $this->db->query($sql);

    if (!$result) {
      die('Error executing query: ' . $this->db->error);
    }

    $rows = [];
    while ($row = $result->fetch_assoc()) {
      $rows[] = $row;
    }

    return $rows;
  }

  public function find($id)
  {
    $sql = "SELECT * FROM $this->table WHERE id=$id";
    $result = $this->db->query($sql);

    if (!$result) {
      die('Error executing query: ' . $this->db->error);
    }

    $row = $result->fetch_assoc();

    return $row;
  }

  public function create($data)
  {
    $columns = implode(',', array_keys($data));
    $values = "'" . implode("','", array_values($data)) . "'";

    $sql = "INSERT INTO $this->table ($columns) VALUES ($values)";
    $result = $this->db->query($sql);

    if (!$result) {
      die('Error executing query: ' . $this->db->error);
    }

    return $this->db->insert_id;
  }

  public function update($id, $data)
  {
    $set = '';
    foreach ($data as $column => $value) {
      $set .= "$column='$value',";
    }
    $set = rtrim($set, ',');

    $sql = "UPDATE $this->table SET $set WHERE id=$id";
    $result = $this->db->query($sql);

    if (!$result) {
      die('Error executing query: ' . $this->db->error);
    }

    return $this->db->affected_rows;
  }

  public function delete($id)
  {
    $sql = "DELETE FROM $this->table WHERE id=$id";
    $result = $this->db->query($sql);

    if (!$result) {
      die('Error executing query: ' . $this->db->error);
    }

    return $this->db->affected_rows;
  }

  public function __destruct()
  {
    $this->db->close();
  }
}