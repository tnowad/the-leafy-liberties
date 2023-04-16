<?php

namespace App\Models;

use App\Models\ProductCategory;
use Core\Model;
use App\Models\Author;
use App\Models\ProductTag;
use App\Models\Publisher;
use App\Models\Tag;

class Product extends Model
{
  protected $table = 'products';

  protected $fillable = [
    'id',
    'isbn',
    'name',
    'author_id',
    'publisher_id',
    'price',
    'description',
    'image',
    'quantity',
    'deleted_at'
  ];
  public function author()
  {
    return Author::find($this->author_id);
  }

  public function publisher()
  {
    return Publisher::find($this->publisher_id);
  }

  public function tags()
  {
    $productTags = ProductTag::findAll(['product_id' => $this->id]);
    $tags = [];
    foreach ($productTags as $productTag) {
      $tags[] = Tag::find($productTag->tag_id);
    }
    return $tags;
  }

  public function addTag($tag)
  {
    ProductTag::create([
      'product_id' => $this->id,
      'tag_id' => $tag->id,
    ]);
  }

  public function removeTag($tag)
  {
    $productTags = ProductTag::findAll(['product_id' => $this->id]);
    $productTag = null;
    foreach ($productTags as $productTag) {
      if ($productTag->tag_id == $tag->id) {
        break;
      }
    }
    $productTag->delete();
  }

  public function hasTag($tag)
  {
    $productTags = ProductTag::findAll(['product_id' => $this->id]);
    foreach ($productTags as $productTag) {
      if ($productTag->tag_id == $tag->id) {
        return true;
      }
    }
    return false;
  }
  public function categories()
  {
    $productCategories = ProductCategory::findAll(['product_id' => $this->id]);
    $categories = [];
    foreach ($productCategories as $productCategory) {
      $categories[] = Category::find($productCategory->category_id);
    }
    return $categories;
  }

  public function addCategory($category)
  {
    ProductCategory::create([
      'product_id' => $this->id,
      'category_id' => $category->id,
    ]);
  }

  public function removeCategory($category)
  {
    $productCategories = ProductCategory::findAll(['product_id' => $this->id]);
    $productCategory = null;
    foreach ($productCategories as $productCategory) {
      if ($productCategory->category_id == $category->id) {
        break;
      }
    }
    $productCategory->delete();
  }

  public function hasCategory($category)
  {
    $productCategories = ProductCategory::findAll(['product_id' => $this->id]);
    foreach ($productCategories as $productCategory) {
      if ($productCategory->category_id == $category->id) {
        return true;
      }
    }
    return false;
  }
  public function getProduct()
  {
    return Product::find($this->id);
  }
  public function filterProduct($input)
  {
    return Product::filterAdvanced($input);
  }
}
