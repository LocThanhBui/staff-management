<?php
include 'connect_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['code_1']) && isset($_POST['code_2'])) {
    $code_1 = $_POST['code_1'];
    $code_2 = $_POST['code_2'];
    if($code_1 > $code_2) {
      echo '<script type="text/javascript"> alert("Staff code bị trùng lặp, vui lòng nhập lại!") </script>';
      header("location: training-program-no02.php");
    }
    if($code_1 == '' && $code_2 == '') {
      
    }
  }
  if (isset($_POST['id_code_1'])) {
    $query = mysqli_query($conn, "SELECT  `m_user`.`code`,`m_user`.`name`,`m_user`.`birthday`,`m_user`.`tel1`,`m_user`.`tel2`,`m_user`.`tel3`,`m_user`.`zipno`,
    `m_user`.`address1`,`m_user`.`address2`,`m_user`.`note`,`m_department`.`department_code`, `m_department`.`department_name` 
    FROM `m_department`, `m_user` 
    WHERE `m_user`.`department_code` = `m_department`.`department_code` AND `code` BETWEEN 1 AND '$id_code_1'");

    if ($query->num_rows > 0) {
      $phay = ",";
      $filename = "staffmaster_data" . date('Y-m-d');
      $f = fopen('php://output', 'w');
      $fields = array("CODE", "NAME", "BIRTHDAY", "TEL1", "TEL2", "TEL3", "ZIPNO", "ADDRESS1", "ADDRESS2", "NOTE", "DEPARTMENT CODE", "DEPARTMENT NAME");
      fputcsv($f, $fields, $phay);
      while ($row = $query->fetch_assoc()) {
        $lineData = array($row['code'], $row['name'], $row['birthday'], $row['tel1'], $row['tel2'], $row['tel3'], $row['zipno'], $row['address1'], $row['address2'], $row['note'], $row['department_code'], $row['department_name']);
        fputcsv($f, $lineData, $phay);
      }
      error_reporting();
      fseek($f, 0);
      header('Content-Type: staff_master/csv');
      header('Content-Disposition: attachment; filename="' . $filename . '";');
      fpassthru($f);
    }
    exit;
  }
  if (isset($_POST['id_code_2'])) {
    $query = mysqli_query($conn, "SELECT  `m_user`.`code`,`m_user`.`name`,`m_user`.`birthday`,`m_user`.`tel1`,`m_user`.`tel2`,`m_user`.`tel3`,`m_user`.`zipno`,
    `m_user`.`address1`,`m_user`.`address2`,`m_user`.`note`,`m_department`.`department_code`, `m_department`.`department_name` 
    FROM `m_department`, `m_user` 
    WHERE `m_user`.`department_code` = `m_department`.`department_code` AND `code` BETWEEN 1 AND '$id_code_2'");

    if ($query->num_rows > 0) {
      $phay = ",";
      $filename = "staffmaster_data" . date('Y-m-d');
      $f = fopen('php://output', 'w');
      $fields = array("CODE", "NAME", "BIRTHDAY", "TEL1", "TEL2", "TEL3", "ZIPNO", "ADDRESS1", "ADDRESS2", "NOTE", "DEPARTMENT CODE", "DEPARTMENT NAME");
      fputcsv($f, $fields, $phay);
      while ($row = $query->fetch_assoc()) {
        $lineData = array($row['code'], $row['name'], $row['birthday'], $row['tel1'], $row['tel2'], $row['tel3'], $row['zipno'], $row['address1'], $row['address2'], $row['note'], $row['department_code'], $row['department_name']);
        fputcsv($f, $lineData, $phay);
      }
      error_reporting();
      fseek($f, 0);
      header('Content-Type: staff_master/csv');
      header('Content-Disposition: attachment; filename="' . $filename . '";');
      fpassthru($f);
    }
    exit;
  }

  if (!isset($_POST['useflag'])) {
    $query = mysqli_query($conn, "SELECT  `m_user`.`code`,`m_user`.`name`,`m_user`.`birthday`,`m_user`.`tel1`,`m_user`.`tel2`,`m_user`.`tel3`,`m_user`.`zipno`,
    `m_user`.`address1`,`m_user`.`address2`,`m_user`.`note`,`m_department`.`department_code`, `m_department`.`department_name` 
    FROM `m_department`, `m_user` 
    WHERE `m_user`.`department_code` = `m_department`.`department_code` AND `code` BETWEEN '$code_1' AND '$code_2'");

    if ($query->num_rows > 0) {
      $dauPhay = ",";
      $filename = "data_staff_master" . date('Y-m-d');
      $f = fopen('php://output', 'w');
      $fields = array("CODE", "NAME", "BIRTHDAY", "TEL1", "TEL2", "TEL3", "ZIPNO", "ADDRESS1", "ADDRESS2", "NOTE", "DEPARTMENT CODE", "DEPARTMENT NAME");
      fputcsv($f, $fields, $dauPhay);
      while ($row = $query->fetch_assoc()) {
        $lineData = array($row['code'], $row['name'], $row['birthday'], $row['tel1'], $row['tel2'], $row['tel3'], $row['zipno'], $row['address1'], $row['address2'], $row['note'], $row['department_code'], $row['department_name']);
        fputcsv($f, $lineData, $dauPhay);
      }
      
      error_reporting();
      fseek($f, 0);
      header('Content-Type: staff_master/csv');
      header('Content-Disposition: attachment; filename="' . $filename . '";');
      fpassthru($f);

    }

    exit;
  } else {
    if (isset($_POST['useflag'])) {
      $query = mysqli_query($conn, "SELECT `m_user`.`code`,`m_user`.`name`,`m_user`.`birthday`,`m_user`.`tel1`,`m_user`.`tel2`,`m_user`.`tel3`,`m_user`.`zipno`, `m_user`.`address1`,`m_user`.`address2`,`m_user`.`note`,`m_department`.`department_code`, `m_department`.`department_name` FROM `m_department`, `m_user` WHERE `m_user`.`department_code` = `m_department`.`department_code` AND `code` BETWEEN '$code_1'  AND '$code_2' AND `m_user`.`useflag` = 1");

      if ($query->num_rows > 0) {
        
        $dauPhay = ",";
        $filename = "data_staff_master" . date('Y-m-d');
        $f = fopen('php://output', 'w');
        $fields = array("CODE", "NAME", "BIRTHDAY", "TEL1", "TEL2", "TEL3", "ZIPNO", "ADDRESS1", "ADDRESS2", "NOTE", "DEPARTMENT CODE", "DEPARTMENT NAME");
        fputcsv($f, $fields, $dauPhay);
        while ($row = $query->fetch_assoc()) {
          $lineData = array($row['code'], $row['name'], $row['birthday'], $row['tel1'], $row['tel2'], $row['tel3'], $row['zipno'], $row['address1'], $row['address2'], $row['note'], $row['department_code'], $row['department_name']);
          fputcsv($f, $lineData, $dauPhay);
        }
        error_reporting();
        fseek($f, 0);
        header('Content-Type: staff_master/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '";');
        fpassthru($f);
      }
      exit;
    }
  }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Training Program_No02</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <style>
    .table {
      width: 50%;
      margin: 0 auto;
    }

    .input__name {
      margin-left: 68px;
    }

    .input__flag {
      margin-left: 24px;
    }

    #id__code1 {
      margin-left: 26px;
    }

    #btnCancel {
      margin-left: 60px;
    }

    #td_control {
      text-align: center;

    }

    .p_control {
      display: inline-block;
    }

    .input-control {
      margin-left: 68px;
    }

    .form-control {
      display: inline-block;
      width: 75%;
      margin-left: 69px;
    }
  </style>
  <script type="text/javascript">
    $(document).ready(function() {
      $(".search").keyup(function() {
        var dataSearch = ($('.search').val());
        $.post('xulyesearch.php', {
          data: dataSearch
        }, function(data) {
          $('#searchValue').html(data);
        })
      })
    })
  </script>
  <script>
    var exportCSV =  document.querySelector('#btnEx');
    function checkExport(){
      exportCSV = alert('Bạn có muốn bắt đầu export không?' );
      exportCSV=  event.defaultPrevented();
    }
  </script>
</head>

<body>

  <div class="container">
    <form action="" method="post">
      <table class="table bg-secondary text-white">
        <th>STAFF MASTER CSV EXPORT</th>

        <tr>
          <td>
            <label for="">STAFF CODE</label>
            <input type="text" name="code_1" id="id__code1" placeholder="From" pattern="[0-9]{1,10}" 
                    title="StaffCode không vượt quá 10 ký tự" required>
            ~
            <input type="text" name="code_2" id="id__code2" placeholder="To" pattern="[0-9]{1,10}" 
                    title="StaffCode không vượt quá 10 ký tự" required>
          </td>
        </tr>
        <tr>
          <td> NAME
            <form action="" method="post">
              <input type="text" class="search form-control" placeholder="Search staff name">
              <p id="searchValue"></p>
            </form>
          </td>
        </tr>
        <tr>
          <td> DELETE FLAG<input type="checkbox" value="" class="check__flag input__flag" name="useflag" id="id__checkbox">
            <p class="p_control "> Không xuất data đã xóa</p>
          </td>
        </tr>
        <tr>
          <td id="td_control">
            <button type="submit" class="btn btn-success" name="export_csv_data" id="btnEx" onclick="checkExport()">Export</button>
            <a href="./index.php" class="btn btn-danger" id="btnCancel">Cancel</a>
          </td>
        </tr>

      </table>
    </form>
  </div>

</body>

</html>