<?php
namespace Core;

use Core\Database;
use Exception;

abstract class Model
{
  protected $table;
  protected string $primaryKey = 'id';
  protected $fillable = [];

  public function __construct()
  {
    $this->table = $this->table ?? strtolower(str_replace('App\Models\\', '', get_class($this)));
  }

  public function all()
  {
    $sql = "SELECT * FROM {$this->table}";
    $stmt = Database::getInstance()->prepare($sql);
    // mysqli
    $stmt->execute();
    $result = $stmt->get_result();
    $data = [];
    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }
    return $data;
  }

}