<?php

namespace App\Models;

use Core\Model;

class Wishlist extends Model
{
  protected $table = 'wishlists';

  protected $fillable = [
    'product_id',
    'user_id',
  ];
}