<div class="flex justify-center w-full bg-white">
  <div class="container">
    <div class="box-border flex flex-col w-full mt-10 border border-b-2 border-gray-300 md:flex-row relative">
      <?php include "menu.php"; ?>
      <!-- content -->
      <div class="w-full p-2 md:w-3/4">
        <form class="flex flex-col gap-1" action="<?php echo BASE_URI .
                                                    "/profile"; ?>" method="POST">
          <input type="file" name="image" id="upload-image" class="hidden">

          <label>Name</label>
          <input name="name" value="<?php echo $user->name; ?>" type="text" required class="w-full px-2 py-5 duration-300 border border-gray-300 border-solid rounded-md h-9 hover:shadow-sm shadow" />
          <label>Email</label>
          <input name="email" value=" <?php echo $user->email; ?>" type="email" required class="w-full px-2 py-5 duration-300 border border-gray-300 border-solid rounded-md h-9 hover:shadow-sm shadow" />
          <label>Phone number</label>
          <input name="phone" value="<?php echo $user->phone; ?>" type="tel" class="w-full px-2 py-5 duration-300 border border-gray-300 border-solid rounded-md h-9 hover:shadow-sm shadow" pattern="^(\+84|0)(1\d{9}|3\d{8}|5\d{8}|7\d{8}|8\d{8}|9\d{8})$" required></input>
          <label>Address</label>
          <input name="address" value="<?php echo $user->address; ?>" type="tel" class="w-full px-2 py-5 duration-300 border border-gray-300 border-solid rounded-md h-9 hover:shadow-sm shadow"></input>
          <label>Gender</label>
          <div class="relative inline-block">
            <select name="gender" id="gender" class="block w-full px-2 py-2 pr-8 leading-tight duration-300 bg-white border border-gray-300 rounded shadow appearance-none hover:shadow-sm focus:outline-none focus:shadow-outline">
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

          <!-- <label>Birthday</label> -->
          <!-- <div class="flex justify-between items-center w-full h-8 border rounded-md px-2 py-5 border-gray-300 shadow"> -->
          <!-- <input name="birthday" type="date" value="<?php echo $user->deleted_at; ?>" /> -->
          <!-- <input name="birthday" type="date" value="<?php echo date('Y-m-d', strtotime($user->birthday)); ?>" /> -->
          <!-- </div> -->
          <label>Password change</label>
          <div class="flex flex-col py-4 px-2 gap-1 border border-gray-300 border-solid rounded">
            <label for="password">
              Current password (leave blank to leave unchanged)
            </label>
            <input name="current-password" type="text" class="w-full p-5 border border-gray-300 border-solid rounded-md h-9 shadow" />
            <label for="new-password">Confirm new password</label>
            <input name="new-password" type="text" class="w-full p-5 border border-gray-300 border-solid rounded-md h-9 shadow" />
          </div>
          <input type="submit" value="Save changes" class="w-3/6 p-2 mt-5 text-white  bg-primary-800 hover:bg-teal-700 border cursor-pointer sm:w-1/6 rounded-lg transition-all" />
        </form>
      </div>
    </div>
  </div>
</div>