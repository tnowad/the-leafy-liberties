<?php
$dsn = 'mysql:host=localhost;dbname=test';
$username = 'root';
$password = '';

try {
  $conn = new PDO($dsn, $username, $password);
  echo 'success';
} catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
}
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $newUsername = mysqli_real_escape_string($conn, $_POST["username"]);
  $newPassword = mysqli_real_escape_string($conn, $_POST["password"]);
  $confirmPassword = $_POST["confirm-password"];

  if ($newPassword !== $confirmPassword) {
    echo "<p>Passwords do not match.</p>";
  } else {
    $sql = "SELECT * FROM register WHERE username='$newUsername'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      echo "<p>Username already exists: $newUsername</p>";
    } else {
      $sql = "INSERT INTO register (username, password) VALUES ('$newUsername', '$newPassword')";
      $result = mysqli_query($conn, $sql);

      if ($result) {
        echo "<p>Successfully registered new user: $newUsername</p>";
      } else {
        echo "<p>Error registering new user: $newUsername</p>";
      }
    }
  }
}

mysqli_close($conn);
?>
<section class="bg-white">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
    <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0">
      <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
          Create and account
        </h1>
        <form class="space-y-4 md:space-y-6" action="/the-leafy-liberties/app/views/pages/Auth/register.php"
          method="post">
          <div>
            <label for="username" class="block mb-2 text-sm font-medium text-gray-900">
              Username
            </label>
            <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#52938d] focus:border-[#52938d] block w-full p-2.5" placeholder="Enter username" required="" />
          </div>
          <div class='relative'>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">
              Password
            </label>
            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#52938d] focus:border-[#52938d] block w-full p-2.5" required="" />
            <i id="hide-icon-password" class="fa fa-eye-slash absolute top-[60%] right-4 cursor-pointer" aria-hidden="true"></i>
            <i id="show-icon-password" class="fa fa-eye absolute hidden top-[60%] right-4 cursor-pointer" aria-hidden="true"></i>
          </div>
          <div class="relative">
            <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900">
              Confirm password
            </label>
            <input type="password" name="confirm-password" id="confirm-password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#52938d] focus:border-[#52938d] block w-full p-2.5" required />
            <i id="hide-icon-confirm-password" class="fa fa-eye-slash absolute top-[60%] right-4 cursor-pointer" aria-hidden="true"></i>
            <i id="show-icon-confirm-password" class="fa fa-eye absolute hidden top-[60%] right-4 cursor-pointer" aria-hidden="true"></i>
          </div>
          <div class="flex items-start">
            <div class="flex items-center h-5">
              <input id="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-[#add1ce] accent-[#52938d]" required />
            </div>
            <div class="ml-3 text-sm">
              <label for="terms" class="font-light text-gray-500 dark:text-gray-300">
                I accept the
                <a class="font-medium text-[#52938d] hover:underline" href="#">
                  Terms and Conditions
                </a>
              </label>

            </div>

          </div>
          <button type="submit" class="w-full text-white bg-[#52938d] hover:bg-[#40736d] focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            Create an account
          </button>
          <p class="text-sm font-light text-gray-500">
            Already have an account?
            <a href="./app/views/pages/Auth/login.php" class="font-medium text-[#52938d] hover:underline">
              Login here
            </a>
          </p>
        </form>
      </div>
    </div>
  </div>
</section>
<script>
  const password = document.getElementById("password");
  const hideIconPassword = document.getElementById("hide-icon-password");
  const showIconPassword = document.getElementById("show-icon-password");

  hideIconPassword.addEventListener("click", function() {
    if (password.type === "password") {
      password.type = "text";
      hideIconPassword.style.display = "none";
      showIconPassword.style.display = "block";
    }
  });
  showIconPassword.addEventListener("click", function() {
    if (password.type === "text") {
      password.type = "password";
      hideIconPassword.style.display = "block";
      showIconPassword.style.display = "none";
    }
  });

  const confirmPassword = document.getElementById("confirm-password");
  const hideIconConfirmPassword = document.getElementById("hide-icon-confirm-password");
  const showIconConfirmPassword = document.getElementById("show-icon-confirm-password");

  hideIconConfirmPassword.addEventListener("click", function() {
    if (confirmPassword.type === "password") {
      confirmPassword.type = "text";
      hideIconConfirmPassword.style.display = "none";
      showIconConfirmPassword.style.display = "block";
    }
  });
  showIconConfirmPassword.addEventListener("click", function() {
    if (confirmPassword.type === "text") {
      confirmPassword.type = "password";
      hideIconConfirmPassword.style.display = "block";
      showIconConfirmPassword.style.display = "none";
    }
  });
</script>
