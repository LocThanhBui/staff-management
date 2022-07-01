<?php
include 'connect_db.php';
?>

<html lang="en">

<head>
  <title>Training Program_No05</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <style>
    .select_class {
      margin-bottom: 10px;
      width: 42%;
    }

    .btn_control {
      margin-bottom: 10px;
      margin-top: -35px;
    }
  </style>
  <script type="text/javascript">
    $(document).ready(function() {
      $("#fechval").on('change', function() {
        var value = $(this).val();
        $.ajax({
          url: "filter.php",
          type: "POST",
          data: 'request=' + value,
          success: function(data) {
            $(".table_form").html(data)
          }
        });
      });
    });
  </script>

</head>

<body>

  <div class="container">
    <h3> DANH SÁCH</h3>
    <h4> DEPARTMENT MASTER MAINTENANCE</h4>
<?php
  $query = mysqli_query($conn, "SELECT * FROM `m_department`");
  while($row = mysqli_fetch_assoc())
?>

    <div class="filters">
      <select id="fechval" name="fechval" class="form-control select_class">
        <option value="" name="">Choose a department</option>
        <option value="1">Phong Phat Trien He Thong </option>
        <option value="2">Phong Phat Trien San Pham</option>
        <option value="3">Phong Kinh Doanh</option>
      </select>
      <a href="./index.php" class="btn btn-danger float-right btn_control">Cancel</a>

    </div>

    <div class="table_form">
      <table class="table table-dark" id="table">
        <thead>
          <th>STAFF CODE</th>
          <th>STAFF NAME</th>
          <th>DEPARTMENT NAME</th>
        </thead>
        <tbody>
          <?php
          $query = ("SELECT `m_user`.`code`, `m_user`.`name`,`m_department`.`department_code` ,`m_department`.`department_name` FROM `m_department`, `m_user` WHERE `m_department`.`department_code` = `m_user`.`department_code`");
          $result = mysqli_query($conn, $query);
          while ($row = mysqli_fetch_assoc($result)) {
          ?>
            <tr>
              <td> <?php echo $row['code'] ?></td>
              <td><?php echo $row['name'] ?></td>
              <td>

                <?php echo $row['department_name'] ?></td>
            </tr>
          <?php
          }
          ?>
        </tbody>

      </table>

    </div>
  </div>

</body>

</html>