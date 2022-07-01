<?php
$servername = "127.0.0.1:3310";
$username = "root";
$password = "";
$dbname = "staff_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("404: Không thể kết nối Database: " . $conn->connect_error);
  exit();
}

// mysqli_close($conn);
