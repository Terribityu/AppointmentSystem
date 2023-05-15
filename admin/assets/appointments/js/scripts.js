$(document).ready(function () {
  load_data(); // Call the function every page ready. To Load all data of appointments

  function getStudentList() {
    // Function to get All Students
    $.ajax({
      url: "database/appointments/getStudent.php",
      method: "post",
      success: function (data) {
        $("#datalistOptions").html(data);
      },
    });
  }

  function getScheduleList() {
    // Function to get the List of Schedules
    $.ajax({
      url: "database/appointments/getSchedule.php",
      method: "post",
      success: function (data) {
        $("#scheduleList").html(data);
        $("#editAppointmentForm [name='schedules']").html(data);
      },
    });
  }
  function load_data(search) {
    // Function to get the list of appointments and print it on the table
    var pend = $("#pendingapp").val();
    // var appr = $('#approvedblogs').val();
    if (pend == "active") {
      // Select the status of what list the user wants to view (Pending, Rejected)
      stats = "pending";
    } else {
      stats = "rejected";
    }
    $.ajax({
      url: "database/appointments/display.php",
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

  function mySuccess(text) {
    // Sweet Alert for better Alert UI
    Swal.fire({
      position: "center",
      icon: "success",
      title: "Success",
      text: text,
      showConfirmButton: false,
      timer: 2000,
    });
  }

  $("#addAppointmentModal").on("hidden.bs.modal", function () {
    // Reset the form everytime the modal Close. So data won't stay after reopening the modal
    $("#addAppointmentForm")[0].reset();
  });

  $("#editAppointmentModal").on("hidden.bs.modal", function () {
    // Reset the form everytime the modal Close. So data won't stay after reopening the modal
    $("#editAppointmentForm")[0].reset();
  });

  $(document).on("click", "#addAppointment", function (e) {
    // Click Event Listenr for #addAppointment to populate the input in the modal
    $("#addAppointmentForm")[0].reset();
    getStudentList(); // Call The function to get student list
    getScheduleList(); // Call The Function to get schedule list
  });

  $("#addAppointmentForm").on("submit", function (e) {
    // Form Submit event listener, to process the data that the user input.
    e.preventDefault(); // Stop the Default form submission so the page wont reload.
    var data = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "database/appointments/add.php",
      data: data,
      success: function () {
        $("#addAppointmentModal").modal("hide");
        mySuccess(data.firstname + " successfully added."); // Call Sweetalert
        load_data(); // Call the function to update the table after adding new data.
      },
      error: function (xhr, status, error) {
        $("body").html("<h1>" + xhr["status"] + " " + error + "</h1>");
      },
    });
  });

  $(document).on("click", "#editAppointment", function () {
    $("#editAppointmentForm")[0].reset();
    getStudentList();
    getScheduleList();
    var id = $(this).attr("value");
    $.ajax({
      type: "GET",
      url: "database/appointments/check.php?&id=" + id,
      dataType: "json",
      success: function (data) {
        $("#editAppointmentForm [name='schedules']").val(data["scheduleID"]);
        $("#editAppointmentForm [name='studentDataList']").val(data["usersID"]);
        $("#editAppointmentForm [name='appointmentID']").val(
          data["appointmentID"]
        );
        $("#editAppointmentModal").modal("show");
      },
      error: function (xhr, status, error) {
        $("body").html("<h1>" + xhr["status"] + " " + error + "</h1>");
      },
    });
  });

  $("#editAppointmentForm").on("submit", function (e) {
    e.preventDefault();
    var data = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "database/appointments/edit.php",
      data: data,
      success: function (data) {
        console.log(data);
        $("#editAppointmentModal").modal("hide");
        mySuccess(name + " successfully updated.");
        load_data();
      },
      error: function (xhr, status, error) {
        $("body").html("<h1>" + xhr["status"] + " " + error + "</h1>");
        console.log(xhr, status, error);
      },
    });
  });

  $(document).on("click", "#deleteAppointment", function () {
    var id = $(this).attr("value");
    var name = $(this).attr("data-value");
    var sched = $(this).attr("old-value");
    console.log(sched);
    alertify
      .confirm(
        '<i class="fas fa-trash-alt"></i> Delete',
        "Confirm Deleting " + name + " ?",
        function () {
          $.ajax({
            type: "GET",
            url:
              "database/appointments/delete.php?schedID=" + sched + "&id=" + id,
            success: function () {
              mySuccess(name + " successfully deleted.");
              load_data();
            },
            error: function (xhr, status, error) {
              $("body").html("<h1>" + xhr["status"] + " " + error + "</h1>");
            },
          });
        },
        function () {}
      )
      .set({ transition: "zoom" })
      .show();
  });

  // Nav Button -- Accept | Reject | Pending
  $(document).on("click", "#approveAppointment", function () {
    var id = $(this).attr("value");
    var name = $(this).attr("data-value");
    alertify
      .confirm(
        '<i class="fas fa-check-circle"></i> Approve',
        "Approve " + name + " ?",
        function () {
          $.ajax({
            type: "GET",
            url:
              "database/appointments/status_up.php?id=" +
              id +
              "&stats=approved",
            success: function () {
              //
              window.location.href = "./enrollment.php";
            },
            error: function (xhr, status, error) {
              $("body").html("<h1>" + xhr["status"] + " " + error + "</h1>");
            },
          });
        },
        function () {}
      )
      .set({ transition: "zoom" })
      .show();
  });

  $(document).on("click", "#rejectAppointment", function () {
    var id = $(this).attr("value");
    var name = $(this).attr("data-value");
    var sched = $(this).attr("old-value");
    var pend = $("#pendingapp");
    var appr = $("#rejectapp");
    alertify
      .confirm(
        '<i class="fas fa-times-circle"></i> Reject',
        "Reject " + name + " ?",
        function () {
          $.ajax({
            type: "GET",
            url:
              "database/appointments/status_up.php?id=" +
              id +
              "&stats=rejected&schedID=" +
              sched,
            success: function (data) {
              pend.removeClass("btn-primary");
              pend.addClass("btn-outline-primary");
              appr.removeClass("btn-outline-primary");
              appr.addClass("btn-primary");
              pend.val("");
              appr.val("active");
              console.log(data);
              load_data();
            },
            error: function (xhr, status, error) {
              $("body").html("<h1>" + xhr["status"] + " " + error + "</h1>");
            },
          });
        },
        function () {}
      )
      .set({ transition: "zoom" })
      .show();
  });

  $(document).on("click", "#pendingapp", function () {
    var pend = $(this);
    var appr = $("#rejectapp");

    appr.removeClass("btn-primary");
    appr.addClass("btn-outline-primary");
    pend.removeClass("btn-outline-primary");
    pend.addClass("btn-primary");
    appr.val("");
    pend.val("active");
    load_data();
  });

  $(document).on("click", "#rejectapp", function () {
    var pend = $("#pendingapp");
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