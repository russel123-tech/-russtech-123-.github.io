<?php
$conn = new mysqli("localhost","root","","exam_sample");

// Check connection
if ($conn -> connect_errno) {
  echo "Failed to connect to MySQL: " . $conn -> connect_error;
  exit();
}
?>