<?php $user = $params['user'] ?>
<div class="w-full min-h-screen ">
  <div class="bg-white rounded-md shadow-lg w-full p-5 my-5">
    <form class="flex flex-col" action="<?php echo BASE_URI . '/dashboard/user/update' ?>" method="POST">

      <label for="id" class="my-2">ID:</label>
      <input type="text" value="<?php echo $user->id ?>" name="id" class="bg-gray-100 p-3 focus:outline-none rounded-lg"
        disabled />

      <label for="name" class="my-2">Name:</label>
      <input type="text" value="<?php echo $user->name ?>" name="name"
        class="bg-gray-100 p-3 focus:outline-none rounded-lg" />

      <label for="expired" class="my-2">Email:</label>
      <input type="email" value="<?php echo $user->email ?>" name="email"
        class="bg-gray-100 p-3 focus:outline-none rounded-lg" />

      <label for="expired" class="my-2">Password:</label>
      <input type="password" value="<?php echo $user->password ?>" name="password"
        class="bg-gray-100 p-3 focus:outline-none rounded-lg" />
      <i id="hide-icon-password" class="fa fa-eye-slash absolute top-[43.5%] right-20 cursor-pointer"
        aria-hidden="true"></i>
      <i id="show-icon-password" class="fa fa-eye absolute hidden top-[43.5%] right-20 cursor-pointer"
        aria-hidden="true"></i>

      <label for="expired" class="my-2">Phone:</label>
      <input type="text" value="<?php echo $user->phone ?>" name="email"
        class="bg-gray-100 p-3 focus:outline-none rounded-lg" />

      <label for="gender" class="my-2">Select gender:</label>
      <select value="" name="gender" class="bg-gray-100 p-3 focus:outline-none rounded-lg">
        <option value="">Select gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
      </select>

      <button class="my-2 bg-[#2e524e] hover:bg-[#52938d] transition-colors text-white font-bold py-2 px-4 rounded"
        type="submit">
        Submit
      </button>
      <a class="cancel-edit-button my-1 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded text-center"
        href="<?php echo BASE_URI . '/dashboard/customer' ?>">
        Cancel
      </a>
    </form>
  </div>
</div>
<script>
  const password = document.querySelector("input[type=password]");
  // console.log(password)

  const hideIconPassword = document.getElementById("hide-icon-password");
  const showIconPassword = document.getElementById("show-icon-password");

  hideIconPassword.addEventListener("click", function () {
    if (password.type === "password") {
      password.type = "text";
      hideIconPassword.style.display = "none";
      showIconPassword.style.display = "block";
    }
  });
  showIconPassword.addEventListener("click", function () {
    if (password.type === "text") {
      password.type = "password";
      hideIconPassword.style.display = "block";
      showIconPassword.style.display = "none";
    }
  });
</script>
