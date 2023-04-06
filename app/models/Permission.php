<?php
use App\Models\Role;
use App\Models\User;
use Core\Database;
use Core\Model;

class Permission extends Model
{
  protected $table = 'permissions';
  protected $fillable = ['name', 'status'];

  public function getRole()
  {
    $query = "SELECT * FROM roles_permissions WHERE role_id = ?";
    $stmt = Database::getInstance()->prepare($query);
    $stmt->bind_param('i', $this->role_id);
    $stmt->execute();
    $roles = [];
    while ($row = $stmt->get_result()->fetch_assoc()) {
      $roles[] = new Role($row);
    }
    $stmt->close();
    return $roles;
  }

  public function getUsers()
  {
    $query = "SELECT * FROM users_permissions WHERE permission_id = ?";
    $stmt = Database::getInstance()->prepare($query);
    $stmt->bind_param('i', $this->primaryKey);
    $stmt->execute();
    $users = [];
    while ($row = $stmt->get_result()->fetch_assoc()) {
      $users[] = new User($row);
    }
    $stmt->close();
    return $users;
  }

}