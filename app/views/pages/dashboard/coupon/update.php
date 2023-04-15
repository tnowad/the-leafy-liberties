<?php $coupon = $params['coupon'] ?>
<div class="w-full min-h-screen">
  <div class="bg-white rounded-md shadow-lg w-full p-5 m-5 h-full">
    <form class="flex flex-col" action="<?php echo BASE_URI . '/dashboard/coupon/update' ?>" method="POST">

      <label for="id" class="my-2">ID:</label>
      <input type="text" value="<?php echo $coupon->id ?>" name="id"
        class="bg-gray-100 p-3 focus:outline-none rounded-lg" />

      <label for="code" class="my-2">Code:</label>
      <input type="text" value="<?php echo $coupon->code ?>" name="code"
        class="bg-gray-100 p-3 focus:outline-none rounded-lg" />

      <label for="expired" class="my-2">Expired:</label>
      <input type="date" value="<?php echo $coupon->expired ?>" name="expired"
        class="bg-gray-100 p-3 focus:outline-none rounded-lg" id="task_date" onchange="return CheckExpired();" />

      <label for="description" class="my-2">Description:</label>
      <textarea name="description" id="" cols="30" rows="6" class="bg-gray-100 p-3 focus:outline-none rounded-lg"><?php echo $coupon->description ?>
      </textarea>

      <label for="quantity" class="my-2">Quantity:</label>
      <input type="text" value="<?php echo $coupon->quantity ?>" name="quantity"
        class="bg-gray-100 p-3 focus:outline-none rounded-lg" />

      <button class="my-2 bg-[#2e524e] hover:bg-[#52938d] transition-colors text-white font-bold py-2 px-4 rounded"
        type="submit">
        Submit
      </button>
      <a class="cancel-edit-button my-1 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded text-center"
        href="<?php echo BASE_URI . '/dashboard/coupon' ?>">
        Cancel
      </a>
    </form>
  </div>
</div>
<script>
  function CheckExpired() {
    var current = new Date(document.getElementById('task_date').value);
    var today = new Date();
    if (current.getTime() <= today.getTime()) {
      alert("You Can't Assign Task For Expired Date");
      document.getElementById('task_date').value = "<?php echo $coupon->expired ?>";
    }
    else {
      return true;
    }
  }
</script>
