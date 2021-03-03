<html>
<head>
</head>
<body>

<?php

include "config.php"; // Using database connection file here

$row_to_del = $_GET['exam_name']; // get id through query string

$del = mysqli_query($conn,"DELETE FROM exam_table where exam_name = '$row_to_del'"); // delete query

if($del)
{
	mysqli_close($conn); // Close connection
    header("location:prof_exam.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>


</body>
</html>