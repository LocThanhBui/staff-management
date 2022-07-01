<?php
include_once 'connect_db.php';
ob_start();
?>
<html lang="en">

<head>
  <title>Training Program_No04</title>
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

        var department_code = $(this).closest('.tr_action').find('td:nth-child(1)').text();
        var department_name = $(this).closest('.tr_action').find('td:nth-child(2)').text();
        var tel = $(this).closest('.tr_action').find('td:nth-child(3)').text();
        var mail = $(this).closest('.tr_action').find('td:nth-child(4)').text();
        var desc = $(this).closest('.tr_action').find('td:nth-child(5)').text();
        var note = $(this).closest('.tr_action').find('td:nth-child(6)').text();
        var useflag = $(this).closest('.tr_action').find('td:nth-child(7)').text();

        function checkUpdate() {

        }

        $('#btnUpdate').click(function(e) {
          e.preventDefault();
          $('#code').val(department_code);
          $('#name').val(department_name);
          $('#tel').val(tel);
          $('#mail').val(mail);
          $('#desc').val(desc);
          $('#note').val(note);
          $('#useflag').val(useflag);
        });

        $('#btnDelete').click(function(e) {
          e.preventDefault();
          $('#code_delete').val(department_code);
          $('#name_delete').val(department_name);
          $('#tel_delete').val(tel);
          $('#mail_delete').val(mail);
          $('#desc_delete').val(desc);
          $('#note_delete').val(note);
          $('#useflag_delete').val(useflag);
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
  </style>
</head>

<body>
  <?php
  if (!empty($_POST["btn_Delete"]) && isset($_POST['code'])) {
    $sqlDelete = "UPDATE `m_department` SET `useflag` = false where `department_code` =" . $_POST['code'];
    if (mysqli_query($conn, $sqlDelete)) {
      header("location: training-program-no04.php");
      ob_end_flush();
    } else {
      $res = "Lỗi không thể xóa dữ liệu!" . mysqli_error($conn);
    }
  }
  ?>
  <div class="container">
    <h3>
      DANH SÁCH
    </h3>
    <h4>DEPARTMENT MASTER MAINTENANCE</h4>

    <div class="container mt-3 ">
      <table class="table table-bordered" id="tbl">
        <thead class="thead-dark">

          <tr>
            <th class="col-sm-4">DEPARTMENT CODE</th>
            <th>DEPARTMENT NAME</th>
            <th id="onHide"> TEL</th>
            <th id="onHide"> MAIL</th>
            <th id="onHide"> DESCRIPTION</th>
            <th id="onHide"> NOTE</th>
            <th id="onHide"> USEFLAG</th>
          </tr>
        </thead>
        <?php

        $sql = "SELECT * FROM `m_department` WHERE `useflag` = 1";
        $result = mysqli_query($conn, $sql);

        while ($row =  mysqli_fetch_assoc($result)) {
          $department_code = $row["department_code"];
          $department_name = $row["department_name"];
          $tel = $row["tel"];
          $mail = $row["mail"];
          $desc = $row["description"];
          $note = $row["note"];
          $useflag = $row["useflag"];

        ?>

          <tbody>
            <?php if ($useflag == 1) : ?>
          <tbody>
            <tr class="tr_action">
              <td><?php echo $department_code; ?></td>
              <td><?php echo $department_name; ?></td>
              <td id="onHide"><?php echo $tel; ?></td>
              <td id="onHide"><?php echo $mail; ?></td>
              <td id="onHide"><?php echo $desc; ?></td>
              <td id="onHide"><?php echo $note; ?></td>
              <td id="onHide"><?php echo $useflag; ?></td>

            </tr>
          </tbody>
        <?php endif; ?>

      <?php } ?>
      <tr>
        <td>
          <button class="btn btn-outline-success" data-bs-toggle="modal" id="btnAdd" data-bs-target="#myModalAdd">Add</button>
          <button class="btn btn-outline-warning" data-toggle="modal" id="btnUpdate" data-target="#myModalUpdate">Update</button>
          <button class="btn btn-outline-danger" data-toggle="modal" id="btnDelete" data-target="#myModalDelete">Delete</button>
        </td>
        <td>

        </td>
      </tr>
      </table>
    </div>

    <!-- Update -->
    <div class="modal fade" id="myModalUpdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form action="" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">UPDATE DEPARTMENT</h5>
              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <table class="table table-bordered bg-secondary text-white">
                <?php
                $query = mysqli_query($conn, "select * from `m_department`");
                $row = mysqli_fetch_assoc($query);
                if (isset($_POST['btn_Update']) && isset($_POST['department_code'])) {

                  $department_name = $_POST['department_name'];
                  $tel = $_POST['tel'];
                  $mail = $_POST['mail'];
                  $desc = $_POST['desc'];
                  $note = $_POST['note'];
                  $flag = $_POST['useflag'];

                  $sqlUpdate = "UPDATE `m_department` SET `name`='$department_name',`tel`=' $tel',`mail`='$mail',`description`=' $desc',`note`=' $note',`useflag`='$flag' WHERE `department_code` =" . $_POST['code'];

                  if (mysqli_query($conn, $sqlUpdate)) {
                    header("location: training-program-no04.php");
                    ob_end_flush();
                  } else {
                    $res = "Lỗi không thể sửa dữ liệu!" . mysqli_error($conn);
                  }
                }

                ?>

                <tr>
                  <td>
                    DEPARTMENT CODE
                  </td>
                  <td>
                    <input type="text" id="code" value="<?php echo $row["department_code"]; ?>" name="code" readonly>
                  </td>
                </tr>
                <tr>
                  <td>DEPARTMENT NAME</td>
                  <td><input type="text" id="name" name="name" value="<?php echo $row["department_name"]; ?>"></td>
                </tr>
                <tr>
                  <td>TEL</td>
                  <td><input type="text" id="tel" name="tel" value="<?php echo $row["tel"]; ?>"></td>
                </tr>
                <tr>
                  <td>MAIL</td>
                  <td><input type="email" id="mail" name="mail" value="<?php echo $row["mail"]; ?>"></td>
                </tr>
                <tr>
                  <td>DESCRIPTION</td>
                  <td><input type="text" id="desc" name="desc" value="<?php echo $row["description"]; ?>"></td>
                </tr>
                <tr>
                  <td>NOTE</td>
                  <td><input type="text" id="note" name="note" value="<?php echo $row["note"]; ?>"></td>
                </tr>
                <tr id="onHide">
                  <td>USE FLAG</td>
                  <td><input type="text" id="useflag" name="useflag" value="<?php echo $row["useflag"]; ?>"></td>
                </tr>

                <tr>
                  <td></td>
                  <td><button type="submit" class="btn btn-primary float-right padd" name="btn_Update" id="btn_Update" value="OK">OK</button>
                    <input type="button" class="btn btn-danger float-right" data-dismiss="modal" name="btn_Cancel" value="Cancel">
                  </td>
                </tr>
              </table>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Add -->
    <div class="modal fade" id="myModalAdd" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ModalLabel">ADD DEPARTMENT</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container mt-3">
              <form action="" method="POST">
                <table class="table bg-secondary text-white">
                  <?php
                  include 'connect_db.php';
                  if (isset($_POST['btn_Add'])) {
                    $department_code = $_POST['code'];
                    $department_name = $_POST['name'];
                    $tel = $_POST['tel'];
                    $mail = $_POST['mail'];
                    $desc = $_POST['desc'];
                    $note = $_POST['note'];
                    $flag = $_POST['useflag'];


                    $sqlAdd = " INSERT INTO `m_department` (`department_code`, `department_name`, `tel`, `mail`, `description`, `note`, `useflag`) VALUES ('$department_code','$department_name','$tel','$mail','$desc','$note',1)";

                    $sqlRepeat = "SELECT * FROM `m_department` WHERE `department_code`='$department_code'";
                    $resultRepeat = mysqli_query($conn, $sqlRepeat);
                    if (mysqli_num_rows($resultRepeat) > 0) {
                      echo '<script type="text/javascript"> alert("Department Code bị trùng lặp, vui lòng nhập lại!") </script>';
                      exit;
                    }

                    if (mysqli_query($conn, $sqlAdd)) {
                      header("location: training-program-no04.php");
                      ob_end_flush();
                    } else {

                      $result = "Lỗi không thể thêm vào Database!" . mysqli_error($conn);
                    }
                  } ?>

                  <tr>
                    <td>
                      DEPARTMENT CODE
                    </td>
                    <td>
                      <input type="text" value="" name="code">
                    </td>
                  </tr>
                  <tr>
                    <td>DEPARTMENT NAME</td>
                    <td><input type="text" name="name" value=""></td>
                  </tr>
                  <tr>
                    <td>TEL</td>
                    <td><input type="text" name="tel" value=""></td>
                  </tr>
                  <tr>
                    <td>MAIL</td>
                    <td><input type="email" name="mail" value=""></td>
                  </tr>
                  <tr>
                    <td>DESC</td>
                    <td><input type="text" name="desc" value=""></td>
                  </tr>
                  <tr>
                    <td>NOTE</td>
                    <td><input type="text" name="note" value=""></td>
                  </tr>
                  <tr id="onHide">
                    <td>USE FLAG</td>
                    <td><input type="text" name="useflag" value=""></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td>
                      <button type="submit" class="btn btn-primary float-right padd" name="btn_Add" id="btn_Add">OK</button>
                      <button type="button" class="btn btn-danger float-right" data-bs-dismiss="modal">Cancel</button>
                    </td>
                  </tr>
                </table>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Delete -->
    <div class="modal fade" id="myModalDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form action="" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">DELETE DEPARTMENT</h5>
              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <table class="table table-bordered bg-secondary text-white">
                <?php
                $query = mysqli_query($conn, "SELECT * FROM `m_department` WHERE `useflag` = 1;");
                $row = mysqli_fetch_assoc($query);
                ?>
                <tr>
                  <td>
                    DEPARTMENT CODE
                  </td>
                  <td>
                    <input type="text" id="code_delete" value="<?php echo $row["department_code"]; ?>" name="code" disabled>
                  </td>
                </tr>
                <tr>
                  <td>DEPARTMENT NAME</td>
                  <td><input type="text" id="name_delete" name="name" value="<?php echo $row["department_name"]; ?>" disabled></td>
                </tr>
                <tr>
                  <td>TEL</td>
                  <td><input type="text" id="tel_delete" name="tel" value="<?php echo $row["tel"]; ?>" disabled></td>
                </tr>
                <tr>
                  <td>MAIL</td>
                  <td><input type="email" id="mail_delete" name="mail" value="<?php echo $row["mail"]; ?>" disabled></td>
                </tr>
                <tr>
                  <td>DESCRIPTION</td>
                  <td><input type="text" id="desc_delete" name="desc" value="<?php echo $row["description"]; ?>" disabled></td>
                </tr>
                <tr>
                  <td>NOTE</td>
                  <td><input type="text" id="note_delete" name="note" value="<?php echo $row["note"]; ?>" disabled></td>
                </tr>
                <tr id="onHide">
                  <td>USE FLAG</td>
                  <td><input type="text" id="useflag_delete" name="useflag" value="<?php echo $row["useflag"]; ?>" disabled></td>
                </tr>

                <tr>
                  <td></td>
                  <td>
                    <button type="submit" class="btn btn-primary float-right padd" name="btn_Delete" id="btn_Delete" value="OK">OK</button>
                    <input type="button" class="btn btn-danger float-right " data-dismiss="modal" name="btn_Cancel" value="Cancel">
                  </td>
                </tr>
              </table>
            </div>
          </form>
        </div>
      </div>
    </div>
</body>

</html>