<?php
require ('../connect.php');
    extract($_POST);
    $inst_name = $_SESSION['username'];
    if(isset($search))
    {
        $search = mysqli_real_escape_string($conn, $_POST["search"]);
        $query = "SELECT * FROM `feedbacks` JOIN users ON feedbacks.studentID = users.userID JOIN user_details ON users.username = user_details.username
        where (firstname like '%$search%'
        or description like '%$search%'
        or lastname like '%$search%') and status = '$stats'";
        
    }else {
            $query = "SELECT * FROM `feedbacks` JOIN users ON feedbacks.studentID = users.userID JOIN user_details ON users.username = user_details.username where status = '$stats'";
    }

    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            extract($row);
            echo "
                <tr>
                    <td>$firstname $lastname</td>
                    <td>$description</td>";

                if($status == "pending"){
                    echo "
                    <td><button id='approveFeedback' title='Approve Appointment' value='$feedbackID' data-value='$firstname $lastname' class='btn btn-success'><i class='fa-solid fas fa-check'></i></button>&nbsp
                    <button id='rejectFeedback' title='Reject Appointment' value='$feedbackID' data-value='$firstname $lastname' class='btn btn-danger'><i class='fa-solid fa-xmark'></i></button></td>";
                }else{
                    echo "<td>$status</td>
                </tr>";
                }
        }
    }else{
        echo "<h5 style='text-align:center'><i class='fa-regular fas fa-magnifying-glass'></i>No Results Found.</h5>";
    }

?>