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

$(".service-tdc").click(function (e) {
  window.location.href = "./tdc.php";
});

$(".service-pdc").click(function (e) {
  window.location.href = "./pdc.php";
});
