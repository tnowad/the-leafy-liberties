<div class="w-full my-0 mx-auto">
  <div class="mt-10 min-h-screen box-border w-full px-10 sm:px-5">
    <div class="flex justify-between">
      <h1 class="text-xl font-bold">Slider</h1>
    </div>
    <div class="table-slider-statistics my-8 shadow-lg cursor-pointer rounded-2xl bg-white">
      <div class="relative">
        <table class="w-full text-sm text-center text-gray-500 rounded-2xl h-64">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
              <?php
              $name = array("Title", "Image", "Location", "Action");
              for ($i = 1; $i <= count($name); $i++) { ?>
                <th scope="col" class="px-6 py-3">
                  <?php echo $name[$i - 1] ?>
                </th>
              <?php }
              ?>
            </tr>
          </thead>
          <tbody>
            <?php
            require_once 'app/views/pages/slides.php';
            // print_r(basename($slides[0]['image']))

            ?>
            <?php foreach ($slides as $slide): ?>
              <tr class="bg-white border-b hover:bg-gray-200 transition-opacity even:bg-gray-100">
                <td class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap">
                  <?php echo $slide['title'] ?>
                </td>
                <td class="px-5 py-3 w-64">
                  <img src="../<?php echo $slide['image'] ?>" alt="" />
                </td>
                <td class="px-5 py-3">Image</td>
                <td class="px-5 py-3 w-44">
                  <label
                    class="toggle-btn relative inline-flex items-center cursor-pointer shadow-lg rounded-full border-solid border-blue-300">
                    <input type="checkbox" value="" class="sr-only peer">
                    <div
                      class="w-20 h-8 bg-gray-700 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-[50px] peer-checked:after:border-white after:content-[''] after:absolute after:left-[0px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-8 after:w-8 after:transition-all peer-checked:bg-blue-600">
                    </div>
                    <span
                      class="ml-3 text-sm font-medium text-gray-700 absolute -left-2 peer-checked:text-blue-600">Off</span>
                    <span
                      class="ml-3 text-sm font-medium text-gray-700 absolute left-11 peer-checked:text-gray-900">On</span>
                  </label>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script>
  // let input_check = document.querySelector('input[type="checkbox"]');
  // let btn_toggle = document.querySelector('.toggle-btn');
  // <?php foreach ($slides as $slide): ?>
  //   if(input_chec.checked == false){
  //     <?php $slide['image'] = '' ?>
  //   }
  //   else{
  //     continue;
  //   }
  // <?php endforeach ?>
</script>
