<?php

namespace App\Models;

use Core\Model;

class Coupon extends Model
{

  protected $table = 'coupons';

  protected $fillable = [
    'id',
    'name',
    'active',
    'expired',
    'quantity',
    'description',
  ];


}