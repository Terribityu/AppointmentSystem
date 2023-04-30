$(document).ready(function () {
  load_data();

  function load_data() {
    var userID = $("#user__id").val();
    $.ajax({
      url: "database/profile/display.php",
      method: "POST",
      data: { userID: userID },
      success: function (data) {
        data = JSON.parse(data);
        console.log(data.username);
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
    e.preventDefault();
  });
});
