<!DOCTYPE html>
<html lang="en">
<?php
use App\Models\Permission;
use Core\Application;

$auth = Application::getInstance()->getAuthentication();

$currentUser = $auth->getUser();
$role = $currentUser->role();
$permissions = Permission::all();
foreach ($permissions as $permission) {
  $role->addPermission($permission);
}
dd($permissions);
?>

<head>
  <meta charset="UTF-8">
  <title>
    <?php echo $params['title'] ?? 'The Leafy Liberties Bookstore'
      ?>
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="The Leafy Liberties Bookstore">
  <meta name="keywords" content="bookstore, books, leafy liberties, leafy, liberties">
  <meta name="author" content="Leafy Liberties">
  <meta name="theme-color" content="#ffffff">
  <link rel="icon" type="image/x-icon" href="<?php echo BASE_URI . '/resources/images/logo.png' ?>">
  <link rel="stylesheet" href="<?php echo BASE_URI . '/resources/css/all.css' ?>">
  <link rel="stylesheet" href="<?php echo BASE_URI . '/resources/css/reset.css' ?>">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="<?php echo BASE_URI . '/resources/js/tailwindcss.js' ?>"></script>
  <script src="<?php echo BASE_URI . '/resources/js/flowbite.js' ?>"></script>
  <script>
    tailwind.config = {
      theme: {
        screens: {
          mobile: "470px",
          sm: "576px",
          md: "768px",
          lg: "992px",
          xl: "1200px",
          "2xl": "1440px",
        },
        extend: {
          colors: {
            primary: "#315854",
            "primary-100": "#eff6f5",
            "primary-200": "#cee4e1",
            "primary-300": "#add1ce",
            "primary-400": "#8cbfba",
            "primary-500": "#6cada6",
            "primary-600": "#52938d",
            "primary-700": "#40736d",
            "primary-800": "#2e524e",
            "primary-900": "#1b312f",
          },
        },
      },

    }
  </script>
</head>

<body>
  <?php $params['header'] ?? require_once(__DIR__ . '/default/header.php'); ?>

  {{content}}

  <?php $params['footer'] ?? require_once(__DIR__ . '/default/footer.php'); ?>
</body>
<?php

?>
<script type="module">
  import { parseUrlParameters } from '<?php echo BASE_URI . '/resources/js/url-utils.js' ?>';
  import Toast from '<?php echo BASE_URI . '/resources/js/toast.js' ?>';

  const paramsString = window.location.search.substr(1);
  const params = parseUrlParameters(paramsString);
  const { toast } = params;
  if (toast) {
    new Toast(toast);
  }
</script>

</html>