<?php
$role = $params['role'];
$permissions = $params['permissions'];
$rolePermissions = $params['rolePermissions'];
$allPermissions = [];

foreach ($permissions as $permission) {
  $allPermissions[$permission->name] = [
    'id' => $permission->id,
    'name' => ucwords(str_replace('.', ' ', $permission->name)),
    'status' => "0"
  ];
}

foreach ($rolePermissions as $rolePermission) {
  $allPermissions[$rolePermission->name] = [
    'id' => $rolePermission->permission_id,
    'name' => ucwords(str_replace('.', ' ', $rolePermission->name)),
    'status' => "1"
  ];
}

if ($allPermissions['dashboard.access']['status'] == 0) {
  foreach ($allPermissions as $key => $permission) {
    if ($key != 'dashboard.access') {
      unset($allPermissions[$key]);
    }
  }
}

$allPermissions = array_values($allPermissions);
?>

<form class="mt-6">
  <div class="mb-4">
    <label class="block font-bold text-gray-700" for="name">
      Name
    </label>
    <input
      class="block w-full mt-1 bg-gray-100 border-transparent rounded-md focus:border-gray-500 focus:bg-white focus:ring-0"
      type="text" name="name" id="name" value="<?php echo $role->name ?>">
  </div>

  <input type="hidden" name="id" value="<?php echo $role->id ?>">

  <!-- submit -->
  <button type="submit"
    class="w-full px-4 py-2 text-base font-semibold text-center text-white transition duration-200 ease-in bg-blue-500 rounded-md shadow-md hover:bg-blue-600 focus:ring-blue-500 focus:ring-offset-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2">
    Update
  </button>

  <?php foreach ($allPermissions as $permission): ?>
    <div class="flex items-center my-2">
      <input
        class="mr-3 text-indigo-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
        type="checkbox" name="permissions[]" id="<?php echo $permission['name'] ?>"
        value="<?php echo $permission['id'] ?>" <?php echo $permission['status'] == 1 ? 'checked' : '' ?>>
      <label class="text-gray-700" for="<?php echo $permission['name'] ?>">
        <?php echo $permission['name'] ?>
      </label>
    </div>
  <?php endforeach; ?>
</form>