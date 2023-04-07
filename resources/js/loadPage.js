const loadPageByAjax = async (pageTarget) => {
  // if (pageTarget == "favorites" && (await isLogin())) {
    // document.querySelector()
  // }
  $.ajax({
    url: "app/views/layouts/dashboard.php",
    type: "POST",
    data: { page: pageTarget },
    dataType: "html",
    success: function (data) {
      document.querySelector("#content").innerHTML = data;
    },
  });
};
