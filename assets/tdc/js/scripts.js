$(document).ready(function () {
  load_data();
  function load_data(search) {
    $.ajax({
      url: "database/tdc/display.php",
      method: "post",
      data: { search: search },
      success: function (data) {
        $("#schedlist").html(data);
      },
    });
  }

  $(document).on("click", "#selectSched", function (e) {
    e.preventDefault();
    var schedID = $(this).attr("value");
    var userID = $(this).attr("data-value");
    var checkUser = $(this).attr("data-old-value");

    if (checkUser < 2) {
      $.ajax({
        url: "database/tdc/check.php?schedID=" + schedID,
        method: "GET",
        success: function (data) {
          data = JSON.parse(data);
          if (data["condi"] != data["sched_details"]) {
            var date = new Date(data["start"]);
            var formattedDate = date.toLocaleDateString("en-US", {
              year: "numeric",
              month: "long",
              day: "numeric",
            });
            Swal.fire({
              title: "Theoretical Driving Course",
              html:
                "<p>Instructor: " +
                data["firstname"] +
                " " +
                data["lastname"] +
                "</p><p>Date: " +
                formattedDate +
                "</p><p>Slots: " +
                data["slots"] +
                "</p><p>Price: " +
                data["price"] +
                "</p><p>Session: " +
                data["sched_details"] +
                "</p>",
              icon: "info",
              showCancelButton: true,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              confirmButtonText: "Enroll",
            }).then((result) => {
              if (result.isConfirmed) {
                Swal.fire(
                  "Enrolled!",
                  "You have successfuly enrolled.",
                  "success"
                );
                enrollStudent(schedID, userID);
              }
            });
          } else {
            Swal.fire(
              "Oops...",
              "You currently have approved TDC " +
                data["condi"] +
                " session appointment",
              "info"
            );
          }
        },
      });
    } else {
      Swal.fire(
        "Oops...",
        "You currently have pending/active TDC appointment",
        "info"
      );
    }
  });

  function enrollStudent(schedID, userID) {
    $.ajax({
      url: "database/tdc/enroll.php",
      method: "post",
      data: { schedID: schedID, userID: userID },
      success: function (data) {
        load_data();
      },
    });
  }
});
