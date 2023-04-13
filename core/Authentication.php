<?php
namespace Core;

use App\Models\Permission;
use App\Models\User;

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
    $userPermissions = $this->getUser()->permissions();
    $rolePermissions = $this->getUser()->role()->permissions();
    $permissions = array_merge($userPermissions, $rolePermissions);
    foreach ($permissions as $userPermission) {
      if ($userPermission->id == $permission->id) {
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