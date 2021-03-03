<?php
require_once('config.php');
?>

<html>
<head>
  <meta name = "viewport" content = "width=device-width, initial-scale=1.0">

  <title>Quezon City University</title>
  <link rel = "stylesheet" href = "cssmoto.css">
  <link rel ="icon"  href="pic/qcu.ico">
</head>
<body>

<div>
  <?php
  
  ?>  
</div>

<div>
  <form action="adminreg.php" method="post">
    <div class="container">
      
      <body class = "main">

    <div class = "login">

        <h1>Registration For Admin</h1><br></br>

          <label for="name"><b>Name</b></label>
          <input id="name" type="text" name="name" required>

          <label for="email"><b>Email Address</b></label>
          <input class="form-control" id="email"  type="email" name="email" required>

          <label for="password"><b>Password</b></label>
          <input class="form-control" id="password"  type="password" name="password" required>
          <hr class="mb-3">
          <input class="btn btn-primary" type="submit" id="register" name="create" value="Sign Up">
        </form>
        <form class = "f" action = "adminlogin.php">
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


      var name      = $('#name').val();
      var email     = $('#email').val();
      var password  = $('#password').val();
      

        e.preventDefault(); 

        $.ajax({
          type: 'POST',
          url: 'process.php',
          data: {name: name,email: email,password: password},
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