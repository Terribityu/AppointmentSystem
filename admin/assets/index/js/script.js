$(document).ready(function () {
  load_data();

  function load_data() {
    $.ajax({
      url: "database/index/display.php",
      method: "post",
      success: function (data) {
        data = JSON.parse(data);
        $("#instructorcount").html(data.instructor);
        $("#studentcount").html(data.student);
        $("#incometotal").html(data.income);
        $("#myappointmentstotal").html(data.myappoint);
        $("#appointmentstotal").html(data.appoint);
      },
    });
  }
});
