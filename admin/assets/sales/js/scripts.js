$(document).ready(function () {
  load_data();

  function load_data(search) {
    var type = $("#salesFilter").val();
    $.ajax({
      url: "database/sales/display.php",
      method: "post",
      data: { search: search, type: type },
      success: function (data) {
        $("#displaySales tbody").html(data);
      },
    });
  }

  $("#search_text").keyup(function () {
    var search = $(this).val();
    if (search != "") {
      load_data(search);
    } else {
      load_data();
    }
  });

  $("#salesFilter").on("change", function () {
    load_data();
  });

  $(document).on("click", "#generatereport", function () {
    var type = $("#salesFilter").val();
    window.location.href = "database/sales/generateReport.php?type=" + type;
  });
});
