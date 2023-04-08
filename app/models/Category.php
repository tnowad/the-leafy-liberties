<?php
namespace App\Models;

use Core\Model;
use App\Models\Product;

class Category extends Model
{
  protected $table = 'categories';
  protected $fillable = ['name'];

  public function products()
  {
    // return $this->belongsToMany(Product::class, 'products_categories', 'category_id', 'product_id');
  }
}