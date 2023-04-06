<?php
namespace App\Models;

use Core\Database;
use Core\Model;
use Permission;

class Role extends Model
{
  protected $table = 'roles';
  protected $fillable = ['name'];

  public function getPermissions()
  {
    $query = "SELECT * FROM permissions WHERE role_id = {$this->primaryKey}";
    $stmt = Database::getInstance()->prepare($query);
    if ($stmt === false) {
      return false;
    }
    $stmt->execute();
    if ($stmt->errno) {
      return false;
    }
    $permissions = [];
    while ($row = $stmt->get_result()->fetch_assoc()) {
      $permissions[] = new Permission($row);
    }
    return $permissions;
  }
}