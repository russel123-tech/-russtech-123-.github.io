<html>
<head>
	 <link rel="stylesheet" type="text/css" href="design.css">
	 
</head>
<body>

<?php

include "config.php"; // Using database connection file here

$del_questionID = $_GET['question']; // get id through query string

$del = mysqli_query($conn,"DELETE FROM student_answers where Question_ID = '$del_questionID'"); // delete query

if($del)
{
    mysqli_close($db); // Close connection
    header("location:exam_management.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>


</body>
</html>