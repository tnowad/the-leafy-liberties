<?php
$roles = $params['roles'];
?>

<div class="w-full mx-auto my-0">
  <div class="box-border w-full min-h-screen px-10 mt-10 sm:px-5">
    <div class="flex justify-between">
      <h1 class="text-xl font-bold">Role</h1>
      <div class="box-border w-1/2 px-10">
        <form class="input flex items-center justify-center w-full h-10 bg-white rounded-full"
          action="<?php BASE_URI . '/dashboard/product' ?>" method="POST">
          <input type="text" name="searchQuery"
            class="w-full h-full pl-5 bg-transparent rounded-tl-full rounded-bl-full" placeholder="Search.... " />
          <button class="flex items-center justify-center w-10 h-10">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </form>
      </div>
      <button class="w-5 h-5 text-2xl add-product">
        +
      </button>
    </div>
    <div class="my-8 cursor-pointer role-statistics rounded-2xl bg-transparent flex flex-col gap-5">
      <div class="relative bg-white rounded-2xl shadow-lg">
        <div class="user-role flex justify-between items-center py-3 px-4 relative peer">
          <p class="text-lg font-semibold">User</p>
          <input type="checkbox" name="" id="" class="peer w-full h-11 opacity-0 checkbox-input">
          <i class="fa-solid fa-chevron-down peer-checked:rotate-180 rotate-0 transition-all duration-300"></i>
        </div>
        <div
          class="dropdown-menu z-10 bg-white divide-y divide-gray-100 rounded-lg shadow w-full max-h-0 overflow-hidden">
          <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDelayButton">
            <li>
              <div class="flex justify-between items-center w-full border-0 border-solid border-b border-gray-100 p-2">
                <a href="#" class="block px-4 py-2 text-black text-lg ">Access</a>

                <label class="relative inline-flex items-center cursor-pointer">
                  <input type="checkbox" value="" class="sr-only peer" checked>
                  <div
                    class="shadow-lg w-16 h-8 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-8 after:w-8 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                  </div>
                </label>

              </div>
            </li>
            <li>
              <div class="flex justify-between items-center w-full border-0 border-solid border-b border-gray-100 p-2">
                <a href="#" class="block px-4 py-2 text-black text-lg ">Show</a>

                <label class="relative inline-flex items-center cursor-pointer">
                  <input type="checkbox" value="" class="sr-only peer" checked>
                  <div
                    class="shadow-lg w-16 h-8 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-8 after:w-8 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                  </div>
                </label>

              </div>
            </li>
            <li>
              <div class="flex justify-between items-center w-full border-0 border-solid border-b border-gray-100 p-2">
                <a href="#" class="block px-4 py-2 text-black text-lg ">Create</a>

                <label class="relative inline-flex items-center cursor-pointer">
                  <input type="checkbox" value="" class="sr-only peer" checked>
                  <div
                    class="shadow-lg w-16 h-8 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-8 after:w-8 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                  </div>
                </label>

              </div>
            </li>
            <li>
              <div class="flex justify-between items-center w-full border-0 border-solid border-b border-gray-100 p-2">
                <a href="#" class="block px-4 py-2 text-black text-lg ">Update</a>

                <label class="relative inline-flex items-center cursor-pointer">
                  <input type="checkbox" value="" class="sr-only peer" checked>
                  <div
                    class="shadow-lg w-16 h-8 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-8 after:w-8 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                  </div>
                </label>

              </div>
            </li>
            <li>
              <div class="flex justify-between items-center w-full border-0 border-solid border-b border-gray-100 p-2">
                <a href="#" class="block px-4 py-2 text-black text-lg">Delete</a>

                <label class="relative inline-flex items-center cursor-pointer">
                  <input type="checkbox" value="" class="sr-only peer" checked>
                  <div
                    class="shadow-lg w-16 h-8 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-8 after:w-8 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                  </div>
                </label>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="relative bg-white rounded-2xl shadow-lg">

        <?php foreach ($roles as $role): ?>
          <div class="user-role flex justify-between items-center py-3 px-4 relative peer">
            <p class="text-lg font-semibold">
              <?php echo $role->name ?>
            </p>
            <input type="checkbox" name="" id="" class="peer/admin w-full h-11 opacity-0 checkbox-input">
            <i class="fa-solid fa-chevron-down peer-checked/admin:rotate-180 rotate-0 transition-all duration-300"></i>
          </div>
        <?php endforeach; ?>
        <div class="user-role flex justify-between items-center py-3 px-4 relative peer">
          <p class="text-lg font-semibold">Admin</p>
          <input type="checkbox" name="" id="" class="peer/admin w-full h-11 opacity-0 checkbox-input">
          <i class="fa-solid fa-chevron-down peer-checked/admin:rotate-180 rotate-0 transition-all duration-300"></i>
        </div>
        <div
          class="dropdown-menu z-10 bg-white divide-y divide-gray-100 rounded-lg shadow w-full max-h-0 overflow-hidden">
          <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDelayButton">
            <li>
              <div class="flex justify-between items-center w-full border-0 border-solid border-b border-gray-100 p-2">
                <a href="#" class="block px-4 py-2 text-black text-lg ">Access</a>

                <label class="relative inline-flex items-center cursor-pointer">
                  <input type="checkbox" value="" class="sr-only peer" checked>
                  <div
                    class="shadow-lg w-16 h-8 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-8 after:w-8 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                  </div>
                </label>

              </div>
            </li>
            <li>
              <div class="flex justify-between items-center w-full border-0 border-solid border-b border-gray-100 p-2">
                <a href="#" class="block px-4 py-2 text-black text-lg ">Show</a>

                <label class="relative inline-flex items-center cursor-pointer">
                  <input type="checkbox" value="" class="sr-only peer" checked>
                  <div
                    class="shadow-lg w-16 h-8 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-8 after:w-8 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                  </div>
                </label>

              </div>
            </li>
            <li>
              <div class="flex justify-between items-center w-full border-0 border-solid border-b border-gray-100 p-2">
                <a href="#" class="block px-4 py-2 text-black text-lg ">Create</a>

                <label class="relative inline-flex items-center cursor-pointer">
                  <input type="checkbox" value="" class="sr-only peer" checked>
                  <div
                    class="shadow-lg w-16 h-8 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-8 after:w-8 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                  </div>
                </label>

              </div>
            </li>
            <li>
              <div class="flex justify-between items-center w-full border-0 border-solid border-b border-gray-100 p-2">
                <a href="#" class="block px-4 py-2 text-black text-lg ">Update</a>

                <label class="relative inline-flex items-center cursor-pointer">
                  <input type="checkbox" value="" class="sr-only peer" checked>
                  <div
                    class="shadow-lg w-16 h-8 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-8 after:w-8 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                  </div>
                </label>

              </div>
            </li>
            <li>
              <div class="flex justify-between items-center w-full border-0 border-solid border-b border-gray-100 p-2">
                <a href="#" class="block px-4 py-2 text-black text-lg">Delete</a>

                <label class="relative inline-flex items-center cursor-pointer">
                  <input type="checkbox" value="" class="sr-only peer" checked>
                  <div
                    class="shadow-lg w-16 h-8 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-8 after:w-8 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                  </div>
                </label>

              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="relative bg-white rounded-2xl shadow-lg">
        <div class="user-role flex justify-between items-center py-3 px-4 relative peer">
          <p class="text-lg font-semibold">Moderator</p>
          <input type="checkbox" name="" id="" class="peer w-full h-11 opacity-0 checkbox-input">
          <i class="fa-solid fa-chevron-down peer-checked:rotate-180 rotate-0 transition-all duration-300"></i>
        </div>
        <div
          class="dropdown-menu z-10 bg-white divide-y divide-gray-100 rounded-lg shadow w-full max-h-0 overflow-hidden">
          <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDelayButton">
            <li>
              <div class="flex justify-between items-center w-full border-0 border-solid border-b border-gray-100 p-2">
                <a href="#" class="block px-4 py-2 text-black text-lg ">Access</a>

                <label class="relative inline-flex items-center cursor-pointer">
                  <input type="checkbox" value="" class="sr-only peer" checked>
                  <div
                    class="shadow-lg w-16 h-8 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-8 after:w-8 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                  </div>
                </label>

              </div>
            </li>
            <li>
              <div class="flex justify-between items-center w-full border-0 border-solid border-b border-gray-100 p-2">
                <a href="#" class="block px-4 py-2 text-black text-lg ">Show</a>

                <label class="relative inline-flex items-center cursor-pointer">
                  <input type="checkbox" value="" class="sr-only peer" checked>
                  <div
                    class="shadow-lg w-16 h-8 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-8 after:w-8 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                  </div>
                </label>

              </div>
            </li>
            <li>
              <div class="flex justify-between items-center w-full border-0 border-solid border-b border-gray-100 p-2">
                <a href="#" class="block px-4 py-2 text-black text-lg ">Create</a>

                <label class="relative inline-flex items-center cursor-pointer">
                  <input type="checkbox" value="" class="sr-only peer" checked>
                  <div
                    class="shadow-lg w-16 h-8 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-8 after:w-8 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                  </div>
                </label>

              </div>
            </li>
            <li>
              <div class="flex justify-between items-center w-full border-0 border-solid border-b border-gray-100 p-2">
                <a href="#" class="block px-4 py-2 text-black text-lg ">Update</a>

                <label class="relative inline-flex items-center cursor-pointer">
                  <input type="checkbox" value="" class="sr-only peer" checked>
                  <div
                    class="shadow-lg w-16 h-8 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-8 after:w-8 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                  </div>
                </label>

              </div>
            </li>
            <li>
              <div class="flex justify-between items-center w-full border-0 border-solid border-b border-gray-100 p-2">
                <a href="#" class="block px-4 py-2 text-black text-lg">Delete</a>

                <label class="relative inline-flex items-center cursor-pointer">
                  <input type="checkbox" value="" class="sr-only peer" checked>
                  <div
                    class="shadow-lg w-16 h-8 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-8 after:w-8 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                  </div>
                </label>

              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
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