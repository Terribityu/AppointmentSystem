$(document).ready(function () {
  // Start of index Javascript

  load_feedbacks();

  function load_feedbacks() {
    $.ajax({
      url: "database/index/displayFeedbacks.php",
      success: function (data) {
        $(".feedback-slider").html(data);
      },
    });
  }

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

  $(".team-slider").owlCarousel({
    loop: true,
    nav: false,
    autoplay: true,
    autoplayTimeout: 5000,
    smartSpeed: 450,
    margin: 20,
    responsive: {
      0: {
        items: 1,
      },
      768: {
        items: 2,
      },
      991: {
        items: 3,
      },
      1200: {
        items: 3,
      },
      1920: {
        items: 3,
      },
    },
  });

  $("#contactform").on("submit", function (e) {
    e.preventDefault();
    var data = $(this).serialize();
    $.ajax({
      url: "database/index/contact.php",
      method: "post",
      data: data,
      success: function (data) {
        mySuccess("Thank you for messaging us, Well get back at you later!");
        $(this)[0].reset();
      },
    });
  });
});
