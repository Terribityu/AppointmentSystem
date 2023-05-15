$(document).ready(function () {
  // Function to check the database
  function checkDatabase() {
    // Perform AJAX request to check the database
    $.ajax({
      type: "POST",
      url: "database/smsnotification/check_database.php", // Replace with the actual PHP file to handle the database check
      success: function (response) {
        // Handle the response from the server
        console.log("Database check successful");
        console.log(response);
        // Additional logic or actions based on the response
      },
      error: function (xhr, status, error) {
        console.log("Database check failed");
        console.log(error);
      },
    });
  }

  // Schedule the checkDatabase function to run every day at 6:00 am
  function scheduleDatabaseCheck() {
    // Get the current date and time
    var now = new Date();
    // Set the target time for the check to 6:00 am
    var targetTime = new Date(
      now.getFullYear(),
      now.getMonth(),
      now.getDate(),
      6,
      0,
      0
    );
    // Calculate the delay until the next 6:00 am
    var delay = targetTime - now;
    // If the delay is negative, set it to the delay until tomorrow's 6:00 am
    if (delay < 0) {
      delay += 24 * 60 * 60 * 1000; // 24 hours in milliseconds
    }

    // Schedule the checkDatabase function to run after the delay
    setTimeout(function () {
      checkDatabase(); // Perform the initial check immediately
      setInterval(checkDatabase, 24 * 60 * 60 * 1000); // Repeat the check every 24 hours
    }, delay);
  }

  // Start scheduling the database check
  scheduleDatabaseCheck();
});
