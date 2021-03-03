<?php
  include("config.php");
  session_start();

  if(!isset ($_SESSION['userlog_name'])){
    header("Location: adminlogin.php");
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
    <meta name="keywords" content="Admin Homepage DB">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Admin Home Page</title>
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
    <meta property="og:title" content="Admin Homepage">
    <meta property="og:type" content="website">
    <meta name="theme-color" content="#478ac9">
    <link rel="canonical" href="index.html">
    <meta property="og:url" content="index.html">
  <style>
  .floatingwindow{
    height:100%;
    width:100%;
    background: rgba(0, 0, 0, 0.5);
    position:fixed;
    top:0;
    left:0;
    z-index:1000;
    overflow:hidden;
  
  }
  </style>
  </head>
  <body class="u-body"><header class="u-clearfix u-grey-10 u-header u-header" id="sec-f4f2">


<?php 

  if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($conn, "SELECT section FROM section_tbl WHERE id=$id");

    if (count($record) == 1 ) {
     $n = mysqli_fetch_array($record);
      $section = $n['section'];
    $campus =  $section[0] . $section[1];
    $course = $section[2];
    $course1 = $section[3];
    if ($course == "I"){
    $course = $section[2] . $section[3];
    $year = $section[4];
    $letter = $section[5];
    }
    
  elseif($course == "E" && $course1 == "N"){
        $course = $section[2] . $section[3] . $section[4] . $section[5] . $section[6];
        $year = $section[7];
    $letter = $section[8];
    }
    
  elseif($course == "E" && $course1 == "C"){
        $course = $section[2] . $section[3] . $section[4];
        $year = $section[5];
    $letter = $section[6];
    }


  
    echo '<div class="floatingwindow" id="modalSection" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">';
          echo '<div class="modal-dialog">';
          echo '<div class="modal-content">';
            echo'<div class="modal-header">';
              echo'<h5 class="modal-title" id="editModalLabel">Edit Section</h5>';
                echo'<button type="close-button" class="btn-close" aria-label="Close"  onclick="javascript: window.close();"></button>';
                  echo'</div>';
                    echo'<div class="modal-body">';
                      echo'<ul></u><select class="form-select" name= "Campus"aria-label="Default select example">';
                        echo'<ul>';
                          echo'<option value=""disabled selected>'.$campus.'</option>';
                              echo'<option value="">BA</option>';
                              echo'<option value="">SF</option>';
                              echo'<option value="">SB</option>';
                              echo'</ul>';    
                              echo'</select>';
                              echo'<br>';
                            echo'<select class="form-select" name= "Course"aria-label="Default select example">';
                              echo'<option value=""disabled selected>'.$course.'</option>';
                              echo'<option value="">IT</option>';
                              echo'<option value="">IE</option>';
                              echo'<option value="">ENTREP</option>';
                              echo'</select>';
                              echo'<br>';
                            echo'<select class="form-select" name= "Year"aria-label="Default select example">';
                              echo'<option value=""disabled selected>'.$year.'</option>';
                              echo'<option value="">1</option>';
                              echo'<option value="">2</option>';
                              echo'<option value="">3</option>';
                              echo'<option value="">4</option>';
                              echo'</select>';
                              echo'<br>';
                            echo'<select class="form-select" name= "SectionLetter" aria-label="Default select example">';
                              echo'<option value=""disabled selected>'.$letter.'</option>';
                              echo'<option value="">A</option>';
                              echo'<option value="">B</option>';
                              echo'<option value="">C</option>';
                              echo'<option value="">D</option>';
                              echo'<option value="">E</option>';
                              echo'<option value="">F</option>';
                              echo'<option value="">G</option>';
                            echo'</select>';
                              echo'</div>';
                                echo'<div class="modal-footer">';
                                  echo'<button type="close" class="btn btn-light"  onclick="closeWin()">Close</button>';
                                    echo'<button class="btn" type="submit" name="edit" href="update-section.php">Save</button>';
                                      echo'</div>';
                                    echo'</div>';
                                  echo'</div>';
  
  echo '</div>';
}
    }
    ?>


<script>
var myWindow;

function closeWin() {
  myWindow.close();
}
</script>

  
  
  <div class="u-clearfix u-sheet u-sheet-1">
          <nav class="navbar navbar-expand-lg navbar-transparent">
        <div class="container-fluid">
        <a href="#" class="u-image u-logo u-image-1" data-image-width="80" data-image-height="40">
          <img src="images/qcu.ico" class="u-logo-image u-logo-image-1" data-image-width="64"></a>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo($_SESSION['userlog_name']); ?>
          </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
      </ul>
    </div>
  </div>
