<?php
require_once('config.php');
?>
<?php

if(isset($_POST)){

	$name 			= $_POST['name'];
	$email 			= $_POST['email'];
	$password 		= sha1($_POST['password']);

		$sql = "INSERT INTO adminreg (name, email, password ) VALUES('".$name."','".$email."','".$password."')";
		if($conn->query($sql)=== TRUE){
        echo "Professor registration Successful";
    	}
        else {
        echo "Error: ".$conn->error;
   		 }
   }
  ?>