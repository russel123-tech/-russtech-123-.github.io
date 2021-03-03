<?php
session_start();
 $_SESSION['id']= "1";
require_once("config.php");

$sql = "SELECT section FROM studreg WHERE id = '".$_SESSION["id"]."'";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
$_SESSION["section"] = $row['section'];


$sql = "SELECT A.`Exam_ID` as Exam_ID, B.`exam_name` as Exam_name, A.`status` FROM exam_section_tbl AS A JOIN exam_table AS B ON A.Section = '".$_SESSION["section"]."' AND A.Exam_ID = B.Exam_ID";
$result = $conn->query($sql);
$conn->close();
?>


<html>
<head>
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</head>

<head><title>Quezon City University</title><link rel="shortcut icon" type="image/x-icon" href="1.ico"/></head>
<link rel="stylesheet" type="text/css" href="design.css">


<body>

<div class="container">
<h1 class="underline">EXAMS</h1>

<?php
        if($result->num_rows>0){
					while ($row = $result->fetch_assoc()){
        ?>
        
        <p class="fs-1"><?php echo $row['Exam_name'];?> 
        <a href="exam_start.php?Exam_ID=<?php echo $row['Exam_ID']; ?>"><button type="button" class="btn btn-outline-success">Start</button> </a></p> 

        <?php
                    }
                }
        ?>




</body>




</html>