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
    var rememberMe = document.querySelector('input[name="remember"]').checked;
    var username = $("#loginForm [name='username']").val();
    var password = $("#loginForm [name='password']").val();

    if (rememberMe) {
      localStorage.setItem("username", username);
      localStorage.setItem("password", password);
    }

    var data = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "./database/registration/login.php",
      data: data,
      success: function (data) {
        if (data) {
          myError(data);
        } else {
          if (currentPageURL && currentPageURL !== "registration.php") {
            var cleanUrl = currentPageURL.split("?")[0];
            window.location.href = cleanUrl;
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

  $(document).on("click", "#showPasswordToggle", function () {
    var passwordInput = $("#password");
    var passwordFieldType = passwordInput.attr("type");

    // Toggle the password field type between "password" and "text"
    if (passwordFieldType === "password") {
      passwordInput.attr("type", "text");
      $("#showPasswordToggle").removeClass("fa-eye").addClass("fa-eye-slash");
    } else {
      passwordInput.attr("type", "password");
      $("#showPasswordToggle").removeClass("fa-eye-slash").addClass("fa-eye");
    }
  });

  $(document).on("click", "#btn_login", function (e) {
    e.preventDefault();
    var storedUsername = localStorage.getItem("username");
    var storedPassword = localStorage.getItem("password");

    if (storedUsername && storedPassword) {
      // Auto-fill the login form with stored credentials
      $("#loginForm [name='username']").val(storedUsername);
      $("#loginForm [name='password']").val(storedPassword);
    }

    $("#loginModal").modal("show");
  });

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

  $("#resetForm").on("submit", function (e) {
    e.preventDefault();

    var data = $(this).serialize();
    console.log(data);
    $.ajax({
      url: "database/registration/resetpassword.php",
      method: "post",
      data: data,
      success: function (data) {
        console.log(data);
        if (data != "error") {
          $("#resetModal").modal("hide");
          Swal.fire({
            icon: "success",
            title: "Recovery Email has been sent.",
            text: "Please Check your email for more information.",
            showConfirmButton: false,
            timer: 1500,
          });
        } else {
          Swal.fire({
            icon: "error",
            title: "Couldnt Reset Password...",
            text: "The email is not yet registered.",
          });
        }
      },
    });
  });
});
