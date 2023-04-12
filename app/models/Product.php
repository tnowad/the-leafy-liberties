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
}