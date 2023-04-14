<?php

$slides = $params['slides'];
?>

<div className="flex justify-center w-full flex-col items-center -z-10">
  <div class="wrapper">
    <div id="default-carousel" class="relative" data-carousel="slide">
      <div class="relative h-56 overflow-hidden rounded-lg carousel sm:h-64 xl:h-80 2xl:h-96 -z-10">
        <?php foreach ($slides as $slide): ?>
          <div class="hidden duration-700 ease-in-out h-[430px]" data-carousel-item>
            <img src="<?php echo BASE_URI . $slide->image ?>"
              class="absolute block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
              alt="<?php echo $slide->name ?>">
          </div>
        <?php endforeach; ?>
      </div>

      <div class="absolute flex space-x-3 -translate-x-1/2 bottom-5 left-1/2 -z-0">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 1"
          data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
          data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
          data-carousel-slide-to="2"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
          data-carousel-slide-to="3"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
          data-carousel-slide-to="4"></button>
      </div>

      <button type="button"
        class="absolute top-0 left-0 flex items-center justify-center h-full px-4 cursor-pointer -z-0 group focus:outline-none"
        data-carousel-prev>
        <span
          class="inline-flex items-center justify-center w-8 h-8 text-white bg-gray-400 rounded-full sm:w-10 sm:h-10 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
          <i class="fa-solid fa-chevron-up fa-rotate-270"></i>
        </span>
      </button>
      <button type="button"
        class="absolute top-0 right-0 flex items-center justify-center h-full px-4 cursor-pointer -z-0 group focus:outline-none"
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
      <a class="w-32 text-base bg-[#315854] hover:bg-[#2e524e] text-white p-2 rounded-3xl" href="/">
        View All
      </a>
    </div>
    <div class="relative flex w-full gap-6 overflow-hidden bestselling-products">
      <?php
      $total = 10;
      for ($i = 1; $i < $total; $i++) { ?>
        <div
          class="flex flex-col items-center justify-center w-full px-[22px] box-border pt-5 product-info group border-solid border hover:border-gray-500 transition-all hover:shadow-xl">
          <div class="object-cover h-full p-2 w-60">
            <img src="resources/images/productImg.png" alt="" class="object-cover w-full h-full" />
          </div>
          <div
            class="flex flex-col items-start justify-center w-full p-1 text-lg font-medium transition-all bg-white product-body group-hover:-translate-y-16">
            <div class="product-name">
              <a href="/">My Dearest Darkest</a>
            </div>
            <div class=" product-rate">
              <i class="text-yellow-300 fa-solid fa-star"></i>
              <i class="text-yellow-300 fa-solid fa-star"></i>
              <i class="text-yellow-300 fa-solid fa-star"></i>
              <i class="text-yellow-300 fa-solid fa-star"></i>
              <i class="text-yellow-300 fa-solid fa-star"></i>
            </div>
            <div class="text-sm product-author">Enrique Wallace</div>
            <div class="p-0 font-semibold product-price text-primary-900">
              150.000VND
            </div>
            <div
              class="flex items-center justify-between w-full transition-all translate-y-0 opacity-0 heart-option group-hover:opacity-100">
              <p class="font-semibold select-option-text">Add to wishlist</p>
              <i
                class="p-2 transition-all rounded-full cursor-pointer fa-regular fa-heart hover:bg-red-400 hover:text-white"></i>
            </div>
          </div>
        </div>
      <?php }
      ?>
    </div>
    <div class="flex items-center justify-between gap-2 my-4 text-center">
      <h2 class="my-4 whitespace-nowrap xl:text-3xl sm:text-xl">Popular Books</h2>
      <span class="w-full h-px mx-2 bg-gray-600"></span>
      <a class="w-32 text-base bg-[#315854] hover:bg-[#2e524e] text-white p-2 rounded-3xl" href="/">
        View All
      </a>
    </div>
    <div class="flex gap-4">
      <div class="w-full">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
          <?php
          $total = 12;
          for ($i = 1; $i <= $total; $i++) { ?>
            <div
              class="box-border flex flex-col items-center justify-center w-full pt-5 transition-all border border-solid product-info group hover:border-gray-500 hover:shadow-xl">
              <div class="object-cover h-full p-2 w-60">
                <img src="resources/images/productImg.png" alt="" class="object-cover w-full h-full" />
              </div>
              <div
                class="flex flex-col items-start justify-center w-[90%] p-1 text-lg font-medium transition-all bg-white product-body group-hover:-translate-y-16 mx-auto">
                <div class="product-name">
                  <a href="/">My Dearest Darkest</a>
                </div>
                <div class=" product-rate">
                  <i class="text-yellow-300 fa-solid fa-star"></i>
                  <i class="text-yellow-300 fa-solid fa-star"></i>
                  <i class="text-yellow-300 fa-solid fa-star"></i>
                  <i class="text-yellow-300 fa-solid fa-star"></i>
                  <i class="text-yellow-300 fa-solid fa-star"></i>
                </div>
                <div class="text-sm product-author">Enrique Wallace</div>
                <div class="p-0 font-semibold product-price text-primary-900">
                  150.000VND
                </div>
                <div
                  class="flex items-center justify-between w-full transition-all translate-y-0 opacity-0 heart-option group-hover:opacity-100">
                  <p class="font-semibold select-option-text">Add to wishlist</p>
                  <i
                    class="p-2 transition-all rounded-full cursor-pointer fa-regular fa-heart hover:bg-red-400 hover:text-white"></i>
                </div>
              </div>
            </div>
          <?php }
          ?>
        </div>
      </div>
      <div class="hidden w-[25%] xl:block 2xl:w-1/3">
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
      <h2 class="my-4 whitespace-nowrap xl:text-3xl sm:text-xl">Genres Books</h2>
      <span class="w-full h-px mx-2 bg-gray-600"></span>
      <a class="w-32 text-base bg-[#315854] hover:bg-[#2e524e] text-white p-2 rounded-3xl" href="/">
        View All
      </a>
    </div>
    <div class="relative w-full mb-5">
      <div class="grid grid-cols-2 xl:grid-cols-4 lg:grid-cols-3">
        <?php
        $name = array("Fantasy", "Horror", "Drama", "Science-fiction");
        $total = 4;
        for ($i = 1; $i <= $total; $i++) { ?>
          <div class="relative mr-2 overflow-hidden cursor-pointer genres-detail rounded-3xl w-fit">
            <div class="w-full h-56 overflow-hidden img rounded-3xl">
              <img src="resources/images/genresHorror.png" alt=""
                class="object-cover w-full h-full transition-transform rounded-3xl hover:scale-125" />
            </div>
            <p class="absolute font-normal text-white xl:top-3/4 left-10 xl:text-3xl sm:text-2xl md:top-2/3">
              <?php echo $name[$i - 1] ?>
            </p>
          </div>
        <?php }
        ?>
      </div>
    </div>
    <div class="flex my-8 lg:gap-0 sm:gap-3 lg:flex-row sm:flex-col">
      <div
        class="overflow-hidden lg:w-1/4 bg-orange-50 lg:p-5 rounded-2xl xl:mr-10 lg:mr-2 mobile:w-full md:p-2 lg:overflow-x-hidden">
        <div
          class="p-3 mb-6 border-0 border-b-2 border-solid header-table lg:text-2xl whitespace-nowrap md:text-xl sm:text-center">
          <p>Popular Author</p>
        </div>
        <div class="grid grid-cols-3 gap-5 lg:grid-cols-1">
          <?php
          $total = 6;
          for ($i = 1; $i <= $total; $i++) { ?>
            <div class="flex items-center w-full mb-4 author-card justify-evenly mobile:flex-col lg:flex-row">
              <div class="author-face">
                <img src="resources/images/author.png" alt="" class='rounded-full' />
              </div>
              <p class="text-lg font-medium author-name whitespace-nowrap ">
                William Graham
              </p>
              <div class="detail-arrow mobile:hidden xl:block">
                <i class="fa-solid fa-chevron-up fa-rotate-90"></i>
              </div>
            </div>
          <?php }
          ?>
        </div>
      </div>
      <div class="author-bestselling lg:w-3/4 sm:w-full">
        <div class="flex items-center justify-between gap-2 mb-4 text-center">
          <h2 class="my-4 whitespace-nowrap xl:text-3xl sm:text-xl">Bestselling Books</h2>
          <span class="w-full h-px mx-2 bg-gray-600"></span>
          <a class="w-32 text-base bg-[#315854] hover:bg-[#2e524e] text-white p-2 rounded-3xl" href="/">
            View All
          </a>
        </div>
        <div class="list-author-bestselling">
          <div class="flex my-5 h-fit top-product sm:w-full sm:gap-0">
            <div class="w-[400px] h-64">
              <img src="resources/images/productImg.png" alt="" class="object-contain w-full h-full rounded-xl" />
            </div>
            <div class="flex flex-col gap-0 top-product-detail lg:gap-2 lg:justify-start mobile:w-fit">
              <p class="top-product-name xl:text-3xl lg:text-2xl">
                Misty Figueroa
              </p>
              <div class=" product-rate">
                <i class="text-yellow-300 fa-solid fa-star"></i>
                <i class="text-yellow-300 fa-solid fa-star"></i>
                <i class="text-yellow-300 fa-solid fa-star"></i>
                <i class="text-yellow-300 fa-solid fa-star"></i>
                <i class="text-yellow-300 fa-solid fa-star"></i>
              </div>
              <p class="font-bold top-product-author">Misty Figueroa</p>
              <div
                class="inline top-product-desc text-ellipsis sm:w-full sm:pr-20 mobile:text-sm mobile:w-3/4 mobile:h-fit">
                Est numquam harum aut ut. Pariatur cum blanditiis est
                delectus accusamus eveniet. Quis fugiat eligendi magni eos
                dignissimos numquam.Quis ipsum incididunt non minim elit
                veniam qui voluptate voluptate
              </div>
              <p class="text-lg font-bold top-product-price">
                150.000VNĐ
              </p>
            </div>
          </div>
          <div class="mt-2 ml-6 list-top-product-by-author">
            <ul class="grid gap-2 auto-cols-max sm:grid-cols-2">
              <?php
              $total = 4;
              for ($i = 1; $i <= $total; $i++) { ?>
                <li>
                  <div class="flex product-info h-fit sm:w-64 md:w-80">
                    <div class="h-full img w-52">
                      <img src="resources/images/productImg.png" alt="" />
                    </div>
                    <div
                      class="flex flex-col p-2 font-medium product-body sm:w-full lg:text-lg md:text-base lg:gap-0 md:gap-2">
                      <div class={`product-name`}>
                        <a href="/book_detail">My Dearest Darkest</a>
                      </div>
                      <div class=" product-rate">
                        <i class="text-yellow-300 fa-solid fa-star"></i>
                        <i class="text-yellow-300 fa-solid fa-star"></i>
                        <i class="text-yellow-300 fa-solid fa-star"></i>
                        <i class="text-yellow-300 fa-solid fa-star"></i>
                        <i class="text-yellow-300 fa-solid fa-star"></i>
                      </div>
                      <div class="text-sm product-author">Enrique Wallace</div>
                      <div class="p-0 font-semibold product-price text-primary-900">
                        150.000VND
                      </div>
                    </div>
                  </div>
                </li>
              <?php }
              ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
