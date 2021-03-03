<?php
session_start();  
require_once("config.php");

$Exam_ID = $_GET['Exam_ID'];
$sql = "SELECT item_number, Question_ID FROM student_answers WHERE Exam_ID = '".$Exam_ID."' AND Stud_ID = '".$_SESSION["student_id"]."' Order By item_number ASC";
$result = $conn->query($sql);


?>

<html>
<head>
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
</head>


<body class="container">

<?php 
    while($row = $result->fetch_assoc()){
        $question_sql = "SELECT question, pre_diff, corr_answer FROM question_bank WHERE Question_ID = '".$row['Question_ID']."'";
        $question_result = $conn->query($question_sql);
        $question_row = $question_result->fetch_assoc();
?>

<br>
    <br>

<!-- Question goes here -->
<p class="fw-bold lh-sm"><?php echo $row['item_number'].". ".$question_row['question']; ?></p>


<?php
    

    //Query for getting the correct answer
    $studAndCorr_answer_sql = "SELECT A.stud_answer AS stud_answer, A.result AS result, A.Mark AS Mark, B.corr_answer AS corr_answer FROM student_answers AS A JOIN question_bank AS B WHERE A.Question_ID = '".$row['Question_ID']."' AND B.Question_ID = '".$row['Question_ID']."' AND A.Stud_ID = '".$_SESSION["student_id"]."'";
    $studAndCorr_answer_result = $conn->query($studAndCorr_answer_sql);
    $studAndCorr_answer_row = $studAndCorr_answer_result->fetch_assoc();
    //Student Answer
    $student_answer = $studAndCorr_answer_row['stud_answer'];
    //Result(correct or wrong)
    $studResult =  $studAndCorr_answer_row['result'];
    //Mark (or points earned)
    $mark = $studAndCorr_answer_row['Mark'];
    //Correct answer (Letter only)
    $corr_answer = $studAndCorr_answer_row['corr_answer'];

    

    //Query for getting the Answers
    $answers_sql = "SELECT Letter, Answer_desc FROM answers_table WHERE Question_ID = '".$row['Question_ID']."'";
    $answers_result = $conn->query($answers_sql);
    while($answers_row = $answers_result->fetch_assoc()){
    ?>

    <div class="form-check">
    <label class="form-check-label <?php if(($student_answer == $corr_answer && $student_answer == $answers_row['Letter']) || $corr_answer == $answers_row['Letter'])
    { echo "text-success fw-bold";}
    else if($student_answer != $corr_answer && $student_answer == $answers_row['Letter'])
    {echo "text-danger";} 
    ?>">
        <?php echo $answers_row['Letter'].". ".$answers_row['Answer_desc'];?>
        <?php if($student_answer == $answers_row['Letter']){ echo "(Your answer)";}?> 
        
    </label>
    </div>






<?php
        }    
    }


?>
<br>
<br>
<br>
<br>
<button name="done" class="btn btn-primary" href="list_exam.php">Done</button>



</body>
</html>