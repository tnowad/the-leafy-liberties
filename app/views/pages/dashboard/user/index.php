<div class="w-full my-0 mx-auto">
  <div class="mt-10 min-h-screen box-border w-full px-10 sm:px-5">
    <div class="flex justify-between">
      <h1 class="text-xl font-bold">Users</h1>
      <div class="box-border w-1/2 px-10">
      <form action="<?php echo BASE_URI . '/dashboard/user' ?>" method="GET"
          class="flex items-center justify-center w-full h-10 bg-gray-100 rounded-full">
          <input type="text" name="keywords" class="w-full h-full pl-5 rounded-tl-full rounded-bl-full"
            placeholder="Search.... "
            value="<?php echo isset($params['filter']['keywords']) ? $params['filter']['keywords'] : '' ?>" />
          <button class="flex items-center justify-center w-10 h-10 bg-gray-100">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </form>
      </div>
      <a class="add-user w-5 h-5 text-2xl" href="<?php echo BASE_URI . '/dashboard/user/create' ?>">
        +
      </a>
    </div>
    <div class="table-customer-statistics my-8 shadow-lg cursor-pointer rounded-2xl bg-white">
      <div class="relative">
        <table class="w-full text-sm text-center text-gray-500 rounded-2xl">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
              <?php
              use App\Models\Role;
              use App\Models\User;
              $name = [
                "ID",
                "Image",
                "Email",
                "Name",
                "Phone",
                "Role",
                "Status",
                "Action",
              ];
              for ($i = 1; $i <= count($name); $i++) { ?>
                <th scope="col" class="px-6 py-3">
                  <?php echo $name[$i - 1]; ?>
                </th>
              <?php }
              ?>
            </tr>
          </thead>
          <tbody>
            <?php
            if (count($users) > 0) : ?>
              <?php foreach ($users as $user) : ?>
                <tr class="bg-white border-b hover:bg-gray-200 transition-opacity even:bg-gray-100 text-center">
                  <td class="px-5 py-3">
                    <?php echo $user->id; ?>
                  </td>
                  <td class="px-5 py-3 w-32">
                    <img src="<?php echo ($user->image == NULL) ? BASE_URI . '/resources/images/user/placeholder.png' : BASE_URI . $user->image ?>" alt="" class="w-full h-full object-contain">
                  </td>
                  <td class="px-5 py-3">
                    <?php echo $user->email; ?>
                  </td>
                  <td class="px-5 py-3">
                    <?php echo $user->name; ?>
                  </td>
                  <td class="px-5 py-3">
                    <?php echo $user->phone; ?>
                  </td>
                  <td class="px-5 py-3">
                    <?php
                    $role = Role::find($user->role_id);
                    echo ucfirst($role->name);
                    ?>
                  </td>
                  <td class="px-5 py-3 <?php echo ($user->status == 1) ? 'text-primary-700 font-medium' : 'text-red-700 font-medium' ?>">
                    <?php
                    if ($user->status == 1) {
                      echo "Active";
                    } else {
                      echo "Banned";
                    }
                    ?>
                  </td>
                  <td class="px-5 py-3 w-44">
                    <div class="button flex justify-center items-center gap-4">
                      <a href="<?php echo BASE_URI .
                                  "/dashboard/user/update" .
                                  "?id=" .
                                  $user->id; ?>" class="edit-button py-2 px-3 bg-blue-400 text-white rounded-xl hover:text-pink-500 transition-all">
                        <i class="fa-solid fa-pen-to-square"></i>
                      </a>
                      <button class="delete-button py-2 px-3 bg-red-400 text-white rounded-xl hover:text-blue-500 transition-all" onclick="removeUserConfirm()">
                        <i class="fa-solid fa-trash"></i>
                      </button>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endif;
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script>
  document.removeUserConfirm = () => {
    const result = confirm("Delete this user?");
    if (result) {
      FetchXHR.post('<?php echo BASE_URI . "/dashboard/user/delete"; ?>').then(response => {
        if (response.type === 'error') {
          alert(response.message);
        } else if (response.type === 'info') {
          alert(response.message);
        } else {
          alert('This product has been removed');
        }
      }).catch(error => {
        alert('Something went wrong');
      });
    }
  }
</script>
