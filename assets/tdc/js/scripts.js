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
    var sched = $("#selectSched").attr("value");
    $.ajax({
      url: "database/tdc/checkexist.php?schedID=" + sched,
      method: "GET",
      success: function (data) {
        checkExist(data);
      },
    });
  });

  function checkExist(val) {
    var schedID = $("#selectSched").attr("value");
    var userID = $("#selectSched").attr("data-value");
    var checkUser = $("#selectSched").attr("data-old-value");
    if (checkUser < 2) {
      console.log(val);
      if (val == "false") {
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
                  (async () => {
                    const { value: text } = await Swal.fire({
                      title: "Appointment Confirmation",
                      icon: "info",
                      html:
                        '<label for="title" class="d-flex justify-content-start">Once the appointment is approved you cant cancel the appointment anymore<span id="form_required"></span></label><br>' +
                        "<div class='form-check form-check-inline'>" +
                        "<input class='form-check-input' type='checkbox' id='inlineCheckbox1' value='true'>" +
                        "<label class='form-check-label' for='inlineCheckbox1'>I read and understand the condition.</label>" +
                        "</div>",
                      focusConfirm: false,
                      showCancelButton: true,
                      confirmButtonText: "Submit",
                      preConfirm: () => {
                        // Check if all fields are filled up
                        const checkboxes = document.querySelectorAll(
                          'input[type="checkbox"]:checked'
                        );

                        if (checkboxes.length === 0) {
                          Swal.showValidationMessage(
                            "Please Check the checkbox."
                          );
                        } else {
                          Swal.fire(
                            "Enrolled!",
                            "You have successfuly enrolled.",
                            "success"
                          );
                          enrollStudent(schedID, userID);
                        }
                      },
                    });

                    if (text) {
                    } else {
                      Swal.fire({
                        icon: "info",
                        title: "Oops...",
                        text: "Request has been cancelled",
                      });
                    }
                  })();

                  // enrollStudent(schedID, userID);
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
          "You currently have pending/active TDC appointment in this schedule",
          "info"
        );
      }
    } else {
      Swal.fire(
        "Oops...",
        "You currently have pending/active TDC appointment",
        "info"
      );
    }
  }

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
