$(document).ready(function () {
  $("#registrationForm").validate(function () {
    $(this).on("submit", function (e) {
      e.preventDefault();
      $.ajax({
        type: "POST",
        url: "database/registration/register.php",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
          console.log(data);
          load_data();
        },
        error: function (xhr, status, error) {
          $("body").html("<h1>" + xhr["status"] + " " + error + "</h1>");
        },
      });
    });
  });

  $("#image").change(function () {
    const [file] = this.files;
    // var file = this.files[0];
    var fileType = file.type;
    var match = ["image/jpeg", "image/png", "image/jpg"];
    if (
      !(fileType == match[0] || fileType == match[1] || fileType == match[2])
    ) {
      alert("Sorry, JPG, JPEG, & PNG files are allowed to upload.");
      $("#image").val("");
      return false;
    }
    if (file) {
      $("#preview").css({ height: "250px", width: "400" });
      preview.src = URL.createObjectURL(file);
    }
  });

  $("#mobilenum").keyup(function () {
    var inputValue = $("#mobilenum").val().trim();
    if (inputValue.length == 10) {
      $("#otp").prop("disabled", false);
      $(this).removeClass("error");
    } else {
      $("#otp").prop("disabled", true);
    }
  });

  $("#otp").keyup(function () {
    var otp = $(this).val();
    $("#otp").addClass("error");

    $.ajax({
      url: "database/registration/setElement.php?verifyotp=" + otp,
      method: "GET",
      success: function (data) {
        if (data == true) {
          $("#otp").removeClass("error");
          $("#mobilenum").attr("readonly", "");
          return true;
        } else {
          $("#mobilenum").removeAttr("readonly");
          return false;
        }
      },
    });
  });

  var timerId;

  $(document).on("click", ".sendotp", function (e) {
    e.preventDefault();
    var inputValue = $("#mobilenum").val().trim();
    if (inputValue.length != 10) {
      $("#mobilenum").addClass("error");
      $("#id_number_error").text("Mobile number should be 10 characters.");
    } else {
      $("#mobilenum").attr("readonly", true);
      number = $("#mobilenum").val();
      $("#id_number_error").text("");
      $("#sendotp").removeClass("sendotp");
      timerId = setInterval(countdown, 1000);
      $.ajax({
        url: "database/registration/otp.php",
        method: "post",
        data: { number: number },
        success: function (data) {
          console.log(data);
        },
      });
    }
  });
  var timeLeft = 60;

  $(document).on("click", ".resendotp", function (e) {
    e.preventDefault();
    var inputValue = $("#mobilenum").val().trim();
    if (inputValue.length != 10) {
      $("#mobilenum").addClass("errorClass");
    } else {
      number = $("#mobilenum").val();
      timeLeft = 60;
      clearTimeout(timerId);
      timerId = setInterval(countdown, 1000);
      $.ajax({
        url: "database/registration/otp.php",
        method: "post",
        data: { number: number },
        success: function (data) {
          console.log(data);
        },
      });
    }
  });

  function countdown() {
    if (timeLeft == -1) {
      clearTimeout(timerId);
      $("#sendotp").html(
        'Resend verification: <a id="resendotp" class="resendotp" href>here</a>'
      );
    } else {
      $("#sendotp").removeAttr("href");
      $("#sendotp").html("Resend verification: " + timeLeft);
      timeLeft--;
    }
  }
});
