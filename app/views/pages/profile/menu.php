<div class="flex flex-row justify-around w-3/4 md:flex-col md:justify-start md:w-1/4">
  <div class="flex flex-col items-center justify-center">
    <img src="<?php echo $user->user_image
      ? $user->user_image
      : BASE_URI .
        "/resources/images/avatar.png"; ?>" class="w-3/6" alt="avatar" />
    <h1 class="inline-block w-8/12 mt-5 text-xl lg:w-5/12 lg:text-center">
    </h1>
  </div>
  <div class="box-border flex flex-col items-start justify-center px-6">
    <a href="<?php echo BASE_URI .
      "/profile"; ?>" class="w-40 flex mt-5 p-2 hover:bg-primary-800 hover:text-white rounded-sm transition-all">
      <i class="flex items-center fa fa-home mr-2"></i>
      <h3 class="text-xl cursor-pointer">Overview</h3>
    </a>
    <a href="<?php echo BASE_URI .
      "/profile/settings"; ?>" class="w-40 flex mt-5 p-2 hover:bg-primary-800 hover:text-white rounded-sm transition-all">
      <i class="flex items-center fa fa-user mr-2"></i>
      <h3 class="cursor-pointer">Account settings</h3>
    </a>
    <a href="<?php echo BASE_URI .
      "/profile/payments"; ?>" class="w-40 flex mt-5 p-2 hover:bg-primary-800 hover:text-white rounded-sm transition-all">
      <i class="flex items-center fa fa-check mr-2"></i>
      <h3 class="cursor-pointer">Payments</h3>
    </a>
    <a href="<?php echo BASE_URI .
      "/profile/orders"; ?>" class="w-40 flex mt-5 p-2 hover:bg-primary-800 hover:text-white rounded-sm transition-all">
      <i class="flex items-center fa fa-bag-shopping mr-2"></i>
      <h3 class="cursor-pointer">Order</h3>
    </a>
  </div>
</div>

<script>
  var currentPath = window.location.pathname;
  var links = document.getElementsByTagName("a");
  for (var i = 0; i < links.length; i++) {
    if (links[i].getAttribute("href") === currentPath) {
      links[i].classList.add("bg-primary-800", "text-white");
      console.log(links[i].classList)
    } else {
      links[i].classList.remove("bg-primary-800", "text-white");
    }
  }
</script>