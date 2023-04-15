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

  public function permissions()
  {
    $rolePermissions = RolePermission::where(['role_id' => $this->id]);
    $permissions = [];
    foreach ($rolePermissions as $rolePermission) {
      $permissions[] = Permission::find($rolePermission->permission_id);
    }
    return $permissions;
  }

  public function addPermission(Permission $permission)
  {
    $rolePermission = RolePermission::where([
      'role_id' => $this->id,
      'permission_id' => $permission->id
    ]);
    if ($rolePermission) {
      return;
    }
    $rolePermission = new RolePermission();
    $rolePermission->role_id = $this->id;
    $rolePermission->permission_id = $permission->id;
    $rolePermission->save();
  }
}