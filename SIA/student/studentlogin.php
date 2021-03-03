<?php

	session_start();
?>

<html>
<head>
<meta name = "viewport" content = "width=device-width, initial-scale=1.0">

	<title>Quezon City University</title>
	<link rel = "stylesheet" href = "style.css">
	<link rel ="icon"  href="pic/qcu.ico">
	
</head>

<body class = "main">

		<div class = "login">

			<img src = "pic/ava.png" class = "ava">

				<br></br>

			<form action="studentreg.php" method="post">

				<img src = "pic/ava.png" class = "ava">

				<input type="text" name="username" id="username" class="form-control input_user" placeholder = "Student Email" required>

				<input type="password" name="password" id="password" class="form-control input_pass" placeholder = "Password" required><br></br>

				<button type="button" name="button" id="login" class="btn login_btn">Login</button>

				<p>Not Registered?<a href = "studentreg.php" class = "Create">Create an account</a></p>

			</form>
				
		</div>

		<div class = "bar">

			<ul>

				<li><a href = "#" class = "U">About Us</li></a>
				<li><a href = "#" class = "U">Contact Us</li></a>

			</ul>	

		</div>	

		

</body>

</html>

<script src="http://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
	$(function(){
		$('#login').click(function(e){

			var valid = this.form.checkValidity();

			if(valid){
				var username = $('#username').val();
				var password = $('#password').val();
			}

			e.preventDefault();

			$.ajax({
				type: 'POST',
				url: 'jslogin.php',
				data:  {username: username, password: password},
				success: function(data){
					alert(data);
					if($.trim(data) === "Welcome Student!"){
						setTimeout(' window.location.href = "stud_homepage.php"', 1000);
					}
				},
				error: function(data){
					alert('there were erros while doing the operation.');
				}
			});

		});
	});
</script>
</body>
</html>