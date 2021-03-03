<?php
session_start();
require_once("config.php");
$Exam_ID = $_GET['Exam_ID'];

//$sql = "SELECT Question_ID FROM question_bank WHERE corr_answer IN ('".implode("', '",$array)."')";
$section_sql = "SELECT Section FROM exam_section_tbl WHERE Exam_ID ='".$Exam_ID."'";
$section_result = $conn->query($section_sql);
?>


<html>

<head>
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
</head>

<body class="container">

<form name="sectionForm" method="POST" action="">

<br>
<br>
<br>

<!-- Section Code goes here -->
<select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="section"> 
    <?php 
    while($row = $section_result->fetch_assoc()){
    ?>
    <!-- Section options goes here -->
     <option value=""disabled selected>---Select Section to analyze---</option>
    <option value="<?php echo $row['Section']; ?>"><?php echo $row['Section']; ?></option>
    
    <?php
    }
    ?>
</select>

<input type="submit" class="btn btn-success" value="Analyze">
</form>

<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
    $section = $_POST['section'];

    $question_sql = "SELECT item_number, Question_ID FROM create_exam_tbl WHERE Exam_ID ='".$Exam_ID."' Order by item_number ASC";
    $question_result = $conn->query($question_sql); 


?>

<p class="fs-2 fw-bolder"></p>
<table class="table table-hover table-bordered border-dark"> 
        <thead>
            <th>Item number</th>
            <th>Question text</th>
            <th>A</th>
            <th>B</th>
            <th>C</th>
            <th>D</th>
            <th>Correct Answer</th>
            <th>Percentage of Students with correct answer</th>
            <th>Percentage of Students with wrong answer</th>
        </thead>
     
        <?php 
        
        while($question_row = $question_result->fetch_assoc()) { 
         
        //Question and Correct Answer    
        $question_text_sql = "SELECT question, corr_answer FROM question_bank WHERE Question_ID = '".$question_row['Question_ID']."'";    
        $question_text_result = $conn->query($question_text_sql);
        $question_text_row = $question_text_result->fetch_assoc();
            
        //Count students that answered A
        $count_A_sql = "SELECT COUNT(stud_answer) AS A_count FROM student_answers WHERE Question_ID = '".$question_row['Question_ID']."' AND Exam_ID = '".$Exam_ID."' AND stud_answer = 'A' AND Stud_ID IN (SELECT Stud_ID FROM student_list WHERE section = '".$section."')";
        $count_A_result = $conn->query($count_A_sql);
        $count_A_row = $count_A_result->fetch_assoc();
        //Variable that holds the number of students that answered A
        $count_A = $count_A_row['A_count'];

        //Count students that answered B
        $count_B_sql = "SELECT COUNT(stud_answer) AS B_count FROM student_answers WHERE Question_ID = '".$question_row['Question_ID']."' AND Exam_ID = '".$Exam_ID."' AND stud_answer = 'B' AND Stud_ID IN (SELECT Stud_ID FROM student_list WHERE section = '".$section."')";
        $count_B_result = $conn->query($count_B_sql);
        $count_B_row = $count_B_result->fetch_assoc();
        //Variable that holds the number of students that answered B
        $count_B = $count_B_row['B_count'];

        //Count students that answered C<?php
session_start();
require_once("config.php");
$Exam_ID = $_GET['Exam_ID'];

//$sql = "SELECT Question_ID FROM question_bank WHERE corr_answer IN ('".implode("', '",$array)."')";
$section_sql = "SELECT Section FROM exam_section_tbl WHERE Exam_ID ='".$Exam_ID."'";
$section_result = $conn->query($section_sql);
?>


<html>

<head>
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
</head>

<body class="container">

<form name="sectionForm" method="POST" action="">


<!-- Section Code goes here -->
<select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="section"> 
    <?php 
    while($row = $section_result->fetch_assoc()){
    ?>
    <!-- Section options goes here -->
    <option value="<?php echo $row['Section']; ?>"><?php echo $row['Section']; ?></option>
    
    <?php
    }
    ?>
</select>

<input type="submit" class="btn btn-success" value="Analyze">
</form>

<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
    $section = $_POST['section'];

    $question_sql = "SELECT item_number, Question_ID FROM create_exam_tbl WHERE Exam_ID ='".$Exam_ID."' Order by item_number ASC";
    $question_result = $conn->query($question_sql); 


?>

<p class="fs-2 fw-bolder"></p>
<table class="table table-hover table-bordered border-dark"> 
        <thead>
            <th>Item number</th>
            <th>Question text</th>
            <th>A</th>
            <th>B</th>
            <th>C</th>
            <th>D</th>
            <th>Correct Answer</th>
            <th>Percentage of Students with correct answer</th>
            <th>Percentage of Students with wrong answer</th>
        </thead>
     
        <?php 
        
        while($question_row = $question_result->fetch_assoc()) { 
         
        //Question and Correct Answer    
        $question_text_sql = "SELECT question, corr_answer FROM question_bank WHERE Question_ID = '".$question_row['Question_ID']."'";    
        $question_text_result = $conn->query($question_text_sql);
        $question_text_row = $question_text_result->fetch_assoc();
            
        //Count students that answered A
        $count_A_sql = "SELECT COUNT(stud_answer) AS A_count FROM student_answers WHERE Question_ID = '".$question_row['Question_ID']."' AND Exam_ID = '".$Exam_ID."' AND stud_answer = 'A' AND Stud_ID IN (SELECT Stud_ID FROM student_list WHERE section = '".$section."')";
        $count_A_result = $conn->query($count_A_sql);
        $count_A_row = $count_A_result->fetch_assoc();
        //Variable that holds the number of students that answered A
        $count_A = $count_A_row['A_count'];

        //Count students that answered B
        $count_B_sql = "SELECT COUNT(stud_answer) AS B_count FROM student_answers WHERE Question_ID = '".$question_row['Question_ID']."' AND Exam_ID = '".$Exam_ID."' AND stud_answer = 'B' AND Stud_ID IN (SELECT Stud_ID FROM student_list WHERE section = '".$section."')";
        $count_B_result = $conn->query($count_B_sql);
        $count_B_row = $count_B_result->fetch_assoc();
        //Variable that holds the number of students that answered B
        $count_B = $count_B_row['B_count'];

        //Count students that answered C
        $count_C_sql = "SELECT COUNT(stud_answer) AS C_count FROM student_answers WHERE Question_ID = '".$question_row['Question_ID']."' AND Exam_ID = '".$Exam_ID."' AND stud_answer = 'C' AND Stud_ID IN (SELECT Stud_ID FROM student_list WHERE section = '".$section."')";
        $count_C_result = $conn->query($count_C_sql);
        $count_C_row = $count_C_result->fetch_assoc();
        //Variable that holds the number of students that answered C
        $count_C = $count_C_row['C_count'];

        //Count students that answered D
        $count_D_sql = "SELECT COUNT(stud_answer) AS D_count FROM student_answers WHERE Question_ID = '".$question_row['Question_ID']."' AND Exam_ID = '".$Exam_ID."' AND stud_answer = 'D' AND Stud_ID IN (SELECT Stud_ID FROM student_list WHERE section = '".$section."')";
        $count_D_result = $conn->query($count_D_sql);
        $count_D_row = $count_D_result->fetch_assoc();
        //Variable that holds the number of students that answered D
        $count_D = $count_D_row['D_count'];
        
        //Total of students in the selected section
        $count_students_sql = "SELECT COUNT(Stud_ID) as students FROM student_list WHERE section = '".$section."'";
        $count_students_result = $conn->query($count_students_sql);
        $count_students_row = $count_students_result->fetch_assoc();
        //Variable that holds the number of students in the selected section
        $students = $count_students_row['students'];

        //Percentage of students who got the Correct answer
        if($question_text_row['corr_answer']=="A"){
            $student_corrects = $count_A;
            $student_wrongs = $students-$count_A;
            $student_count_corr = $count_A/$students; //.5
            $student_count_corr *= 100; //$student_count_corr = $student_count_corr * 100 = 50
            $student_count_wrong = 100 - $student_count_corr; //100 - 50 = 50
        } else if($question_text_row['corr_answer']=="B"){
            $student_corrects = $count_B;
            $student_wrongs = $students-$count_B;
            $student_count_corr = $count_B/$students;
            $student_count_corr *= 100;
            $student_count_wrong = 100 - $student_count_corr;
        } else if($question_text_row['corr_answer']=="C"){
            $student_corrects = $count_C;
            $student_wrongs = $students-$count_C;
            $student_count_corr = $count_C/$students;
            $student_count_corr *= 100;
            $student_count_wrong = 100 - $student_count_corr;
        } else if($question_text_row['corr_answer']=="D"){
            $student_corrects = $count_D;
            $student_wrongs = $students-$count_D;
            $student_count_corr = $count_D/$students;
            $student_count_corr *= 100;
            $student_count_wrong = 100 - $student_count_corr;
        }
    
        ?>
        <tr>
            <th> <?php echo $question_row['item_number']; ?> </th>
            <td> <?php echo $question_text_row['question']; ?> </td>
            <td> <?php echo $count_A; ?> </td>
            <td> <?php echo $count_B; ?> </td>
            <td> <?php echo $count_C; ?> </td>
            <td> <?php echo $count_D; ?> </td>
            <td> <?php echo $question_text_row['corr_answer'];?></td>
            <td> <?php echo $student_count_corr."% (".$student_corrects." out of ".$students." Students)"; ?></td>
            <td> <?php echo $student_count_wrong."% (".$student_wrongs." out of ".$students." Students)"; ?></td>
        
        </tr>
        <?php
            }
        }
        ?>
       
    </table>




