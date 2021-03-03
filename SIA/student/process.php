<?php
require_once('config.php');
?>
<?php

if(isset($_POST)){

	$firstname 		= $_POST['firstname'];
	$lastname 		= $_POST['lastname'];
	$email 			= $_POST['email'];
	$section		= $_POST['section'];
	$password 		= sha1($_POST['password']);

		$sql = "INSERT INTO studreg (firstname, lastname, email, section, password ) VALUES('".$firstname."','".$lastname."','".$email."','".$section."','".$password."')";
		 if($conn->query($sql)=== TRUE){
        echo "Student registration Successful";
    } else {
        echo "Error: ".$conn->error;
    }
   }
?>