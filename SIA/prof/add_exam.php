<?php
require_once("config.php");
session_start();
$teacher_ID = $_SESSION['teacher_ID'];
if(isset ($_POST['save'])){
    
    
    $exam_name = $_POST["exam"];
    //Teacher_ID session
     $teacher_ID = "teacher101";
  //FOR DATE
	$exam_start = $_POST["exam_start"];  
	$new_start=date("M d Y - h:i A", strtotime($exam_start));
	$exam_end = $_POST["exam_end"];  
	$new_end=date("M d Y - h:i A", strtotime($exam_end));
	  
	// Formulate the Difference between two dates 
	$diff = abs($exam_end - $exam_start);  
	  
	  
	// To get the year divide the resultant date into 
	// total seconds in a year (365*60*60*24) 
	$years = floor($diff / (365*60*60*24));  
	  
	  
	// To get the month, subtract it with years and 
	// divide the resultant date into 
	// total seconds in a month (30*60*60*24) 
	$months = floor(($diff - $years * 365*60*60*24) 
	                               / (30*60*60*24));  
	  
	  
	// To get the day, subtract it with years and  
	// months and divide the resultant date into 
	// total seconds in a days (60*60*24) 
	$days = floor(($diff - $years * 365*60*60*24 -  
	             $months*30*60*60*24)/ (60*60*24)); 
	  
	  
	// To get the hour, subtract it with years,  
	// months & seconds and divide the resultant 
	// date into total seconds in a hours (60*60) 
	$hours = floor(($diff - $years * 365*60*60*24  
	       - $months*30*60*60*24 - $days*60*60*24) 
	                                   / (60*60));  
	  
	  
	// To get the minutes, subtract it with years, 
	// months, seconds and hours and divide the  
	// resultant date into total seconds i.e. 60 
	$minutes = floor(($diff - $years * 365*60*60*24  
	         - $months*30*60*60*24 - $days*60*60*24  
	                          - $hours*60*60)/ 60);  
	$instruction=$_POST["instruction"];
	$subject=$_POST["subject"];
	$instruction=$_POST["instruction"];
	$date = date("Y-m-d H:i:s");
	$passing=$_POST["passing"];
	$section_open=$_POST["section"];
  

    $sql = "INSERT INTO `exam_table`( `Teacher_ID`, `exam_name`, `exam_start`, `exam_end`, `instruction`, `dur_in_min`,`Subject`, `date_created`,`passing_grade`, `open_to`) 
    VALUES ('".$teacher_ID."', '".$exam_name."', '".$new_start."', '".$new_start."','".$instruction."', '".$minutes."', '".$subject."', '".$date."','".$passing."', '".$section_open."')";

    if($conn->query($sql)=== TRUE){
        echo "Add exam successful";
    } else {
        echo "Error: ".$conn->error;
    }
    
    $Exam_ID = $conn->insert_id;


   $section_open=$_POST["section"];

    $sql = "INSERT INTO exam_section_tbl(Exam_ID, Section, status) VALUES('".$Exam_ID."','".$section_open."','Not Yet Started')";

    if($conn->query($sql)=== TRUE){
        echo "Exam section added successfully!";
    } else {
        echo "Error: ".$conn->error;
    }


    $ExamLink = "Location:add_question.php?Exam_ID=".$Exam_ID;
    header($ExamLink);

}


?>