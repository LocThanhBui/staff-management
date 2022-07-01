<?php
include 'connect_db.php';
if (isset($_POST['request'])) {
  $request = $_POST['request'];
  $query = "SELECT `m_user`.`code`,`m_user`.`name`,`m_department`.`department_code`, `m_department`.`department_name` FROM `m_department`, `m_user` WHERE `m_user`.`department_code` = `m_department`.`department_code` and `m_department`.`department_code` = '$request' GROUP BY `m_user`.`name`,`m_department`.`department_name`,`m_user`.`code`";
  $result = mysqli_query($conn, $query);
  $count = mysqli_num_rows($result);

?>
  <table class="table table-dark" id="table">
    <?php
    if ($count) {

    ?>
      <thead>
        <tr>
          <th>STAFF CODE</th>
          <th>STAFF NAME</th>
          <th>DEPARTMENT NAME</th>
        </tr>
      <?php
    }

      ?>
      </thead>
      <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td> <?php echo $row['code'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td>

              <?php echo $row['department_name'] ?>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
  </table>
<?php
}
?>