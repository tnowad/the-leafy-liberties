<?php
namespace App\Models;

use Core\Model;

class ProductCategory extends Model
{
  protected $table = 'products_categories';
  protected $fillable = [
    'product_id',
    'category_id',
  ];
}