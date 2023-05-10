<?php
use App\Models\Role;

$role = $params["role"];

$roles = Role::all();
foreach ($roles as $key => $value) {
  if ($value->id == $role->id) {
    unset($roles[$key]);
  }
}

$permissions = $params["permissions"];
$rolePermissions = $params["rolePermissions"];
$allPermissions = [];

foreach ($permissions as $permission) {
  $allPermissions[$permission->name] = [
    "id" => $permission->id,
    "name" => ucwords(str_replace(".", " ", $permission->name)),
    "status" => "0",
  ];
}

foreach ($rolePermissions as $rolePermission) {
  $allPermissions[$rolePermission->name] = [
    "id" => $rolePermission->permission_id,
    "name" => ucwords(str_replace(".", " ", $rolePermission->name)),
    "status" => "1",
  ];
}

if ($allPermissions["dashboard.access"]["status"] == 0) {
  foreach ($allPermissions as $key => $permission) {
    if ($key != "dashboard.access") {
      unset($allPermissions[$key]);
    }
  }
}

$groupPermissions = [];

foreach ($allPermissions as $key => $permission) {
  $group = explode(".", $key)[0];
  $groupPermissions[$group][] = $permission;
}
?>

<form class="min-h-screen mt-6" action="<?php echo BASE_URI . '/dashboard/role/delete' ?>" method="POST">
  <div class="mb-4">
    <label class="block font-bold text-gray-700" for="name">
      Name
    </label>
    <input
      class="block w-full p-2 mt-1 bg-gray-100 border-transparent rounded-md focus:border-gray-500 focus:bg-white focus:ring-2 focus:ring-primary"
      type="text" name="name" id="name" disabled value="<?php echo $role->name; ?>">

    <div class="flex items-center justify-between mt-4">
      New Role
      <select name="new-id" id="new-id"
        class="w-full p-2 mt-1 bg-gray-100 border-transparent rounded-md focus:border-gray-500 focus:bg-white focus:ring-2 focus:ring-primary">
        <?php foreach ($roles as $role): ?>
          <option value="<?php echo $role->id; ?>"><?php echo $role->name; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>


  <input type="hidden" name="id" value="<?php echo $role->id; ?>">

  <!-- submit -->
  <button type="submit"
    class="w-full px-4 py-2 text-base font-semibold text-center text-white transition duration-200 ease-in bg-red-500 rounded-md shadow-md hover:bg-red-600 focus:ring-red-500 focus:ring-offset-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2">
    Delete
  </button>

  <table class="w-full mt-5 text-sm text-center text-gray-500 rounded-2xl" width="100%">
    <thead class="p-2 text-gray-700 uppercase text-md bg-gray-50">
      <tr>
        <th class="px-4 py-3" width="50%">Permissions</th>
        <th class="px-4 py-3">Access</th>
        <th class="px-4 py-3">Show</th>
        <th class="px-4 py-3">Delete</th>
        <th class="px-4 py-3">Create</th>
        <th class="px-4 py-3">Update</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($groupPermissions as $groupName => $groupPermission): ?>
        <tr class="text-center transition-opacity bg-white border-b hover:bg-gray-200 even:bg-gray-100 !text-md">
          <td class="px-5 py-3">
            <?php echo ucfirst($groupName); ?>
          </td>
          <?php foreach ($groupPermission as $permission): ?>
            <td>
              <input
                class="w-4 h-4 mr-3 text-indigo-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                type="checkbox" name="permissions[]" id="<?php echo $permission[
                  "name"
                ]; ?>" value="<?php echo $permission["id"] ?>" <?php echo $permission[
                      "status"
                    ] == 1
                      ? "checked"
                      : ""; ?>>
            </td>
          <?php endforeach; ?>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</form>