<?php
require ("config.php");

if(isset($_POST['save']))
{
	$author = ($_POST['author']);
	$title = ($_POST['title']);
	$detail = ($_POST['details']);
	$date = date("Y-m-d H:i:s");
	
	//Add if condition on Course if Course is not properly Selected
	$selectCourse= ($_POST['Course']);
	$sql = "INSERT INTO announcement_tbl (`Author`, `Title`, `Details`, `Created_On`, `Announce_to_class`) VALUES ('".$author."', '".$title."', '".$detail."', '".$date."', '".$selectCourse."')";
	$rs = mysqli_query($conn, $sql);
	$affectedRows = mysqli_affected_rows($conn);
	
	if($affectedRows == 1)
	{
      echo "<script>document.location.href='prof_homepage.php'</script>";
	}
	else
	{
		echo "<script>alert('An error occurred while saving !');</script>";
		
	}
}
?>