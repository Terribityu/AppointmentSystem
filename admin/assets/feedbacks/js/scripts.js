$(document).ready(function () {
  load_data(); // Call the function every page ready. To Load all data of feedbacks

  function load_data(search) {
    // Function to get the list of feedbacks and print it on the table
    var pend = $("#pendingfeed").val();
    var appr = $("#approvedfeed").val();
    // var appr = $('#approvedblogs').val();
    if (pend == "active") {
      // Select the status of what list the user wants to view (Pending, Rejected)
      stats = "pending";
    } else if (appr == "active") {
      stats = "approved";
    } else {
      stats = "rejected";
    }
    $.ajax({
      url: "database/feedbacks/display.php",
      method: "post",
      data: { search: search, stats: stats },
      success: function (data) {
        $("#displayFeedbacks tbody").html(data); // Populate the tbody of displayfeedbacks Table with data gathered from database
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

  $("#feedbacksModal").on("hidden.bs.modal", function () {
    // Reset the form everytime the modal Close. So data won't stay after reopening the modal
    $("#tinyform")[0].reset();
  });

  $("#tinyform").on("submit", function (e) {
    // Form Submit event listener, to process the data that the user input.
    e.preventDefault(); // Stop the Default form submission so the page wont reload.
    var data = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "database/feedbacks/add.php",
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

  $(document).on("click", "#deleteAppointment", function () {
    var id = $(this).attr("value");
    var name = $(this).attr("data-value");
    var sched = $(this).attr("old-value");
    console.log(sched);
    alertify
      .confirm(
        '<i class="fas fa-trash-alt"></i> Archive',
        "Confirm Add to Archive " + name + " ?",
        function () {
          $.ajax({
            type: "GET",
            url:
              "database/feedbacks/archive.php?schedID=" + sched + "&id=" + id,
            success: function () {
              mySuccess(name + " Archived Success!.");
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
  $(document).on("click", "#approveFeedback", function () {
    var id = $(this).attr("value");
    var name = $(this).attr("data-value");
    var pend = $("#pendingfeed");
    var rej = $("#rejectfeed");
    var appr = $("#approvedfeed");
    alertify
      .confirm(
        '<i class="fas fa-check-circle"></i> Approve',
        "Approve " + name + " ?",
        function () {
          $.ajax({
            type: "GET",
            url:
              "database/feedbacks/status_up.php?id=" + id + "&stats=approved",
            success: function () {
              pend.removeClass("btn-primary");
              pend.addClass("btn-outline-primary");
              rej.removeClass("btn-primary");
              rej.addClass("btn-outline-primary");
              appr.removeClass("btn-outline-primary");
              appr.addClass("btn-primary");
              pend.val("");
              appr.val("active");
              mySuccess("Feedback Approved!");
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

  $(document).on("click", "#rejectFeedback", function () {
    var id = $(this).attr("value");
    var name = $(this).attr("data-value");
    var pend = $("#pendingfeed");
    var rej = $("#rejectfeed");
    var appr = $("#approvedfeed");
    alertify
      .confirm(
        '<i class="fas fa-times-circle"></i> Reject',
        "Reject " + name + " ?",
        function () {
          $.ajax({
            type: "GET",
            url:
              "database/feedbacks/status_up.php?id=" + id + "&stats=rejected",
            success: function (data) {
              pend.removeClass("btn-primary");
              pend.addClass("btn-outline-primary");
              appr.removeClass("btn-primary");
              appr.addClass("btn-outline-primary");
              rej.removeClass("btn-outline-primary");
              rej.addClass("btn-primary");
              pend.val("");
              rej.val("active");
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

  $(document).on("click", "#pendingfeed", function () {
    var pend = $(this);
    var rej = $("#rejectfeed");
    var appr = $("#approvedfeed");

    appr.removeClass("btn-primary");
    appr.addClass("btn-outline-primary");
    rej.removeClass("btn-primary");
    rej.addClass("btn-outline-primary");
    pend.removeClass("btn-outline-primary");
    pend.addClass("btn-primary");
    appr.val("");
    rej.val("");
    pend.val("active");
    load_data();
  });

  $(document).on("click", "#rejectfeed", function () {
    var pend = $("#pendingfeed");
    var appr = $("#approvedfeed");
    var rej = $(this);

    pend.removeClass("btn-primary");
    pend.addClass("btn-outline-primary");
    appr.removeClass("btn-primary");
    appr.addClass("btn-outline-primary");
    rej.removeClass("btn-outline-primary");
    rej.addClass("btn-primary");
    pend.val("");
    appr.val("");
    rej.val("active");
    load_data();
  });

  $(document).on("click", "#approvedfeed", function () {
    var pend = $("#pendingfeed");
    var rej = $("#rejectfeed");
    var appr = $(this);

    pend.removeClass("btn-primary");
    pend.addClass("btn-outline-primary");
    rej.removeClass("btn-primary");
    rej.addClass("btn-outline-primary");
    appr.removeClass("btn-outline-primary");
    appr.addClass("btn-primary");
    pend.val("");
    rej.val("");
    appr.val("active");
    load_data();
  });
});
