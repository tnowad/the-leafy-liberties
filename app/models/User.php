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

  public function getPermissions()
  {
    $query = "SELECT * FROM users_permissions WHERE user_id = {$this->primaryKey}";
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

  public function hasPermission($permission)
  {
    $role = $this->getRole();
    $rolePermissions = $role->getPermissions();
    $userPermissions = $this->getPermissions();

    foreach ($userPermissions as $userPermission) {
      if ($userPermission->name === $permission) {
        return $userPermission->status;
      }
    }

    foreach ($rolePermissions as $rolePermission) {
      if ($rolePermission->name === $permission) {
        return $rolePermission->status;
      }
    }

    return false;
  }
}