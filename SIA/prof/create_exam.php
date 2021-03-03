<?php
require_once("config.php");

if($_SERVER['REQUEST_METHOD']=="POST"){
    
    //Temporarily, dito muna yung teacher ID
    $teacher_ID = "teacher101";
    $exam_name = $_POST["exam_name"];
    $selectSubj=$_POST["subject"];
    $inst=$_POST["instruction"];
    //FOR DATE
$date1 = $_POST["start_time"];  
$date2 = $_POST["end_time"];  
  
// Formulate the Difference between two dates 
$diff = abs($date2 - $date1);  
  
  
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
$date_created = date("Y-m-d H:i:s");
  

    $sql = "INSERT INTO exam_table(exam_name, exam_status,Subject_Code, Teacher_ID,instruction,exam_start, exam_end, dur_in_min,date_created) 
    VALUES('".$exam_name."','On Going','".$selectSubj."','".$teacher_ID."', '".$inst."', '".$date1."', '".$date2."', '".$minutes."', '".$date_created."')";

    if($conn->query($sql)=== TRUE){
        echo "Question Query Successful";
    } else {
        echo "Error: ".$conn->error;
    }
    
    $Exam_ID = $conn->insert_id;


    $section = $_POST["section"];
    $sql = "INSERT INTO exam_section_tbl(Exam_ID, Section, status) VALUES('".$Exam_ID."','".$section."','Not Yet Started')";

    if($conn->query($sql)=== TRUE){
        echo "Question Query Successful";
    } else {
        echo "Error: ".$conn->error;
    }


    $ExamLink = "Location:exam_questions.php?Exam_ID=".$Exam_ID;
    header($ExamLink);

}


?>

<html>
<head>
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>


<body class="container">
    <form name="examForm" method="POST" action="">
      <h3>CREATE EXAM</h3>
      <p class="fw-bold lh-sm">Subject Code:</p>
    <select class = "form-control" name="subject"> 
  
                    <option value=""disabled selected>Click to generate subjects</option>

                    <?php
                      $sql= mysqli_query($conn, "SELECT * from subject order by Subject_Code ");

                      while ($row = mysqli_fetch_array ($sql)) 
                      {
                        ?>
                        <option value= "<?php echo $row['Subject_Code'];?>">
                        <?php echo $row['Subject_Code'];?></option>
                        <?php

                      }
                    ?>

                </select>
  </br>
    <p class="fw-bold lh-sm">Exam Name:</p><input type="text" class="form-control" name="exam_name" /> </br>
    <p class="fw-bold lh-sm">Instruction:</p><textarea type="text" class="form-control" name="instruction"> </textarea> </br>
    <div class='col-md-6'>
               <div class="form-group">
                  <label class="control-label">Exam Start</label>
                  <div class='input-group date' id='datetimepicker1'>
                     <input type='text' class="form-control"name="start_time"  />
                     <span class="input-group-addon">
                     <span class="glyphicon glyphicon-calendar"></span>
                     </span>
                  </div>
               </div>
            </div>
             <div class='col-md-6'>
               <div class="form-group">
                  <label class="control-label">Exam End</label>
                  <div class='input-group date' id='datetimepicker2'>
                     <input type='text' class="form-control" name="end_time" />
                     <span class="input-group-addon">
                     <span class="glyphicon glyphicon-calendar"></span>
                     </span>
                  </div>
               </div>
            </div>
    <p class="fw-bold lh-sm">Section:</p>
    <select class = "form-control" name="section"> 
  
                    <option value=""disabled selected>Click to generate sections</option>

                    <?php
                      $sql= mysqli_query($conn, "SELECT * from section_tbl order by section ");

                      while ($row = mysqli_fetch_array ($sql)) 
                      {
                        ?>
                        <option value= "<?php echo $row['section'];?>">
                        <?php echo $row['section'];?></option>
                        <?php

                      }
                    ?>

                </select>
  </br>
  <p class="fw-bold lh-sm">Passing Mark in %:</p><input class="form-control"type="number" id="quantity"min="0" max="100" name="passing" /> </br>
   <center> <input class="btn btn-primary"type="submit" value="Submit"/></center>
    </form>

    <script>
  $(function () {
    $('#datetimepicker1').datetimepicker();
    $('#datetimepicker2').datetimepicker();
 });
</script>

</body>
</html>