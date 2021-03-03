<?php
require_once('config.php');
?>
<?php

if(isset($_POST)){
	
	$firstname 		= $_POST['firstname'];
	$lastname 		= $_POST['lastname'];
	$email 			= $_POST['email'];
	$password 		= sha1($_POST['password']);

		$sql = "INSERT INTO profreg (firstname, lastname, email, password ) VALUES('".$firstname."','".$lastname."','".$email."','".$password."')";
		 if($conn->query($sql)=== TRUE){
        echo "Professor registration Successful";
    } else {
        echo "Error: ".$conn->error;
    }
   }
?>