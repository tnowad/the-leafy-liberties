const loadPageByAjax = async (pageTarget) => {
  const currentURL = window.location.href;
  const newURL = `${currentURL}app/views/layouts/${pageTarget}.php`;

  $.ajax({
    url: newURL,
    type: "POSt",
    data: { page: pageTarget },
    dataType: "html",
    success: function (data) {
      window.history.pushState({}, null, currentURL);
    },
  });
};
