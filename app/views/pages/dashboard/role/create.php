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

$allPermissions = array_values($allPermissions);
?>

<form class="mt-6">
    <div class="mb-4">
        <label class="block font-bold text-gray-700" for="name">
            Name
        </label>
        <input
            class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
            type="text" name="name" id="name" placeholder="Role name">
    </div>

    <!-- submit -->
    <button type="submit"
        class="py-2 px-4 bg-blue-500 hover:bg-blue-600 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-md">
        Update
    </button>

    <?php foreach ($allPermissions as $permission): ?>
        <div class="flex items-center my-2">
            <input
                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 mr-3"
                type="checkbox" name="permissions[]" id="<?php echo $permission[
                  "name"
                ]; ?>"
                value="<?php echo $permission["id"]; ?>" <?php echo $permission[
  "status"
] == 1
  ? "checked"
  : ""; ?>>
            <label class="text-gray-700" for="<?php echo $permission[
              "name"
            ]; ?>">
                <?php echo $permission["name"]; ?>
            </label>
        </div>
    <?php endforeach; ?>
</form>