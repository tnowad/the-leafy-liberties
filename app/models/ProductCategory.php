<?php
namespace App\Modelsl;

use Core\Model;

class ProductCategory extends Model
{
  protected $table = 'products_categories';
  protected $fillable = [
    'product_id',
    'category_id',
  ];
}