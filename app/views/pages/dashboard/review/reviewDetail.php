<div class="bg-gray-100">
  <div class="container mx-auto py-8">
    <div class="flex flex-wrap justify-between items-center mb-8">
      <div class="w-1/3">
        <img src="<?php

        use App\Models\Author;
        use App\Models\User;

        $author = Author::find($product->id);
        echo BASE_URI . $product->image; ?>" alt="Book Image" class="w-full object-cover rounded-lg shadow-lg">
      </div>
      <div class="w-2/3 px-4">
        <h1 class="text-3xl font-bold mb-2">
          <?php echo $product->name ?>
        </h1>
        <p class="text-lg text-gray-600 mb-4">Author :
          <?php echo $author->name ?>
        </p>
        <div class="flex items-center mb-2">
          <span class="text-lg text-gray-600 mr-2">Average rating :
          </span>
          <?php if (count($reviewsValid) > 0): ?>
            <div>
              <span class="text-xl text-gray-600 mr-2">
                <?php
                $averageRating = 0;
                foreach ($reviewsValid as $review) {
                  $averageRating += $review->rating;
                }
                echo $averageRating
                  ?>
              </span>
              <span><i class="fa fa-star text-primary"></i></span>
            </div>
          <?php else: ?>
            <p>There are no reviews yet</p>
          <?php endif ?>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="w-full mx-auto my-0">
  <div class="box-border w-full min-h-screen px-10 mt-10 sm:px-5">
    <div class="flex justify-between">
      <h1 class="text-xl font-bold">Reviews</h1>
      <div class="box-border w-1/2 px-10">
        <form action="<?php echo BASE_URI . '/dashboard/product' ?>" method="GET"
          class="flex items-center justify-center w-full h-10 bg-gray-100 rounded-full">
          <input type="text" name="keywords" class="w-full h-full pl-5 rounded-tl-full rounded-bl-full"
            placeholder="Search.... "
            value="<?php echo isset($params['filter']['keywords']) ? $params['filter']['keywords'] : '' ?>" />
          <button class="flex items-center justify-center w-10 h-10 bg-gray-100">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </form>
      </div>
    </div>
    <div class="my-8 bg-white shadow-lg cursor-pointer table-product-statistics rounded-2xl">
      <div class="relative">
        <?php
        if (count($reviewsValid) > 0): ?>
          <table class="w-full text-sm text-center text-gray-500 rounded-2xl">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
              <tr>
                <?php
                $name = [
                  "ID",
                  "Image",
                  "Name",
                  "Content",
                  "Time",
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
              <?php foreach ($reviewsValid as $review):
                if (!$review->deleted_at):
                  $user = User::find($review->user_id);
                  ?>
                  <tr class="text-center transition-opacity bg-white border-b hover:bg-gray-200 even:bg-gray-100">
                    <td class="px-5 py-3">
                      <?php echo $review->id; ?>
                    </td>
                    <td class="px-5 py-3 w-32">
                      <img
                        src="<?php echo ($user->image == NULL) ? BASE_URI . '/resources/images/user/placeholder.png' : BASE_URI . $user->image ?>"
                        alt="" class="w-full h-full object-contain">
                    </td>
                    <td class="px-5 py-3">
                      <?php echo $user->name; ?>
                    </td>
                    <td class="px-5 py-3">
                      <?php echo $review->content; ?>
                    </td>
                    <td class="p-2">
                      <?php
                      $datetime = new DateTime($review->created_at);
                      echo $datetime->format('H:i d/m/Y');
                      // echo $product->created_at;
                      ?>
                    </td>
                    <td class="gap-2 px-5 py-3">
                      <div class="button flex justify-center items-center gap-4">
                        <a href="<?php echo BASE_URI .
                          "/product" .
                          "?id=" .
                          $product->id; ?>"
                          class="edit-button py-2 px-3 bg-blue-400 text-white rounded-md hover:text-pink-300 transition-all">
                          <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <span onclick="removeReviewConfirm(<?php echo $review->id ?>)"
                          class="delete-button py-2 px-3 bg-red-400 text-white rounded-md hover:text-blue-300 transition-all">
                          Delete
                          <i class="fa-solid fa-pen-to-square"></i>
                        </span>
                      </div>
                    </td>
                  </tr>
                <?php endif; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php else: ?>
          <div class="flex flex-col justify-center items-center h-full my-8">
            <i class="fa-solid fa-heart-pulse text-[100px] text-gray-400"></i>
            <h1 class="text-6xl tracking-widest text-gray-400 uppercase">No reviews found</h1>
          </div>
        <?php endif;
        ?>
      </div>
    </div>
  </div>
</div>

<script type="module">
  import Toast from '<?php echo BASE_URI . "/resources/js/toast.js"; ?>';
  import FetchXHR from '<?php echo BASE_URI . "/resources/js/fetch-xhr.js"; ?>';

  document.removeReviewConfirm = (id) => {
    const result = confirm("Delete this comment?");
    if (result) {

      FetchXHR.post('<?php echo BASE_URI . "/dashboard/review/review_detail/delete"; ?>', {
        id
      }, {
        'Content-Type': 'application/json'
      }).then(response => {
        if (response.type === 'error') {
          alert(response.message);
        } else if (response.type === 'info') {
          alert(response.message);
        } else {
          alert('Comment deleted from review');
        }
      }).catch(error => {
        alert('Something went wrong');
      });
      setTimeout(() => {
        window.location.reload();
      }, 1000);
    }
  }
</script>
