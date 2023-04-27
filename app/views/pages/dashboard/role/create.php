<?php
$permissions = $params["permissions"];
$allPermissions = [];

foreach ($permissions as $permission) {
  $allPermissions[$permission->name] = [
    "id" => $permission->id,
    "name" => ucwords(str_replace(".", " ", $permission->name)),
    "status" => "0",
  ];
}
$groupPermissions = [];

foreach ($allPermissions as $key => $permission) {
  $group = explode(".", $key)[0];
  $groupPermissions[$group][] = $permission;
}
$allPermissions = array_values($allPermissions);
?>

<form class="my-6 w-full h-full">
  <div class="mb-4">
    <label class="block font-bold text-gray-700" for="name">
      Name
    </label>
    <input
      class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 p-2"
      type="text" name="name" id="name" placeholder="Role name">
  </div>

  <!-- submit -->
  <button type="submit"
    class="py-2 px-4 bg-blue-500 hover:bg-blue-600 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-md">
    Update
  </button>
  <table class="w-full mt-5 text-sm text-center text-gray-500  rounded-2xl" width="100%">
    <thead class="p-2 text-gray-700 uppercase text-md bg-gray-100">
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
                type="checkbox" name="permissions[]" id="<?php echo $permission["name"]; ?>">
            </td>
          <?php endforeach; ?>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <a href="<?php echo BASE_URI . '/dashboard/role' ?>"
    class="py-2 px-4 my-10 bg-blue-500 hover:bg-blue-600 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-full block transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-md">
    Cancel
  </a>
</form>
