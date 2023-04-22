$(document).ready(function () {
  $(".bestselling-products").slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    infinite: true,
    prevArrow: `<button type="button" class="slick-prev pull-left absolute top-1/2 z-10 ">
      <i class="fa-solid fa-chevron-left bg-gray-300 p-3 w-10 h-10 text-white rounded-full hover:bg-primary-600 transition-all"></i>
      </button>`,
      nextArrow: `<button type="button" class="slick-prev pull-right absolute top-1/2 z-10 right-0 ">
      <i class="fa-solid fa-chevron-right bg-gray-300 p-3 w-10 h-10 text-white rounded-full hover:bg-primary-600 transition-all"></i>
      </button>`,
  });
});
