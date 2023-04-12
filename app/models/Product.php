<?php

namespace App\Models;

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
    'title',
    'author_id',
    'publisher_id',
    'price',
    'description',
    'image_url',
    'quantity',
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
    $productTags = ProductTag::where('product_id', $this->id);
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
    $productTags = ProductTag::where('product_id', $this->id);
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
    $productTags = ProductTag::where('product_id', $this->id);
    foreach ($productTags as $productTag) {
      if ($productTag->tag_id == $tag->id) {
        return true;
      }
    }
    return false;
  }

  public function getTags()
  {
    $productTags = ProductTag::where('product_id', $this->id);
    $tags = [];
    foreach ($productTags as $productTag) {
      $tags[] = Tag::find($productTag->tag_id);
    }
    return $tags;
  }

}