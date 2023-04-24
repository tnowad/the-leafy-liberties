<?php
use App\Models\Wishlist;
use Core\Application;
use App\Models\Cart;

$auth = Application::getInstance()->getAuthentication();
$user = $auth->getUser();
$flag = false;
$flagwl = false;
if ($user != null) {
  $carts = Cart::findAll(["user_id" => $user->id]);
  $wishlists = Wishlist::findAll(["user_id" => $user->id]);
  foreach ($carts as $cartItem) {
    if ($product->id == $cartItem->product_id) {
      $flag = true;
      break;
    }
  }
  foreach ($wishlists as $wishlistItem) {
    if ($product->id == $wishlistItem->product_id) {
      $flagwl = true;
      break;
    }
  }
}
?>

<div class="box-border p-5 pt-3 sm:p-12 md:p-25 md:pt-12 lg:p-36 lg:pt-20">
  <!-- // ? option  -->
  <div class="grid grid-cols-1 gap-3 xl:grid-cols-2">
    <div
      class="box-border flex justify-center p-5 border border-gray-400 border-solid lg:mr-5 rounded-3xl w-full h-[600px] ">
      <img class="h-full w=h-full object-contain" src="<?php echo BASE_URI . $product->image; ?>" alt="Book info" />
    </div>
    <div class="box-border w-auto h-auto p-4 mt-5 border border-gray-400 border-solid lg:p-10 lg:mt-0 rounded-3xl">
      <p class="p-1 mb-2 md:mb-6 text-[11px] sm:text-sm text-primary-700 font-medium inline-block">
        IN STOCK
      </p>
      <br />
      <label class="text-2xl md:text-3xl lg:text-4xl">
        <?php echo $product->name; ?>
      </label>
      <br />
      <div class="my-3 author-tag">
        <span class="">
          Author:
        </span>
        <span class="font-bold cursor-pointer text-primary hover:underline">
          <?php echo $author->name; ?>
        </span>
      </div>
      <div class="isbn-tag">
        <span>ISBN:</span>
        <span class="font-bold cursor-pointer text-primary hover:underline">
          <?php echo $product->isbn; ?>
        </span>
      </div>
      <div class="box-border py-3 border border-gray-400 border-solid border-x-0">
        <span class="text-2xl font-semibold text-green-800 sm:text-3xl">
          <?php echo $product->price; ?>$
        </span>

        <div class="flex items-center justify-start w-full gap-3 mt-4">
          <div
            class="flex items-center justify-between gap-2 px-3 py-2 text-lg transition-all border border-gray-300 rounded-full cursor-pointer bg-gray-50 hover:bg-primary-500 hover:text-gray-700 group"
            onclick="addToCart(<?php echo $product->id; ?>)">
            <i
              class="p-2 transition-all rounded-full fa-brands fa-opencart group-hover:text-white group-hover:bg-primary-400 <?php echo ($flag == true) ? 'bg-primary-700 text-white' : 'bg-gray-50 text-black' ?>"></i>
            <button src="" alt="" class="text-sm font-medium sm:text-base md:text-lg">
              <?php
              if ($auth->hasPermission("product.access") && $auth->hasPermission("dashboard.access")) {
                echo "Update Product";
              } else {

                if ($flag) {
                  echo "Added to cart";
                } else {
                  echo "Add to cart";
                }
              }
              ?>
            </button>
          </div>
          <div
            class="<?php echo ($auth->hasPermission("product.access") && $auth->hasPermission("dashboard.access") ? 'hidden' : 'block') ?> flex items-center justify-between gap-2 px-3 py-2 text-lg transition-all border border-gray-300 rounded-full cursor-pointer bg-gray-50 hover:bg-primary-500 hover:text-gray-700 group"
            onclick="addToWishList(<?php echo $product->id; ?>)">
            <i
              class="p-2 transition-all rounded-full fa-regular fa-heart group-hover:text-white group-hover:bg-red-400 wishlist-icon <?php echo ($flagwl == true) ? 'bg-red-400 text-white' : 'bg-gray-50 text-black' ?>"></i>
            <button type="submit" src="" alt="" class="text-sm font-medium sm:text-base md:text-lg add-to-wishlist">
              <?php
              if ($flagwl) {
                echo "Added to wishlist";
              } else {
                echo "Add to wishlist";
              }
              ?>
            </button>
          </div>
        </div>
      </div>

      <p class="inline-block mt-5 text-gray-400">Category: </p>
      <a href="<?php echo BASE_URI . "/products?category=" . $category->id; ?>"
        class="font-medium hover:underline text-primary">
        <?php echo $category->name; ?>
      </a>
      <br />
      <p class="inline-block text-gray-400">Tags :</p>
      <p class="inline-block ml-1">
        <?php
        $tags = $product->tags();
        $count = count($tags);
        foreach ($tags as $i => $tag) { ?>
          <a href="<?php echo BASE_URI . '/' ?>" class="font-medium hover:underline text-primary">
            <?php echo $tag->name ?>
          </a>
          <?php
          if ($i != $count - 1) {
            echo ', ';
          }
        }
        ?>
      </p>

      <div class="flex items-center justify-start gap-4 mt-10">
        <a href="https://www.facebook.com/jack.willam2003/">
          <i
            class="w-12 h-12 p-2 text-2xl text-center transition-all border border-gray-300 rounded-full cursor-pointer fa-brands fa-facebook-f hover:text-white hover:bg-blue-500"></i>
        </a>
        <a href="https://www.facebook.com/jack.willam2003/">
          <i
            class="w-12 h-12 p-2 text-2xl text-center transition-all border border-gray-300 rounded-full cursor-pointer fa-brands fa-twitter hover:text-white hover:bg-blue-500"></i>
        </a>
        <a href="https://www.facebook.com/jack.willam2003/">
          <i
            class="w-12 h-12 p-2 text-2xl text-center transition-all border border-gray-300 rounded-full cursor-pointer fa-brands fa-instagram hover:text-white hover:bg-pink-500"></i>
        </a>
      </div>
    </div>
  </div>
  <!-- //? info detail  -->
  <div class="mt-20">
    <ul class="box-content flex justify-center">
      <li id="description-tab"
        class="p-2 mb-5 mr-10 transition-all cursor-pointer hover:bg-primary hover:text-white  border-2 border-white border-b-primary-800"
        onclick="showDescription()">
        Description
      </li>
      <li id="review-tab"
        class="p-2 mb-2 mr-5 transition-all cursor-pointer sm:mr-10 sm:mb-5 hover:bg-primary hover:text-white border-2 border-white"
        onclick="showReview()">
        Review
      </li>
    </ul>
    <div class="box-border p-2 border border-gray-400 border-solid rounded-3xl sm:h-auto sm:py-10 sm:px-20"
      id="description">
      <p class="text-lg text-center ">
        <?php echo $product->description; ?>
      </p>
    </div>
    <div class="box-border hidden p-2 border border-gray-400 border-solid rounded-3xl sm:h-auto sm:py-10 sm:px-20"
      id="review">
      <p class="text-lg text-center ">
        Sản phẩm chất lượng
      </p>
    </div>
  </div>
