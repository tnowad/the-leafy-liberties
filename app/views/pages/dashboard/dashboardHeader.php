<div class="w-full bg-white h-16 sticky top-0 border-0 border-solid border-l-[1px] border-gray-300 shadow-sm">
  <div class="header flex justify-between items-center h-full p-4">
    <div class="left flex justify-center items-center">
      <i class="fa-regular fa-bars-sort fa-lg mr-2 font-medium"></i>
      <span class="text-2xl font-medium text-[#52938d]">
        Dashboard
      </span>
    </div>
    <div class="right flex items-center relative z-[100]">
      <div class="avatar w-10 mr-2">
        <img src="../../../../resources/images/author.png" alt=""
          class="w-full h-full object-cover rounded-full cursor-pointer" onmouseover="showMenu()"
          onmouseout="hideMenuDelayed()" />
        <ul id="menu"
          class="absolute top-full right-0 flex-col gap-2 bg-white p-2 rounded-lg shadow-lg hidden transition-all z-[100]"
          onmouseover="showMenu()" onmouseout="hideMenuDelayed()">
          <li class=" whitespace-nowrap hover:bg-[#cee4e1] transition-all cursor-pointer p-2 text-left text-gray-600">
            <a href="/">User Setting</a>
          </li>
          <li class="whitespace-nowrap cursor-pointer hover:bg-[#cee4e1] transition-all p-2 text-left text-gray-600">
            <a href="/">Change password</a>
          </li>
          <li class="whitespace-nowrap cursor-pointer hover:bg-[#cee4e1] transition-all p-2 text-left text-gray-600">
            <a href="/">Logout</a>
          </li>
        </ul>
      </div>
      <span class="user" onmouseover="showMenu()" onmouseout="hideMenuDelayed()">admin</span>
    </div>
  </div>
</div>
<script>
  var timeoutId;

  function showMenu() {
    clearTimeout(timeoutId);
    document.getElementById("menu").style.display = "flex";
    document.getElementById("menu").style.opacity = "1";
  }

  function hideMenu() {
    document.getElementById("menu").style.display = "none";
    document.getElementById("menu").style.opacity = "0";

  }

  function hideMenuDelayed() {
    timeoutId = setTimeout(function () {
      hideMenu();
    }, 1000);
  }
</script>
