<?php

namespace App\Models;

use App\Models\Permission;
use App\Models\Role;
use Core\Database;
use Core\Model;

class User extends Model
{
  protected $table = 'users';

  protected $fillable = ['email', 'password', 'name', 'phone', 'role_id', 'status', 'user_image', 'gender'];

  public function setPassword($password)
  {
    $this->password = password_hash($password, PASSWORD_DEFAULT);
  }

  public function role()
  {
    return Role::find($this->role_id);
  }

  public function setRole(Role $role)
  {
    if ($this->role_id == $role->id) {
      return;
    }
    $this->role_id = $role->id;
  }

  public function permissions()
  {
    $userPermissions = UserPermission::where(['user_id' => $this->id]);
    $permissions = [];
    foreach ($userPermissions as $userPermission) {
      $permissions[] = Permission::find($userPermission->permission_id);
    }
    return $permissions;
  }

  public function addPermission(Permission $permission)
  {
    UserPermission::create([
      'user_id' => $this->id,
      'permission_id' => $permission->id,
    ]);
  }

  public function removePermission(Permission $permission)
  {
    $userPermissions = UserPermission::where(['user_id' => $this->id]);
    $userPermission = null;
    foreach ($userPermissions as $userPermission) {
      if ($userPermission->permission_id == $permission->id) {
        $userPermission->delete();
        break;
      }
    }
  }

  public function hasPermission(Permission $permission)
  {
    $userPermissions = UserPermission::where(['user_id' => $this->id]);
    foreach ($userPermissions as $userPermission) {
      if ($userPermission->permission_id == $permission->id) {
        return true;
      }
    }
    return false;
  }
}