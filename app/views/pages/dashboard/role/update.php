<?php
$role = $params['role'];
$permissions = $params['permissions'];
$rolePermissions = $params['rolePermissions'];
// merge 2 arrays to get all permissions and check if they are in rolePermissions add status to them
$allPermissions = [];

foreach ($permissions as $permission) {
  $allPermissions[$permission->name] = [
    'id' => $permission->id,
    'name' => $permission->name,
    'status' => "0"
  ];
}

foreach ($rolePermissions as $rolePermission) {
  $allPermissions[$rolePermission->name] = [
    'id' => $rolePermission->permission_id,
    'name' => $rolePermission->name,
    'status' => "1"
  ];
}

$allPermissions = array_values($allPermissions);
?>

<form>
  <input type="text" name="name" value="<?php echo $role->name ?>">
  <input type="hidden" name="id" value="<?php echo $role->id ?>">

  <!-- submit -->
  <button type="submit">Update</button>

  <?php foreach ($allPermissions as $permission): ?>
    <div>
      <label>
        <?php echo $permission['name'] ?>
      </label>
      <input type="checkbox" name="permissions[]" value="<?php echo $permission['id'] ?>" <?php echo $permission['status'] == 1 ? 'checked' : '' ?>>
    </div>
  <?php endforeach; ?>
</form>