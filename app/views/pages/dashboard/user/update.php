<div class="w-full min-h-screen ">
  <div class="bg-white rounded-md shadow-lg w-full p-5 my-5">
    <form class="flex flex-col" action="<?php echo BASE_URI .
      "/dashboard/user/update"; ?>" method="POST">

      <input type="hidden" name="id" value="<?php echo $user->id; ?>"
        class="bg-gray-100 p-3 focus:outline-none rounded-lg" />

      <label for="name" class="my-2">Name:</label>
      <input type="text" value="<?php echo $user->name; ?>" name="name"
        class="bg-gray-100 p-3 focus:outline-none rounded-lg" />

      <label for="expired" class="my-2">Email:</label>
      <input type="email" value="<?php echo $user->email; ?>" name="email"
        class="bg-gray-100 p-3 focus:outline-none rounded-lg" />

      <label for="expired" class="my-2">Password:</label>
      <input type="password" name="password" class="bg-gray-100 p-3 focus:outline-none rounded-lg" />
      <i id="hide-icon-password" class="fa fa-eye-slash absolute top-[34.5%] right-20 cursor-pointer"
        aria-hidden="true"></i>
      <i id="show-icon-password" class="fa fa-eye absolute hidden top-[34.5%] right-20 cursor-pointer"
        aria-hidden="true"></i>

      <label for="expired" class="my-2">Phone:</label>
      <input type="tel" value="<?php echo $user->phone; ?>" name="phone"
        class="bg-gray-100 p-3 focus:outline-none rounded-lg" />

      <label for="gender" class="my-2">Select gender:</label>
      <select value="" name="gender" class="bg-gray-100 p-3 focus:outline-none rounded-lg">
        <option value="">Select gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
      </select>
      <label for="role" class="my-2">Select role:</label>
      <select value="" name="gender" class="bg-gray-100 p-3 focus:outline-none rounded-lg">
        <option value="">Select role</option>
        <option value="1">Customer</option>
        <option value="2">Admin</option>
        <option value="3">Moderator</option>
      </select>
      <button class="my-2 bg-[#2e524e] hover:bg-[#52938d] transition-colors text-white font-bold py-2 px-4 rounded"
        type="submit">
        Submit
      </button>
      <a class="cancel-edit-button my-1 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded text-center"
        href="<?php echo BASE_URI . "/dashboard/user"; ?>">
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
  const inputs = document.querySelectorAll("input");
  inputs.forEach((input) => {
    input.addEventListener("blur", function () {
      if (input.type === "email") {
        if (!input.value.match(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g)) {
          input.style.border = "1px solid red";
        } else {
          input.style.border = "1px solid #d1d5db";
        }
      }
      if (input.type === "tel") {
        if (!input.value.match(/(84|0[3|5|7|8|9])+([0-9]{8})\b/g)) {
          input.style.border = "1px solid red";
        } else {
          input.style.border = "1px solid #d1d5db";
        }
      }
      if (input.type === "password") {
        if (!input.value.match(/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/g)) {
          input.style.border = "1px solid red";
        } else {
          input.style.border = "1px solid #d1d5db";
        }
      }
    });
  });
</script>
