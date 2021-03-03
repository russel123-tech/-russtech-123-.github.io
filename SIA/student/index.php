<?php 

session_start();

	if(!isset($_SESSION['uname'])){
		header("Location: studentlogin.php");
	}
?>

 <html>
<head>
<meta name = "viewport" content = "width=device-width, initial-scale=1.0">
	<title>Quezon City University</title>
	<link rel = "stylesheet" href = "sstyle.css">
	<link rel ="icon"  href="spic/qcu.ico">

</head>

<body class = "hm">    
	<form action= method="POST">
	<div class = "home">
		
		
		<div id="mySidenav" class="sidenav">	
          
			<div id = "navl" class = "navl">

				<h4>Quezon City University</h4>
	
			</div>

  			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&#9776;</a>
			 
  			<img src = "spic/user.png">

  			<div class = "view" >

  				

  			</div>	
			
			
			<p>General</p>
			  
			  <a href="view_announcement.php" class = "Ann" target="set"><img src = "spic/Ann.png" class = "Ann">Announcement</a>
			  <a href="list_exam.php" class = "Ex" target="set"><img src = "spic/ex.png" class = "Ex">Exams</a>
 			  <a href="Examresultform.html" class = "VR" target="set"><img src = "spic/VR.png" class = "VR">View Result</a>
			  <a href="calendarform.html" class = "Cal" target="set"><img src = "spic/cal.png" class = "Cal">Calendar</a>

			  <p>Settings</p>
			  
			  <a href="studentprofile.html" class = "Prof" target="set"><img src = "spic/profi.png" class = "Prof">Profile</a>
			  <a href="logout.php" name="logout" class = "LO"><img src = "spic/LO2.png" class = "LO">Logout</a>  


		</div>

		<div id = "head" class = "head">

			<span style="font-size:38px;cursor:pointer; color:white;" class = "openbtn" onclick="openNav()">&#9776;</span>
			</BR>

	

		</div>

		<iframe name = "set" >

		</iframe>	

	</div>	
</form>

<script>

	function openNav() {

  		document.getElementById("mySidenav").style.width = "325px";
		  
	}

	function closeNav() {

  		document.getElementById("mySidenav").style.width = "0";

	}


</script>	

</body>	

</html>