<div className="flex justify-center w-full flex-col items-center -z-10">
    <div class="wrapper">
        <div id="default-carousel" class="relative" data-carousel="static">

            <div class="overflow-hidden relative h-56 rounded-lg sm:h-64 xl:h-80 2xl:h-96">

                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <span
                        class="absolute top-1/2 left-1/2 text-2xl font-semibold text-white -translate-x-1/2 -translate-y-1/2 sm:text-3xl ">Primer
                        Slide</span>
                    <img src="../assets/img/mainHomeImg.png"
                        class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                </div>

                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="../assets/img/mainHomeImg.png"
                        class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                </div>

                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="../assets/img/mainHomeImg.png"
                        class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                </div>
            </div>


            <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 1"
                    data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                    data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                    data-carousel-slide-to="2"></button>
            </div>

            <button type="button"
                class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-gray-400 text-white  group-focus:ring-4 group-focus:ring-white  group-focus:outline-none">
                    <i class="fa-solid fa-chevron-up fa-rotate-270"></i>
                </span>
            </button>
            <button type="button"
                class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-gray-400 text-white 0 group-focus:ring-4 group-focus:ring-white  group-focus:outline-none">
                    <i class="fa-solid fa-chevron-up fa-rotate-90"></i>
                </span>
            </button>
        </div>
    </div>
    <div class="container mx-auto">
        <div class="flex justify-between items-center text-center gap-2 my-4">
            <h2 class="my-4 whitespace-nowrap xl:text-3xl sm:text-xl">Bestselling Books</h2>
            <span class="h-px bg-gray-600 w-full mx-2"></span>
            <a class="w-32 text-base bg-[#315854] hover:bg-[#2e524e] text-white p-2 rounded-3xl" href="/">
                View All
            </a>
        </div>
        <div class="bestselling-products w-full relative flex overflow-hidden gap-6">
            <?php
      $total = 10;
      for ($i = 1; $i < $total; $i++) { ?>
            <div class="product-info w-full flex flex-col justify-center items-center p-1">
                <div class="w-56 h-full object-cover">
                    <img src="../assets/img/productImg.png" alt="" class="w-full h-full object-cover" />
                </div>
                <div class="product-body w-full p-1 text-lg font-medium flex flex-col justify-center items-center">
                    <div class="product-name">
                        <a href="/">My Dearest Darkest</a>
                    </div>
                    <div class=" product-rate">
                        <i class="fa-solid fa-star text-yellow-300"></i>
                        <i class="fa-solid fa-star text-yellow-300"></i>
                        <i class="fa-solid fa-star text-yellow-300"></i>
                        <i class="fa-solid fa-star text-yellow-300"></i>
                        <i class="fa-solid fa-star text-yellow-300"></i>
                    </div>
                    <div class="product-author text-sm">Enrique Wallace</div>
                    <div class="product-price p-0 text-primary-900 font-semibold">
                        150.000VND
                    </div>
                </div>
            </div>
            <?php }
      ?>
        </div>
        <div class="flex justify-between items-center text-center gap-2 my-4">
            <h2 class="my-4 whitespace-nowrap xl:text-3xl sm:text-xl">Popular Books</h2>
            <span class="h-px bg-gray-600 w-full mx-2"></span>
            <a class="w-32 text-base bg-[#315854] hover:bg-[#2e524e] text-white p-2 rounded-3xl" href="/">
                View All
            </a>
        </div>
        <div class="flex">
            <div class="w-full">
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    <?php
          $total = 12;
          for ($i = 1; $i <= $total; $i++) { ?>
                    <div class="product-info w-fit flex flex-col justify-center items-center p-1">
                        <div class="w-56 h-full object-cover">
                            <img src="../assets/img/productImg.png" alt="" class="w-full h-full object-cover" />
                        </div>
                        <div
                            class="product-body w-full p-1 text-lg font-medium flex flex-col justify-center items-center">
                            <div class="product-name">
                                <a href="/">My Dearest Darkest</a>
                            </div>
                            <div class=" product-rate">
                                <i class="fa-solid fa-star text-yellow-300"></i>
                                <i class="fa-solid fa-star text-yellow-300"></i>
                                <i class="fa-solid fa-star text-yellow-300"></i>
                                <i class="fa-solid fa-star text-yellow-300"></i>
                                <i class="fa-solid fa-star text-yellow-300"></i>
                            </div>
                            <div class="product-author text-sm">Enrique Wallace</div>
                            <div class="product-price p-0 text-primary-900 font-semibold">
                                150.000VND
                            </div>
                        </div>
                    </div>
                    <?php }
          ?>
                </div>
            </div>
            <div class="hidden w-[25%] xl:block 2xl:w-1/3">
                <div class="w-full h-auto sticky top-32">
                    <img src="../assets/img/bestOffer.png" alt="" class="rounded-2xl h-full w-full" />
                    <div class="absolute top-3/4 text-center flex items-center flex-col w-full">
                        <p class="text-lg text-white font-normal xl:text-base">
                            Best Offer
                        </p>
                        <p class="text-4xl xl:text-3xl text-white">Save 100%</p>
                        <button class=" bg-white w-32 text-lg text-pink-400 font-bold p-2 rounded-full mt-3">
                            See more
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-between items-center text-center gap-2 my-4">
            <h2 class="my-4 whitespace-nowrap xl:text-3xl sm:text-xl">Genres Books</h2>
            <span class="h-px bg-gray-600 w-full mx-2"></span>
            <a class="w-32 text-base bg-[#315854] hover:bg-[#2e524e] text-white p-2 rounded-3xl" href="/">
                View All
            </a>
        </div>
        <div class="w-full relative mb-5">
            <div class="flex justify-center items-center gap-5">
                <?php
        $name = array("Fantasy", "Horror", "Drama", "Science-fiction");
        $total = 4;
        for ($i = 1; $i <= $total; $i++) { ?>
                <div class="genres-detail relative overflow-hidden rounded-3xl cursor-pointer mr-2 w-fit">
                    <div class="img overflow-hidden w-full h-56 rounded-3xl">
                        <img src="../assets/img/genresHorror.png" alt=""
                            class="rounded-3xl hover:scale-125 transition-transform w-full h-full object-cover" />
                    </div>
                    <p
                        class="absolute xl:top-3/4 left-10 text-white font-normal text-4xl xl:text-3xl lg:text-2xl md:text-[22px] md:top-2/3 sm:text-[30px] mobile:top-2/3">
                        <?php echo $name[$i - 1] ?>
                    </p>
                </div>
                <?php }
        ?>
            </div>
        </div>
        <div class="flex my-8 lg:gap-0 sm:gap-3 lg:flex-row sm:flex-col">
            <div
                class="lg:w-1/4 bg-orange-50 lg:p-5 rounded-2xl xl:mr-10 lg:mr-2 mobile:w-full md:p-2 overflow-hidden lg:overflow-x-hidden">
                <div
                    class="header-table lg:text-2xl border-0 border-solid border-b-2 mb-6 p-3 whitespace-nowrap md:text-xl sm:text-center">
                    <p>Popular Author</p>
                </div>
                <div class="grid grid-cols-3 lg:grid-cols-1 gap-5">
                    <?php
          $total = 6;
          for ($i = 1; $i <= $total; $i++) { ?>
                    <div class="author-card flex w-full justify-evenly items-center mb-4 mobile:flex-col lg:flex-row">
                        <div class="author-face">
                            <img src="../assets/img/author.png" alt="" class='rounded-full' />
                        </div>
                        <p class="author-name font-medium whitespace-nowrap text-lg ">
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
                <div class="flex justify-between items-center text-center gap-2 mb-4">
                    <h2 class="my-4 whitespace-nowrap xl:text-3xl sm:text-xl">Bestselling Books</h2>
                    <span class="h-px bg-gray-600 w-full mx-2"></span>
                    <a class="w-32 text-base bg-[#315854] hover:bg-[#2e524e] text-white p-2 rounded-3xl" href="/">
                        View All
                    </a>
                </div>
                <div class="list-author-bestselling">
                    <div class=" h-fit top-product flex sm:w-full sm:gap-0 my-5">
                        <div class="w-[400px] h-64">
                            <img src="../assets/img/productImg.png" alt=""
                                class="w-full h-full object-contain rounded-xl" />
                        </div>
                        <div class="top-product-detail flex flex-col gap-0 lg:gap-2 lg:justify-start mobile:w-fit">
                            <p class="top-product-name xl:text-3xl lg:text-2xl">
                                Misty Figueroa
                            </p>
                            <div class=" product-rate">
                                <i class="fa-solid fa-star text-yellow-300"></i>
                                <i class="fa-solid fa-star text-yellow-300"></i>
                                <i class="fa-solid fa-star text-yellow-300"></i>
                                <i class="fa-solid fa-star text-yellow-300"></i>
                                <i class="fa-solid fa-star text-yellow-300"></i>
                            </div>
                            <p class="top-product-author font-bold">Misty Figueroa</p>
                            <div
                                class="top-product-desc text-ellipsis sm:w-full sm:pr-20 inline mobile:text-sm mobile:w-3/4 mobile:h-fit">
                                Est numquam harum aut ut. Pariatur cum blanditiis est
                                delectus accusamus eveniet. Quis fugiat eligendi magni eos
                                dignissimos numquam.Quis ipsum incididunt non minim elit
                                veniam qui voluptate voluptate
                            </div>
                            <p class="top-product-price text-lg font-bold">
                                150.000VNĐ
                            </p>
                        </div>
                    </div>
                    <div class="list-top-product-by-author mt-2 ml-6">
                        <ul class="grid auto-cols-max sm:grid-cols-2 gap-2">
                            <?php
              $total = 4;
              for ($i = 1; $i <= $total; $i++) { ?>
                            <li>
                                <div class="product-info h-fit flex sm:w-64 md:w-80">
                                    <div class="img w-52 h-full">
                                        <img src="../assets/img/productImg.png" alt="" />
                                    </div>
                                    <div
                                        class="product-body sm:w-full p-2 lg:text-lg font-medium md:text-base flex flex-col lg:gap-0 md:gap-2">
                                        <div class={`product-name`}>
                                            <a href="/book_detail">My Dearest Darkest</a>
                                        </div>
                                        <div class=" product-rate">
                                            <i class="fa-solid fa-star text-yellow-300"></i>
                                            <i class="fa-solid fa-star text-yellow-300"></i>
                                            <i class="fa-solid fa-star text-yellow-300"></i>
                                            <i class="fa-solid fa-star text-yellow-300"></i>
                                            <i class="fa-solid fa-star text-yellow-300"></i>
                                        </div>
                                        <div class="product-author text-sm">Enrique Wallace</div>
                                        <div class="product-price p-0 text-primary-900 font-semibold">
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