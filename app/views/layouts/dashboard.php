<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="../../layouts/reset.css">
  <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro-v6@44659d9/css/all.min.css" rel="stylesheet"
    type="text/css" />
  <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
</head>

<body>
  <div class="w-full bg-neutral-100">
    <div class="grid md:grid-cols-[256px_auto] sm:grid-cols-[64px_auto] h-full">
      <?php $params['sidebar'] ?? require_once(__DIR__ . '/default/sidebar.php'); ?>
      <div class="w-full">
        <?php $params['header'] ?? require_once(__DIR__ . '/dashboard/header.php'); ?>
        <div class="w-full min-h-screen xl:px-10 lg:px-0">
          {{content}}
        </div>
      </div>
    </div>
  </div>
</body>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>

</html>