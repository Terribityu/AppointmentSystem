<?php
    require('../connect.php');
    $data_feed = '';
    $button_stats = false;
    $count = 0;
    $query = "SELECT * FROM feedbacks JOIN users ON feedbacks.studentID = users.userID JOIN user_details ON users.username = user_details.username
    WHERE status = 'approved' and users.userID = ".$_SESSION['userID'];
    $result = mysqli_query($conn, $query);
    if($count = mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            extract($row);
            $data_feed .= "
            <div class='card mb-3'>
                <h5 class='card-header'>Feedback</h5>
                    <div class='card-body'>
                        <!-- <h5 class='card-title'>Special title treatment</h5> -->
                        <p class='card-text'>$description.</p>
                    </div>
            </div>";
        }
    }else{
        $data_feed = "<h5 style='text-align:center'><i class='fa-regular fas fa-magnifying-glass'></i>No Results Found.</h5>";
    }

    $query1 = "SELECT * FROM appointments WHERE remarks != 'TBA' and studentID = ".$_SESSION['userID'];
    $result1 = mysqli_query($conn, $query1);
    $res_num = mysqli_num_rows($result1);

    if($res_num > $count){
        $button_stats = true;
    }

    $data = array(
        'feed' => $data_feed,
        'button' => $button_stats
    );

    echo json_encode($data);
?>