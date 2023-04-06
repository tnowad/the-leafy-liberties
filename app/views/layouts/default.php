<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>
    <?php echo $params['title'] ?? 'The Leafy Liberties Bookstore' ?>
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="The Leafy Liberties Bookstore">
  <meta name="keywords" content="bookstore, books, leafy liberties, leafy, liberties">
  <meta name="author" content="Leafy Liberties">
  <meta name="theme-color" content="#ffffff">
  <link rel="icon" href="<?php echo BASE_URI . '/resources/images/logo.png' ?>" type="image/png">
  <link rel="stylesheet" href="<?php echo BASE_URI . '/resources/css/all.css' ?>">
  <link rel="stylesheet" href="<?php echo BASE_URI . '/resources/css/reset.css' ?>">

  <script src="<?php echo BASE_URI . '/resources/js/tailwindcss.js' ?>"></script>
  <script src="<?php echo BASE_URI . '/resources/js/flowbite.js' ?>"></script>

</head>

<body>
  <?php require_once($header ?? __DIR__ . '/default/header.php'); ?>

  {{content}}

  <?php require_once($footer ?? __DIR__ . '/default/footer.php'); ?>
</body>

</html>
