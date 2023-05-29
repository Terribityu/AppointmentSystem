<?php
require("../connect.php");
// Query to retrieve the total data for each month
  if (session_status() === PHP_SESSION_ACTIVE) {
  $query = "SELECT MONTH(`date`) AS month, SUM(`price_s`) AS total
            FROM `sales`
            GROUP BY MONTH(`date`)";

  // Execute the query and process the results
  $result = mysqli_query($conn, $query);

  if ($result) {
    // Initialize an empty array to store the monthly data
    $monthlyData = array();

    // Loop through the result set
    while ($row = mysqli_fetch_assoc($result)) {
      // Extract the month and total from each row
      $month = $row['month'];
      $total = $row['total'];

      // Create an array entry with the month and total
      $entry = array(
        'y' => $total,
        'label' => date('F', mktime(0, 0, 0, $month, 1))
      );

      // Add the entry to the monthly data array
      $monthlyData[] = $entry;
    }

    // Convert the array to JSON format
    $jsonMonthlyData = json_encode($monthlyData);

    // Output the JSON data
    echo $jsonMonthlyData;
  } else {
    // Query execution failed
    echo "Error executing query: " . mysqli_error($connection);
  }
}

?>