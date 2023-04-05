<?php

namespace App\Models;

use Core\Model;

class User extends Model
{
  protected $table = 'users';

  protected $fillable = ['email', 'password', 'name'];

  // user many to many with permissions
  public function hasPermission($permission)
  {

  }
}