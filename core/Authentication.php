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

  public function getUser(): ?User
  {
    if ($this->userId == null) {
      return null;
    }
    return User::findOne(['id' => $this->userId]);
  }

  public function setUser(User $user)
  {
    $_SESSION['user_id'] = $user->id;
  }

  public function isAuthenticated(): bool
  {
    return $this->getUser() ? true : false;
  }

  public function isGuest(): bool
  {
    return !$this->isAuthenticated();
  }


  public function hasPermission(Permission|string $permission): bool
  {
    if ($this->isGuest()) {
      return false;
    }

    if (is_string($permission)) {
      $permission = Permission::findOne(['name' => $permission]);
    }

    $user = $this->getUser();
    $role = $user->role();
    $rolePermissions = RolePermission::where(['role_id' => $role->id]);
    foreach ($rolePermissions as $rolePermission) {
      if ($rolePermission->permission_id == $permission->id) {
        return true;
      }
    }
    $userPermissions = UserPermission::where(['user_id' => $user->id]);
    foreach ($userPermissions as $userPermission) {
      if ($userPermission->permission_id == $permission->id) {
        return true;
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