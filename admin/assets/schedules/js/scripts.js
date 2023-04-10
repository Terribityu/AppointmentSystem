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
    console.log(id);
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
        title: "Add Event",
        html:
          '<label for="title" class="d-flex justify-content-start">Title: <span id="form_required"></span></label>' +
          '<select id="swalEvtTitle" class="form-control mb-3" required name="swalEvtTitle" aria-label="Default select example">' +
          '<option value="PDC">PDC</option>' +
          '<option value="TDC">TDC</option>' +
          "</select>" +
          '<label for="time" class="d-flex justify-content-start">Time: <span id="form_required"></span></label>' +
          '<input id="swalEvtTime" type="time" class="form-control mb-3" required placeholder="Enter URL">' +
          '<label for="price" class="d-flex justify-content-start">Price: <span id="form_required"></span></label>' +
          '<input id="swalEvtPrice" name="price" type="number" class="form-control mb-3" required placeholder="Enter Price">' +
          '<label for="instructor" class="d-flex justify-content-start">Instructor: <span id="form_required"></span></label>' +
          '<select id="swalEvtInstructor" class="form-control mb-3" name="instructor" aria-label="Default select example">' +
          "<option selected value=1>Johny</option>" +
          "<option value=2>Yes PAPA</option>" +
          "</select>",
        focusConfirm: false,
        preConfirm: () => {
          return [
            document.getElementById("swalEvtTitle").value,
            document.getElementById("swalEvtTime").value,
            document.getElementById("swalEvtPrice").value,
            document.getElementById("swalEvtInstructor").value,
          ];
        },
      });

      if (formValues) {
        // Add EVent
        console.log(JSON.stringify(formValues));
        fetch("./database/schedules/eventHandler.php", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({
            request_type: "addEvent",
            start: start.startStr,
            end: start.endStr,
            event_data: formValues,
          }),
        })
          .then((response) => response.json())
          .then((data) => {
            if (data.status == 1) {
              Swal.fire("Event added successfully!", "", "success");
            } else {
              Swal.fire(data.error, "", "error");
            }

            // Refetch events from all sources and rerender
            calendar.refetchEvents();
          })
          .catch(console.error);
      }
    },
    eventClick: function (info) {
      info.jsEvent.preventDefault();
      // Change border color
      getInstructorName(info.event.extendedProps.userID);
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
          fetch("./database/schedules/eventHandler.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({
              request_type: "deleteEvent",
              event_id: info.event.id,
            }),
          })
            .then((response) => response.json())
            .then((data) => {
              if (data.status == 1) {
                Swal.fire("Event deleted successfully!", "", "success");
              } else {
                Swal.fire(data.error, "", "error");
              }

              // Refetch events from all sources and rerender
              calendar.refetchEvents();
            })
            .catch(console.error);
        } else {
          Swal.close();
        }
      });
    },
  });

  calendar.render();
});
