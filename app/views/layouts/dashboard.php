<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php echo $params['title'] ?? 'Dashboard' ?>
  </title>
  <link rel="icon" type="image/x-icon" href="<?php echo BASE_URI . '/resources/images/logo.png' ?>">
  <link rel="stylesheet" href="<?php echo BASE_URI . '/resources/css/reset.css' ?>">
  <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro-v6@44659d9/css/all.min.css" rel="stylesheet"
    type="text/css" />
  <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
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
  <div class="w-full bg-neutral-100">
    <div class="flex h-full">
      <?php $params['sidebar'] ?? require_once(__DIR__ . '/dashboard/menu.php'); ?>
      <div class="w-full">
        <?php $params['header'] ?? require_once(__DIR__ . '/dashboard/header.php'); ?>
        <div class="w-full min-h-screen xl:px-10 lg:px-0" id="content">
          {{content}}
        </div>
      </div>
    </div>
  </div>
</body>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>

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
