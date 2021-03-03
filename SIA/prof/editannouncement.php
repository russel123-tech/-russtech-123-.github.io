<?php

include "config.php"; // Using database connection file here
$Author=$_GET['author'];
$Title=$_GET['Title'];
$Details=$_GET['Details'];
$Announce_to_class=$_GET['Class'];
?>
<?php

if(isset($_POST['submit'])) // when click on Update button
{
    $Author=$_POST['author'];
    $title=$_POST['title'];
    $dets=$_POST['details'];
    $announce=$_POST['announceto'];

    $query= "UPDATE announcement_tbl SET Author='".$Author."',Title='".$title."', Details='".$dets."', Announce_to_class='".$announce."' WHERE Title='".$Title."'";
    $data=mysqli_query($conn,$query);

    if($data)
    {
        header("Location:manage_announcement.php");
    }

    else
    {
        echo ("Failed to update record!");
    }
}
?>

<h3>Update Data</h3>

<form method="POST">
  <input type="text" name="author" value="<?php echo $Author ?>"></input>
  <input type="text" name="title" value="<?php echo $Title ?>"></input>
  <input type="multiline" name="details" value="<?php echo $Details  ?>"></input>
  <input type="text" name="announceto" value="<?php echo $Announce_to_class  ?>"></input>
  <button type="submit" name="submit" value="Update" onclick="return confirm('Save changes?');">Update</button>
</form>
