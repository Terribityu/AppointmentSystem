$(document).ready(function () {
  // Code Start
  load_data();

  function load_data(search) {
    var pend = $("#currentapp").val();
    // var appr = $('#approvedblogs').val();
    if (pend == "active") {
      // Select the status of what list the user wants to view (Pending, Rejected)
      stats = "approved";
    } else {
      stats = "request";
    }
    $.ajax({
      url: "database/myappointments/display.php",
      method: "post",
      data: { search: search, stats: stats },
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
        $("#cancelAppoint").val(data["appointmentID"]);

        changeButton(data);
      },
    });
  });

  function changeButton(data) {
    if (data["remarks"] == "TBA") {
      $("#addRemarks").val(data["appointmentID"]);
      $("#addRemarks").attr("data-value", data["title"]);
      $("#addRemarks").removeAttr("style");
      $("#cancelAppoint").removeAttr("style");
      $("#closePreview").attr("style", "display: none;");
    } else {
      $("#addRemarks").attr("style", "display: none;");
      $("#cancelAppoint").attr("style", "display: none;");
      $("#closePreview").removeAttr("style");
    }
  }

  $(document).on("click", "#cancelAppoint", function (e) {
    e.preventDefault();
    var id = $(this).val();
    console.log(id);
    $("#appointInfoModal").modal("hide");
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, cancel it!",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "database/myappointments/cancelAppointment.php",
          method: "post",
          data: { id: id },
          success: function (data) {
            console.log(data);
            load_data();
            Swal.fire(
              "Success!",
              "Your appointment has been cancelled.",
              "success"
            );
          },
        });
      } else {
        $("#appointInfoModal").modal("show");
      }
    });
  });

  $(document).on("click", "#addRemarks", function () {
    var id = $(this).val();
    var type = $(this).attr("data-value");
    var html = "none";
    $("#appointInfoModal").modal("hide");
    if (type == "PDC") {
      html =
        '<label for="swalRemarks" class="d-flex justify-content-start">Remarks:</label>' +
        '<select id="swalRemarks" class="form-control mb-3" required name="swalRemarks" aria-label="Default select example">' +
        '<option value="Passed">Passed</option>' +
        '<option value="Failed">Failed</option>' +
        "</select>" +
        '<label for="swalQuiz" class="d-flex justify-content-start">Written Quiz Score:</label>' +
        '<input id="swalQuiz" type="number" class="form-control mb-3" name="swalQuiz" required placeholder="Enter Written Quiz Score">' +
        '<label for="swalExam" class="d-flex justify-content-start">Written Exam Score:</label>' +
        '<input id="swalExam" name="swalExam" type="number" class="form-control mb-3" required placeholder="Enter Written Exam Score">';
    }

    Swal.fire({
      title: "Add Remarks",
      html: html,
      focusConfirm: false,
      showCancelButton: true,
      confirmButtonText: "Submit",
      preConfirm: () => {
        const swalRemarks = $("#swalRemarks").val();
        const swalQuiz = $("#swalQuiz").val();
        const swalExam = $("#swalExam").val();

        if (
          swalRemarks.trim() === "" ||
          swalQuiz.trim() === "" ||
          swalExam.trim() === ""
        ) {
          swal.showValidationMessage("Please fill in all fields");
        } else {
          // Call your AJAX function here
          const formData = {
            remarks: swalRemarks,
            quiz: swalQuiz,
            exam: swalExam,
          };
          sendData(formData, id);
        }
      },
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire("Success!", "Your remarks has been submitted.", "success");
      } else {
        $("#appointInfoModal").modal("show");
      }
    });
  });

  function sendData(data, id) {
    $.ajax({
      url: "database/myappointments/remarks.php",
      method: "post",
      data: { data: data, id: id },
      success: function (data) {
        load_data();
        console.log(data);
      },
    });
  }

  $(document).on("click", "#acceptRequest", function () {
    var id = $(this).val();
    Swal.fire({
      title: "Approve Cancellation Request?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, cancel it!",
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire(
          "Cancelled!",
          "Appointment cancellation has been approved.",
          "success"
        );
        $.ajax({
          url: "database/myappointments/cancelAppointment.php",
          method: "post",
          data: { id: id },
          success: function (data) {
            load_data();
          },
        });
      }
    });
  });

  $(document).on("click", "#currentapp", function () {
    var pend = $(this);
    var appr = $("#cancelapp");

    appr.removeClass("btn-primary");
    appr.addClass("btn-outline-primary");
    pend.removeClass("btn-outline-primary");
    pend.addClass("btn-primary");
    appr.val("");
    pend.val("active");
    load_data();
  });

  $(document).on("click", "#cancelapp", function () {
    var pend = $("#currentapp");
    var appr = $(this);

    pend.removeClass("btn-primary");
    pend.addClass("btn-outline-primary");
    appr.removeClass("btn-outline-primary");
    appr.addClass("btn-primary");
    pend.val("");
    appr.val("active");
    load_data();
  });
});
