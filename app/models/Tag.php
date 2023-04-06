<?php
namespace App\Models;

use Core\Model;

class Tag extends Model
{
  protected $table = 'tags';
  protected $fillable = ['name'];
}