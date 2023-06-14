document.addEventListener("DOMContentLoaded", function () {
  function selectInstructName() {
    $.ajax({
      url: "database/schedules/selectInstructor.php",
      method: "post",
      success: function (data) {
        $("#swalEvtInstructor").html(data);
      },
    });
  }

  function getInstructorName(id) {
    $.ajax({
      type: "GET",
      url: "./database/schedules/check.php?id=" + id,
      dataType: "json",
      success: function (data) {
        $("#instructName").html(data["firstname"] + " " + data["lastname"]);
      },
    });
  }

  var calendarEl = document.getElementById("calendar");

  var calendar = new FullCalendar.Calendar(calendarEl, {
    validRange: {
      start: new Date(),
    },
    initialView: "dayGridMonth",
    height: 650,
    events: "./database/schedules/fetchEvents.php",

    selectable: true,
    select: async function (start, end, allDay) {
      selectInstructName();
      const { value: formValues } = await Swal.fire({
        title: "Add Schedule",
        html:
          '<label for="title" class="d-flex justify-content-start">Title: <span id="form_required"></span></label>' +
          '<select id="swalEvtTitle" class="form-control mb-3" required name="swalEvtTitle" aria-label="Default select example">' +
          '<option selected value="PDC">Practical Driving Course</option>' +
          '<option value="TDC">Theoretical Driving Course</option>' +
          "</select>" +
          '<label for="time" class="d-flex justify-content-start">Time: <span id="form_required"></span></label>' +
          '<select id="swalEvtTime" class="form-control mb-3" required name="swalEvtTime" aria-label="Default select example">' +
          '<option value="8:00 AM">8:00 AM</option>' +
          '<option value="8:00 AM - 12:00 PM">8:00 AM - 12:00 PM</option>' +
          '<option value="1:00 PM - 5:00 PM">1:00 PM - 5:00 PM</option>' +
          "</select>" +
          "<div id='divSession' style='display: none;'>" +
          '<label for="swalEvtSession" class="d-flex justify-content-start">Session: <span id="form_required"></span></label>' +
          '<select id="swalEvtSession" class="form-control mb-3" required name="swalEvtSession" aria-label="Default select example">' +
          '<option slected value="first">First Session</option>' +
          '<option value="second">Second Session</option>' +
          "</select>" +
          "</div>" +
          "<div id='divPrice' style='display: none;'>" +
          '<label for="price" class="d-flex justify-content-start">Price: <span id="form_required"></span></label>' +
          '<input id="swalEvtPrice" value="0" name="price" type="price" class="form-control mb-3" required placeholder="Enter Price">' +
          "</div>" +
          '<label for="instructor" class="d-flex justify-content-start">Instructor: <span id="form_required"></span></label>' +
          '<select id="swalEvtInstructor" class="form-control mb-3" name="instructor" aria-label="Default select example">' +
          "<option selected value=1>Johny</option>" +
          "<option value=2>Yes PAPA</option>" +
          "</select>",
        focusConfirm: false,
        showCancelButton: true,
        confirmButtonText: "Submit",
        preConfirm: () => {
          const swalEvtTitle = $("#swalEvtTitle").val();
          const swalEvtTime = $("#swalEvtTime").val();
          const swalEvtPrice = $("#swalEvtPrice").val();
          const swalEvtInstructor = $("#swalEvtInstructor").val();
          const swalEvtSession = $("#swalEvtSession").val();

          if (
            swalEvtTitle.trim() === "" ||
            swalEvtTime.trim() === "" ||
            swalEvtPrice.trim() === "" ||
            swalEvtSession.trim() === "" ||
            swalEvtInstructor.trim() === ""
          ) {
            swal.showValidationMessage("Please fill in all fields");
          } else {
            return [
              document.getElementById("swalEvtTitle").value,
              document.getElementById("swalEvtTime").value,
              document.getElementById("swalEvtPrice").value,
              document.getElementById("swalEvtInstructor").value,
              document.getElementById("swalEvtSession").value,
            ];
          }
        },
      });

      if (formValues) {
        // Add EVent
        $.ajax({
          url: "./database/schedules/eventHandler.php",
          method: "POST",
          // headers: { "Content-Type": "application/json" },
          data: {
            request_type: "addEvent",
            start: start.startStr,
            end: start.endStr,
            event_data: formValues,
          },
          success: function (data) {
            data = JSON.parse(data);
            if (data.status == 1) {
              Swal.fire("Event added successfully!", "", "success");
            } else {
              Swal.fire(data.error, "", "error");
            }

            // Refetch events from all sources and rerender
            calendar.refetchEvents();
          },
        });
      }
    },
    eventClick: function (info) {
      info.jsEvent.preventDefault();
      // Change border color
      getInstructorName(info.event.extendedProps.instructorID);
      const startDate = new Date(info.event.start);
      const dateString = startDate.toLocaleDateString();
      info.el.style.bordercolor = "red";
      Swal.fire({
        title: info.event.title,
        icon: "info",
        html:
          "<p> Instructor: <span id='instructName'>" +
          info.event.extendedProps.userID +
          "</span></p>" +
          "<p> Date: <span>" +
          dateString +
          "</span></p>" +
          "<p> Time: <span>" +
          info.event.extendedProps.time +
          "</span></p>" +
          "<p> Slots: <span>" +
          info.event.extendedProps.slots +
          "</span></p>",
        showCloseButton: true,
        showCancelButton: true,
        cancelButtonText: "Close",
        confirmButtonText: "Delete Event",
      }).then((result) => {
        if (result.isConfirmed) {
          // Delete Event
          $.ajax({
            url: "./database/schedules/eventHandler.php",
            method: "POST",
            data: {
              request_type: "deleteEvent",
              event_id: info.event.id,
            },
            success: function (data) {
              data = JSON.parse(data);
              if (data.status == 1) {
                Swal.fire("Event deleted successfully!", "", "success");
              } else {
                Swal.fire(data.error, "", "error");
              }

              // Refetch events from all sources and rerender
              calendar.refetchEvents();
            },
          });
        } else {
          Swal.close();
        }
      });
    },
  });

  calendar.render();
  $(document).on("change", "#swalEvtTitle", function () {
    // Handle the change event
    var selectedValue = $(this).val();
    if (selectedValue == "TDC") {
      $("#divPrice").show();
      $("#divSession").show();
    } else {
      $("#divPrice").hide();
      $("#divSession").hide();
    }
  });
});
