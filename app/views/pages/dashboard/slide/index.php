<?php
$slides = $params["slides"];
$filter = $params["filter"];
?>
<div class="w-full mx-auto my-0">
  <div class="box-border w-full min-h-screen px-10 mt-10 sm:px-5">
    <div class="flex justify-between">
      <h1 class="text-xl font-bold">Slide</h1>
    </div>
    <div class="my-8 bg-white shadow-lg cursor-pointer table-slider-statistics rounded-2xl">
      <div class="relative">
        <table class="w-full h-64 text-sm text-center text-gray-500 rounded-2xl">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
              <?php
              $name = ["Title", "Image", "Status", "Action"];
              for ($i = 1; $i <= count($name); $i++) { ?>
                <th scope="col" class="px-6 py-3">
                  <?php echo $name[$i - 1]; ?>
                </th>
              <?php }
              ?>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($slides as $slide): ?>
              <tr class="transition-opacity bg-white border-b hover:bg-gray-200 even:bg-gray-100">
                <td class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap">
                  <?php echo $slide->name; ?>
                </td>
                <td class="w-64 px-5 py-3">
                  <img src="<?php echo BASE_URI . $slide->image; ?>" alt="" />
                </td>
                <td
                  class="<?php echo ($slide->status == 1) ? 'text-primary-700 font-medium' : 'text-red-700 font-medium' ?>">
                  <?php
                  if ($slide->status == 1) {
                    echo "Active";
                  } else {
                    echo "Banned";
                  }
                  ?>
                  <!-- <input type="checkbox" name="status" id="" class="w-6 h-6" <?php echo ($slide->status == 1) ? 'checked' : '' ?> > -->
                </td>
                <td class="flex items-center justify-center h-full gap-2 px-5 py-3">
                  <a href="<?php echo BASE_URI .
                    "/dashboard/slide/update" .
                    "?id=" .
                    $slide->id; ?>"
                    class="edit-button py-2 px-3 bg-[#315854] text-white rounded-xl hover:bg-[#6cada6] transition-all block">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>
                  <a id="deleteButton" href="<?php echo BASE_URI .
                    "/dashboard/slide/delete" .
                    "?id=" .
                    $slide->id; ?>"
                    class="delete-button py-2 px-3 bg-[#315854] text-white rounded-xl hover:bg-[#6cada6] transition-all">
                    <i class="fa-solid fa-trash"></i>
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script>
  let input_check = document.querySelectorAll("input[type='checkbox']");
  input_check.forEach(element => {
    element.addEventListener("change", () => {
      let number = element.getAttribute("data-number");
      console.log(number + (element.checked ? ' On' : ' Off'))
    })
  });
</script>
