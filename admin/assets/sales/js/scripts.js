let totalPages = 0;
let search = "";
let currentPage = 1;
$(document).ready(function () {
  load_data(currentPage, search);
  getStudentList();
  function getStudentList() {
    // Function to get All Students
    $.ajax({
      url: "database/sales/getInstructors.php",
      method: "post",
      success: function (data) {
        $("#instructFilter").html(data);
      },
    });
  }

  $(document).on("change", "#instructFilter", function () {
    load_data(currentPage, search);
  });

  $(document).on("change", "#typeFilter", function () {
    load_data(currentPage, search);
  });

  function load_data(page, search) {
    var duration = $("#salesFilter").val();
    var instructor = $("#instructFilter").val();
    var type = $("#typeFilter").val();
    currentPage = page; // Update current page
    $.ajax({
      url: "database/sales/display.php",
      type: "GET",
      data: {
        page: page,
        query: search,
        duration: duration,
        instruct: instructor,
        type: type,
      },
      dataType: "json",
      success: function (response) {
        updateTable(response.data); // Update table
        // update status ng button sa baba ng table kung magiging disabled o hindi
        total_pages = response.pagination.total_pages;

        if (response.pagination.current_page == 1) {
          $("#prev").attr("disabled", true);
        } else {
          $("#prev").attr("disabled", false);
        }

        if (
          response.pagination.current_page == response.pagination.total_pages ||
          response.pagination.total_pages == 0
        ) {
          $("#next").attr("disabled", true);
        } else {
          $("#next").attr("disabled", false);
        }
      },
      error: function (xhr, status, error) {
        console.log(xhr.responseText); // Display error message in console
      },
    });
  }

  // function na gagamitin sa pag update ng table
  function updateTable(data) {
    var tableBody = document.getElementById("table-body");

    if (tableBody == null) return;

    if (data.length == 0) {
      tableBody.innerHTML =
        "<tr><td colspan='8' class='text-center'>No Records Found</td></tr>";
      return;
    }

    tableBody.innerHTML = ""; // Clear table body

    data.forEach(function (record) {
      const { title, price_s, start, date } = record;

      const tableRow = document.createElement("tr");

      tableRow.innerHTML = `
      <td>${title}</td>
      <td class="d-none d-sm-table-cell">${price_s}</td>
      <td>${start}</td>
      <td class="d-none d-lg-table-cell">${date}</td>
      `;

      tableBody.appendChild(tableRow);
    });
  }

  function previousPage() {
    if (currentPage > 1) {
      load_data(currentPage - 1, search);
      $("#cur__page").html(currentPage);
    }
  }

  // function na gagamitin sa pag update ng page ng table
  function nextPage() {
    if (currentPage < total_pages) {
      load_data(currentPage + 1, search);
      $("#cur__page").html(currentPage);
    }
  }

  // event listeners  para sa pagination button
  $("#prev").on("click", function () {
    previousPage();
  });

  $("#next").on("click", function () {
    nextPage();
  });

  $("#search_text").keyup(function () {
    var search = $(this).val();
    if (search != "") {
      load_data(currentPage, search);
    } else {
      load_data();
    }
  });

  $(document).on("change", "#salesFilter", function () {
    load_data(currentPage, search);
  });

  $(document).on("click", "#generatereport", function () {
    var duration = $("#salesFilter").val();
    var instructor = $("#instructFilter").val();
    var type = $("#typeFilter").val();
    window.location.href =
      "database/sales/generateReport.php?duration=" +
      duration +
      "&instruct=" +
      instructor +
      "&type=" +
      type;
  });
});
