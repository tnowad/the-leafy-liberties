<div class="relative">
  <button class="hover:bg-gray-200 focus:outline-none">
    Hover me
  </button>
  <?php if (isset($_GET['hover'])): ?>
    <ul class="absolute bg-white border border-gray-200 py-2 mt-1 w-32 rounded-lg shadow-lg z-10">
      <li class="px-3 py-2 hover:bg-gray-100">
        <a href="#">Menu item 1</a>
      </li>
      <li class="px-3 py-2 hover:bg-gray-100">
        <a href="#">Menu item 2</a>
      </li>
      <li class="px-3 py-2 hover:bg-gray-100">
        <a href="#">Menu item 3</a>
      </li>
    </ul>
  <?php endif; ?>
</div>
