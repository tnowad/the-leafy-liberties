<?php

namespace App\Models;

use Core\Model;

class Coupon extends Model
{
  protected $table = "coupons";

  protected $fillable = ["id", "code", "expired", "quantity", "description"];
  public static function filterAdvanced($filter)
  {
    $coupons = Coupon::all();
    // Filter by keywords
    if (!empty($filter['keywords'])) {
      $filteredProducts = [];
      foreach ($coupons as $coupon) {
        if (strpos(strtolower($coupon->code), strtolower($filter['keywords'])) !== false) {
          $filteredProducts[] = $coupon;
        }
      }
      $coupons = $filteredProducts;
    }
    return $coupons;
  }
}
