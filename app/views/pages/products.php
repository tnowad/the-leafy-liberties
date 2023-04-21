<?php
use App\Models\Author;
use App\Models\Category;
use App\Models\Tag;

$filter = $params['filter'];
$pagination = $params['pagination'];
$products = $pagination['products'];

?>
<div class="flex justify-center my-10">
  <div class="container grid lg:grid-cols-[200px,auto] 2xl:grid-cols-[250px,auto]">
    <div class="box-border mx-2 min-h-max ">
      <div class="fixed">
        <h1 class="mb-2 text-2xl font-bold">Filter</h1>
        <div class="grid justify-around grid-cols-3 lg:block">
          <form class="w-full" id="filter-form" method="GET" action="<?php echo BASE_URI . '/products' ?>">
            <input type="hidden" name="page" value="1">
            <input type="hidden" name="limit" value="<?php echo $pagination['limit'] ?>">
            <input type="hidden" name="keywords" value="<?php echo $filter['keywords'] ?>">
            <h1 class="mt-2 mb-2 text-xl font-bold">Category</h1>
            <ul class="ml-2">
              <li>
                <label>
                  <input type="checkbox" name="categories[]" value="all" <?php echo in_array('all', $filter['categories']) ? 'checked' : '' ?>>
                  <span class="ml-2">
                    All
                  </span>
                </label>
                <?php foreach (Category::all() as $category): ?>
                <li>
                  <label>
                    <input type="checkbox" name="categories[]" value="<?php echo $category->id ?>" <?php echo in_array($category->id, $filter['categories']) ? 'checked' : '' ?>>
                    <span class="ml-2">
                      <?php echo $category->name ?>
                    </span>
                  </label>
                </li>
              <?php endforeach; ?>
            </ul>
            <h1 class="mt-2 mb-2 text-xl font-bold">Tags</h1>
            <ul class="ml-2">
              <?php foreach (Tag::all() as $tag): ?>
                <li>
                  <label>
                    <input type="checkbox" name="tags[]" value="<?php echo $tag->id ?>" <?php echo in_array($tag->id, $filter['tags']) ? 'checked' : '' ?>>
                    <span class="ml-2">
                      <?php echo $tag->name ?>
                    </span>
                  </label>
                </li>
              <?php endforeach; ?>
            </ul>
            <h1 class="mt-2 mb-2 text-xl font-bold">Author</h1>
            <select name="author" id="" class="w-full px-3 py-1 border border-gray-300 rounded-sm">
              <option value="">All</option>
              <?php foreach (Author::all() as $author): ?>
                <option value="<?php echo $author->id ?>" <?php echo $filter['author'] == $author->id ? 'selected' : '' ?>>
                  <?php echo $author->name ?>
                </option>
              <?php endforeach; ?>
            </select>
            <h1 class="mt-2 mb-2 text-xl font-bold">Price range</h1>
            <div class="flex items-center justify-start gap-2">
              <input type="number" name="min-price" value="<?php echo $filter['price']['min'] ?>"
                class="w-20 px-3 py-1 border border-gray-300 rounded-sm">
              <span class="text-lg"> - </span>
              <input type="number" name="max-price" value="<?php echo $filter['price']['max'] ?>"
                class="w-20 px-3 py-1 border border-gray-300 rounded-sm">
            </div>
            <input type="submit" value="Filter"
              class="py-2 px-5 bg-[#315854] font-semibold text-white rounded-lg my-5 hover:bg-[#6cada6] transition-all cursor-pointer" />
          </form>
        </div>
      </div>
    </div>
    <div id="products-content">
      <div id="product-list" class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4">
        <?php foreach ($products as $product): ?>
          <div
            class="box-border flex flex-col items-center w-full pt-5 transition-all border border-solid product-info group hover:border-gray-500 hover:shadow-xl">
            <div class="object-cover h-[330px] overflow-hidden p-2 px-[22px] w-60">
              <a href="<?php echo BASE_URI . "/product?id=" . $product->id; ?>">
                <img src="<?php echo BASE_URI . $product->image; ?>" alt="" class="object-cover w-full h-full" />
              </a>
            </div>
            <div
              class="flex flex-col items-start justify-center w-full box-border px-[20px] text-lg font-medium transition-all bg-white product-body group-hover:-translate-y-16">
              <div class="product-name">
                <a href="<?php echo BASE_URI . "/product?id=" . $product->id; ?>">
                  <?php echo $product->name; ?>
                </a>
              </div>
              <div class="text-sm text-gray-500 product-author">
                <?php echo $product->author()->name; ?>
              </div>
              <div class="p-0 font-semibold product-price text-primary-900">
                <?php echo $product->price; ?>$
              </div>
              <div
                class="flex items-center justify-between w-full transition-all translate-y-0 opacity-0 heart-option group-hover:opacity-100">
                <p class="font-semibold select-option-text hover:color-red-400 ">Add to wishlist</p>
                <i class="p-2 transition-all rounded-full cursor-pointer fa-regular fa-heart hover:bg-red-400 hover:text-white"
                  onclick="addToWishList(`<?php echo $product->id; ?>`)"></i>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="my-5">
        <div id="pagination" class="flex items-center justify-center gap-5 text-center pagination">
          <div
            class="pagination-items p-2 bg-gray-100 rounded-full text-[#52938d] font-semibold hover:text-white hover:bg-[#2e524e] transition-all">
            <a onclick="openPage(<?php echo $pagination['page'] - 1 ?>)">Previous</a>
          </div>
          <?php for ($i = 1; $i <= $pagination['totalPages']; $i++): ?>
            <div
              class="p-2 <?php echo $i == $pagination['page'] ? 'bg-[#52938d] text-white font-semibold' : 'bg-gray-100 text-[#52938d] font-semibold hover:text-white hover:bg-[#2e524e] transition-all'; ?> rounded-full">
              <a onclick="openPage(<?php echo $i ?>)">
                <?php echo $i; ?>
              </a>
            </div>
          <?php endfor; ?>
          <div
            class="pagination-items p-2 bg-gray-100 rounded-full text-[#52938d] font-semibold hover:text-white hover:bg-[#2e524e] transition-all">
            <a onclick="openPage(<?php echo $pagination['page'] + 1 ?>)">Next</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  const filterForm = document.getElementById('filter-form');
  document.openPage = (page) => {
    if (filterForm.page.value === page || page < 1 || page > <?php echo $pagination['totalPages'] ?>) return;
    filterForm.page.value = page;
    filterForm.submit();
  }

</script>