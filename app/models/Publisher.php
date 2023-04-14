<?php
namespace App\Models;

use Core\Model;

class Publisher extends Model
{
  protected $table = 'author';
  protected $fillable = [
    'publisher_id',
    'name',
    'image',
    'deleted_at'
  ];

}