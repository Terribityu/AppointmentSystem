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

        // Get the current date
        var currentDate = new Date();

        // Create a date string for comparison
        var dateString = data["start"]; // Replace with your desired date

        // Convert the date string to a Date object
        var givenDate = new Date(dateString);

        // Calculate the difference in milliseconds between the two dates
        var timeDifference = givenDate.getTime() - currentDate.getTime();

        // Calculate the number of days remaining
        var daysRemaining = timeDifference / (1000 * 60 * 60 * 24);

        if (data["status_a"] == "rejected" || daysRemaining <= 2) {
          $("#rescheduleApp").attr("hidden", "true");
        } else {
          $("#rescheduleApp").removeAttr("hidden");
        }
        if (
          data["status_a"] == "rejected" ||
          data["status_a"] == "cancelled" ||
          data["status_a"] == "approved"
        ) {
          $("#cancelAppoint").attr("hidden", "true");
        } else {
          $("#cancelAppoint").removeAttr("hidden");
        }
        $("#cancelAppoint").val(data["appointmentID"]);
        $("#rescheduleApp").val(data["appointmentID"]);
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
          url: "database/appointments/cancel.php",
          method: "post",
          data: { id: id, reason: text },
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

  $(document).on("click", "#rescheduleApp", function (e) {
    e.preventDefault();
    var id = $(this).val();
    var schedID = $(this).attr("old-value");
    $("#appointInfoModal").modal("hide");
    getSchedules();
    (async () => {
      const { value: text } = await Swal.fire({
        title: "Reschedule Appointment",
        html:
          '<label for="title" class="d-flex justify-content-start">Title: &nbsp;<b>Rogelio Salsalin</b><span id="form_required"></span></label><br>' +
          '<label for="title" class="d-flex justify-content-start">Schedules: <span id="form_required"></span></label>' +
          '<select id="swalEvtSched" class="form-control mb-3" required name="swalEvtSched" aria-label="Default select example">' +
          '<option selected value="PDC">Practical Driving Course</option>' +
          "</select>",
        focusConfirm: false,
        showCancelButton: true,
        confirmButtonText: "Submit",
        preConfirm: () => {
          // Check if all fields are filled up
          const sched = document.getElementById("swalEvtSched").value;

          if (!sched === 0) {
            Swal.showValidationMessage(
              "Please fill in all the required fields"
            );
          } else {
            const data = {
              schedID: document.getElementById("swalEvtSched").value,
            };

            return data;
          }
        },
      });

      if (text) {
        (async () => {
          const { value: conf } = await Swal.fire({
            input: "textarea",
            inputLabel: "Reason for reschedule appointment request.",
            inputPlaceholder: "Type your message here...",
            inputAttributes: {
              "aria-label": "Type your message here",
            },
            showCancelButton: true,
          });

          if (conf) {
            text["reason"] = conf;
            $.ajax({
              url: "database/appointments/request.php",
              method: "post",
              data: { id: id, data: text },
              success: function (data) {
                console.log(data);
                Swal.fire(
                  "Enrolled!",
                  "You request has been submitted.",
                  "success"
                );
                load_data();
              },
            });
          } else {
            Swal.fire({
              icon: "info",
              title: "Oops...",
              text: "Reschedule request has been cancelled",
            });
          }
        })();
      } else {
        Swal.fire({
          icon: "info",
          title: "Oops...",
          text: "Request has been cancelled",
        });
      }
    })();
  });

  function getSchedules() {
    // Function to get the List of Schedules
    $.ajax({
      url: "database/appointments/getSchedule.php",
      method: "post",
      success: function (data) {
        $("#swalEvtSched").html(data);
      },
    });
  }
});
