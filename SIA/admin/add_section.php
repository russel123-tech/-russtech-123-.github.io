  <?php
                                    include 'config.php';
                                    if (isset($_POST['submit'])) {

                                    $campus = ($_POST["Campus"]);
                                    $course=  ($_POST["Course"]);
                                    $year=    ($_POST["Year"]);
                                    $lett_sec=($_POST["SectionLetter"]);
                                      $section = $campus . $course . $year .  $lett_sec;

                                    $sql = "INSERT INTO section_tbl(section) VALUES ('".$section."')";
                                    $rs = mysqli_query($conn, $sql);
                                     $affectedRows = mysqli_affected_rows($conn);
                                    if ($affectedRows == 1) {
                                             echo "<script>document.location.href='admin_homepage.php'</script>";
                                    }
                                    else{
                                    echo "<script>alert('An error occurred while saving !');</script>";
                                    }

                                    mysqli_close($conn);
                                    }
                                    ?>
                                                                            
                                      