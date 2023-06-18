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
    var checkUser = $(this).attr("data-old-value");

    if (checkUser < 3) {
      $.ajax({
        url: "database/pdc/check.php?schedID=" + schedID,
        method: "GET",
        success: function (result) {
          console.log(result);
          result = JSON.parse(result);
          vehicle = result.vehicle;
          data = result.info;
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
              "</p>",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Enroll",
          }).then((result) => {
            if (result.isConfirmed) {
              enrollStudent(schedID, vehicle);
            }
          });
        },
      });
    } else {
      Swal.fire(
        "Oops...",
        "You currently have pending/active PDC appointment",
        "info"
      );
    }
  });
  var vehforce = "none";

  function enrollStudent(schedID, vehicle) {
    (async () => {
      const { value: text } = await Swal.fire({
        title: "Create an Appointment",
        html:
          '<label for="title" class="d-flex justify-content-start">Title: <span id="form_required"></span></label>' +
          '<select id="swalEvtTitle" class="form-control mb-3" required name="swalEvtTitle" aria-label="Default select example">' +
          '<option selected value="PDC">Practical Driving Course</option>' +
          "</select>" +
          '<label for="vehicles" class="d-flex justify-content-start">Vehicles: <span id="form_required"></span></label>' +
          "<div class='form-check form-check-inline'>" +
          "<input class='form-check-input' type='checkbox' id='inlineCheckbox1' value='motorcycle'>" +
          "<label class='form-check-label' for='inlineCheckbox1'>Motorcycle</label>" +
          "</div>" +
          "<div class='form-check form-check-inline'>" +
          "<input class='form-check-input' type='checkbox' id='inlineCheckbox2' value='lightAT'>" +
          "<label class='form-check-label' for='inlineCheckbox2'>Light Vehicle(AT)</label>" +
          "</div>" +
          "<div class='form-check form-check-inline'>" +
          "<input class='form-check-input' type='checkbox' id='inlineCheckbox3' value='ligtMT'>" +
          "<label class='form-check-label' for='inlineCheckbox3'>Light Vehicle(MT)</label>" +
          "</div>" +
          '<label for="price" class="d-flex justify-content-start">Price: <span id="form_required"></span></label>' +
          '<input type="number" readonly id="price" name="price" value="0" placeholder="Price" class="form-control">',
        focusConfirm: false,
        showCancelButton: true,
        confirmButtonText: "Submit",
        preConfirm: () => {
          // Check if all fields are filled up
          const title = document.getElementById("swalEvtTitle").value;
          const price = document.getElementById("price").value;
          const checkboxes = document.querySelectorAll(
            'input[type="checkbox"]:checked'
          );

          if (!title || !price || checkboxes.length === 0) {
            Swal.showValidationMessage(
              "Please fill in all the required fields and select at least one checkbox"
            );
          } else {
            // Prepare the data to be sent
            const checkedValues = Array.from(checkboxes).reduce(
              (json, checkbox) => {
                json[checkbox.getAttribute("id")] = checkbox.value;
                return json;
              },
              {}
            );
            const data = {
              schedID: schedID,
              price: price,
              checkboxes: checkedValues,
            };

            return data;
          }
        },
      });

      if (text) {
        $.ajax({
          url: "database/pdc/enroll.php",
          method: "post",
          data: { data: text },
          success: function (data) {
            Swal.fire("Enrolled!", "You have successfuly enrolled.", "success");
            $("#inlineCheckbox2").prop("disabled", false);
            $("#inlineCheckbox3").prop("disabled", false);
            load_data();
          },
        });
      } else {
        Swal.fire({
          icon: "info",
          title: "Oops...",
          text: "Request has been cancelled",
        });
        // $("#inlineCheckbox2").prop("disabled", false);
        // $("#inlineCheckbox3").prop("disabled", false);
      }
    })();

    if (vehicle == "lightat") {
      $("#inlineCheckbox2").prop("disabled", true);
      vehforce = "lightat";
    } else if (vehicle == "lightmt") {
      $("#inlineCheckbox3").prop("disabled", true);
      vehforce = "lightmt";
    }
  }

  $(document).on("change", "#inlineCheckbox1", function () {
    var price = parseInt($("#price").val());
    if ($(this).is(":checked")) {
      // Checkbox has been checked
      $("#price").val(price + 1000);
    } else {
      // Checkbox has been unchecked
      $("#price").val(price - 1000);
    }
  });

  $(document).on("change", "#inlineCheckbox2", function () {
    var price = parseInt($("#price").val());
    if ($(this).is(":checked")) {
      // Checkbox has been checked
      $("#price").val(price + 4500);
      $("#inlineCheckbox3").prop("disabled", true);
    } else {
      // Checkbox has been unchecked
      $("#price").val(price - 4500);
      if (vehforce == "none") {
        $("#inlineCheckbox3").prop("disabled", false);
      }
    }
  });

  $(document).on("change", "#inlineCheckbox3", function () {
    var price = parseInt($("#price").val());
    if ($(this).is(":checked")) {
      // Checkbox has been checked
      $("#price").val(price + 4500);
      $("#inlineCheckbox2").prop("disabled", true);
    } else {
      // Checkbox has been unchecked
      $("#price").val(price - 4500);
      if (vehforce == "none") {
        $("#inlineCheckbox2").prop("disabled", false);
      }
    }
  });
});
