<?php

namespace App\Models;

use Core\Model;

class Product extends Model
{
  protected $table = 'products';

  protected $fillable = [
    'id',
    'star',
    'image_url',
    'title',
    'author',
    'publisher',
    'price',
    'isbn',
    'description',
    'quantity',
    'category_id',
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

  public function reviews()
  {
    return Review::where('product_id', $this->id);
  }

  public function ratings()
  {
    return Rating::where('product_id', $this->id);
  }

  public function orders()
  {
    return Order::where('product_id', $this->id);
  }

  public function orderDetails()
  {
    return OrderDetail::where('product_id', $this->id);
  }

  public function carts()
  {
    return Cart::where('product_id', $this->id);
  }

  public function cartDetails()
  {
    return CartDetail::where('product_id', $this->id);
  }

  public function wishlists()
  {
    return Wishlist::where('product_id', $this->id);
  }

  public function wishlistDetails()
  {
    return WishlistDetail::where('product_id', $this->id);
  }
}
