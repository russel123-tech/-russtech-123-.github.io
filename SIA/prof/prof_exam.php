<?php
  include("config.php");
  session_start();

  if(!isset($_SESSION['userlog_firstname']) AND !isset($_SESSION['userlog_lastname']) AND !isset($_SESSION['teacher_ID'])){
    header("Location: proflogin.php");
  }
?>
<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>

    <!-- BOOTSTRAP LINK -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- DATATABLE LINK -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/fixedHeader.bootstrap4.css">



    <!-- DATATABLE SCRIPT -->
   
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="assets/vendor/multi-select/js/jquery.multi-select.js"></script>
    <script src="assets/libs/js/main-js.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="assets/vendor/datatables/js/data-table.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>


    <!-- FROM NICEPAGE -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Insert Announcement DB">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Professor Exam Page</title>
    <link rel ="icon"  href="pic/qcu.ico">
    <link rel="stylesheet" href="nicepage.css" media="screen">
    <link rel="stylesheet" href="Professor-Home-Page.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 3.6.1, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    
    
    <script type="application/ld+json">{
    "@context": "http://schema.org",
    "@type": "Organization",
    "name": "Test Website",
    "url": "index.html",
    "logo": "images/default-logo.png"
}</script>
    <meta property="og:title" content="Professor Home Page">
    <meta property="og:type" content="website">
    <meta name="theme-color" content="#478ac9">
    <link rel="canonical" href="index.html">
    <meta property="og:url" content="index.html">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>   
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  



  </head>

  <!-- START OF BODY -->
  <body class="u-body"><header class="u-clearfix u-grey-10 u-header u-header" id="sec-f4f2"><div class="u-clearfix u-sheet u-sheet-1">
         
        <nav class="navbar navbar-expand-lg navbar-transparent">
      <div class="container-fluid">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a href="#" class="u-image u-logo u-image-1" data-image-width="80" data-image-height="40">
          <img src="images/qcu.ico" class="u-logo-image u-logo-image-1" data-image-width="64">
        </a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="prof_homepage.php">Announcement</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="prof_exam.php">Exams</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="teacher_calendar.php">Calendar</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="#">Student Progress</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo($_SESSION['userlog_firstname']."". $_SESSION['userlog_lastname'] ); ?>
          </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Profile</a></li>
           <li><a class="dropdown-item" href="logout.php" onclick="return confirm('Are you sure you want to logout?');">Logout</a></li>
          </ul>
      </ul>
    </div>
  </div>
</nav>
       
      </div></header>
    <section class="u-align-center u-clearfix u-section-1" id="sec-3631">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
<!-- ********************************************************************************************************************* -->
<!--ADD EXAM MODAL -->
    <!-- Button trigger modal -->
<br>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
 ADD EXAM
</button>
<br>
<!-- Modal for Add Exam -->
<form action="add_exam.php" method="POST" >
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add">Add Exam</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <textarea class="form-control" placeholder="Exam Name" id="floatingTextarea" name="exam"></textarea>
          <br>
          <textarea class="form-control" placeholder="Instruction" id="floatingTextarea1" name="instruction"></textarea>
          <br>
          <div class="form-floating mb-3">
          <input type="datetime-local" class="form-control" id="floatingInput" name="exam_start">
          <label for="floatingInput">Exam Start</label>
          </div>
          <br>
          <div class="form-floating mb-3">
          <input type="datetime-local" class="form-control" id="floatingInput1" name="exam_end">
          <label for="floatingInput1">Exam End</label>
          </div>

          <div class="form-floating mb-3">
          <input type="hidden" class="form-control" id="floatingInput2" name="duration">
          </div>

          <br>
          <div class="form-floating mb-3">
          <input type="number" min="10"  max= "75"class="form-control" id="floatingInput2" name="passing">
          <label for="floatingInput2">Passing Mark in %</label>
          </div>
        <br> 
          <select class="form-select" name= "subject"aria-label="Default select example">
              <option value=""disabled selected>Subject</option>
              <?php
                      $sql= mysqli_query($conn, "select * from subject order by subjectName ");

                      while ($row = mysqli_fetch_array ($sql)) 
                      {
                        ?>
                        <option value= "<?php echo $row['subjectName'];?>">
                        <?php echo $row['subjectName'];?></option>
                        <?php

                      }
                    ?>
          </select>
          <br> 
          <select class="form-select" name= "section"aria-label="Default select example">
              <option value=""disabled selected>Open to Class</option>
              <?php
                      $sql= mysqli_query($conn, "select * from section_tbl ORDER BY section ");

                      while ($row = mysqli_fetch_array ($sql)) 
                      {
                        ?>
                        <option value= "<?php echo $row['section'];?>">
                        <?php echo $row['section'];?></option>
                        <?php

                      }
                    ?>
          </select>
                
               
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-primary" name="save" onclick="return confirm('Add Exam?');">Save</button>
      </div>
    </div>
  </div>
