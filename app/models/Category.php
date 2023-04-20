<?php
namespace App\Models;

use Core\Model;
use App\Models\Product;

class Category extends Model
{
  protected $table = "categories";
  protected $fillable = ["name", "image", "deleted_at"];
}
