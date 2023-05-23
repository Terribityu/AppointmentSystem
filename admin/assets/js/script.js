$(document).ready(function () {
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

  load_notif();

  function load_notif() {
    $.ajax({
      url: "database/smsnotification/webnotif.php",
      method: "post",
      success: function (data) {
        if (data) {
          data = JSON.parse(data);
          console.log(data.data["firstname"]);

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
