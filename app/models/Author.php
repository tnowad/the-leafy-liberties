<?php

namespace App\Models;

use Core\Model;

class Author extends Model
{
  protected $table = "authors";
  protected $fillable = ["id", "image", "name", "deleted_at"];

  public function products()
  {
    return Product::findAll(["author_id" => $this->id]);
  }
}
