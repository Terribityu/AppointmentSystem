$(document).ready(function () {
  // Code Start
  load_data();

  function load_data(search) {
    $.ajax({
      url: "database/appointments/display.php",
      method: "post",
      data: { search: search },
      success: function (data) {
        $("#displayAppointments tbody").html(data); // Populate the tbody of displayAppointments Table with data gathered from database
      },
    });
  }

  $(document).on("click", ".clickable-row", function (e) {
    e.preventDefault();
    var id = $(this).attr("data-value");
    $.ajax({
      url: "database/appointments/check.php",
      method: "post",
      data: { id: id },
      success: function (data) {
        data = JSON.parse(data);
        $("#title__text").html(data["title"]);
        $("#instructor__text").html(data["firstname"] + " " + data["lastname"]);
        $("#date__text").html(data["start"]);
        $("#time__text").html(data["time"]);
        $("#status__text").html(data["status_a"] + ": " + data["reason_rej"]);
        $("#price__text").html(data["price"]);
        $("#cancelAppoint").val(data["appointmentID"]);
        $("#appointInfoModal").modal("show");

        changeButton(data);
      },
    });
  });

  function changeButton(data) {
    if (data["remarks"] == "TBA") {
      $("#viewRemarks").val(data["appointmentID"]);
      $("#viewRemarks").attr("style", "display: none;");
      $("#cancelAppoint").removeAttr("style");
      $("#closePreview").attr("style", "display: none;");
    } else {
      $("#viewRemarks").removeAttr("style");
      $("#cancelAppoint").attr("style", "display: none;");
      $("#closePreview").removeAttr("style");
    }
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
    var id = $(this).val();
    $("#appointInfoModal").modal("hide");
    Swal.fire({
      title: "Request Appointment Cancellation?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, cancel it!",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "database/appointments/request.php",
          method: "post",
          data: { id: id },
          success: function (data) {
            console.log(data);
            load_data();
            Swal.fire(
              "Success!",
              "Your request has been submitted.",
              "success"
            );
          },
        });
      } else {
        $("#appointInfoModal").modal("show");
      }
    });
  });
});
