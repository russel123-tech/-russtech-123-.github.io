<?php
session_start();
require_once("config.php");
//Get value from URL 
$Exam_ID = $_GET['Exam_ID'];


$sql = "SELECT Question_ID FROM create_exam_tbl WHERE Exam_ID = '".$Exam_ID."'";

$question_IDs = array();
//43,44,45
$result = $conn->query($sql);
$i = 0;
if($result->num_rows>0){
          while ($row = $result->fetch_assoc()){
                
                $question_IDs[$i] = $row['Question_ID'];
                $i++;
          }
        }

$question_sql = "SELECT Question_ID, item_number FROM student_answers WHERE Stud_ID ='".$_SESSION["student_id"]."' AND Exam_ID = '".$Exam_ID."' Order by item_number ASC";
$question_result = $conn->query($question_sql);

////////////////////////////////////////////////////////////////////////////////////////////////

if($_SERVER['REQUEST_METHOD']=="POST"){
    $item_sql = "SELECT Question_ID, item_number FROM student_answers WHERE Stud_ID = '".$_SESSION["student_id"]."' AND Exam_ID = '".$Exam_ID."' Order by item_number ASC"; 
    $item_result = $conn->query($item_sql);
    while($item_row = $item_result->fetch_assoc()){
        $stud_answer = $_POST["answer_".$item_row['item_number']];//answer_1
        $updateAnswer_sql = "UPDATE student_answers SET stud_answer = '".$stud_answer."' WHERE Stud_ID = '".$_SESSION["student_id"]."' AND item_number = '".$item_row['item_number']."'";
        $conn->query($updateAnswer_sql);

        $correct_answer_sql = "SELECT corr_answer FROM question_bank WHERE Question_ID = '".$item_row['Question_ID']."'";
        $corr_answer_result = $conn->query($correct_answer_sql);
        $corr_answer_row = $corr_answer_result->fetch_assoc();
        //Correct answer variable below.
        $correct_answer = $corr_answer_row['corr_answer'];

        $stud_answer_sql = "SELECT stud_answer FROM student_answers WHERE Stud_ID = '".$_SESSION['student_id']."' AND Question_ID = '".$item_row['Question_ID']."'";
        $stud_answer_result = $conn->query($stud_answer_sql);
        $stud_answer_row = $stud_answer_result->fetch_assoc();
        //Student's answer variable below.
        $student_answer = $stud_answer_row['stud_answer'];

        //Checking of Student's answer.
        if($student_answer == $correct_answer){
            $correct_update_sql = "UPDATE student_answers SET result = 'correct', Mark = (SELECT Mark FROM question_bank WHERE Question_ID = '".$item_row['Question_ID']."') WHERE Stud_ID = '".$_SESSION["student_id"]."' AND Exam_ID = '".$Exam_ID."' AND item_number = '".$item_row['item_number']."'"; 
            if($conn->query($correct_update_sql)){
                echo "Correct";
            } else {
                echo "Error".$conn->error;
            }
        } else {
            $wrong_update_sql = "UPDATE student_answers SET result = 'wrong', Mark = 0 WHERE Stud_ID = '".$_SESSION["student_id"]."' AND Exam_ID = '".$Exam_ID."' AND item_number = '".$item_row['item_number']."'";
            if($conn->query($wrong_update_sql)){
                echo "Wrong";
            } else {
                echo "Error".$conn->error;
            }
        }
        
    }
    $header = "Location:examresult.php?Exam_ID=".$Exam_ID;
    header($header);
}
?>


<html>
<head>
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
</head>

<body class="container">
    
    <form name="examForm" method="POST" action="">
    <?php
              if($question_result->num_rows==0){
              //Shuffle Question ID
              shuffle($question_IDs);//45,43,44
              $item_number = 1;
              foreach($question_IDs as $question_ID){
              $sql_stud_answer = "INSERT INTO student_answers(Stud_ID, Exam_ID, Question_ID, item_number) VALUES('".$_SESSION["student_id"]."','".$Exam_ID."','".$question_ID."','".$item_number."')";
              $conn->query($sql_stud_answer);
              $item_number++;
              }
              $returnHere = "Location:stud_exam.php?Exam_ID=".$Exam_ID;
              header($returnHere);
              }
            
              while($question_row = $question_result->fetch_assoc()){
            $question_ID = $question_row['Question_ID'];
            $questionAndNumber_sql = "SELECT question, pre_diff, Mark FROM question_bank WHERE Question_ID = '".$question_ID."'";          
            $questionAndNumber_result = $conn->query($questionAndNumber_sql);
            $questionAndNumber_row = $questionAndNumber_result->fetch_assoc();
    ?>
            <!-- Item number and Question goes here -->
            <br>
            <br>
            <br>
            <p class="fw-bold lh-sm"><?php echo $question_row['item_number'].". ".$questionAndNumber_row['question']."   Mark: ".$questionAndNumber_row['Mark']." pt(s)";?></p>
            
    <?php
            $choices_sql = "SELECT Letter, Answer_desc FROM answers_table WHERE Question_ID = '".$question_ID."'";
            $choices_result = $conn->query($choices_sql);
            if($choices_result->num_rows>0){
                while($choices_row = $choices_result->fetch_assoc()){
                    ?>
                    <div class="form-check">
                    <!-- Student's Answer goes here name="answer_" -->
                    <input required class="form-check-input" type="radio" name="answer_<?php echo $question_row['item_number'];?>" value="<?php echo $choices_row['Letter'];?>">
                    <label class="form-check-label" for="flexRadioDefault1">
                        <?php echo $choices_row['Letter'].". ".$choices_row['Answer_desc']; ?>
                    </label>
                    </div>
    <?php
                }
            }
        } 
    ?>

    <input type="submit" class="btn btn-success" value="Submit" >
    </form>
</body>
</html>