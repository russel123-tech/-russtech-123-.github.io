<html>
<head>
	 <link rel="stylesheet" type="text/css" href="design.css">
	 
</head>
<body>

<?php

include "config.php"; // Using database connection file here

$row_to_del = $_GET['Title']; // get id through query string

$del = mysqli_query($conn,"DELETE FROM announcement_tbl where Title = '$row_to_del'"); // delete query

if($del)
{
    mysqli_close($conn); // Close connection
    header("location:prof_homepage.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>


</body>
</html>