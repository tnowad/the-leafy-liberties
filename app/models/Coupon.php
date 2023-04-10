<?php

namespace App\Models;

use Core\Model;

class Coupon extends Model
{

  protected $table = 'coupon';

  protected $fillable = [
    'id',
    'name',
    'active',
    'expired',
    'quantity',
    'description',
  ];

  
}
