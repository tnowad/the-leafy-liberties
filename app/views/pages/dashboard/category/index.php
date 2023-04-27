<?php
use App\Models\Category;
use App\Models\Product;
use App\Models\Pagination;

?>

<div class="w-full mx-auto my-0">
  <div class="box-border w-full min-h-screen px-10 mt-10 sm:px-5">
    <div class="flex justify-between">
      <h1 class="text-xl font-bold">Category</h1>
      <div class="box-border w-1/2 px-10">
      <form action="<?php echo BASE_URI . '/dashboard/category' ?>" method="GET"
          class="flex items-center justify-center w-full h-10 bg-gray-100 rounded-full">
          <input type="text" name="keywords" class="w-full h-full pl-5 rounded-tl-full rounded-bl-full"
            placeholder="Search.... "
            value="<?php echo isset($params['filter']['keywords']) ? $params['filter']['keywords'] : '' ?>" />
          <button class="flex items-center justify-center w-10 h-10 bg-gray-100">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </form>
      </div>
      <a class="w-5 h-5 text-2xl add-category" href="<?php echo BASE_URI . '/dashboard/category/create' ?>">
        +
      </a>
    </div>
    <div class="my-8 bg-white shadow-lg cursor-pointer table-product-statistics rounded-2xl">
      <div class="relative">
        <table class="w-full text-sm text-center text-gray-500 rounded-2xl">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
              <?php
              $name = [
                "ID",
                "Image",
                "Name",
                "Action"
              ];
              for ($i = 1; $i <= count($name); $i++) { ?>
                <th scope="col" class="px-6 py-3">
                  <?php echo $name[$i - 1]; ?>
                </th>
              <?php }
              ?>
            </tr>
          </thead>
          <tbody>
            <?php
            if (count($categories) > 0): ?>
              <?php foreach ($categories as $category): ?>
                <tr class="text-center transition-opacity bg-white border-b hover:bg-gray-200 even:bg-gray-100">
                  <td class="px-5 py-3">
                    <?php echo $category->id; ?>
                  </td>
                  <td class="w-32 h-24 p-3">
                    <img src="<?php echo BASE_URI . $category->image; ?>" alt="" />
                  </td>
                  <td class="px-5 py-3">
                    <?php echo $category->name; ?>
                  </td>
                  <td class="gap-2 px-5 py-3">
                  <div class="button flex justify-center items-center gap-4">
                      <a href="<?php echo BASE_URI .
                        "/dashboard/category/update" .
                        "?id=" .
                        $category->id; ?>"
                        class="edit-button py-2 px-3 bg-blue-400 text-white rounded-xl hover:text-pink-500 transition-all">
                        <i class="fa-solid fa-pen-to-square"></i>
                      </a>
                      <a href="<?php echo BASE_URI .
                        "/dashboard/category/delete" .
                        "?id=" .
                        $category->id; ?>"
                        class="delete-button py-2 px-3 bg-red-400 text-white rounded-xl hover:text-blue-500 transition-all">
                        <i class="fa-solid fa-trash"></i>
                      </a>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endif;
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
