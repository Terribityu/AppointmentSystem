$(document).ready(function () {
  load_data();

  function load_data(search) {
    $.ajax({
      url: "database/instructors/display.php",
      method: "post",
      data: { search: search },
      success: function (data) {
        $("#displayInstructors tbody").html(data);
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

  $("#addInstructorModal").on("hidden.bs.modal", function () {
    $("#addInstructorForm")[0].reset();
  });

  $("#editInstructorModal").on("hidden.bs.modal", function () {
    $("#editInstructorForm")[0].reset();
  });

  $(document).on("click", "#addStud", function (e) {
    $("#addInstructorForm")[0].reset();
  });

  $("#addInstructorForm").on("submit", function (e) {
    e.preventDefault();
    var data = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "database/instructors/add.php",
      data: data,
      success: function (data) {
        console.log(data);
        $("#addInstructorModal").modal("hide");
        mySuccess(name + " successfully added.");
        load_data();
      },
      error: function (xhr, status, error) {
        $("body").html("<h1>" + xhr["status"] + " " + error + "</h1>");
      },
    });
  });

  $(document).on("click", "#editStud", function () {
    $("#editInstructorForm")[0].reset();
    var id = $(this).attr("value");
    $.ajax({
      type: "GET",
      url: "database/instructors/check.php?&id=" + id,
      dataType: "json",
      success: function (data) {
        $("#editInstructorForm [name='userID']").val(data["detail_ID"]);
        $("#editInstructorForm [name='firstname']").val(data["firstname"]);
        $("#editInstructorForm [name='middlename']").val(data["middlename"]);
        $("#editInstructorForm [name='lastname']").val(data["lastname"]);
        $("#editInstructorForm [name='suffix']").val(data["suffix"]);
        $("#editInstructorForm [name='address']").val(data["address"]);
        $("#editInstructorForm [name='dateofbirth']").val(data["dateofbirth"]);
        $("#editInstructorForm [name='age']").val(data["age"]);
        $("#editInstructorForm [name='gender']").val(data["gender"]);
        $("#editInstructorForm [name='civilstatus']").val(data["civilstatus"]);
        $("#editInstructorForm [name='zipcode']").val(data["zipcode"]);
        $("#editInstructorForm [name='mobilenumber']").val(data["number"]);
        $("#editInstructorForm [name='email']").val(data["email"]);
        $("#editInstructorModal").modal("show");
      },
      error: function (xhr, status, error) {
        $("body").html("<h1>" + xhr["status"] + " " + error + "</h1>");
      },
    });
  });

  $("#editInstructorForm").on("submit", function (e) {
    e.preventDefault();
    var data = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "database/instructors/edit.php",
      data: data,
      success: function (data) {
        console.log(data);
        $("#editInstructorModal").modal("hide");
        mySuccess(name + " successfully updated.");
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
        '<i class="fas fa-trash-alt"></i> Delete',
        "Confirm Deleting " + name + " ?",
        function () {
          $.ajax({
            type: "GET",
            url:
              "database/instructors/delete.php?deleteinstructor=true&id=" + id,
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
});
