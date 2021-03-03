    <?php
require_once("config.php");

if($_SERVER['REQUEST_METHOD']=="POST"){
    $question = $_POST["question"];
    $prediff = $_POST["diff"];
    $corr_answer = $_POST["corr_answer"];
    $mark = $_POST["mark"];
 
    //Eto yung query para sa pagcreate ng question.
    $sql = "INSERT INTO Question_bank(question, pre_diff, corr_answer, Mark) VALUES ('".$question."','".$prediff."','".$corr_answer."','".$mark."')";
    
 
    
    if($conn->query($sql)=== TRUE){
    	echo '<script>alert("Add question successful!")</script>';
        //echo "Question Query Successful";
    } else {
        echo "Error: ".$conn->error;
    }
 
    $question_ID = $conn->insert_id;
    $answer_a = $_POST["answer_a"];
    $answer_b = $_POST["answer_b"];
    $answer_c = $_POST["answer_c"];
    $answer_d = $_POST["answer_d"];
    
    //Eto yung query para sa pagcreate ng answers sa question na nacreate sa taas.
    $sql = "INSERT INTO answers_table(Question_ID, Letter, Answer_desc) 
    VALUES('".$question_ID."','A','".$answer_a."'),
           ('".$question_ID."','B','".$answer_b."'),
           ('".$question_ID."','C','".$answer_c."'),
           ('".$question_ID."','D','".$answer_d."')";
 
     if($conn->query($sql)=== TRUE){
       // echo "Answer Query Successful";
    } else {
        echo "Error: ".$conn->error;
    }
    $Exam_ID = $_GET['Exam_ID'];
    //echo "exam id".$Exam_ID;

    $sql = "SELECT MAX(item_number) AS itemNum FROM `create_exam_tbl` WHERE Exam_ID = '".$Exam_ID."'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $item_number = $row['itemNum'];
    if($item_number == NULL){
        $item_number = 0;
    }
    //echo "item number:".$item_number;
    $item_number += 1;
    $sql = "INSERT INTO create_exam_tbl(Question_ID, item_number, Exam_ID) VALUES('".$question_ID."','".$item_number."','".$Exam_ID."')";
    if($conn->query($sql)=== TRUE){
        //echo "AddQuestionToExam Query Successful";
    } else {
        echo "Error: ".$conn->error;
    }
    

  //$conn->close();  
 }

$Exam_ID = $_GET['Exam_ID'];
$sql2 = "SELECT A.item_number, B.Question_ID, B.question, B.pre_diff, B.corr_answer, B.Mark FROM create_exam_tbl AS A JOIN question_bank AS B WHERE A.Question_ID = B.Question_ID AND A.Exam_ID = '".$Exam_ID."'";
$result2 = $conn->query($sql2);


?>


<html>

<head>
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
</head>

<body class="container-fluid">
<a href="analysis_report.php?Exam_ID=<?php echo $Exam_ID;?>"><button type="button" class="btn btn-info">Item Analysis</button></a>
<table class="table table-hover table-bordered border-dark">
  <thead>
    <tr>
        <th>#</th>
        <th>Question</th>
        <th>Choices</th>
        <th>Correct Answer</th>
        <th>Difficulty</th>
        <th>Mark/Point(s)</th>
        <th colspan="2">Actions</th>
    <tr>
  </thead>

  <tbody>
  <?php
    if($result2->num_rows>0){
        while ($row2 = $result2->fetch_assoc()){
  ?>
    <tr>
        <th align="center" valign="middle"><?php echo $row2['item_number']; ?></th>
        <td valign="middle"><?php echo $row2['question']; ?></td>

        <td align="center" valign="middle">
        <?php
        $question_ID = $row2['Question_ID'];
        $sql3 = "SELECT Letter, Answer_desc FROM `answers_table` WHERE Question_ID = '".$question_ID."' Order by Letter ASC";
        $result3 = $conn->query($sql3);
        if($result3->num_rows>0){
            while ($row3 = $result3->fetch_assoc()){
            echo $row3['Letter'].". ".$row3['Answer_desc']." <br/>";
            }
        }
        ?>
        </td>
        <td align="center" valign="middle"><?php echo $row2['corr_answer']; ?></td>
        <td align="center" valign="middle"><?php echo $row2['pre_diff']; ?></td>
        <td align="center" valign="middle"><?php echo $row2['Mark']; ?></td>
        <td colspan="2" align="center" valign="middle">
            <a type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Edit</a>
            <a type="button" class="btn btn-danger"href="delete_question.php?question=<?php echo $question_ID; ?>" onclick="return confirm('Are you sure you want to delete? You cannot undone once you delete.');">Delete</a>
        </td>
    </tr>
    <?php
        }
    }
    ?>   
  </tbody>

  
        
  
</table>





<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Add Question</button> <a href="exam_management.php"><button type="button" class="btn btn-primary">Done</button></a>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Question</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form name="questionForm" method="POST" action="">
        <!-- QUESTION HERE -->
        <div class="form-floating">
            <textarea name="question" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Question</label>
        </div><br/>
        
        <!-- QUESTION Difficulty -->
        <p class="fw-bold lh-sm">Question Difficulty:</p>
        <select name="diff" class="form-select form-select-sm" aria-label=".form-select-sm example">
        <option value="easy">Easy</option>
        <option value="medium">Medium</option>
        <option value="hard">Hard</option>
        </select><br/>


        <!-- ABCD Answers -->
        <p class="fw-bold lh-sm">Answers:</p>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm">A.</span>
            <input name="answer_a" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm">B.</span>
            <input name="answer_b"  type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm">C.</span>
            <input name="answer_c"  type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm">D.</span>
            <input name="answer_d"  type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>

        <!-- Correct Answer -->
        <p class="fw-bold lh-sm">Correct Answer:</p>
        <select name="corr_answer" class="form-select form-select-sm" aria-label=".form-select-sm example">
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        <option value="D">D</option>
        </select><br/>


        <!-- Mark/Point(s) -->
        <p class="fw-bold lh-sm">Mark/Point(s):</p>
        <input name="mark" class="form-control" type="number" value="1" min="1" id="example-number-input">
        
        

        </div>

        <!--Cancel and Add Buttons -->
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <input type="submit" class="btn btn-success" value="Add">
        </div>
        


        </form>
      
    </div>
  </div>
</div>
</body>
</html>