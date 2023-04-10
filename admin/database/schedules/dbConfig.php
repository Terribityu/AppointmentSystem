<?php
    session_start();
    // DatabaseConfiguration
    define('DB_HOST','localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'destiny');

    $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if($db->connect_error) {
        die("Connection Failed" . $db->connect_error);
    }

    function addSystemLogs($transactID, $reportType){
        $servername = "localhost";
		$username = "root";
		$password = "";
		$database = "destiny";
		$conn = mysqli_connect($servername , $username , $password, $database);

        $date = date('m-d-Y');
        $time = date('H:i:s');
		$query = "INSERT INTO system_reports VALUES(NULL, '".$_SESSION['username']."', $transactID, '$reportType', '$date', '$time')";
		mysqli_query($conn,$query);
    }
?>