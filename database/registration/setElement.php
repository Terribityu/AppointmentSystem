<?php

session_start();
extract($_POST);
if(isset($_GET['verifyotp'])){
	if($_GET['verifyotp'] == $_SESSION['otp']){
		echo true;
	}else{
		echo false;
	}
}

?>