<?php
require ('../connect.php');
    extract($_POST);
    if(isset($search))
    {
        $search = mysqli_real_escape_string($conn, $_POST["search"]);
        $query = "SELECT * FROM `schedules` JOIN `users` ON schedules.instructorID = users.userID JOIN `user_details` ON users.username = user_details.username
        where (schedID like '%$search%'
        or firstname like '%$search%'
        or middlename like '%$search%'
        or lastname like '%$search%'
        or suffix like '%$search%'
        or address like '%$search%'
        or number like '%$search%'
        or email like '%$search%') and slots > 0 and start >= CURDATE() and title = 'TDC'";
        
    }else {
        $query = "SELECT * FROM `schedules` JOIN `users` ON schedules.instructorID = users.userID JOIN `user_details` ON users.username = user_details.username where slots > 0 and start >= CURDATE() and title = 'TDC'";
    }
    $q1 = "SELECT * FROM users
    JOIN user_details ON users.username = user_details.username
    WHERE userType = 'instructor'";

$r1 = mysqli_query($conn, $q1);

$hasAvailableSchedules = false; // Flag to track if any instructor has available schedules

if (mysqli_num_rows($r1) > 0) {
    while ($row1 = mysqli_fetch_array($r1)) {
        $instructorUsername = $row1['username'];

        $result = mysqli_query($conn, $query);

        $hasSchedules = false; // Flag to track if the instructor has schedules

        while ($row = mysqli_fetch_array($result)) {
            if ($instructorUsername == $row['username']) {
                $hasSchedules = true;
                $hasAvailableSchedules = true;
                break;
            }
        }

        if ($hasSchedules) {
            echo "
                    <li class='list-group-item'>
            <div class='row'>
                <div class='col col-md-3'>
                    <img class='list__img' src='". $row1['avatar']. "' alt=''>
                    &nbsp;
                </div>
                <div class='col col-md-9 descrip'>
                    <div class='instruct_name'>
                        <h5>" . $row1['firstname'] . " " . $row1['lastname'] . "</h5>
                        <p>View Bio</p>
                    </div>
                    <div class='instruct_schedules'>";

            mysqli_data_seek($result, 0); // Reset the result pointer

            while ($row = mysqli_fetch_array($result)) {
                extract($row);

                if(isset($_SESSION['userID'])){
                    $sqlite = "SELECT * FROM appointments JOIN schedules ON appointments.scheduleID = schedules.id WHERE appointments.status_a = 'pending' AND schedules.title = 'TDC' AND appointments.studentID =".$_SESSION['userID'];
                    $query1 = mysqli_query($conn, $sqlite);
                    $hehe = mysqli_num_rows($query1);
                }
                if ($instructorUsername == $row['username']) {
                    $date_text = date("F d, Y", strtotime($start));
                    // $time_std = date("g:i A", strtotime($time));
                    if (isset($_SESSION['userID'])){
                        echo "<button id='selectSched' value='" . $row['id'] . "' data-value='" . $_SESSION['userID'] . "' data-old-value='".$hehe."' class='badge bg-primary rounded-pill'>$title $date_text $time_std</button>&nbsp";
                    }else{
                        echo "<button data-bs-toggle='modal' data-bs-target='#loginModal' class='badge bg-primary rounded-pill'>$title $date_text $time</button>&nbsp";
                    }
                }
            }

            echo "</div>
                </div>
            </div>
                </li>";
        }
    }
}

if (!$hasAvailableSchedules) {
    echo "<h5 style='text-align:center'><i class='fa-regular fas fa-magnifying-glass'></i>No Results Found.</h5>";
}

?>