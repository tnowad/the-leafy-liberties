<?php
namespace App\Models;

use App\Models\OrderProduct;
use App\Models\User;
use Core\Model;

class Order extends Model
{
  protected $table = 'orders';
  protected $fillable = ['user_id', 'status', 'total', 'created_at', 'updated_at', 'deleted_at'];

  public function user()
  {
    return User::find($this->user_id);
  }

  public function products()
  {
    return OrderProduct::where(['order_id' => $this->id]);
  }
}