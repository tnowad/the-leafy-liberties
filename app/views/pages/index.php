<?php
use App\Models\Author;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slide;
use App\Models\Tag;
use App\Models\Wishlist;
use Core\Application;
use App\Models\Cart;

$auth = Application::getInstance()->getAuthentication();
$user = $auth->getUser();
?>

<div className="flex justify-center w-full flex-col items-center -z-10">
  <div class="wrapper">
    <div id="default-carousel" class="relative" data-carousel="slide">
      <div class="relative hidden overflow-hidden carousel sm:h-64 xl:h-80 2xl:h-[420px] -z-10 md:block">

        <?php foreach (Slide::findAll(["status" => "1"]) as $slide): ?>
          <div class="hidden duration-700 ease-in-out h-[430px]" data-carousel-item>
            <img src="<?php echo BASE_URI . $slide->image; ?>"
              class="absolute block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
              alt="<?php echo $slide->name; ?>">
          </div>
        <?php endforeach; ?>

      </div>
      <div class="absolute space-x-3 -translate-x-1/2 bottom-5 left-1/2 -z-0 hidden md:flex">

        <?php for ($i = 0; $i < (count(Slide::findAll(["status" => "1"]))); $i++): ?>
          <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 1"
            data-carousel-slide-to="<?php echo $i; ?>"></button>
        <?php endfor; ?>

      </div>
      <button type="button"
        class="absolute top-0 left-0 hidden md:flex items-center justify-center h-full px-4 cursor-pointer -z-0 group focus:outline-none"
        data-carousel-prev>
        <span
          class="inline-flex items-center justify-center w-8 h-8 text-white bg-gray-400 rounded-full sm:w-10 sm:h-10 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
          <i class="fa-solid fa-chevron-up fa-rotate-270"></i>
        </span>
      </button>
      <button type="button"
        class="absolute top-0 right-0 hidden md:flex items-center justify-center h-full px-4 cursor-pointer -z-0 group focus:outline-none"
        data-carousel-next>
        <span
          class="inline-flex items-center justify-center w-8 h-8 text-white bg-gray-400 rounded-full sm:w-10 sm:h-10 0 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
          <i class="fa-solid fa-chevron-up fa-rotate-90"></i>
        </span>
      </button>
    </div>
  </div>
  <div class="container mx-auto">
    <div class="flex items-center justify-between gap-2 my-4 text-center">
      <h2 class="my-4 whitespace-nowrap xl:text-3xl sm:text-xl">Bestselling Books</h2>
      <span class="w-full h-px mx-2 bg-gray-600"></span>
      <a class="w-32 text-base bg-[#315854] hover:bg-[#2e524e] text-white p-2 rounded-3xl"
        href="<?php echo BASE_URI . "/products"; ?>">
        View All
      </a>
    </div>
    <div class="relative flex w-full gap-6 overflow-hidden bestselling-products">
      <?php foreach (Tag::findOne(["name" => "Bestselling"])->products() as $product): ?>
        <div
          class="box-border flex flex-col items-center w-full pt-5 transition-all border border-solid product-info group hover:border-gray-500 hover:shadow-xl h-[500px]">
          <div class="object-cover h-[330px] overflow-hidden p-2 px-[22px] w-60 mx-auto">
            <a href="<?php echo BASE_URI . "/product?id=" . $product->id; ?>">
              <img src="<?php echo BASE_URI . $product->image; ?>" alt="" class="object-cover w-full h-full " />
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
              <p class="font-semibold select-option-text hover:color-red-400">Add to wishlist</p>
              <i class="<?php echo ($flagwl) ? 'bg-red-400 text-white' : 'bg-white text-black' ?> wishlist-icon p-2 transition-all rounded-full cursor-pointer fa-regular fa-heart hover:bg-red-400 hover:text-white"
                onclick="addToWishList(`<?php echo $product->id; ?>`)"></i>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="flex items-center justify-between gap-2 my-4 text-center">
      <h2 class="my-4 whitespace-nowrap xl:text-3xl sm:text-xl">Popular Books</h2>
      <span class="w-full h-px mx-2 bg-gray-600"></span>
      <a class="w-32 text-base bg-[#315854] hover:bg-[#2e524e] text-white p-2 rounded-3xl"
        href="<?php echo BASE_URI . "/products"; ?>">
        View All
      </a>
    </div>
    <div class="flex gap-4">
      <div id="product-list" class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4">

        <?php foreach (array_slice(Product::all(), 0, 16) as $product): ?>
          <div
            class="box-border flex flex-col items-center w-full pt-5 transition-all border border-solid product-info group hover:border-gray-500 hover:shadow-xl h-[500px]">
            <div class="object-cover h-[330px] overflow-hidden p-2 px-[22px] w-60 mx-auto">
              <a href="<?php echo BASE_URI . "/product?id=" . $product->id; ?>">
                <img src="<?php echo BASE_URI . $product->image; ?>" alt="" class="object-cover w-full h-full " />
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
                <i class="wishlist-icon p-2 transition-all rounded-full cursor-pointer fa-regular fa-heart hover:bg-red-400 hover:text-white"
                  onclick="addToWishList(`<?php echo $product->id; ?>`)"></i>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

      </div>
      <div class="hidden 2xl:block 2xl:w-1/3">
        <div class="sticky w-full h-auto top-32">
          <img src="resources/images/bestOffer.png" alt="" class="w-full h-full rounded-2xl" />
          <div class="absolute flex flex-col items-center w-full text-center top-3/4">
            <p class="text-lg font-normal text-white xl:text-base">
              Best Offer
            </p>
            <p class="text-4xl text-white xl:text-3xl">Save 100%</p>
            <button class="w-32 p-2 mt-3 text-lg font-bold text-pink-400 bg-white rounded-full ">
              See more
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="flex items-center justify-between gap-2 my-4 text-center">
      <h2 class="my-4 whitespace-nowrap xl:text-3xl sm:text-xl">Category Books</h2>
      <span class="w-full h-px mx-2 bg-gray-600"></span>
      <a class="w-32 text-base bg-[#315854] hover:bg-[#2e524e] text-white p-2 rounded-3xl" href="/products">
        View All
      </a>
    </div>
    <div class="relative w-full mb-5">
      <div class="flex category_slide">
        <?php foreach (Category::all() as $category): ?>
          <a class="relative mr-2 overflow-hidden cursor-pointer genres-detail rounded-3xl w-fit" href="<?php echo BASE_URI .
            "/products?categories[]=" .
            $category->id; ?>">
            <div class="w-full h-56 overflow-hidden shadow-lg img rounded-3xl">
              <img
                src="<?php echo $category->image ? BASE_URI . $category->image : BASE_URI . "/resources/images/categories/placeholder.png"; ?>"
                alt="" class="object-cover w-full h-full transition-transform rounded-3xl hover:scale-105" />
            </div>
            <p class="absolute font-medium text-white xl:top-3/4 left-10 xl:text-3xl sm:text-2xl sm:top-2/3">
              <?php echo $category->name; ?>
            </p>
          </a>
        <?php endforeach; ?>

      </div>
    </div>
    <div class="flex my-10 lg:gap-0 sm:gap-3 lg:flex-row sm:flex-col">
      <div class="w-full overflow-hidden bg-orange-50 lg:p-5 rounded-2xl md:p-2 lg:overflow-x-hidden shadow-lg">
        <div class="p-3 mb-6 text-4xl text-center border-0 border-b-2 border-solid header-table whitespace-nowrap">
          <p>Popular Authors</p>
        </div>
        <div class="flex items-center justify-between author_slide">
          <?php foreach (Author::all() as $author): ?>
            <a class="flex flex-col items-center justify-between w-full mb-4 author-card" href="<?php echo BASE_URI .
              "/products?author=" .
              $author->id; ?>">
              <div class="mx-auto mb-3 rounded-full author-face w-44 h-44">
                <img src="<?php echo BASE_URI . $author->image; ?>" class='object-cover w-full h-full rounded-full' />
              </div>
              <p class="text-lg font-medium text-center author-name whitespace-nowrap ">
                <?php echo $author->name; ?>
              </p>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>


<script type="module">
  import Toast from '<?php echo BASE_URI . "/resources/js/toast.js"; ?>';
  import FetchXHR from '<?php echo BASE_URI . "/resources/js/fetch-xhr.js"; ?>';

  const BASE_URI = '<?php echo BASE_URI; ?>';

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
  };
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
  };

  document.querySelectorAll('.wishlist-icon').forEach(icon => {
    icon.addEventListener('click', () => {
      if (icon.classList.contains('bg-red-400')) {
        icon.classList.remove('bg-red-400');
        icon.classList.add('bg-white');
        icon.classList.remove('text-white');
        icon.classList.add('text-red-400');
      } else {
        icon.classList.add('bg-red-400');
        icon.classList.remove('bg-white');
        icon.classList.add('text-white');
        icon.classList.remove('text-red-400');
      }
    });
  });
</script>
