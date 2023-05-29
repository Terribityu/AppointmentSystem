$(document).ready(function () {
  // $("#registrationForm").validate({
  //   submitHandler: function (form) {
  //     $.ajax({
  //       type: "POST",
  //       url: "database/registration/register.php",
  //       data: new FormData(form),
  //       contentType: false,
  //       cache: false,
  //       processData: false,
  //       success: function (data) {
  //         console.log(data);
  //         load_data();
  //       },
  //       error: function (xhr, status, error) {
  //         $("body").html("<h1>" + xhr["status"] + " " + error + "</h1>");
  //       },
  //     });
  //   },
  // });

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

  $("#registrationForm").validate({
    rules: {
      password: {
        required: true,
      },
      password_cnf: {
        required: true,
        equalTo: "#registrationForm [name='password']",
      },
      emailotp: {
        required: true,
        remote: {
          url: "database/registration/setElement.php",
          type: "GET",
          data: {
            verifyotp: function () {
              return $("#otp").val();
            },
          },
        },
      },
      username: {
        required: true,
        remote: {
          url: "database/registration/setElement.php",
          type: "GET",
          data: {
            checkuser: function () {
              return $("#registrationForm [name='username']").val();
            },
          },
        },
      },
    },
    messages: {
      password: {
        required: "Please enter a password",
      },
      password_cnf: {
        required: "Please confirm your password",
        equalTo: "Passwords do not match",
      },
      emailotp: {
        required: "Please enter the OTP",
        remote: "Invalid OTP",
      },
      username: {
        required: "This field is required.",
        remote: "Username Already Exist!",
      },
    },
    submitHandler: function (form, event) {
      event.preventDefault();

      var formData = new FormData(form);

      var imageFile = $("#image")[0].files[0];
      formData.append("image", imageFile);

      $.ajax({
        type: "POST",
        url: "database/registration/register.php",
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
          mySuccess("Successfully Registered");
          console.log(data);
          setTimeout(function () {
            // Redirect to the desired location
            window.location.href = "index.php?openModal=true";
          }, 2000); // 2000 milliseconds = 2 seconds
        },
        error: function (xhr, status, error) {
          $("body").html("<h1>" + xhr["status"] + " " + error + "</h1>");
        },
      });
    },
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

  // $("#otp").keyup(function () {
  //   var otp = $(this).val();
  //   $("#otp").addClass("error");

  //   $.ajax({
  //     url: "database/registration/setElement.php?verifyotp=" + otp,
  //     method: "GET",
  //     success: function (data) {
  //       if (data == true) {
  //         $("#otp").removeClass("error");
  //         $("#mobilenum").attr("readonly", "");
  //         return true;
  //       } else {
  //         $("#mobilenum").removeAttr("readonly");
  //         return false;
  //       }
  //     },
  //   });
  // });

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
        method: "GET",
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

  // $("#password_cnf").keyup(function () {
  //   const pass = $("#registrationForm [name='password']").val();
  //   var pass_cnf = $(this).val();
  //   var errorContainer = $("#password_cnf_error"); // Container for the error message

  //   if (pass === pass_cnf) {
  //     // Passwords match
  //     errorContainer.hide(); // Hide the error message
  //   } else {
  //     // Passwords do not match
  //     errorContainer.text("Passwords do not match").show(); // Show the error message with the appropriate text
  //   }
  // });
});
