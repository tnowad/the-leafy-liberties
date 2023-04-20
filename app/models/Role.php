<?php
namespace App\Models;

use App\Models\Permission;
use Core\Database;
use Core\Model;

class Role extends Model
{
  protected $table = "roles";
  protected $fillable = ["name", "deleted_at"];

  public function permissions(): array
  {
    return RolePermission::findAll([
      "role_id" => $this->id,
    ]);
  }

  public function addPermission(Permission $permission)
  {
    $rolePermission = new RolePermission();
    $rolePermission->role_id = $this->id;
    $rolePermission->permission_id = $permission->id;
    $rolePermission->save();
  }

  public function removePermission(Permission $permission)
  {
    $rolePermission = RolePermission::findOne([
      "role_id" => $this->id,
      "permission_id" => $permission->id,
    ]);
    $rolePermission->delete();
  }
}
