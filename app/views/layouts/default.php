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
<?php if ($params['toast']): ?>
  <script>
    const toast = document.createElement('div');
    toast.classList.add('fixed', 'top-0', 'right-0', 'z-50', 'w-1/2', 'max-w-sm', 'p-4', 'm-4', 'bg-white', 'rounded-lg', 'shadow-lg', 'pointer-events-none', 'transition-all', 'duration-300', 'ease-in-out', 'transform', 'translate-x-1/2', 'translate-y-1/2', 'opacity-0', 'scale-95');
    toast.innerHTML = `
                  <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                      <?php if ($params['toast']['type'] === 'success'): ?>
                          <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                          </svg>
                      <?php elseif ($params['toast']['type'] === 'error'): ?>
                          <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                          </svg>
                      <?php elseif ($params['toast']['type'] === 'info'): ?>
                          <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                          </svg>
                      <?php endif; ?>
                    </div>
                    <div>
                      <p class="text-sm font-medium text-gray-900">
                        <?php echo $params['toast']['message'] ?>
                      </p>
                    </div>
                  </div>
                `;
    document.body.appendChild(toast);
    setTimeout(() => {
      toast.classList.remove('opacity-0', 'scale-95', 'translate-x-1/2', 'translate-y-1/2');
      toast.classList.add('opacity-100', 'scale-100', 'translate-x-0', 'translate-y-0');
    }, 100);
    setTimeout(() => {
      toast.classList.remove('opacity-100', 'scale-100', 'translate-x-0', 'translate-y-0');
      toast.classList.add('opacity-0', 'scale-95', 'translate-x-1/2', 'translate-y-1/2');
    }, 5000);

  </script>
<?php endif; ?>

</html>
