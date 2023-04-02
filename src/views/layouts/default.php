<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>
    <?php echo $title ?? 'Page Title'; ?>
  </title>
</head>

<body>
  <header>
    <?php require_once($header ?? 'layouts/default/header.php'); ?>
  </header>

  <main>
    <?php echo $content ?? ''; ?>
  </main>

  <footer>
    <?php require_once($footer ?? 'layouts/default/footer.php'); ?>
  </footer>
</body>

</html>