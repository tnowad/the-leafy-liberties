<?php
namespace App\Models;

use Core\Model;
use App\Models\Product;

class Category extends Model
{
  protected $table = "categories";
  protected $fillable = ["name", "image", "deleted_at"];
  public static function filterAdvanced($filter)
  {
    $categoires = Category::all();
    // Filter by keywords
    if (!empty($filter['keywords'])) {
      $filteredProducts = [];
      foreach ($categoires as $category) {
        if (strpos(strtolower($category->name), strtolower($filter['keywords'])) !== false) {
          $filteredProducts[] = $category;
        }
      }
      $categoires = $filteredProducts;
    }
    return $categoires;
  }
}
