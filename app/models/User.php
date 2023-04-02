<?php

namespace Models;

use Core\Model;

class User extends Model
{
  protected $table = 'users';

  public function __construct()
  {
    parent::__construct();
  }

  public function getById($id)
  {
    $stmt = $this->db->prepare("SELECT * FROM $this->table WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
      return null;
    }

    return $result->fetch_assoc();
  }

  public function getByEmail($email)
  {
    $stmt = $this->db->prepare("SELECT * FROM $this->table WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
      return null;
    }

    return $result->fetch_assoc();
  }

  public function create($data)
  {
    $stmt = $this->db->prepare("INSERT INTO $this->table (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $data['name'], $data['email'], $data['password']);
    $stmt->execute();

    return $stmt->insert_id;
  }

  public function update($id, $data)
  {
    $stmt = $this->db->prepare("UPDATE $this->table SET name = ?, email = ?, password = ? WHERE id = ?");
    $stmt->bind_param("sssi", $data['name'], $data['email'], $data['password'], $id);
    $stmt->execute();

    return $stmt->affected_rows;
  }

  public function delete($id)
  {
    $stmt = $this->db->prepare("DELETE FROM $this->table WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    return $stmt->affected_rows;
  }
}