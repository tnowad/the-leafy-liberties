<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>
    <?php echo $title ?? 'Page Title'; ?>
  </title>
  <link rel="stylesheet" href="./reset.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
  <?php require_once($header ?? '../layouts/default/header.php'); ?>

  <main>
    <?php include '../pages/index.php' ?>
  </main>

  <footer>
    <?php require_once($footer ?? '../layouts/default/footer.php'); ?>
  </footer>
</body>
<script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>

</html>
