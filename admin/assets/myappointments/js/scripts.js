$(document).ready(function () {
  // Code Start
  load_data();

  function load_data(search) {
    $.ajax({
      url: "database/myappointments/display.php",
      method: "post",
      data: { search: search },
      success: function (data) {
        $("#displayAppointments tbody").html(data); // Populate the tbody of displayAppointments Table with data gathered from database
      },
    });
  }

  $("#search_text").keyup(function () {
    // event listener to search for data that user desired.
    var search = $(this).val();
    if (search != "") {
      load_data(search);
    } else {
      load_data();
    }
  });

  $(document).on("click", "#cancelAppoint", function (e) {
    e.preventDefault();
    var request = $(this).val();
    console.log(request);
    $.ajax({
      url: "database/myappointments/request.php",
      method: "post",
      data: { request: request },
      success: function (data) {
        console.log(data);
      },
    });
  });

  $(document).on("click", ".clickable-row", function (e) {
    e.preventDefault();
    var id = $(this).attr("data-value");
    console.log(id);
    $("#appointInfoModal").modal("show");
    $.ajax({
      url: "database/myappointments/check.php?id=" + id,
      method: "get",
      datatype: "json",
      success: function (data) {
        $("#appoint__content").html(data);
      },
    });
  });
});
