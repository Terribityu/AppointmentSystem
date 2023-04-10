$(document).ready(function () {
  load_data();

  function load_data(search) {
    $.ajax({
      url: "database/enrollment/display.php",
      method: "post",
      data: { search: search },
      success: function (data) {
        $("#displayEnrollment tbody").html(data);
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

  function mySuccess(text) {
    Swal.fire({
      position: "center",
      icon: "success",
      title: "Success",
      text: text,
      showConfirmButton: false,
      timer: 2000,
    });
  }

  $(document).on("click", "#deleteEnrollment", function () {
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
              "database/enrollment/delete.php?schedID=" + sched + "&id=" + id,
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
  $(document).on("click", "#passRemarks", function () {
    var id = $(this).attr("value");
    var name = $(this).attr("data-value");
    alertify
      .confirm(
        '<i class="fas fa-check-circle"></i> Passed',
        "Passed " + name + " ?",
        function () {
          $.ajax({
            type: "GET",
            url:
              "database/enrollment/remarks_up.php?id=" + id + "&stats=passed",
            success: function () {
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

  $(document).on("click", "#failRemarks", function () {
    var id = $(this).attr("value");
    var name = $(this).attr("data-value");
    alertify
      .confirm(
        '<i class="fas fa-times-circle"></i> Failed',
        "Failed " + name + " ?",
        function () {
          $.ajax({
            type: "GET",
            url:
              "database/enrollment/remarks_up.php?id=" + id + "&stats=failed",
            success: function (data) {
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

  $(document).on("click", "#paymentStatus", function () {
    var id = $(this).attr("value");
    var name = $(this).attr("data-value");
    var price = $(this).attr("old-value");
    alertify
      .confirm(
        '<i class="fas fa-check-circle"></i> Payment Status',
        "Mark " + name + " as paid?",
        function () {
          $.ajax({
            type: "GET",
            url:
              "database/enrollment/payment_up.php?id=" +
              id +
              "&stats=paid&price=" +
              price,
            success: function () {
              mySuccess(name + " payment succesful!");
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
});
