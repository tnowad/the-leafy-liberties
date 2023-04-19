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
$content = ['Dashboard', 'Users', 'Product', 'Author', 'Publisher', 'Slider', 'Role', 'Coupon', 'Cart', 'Category', 'Permission', 'Setting'];
$allPermissions = array_values($allPermissions);
?>

<form class="mt-6 min-h-screen">
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

  <table class="w-full h-64 text-sm text-center text-gray-500 rounded-2xl mt-5" width="100%">
    <thead class="text-md text-gray-700 uppercase bg-gray-50 p-2">
      <tr>
        <th class="py-3 px-4" width="50%">Permissions</th>
        <th class="py-3 px-4">Access</th>
        <th class="py-3 px-4">Show</th>
        <th class="py-3 px-4">Delete</th>
        <th class="py-3 px-4">Create</th>
        <th class="py-3 px-4">Update</th>
      </tr>
    </thead>
    <tbody>

      <?php foreach ($content as $item): ?>
        <tr class="text-center transition-opacity bg-white border-b hover:bg-gray-200 even:bg-gray-100 !text-md">
          <td class="px-5 py-3">
            <?php echo $item ?>
          </td>
          <!-- <?php foreach ($allPermissions as $permission): ?>
            <td>
              <input
                class="mr-3 text-indigo-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                type="checkbox" name="permissions[]" id="<?php echo $permission['name'] ?>"
                value="<?php echo $permission['id'] ?>" <?php echo $permission['status'] == 1 ? 'checked' : '' ?>>
            </td>
            <td>
              <input
                class="mr-3 text-indigo-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                type="checkbox" name="permissions[]" id="<?php echo $permission['name'] ?>"
                value="<?php echo $permission['id'] ?>" <?php echo $permission['status'] == 1 ? 'checked' : '' ?>>
            </td>
            <td>
              <input
                class="mr-3 text-indigo-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                type="checkbox" name="permissions[]" id="<?php echo $permission['name'] ?>"
                value="<?php echo $permission['id'] ?>" <?php echo $permission['status'] == 1 ? 'checked' : '' ?>>
            </td>
            <td>
              <input
                class="mr-3 text-indigo-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                type="checkbox" name="permissions[]" id="<?php echo $permission['name'] ?>"
                value="<?php echo $permission['id'] ?>" <?php echo $permission['status'] == 1 ? 'checked' : '' ?>>
            </td>
            <td>
              <input
                class="mr-3 text-indigo-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                type="checkbox" name="permissions[]" id="<?php echo $permission['name'] ?>"
                value="<?php echo $permission['id'] ?>" <?php echo $permission['status'] == 1 ? 'checked' : '' ?>>
            </td>
          <?php endforeach ?> -->
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</form>
