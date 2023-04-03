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

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = mysqli_real_escape_string($conn, $_POST["username"]);
  $password = mysqli_real_escape_string($conn, $_POST["password"]);

  $sql = "SELECT * FROM users WHERE username = '$username' and password = '$password'";
  $result = mysqli_query($conn, $sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo "id: " . $row["id"] . " - Name: " . $row["username"] . "<br>";
    }
    session_start();
    $_SESSION["username"] = $username;
    echo "<p>Success</p>";
  } else {
    echo "Invalid username or password";
  }
}

mysqli_close($conn);
?>


<section class="bg-white">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
    <div class="w-full bg-white rounded-lg shadow-[0_0_10px_3px_rgba(0,0,0,0.1)] dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
      <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
          Sign in to your account
        </h1>
        <form class="space-y-4 md:space-y-6" action="/Do%20an%20web/the-leafy-liberties/app/views/pages/Auth/login.php" method="post">
          <div>
            <label htmlFor="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
              Your username
            </label>
            <input type="text" name="username" id="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter username" required="" />
          </div>
          <div class="relative">
            <label htmlFor="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
              Password
            </label>
            <input type="password" id="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="" />
            <i id="hide-icon" class="fa fa-eye-slash absolute top-[60%] right-4 cursor-pointer" aria-hidden="true"></i>
            <i id="show-icon" class="fa fa-eye absolute hidden top-[60%] right-4 cursor-pointer" aria-hidden="true"></i>
          </div>
          <div class="flex items-center justify-between">
            <div class="flex items-start">
              <div class="flex items-center h-5">
                <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-green-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-green-600 dark:ring-offset-gray-800" required="" />
              </div>
              <div class="ml-3 text-sm">
                <label htmlFor="remember" class="text-gray-500 dark:text-gray-300">
                  Remember me
                </label>
              </div>
            </div>
            <a href="#" class="text-sm font-medium text-green-600 hover:underline dark:text-green-500">
              Forgot password?
            </a>
          </div>
          <button type="submit" class="w-full text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
            Sign in
          </button>
          <p class="text-sm font-light text-gray-500 dark:text-gray-400">
            Don’t have an account yet?

            <button type="submit" name="submit" class="font-medium text-green-600 hover:underline dark:text-green-500">
              Sign up

            </button>
          </p>
        </form>
      </div>
    </div>
  </div>
</section>
<script>
  const passwordInput = document.getElementById("password");
  const hideIcon = document.getElementById("hide-icon");
  const showIcon = document.getElementById("show-icon");

  hideIcon.addEventListener("click", function() {
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      hideIcon.style.display = "none";
      s
      howIcon.style.display = "block";
    }
  });
  showIcon.addEventListener("click", function() {
    if (passwordInput.type === "text") {
      passwordInput.type = "password";
      hideIcon.style.display = "block";
      showIcon.style.display = "none";
    }
  });
</script>