<?php

namespace App\Models;

use Core\Model;

class User extends Model
{
  protected $table = 'users';
  protected string $primaryKey = 'id';
  protected $fillable = ['name', 'email', 'password'];

}