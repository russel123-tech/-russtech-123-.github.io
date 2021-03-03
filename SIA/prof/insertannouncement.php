<?php
require ("config.php");

if(isset($_POST['create']))
{
	$title = ($_POST['title']);
	$detail = ($_POST['details']);
	$date = date("Y-m-d H:i:s");
	$selectCourse= ($_POST['Course']);
	$_SESSION['Course']= $row['course'];
	$sql = "INSERT INTO announcement_tbl (`Title`, `Details`, `Created_On`, `Announce_to_class`) VALUES ('".$title."', '".$detail."', '".$date."', '".$selectCourse."')";
	$rs = mysqli_query($conn, $sql);
	$affectedRows = mysqli_affected_rows($conn);
	
	if($affectedRows == 1)
	{
	  echo "<script>alert('Successfully saved !');</script>";
      echo "<script>document.location.href='manage_announcement.php'</script>";
	}
	else
	{
		echo "<script>alert('An error occurred while inserting a record !');</script>";
		
	}
}
?>