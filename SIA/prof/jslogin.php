<?php
session_start();
require_once('config.php');
?>
<?php
$username = $_POST['username'];
$password = sha1($_POST['password']);

if ($username != "" && $password != ""){

        $sql_query = "SELECT * FROM profreg WHERE email = '".$username."' AND password = '".$password."'";
        $result = mysqli_query($conn,$sql_query);
        $row = mysqli_fetch_array($result);
        if($row > 0){
            $_SESSION['userlog_firstname'] = $row["firstname"];
            $_SESSION['userlog_lastname'] = $row["lastname"];
            $_SESSION['teacher_ID'] = $row["id"];
          
           echo ("Welcome Professor!");
        }else{
            echo "Invalid username or password";
        }

    }
?>



