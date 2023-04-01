<div class="flex justify-center w-full flex-col items-center">
    <div class="h-56 md:h-80 xl:h-96 w-full">
        <Carousel slideInterval={3000}>
            {[...Array(10)].map((e, i) => {
            return (
            <img src={homeImg} class="h-full object-cover" alt="hello" />
            )
            })}
        </Carousel>
    </div>
    <div class="container">
        <!-- <SectionTitle name="Bestselling Books" class="bestselling-books" text_size="text-3xl" width="w-3/4" /> -->
        <div class="bestselling-products w-full relative">
            <Slider {...settings}>
                {[...Array(10)].map((e, i) => {
                return
                <Product />
                })}
            </Slider>
        </div>

        <!-- <SectionTitle name="Popular Books" class="popular-books" text_size="text-3xl" width="w-3/4" /> -->
        <div class="flex">
            <div class="w-full">
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    {[...Array(12)].map((e, i) => {
                    return
                    <Product />
                    })}
                </div>
            </div>
            <div class="hidden w-[25%] xl:block 2xl:w-1/3">
                <div class="w-full h-auto sticky top-32">
                    <img src={bestOffer} alt="" class="rounded-2xl h-full w-full" />
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

        <!-- <SectionTitle name="Genres Books" class="genres-books" text_size="text-3xl" width="w-3/4" /> -->
        <div class="w-full relative mb-5">
            <Slider {...settingsGenres}>
                <GenresKind name="Fantasy" />
                <GenresKind name="Fantasy" />
                <GenresKind name="Fantasy" />
            </Slider>
        </div>

        <div class="flex mb-5 lg:gap-0 sm:gap-3 lg:flex-row mobile:flex-col">
            <div
                class="lg:w-1/4 bg-orange-50 lg:p-5 rounded-2xl xl:mr-10 lg:mr-2 mobile:w-full md:p-2 overflow-hidden lg:overflow-x-hidden">
                <div
                    class="header-table lg:text-2xl border-0 border-solid border-b-2 mb-6 p-3 whitespace-nowrap md:text-xl mobile:text-center">
                    <p>Popular Author</p>
                </div>
                <div class="grid grid-cols-3 lg:grid-cols-1">
                    {/* loop 7 times */}
                    {[...Array(6)].map((e, i) => {
                    return (
                    <div class="py-2">
                        <Author />
                    </div>
                    )
                    })}
                </div>
            </div>

            <div class="author-bestselling lg:w-3/4 mobile:w-full">
                <!-- <SectionTitle name="Bestselling Books" class="bestselling-books-author" text_size="text-2xl" width="w-2/3" /> -->
                <div class="list-author-bestselling">
                    <div class=" h-fit top-product flex sm:w-full mobile:w-screen sm:gap-0 mobile:gap-2 sm:m-0">
                        <div class="object-cover h-52 w-64">
                            <img src={productImg} alt="" class="w-full h-full" />
                        </div>
                        <div
                            class="top-product-detail flex flex-col xl:justify-between sm:gap-0 lg:justify-start mobile:w-fit">
                            <p class="top-product-name xl:text-3xl lg:text-2xl">
                                Misty Figueroa
                            </p>
                            <div class="rate">
                                <img src={star} alt="" />
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
                    <div class="list-top-product-by-author mt-2">
                        <ul class="grid auto-cols-max sm:grid-cols-2 gap-2">
                            <li>
                                <ProductHorizontal width="w-80" />
                            </li>
                            <li>
                                <ProductHorizontal width="w-80" />
                            </li>
                            <li>
                                <ProductHorizontal width="w-80" />
                            </li>
                            <li>
                                <ProductHorizontal width="w-80" />
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
