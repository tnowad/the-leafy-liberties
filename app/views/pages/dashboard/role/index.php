<?php
$roles = $params["roles"]; ?>

<div class="w-full mx-auto my-0">
  <div class="box-border w-full min-h-screen px-10 mt-10 sm:px-5">
    <div class="flex justify-between">
      <h1 class="text-xl font-bold">Role</h1>
      <div class="box-border w-1/2 px-10">
      <form action="<?php echo BASE_URI . '/dashboard/role' ?>" method="GET"
          class="flex items-center justify-center w-full h-10 bg-gray-100 rounded-full">
          <input type="text" name="keywords" class="w-full h-full pl-5 rounded-tl-full rounded-bl-full"
            placeholder="Search.... "
            value="<?php echo isset($params['filter']['keywords']) ? $params['filter']['keywords'] : '' ?>" />
          <button class="flex items-center justify-center w-10 h-10 bg-gray-100">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </form>
      </div>
      <a href="<?php echo BASE_URI . "/dashboard/role/create"; ?>">
        <i class="fa-solid fa-plus"></i>
      </a>
    </div>
    <div class="my-8 cursor-pointer role-statistics rounded-2xl bg-transparent flex flex-col gap-5">
      <?php foreach ($roles as $role): ?>
        <div class="relative bg-white rounded-2xl shadow-lg">
          <div class="user-role flex justify-between items-center py-3 px-4 relative peer">
            <a class="text-lg font-semibold" href="<?php echo BASE_URI .
              "/dashboard/role/show?id=" .
              $role->id; ?>">
              <?php echo ucfirst($role->name); ?>
            </a>
            <!-- Icon edit or delete -->
            <div class="button flex justify-center items-center gap-4">
              <a href="<?php echo BASE_URI .
                "/dashboard/role/update" .
                "?id=" .
                $role->id; ?>"
                class="edit-button py-2 px-3 bg-blue-400 text-white rounded-xl hover:text-pink-500 transition-all">
                <i class="fa-solid fa-pen-to-square"></i>
              </a>
              <a href="<?php echo BASE_URI .
                "/dashboard/role/delete" .
                "?id=" .
                $role->id; ?>"
                class="delete-button py-2 px-3 bg-red-400 text-white rounded-xl hover:text-blue-500 transition-all">
                <i class="fa-solid fa-trash"></i>
              </a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<script>
  let input = document.querySelectorAll(".checkbox-input");
  let menulist = document.querySelectorAll(".dropdown-menu");

  input.forEach(element => {
    element.addEventListener("change", () => {
      let index = Array.from(input).indexOf(element);
      if (element.checked) {
        menulist[index].classList.add("max-h-full");
        menulist[index].classList.remove("max-h-0");
      } else {
        menulist[index].classList.remove("max-h-full");
        menulist[index].classList.add("max-h-0");
      }
    });
  });

</script>
