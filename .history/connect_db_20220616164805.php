<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "https://jouhqpgnhosting_19003568.loc.bt/";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("404: Không thể kết nối Database: " . $conn->connect_error);
  exit();
}

// mysqli_close($conn);
