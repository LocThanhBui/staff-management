<?php
include_once 'connect_db.php';
?>
<html lang="en">

<head>
  <title>Training Program_No05-1</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.0.min.js"></script>
  <script type="text/javascript">
    $(function() {
      $('#tbl tr').click(function(e) {

        $('.tr_action').click(function() {
          $(this).parents('#tbl').find('.tr_action').each(function(index, element) {
            $(element).removeClass('onColor');
          });
          $(this).addClass('onColor');
        });

      });
    });
  </script>
  <script type="text/javascript">

  </script>
  <style>
    .onColor {
      background-color: #343A40;
      color: #fff;
    }

    #onHide {
      display: none !important;
    }

    .padd {
      margin-left: 18px;
      padding-left: 12px;
    }

    .btn_control {
      margin-bottom: 10px;
      margin-top: -35px;
    }
  </style>
</head>

<body>

  <div class="container">
    <h3>
      DANH SÁCH
    </h3>
    <h4>DEPARTMENT MASTER MAINTENANCE</h4>

    <div class="container mt-3 ">

    </div>
    <table class="table table-bordered" id="tbl">
      <thead class="thead-dark">

        <tr>
          <th class="col-sm-4">DEPARTMENT CODE</th>
          <th>DEPARTMENT NAME</th>
          <th>NUMBER OF PEOPLE </th>
        </tr>
      </thead>
      <?php

      $sql = "SELECT `m_department`.`department_code`, `m_department`.`department_name`, COUNT(*) AS 'NUM OF PEOPLE' FROM `m_department`, `m_user` WHERE `m_user`.`department_code` = `m_department`.`department_code` GROUP BY `department_code`";
      $query = mysqli_query($conn, $sql);

      while ($row =  mysqli_fetch_assoc($query)) {
        $department_code = $row["department_code"];
        $department_name = $row["department_name"];
        $num = $row["NUM OF PEOPLE"];
      ?>
        <tbody>
          <tr class="tr_action">
            <td><?php echo $department_code; ?></td>
            <td><?php echo $department_name; ?></td>
            <td><?php echo $num . "人"; ?></td>

          </tr>
        </tbody>

      <?php } ?>

    </table>
  </div>

</body>

</html>