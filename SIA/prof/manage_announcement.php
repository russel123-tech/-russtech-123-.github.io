<?php
  include("config.php");

?>
<html>
<head>

    <title>Quezon City University</title>
    <link rel ="icon"  href="tpic/qcu.ico">
    <link rel="stylesheet" type="text/css" href="design.css">
</head>



<body class = "MA">
 


    <div class = "MAc">

        <label class = "MAl">MANAGE ANNOUNCEMENT</label>
       

        <input type = "text" class ="iS" placeholder= "Search Title" name="valueToSearch"> </input>


        <button class = "MSearch" name="search_btn">Search</button>

        <span class = "bgko"><button class = "plus" id = "plus" >+ Add New Announcement</button></span>

        <?php
        $result = mysqli_query($conn,"SELECT * FROM announcement_tbl");
        if (mysqli_num_rows($result) > 0) {
        ?>

        <table class = "tMA">

            <thead>
                <th>Author&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th>Title&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th>Details&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th>Created On</th>
                <th>Announce to</th>
                <th>Action</th>

            </thead>

            <tbody>
              <?php
                $i=0;
                  while($row = mysqli_fetch_array($result)) {
              ?>
                    <tr>
                    <td><?php echo $row["Author"]; ?></td>
                    <td><?php echo $row["Title"]; ?></td>
                    <td><?php echo $row["Details"]; ?></td>
                    <td><?php echo $row["Created_On"]; ?></td>
                    <td><?php echo $row["Announce_to_class"]; ?>
                    <td>
                     <a href='editannouncement.php?author=<?php echo $row["Author"]?>&Title=<?php echo $row["Title"]?>&Details=<?php echo $row["Details"];?>&Class=<?php echo $row["Announce_to_class"];?>'>Edit</a>
                     <a href="deleteannouncement.php?Title=<?php echo $row["Title"]; ?>" onclick="return confirm('Are you sure you want to delete the selected row? You cannot undone once you delete.');">Delete</a>
                    </td>
                    </td>
                    </tr>
                    <?php
                    $i++;
                    }
                    ?>
               
            </tbody>    



        </table>
      <?php
      }
        else{
          echo "No result found";
            }
        ?>

    </div>   

    <hr class = "MNA">


    <form action="insertannouncement.php" method="POST">
    <div id="mMMA" class="mMA">
   
        <div class = "mc">
      
            <div class="mh">
      
                <span class="close">&times;</span>
      
                <label class = "lm">+ Add New Announcement</label>
    
            </div>
    
            <div class="mb">
                <p>Author<label class = "imp">*</label></p>
                <textarea class = "title" name="author"></textarea>

                <p>Title<label class = "imp">*</label></p>
                <textarea class = "title" name="title"></textarea>
       
                <p>Details<label class = "imp">*</label></p>
                <textarea class = "Details" name="details"></textarea>

                <p class = "ATC">Announce to<label class = "imp">*</label></p>


                 <select class = "section" name="Course"> 
  
                    <option value=""disabled selected>Course</option>

                    <?php
                      $sql= mysqli_query($conn, "select * from course_tbl order by CourseCode ");

                      while ($row = mysqli_fetch_array ($sql)) 
                      {
                        ?>
                        <option value= "<?php echo $row['CourseCode'];?>">
                        <?php echo $row['CourseCode'];?></option>
                        <?php

                      }
                    ?>

                </select>
                
               
     
                <button class = "clear" >CLEAR</button>
                <button class = "create" name="create" >CREATE</button>

            </div>
    
  
        </div>
  
 
    </div>
  </form>
  

 <script>
  // Get the modal
  
  var modal = document.getElementById("mMMA");
  
  // Get the button that opens the modal

  var btn = document.getElementById("plus");
  
  // Get the <span> element that closes the modal

  var span = document.getElementsByClassName("close")[0];
  
  // When the user clicks the button, open the modal 

  btn.onclick = function() {

    modal.style.display = "block";

  }
  
  // When the user clicks on <span> (x), close the modal

  span.onclick = function() {

    modal.style.display = "none";

  }
  
  // When the user clicks anywhere outside of the modal, close it

  window.onclick = function(event) {

    if (event.target == modal) {

      modal.style.display = "none";

    }

  }

</script>




</body>




</html>