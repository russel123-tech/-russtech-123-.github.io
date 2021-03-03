<html>
<head>
<!-- BOOTSTRAP LINK -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <title>Edit Exam</title>
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
$name=$_GET['exam_name'];
$ins=$_GET['instruction'];
$start=$_GET['start'];
$end=$_GET['end'];
$passing=$_GET['passing'];
$open=$_GET['open'];
?>
<?php

if(isset($_POST['Update'])) // when click on Update button
{
    $name=$_GET['name'];
    $ins=$_GET['instruction'];
    $start=$_GET['start'];
    $end=$_GET['end'];
    $passing=$_GET['passing'];
    $open=$_GET['section'];
    $query= "UPDATE exam_table SET exam_name='".$name."',instruction='".$ins."', exam_start='".$start."', exam_end='".$end."', passing_grade='".$passing."', open_to='".$open."' WHERE exam_name='".$name."'";
    $data=mysqli_query($conn,$query);

    if($data)
    {

        header("Location:prof_exam.php");
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
    
    <h3>Update Exam</h3>
    <label for="exampleInputEmail1" class="form-label">Exam Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="name" value="<?php echo $name ?>"/>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Instruction</label>
     <input type="multiline" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="instruction" value="<?php echo $ins ?>"/>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Start</label>
     <input type="datetime-local" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="start" value="<?php echo $start  ?>"/>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Start</label>
     <input type="datetime-local" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="end" value="<?php echo $end  ?>"/>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Passing Mark in %</label>
     <input type="number" min="10" max="75" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="passing" value="<?php echo $passing  ?>"/>
  </div>

  <div class="mb-3">
    <select class="form-select" name= "section"aria-label="Default select example" >
              <option value=""disabled selected><?php echo $open  ?></option>
              <?php
                      $sql= mysqli_query($conn, "select * from section_tbl order by id ");

                      while ($row = mysqli_fetch_array ($sql)) 
                      {
                        ?>
                        <option value= "<?php echo $row['section'];?>" >
                        <?php echo $row['section'];?></option>
                        <?php

                      }
                    ?>
          </select>
  </div>
  <button type="submit" class="btn btn-success" name="Update" onclick="return confirm('Save changes?');">Update</button> 
  <a type="submit" class="btn btn-default" href="prof_exam.php">Back to List</a>
 
 <section class="u-align-center u-clearfix u-section-1" id="sec-3631">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
</form>
</div></header>
 <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-e055"><div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">AUTOMATED EXAM SYSTEM  &copy; 2020</p>
      </div></footer>
</body>
</html>