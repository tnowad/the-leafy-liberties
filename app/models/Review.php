<?php

namespace App\Models;

use App\Models\ProductCategory;
use Core\Model;
use App\Models\Author;
use App\Models\ProductTag;
use App\Models\Publisher;
use App\Models\Tag;
use Core\Traits\SoftDeletes;

class Review extends Model
{
  use SoftDeletes;
  protected $table = "reviews";

  protected $fillable = [
    "id",
    "user_id",
    "product_id",
    "content",
    "rating",
    "created_at",
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