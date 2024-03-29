$(document).ready(function () {
  load_data();

  function load_data(search) {
    $.ajax({
      url: "database/students/display.php",
      method: "post",
      data: { search: search },
      success: function (data) {
        $("#displayStudents tbody").html(data);
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

  $("#addStudentModal").on("hidden.bs.modal", function () {
    $("#addStudentForm")[0].reset();
  });

  $("#editStudentModal").on("hidden.bs.modal", function () {
    $("#editStudentForm")[0].reset();
  });

  $(document).on("click", "#addStud", function (e) {
    $("#addStudentForm")[0].reset();
  });

  $("#addStudentForm").on("submit", function (e) {
    e.preventDefault();
    var data = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "database/students/add.php",
      data: data,
      success: function (data) {
        $("#addStudentModal").modal("hide");
        mySuccess("Student successfully added.");
        load_data();
        sendEmail(data);
      },
      error: function (xhr, status, error) {
        $("body").html("<h1>" + xhr["status"] + " " + error + "</h1>");
      },
    });
  });

  function sendEmail(data) {
    var data = JSON.parse(data);
    $.ajax({
      type: "POST",
      url: "database/instructors/email.php",
      data: data,
      success: function (data) {
      },
    });
  }

  $(document).on("click", "#editStud", function () {
    $("#editStudentForm")[0].reset();
    var id = $(this).attr("value");
    $.ajax({
      type: "GET",
      url: "database/students/check.php?&id=" + id,
      dataType: "json",
      success: function (data) {
        $("#editStudentForm [name='userID']").val(data["userID"]);
        $("#editStudentForm [name='firstname']").val(data["firstname"]);
        $("#editStudentForm [name='middlename']").val(data["middlename"]);
        $("#editStudentForm [name='lastname']").val(data["lastname"]);
        $("#editStudentForm [name='suffix']").val(data["suffix"]);
        $("#editStudentForm [name='address']").val(data["address"]);
        $("#editStudentForm [name='dateofbirth']").val(data["dateofbirth"]);
        $("#editStudentForm [name='age']").val(data["age"]);
        $("#editStudentForm [name='gender']").val(data["gender"]);
        $("#editStudentForm [name='civilstatus']").val(data["civilstatus"]);
        $("#editStudentForm [name='zipcode']").val(data["zipcode"]);
        $("#editStudentForm [name='mobilenumber']").val(data["number"]);
        $("#editStudentForm [name='email']").val(data["email"]);
        $("#editStudentModal").modal("show");
      },
      error: function (xhr, status, error) {
        $("body").html("<h1>" + xhr["status"] + " " + error + "</h1>");
      },
    });
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

  $("#editStudentForm").on("submit", function (e) {
    e.preventDefault();
    var data = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "database/students/edit.php",
      data: data,
      success: function (data) {
        $("#editStudentModal").modal("hide");
        mySuccess("User successfully updated.");
        load_data();
      },
      error: function (xhr, status, error) {
        $("body").html("<h1>" + xhr["status"] + " " + error + "</h1>");
        console.log(xhr, status, error);
      },
    });
  });

  $(document).on("click", "#deleteStud", function () {
    var id = $(this).attr("value");
    var name = $(this).attr("data-value");
    alertify
      .confirm(
        '<i class="fas fa-trash-alt"></i> Archive',
        "Confirm add to Archive " + name + " ?",
        function () {
          $.ajax({
            type: "GET",
            url: "database/students/archive.php?id=" + id,
            success: function () {
              mySuccess(name + " Archive Success.");
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