</div>
<script>
  function showDescription() {
    document.getElementById("description").style.display = "block"
    document.getElementById("review").style.display = "none"
    document.getElementById("description-tab").classList.add("border-b-primary-800")
    document.getElementById("review-tab").classList.remove("border-b-primary-800")
  }

  function showReview() {
    document.getElementById("review").style.display = "block";
    document.getElementById("description").style.display = "none"
    document.getElementById("review-tab").classList.add("border-b-primary-800")
    document.getElementById("description-tab").classList.remove("border-b-primary-800")

  }
</script>
<script type="module">
  import Toast from '<?php echo BASE_URI . "/resources/js/toast.js"; ?>';
  import FetchXHR from '<?php echo BASE_URI . "/resources/js/fetch-xhr.js"; ?>';

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

  document.querySelector('.wishlist-icon').addEventListener('click', (event) => {
    if (event.target.classList.contains('bg-red-400')) {
      event.target.classList.remove('bg-red-400');
      event.target.classList.add('bg-white');
      event.target.classList.remove('text-white');
      event.target.classList.add('text-red-400');
    } else {
      event.target.classList.add('bg-red-400');
      event.target.classList.remove('bg-white');
      event.target.classList.add('text-white');
      event.target.classList.remove('text-red-400');
    }
  });
</script>