</div>
</form>
        <!-- END OF ADD EXAM MODAL -->
   <!-- ********************************************************************************************************************* --> 
  
  
    
   <div class="card-body">

      <div class="table-responsive">
                                  
        <?php
        $result = mysqli_query($conn,"SELECT * FROM exam_table ORDER BY date_created");
        if (mysqli_num_rows($result) > 0) {
        ?>
        <table id="example" class="table table-striped table-bordered second" style="width:100%">
           <thead>
               
                <th>Exam Name</th>
                <th>Instruction</th>
                <th>Exam Start</th>
                <th>Exam End</th>
                <th>Duration in Minutes</th>
                <th>Total Items</th>
                <th>Passing Mark in %</th>
                <th>Subject</th>
                <th>Open to Class</th>
                <th>Date Created</th>
                <th>Exam Status</th>
                <th>Action</th>

            </thead>
            <tbody>
              <?php
                $i=0;
               
                  while($row = mysqli_fetch_array($result)) {
              ?>
                    <tr>
    
                    <td><u><a href="add_question.php?Exam_ID=<?php echo $row['Exam_ID']; ?>"><?php echo $row['exam_name']; ?></a></u></td>
                    <td><?php echo $row['instruction']; ?></td>
                    <td><?php echo date("M d Y - h:i A", strtotime($row['exam_start'])); ?></td>
                    <td><?php echo date("M d Y - h:i A", strtotime($row['exam_end'])); ?></td>
                     <?php 
                     $start=date("h:i", strtotime($row['exam_start']));
                     $end=date("h:i", strtotime($row['exam_end']));
                     $diff=abs(strtotime($end)-strtotime($start));
                     $hours = floor($diff / 3600);
                     $minutes = floor(($diff/ 60) % 60);
                     $duration=$hours."hr".":".$minutes."min";
                      ?>
                    <td>
                     <?php echo ( $duration); ?>
                    </td>
                    <td><?php echo $row['total_item']; ?></td>
                    <td><?php echo $row['passing_grade']; ?></td>
                    <td><?php echo $row['Subject']; ?></td>
                    <td><?php echo $row['open_to']; ?></td>
                    <td><?php echo date("M d Y - h:i A", strtotime($row['date_created'])); ?></td>
                    <td></td>
                    <td>
                      <a style= "color:black;" class="btn btn-success btn-xs"href="update_exam.php?exam_name=<?php echo $row["exam_name"]?>&instruction=<?php echo $row["instruction"]?>&start=<?php echo $row["exam_start"];?>&end=<?php echo $row["exam_end"];?>&passing=<?php echo $row["passing_grade"];?>&open=<?php echo $row["open_to"];?>">Edit</a>
                     <a style= "color:black;" class="btn btn-danger btn-xs" href="deleteexam.php?exam_name=<?php echo $row["exam_name"]; ?>" onclick="return confirm('Are you sure you want to delete? You cannot undone once you delete.');">Delete</a>
                    </td>
                    </tr>
                    <?php
                    $i++;
                    }
                  
                    ?>
               
            </tbody>    



        </table>
      <?php
      }
        else{
          echo "No result found";
            }
        ?>

      </div>
    </div>

      </section>
  
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-e055"><div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">AUTOMATED EXAM SYSTEM  &copy; 2020</p>
      </div></footer>

      <!-- SCRIPT FOR EDIT ANNOUNCEMENT MODAL -->
  

  
    
  </body>
</html>