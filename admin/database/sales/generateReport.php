<?php
    require('../connect.php');
    if(isset($_GET['type'])){
    $data = '';
    $name = '';
    $type = $_GET['type'];
        if($type == 'thismonth'){
            $type = 'WHERE MONTH(date) = MONTH(CURRENT_DATE())';
            $name = 'Monthly';
        }elseif($type == '6months'){
            $type = 'WHERE date BETWEEN DATE_SUB(CURDATE(), INTERVAL 6 MONTH) AND CURDATE()';
            $name = 'Semester';
        }elseif($type == 'year'){
            $type = 'WHERE date BETWEEN DATE_SUB(CURDATE(), INTERVAL 1 YEAR) AND CURDATE()';
            $name = 'Yearly';
        }else{
            $type = ' ';
            $name = 'Complete';
        }

        $query = "SELECT * FROM sales JOIN appointments ON sales.appointmentID = appointments.appointmentID JOIN schedules ON schedules.id = appointments.scheduleID JOIN
        users ON schedules.instructorID = users.userID JOIN user_details ON user_details.username = users.username ".$type;

        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                extract($row);
                $query1 = "SELECT * FROM users JOIN user_details ON users.username = user_details.username WHERE users.userID = ".$studentID;
                $result1 = mysqli_query($conn, $query1);
                $row1 = mysqli_fetch_array($result1);
                $textDate = date('F j, Y g:i A', strtotime($date));
                $start = date("F d, Y", strtotime($row['start']));
                 $data .= "
                    <tr> 
                        <td>$title</td>
                        <td>$price_s</td>
                        <td>$start</td> 
                        <td>$textDate</td>
                        <td>$firstname $middlename $lastname</td>
                        <td>".$row1['firstname']." ".$row1['middlename']." ".$row1['lastname']."</td>
                    </tr>
                ";
            }
        }else{
            echo "<h5 style='text-align:center'><i class='fa-regular fas fa-magnifying-glass'></i>No Results Found.</h5>";
        } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

        h1, h2, h3, h4, h5 {
            font-family: 'Playfair Display';
        }
        * {
            margin: 0;
            padding: 0;
            border: 0;
            outline: 0;
            box-sizing: border-box;
            list-style: none;
            text-decoration: none;
            font-family: 'Roboto', sans-serif;
        }
        #content{
            width: 100%;
        }

        .header-text{
            border-bottom: 4px double #333;
        }

        .header-text p {
            line-height: 10px;
        }
    </style>
</head>
<body>
    <div id='content' class="container-fluid">
        <div class="text-center">
            <div class="header-text">
                <h2>Destiny Driving School</h2>
                <p>2/F M. De Castro Bldg., Cagayan Valley Road, Salangan, San Miguel, Philippines</p>
                <p>(0951) 930 8976</p>
                <p>destinydrivingschool5@gmail.com</p>
            </div>

            <div class="header-title">
                <h1 value='<?php echo $name; ?>'><?php echo $name; ?> Sales Report</h1>
            </div>
        </div>

        <div class="d-flex justify-content table-responsive">
            <table class="table table-hover table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Appointment Type</th> 
                        <th scope="col">Price</th>
                        <th scope="col">Appointment Date</th> 
                        <th scope="col">Payment Date</th> 
                        <th scope="col">Instructor Name</th> 
                        <th scope="col">Student Name</th> 
                    </tr>
                </thead>
                    <tbody>
                        <?php echo $data; ?>
                    </tbody>
            </table>
        </div>
    </div>
</body>
<script>
    $(document).ready(function(){
        saveAsPdf();
        function saveAsPdf() {
        const name = '<?php echo $name; ?>';
        const element = document.getElementById('content'); // Replace 'content' with the ID of the element containing the content you want to save as PDF
        
        const currentDate = new Date();
        const formattedDate = currentDate.toLocaleDateString('en-US', { month: '2-digit', day: '2-digit', year: 'numeric' });
        const formattedTime = currentDate.toLocaleTimeString('en-US', { hour12: false });
        
        const fileName = `Destiny_Driving_School_`+ name +`_Sales_Report_${formattedDate}|${formattedTime}.pdf`;

        html2pdf().set({
            margin: 10,
            filename: fileName,
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
        }).from(element).save().then(function (pdf) {
            // Code to run after the PDF file has been saved
            console.log('PDF saved:', pdf);
            
            // Go back to the previous page
            window.history.back();
        });
        }

    });
</script>
</html>
<?php
    }else{
        echo "<script>window.history.back();</script>";
    }
?>