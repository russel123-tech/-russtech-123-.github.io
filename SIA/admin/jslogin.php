<?php
session_start();
require_once('config.php');
?>
<?php

$username = $_POST['username'];
$password = sha1($_POST['password']);

if ($username != "" && $password != "")
{

        $sql_query = "SELECT * FROM adminreg WHERE email = '".$username."' AND password = '".$password."'";

 		$result = mysqli_query($conn,$sql_query);
        $row = mysqli_fetch_array($result);
        if($row > 0){
            $_SESSION['userlog_name'] = $row["name"];
           echo ("Welcome Admin!");
        }
        else
        {
            echo "Invalid username and password";
        }
}
?>