<?php
    require('../connect.php');
    $active = "active";
    $query = "SELECT * FROM feedbacks JOIN users ON feedbacks.studentID = users.userID JOIN user_details ON user_details.username = users.username WHERE status = 'approved'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result)){
            extract($row);
            echo "
            <div class='carousel-inner'>
                <div class='carousel-item $active'>
                <div class='single-item'>
                    <div class='row mt-5'>
                        <div class='col-md-5'>
                            <div class='profile'>
                                <div class='testimonial-img-area'>
                                    <img src='$avatar' alt=''>
                                </div>
                                <div class='bio'>
                                    <h2>$firstname $lastname</h2>
                                    <h4>$userType</h4>
                                </div>
                            </div>
                        </div>
                        <div class='col-md-6'>
                            <div class='testimonial-content'>
                                <p><span><i class='fa fa-quote-left'></i></span>$description</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ";
            $active = " ";
        }
    }else{
        echo ' <h5 style="text-align:center"><i class="la la-search"></i> No Result Found<h5>';
    }
?>