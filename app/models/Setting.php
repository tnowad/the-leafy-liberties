<?php
namespace App\Models;

use Core\Database;
use Core\Model;

class Setting extends Model
{
  protected $table = "settings";
  protected $fillable = ["key", "value"];

  public static function get($key)
  {
    $setting = self::findAll(["key" => $key]);
    if ($setting) {
      return (new static($setting))->value;
    }
    return null;
  }

  public static function set($key, $value)
  {
    $setting = self::findAll(["key" => $key]);
    if ($setting) {
      $setting = new static($setting);
      $setting->value = $value;
      $setting->save();
    } else {
      $setting = new static();
      $setting->key = $key;
      $setting->value = $value;
      $setting->save();
    }
  }
}
