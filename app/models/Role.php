<?php
namespace App\Models;

use App\Models\Permission;
use Core\Database;
use Core\Model;

class Role extends Model
{
  protected $table = 'roles';
  protected $fillable = [
    'name',
    'deleted_at'
  ];

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