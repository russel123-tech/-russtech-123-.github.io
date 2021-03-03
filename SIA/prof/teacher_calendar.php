<?php
  include("config.php");
  session_start();

  if(!isset($_SESSION['userlog_firstname']) AND !isset($_SESSION['userlog_lastname']) ){
    header("Location: proflogin.php");
  }
?>

<!DOCTYPE html>
<html style="font-size: 16px;">
    <head>


       <!-- BOOTSTRAP LINK -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.42/css/bootstrap-datetimepicker.min.css'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
        <link href='//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.min.css' rel='stylesheet' />
        <link href='//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.print.css' rel='stylesheet' media='print' />
        <link href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet" />
        <link href="css/bootstrap-colorpicker.min.css" rel="stylesheet" />
        <link href="css/bootstrap-timepicker.min.css" rel="stylesheet" />
        <script src='//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.3/moment.min.js'></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.min.js"></script>
        <script src='js/bootstrap-colorpicker.min.js'></script>
        <script src='js/bootstrap-timepicker.min.js'></script>
        <script src='js/main.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.42/js/bootstrap-datetimepicker.min.js'></script>
        <style>
            .fc th {
                padding: 10px 0px;
                vertical-align: middle;
                background:#F2F2F2;
            }
            .fc-day-grid-event>.fc-content {
                padding: 4px;
            }
            #calendar {
                max-width: 900px;
                margin: 0 auto;
            }
            .error {
                color: #ac2925;
                margin-bottom: 15px;
            }
            .event-tooltip {
                width:150px;
                background: rgba(0, 0, 0, 0.85);
                color:#FFF;
                padding:10px;
                position:absolute;
                z-index:10001;
                -webkit-border-radius: 4px;
                -moz-border-radius: 4px;
                border-radius: 4px;
                cursor: pointer;
                font-size: 11px;
            }
        </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Insert Announcement DB">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Professor Calendar</title>
    <link rel ="icon"  href="pic/qcu.ico">
    <link rel="stylesheet" href="nicepage.css" media="screen">
    <link rel="stylesheet" href="Professor-Home-Page.css" media="screen">
     <meta name="generator" content="Nicepage 3.6.1, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
     <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
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
    </head>
     
     <body class="u-body"><header class="u-clearfix u-grey-10 u-header u-header" id="sec-f4f2"><div class="u-clearfix u-sheet u-sheet-1">
        <nav class="navbar navbar-expand-lg navbar-transparent">
      <div class="container-fluid">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a href="#" class="u-image u-logo u-image-1" data-image-width="80" data-image-height="40">
          <img src="images/qcu.ico" class="u-logo-image u-logo-image-1" data-image-width="64">
        </a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="prof_homepage.php">Announcement</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="prof_exam.php">Exams</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="teacher_calendar.php">Calendar</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="#">Student Progress</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo($_SESSION['userlog_firstname']."". $_SESSION['userlog_lastname'] ); ?>
          </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
      </ul>
    </div>
  </div>
</nav>
       
      </div></header>
      <u><center><h2>Teacher's Calendar</h2></center></u>
      <br>
      
        <br>
        <div class="container">
            <div class="row clearfix">
                <div class="col-md-12 column">
                        <div id='calendar'></div>
                        <div id='datepicker'></div>
                </div>
            </div>
        </div>
        <div class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <div class="error"></div>
                        <form class="form-horizontal" id="crud-form">
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="title">Subject</label>
                                <div class="col-md-4">
                                    <input id="title" name="title" type="text" class="form-control input-md" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="time">Time</label>
                                <div class="col-md-4 input-append bootstrap-timepicker">
                                    <input id="time" name="time" type="text" class="form-control input-md" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="description">Description</label>
                                <div class="col-md-4">
                                    <textarea class="form-control" id="description" name="description" placeholder="Type of Exam, no. of items"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="color">Color</label>
                                <div class="col-md-4">
                                    <input id="color" name="color" type="text" class="form-control input-md" readonly="readonly" />
                                    <span class="help-block">Click to pick a color</span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
         </section>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-e055"><div class="u-clearfix u-sheet u-valign-middle u-sheet-1"
        <p class="u-small-text u-text u-text-variant u-text-1">AUTOMATED EXAM SYSTEM  &copy; 2020</p>
      </div></footer>
    </body>
</html>



