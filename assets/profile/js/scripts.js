$(document).ready(function () {
  load_data();

  $("#editForm").validate({
    rules: {
      password: {
        required: true,
      },
      password_cnf: {
        required: true,
        equalTo: "#editForm [name='password']",
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
      oldpassword: {
        required: true,
        remote: {
          url: "database/registration/setElement.php",
          type: "GET",
          data: {
            verifyoldpass: function () {
              return $("#editForm [name='oldpassword']").val();
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
            checkedituser: function () {
              return $("#editForm [name='username']").val();
            },
          },
        },
      },
    },
    messages: {
      password: {
        required: "Please enter a new password",
      },
      password_cnf: {
        required: "Please confirm your new password",
        equalTo: "Passwords do not match",
      },
      emailotp: {
        required: "Please enter the OTP",
        remote: "Invalid OTP",
      },
      oldpassword: {
        required: "Please enter your old password",
        remote: "Invalid old password",
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
        url: "database/profile/update.php",
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
          mySuccess("Account Successfuly Updated!");
          // console.log(data);
          // setTimeout(function () {
          //   // Redirect to the desired location
          //   window.location.href = "index.php?openModal=true";
          // }, 2000); // 2000 milliseconds = 2 seconds
        },
        error: function (xhr, status, error) {
          $("body").html("<h1>" + xhr["status"] + " " + error + "</h1>");
        },
      });
    },
  });

  function load_data() {
    var userID = $("#user__id").val();
    $.ajax({
      url: "database/profile/display.php",
      method: "POST",
      data: { userID: userID },
      success: function (data) {
        data = JSON.parse(data);
        $("#profile__img").attr("src", data.avatar);
        $("#fullname__text").html(data.firstname + " " + data.lastname);
        $("#name__text").html(data.firstname + " " + data.lastname);
        $("#profile__edit").val(data.userID);
        $("#address__text").html(data.address);
        $("#birthday__text").html(data.birthday);
        $("#gender__text").html(data.gender);
        $("#civil__text").html(data.civilstatus);
        $("#username__text").html(data.username);
        $("#number__text").html("+63" + data.number);
        $("#email__text").html(data.email);
      },
    });
  }

  $(document).on("click", "#profile__edit", function (e) {
    var id = $(this).val();

    $.ajax({
      url: "database/profile/getInfo.php",
      method: "POST",
      data: { userID: id },
      success: function (data) {
        data = JSON.parse(data);
        console.log(data);
        $("#editForm [name='userID']").val(id);
        $("#editForm [name='firstname']").val(data["firstname"]);
        $("#editForm [name='middlename']").val(data["middlename"]);
        $("#editForm [name='lastname']").val(data["lastname"]);
        $("#editForm [name='suffix']").val(data["suffix"]);
        $("#editForm [name='address']").val(data["address"]);
        $("#editForm [name='dateofbirth']").val(data["dateofbirth"]);
        $("#editForm [name='age']").val(data["age"]);
        $("#editForm [name='gender']").val(data["gender"]);
        $("#editForm [name='civilstatus']").val(data["civilstatus"]);
        $("#editForm [name='zipcode']").val(data["zipcode"]);
        $("#editForm [name='mobilenumber']").val(data["number"]);
        $("#editForm [name='email']").val(data["email"]);
        $("#editForm [name='username']").val(data["username"]);
        $("#editProfileModal").modal("show");
      },
    });
  });

  var timerId;

  $(document).on("click", ".sendotp", function (e) {
    e.preventDefault();
    var inputValue = $("#editAccountInfo [name='mobilenumber']").val().trim();
    if (inputValue.length != 10) {
      // $("#editAccountInfo [name='mobilenumber']").addClass("error");
      // $("#id_number_error").text("Mobile number should be 10 characters.");
    } else {
      $("#editAccountInfo [name='mobilenumber']").attr("readonly", true);
      $("#editAccountInfo [name='emailotp']").attr("readonly", false);
      number = $("#editAccountInfo [name='mobilenumber']").val();
      $("#id_number_error").text("");
      $("#sendotp").removeClass("sendotp");
      timerId = setInterval(countdown, 1000);
      $.ajax({
        url: "../database/registration/otp.php",
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
    var inputValue = $("#editAccountInfo [name='mobilenumber']").val().trim();
    if (inputValue.length != 10) {
      $("#editAccountInfo [name='mobilenumber']").addClass("errorClass");
    } else {
      number = $("#editAccountInfo [name='mobilenumber']").val();
      timeLeft = 60;
      clearTimeout(timerId);
      timerId = setInterval(countdown, 1000);
      $.ajax({
        url: "../database/registration/otp.php",
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

  $("#mobilenum").keyup(function () {
    var inputValue = $("#mobilenum").val().trim();
    if (inputValue.length == 10) {
      $("#otp").prop("disabled", false);
      $(this).removeClass("error");
    } else {
      $("#otp").prop("disabled", true);
    }
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
});
