<?php
require_once("config.php");
session_start();
$_SESSION["student_id"]="1";

$sql = "SELECT section FROM studreg WHERE id = '".$_SESSION["student_id"]."'";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
$_SESSION["section"] = $row['section'];


$sql = "SELECT A.`Exam_ID` as Exam_ID, B.`exam_name` as Exam_name, A.`status` FROM exam_section_tbl AS A JOIN exam_table AS B ON A.Section = '".$_SESSION["section"]."' AND A.Exam_ID = B.Exam_ID";
$result = $conn->query($sql);
$conn->close();
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
    <title>Student Exam Page</title>
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
          <a class="nav-link active" aria-current="page" href="stud_homepage.php">Announcement</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="stud_exam.php">Exams</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Calendar</a>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="profile.php">Your Progress</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo($_SESSION['firstname']." ". $_SESSION['lastname'] ); ?>
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

<u><h2>EXAM LIST</h2></u>
<?php
    include ("config.php");
    $query = "SELECT * from exam_table where open_to = 'BAIT-1D'";
    $query_run = mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($query_run)){
?>
<center><div class="card border-success mb-3" style="max-width: 48rem;">

   <?php 

   //starttime
    $start = $row['exam_start'];

    $createStart = new DateTime($start);

    $strip = $createStart->format('M d Y');
    $strip2 = $createStart->format('h:i');
     // string(10) "2012-09-09"
    //----END OF START TIME ----

     //starttime
    $end = $row['exam_end'];

    $createEnd = new DateTime($end);

    $stripB = $createEnd->format('M d Y');
    $stripB2 = $createEnd->format('h:i');
     // string(10) "2012-09-09"
    //----END OF START TIME ----

    //FINDING DIFFERENCE OF TWO TIME
    $diff=abs(strtotime($stripB2)-strtotime($strip2));
    $hours = floor($diff / 3600);
    $minutes = floor(($diff/ 60) % 60);
    $duration=$hours." hr"." : ".$minutes." min";
    //----END OF TIME DIFF ----
  ?>
  <div class="card-header bg-transparent border-success">
    <b>
       <p style="text-align:center;">
        <?php echo "Exam Name : ".$row['exam_name'];?>
        <br>
        <?php echo "Start Date / Time : ".$strip. " / ".$strip2;?>
        <br>
        <?php echo "End Date / Time : ".$stripB. " / ".$stripB2;?>
        <br>
        <?php echo "Time Allotted : ".$duration;?>
         <br>
         <!--COUNT NUMBER OF ITEMS -->
         <?php
         $query=("SELECT count(item_number) as total from create_exam_tbl WHERE Exam_ID='5'");
        $result=mysqli_query($conn,$query);
        $data=mysqli_fetch_assoc($result);
       ?>
        <?php echo "No. of Items : ".$data['total'];?>
       </p>
    </b>
      <?php
    $sql = "SELECT A.`Exam_ID` as Exam_ID, B.`exam_name` as Exam_name, A.`status` FROM exam_section_tbl AS A JOIN exam_table AS B ON A.Section = '".$_SESSION["section"]."' AND A.Exam_ID = B.Exam_ID";
    $result = $conn->query($sql);
    $conn->close();
        if($result->num_rows>0){
          while ($row = $result->fetch_assoc()){
        ?>
    <p><a type="button" class="btn btn-success" onclick="fullscreen()" style="align: left;"href="start_exam.php?Exam_ID=<?php echo $row['Exam_ID']; ?>">Start</a></p> 
  </div>
</div> </center>
      </section>
  <?php

}
}
}
  ?>
  
    <br>
    <br>
    <br>
    <script>
function fullscreen() {
    if ((document.fullScreenElement && document.fullScreenElement !== null) ||
        (!document.mozFullScreen && !document.webkitIsFullScreen)) {
        if (document.documentElement.requestFullScreen) {
            document.documentElement.requestFullScreen();
        } else if (document.documentElement.mozRequestFullScreen) {
            document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullScreen) {
            document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
        }
    } else {
        if (document.cancelFullScreen) {
            document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
        }
    }
</script>
  <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-e055"><div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">AUTOMATED EXAM SYSTEM  &copy; 2020</p>
      </div></footer>

  </body>
</html>