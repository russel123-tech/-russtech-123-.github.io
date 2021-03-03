<?php
require_once('config.php');
?>

<html>
<head>
  <meta name = "viewport" content = "width=device-width, initial-scale=1.0">

  <title>Quezon City University</title>
  <link rel = "stylesheet" href = "csskoto.css">
  <link rel ="icon"  href="pic/qcu.ico">
</head>
<body>

<div>
  <?php
  
  ?>  
</div>

<div>
  <form action="profreg.php" method="post">
    <div class="container">
      
      <body class = "main">

    <div class = "login">

        <h1 style="text-align:center;">Registration Form</h1><br></br>

          <label for="firstname"><b>First Name</b></label>
          <input id="firstname" type="text" name="firstname" required>

          <label for="lastname"><b>Last Name</b></label>
          <input class="form-control" id="lastname"  type="text" name="lastname" required>

          <label for="email"><b>Email Address</b></label>
          <input class="form-control" id="email"  type="email" name="email" required>

          <label for="password"><b>Password</b></label>
          <input class="form-control" id="password"  type="password" name="password" required>
          <hr class="mb-3">
          <input class="btn btn-primary" type="submit" id="register" name="create" value="Sign Up">
        </form>
        <form class = "f" action = "proflogin.php">
        <button class="btn btnlog">LOGIN</button><br></br>
        </div>
      </div>
    </div>
  </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
  $(function(){
    $('#register').click(function(e){

      var valid = this.form.checkValidity();

      if(valid){


      var firstname   = $('#firstname').val();
      var lastname  = $('#lastname').val();
      var email     = $('#email').val();
      var password  = $('#password').val();
      

        e.preventDefault(); 

        $.ajax({
          type: 'POST',
          url: 'process.php',
          data: {firstname: firstname,lastname: lastname,email: email,password: password},
          success: function(data){
          Swal.fire({
                'title': 'Successful',
                'text': data,
                'type': 'success'
                })
              
          },
          error: function(data){
            Swal.fire({
                'title': 'Errors',
                'text': 'There were errors while saving the data.',
                'type': 'error'
                })
          }
        });

        
      }else{
        
      }

      



    });   

    
  });
  
</script>
</body>
</html>