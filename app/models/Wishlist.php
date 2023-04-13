<?php

namespace App\Models;

use Core\Model;

class Wishlist extends Model
{
  protected $table = 'wishlist';

  protected $fillable = [
    'product_id',
    'product_name',
    'price',
    'quantity',
    'image',
  ];
}