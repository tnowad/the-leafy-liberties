<?php $user = $params['user']; ?>
<div class="flex justify-center w-full bg-white">
  <div class="container">
    <div class="box-border flex flex-col w-full mt-5 border border-b-2 border-gray-300 md:mt-20 md:flex-row">
      <div class="flex flex-row justify-around w-3/4 md:flex-col md:justify-start md:w-1/4">
        <div class="flex flex-col items-center justify-center">
          <img src="<?php echo $user->user_image ? $user->user_image : BASE_URI . "/resources/images/avatar.png" ?>"
            class="w-3/6" alt="avatar" />
          <h1 class="inline-block w-8/12 mt-5 text-xl lg:w-5/12 lg:text-center">

          </h1>
        </div>
        <div class="flex flex-col items-start justify-center mx-auto">
          <div class="flex mt-5">
            <FontAwesomeIcon icon={faHome} size="xl" class="mr-2" />
            <h3 class="text-xl cursor-pointer">Overview</h3>
          </div>
          <div class="flex mt-5">
            <FontAwesomeIcon icon={faUser} size="xl" class="mr-2" />
            <h3 class="cursor-pointer">Account settings</h3>
          </div>
          <div class="flex mt-5">
            <FontAwesomeIcon icon={faCheck} size="xl" class="mr-2" />
            <h3 class="cursor-pointer">Payments</h3>
          </div>
          <div class="flex mt-5">
            <FontAwesomeIcon icon={faBagShopping} size="xl" class="mr-2" />
            <h3 class="cursor-pointer">Order</h3>
          </div>
        </div>
      </div>
      <!-- //? information detail  -->
      <div class="w-full p-2 md:w-3/4">
        <form class="flex flex-col">
          <!-- //? group full name  -->
          <div class="flex flex-row justify-between">
            <div class="flex flex-col w-4/12">
              <label>Name *</label>
              <input value="<?php echo $user->name ?>" type="text" required
                class="w-full p-5 border border-gray-300 border-solid rounded-md h-9" />
            </div>
          </div>
          <label>Email *</label>
          <input value="<?php echo $user->email ?>" type="email" required
            class="w-full p-5 border border-gray-300 border-solid rounded-md h-9" />
          <label>Phone number *</label>
          <input value="<?php echo $user->phone ?>" type="tel"
            class="w-full p-5 border border-gray-300 border-solid rounded-md h-9" name="phone"
            placeholder="+84XXXXXXXXX" pattern="^(\+84|0)(1\d{9}|3\d{8}|5\d{8}|7\d{8}|8\d{8}|9\d{8})$" required></input>
          <label>Gender *</label>
          <div class="relative inline-block">
            <select name="gender" id="gender"
              class="block w-full px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
              <option value="male" <?php if ($user->gender == "1") {
                echo "selected";
              } ?>>Male</option>
              <option value="female" <?php if ($user->gender == "2") {
                echo "selected";
              } ?>>Female</option>
              <option value="other" <?php if ($user->gender == "0") {
                echo "selected";
              } ?>>Other</option>
            </select>
            <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
              <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
              </svg>
            </div>
          </div>

          <label>Birthday *</label>
          <div class="flex justify-between w-full h-8 md:h-10 md:w-2/4">
            <input type="number" min="1" max="31"
              class="p-1 pl-6 text-base border border-gray-300 border-solid rounded md:text-2xl" />
            <div class="h-8 p-1 border border-gray-300 border-solid rounded md:h-10">
              <span>Month:</span>
              <input type="number" class="w-8 h-2 pl-1 md:pl-2 md:h-8" min="1" max="12" />
            </div>

            <div class="p-1 border border-gray-300 border-solid rounded">
              <span>Year:</span>
              <input type="number" class="h-2 pl-1 md:pl-2 md:h-8" min="1900" max="2023" />
            </div>
          </div>
          <label class="mt-10 ml-10">Password change</label>
          <div class="flex flex-col p-2 border border-teal-800 border-solid rounded">
            <div class="lg:w-3/4">
              <label>
                Current password (leave blank to leave unchanged)
              </label>
              <input type="text" class="w-full p-5 border border-gray-300 border-solid rounded-md h-9" />
            </div>
            <div class="lg:w-3/4">
              <label>
                Current password (leave blank to leave unchanged)
              </label>
              <input type="text" class="w-full p-5 border border-gray-300 border-solid rounded-md h-9" />
            </div>
            <div class="lg:w-3/4">
              <label>Confirm new password</label>

              <input type="text" class="w-full p-5 border border-gray-300 border-solid rounded-md h-9" />
            </div>
          </div>
          <input type="submit" value="Save changes"
            class="w-3/6 p-2 mt-5 text-white transition-all bg-teal-800 border cursor-pointer sm:w-1/6 rounded-2xl" />
        </form>
      </div>
    </div>
  </div>
</div>
