<!DOCTYPE html>
<html lang="en">

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
  <?php $params['header'] ?? require_once(__DIR__ . '/default/header.php'); ?>

  {{content}}

  <?php $params['footer'] ?? require_once(__DIR__ . '/default/footer.php'); ?>
</body>

<?php if (isset($params['toast'])): ?>
  <script type="module">
    import Toast from '<?php echo BASE_URI . '/resources/js/toast.js' ?>';
    new Toast({
      message: `<?php echo $params['toast']['message'] ?>`,
      type: '<?php echo $params['toast']['type'] ?>',
    });

    setTimeout(() => {
      new Toast({
        message: `<?php echo $params['toast']['message'] ?>`,
        type: '<?php echo $params['toast']['type'] ?>',
      });
    }, 5000);

  </script>
<?php endif; ?>

</html>