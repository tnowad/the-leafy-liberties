<?php

namespace App\Models;

use Core\Model;

class Cart extends Model
{
  protected $table = 'carts';

  protected $fillable = [
    'user_id',
    'book_id',
    'quantity',
    'status',
  ];
}
