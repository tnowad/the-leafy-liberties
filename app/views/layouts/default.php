<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>
    <?php echo $title ?? 'Page Title'; ?>
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./resources/css/all.css">
  <script src="resources/js/tailwindcss.js"></script>

  <script src="./resources/js/flowbite.js"></script>
</head>

<body>
  <?php
  require_once($header ?? __DIR__ . '/default/header.php');
  ?>

  <?php
  include './app/views/pages/shop.php';
  ?>


  <?php
  require_once($footer ?? __DIR__ . '/default/footer.php');
  ?>
</body>

</html>
