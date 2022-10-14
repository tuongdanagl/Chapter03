$(document).ready(function () {
  let arrayServices = [];

  $(".chkbutton").click(function () {
    let value = $(this).attr("value");

    if (this.checked) {
      if ($.inArray(value, arrayServices) === -1) {
        arrayServices.push(value);
        getlistServices(arrayServices);
      }
    } else {
      if ($.inArray(value, arrayServices) !== -1) {
        arrayServices = arrayServices.filter((item) => item != value);
        getlistServices(arrayServices);
      }
    }
    getlistServices(arrayServices);
  });

  function getlistServices(arr_key) {
    let link = "";
    const urlname = $("#urlname").val()
   
    if (arr_key.length) {
      link = urlname + "/wp-json/wp/v2/services?per_page=100&cat-services=" + arr_key.toString();
    } else {
      link = urlname + "/wp-json/wp/v2/services?per_page=100";
    }

    $.ajax({
      url: link,
      success: function (result) {
        $("#services").empty();
        for (let i = 0; i < result.length; i++) {
          let item = result[i];

          $("#services").append(`
            <li class="c-column__item">
                <a href="${item.link}">
                    <img src="${item.serimg_url}">
                    <p>${item.title.rendered}</p>
                </a>
            </li>
        `);
        }
        $("#totalServices").empty();
        $("#totalServices").append(result.length);
      },
    });
  }


});
  