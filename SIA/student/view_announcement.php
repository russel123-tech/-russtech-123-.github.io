<html>
<head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</head>
<head>
<link rel="stylesheet" type="text/css" href="design.css">
<title>Quezon City University</title><link rel="shortcut icon" type="image/x-icon" href="1.ico"/>
</head>

<body>

<div class="container">
<h1 class="underline">ANNOUCEMENTS</h1>
<br>
<br>
<?php
    session_start();
    include ("config.php");
    $query = "SELECT * from announcement_tbl where Announce_to_class = 'BSIT'";
    $query_run = mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($query_run)){
      ?>
<center><div class="card border-success mb-3" style="max-width: 50rem;">
	<?php 
		$date = $row['Created_On'];

		$createDate = new DateTime($date);

		$strip = $createDate->format('Y-m-d');
		 // string(10) "2012-09-09"
	?>
  <div class="card-header bg-transparent border-success" text-align="left"><?php echo $row['Author'];?> <br> <?php echo $strip;?></div>
  <div class="card-body text-generic">
    <h5 class="card-title"><?php echo $row['Title'] ?></h5>
    <p class="card-text"><?php echo $row['Details'] ?></p>
  </div>
</div> </center>
 <?php
    }
    ?>



</body>




</html>