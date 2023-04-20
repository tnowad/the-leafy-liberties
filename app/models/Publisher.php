<?php
namespace App\Models;

use Core\Model;

class Publisher extends Model
{
  protected $table = "author";
  protected $fillable = ["image", "name", "deleted_at"];
}
