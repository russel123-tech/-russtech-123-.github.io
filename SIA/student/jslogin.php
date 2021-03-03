<?php
session_start();
require_once('config.php');
?>
<?php
$username = $_POST['username'];
$password = sha1($_POST['password']);

if ($username != "" && $password != ""){

        $sql_query = "SELECT * FROM studreg WHERE email = '".$username."' AND password = '".$password."'";
        $result = mysqli_query($conn,$sql_query);
        $row = mysqli_fetch_array($result);
        if($row > 0){
            $_SESSION['firstname'] = $row["firstname"];
            $_SESSION['lastname'] = $row["lastname"];
            $_SESSION['section'] = $row['section'];
           echo ("Welcome Student!");
        }else{
            echo "Invalid username or password!";
        }

    }
?>
