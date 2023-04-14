<?php

namespace App\Models;

use Core\Model;

class Author extends Model
{
  protected $table = 'authors';
  protected $fillable = [
    'image',
    'name',
    'deleted_at'
  ];
}