<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../layouts/reset.css">
  <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro-v6@44659d9/css/all.min.css" rel="stylesheet"
    type="text/css" />
  <title>Admin Dashboard</title>
</head>

<body>
  <div class="w-full bg-neutral-100">
    <div class="lg:grid lg:grid-cols-[256px_auto] sm:flex h-full">
      <?php include './dashboardMenu.php' ?>
      <div class="w-full">
        <?php include './dashboardHeader.php' ?>
        <div class="w-full min-h-screen xl:px-10 lg:px-0">
          <?php include './customer.php' ?>
        </div>
      </div>
    </div>
  </div>
</body>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>

</html>
