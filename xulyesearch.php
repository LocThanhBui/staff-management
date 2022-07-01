<?php
include 'connect_db.php';
$data = $_POST['data'];
$query = mysqli_query($conn, "SELECT * FROM `m_user` WHERE `name` LIKE '%$data%'");
$num_rows = mysqli_num_rows($query);
if ($num_rows > 0) {
  while ($row = mysqli_fetch_array($query)) {
?>
    <p id="searchValue"><?php echo $row["name"]; ?></p><br />
<?php
  }
}
?>