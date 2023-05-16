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

  $(document).on("click", ".clickable-row", function (e) {
    e.preventDefault();
    var id = $(this).attr("data-value");
    $("#appointInfoModal").modal("show");
    $.ajax({
      url: "database/myappointments/check.php",
      method: "post",
      data: { id: id },
      success: function (data) {
        data = JSON.parse(data);
        $("#title__text").html(data["title"]);
        $("#instructor__text").html(data["firstname"] + " " + data["lastname"]);
        $("#date__text").html(data["start"]);
        $("#time__text").html(data["time"]);
        $("#status__text").html(data["status_a"]);
        $("#price__text").html(data["price"]);
        $("#addRemarks").val(data["appointmentID"]);
        $("#cancelAppoint").val(data["appointmentID"]);
      },
    });
  });

  $(document).on("click", "#cancelAppoint", function (e) {
    e.preventDefault();
    var id = $(this).val();
    $.ajax({
      url: "database/myappointments/request.php",
      method: "post",
      data: { id: id },
      success: function (data) {
        console.log(data);
      },
    });
  });

  $(document).on("click", ".clickable-row", function (e) {
    var id = $(this).val();
    $.ajax({
      url: "database/myappointments/remarks.php",
      method: "post",
      data: { id: id },
      success: function (data) {
        console.log(data);
      },
    });
  });
});