</body>
</html>
        $count_C_sql = "SELECT COUNT(stud_answer) AS C_count FROM student_answers WHERE Question_ID = '".$question_row['Question_ID']."' AND Exam_ID = '".$Exam_ID."' AND stud_answer = 'C' AND Stud_ID IN (SELECT Stud_ID FROM student_list WHERE section = '".$section."')";
        $count_C_result = $conn->query($count_C_sql);
        $count_C_row = $count_C_result->fetch_assoc();
        //Variable that holds the number of students that answered C
        $count_C = $count_C_row['C_count'];

        //Count students that answered D
        $count_D_sql = "SELECT COUNT(stud_answer) AS D_count FROM student_answers WHERE Question_ID = '".$question_row['Question_ID']."' AND Exam_ID = '".$Exam_ID."' AND stud_answer = 'D' AND Stud_ID IN (SELECT Stud_ID FROM student_list WHERE section = '".$section."')";
        $count_D_result = $conn->query($count_D_sql);
        $count_D_row = $count_D_result->fetch_assoc();
        //Variable that holds the number of students that answered D
        $count_D = $count_D_row['D_count'];
        
        //Total of students in the selected section
        $count_students_sql = "SELECT COUNT(Stud_ID) as students FROM student_list WHERE section = '".$section."'";
        $count_students_result = $conn->query($count_students_sql);
        $count_students_row = $count_students_result->fetch_assoc();
        //Variable that holds the number of students in the selected section
        $students = $count_students_row['students'];

        //Percentage of students who got the Correct answer
        if($question_text_row['corr_answer']=="A"){
            $student_corrects = $count_A;
            $student_wrongs = $students-$count_A;
            $student_count_corr = $count_A/$students; //.5
            $student_count_corr *= 100; //$student_count_corr = $student_count_corr * 100 = 50
            $student_count_wrong = 100 - $student_count_corr; //100 - 50 = 50
        } else if($question_text_row['corr_answer']=="B"){
            $student_corrects = $count_B;
            $student_wrongs = $students-$count_B;
            $student_count_corr = $count_B/$students;
            $student_count_corr *= 100;
            $student_count_wrong = 100 - $student_count_corr;
        } else if($question_text_row['corr_answer']=="C"){
            $student_corrects = $count_C;
            $student_wrongs = $students-$count_C;
            $student_count_corr = $count_C/$students;
            $student_count_corr *= 100;
            $student_count_wrong = 100 - $student_count_corr;
        } else if($question_text_row['corr_answer']=="D"){
            $student_corrects = $count_D;
            $student_wrongs = $students-$count_D;
            $student_count_corr = $count_D/$students;
            $student_count_corr *= 100;
            $student_count_wrong = 100 - $student_count_corr;
        }
    
        ?>
        <tr>
            <th> <?php echo $question_row['item_number']; ?> </th>
            <td> <?php echo $question_text_row['question']; ?> </td>
            <td> <?php echo $count_A; ?> </td>
            <td> <?php echo $count_B; ?> </td>
            <td> <?php echo $count_C; ?> </td>
            <td> <?php echo $count_D; ?> </td>
            <td> <?php echo $question_text_row['corr_answer'];?></td>
            <td> <?php echo $student_count_corr."% (".$student_corrects." out of ".$students." Students)"; ?></td>
            <td> <?php echo $student_count_wrong."% (".$student_wrongs." out of ".$students." Students)"; ?></td>
        
        </tr>
        <?php
            }
        }
        ?>
       
    </table>




</body>
</html>