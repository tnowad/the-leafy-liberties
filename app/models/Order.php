<?php
namespace App\Models;

use App\Models\OrderProduct;
use App\Models\User;
use Core\Model;

class Order extends Model
{
  protected $table = "orders";
  protected $fillable = [
    "name",
    "email",
    "address",
    "phone",
    "shipping_method_id",
    "description",
    "payment_method_type",
    "card_number",
    "expiry_date",
    "cvv",
    "total_price",
    "status",
    "created_at",
    "updated_at",
  ];

  public function user()
  {
    return User::find($this->user_id);
  }

  public function products()
  {
    return OrderProduct::findAll(["order_id" => $this->id]);
  }
}