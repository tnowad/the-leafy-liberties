<?php
namespace App\Models;

use Core\Database;
use Core\Model;

class Setting extends Model
{
  protected $table = "settings";

  protected $fillable = [
    "id",
    "name",
    "value",
  ];
}