<?php
require_once("config.php");



//Temporary variable lang to para sa teacher_ID kay teacher ha
$_SESSION["teacher_id"] ="teacher101";


$sql = "SELECT * FROM exam_table WHERE Teacher_ID = '".$_SESSION["teacher_id"]."'";
$result = $conn->query($sql);
$conn->close();
?>

<html>
<head>

    <title>Quezon City University</title>
    <link rel ="icon"  href="tpic/qcu.ico">
    <link rel="stylesheet" type="text/css" href="design1.css">
    
</head>

<body class = "MA">


    <div class = "MAc">

        <label class = "MAl">EXAM MANAGEMENT</label>

        <input type = "text" class ="iS" placeholder= "Search Exam Name / Subject Name">
        

        <button class = "MSearch" >Search</button>

        <span class = "bgko"><a href="create_exam.php"><button type="button"class = "plus" id = "plus" >+ Add New Exam</button></span></a>

        <table class = "tMA">

            <thead>

                <th>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th>Instruction&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th>Exam </br>Start</th>
                <th>Exam </br>End</th>
                <th>Duration in 
				</br>Minute</th>
				<th>Total Items</th>
        <th>Passing </br>Mark In %</th>
				<th>Subject Code&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
				<th>Action</th>
        <th>Restriction</th>

            </thead>

            <tbody>

               <?php
        if($result->num_rows>0){
          while ($row = $result->fetch_assoc()){
        ?>
        <tr>
            <td><a href="exam_questions.php?Exam_ID=<?php echo $row['Exam_ID']; ?>"><?php echo $row['exam_name']; ?></a></td>
            <td><?php echo $row['instruction']; ?></td>
            <td><?php echo $row['exam_start']; ?></td>
            <td><?php echo $row['exam_end']; ?></td>
            <td><?php echo $row['dur_in_min']; ?></td>
            <td><?php echo $row['total_item']; ?></td>
            <td><?php echo $row['passing_grade']; ?></td>
            <td><?php echo $row['Subject_Code']; ?></td>
            <td>
              <a href=>Edit</a>
              <a href=>Delete</a>
            </td>
            <td>
              <a href=>Enable</a>
              <a href=>Disable</a>
            </td>
        </tr>

        <?php
                    }
                }
        ?>
               
            </tbody>    



        </table>

    </div>   

    <hr class = "MNA">



 
 <script>
  // Get the modal
  
  var modal = document.getElementById("mMMA");
  
  // Get the button that opens the modal

  var btn = document.getElementById("plus");
  
  // Get the <span> element that closes the modal

  var span = document.getElementsByClassName("close")[0];
  
  // When the user clicks the button, open the modal 

  btn.onclick = function() {

    modal.style.display = "block";

  }
  
  // When the user clicks on <span> (x), close the modal

  span.onclick = function() {

    modal.style.display = "none";

  }
  
  // When the user clicks anywhere outside of the modal, close it

  window.onclick = function(event) {

    if (event.target == modal) {

      modal.style.display = "none";

    }

  }

</script>




</body>




</html>