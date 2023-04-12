<?php

namespace App\Models;

use Core\Database;
use Core\Model;
use Permission;

class User extends Model
{
  protected $table = 'users';

  protected $fillable = ['email', 'password', 'name', 'phone', 'role_id', 'status', 'user_image'];

  public function setPassword($password)
  {
    $this->password = password_hash($password, PASSWORD_DEFAULT);
  }

}