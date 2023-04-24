$(document).ready(function () {
  load_data();

  function load_data(search) {
    $.ajax({
      url: "database/pdc/display.php",
      method: "post",
      data: { search: search },
      success: function (data) {
        $("#schedlist").html(data);
      },
    });
  }
});
