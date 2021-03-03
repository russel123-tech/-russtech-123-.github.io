<html>
<head>
<!-- BOOTSTRAP LINK -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <title>Edit Announcement</title>
    <link rel ="icon"  href="pic/qcu.ico">

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
<?php

include "config.php"; // Using database connection file here
$Author=$_GET['author'];
$Title=$_GET['Title'];
$Details=$_GET['Details'];
$Announce_to_class=$_GET['Class'];
?>
<?php

if(isset($_POST['Update'])) // when click on Update button
{
    $Author=$_POST['author'];
    $title=$_POST['title'];
    $dets=$_POST['details'];
    $announce=$_POST['announceto'];

    $query= "UPDATE announcement_tbl SET Author='".$Author."',Title='".$title."', Details='".$dets."', Announce_to_class='".$announce."' WHERE Title='".$Title."'";
    $data=mysqli_query($conn,$query);

    if($data)
    {

        header("Location:prof_homepage.php");
    }

    else
    {
        echo ("Failed to update record!");
    }
}
?>




<body class="u-body"><header class="u-clearfix u-grey-10 u-header u-header" id="sec-f4f2"><div class="u-clearfix u-sheet u-sheet-1">
<form method= "POST">

  <div class="mb-3">
    <br>
    <br>
    
    <h3>Update Announcement</h3>
    <label for="exampleInputEmail1" class="form-label">Author</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="author" value="<?php echo $Author ?>"/>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Title</label>
     <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="title" value="<?php echo $Title ?>"/>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Details</label>
     <input type="multiline" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="details" value="<?php echo $Details  ?>"/>
  </div>

  <div class="mb-3">
    <select class="form-select" name= "announceto"aria-label="Default select example" id="course">
              <option value=""disabled selected><?php echo $Announce_to_class  ?></option>
              <?php
                      $sql= mysqli_query($conn, "select * from course_tbl order by CourseCode ");

                      while ($row = mysqli_fetch_array ($sql)) 
                      {
                        ?>
                        <option value= "<?php echo $row['CourseCode'];?>" >
                        <?php echo $row['CourseCode'];?></option>
                        <?php

                      }
                    ?>
          </select>
  </div>
  <button type="submit" class="btn btn-success" name="Update" onclick="return confirm('Save changes?');">Update</button> 
  <a type="submit" class="btn btn-default" href="prof_homepage.php">Back to List</a>
 
 <section class="u-align-center u-clearfix u-section-1" id="sec-3631">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
</form>
</div></header>
 <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-e055"><div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">AUTOMATED EXAM SYSTEM  &copy; 2020</p>
      </div></footer>
</body>
</html>