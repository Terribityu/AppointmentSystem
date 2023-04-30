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

  $(document).on("click", "#selectSched", function (e) {
    e.preventDefault();
    var schedID = $(this).attr("value");
    var userID = $(this).attr("data-value");

    $.ajax({
      url: "database/pdc/check.php?schedID=" + schedID,
      method: "GET",
      success: function (data) {
        data = JSON.parse(data);
        var date = new Date(data["start"]);
        var formattedDate = date.toLocaleDateString("en-US", {
          year: "numeric",
          month: "long",
          day: "numeric",
        });
        Swal.fire({
          title: "Practical Driving Course",
          html:
            "<p>Instructor: " +
            data["firstname"] +
            " " +
            data["lastname"] +
            "</p><p>Date: " +
            formattedDate +
            "</p><p>Slots: " +
            data["slots"] +
            "</p><p>Price: " +
            data["price"] +
            "</p>",
          icon: "info",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Enroll",
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire("Enrolled!", "You have successfuly enrolled.", "success");
            enrollStudent(schedID, userID);
          }
        });
      },
    });
  });

  function enrollStudent(schedID, userID) {
    $.ajax({
      url: "database/pdc/enroll.php",
      method: "post",
      data: { schedID: schedID, userID: userID },
      success: function (data) {
        load_data();
      },
    });
  }
});
