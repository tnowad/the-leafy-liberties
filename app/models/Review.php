<?php

namespace App\Models;

use Core\Model;
use Core\Traits\SoftDeletes;

class Review extends Model
{
  use SoftDeletes;
  protected $table = "reviews";

  protected $fillable = [
    "user_id",
    "product_id",
    "content",
    "rating",
    "created_at",
    "deleted_at",
  ];

  public function user()
  {
    return User::findOne(["id" => $this->user_id]);
  }

  public function product()
  {
    return Product::findOne(["id" => $this->product_id]);
  }
}