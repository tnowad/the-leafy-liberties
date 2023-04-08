<?php
use Core\Database;
use Core\Model;
use App\Models\Product;
class Category extends Model
{
  protected $table = 'categories';
  protected $fillable = ['name'];

  public function products()
  {
    return $this->belongsToMany(Product::class, 'products_categories', 'category_id', 'product_id');
  }
  // public function getCategory()
  // {
  //   $query = "SELECT name FROM categories";
  //   $stmt = Database::getInstance()->prepare($query);
  //   $stmt->execute();
  //   $stmt->bind_param('i', $this->primaryKey);
  //   while ($row = $stmt->get_result()->fetch_assoc()) {
  //     $users[] = new Category($row);
  //   }
  //   $stmt->close();
  //   return $users;
  // }
  // public function all(){
  //   $query = "SELECT name FROM categories";
  //   $stmt = Database::getInstance()->prepare($query);
  //   $stmt->execute();
  //   $stmt->bind_param('i', $this->primaryKey);
  //   while ($row = $stmt->get_result()->fetch_assoc()) {
  //     $users[] = new Category($row);
  //   }
  //   $stmt->close();
  //   return $users;
  // }
}
