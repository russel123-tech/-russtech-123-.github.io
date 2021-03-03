<?php 

session_start();

	if(!isset($_SESSION['userlog'])){
		header("Location: proflogin.php");
	}

?>

 <html>
<head>
<meta name = "viewport" content = "width=device-width, initial-scale=1.0">
	<title>Quezon City University</title>
	<link rel = "stylesheet" href = "tstyle.css">
	<link rel ="icon"  href="pic/qcu.ico">
	<link rel ="icon"  href="tpic/qcu.png">
</head>

<body class = "hm">    
	<form action= method="POST">
	<div class = "home">
		
		
		<div id="mySidenav" class="sidenav">	
          
			<div id = "navl" class = "navl">

				<h4>Quezon City University</h4>
	
			</div>

  			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&#9776;</a>
			 
  			<img src = "tpic/user1.png">

  			<div class = "view" >


  			</div>	
			
			
			<p>General</p>
			  
			  <a href="manage_announcement.php" class = "MA" target="set"><img src = "tpic/ANNOUNCEMENT.png" class = "MA">Manage Announcement</a>
			  <a href="exam_management.php" class = "EM" target="set"><img src = "tpic/EXAM MANAGEMENT.png" class ="EM">Exam Management</a>
			  <a href="calendarform.html" class = "SP" target="set"><img src = "tpic/progress icon.png" class = "SP">Student's Progress</a>
			  <a href="calendarform.html" class = "ED" target="set"><img src = "tpic/EXAM DETECTION.png" class = "ED" >Exam Detection</a>
			  <a href="prof_calendar.php" class = "CA" target="set"><img src = "tpic/calendars.png" class = "CA" >Calendar</a>
			  <p>Settings</p>		  
			  <a href="teacherprofile.html" class = "Prof" target="set"><img src = "tpic/user.png" class = "Prof" >Profile</a>
			   <a href="logout.php" name="logout"class = "LO" target="set"><img src = "tpic/logout.png" class = "LO" >Logout</a>

			   


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