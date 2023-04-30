$(document).ready(function () {
  $("#loginform").on("submit", function (e) {
    e.preventDefault();
    var data = $(this).serialize();
    console.log(data);
    $.ajax({
      type: "POST",
      url: "./database/login/login.php",
      data: data,
      success: function (data) {
        if (data) {
          alertify
            .confirm(
              '<i class="fas fa-exclamation-triangle"></i> Login',
              data,
              function () {},
              function () {}
            )
            .set({ transition: "zoom" })
            .show();
        } else {
          window.location.href = "login.php";
        }
      },
      error: function (xhr, status, error) {
        $("body").html("<h1>" + xhr["status"] + " " + error + "</h1>");
        console.log(xhr, status, error);
      },
    });
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
    window.location.href = "database/login/logout.php"; // Replace with your logout page URL
  }
});
