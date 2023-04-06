<?php

namespace App\Models;

use Core\Database;
use Core\Model;
use Permission;

class User extends Model
{
  protected $table = 'users';

  protected $fillable = ['email', 'password', 'name'];

  public function setPassword($password)
  {
    $this->password = password_hash($password, PASSWORD_DEFAULT);
  }

  public function getRole()
  {
    $query = "SELECT * FROM roles WHERE id = {$this->role_id}";
    $stmt = Database::getInstance()->prepare($query);
    if ($stmt === false) {
      return false;
    }
    $stmt->execute();
    if ($stmt->errno) {
      return false;
    }
    $row = $stmt->get_result()->fetch_assoc();
    return new Role($row);
  }

  public function getOwnPermissions()
  {
    $query = "SELECT * FROM permissions WHERE user_id = {$this->primaryKey}";
    $stmt = Database::getInstance()->prepare($query);
    if ($stmt === false) {
      return false;
    }
    $stmt->execute();
    if ($stmt->errno) {
      return false;
    }
    $permissions = [];
    while ($row = $stmt->get_result()->fetch_assoc()) {
      $permissions[] = new Permission($row);
    }
    return $permissions;
  }

  public function getPermissions()
  {
    $rolePermissions = $this->getRole()->getPermissions();
    $userPermissions = $this->getOwnPermissions();
    return array_merge($rolePermissions, $userPermissions);
  }
}