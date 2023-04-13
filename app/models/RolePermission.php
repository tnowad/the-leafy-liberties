<?php
namespace App\Models;

use App\Models\Permission;
use Core\Model;

class RolePermission extends Model
{
  protected $table = 'role_permissions';
  protected $fillable = ['role_id', 'permission_id'];
  public function role()
  {
    return Role::find($this->role_id);
  }
  public function permission()
  {
    return Permission::find($this->permission_id);
  }
}