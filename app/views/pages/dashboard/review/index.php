<div class="w-full my-0 mx-auto">
  <div class="mt-10 min-h-screen box-border w-full px-10 sm:px-5">
    <div class="flex justify-between">
      <h1 class="text-xl font-bold">Reviews</h1>
      <div class="box-border w-1/2 px-10">
        <form action="<?php echo BASE_URI . '/dashboard/review' ?>" method="GET" class="flex items-center justify-center w-full h-10 bg-gray-100 rounded-full">
          <input type="text" name="keywords" class="w-full h-full pl-5 rounded-tl-full rounded-bl-full" placeholder="Search.... " value="<?php echo isset($params['filter']['keywords']) ? $params['filter']['keywords'] : '' ?>" />
          <button class="flex items-center justify-center w-10 h-10 bg-gray-100">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </form>
      </div>
      <a href="<?php echo BASE_URI . '/dashboard/review/create' ?>" class="w-5 h-5 text-2xl">
        +
      </a>
    </div>
    <div class="my-8 shadow-lg cursor-pointer rounded-2xl bg-white">
      <div class="relative">
        <table class="w-full text-sm text-center text-gray-500 rounded-2xl h-64">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
              <?php

              use App\Models\Product;
              use App\Models\Review;

              $name = [
                "ID",
                "Image",
                "Name",
                "Comment quantity",
                "Action",
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
            if (isset($_POST["searchQuery"])) {
              $text = $_POST["searchQuery"];
              $coupons = Product::filterAdvanced($text);
            } else {
              $coupons = Product::all();
            }
            if (count($coupons) > 0) : ?>
              <?php foreach ($products as $product) :
              ?>
                <?php
                $reviewsValid = [];
                $reviews = Review::findAll(["product_id" => $product->id]);
                foreach ($reviews as $review) {
                  if ($review->deleted_at == null) {
                    $reviewsValid[] = $review;
                  }
                }
                ?>
                <tr class="bg-white border-b hover:bg-gray-200 transition-opacity even:bg-gray-100 text-center">
                  <td class="px-5 py-3">
                    <?php echo $product->id; ?>
                  </td>
                  <td class="px-5 py-3 w-32 h-24 p-3">
                    <img src="<?php echo BASE_URI . $product->image; ?>" alt="" />
                  </td>
                  <td class="px-5 py-3">
                    <?php echo $product->name; ?>
                  </td>
                  <td class="px-5 py-3">
                    <?php echo count($reviewsValid); ?>
                  </td>
                  <td class="px-5 py-3 w-44">
                    <div class="button flex justify-center items-center gap-4">
                      <a href="<?php echo BASE_URI .
                                  "/dashboard/review/review_detail" .
                                  "?id=" .
                                  $product->id; ?>" class="edit-button py-2 px-3 bg-blue-400 text-white rounded-xl hover:text-pink-500 transition-all">
                        <i class="fa-solid fa-pen-to-square"></i>
                      </a>
                      </a>
                    </div>
                  </td>
                </tr>
              <?php endforeach ?>
            <?php endif;
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>