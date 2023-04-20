<?php $user = $params["user"]; ?>
<div class="flex justify-center w-full bg-white">
  <div class="container">
    <div class="box-border flex flex-col w-full mt-10 border border-b-2 border-gray-300 md:flex-row">
      <?php include "menu.php"; ?>
      <!-- content -->
      <div class="w-full p-2 md:w-3/4">
        <form class="flex flex-col" action="<?php echo BASE_URI .
          "/profile"; ?>" method="post">
          <label>Name</label>
          <input name="name" value="<?php echo $user->name; ?>" type="text" required class="w-full p-5 duration-300 border border-gray-300 border-solid rounded-md h-9 hover:shadow-sm" />
          <label>Email</label>
          <input name="email" value=" <?php echo $user->email; ?>" type="email" required class="w-full p-5 duration-300 border border-gray-300 border-solid rounded-md h-9 hover:shadow-sm" />
          <label>Phone number</label>
          <input name="phone" value="<?php echo $user->phone; ?>" type="tel" class="w-full p-5 duration-300 border border-gray-300 border-solid rounded-md h-9 hover:shadow-sm" pattern="^(\+84|0)(1\d{9}|3\d{8}|5\d{8}|7\d{8}|8\d{8}|9\d{8})$" required></input>
          <label>Gender</label>
          <div class="relative inline-block">
            <select name="gender" id="gender" class="block w-full px-4 py-2 pr-8 leading-tight duration-300 bg-white border border-gray-400 rounded shadow appearance-none hover:shadow-sm focus:outline-none focus:shadow-outline">
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
            <input name="birthday" type="date" value="<?php echo $user->birthday; ?>" />
          </div>
          <label>Password change</label>
          <div class="flex flex-col p-2 border border-gray-300 border-solid rounded">
            <label for="password">
              Current password (leave blank to leave unchanged)
            </label>
            <input name="password" type="text" class="w-full p-5 border border-gray-300 border-solid rounded-md h-9" />
            <label for="new-password">Confirm new password</label>
            <input name="new-password" type="text" class="w-full p-5 border border-gray-300 border-solid rounded-md h-9" />
          </div>
          <input type="submit" value="Save changes" class="w-3/6 p-2 mt-5 text-white   bg-primary-800 hover:bg-teal-700 border cursor-pointer sm:w-1/6 rounded-2xl transition-all" />
        </form>
      </div>
    </div>
  </div>
</div>
<!-- <script>
  async function getUser() {
    let d1 = await fetch("http://localhost/the-leafy-liberties/getUsers")
    let d2 = await d1.json()
    console.log(d2)
  }
  console.log(1)
  getUser()
</script> -->