<?php
use App\Models\Role;

// find all user contains this role and move them to default role or another role
$role = $params["role"];
?>

<form>
    <div class="mb-4">
        <label class="block font-bold text-gray-700" for="name">
            Name
        </label>
        <input
            class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
            type="text" name="name" id="name" value="<?php echo $role->name; ?>" disabled>
    </div>

    <input type="hidden" name="id" value="<?php echo $role->id; ?>">
    <!-- new role -->
    <div class="mb-4">
        <label class="block font-bold text-gray-700" for="new_role">
            New Role
        </label>
        <select
            class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
            name="new_role" id="new_role">
            <?php foreach (Role::all() as $role): ?>
                <option value="<?php echo $role->id; ?>"><?php echo $role->name; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- submit -->
    <button type="submit"
        class="py-2 px-4 bg-red-500 hover:bg-red-600 focus:ring-red-500 focus:ring-offset-red-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-md">
        Delete
    </button>
</form>