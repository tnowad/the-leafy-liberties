<div class="flex flex-row justify-around w-3/4 md:flex-col md:justify-start md:w-1/4 p-4">
  <div class="flex flex-col items-center justify-center">
    <div class="w-1/2 relative cursor-pointer">
      <img src="<?php echo $user->user_image
        ? $user->user_image
        : BASE_URI .
        "/resources/images/avatar.png"; ?>" class="w-full h-full object-contain rounded-full" alt="avatar" />
    </div>
    <div onclick="document.querySelector('#upload-image').click()" class="absolute text-4xl cursor-pointer">
      <!-- upload -->
      <i
        class="fa-regular fa-camera rounded-full p-16 hover:bg-gray-200 hover:backdrop-blur-xl transition-all opacity-0 hover:opacity-100 "></i>
    </div>
  </div>
  <div class="box-border flex flex-col items-start justify-center px-6">
    <a href="<?php echo BASE_URI .
      "/profile"; ?>"
      class="w-40 flex mt-5 p-2 hover:bg-primary-600 hover:text-white rounded-lg transition-all">
      <i class="flex items-center fa fa-home mr-2"></i>
      <h3 class="text-xl cursor-pointer">Overview</h3>
    </a>
    <a href="<?php echo BASE_URI .
      "/profile/settings"; ?>"
      class="w-40 flex mt-5 p-2 hover:bg-primary-600 hover:text-white rounded-lg transition-all">
      <i class="flex items-center fa fa-user mr-2"></i>
      <h3 class="cursor-pointer">Account settings</h3>
    </a>
    <a href="<?php echo BASE_URI .
      "/profile/orders"; ?>"
      class="w-40 flex mt-5 p-2 hover:bg-primary-600 hover:text-white rounded-lg transition-all">
      <i class="flex items-center fa fa-bag-shopping mr-2"></i>
      <h3 class="cursor-pointer">My Order</h3>
    </a>
  </div>
</div>

<script>
  var currentPath = window.location.pathname;
  var links = document.getElementsByTagName("a");
  for (var i = 0; i < links.length; i++) {
    if (links[i].getAttribute("href") === currentPath) {
      links[i].classList.add("bg-primary-200", "text-primary");
      console.log(links[i].classList)
    } else {
      links[i].classList.remove("bg-primary-200", "text-primary");
    }
  }
</script>
