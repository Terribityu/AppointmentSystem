$(".service-tdc").click(function (e) {
  window.location.href = "./tdc.php";
});

$(".service-pdc").click(function (e) {
  window.location.href = "./pdc.php";
});

$(document).ready(function () {
  function mySuccess(success) {
    Swal.fire({
      position: "center",
      icon: "success",
      title: "Success",
      text: success,
      showConfirmButton: false,
      timer: 2000,
    });
  }

  function myError(error) {
    Swal.fire({
      position: "center",
      icon: "error",
      title: "Oops....",
      text: error,
      showConfirmButton: false,
      timer: 2000,
    });
  }
  // LOGIN FORM
  $("#loginForm").on("submit", function (e) {
    e.preventDefault();

    var currentPageURL = window.location.href;

    var data = $(this).serialize();
    console.log(data);
    $.ajax({
      type: "POST",
      url: "./database/registration/login.php",
      data: data,
      success: function (data) {
        if (data) {
          myError(data);
        } else {
          if (currentPageURL && currentPageURL !== "registration.php") {
            window.location.href = currentPageURL;
          } else {
            window.location.href = "index.php"; // Default redirect page
          }
        }
      },
      error: function (xhr, status, error) {
        $("body").html("<h1>" + xhr["status"] + " " + error + "</h1>");
        console.log(xhr, status, error);
      },
    });
  });

  // Check if the URL parameter is present and equals "true"
  var urlParams = new URLSearchParams(window.location.search);
  if (urlParams.has("openModal") && urlParams.get("openModal") === "true") {
    // Open the modal using JavaScript or jQuery
    // Example using jQuery:
    $("#loginModal").modal("show");
  }

  var sessionTimeout;

  function resetSessionTimeout() {
    clearTimeout(sessionTimeout);
    sessionTimeout = setTimeout(logout, 1800000); // 30 minutes in milliseconds
  }

  $(document).on("mousemove keydown click", function () {
    resetSessionTimeout();
  });

  function logout() {
    window.location.href = "database/registration/logout.php";
  }

  load_notif();

  function load_notif() {
    $.ajax({
      url: "database/webnotif.php",
      method: "post",
      success: function (data) {
        data = JSON.parse(data);
        if (data["key"]) {
          $("#notifIcon").html(data.total);
          $("#notifIcon1").html(data.total);
          if (data.notifcounter == 0) {
            alertify.success("You Have " + data["total"] + " Notification");
          }
        }
      },
    });
  }
});
