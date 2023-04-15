<div class="w-full bg-neutral-100">
  <div class="w-full mx-auto my-0 overflow-x-hidden">
    <div class="box-border w-full min-h-screen px-10 mt-10 sm:px-5">
      <div class="flex justify-between">
        <h1 class="text-xl font-bold">
          Dashboard
        </h1>
      </div>
      <div class="box-border grid top-wrap 2xl:grid-cols-4 xl:gap-5 lg:grid-cols-2 lg:gap-2">
        <?php
        $text = array("Sales", "Total Revenues", "New Customer", "New Orders");
        $quantity = array("$20.4K", "100K", "203", "15");
        $desc = array("We have sold 1105 items", "Available to pay out", "More customer more money", "New things coming' up");
        $icon = array("fa-solid fa-arrow-trend-up", "fa-solid fa-dollar-sign", "fa-solid fa-user-group-crown", "fa-duotone fa-suitcase");
        $class = array(
          "bg-blue-400 border-blue-400 shadow-[0_0_5px_1px_rgba(164,202,254,0.3)] shadow-blue-400",
          "bg-green-400 border-green-400 shadow-[0_0_5px_1px_rgba(49,196,141,0.3)] shadow-green-400",
          "bg-orange-400 border-orange-400 shadow-[0_0_5px_1px_rgba(255,138,76,0.3)] shadow-orange-400",
          "bg-red-400 border-red-400 shadow-[0_0_5px_1px_rgba(255,138,76,0.3)] shadow-red-400"
        );
        for ($i = 1; $i <= 4; $i++) { ?>
          <div class="flex items-center justify-between w-full p-8 mt-5 bg-white shadow-lg rounded-2xl">
            <div class="flex flex-col gap-1 hero-one">
              <p class="text-sm font-semibold">
                <?php echo $text[$i - 1] ?>
              </p>
              <p class="text-lg font-bold">
                <?php echo $quantity[$i - 1] ?>

              </p>
              <p class="text-gray-500 break-words">
                <?php echo $desc[$i - 1] ?>

              </p>
            </div>
            <div class="icon w-20 border-solid p-5 rounded-2xl text-center <?php echo $class[$i - 1] ?>">
              <i class="<?php echo $icon[$i - 1] ?> fa-xl text-white"></i>
            </div>
          </div>
        <?php }
        ?>
      </div>
      <div class="flex flex-wrap items-start justify-between w-full my-8 body-wrap">
        <div class="chart-layout xl:w-[65.5%] px-6 py-4 bg-white rounded-2xl shadow-lg sm:w-full">
          <div class="flex items-center justify-between top-content">
            <div class="total-revuenes">
              <p class="text-2xl font-semibold">Total Revuenes</p>
              <p class="mt-2 text-lg font-bold">$50.4K</p>
            </div>
            <div class="chart-type p-2 bg-[#8cbfba] rounded-xl">
              <label for="chart-type" class="font-medium text-black">Choose a type:</label>
              <select name="chart-ttype" id="c-type" class="" onchange="ChangeChart(this)">
                <option value="bar">Bar Chart</option>
                <option value="line">LineChart</option>
                <option value="area">Area Chart</option>
                <option value="radar">Radar Chart</option>
              </select>
            </div>
          </div>
          <div id="chart">

          </div>
        </div>
        <div class="most-sold-items xl:w-[31.5%] py-4 px-4 bg-white rounded-2xl shadow-lg sm:w-full sm:mt-5 2xl:mt-0">
          <p class="mb-5 text-2xl font-bold">Most Sold Items</p>
          <div class="flex flex-col gap-4">
            <?php
            $title = array("Blue", "Black", "Yellow", "White", "Red", "Green");
            for ($i = 1; $i <= 6; $i++) { ?>
              <div class="text-lg font-medium ">
                <?php echo $title[$i - 1] ?>
              </div>
              <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                <div class="bg-blue-600 h-2.5 rounded-full" style="width: 45%"></div>
              </div>
            <?php }
            ?>
          </div>
        </div>
      </div>
      <div class="my-8 overflow-hidden bg-white shadow-lg cursor-pointer table-statistics rounded-2xl">
        <div class="relative">
          <table class="w-full h-64 overflow-y-scroll text-sm text-center text-gray-500 rounded-2xl">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
              <tr>
                <?php
                $name = array("Product", "Order ID", "Date", "Customer Name", "Status", "Amount", "Action");
                for ($i = 1; $i <= 7; $i++) { ?>
                  <th scope="col" class="px-6 py-3">
                    <?php echo $name[$i - 1] ?>
                  </th>
                <?php }
                ?>
              </tr>
            </thead>
            <tbody>
              <?php
              for ($i = 1; $i <= 6; $i++) { ?>
                <tr class="transition-opacity bg-white border-b hover:bg-gray-200 even:bg-gray-100">
                  <td class="px-5 py-4 font-medium text-gray-900 whitespace-nowrap">
                    My Dearest Darkest
                  </td>
                  <td class="px-5 py-3">#1</td>
                  <td class="px-5 py-3">Jun 29,2023</td>
                  <td class="px-5 py-3">Jack Phat</td>
                  <td class="px-5 py-3">Delivered</td>
                  <td class="px-5 py-3">1</td>
                  <td class="px-5 py-4 w-44">
                    <div class="flex items-center justify-center gap-4 button">
                      <button
                        class="edit-button py-2 px-3 bg-[#8cbfba] text-white rounded-xl hover:text-blue-500 transition-all">
                        <i class="fa-solid fa-pen-to-square"></i>
                      </button>
                      <button
                        class="delete-button py-2 px-3 bg-[#8cbfba] text-white rounded-xl hover:text-red-600 transition-all">
                        <i class="fa-solid fa-trash"></i>
                      </button>
                    </div>
                  </td>
                </tr>
              <?php }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  var series = [{
    name: 'Net Profit', data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
  }, {
    name: 'Revenue',
    data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
  }];
  var plotOptions = {
    bar: {
      horizontal: false,
      columnWidth: '55%',
      endingShape: 'rounded'
    },
    line: {
      markers: {
        size: 6
      }
    }
  }
  var bar_options = {
    series: series,
    chart: {
      type: 'bar',
      height: 350,
      width: '100%',
    },
    plotOptions: plotOptions,
    dataLabels: {
      enabled: false
    },
    stroke: {
      show: true,
      width: 2,
      // colors: ['transparent']
    },
    xaxis: {
      categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
    },
    yaxis: {
      title: {
        text: '$(thousands)'
      }
    },
    fill: {
      opacity: 1
    },
    tooltip: {
      y: {
        formatter: function (val) {
          return "$ " + val + " thousands"
        }
      }
    }
  };
  var radar_options = {
    series: series,
    chart: {
      type: 'radar',
      height: 350,
      width: '100%',
    },
    plotOptions: plotOptions,
    dataLabels: {
      enabled: false
    },
    stroke: {
      show: true,
      width: 2,
      // colors: ['transparent']
    },
    xaxis: {
      categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
    },
    yaxis: {
      title: {
        text: '$(thousands)'
      }
    },
    fill: {
      opacity: 1
    },
    tooltip: {
      y: {
        formatter: function (val) {
          return "$ " + val + " thousands"
        }
      }
    }
  };
  var line_options = {
    series: series,
    chart: {
      type: 'line',
      height: 350,
      width: '100%',
    },
    plotOptions: plotOptions,
    dataLabels: {
      enabled: false
    },
    stroke: {
      show: true,
      width: 2,
      // colors: ['transparent']
    },
    xaxis: {
      categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
    },
    yaxis: {
      title: {
        text: '$(thousands)'
      }
    },
    fill: {
      opacity: 1
    },
    tooltip: {
      y: {
        formatter: function (val) {
          return "$ " + val + " thousands"
        }
      }
    }
  };
  var area_options = {
    series: series,
    chart: {
      type: 'area',
      height: 350,
      width: '100%',
    },
    plotOptions: plotOptions,
    dataLabels: {
      enabled: false
    },
    stroke: {
      show: true,
      width: 2,
      // colors: ['transparent']
    },
    xaxis: {
      categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
    },
    yaxis: {
      title: {
        text: '$(thousands)'
      }
    },
    fill: {
      opacity: 1
    },
    tooltip: {
      y: {
        formatter: function (val) {
          return "$ " + val + " thousands"
        }
      }
    }
  };
  let chart = new ApexCharts(document.getElementById("chart"), bar_options);
  chart.render();
  // chart.destroy();
  // let new_options = options;
  function ChangeChart(chartType) {
    console.log(chartType.value);
    chart.destroy();
    if (chartType.value == 'line') {
      chart = new ApexCharts(document.getElementById("chart"), line_options);
      chart.render();

    }
    if (chartType.value == 'bar') {
      chart = new ApexCharts(document.getElementById("chart"), bar_options);
      chart.render();

    }
    if (chartType.value == 'area') {
      chart = new ApexCharts(document.getElementById("chart"), area_options);
      chart.render();

    }
    if (chartType.value == 'radar') {
      chart = new ApexCharts(document.getElementById("chart"), radar_options);
      chart.render();

    }
  }
</script>
