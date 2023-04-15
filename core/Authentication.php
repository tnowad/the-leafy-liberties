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

  public function hasPermission($permission)
  {
    $user = $this->getUser();
    if ($user == null) {
      return false;
    }
    $permission = Permission::findOne(['name' => $permission]);
    if ($permission == null) {
      return false;
    }
    $userPermission = UserPermission::findOne(['user_id' => $user->id, 'permission_id' => $permission->id]);
    if ($userPermission != null && $userPermission->value == 1) {
      return true;
    }
    $rolePermission = RolePermission::findOne(['role_id' => $user->role_id, 'permission_id' => $permission->id]);
    if ($rolePermission != null) {
      return true;
    }
    return false;
  }
}