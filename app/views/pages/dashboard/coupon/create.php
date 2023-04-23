<div class="add-form min-h-screen w-full justify-center items-center my-8">
  <div class="bg-white p-8 rounded-md shadow-lg">
    <h2 class="text-xl font-bold mb-4">Add Coupon</h2>
    <form class="flex flex-col" method="POST" action="<?php BASE_URI .
      "/dashboard/coupon/create"; ?>">
      <label for="image" class="my-2">Code:</label>
      <input type="text" value="" class="bg-gray-100 p-3 focus:outline-none rounded-lg" name="code" />
      <label for="category" class="my-2">Description:</label>
      <textarea name="description" class="bg-gray-100 p-3 focus:outline-none rounded-lg" rows="4"></textarea>
      <!-- <script>
            CKEDITOR.replace('description');
          </script> -->
      <label for="expired" class="my-2">Expired:</label>
      <input type="date" value="" id="task_date" class="bg-gray-100 p-3 focus:outline-none rounded-lg" name="expired"
        onchange="return CheckExpired();" />
      <label for="remaining" class="my-2">Quantity:</label>
      <input type="number" value="" class="bg-gray-100 p-3 focus:outline-none rounded-lg" name="quantity" />
      <button class="my-2 bg-[#2e524e] hover:bg-[#52938d] transition-colors text-white font-bold py-2 px-4 rounded"
        type="submit">
        Submit
      </button>
      <button id="cancel" class="my-1 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
        Cancel
      </button>
    </form>
  </div>
</div>
<script>
  function CheckExpired() {
    var current = new Date(document.getElementById('task_date').value);
    var today = new Date();
    if (current.getTime() <= today.getTime()) {
      alert("You Can't Assign Task For Expired Date");
      document.getElementById('task_date').value = "";
    }
    else {
      return true;
    }
  }
</script>
