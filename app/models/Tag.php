<?php
namespace App\Models;

use Core\Model;

class Tag extends Model
{
  protected $table = 'tags';
  protected $fillable = ['name'];

  public function products()
  {
    $productTags = ProductTag::where(['tag_id' => $this->id]);
    $products = [];
    foreach ($productTags as $productTag) {
      $products[] = Product::find($productTag->product_id);
    }
    return $products;
  }

  public function addProduct($product)
  {
    ProductTag::create([
      'product_id' => $product->id,
      'tag_id' => $this->id,
    ]);
  }

  public function removeProduct($product)
  {
    $productTags = ProductTag::where(['tag_id' => $this->id]);
    $productTag = null;
    foreach ($productTags as $productTag) {
      if ($productTag->product_id == $product->id) {
        $productTag->delete();
        break;
      }
    }
  }

  public function delete()
  {
    $productTags = ProductTag::where(['tag_id' => $this->id]);
    foreach ($productTags as $productTag) {
      $productTag->delete();
    }
    parent::delete();
  }
}