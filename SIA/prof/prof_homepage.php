<?php
  include("config.php");
  session_start();

  if(!isset($_SESSION['userlog_firstname']) AND !isset($_SESSION['userlog_lastname']) AND !isset($_SESSION['teacher_ID']) ){
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
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
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
    <title>Professor Home Page</title>
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
<!--ADD ANNOUNCEMENT MODAL -->
    <!-- Button trigger modal -->
<br>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Click to add Announcement
</button>
<br>
<!-- Modal for Add Announcement -->
<form action="add_announcement.php" method="POST">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add">Add Announcement</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <textarea class="form-control" placeholder="Author" id="floatingTextarea" name="author"></textarea>
          <br>
          <textarea class="form-control" placeholder="Title" id="floatingTextarea1" name="title"></textarea>
          <br>
          <textarea class="form-control" placeholder="Details" id="floatingTextarea2" style="height: 100px" name="details"></textarea>
        <br>
          <select class="form-select" name= "Course"aria-label="Default select example">
              <option value=""disabled selected>Announce to (Course)</option>
              <?php
                      $sql= mysqli_query($conn, "select * from course_tbl order by CourseCode ");

                      while ($row = mysqli_fetch_array ($sql)) 
                      {
                        ?>
                        <option value= "<?php echo $row['CourseCode'];?>">
                        <?php echo $row['CourseCode'];?></option>
                        <?php

                      }
                    ?>
          </select>
          
                
               
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-primary" name="save" id="insert" onclick="return confirm('Add Announcement?');">Save</button>
      </div>
    </div>
  </div>
</div>
</form>
        <!-- END OF ADD ANNOUNCEMENT MODAL -->
   <!-- ********************************************************************************************************************* --> 
  
  
    
   <div class="card-body">

      <div class="table-responsive">
                                  
        <?php
        $result = mysqli_query($conn,"SELECT * FROM announcement_tbl ORDER BY Created_On");
        if (mysqli_num_rows($result) > 0) {
        ?>
        <table id="example" class="table table-striped table-bordered second" style="width:100%">
           <thead>
                <th>Author</th>
                <th>Title</th>
                <th>Details</th>
                <th>Created On</th>
                <th>Announce to</th>
                <th>Action</th>

            </thead>
            <tbody>
              <?php
                $i=0;
               
                  while($row = mysqli_fetch_array($result)) {
              ?>
                    <tr>
                    <td><?php echo $row["Author"]; ?></td>
                    <td><?php echo $row["Title"]; ?></td>
                    <td><?php echo $row["Details"]; ?></td>
                    <td><?php echo $row["Created_On"]; ?></td>
                    <td><?php echo $row["Announce_to_class"]; ?>
                    <td>
                     <a style= "color:black;" class="btn btn-success btn-xs editbtn"  href='update_announcement.php?author=<?php echo $row["Author"]?>&Title=<?php echo $row["Title"]?>&Details=<?php echo $row["Details"];?>&Class=<?php echo $row["Announce_to_class"];?>'>Edit</a>
                     <a style= "color:black;" class="btn btn-danger btn-xs" href="deleteannouncement.php?Title=<?php echo $row["Title"]; ?>" onclick="return confirm('Are you sure you want to delete? You cannot undone once you delete.');">Delete</a>
                    </td>
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
    
  </body>
</html>