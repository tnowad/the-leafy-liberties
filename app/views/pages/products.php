<?php
use App\Models\Author;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use App\Models\Wishlist;
use Core\Application;

$auth = Application::getInstance()->getAuthentication();
$user = $auth->getUser();
$filter = $params['filter'];
$pagination = $params['pagination'];
$products = $pagination['products'];
?>
<div class="flex justify-center my-10">
  <div class="container grid lg:grid-cols-[260px,auto] 2xl:grid-cols-[300px,auto]">
    <div class="box-border mx-0 mb-2 lg:mb-0 lg:mx-5 min-h-max">
      <div class="border border-gray-200 shadow-sm w-full">
        <form class="w-full" id="filter-form" method="GET" action="<?php echo BASE_URI . '/products' ?>">
          <input type="hidden" name="page" value="1">
          <input type="hidden" name="limit" value="<?php echo $pagination['limit'] ?>">
          <input type="hidden" name="keywords" value="<?php echo $filter['keywords'] ?>">
          <div class="border-b border-gray-200">
            <div class="px-4 py-2 relative">
              <div class="flex justify-between items-center">
                <h1 class="mt-2 mb-2 text-xl font-medium">Categories</h1>
                <i class="open-category fa-solid fa-plus cursor-pointer"></i>
              </div>
              <ul class="category-list ml-2 h-0 overflow-hidden">
                <li>
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
            </div>
          </div>

          <div class="border-b border-gray-200">
            <div class="px-4 py-2">
              <div class="flex justify-between items-center">
                <h1 class="mt-2 mb-2 text-xl font-medium">Tags</h1>
                <i class="open-tags fa-solid fa-plus cursor-pointer"></i>
              </div>
              <ul class="tags-list ml-2 h-0 overflow-hidden">
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
            </div>
          </div>
          <div class="border-b border-gray-200">

            <div class="px-4 py-2">
              <h1 class="mt-2 mb-2 text-xl font-medium">Author</h1>
              <select name="author" id="" class="w-full px-3 py-1 border border-gray-300 rounded-sm appearance-none">
                <option value="">All</option>
                <?php foreach (Author::all() as $author): ?>
                  <option value="<?php echo $author->id ?>" <?php echo $filter['author'] == $author->id ? 'selected' : '' ?>>
                    <?php echo $author->name ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="border-b border-gray-200">
            <div class="px-4 py-2">
              <h1 class="text-xl font-medium">Price range</h1>
              <div class="flex items-center justify-start gap-2 py-3">
                <input type="number" name="min-price" value="<?php echo $filter['price']['min'] ?>"
                  class="w-20 px-3 py-1 border border-gray-300 rounded-sm">
                <span class="text-lg"> - </span>
                <input type="number" name="max-price" value="<?php echo $filter['price']['max'] ?>"
                  class="w-20 px-3 py-1 border border-gray-300 rounded-sm">
              </div>
            </div>
          </div>
          <input type="submit" value="Filter"
            class="py-2 px-5 bg-[#315854] font-semibold text-white rounded-lg my-5 mx-4 hover:bg-primary-700 transition-all cursor-pointer" />
        </form>
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
              <?php
              if ($user != null) {
                $cartCheck = Cart::findOne(["user_id" => $user->id, "product_id" => $product->id]);
                $wishlistCheck = Wishlist::findOne(["user_id" => $user->id, "product_id" => $product->id]);
              }
              ?>
              <?php if ($auth->hasPermission("dashboard.access")): ?>
                <div
                  class="flex items-center justify-between w-full transition-all translate-y-0 opacity-0 heart-option group-hover:opacity-100">
                  <p class="font-semibold select-option-text hover:color-red-400 uppercase cursor-pointer relative before:w-0 before:h-[1px] before:bg-black before:content-[''] before:absolute before:bottom-0 before:hover:w-full before:transition-all"
                    onclick="location.href='<?php echo BASE_URI . '/dashboard/product/update' . '?id=' . $product->id ?>'; event.stopPropagation();">
                    Update Product
                  </p>
                </div>
              <?php else: ?>
                <div
                  class="flex items-center justify-between w-full transition-all translate-y-0 opacity-0 heart-option group-hover:opacity-100">
                  <p class="font-semibold select-option-text hover:color-red-400 uppercase cursor-pointer relative before:w-0 before:h-[1px] before:bg-black before:content-[''] before:absolute before:bottom-0 before:hover:w-full before:transition-all"
                    onclick="addToCart(`<?php echo $product->id; ?>`)">
                    <?php
                    if (isset($cartCheck))
                      echo "Added to cart";
                    else
                      echo "Add to cart";
                    ?>
                  </p>
                  <i class="wishlist-icon p-2 transition-all rounded-full cursor-pointer fa-regular fa-heart hover:bg-red-400 hover:text-white"
                    onclick="addToWishList(`<?php echo $product->id; ?>`)"></i>
                </div>
              <?php endif ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="my-5">
        <div id="pagination" class="flex items-center justify-center gap-5 text-center pagination">
          <?php if ($pagination['page'] > 1): ?>
            <a onclick="openPage(<?php echo $pagination['page'] - 1 ?>)"
              class="cursor-pointer pagination-items p-2 shadow-md border border-gray-300 text-[#52938d] font-semibold hover:text-white hover:bg-primary-700 transition-all">
              Previous
            </a>
          <?php endif; ?>

          <?php for ($i = 1; $i <= $pagination['totalPages']; $i++): ?>
            <a onclick="openPage(<?php echo $i ?>)"
              class="p-2 <?php echo $i == $pagination['page'] ? 'bg-[#52938d] text-white font-semibold' : ' shadow-md border border-gray-300 text-primary font-semibold hover:text-white hover:bg-primary-700 transition-all'; ?> w-10 h-10 cursor-pointer">
              <?php echo $i; ?>
            </a>
          <?php endfor; ?>
          <?php if ($pagination['page'] < $pagination['totalPages']): ?>
            <a onclick="openPage(<?php echo $pagination['page'] + 1 ?>)"
              class="cursor-pointer pagination-items p-2 shadow-md border border-gray-300 text-primary font-semibold hover:text-white hover:bg-primary-700 transition-all">
              Next
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="module">
  import Toast from '<?php echo BASE_URI . "/resources/js/toast.js"; ?>';
  import FetchXHR from '<?php echo BASE_URI . "/resources/js/fetch-xhr.js"; ?>';

  const BASE_URI = '<?php echo BASE_URI; ?>';

  document.addToCart = (id) => {
    FetchXHR.post('<?php echo BASE_URI . '/api/cart/add' ?>', { id }, {
      'Content-Type': 'application/json'
    }).then(response => {
      const data = response.data;
      new Toast({
        message: data.message,
        type: data.type
      });
    }).catch(error => {
      console.error(error);
    });
    setTimeout(() => {
      window.location.reload();
    }, 1000);
  };

  document.addToWishList = (id) => {
    FetchXHR.post('<?php echo BASE_URI . '/api/wishlist/add' ?>', { id }, {
      'Content-Type': 'application/json'
    }).then(response => {
      const data = response.data;
      new Toast({
        message: data.message,
        type: data.type
      });
    }).catch(error => {
      console.error(error);
    });
    setTimeout(() => {
      window.location.reload();
    }, 1000);
  };
</script>
<script>
  const filterForm = document.getElementById('filter-form');
  document.openPage = (page) => {
    if (filterForm.page.value === page || page < 1 || page > <?php echo $pagination['totalPages'] ?>) return;
    filterForm.page.value = page;
    filterForm.submit();
  }
  let icon = document.querySelector(".open-category");
  let list = document.querySelector(".category-list");
  icon.addEventListener("click", () => {
    if (icon.classList.contains("fa-plus")) {
      icon.classList.remove("fa-plus")
      icon.classList.add("fa-minus")
    } else {
      icon.classList.add("fa-plus")
      icon.classList.remove("fa-minus")
    }
    list.classList.toggle("h-0");
  })
  let tag_icon = document.querySelector(".open-tags");
  let tag_list = document.querySelector(".tags-list");
  tag_icon.addEventListener("click", () => {
    if (tag_icon.classList.contains("fa-plus")) {
      tag_icon.classList.remove("fa-plus")
      tag_icon.classList.add("fa-minus")
    } else {
      tag_icon.classList.add("fa-plus")
      tag_icon.classList.remove("fa-minus")
    }
    tag_list.classList.toggle("h-0");
  })

</script>
