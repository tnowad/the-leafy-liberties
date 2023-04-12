<?php $user = $params['user']; ?>
<div class="flex justify-center w-full bg-white">
  <div class="container">
    <div class="box-border flex flex-col w-full mt-10 border border-b-2 border-gray-300 md:flex-row">
      <div class="flex flex-row justify-around w-3/4 md:flex-col md:justify-start md:w-1/4">
        <div class="flex flex-col items-center justify-center">
          <img src="<?php echo $user->user_image ? $user->user_image : BASE_URI . "/resources/images/avatar.png" ?>"
            class="w-3/6" alt="avatar" />
          <h1 class="inline-block w-8/12 mt-5 text-xl lg:w-5/12 lg:text-center">
          </h1>
        </div>
        <div class="box-border flex flex-col items-start justify-center px-6">
          <div class="flex mt-5 bg-primary">
            <i class="flex items-center fa fa-home"></i>
            <h3 class="text-xl cursor-pointer">Overview</h3>
          </div>
          <div class="flex mt-5 ">
            <i class="flex items-center fa fa-user"></i>
            <h3 class="cursor-pointer">Account settings</h3>
          </div>
          <div class="flex mt-5">
            <i class="flex items-center fa fa-check"></i>
            <h3 class="cursor-pointer">Payments</h3>
          </div>
          <div class="flex justify-between mt-5">
            <i class="flex items-center fa fa-bag-shopping"></i>
            <h3 class="cursor-pointer">Order</h3>
          </div>
        </div>
      </div>
      <div class="w-full p-2 md:w-3/4">
        <form class="flex flex-col" action="<?php echo BASE_URI . '/profile' ?>" method="post">
          <label>Name</label>
          <input name="name" value="<?php echo $user->name ?>" type="text" required
            class="w-full p-5 duration-300 border border-gray-300 border-solid rounded-md h-9 hover:shadow-sm" />
          <label>Email</label>
          <input name="email" value=" <?php echo $user->email ?>" type="email" required
            class="w-full p-5 duration-300 border border-gray-300 border-solid rounded-md h-9 hover:shadow-sm" />
          <label>Phone number</label>
          <input name="phone" value="<?php echo $user->phone ?>" type="tel"
            class="w-full p-5 duration-300 border border-gray-300 border-solid rounded-md h-9 hover:shadow-sm"
            pattern="^(\+84|0)(1\d{9}|3\d{8}|5\d{8}|7\d{8}|8\d{8}|9\d{8})$" required></input>
          <label>Gender</label>
          <div class="relative inline-block">
            <select name="gender" id="gender"
              class="block w-full px-4 py-2 pr-8 leading-tight duration-300 bg-white border border-gray-400 rounded shadow appearance-none hover:shadow-sm focus:outline-none focus:shadow-outline">
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
          </div>

          <label>Birthday</label>
          <div class="flex justify-between w-full h-8 md:h-10 md:w-2/4">
            <input name="birthday" type="date" value="<?php echo $user->birthday ?>" />
          </div>
          <label>Password change</label>
          <div class="flex flex-col p-2 border border-gray-300 border-solid rounded">
            <label for="password">
              Current password (leave blank to leave unchanged)
            </label>
            <input name="password" type="text" class="w-full p-5 border border-gray-300 border-solid rounded-md h-9" />
            <label for="new-password">Confirm new password</label>
            <input name="new-password" type="text"
              class="w-full p-5 border border-gray-300 border-solid rounded-md h-9" />
          </div>
          <input type="submit" value="Save changes"
            class="w-3/6 p-2 mt-5 text-white transition-all bg-teal-800 border cursor-pointer sm:w-1/6 rounded-2xl" />
        </form>
      </div>
    </div>
  </div>
</div>