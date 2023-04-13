<?php

namespace App\Models;

use Core\Model;

class Author extends Model
{
  protected $table = 'authors';
  protected $fillable = [
    'author_id',
    'name',
    'deleted_at'
  ];
}