</nav>
<!-- END -->
              
      </div></header>
    <section class="u-align-center u-clearfix u-section-1" id="sec-3631">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">

                            <!-- Button trigger modal -->
                        <br>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSection">
                          Click to add Section
                        </button>
                        <br>
                        <!-- Modal for Add Section -->
                        <form action="add_section.php" method="POST">
                        <div class="modal fade" id="modalSection" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Section</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                  <ul></u><select class="form-select" name= "Campus"aria-label="Default select example">
                                      <ul>
                                        <option value=""disabled selected>Select Campus</option>
                                        <option>SB</option>
                                        <option>SF</option>
                                        <option>BA</option>
                                  </ul>    
                                  </select>

                                  <br>
                                    <select class="form-select" name= "Course"aria-label="Default select example">
                                        <option value=""disabled selected>Select Course</option>
                                        <option>IT</option>
                                        <option>ENTREP</option>
                                        <option>IE</option>

                                  </select>


                                  <br>
                                    <select class="form-select" name= "Year"aria-label="Default select example">
                                        <option value=""disabled selected>Select Year level</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>

                                  </select>

                                  <br>
                                    <select class="form-select" name= "SectionLetter" aria-label="Default select example">
                                        <option value=""disabled selected>Select Section Letter</option>
                                        <option>A</option>
                                        <option>B</option>
                                        <option>C</option>
                                        <option>D</option>
                                        <option>E</option>
                                        <option>F</option>
                                        <option>G</option>

                                  </select>
 
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-primary" name="submit" onclick="return confirm('Add section?');">Save</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        </form>
                                <!-- END -->
                            
                            <!--- !!!CODE HERE!!!-->
                           <div class="card-body">

                                <div class="table-responsive">
                                                            
                                  <?php
                                  $result = mysqli_query($conn,"SELECT * FROM section_tbl ORDER BY id");
                                  if (mysqli_num_rows($result) > 0) {
                                  ?>
                                  <table id="modalSection" class="table table-striped table-bordered second" style="width:100%">
                                     <thead>
                                          <th>Id</th>
                                          <th>Section</th>
                                          <th>Action</th>

                                      </thead>
                                      <tbody>
                                        <?php
                                          $i=0;
                                            while($row = mysqli_fetch_array($result)) {
                                        ?>
                                              <tr>
                                              <td><?php echo $row["id"]; ?></td>
                                              <td><?php echo $row["section"]; ?>
                                              <td>
                                               <a style= "color:blue;" href="admin_homepage.php?edit=<?php echo $row['id']?>">Edit</a>
                                               <a style= "color:red;" href="delete-section.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Are you sure you want to delete? You cannot undone once you delete.');">Delete</a>
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
                            </form>

                      <form action="update-section.php" method="POST">
                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true" name="edit">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Section</h5>
                                <button type="close-button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
                              </div>
                              <div class="modal-body">
                                  <ul></u><select class="form-select" name= "Campus"aria-label="Default select example" >
                                      <ul>
                                        <option value=""disabled selected><?php echo($_SESSION['campus']); ?></option>
                                        <option value=""></option>
                                        <option value=""></option>
                                        <option value=""></option>
                                  </ul>    
                                  </select>

                                  <br>
                                    <select class="form-select" name= "Course"aria-label="Default select example">
                                        <option value=""disabled selected><?php echo($_SESSION['course']); ?></option>
                                        <option value=""></option>
                                        <option value=""></option>
                                        <option value=""></option>

                                  </select>


                                  <br>
                                    <select class="form-select" name= "Year"aria-label="Default select example">
                                        <option value=""disabled selected><?php echo($_SESSION['year']); ?></option>
                                        <option value=""></option>
                                        <option value=""></option>
                                        <option value=""></option>
                                        <option value=""></option>


                                  </select>

                                  <br>
                                    <select class="form-select" name= "SectionLetter" aria-label="Default select example">
                                        <option value=""disabled selected><?php echo($_SESSION['letter']); ?></option>
                                        <option>A</option>
                                        <option>B</option>
                                        <option>C</option>
                                        <option>D</option>
                                        <option>E</option>
                                        <option>F</option>
                                        <option>G</option>

                                  </select>
                                  <input type="hidden" name="id" value="<?php echo $id; ?>">
                              </div>
                              <div class="modal-footer">
                                <button type="close-button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button class="btn" type="submit" name="edit" href="update-section.php" >Save</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        </form>
             </section>
  
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-e055"><div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">AUTOMATED EXAM SYSTEM  &copy; 2020</p>
      </div></footer>
    
  </body>
</html>