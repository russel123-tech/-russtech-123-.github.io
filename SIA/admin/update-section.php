			<?php
			include 'config.php';

 						 if (isset($_POST['edit'])) {
                            $campus = ($_POST["Campus"]);
                            $course=  ($_POST["Course"]);
                            $year=    ($_POST["Year"]);
                            $lett_sec=($_POST["SectionLetter"]);
                            $section = $campus . $course ."-". $year .  $lett_sec;

                            mysqli_query($conn, "UPDATE info SET section='$section' WHERE id=$id");
                            $_SESSION['message'] = "Info updated!"; 
                            header('location: admin_homepage.php');}
			?>