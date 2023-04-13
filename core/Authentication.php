<?php
namespace Core;

use App\Models\Permission;
use App\Models\RolePermission;
use App\Models\User;
use App\Models\UserPermission;

class Authentication
{
  protected $userId;

  public function __construct()
  {
    $this->userId = $_SESSION['user_id'] ?? null;
  }


  public function check()
  {
    return $this->getUser() ? true : false;
  }

  public function getUser(): User
  {
    return User::find($this->userId);
  }
  public function setUser(User $user)
  {
    $_SESSION['user_id'] = $user->id;
  }

  public function id()
  {
    return $this->userId;
  }

  public function guest()
  {
    return !$this->check();
  }

  public function hasPermission(Permission $permission): bool
  {
    if ($this->guest()) {
      return false;
    }
    $user = $this->getUser();
    $userPermissions = $user->permissions();
    foreach ($userPermissions as $userPermission) {
      if ($userPermission->id == $permission->id) {
        return UserPermission::findOne(['user_id' => $user->id, 'permission_id' => $permission->id]) ? true : false;
      }
    }
    $role = $user->role();
    $rolePermissions = $role->permissions();
    foreach ($rolePermissions as $rolePermission) {
      if ($rolePermission->id == $permission->id) {
        return RolePermission::findOne(['role_id' => $role->id, 'permission_id' => $permission->id]) ? true : false;
      }
    }
    return false;
  }

  public function hasPermissions(string $permissions): bool
  {
    $permissions = explode('|', $permissions);
    foreach ($permissions as $permission) {
      if ($this->hasPermission(Permission::findOne(['name' => $permission]))) {
        return true;
      }
    }
    return false;
  }
}