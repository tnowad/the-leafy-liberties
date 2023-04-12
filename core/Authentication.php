<?php
namespace Core;

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

  public function getUser()
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
}