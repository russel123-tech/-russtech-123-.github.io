<html>
<head>
<!-- BOOTSTRAP LINK -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <title>Edit Section</title>
    <link rel ="icon"  href="pic/qcu.ico">

     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Insert Announcement DB">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
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
$campus=$_GET['Campus'];
$course=$_GET['Course'];
$year=$_GET['Year'];
$letter=$_GET['SectionLetter'];
$id=$_GET['id'];
?>
<?php

if(isset($_POST['Update'])) // when click on Update button
{
    $campus=$_GET['campus'];
    $course=$_GET['course'];
    $year=$_GET['year'];
    $letter=$_GET['letter'];
    $section=$campus.$course."-".$year.$letter;
    $query="UPDATE `section_tbl` SET `campus`='".$campus."',`course`='".$course."',`year`='".$year."',`letter`='".$letter."',`section`='".$section."' WHERE campus='".$campus."'";
    $data=mysqli_query($conn,$query);

    if($data)
    {

        header("Location:admin_homepage.php");
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
    
    <h3>Update Section</h3>
  <div class="mb-3">
  <select class="form-select" name= "campus"aria-label="Default select example">
              <option value=""disabled selected><?php echo $campus  ?></option>
                                        <option>SB</option>
                                        <option>SF</option>
                                        <option>BA</option>
          </select>
  </div>
  <div class="mb-3">
    <select class="form-select" name= "course"aria-label="Default select example">
             
             <option value=""disabled selected><?php echo $course?></option>
                                          <option>IT</option>
                                        <option>ENTREP</option>
                                        <option>IE</option>
          </select>
  </div>
  <div class="mb-3">
    <select class="form-select" name= "year"aria-label="Default select example">
             
             <option value=""disabled selected><?php echo $year?></option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
          </select>
  </div>
  <div class="mb-3">
    <select class="form-select" name= "letter"aria-label="Default select example">
             
             <option value=""disabled selected><?php echo $letter?></option>
                                       <option>A</option>
                                        <option>B</option>
                                        <option>C</option>
                                        <option>D</option>
                                        <option>E</option>
                                        <option>F</option>
                                        <option>G</option>
          </select>
          <input type="hidden" ></input>
  </div>
  <button type="submit" class="btn btn-success" name="Update" onclick="return confirm('Save changes?');">Update</button> 
  <a type="submit" class="btn btn-default" href="admin_homepage.php">Back to List</a>
 
 <section class="u-align-center u-clearfix u-section-1" id="sec-3631">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
</form>
</div></header>
 <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-e055"><div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">AUTOMATED EXAM SYSTEM  &copy; 2020</p>
      </div></footer>
</body>
</html>