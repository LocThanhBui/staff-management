<?php
include_once 'connect_db.php';
ob_start();
?>
<html lang="en">

<head>
  <title>Training Program_No03</title>
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

        var staffcode = $(this).closest('.tr_action').find('td:nth-child(1)').text();
        var staffname = $(this).closest('.tr_action').find('td:nth-child(2)').text();
        var birthday = $(this).closest('.tr_action').find('td:nth-child(3)').text();
        var tel1 = $(this).closest('.tr_action').find('td:nth-child(4)').text();
        var tel2 = $(this).closest('.tr_action').find('td:nth-child(5)').text();
        var tel3 = $(this).closest('.tr_action').find('td:nth-child(6)').text();
        var zip = $(this).closest('.tr_action').find('td:nth-child(7)').text();
        var address1 = $(this).closest('.tr_action').find('td:nth-child(8)').text();
        var address2 = $(this).closest('.tr_action').find('td:nth-child(9)').text();
        var note = $(this).closest('.tr_action').find('td:nth-child(10)').text();
        var useflag = $(this).closest('.tr_action').find('td:nth-child(11)').text();


        function checkUpdate() {

        }

        $('#btnUpdate').click(function(e) {
          e.preventDefault();
          $('#code').val(staffcode);
          $('#name').val(staffname);
          $('#birthday').val(birthday);
          $('#tel1').val(tel1);
          $('#tel2').val(tel2);
          $('#tel3').val(tel3);
          $('#zip').val(zip);
          $('#address1').val(address1);
          $('#address2').val(address2);
          $('#note').val(note);
          $('#useflag').val(useflag);
       
        });

        $('#btnDelete').click(function(e) {
          e.preventDefault();
          $('#code_delete').val(staffcode);
          $('#name_delete').val(staffname);
          $('#birthday_delete').val(birthday);
          $('#tel1_delete').val(tel1);
          $('#tel2_delete').val(tel2);
          $('#tel3_delete').val(tel3);
          $('#zip_delete').val(zip);
          $('#address1_delete').val(address1);
          $('#address2_delete').val(address2);
          $('#note_delete').val(note);
        
        });

        $('#btnRef').click(function(e) {
          e.preventDefault();
          $('#code_ref').val(staffcode);
          $('#name_ref').val(staffname);
          $('#birthday_ref').val(birthday);
          $('#tel1_ref').val(tel1);
          $('#tel2_ref').val(tel2);
          $('#tel3_ref').val(tel3);
          $('#zip_ref').val(zip);
          $('#address1_ref').val(address1);
          $('#address2_ref').val(address2);
          $('#note_ref').val(note);
          
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
  if (!empty($_POST["btnDelete"]) && isset($_POST['code'])) {
    $sqlDelete = "UPDATE `m_user` SET `is_deleted` = true where `code` =" . $_POST['code'];
    if (mysqli_query($conn, $sqlDelete)) {
      header("location: training-program-no03.php");
      ob_end_flush();
    } else {
      $res = "L???i kh??ng th??? x??a d??? li???u!" . mysqli_error($conn);
    }
  }
  ?>
  <div class="container">
    <h3>
      DANH S??CH
    </h3>
    <h4>STAFF MASTER MAINTENANCE</h4>

    <div class="container mt-3 ">
      <table class="table table-bordered" id="tbl">
        <thead class="thead-dark">

          <tr>
            <th class="col-sm-4">STAFF CODE</th>
            <th>STAFF NAME</th>
            <th id="onHide"> Birthday</th>
            <th id="onHide"> Tel1</th>
            <th id="onHide"> Tel2</th>
            <th id="onHide"> Note</th>
            <th id="onHide"> Address1</th>
            <th id="onHide"> Address2</th>
            <th id="onHide"> Note</th>
            <th id="onHide"> Useflag</th>

          </tr>
        </thead>
        <?php

        $sql = "SELECT * FROM `m_user` WHERE  `useflag` = 1";
        $result = mysqli_query($conn, $sql);

        while ($row =  mysqli_fetch_assoc($result)) {
          $staff_code = $row["code"];
          $staff_name = $row["name"];
          $birthday = $row["birthday"];
          $tel1 = $row["tel1"];
          $tel2 = $row["tel2"];
          $tel3 = $row["tel3"];
          $zip = $row["zipno"];
          $address1 = $row["address1"];
          $address2 = $row["address2"];
          $note = $row["note"];
          $useflag = $row["useflag"];

        ?>

          <tbody>
            <?php if ($useflag == 1) : ?>
          <tbody>
            <tr class="tr_action" onclick="checkBtn()">
              <td><?php echo $staff_code; ?></td>
              <td><?php echo $staff_name; ?></td>
              <td id="onHide"><?php echo $birthday; ?></td>
              <td id="onHide"><?php echo $tel1; ?></td>
              <td id="onHide"><?php echo $tel2; ?></td>
              <td id="onHide"><?php echo $tel2; ?></td>
              <td id="onHide"><?php echo $zip; ?></td>
              <td id="onHide"><?php echo $address1; ?></td>
              <td id="onHide"><?php echo $address2; ?></td>
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
          <button class="btn btn-outline-primary" data-toggle="modal" id="btnRef" data-target="#myModalReference">??????</button>
        </td>
        <td>

        </td>
      </tr>
      </table>
    </div>
    <script type="text/javascript">
    var disUpdate = document.querySelector('#btnUpdate').disabled = true;
    var disDelete = document.querySelector('#btnDelete').disabled = true;
    var disRef = document.querySelector('#btnRef').disabled = true;

    function checkBtn() {
    
        var disUpdate = document.querySelector('#btnUpdate').disabled = false;
        var disDelete = document.querySelector('#btnDelete').disabled = false;
        var disRef = document.querySelector('#btnRef').disabled = false;

    }
  </script>

    <!-- Update -->
    <div class="modal fade" id="myModalUpdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form action="" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">UPDATE STAFF MASTER</h5>
              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <table class="table table-bordered bg-secondary text-white">
                <?php
                $query = mysqli_query($conn, "SELECT * FROM `m_user`");
                $row = mysqli_fetch_assoc($query);
                if (isset($_POST['btn_Update']) && isset($_POST['code'])) {

                  $staff_name = $_POST["name"];
                  $birthday = $_POST["birthday"];
                  $tel1 = $_POST["tel1"];
                  $tel2 = $_POST["tel2"];
                  $zip = $_POST["zip"];
                  $address1 = $_POST["address1"];
                  $address2 = $_POST["address2"];
                  $note = $_POST["note"];
                  $useflag = $_POST["useflag"];

                  $sqlUpdate = " UPDATE `m_user` SET `name` = '$staff_name',`birthday` = '$birthday',`tel1` = '$tel1', `tel2` = '$tel2', `zipno` = '$zip',`address1` = '$address1', `address2` = '$address2', `note` = '$note', `useflag` = '$useflag' where `code` =" . $_POST['code'];

                  if (mysqli_query($conn, $sqlUpdate)) {
                    header("location: training-program-no01.php");
                    ob_end_flush();
                  } else {
                    $res = "L???i kh??ng th??? s???a d??? li???u!" . mysqli_error($conn);
                  }
                }

                ?>

                <tr>
                  <td>STAFF CODE</td>
                  <td><input type="text" value="<?php echo $row["code"]; ?>" name="code" id="code" readonly>
                  </td>
                </tr>
                <tr>
                  <td>STAFF NAME</td>
                  <td><input type="text" name="name" value="<?php echo $row["name"]; ?>" id="name" pattern="[a-z]{1,50}" 
                    title="STAFFNAME kh??ng v?????t qu?? 50 k?? t???"
                    required></td>
                </tr>

                <tr>
                  <td>BIRTHDAY</td>
                  <td><input type="date" name="birthday" value="<?php echo $row["birthday"]; ?>" id="birthday" pattern="[0-9]{1,10}" 
                    title="BIRTHDAY kh??ng v?????t qu?? 10 k?? t???"
                    required></td>
                </tr>
                <tr>
                  <td>TEL 1</td>
                  <td><input type="text" name="tel1" value="<?php echo $row["tel1"] ?>" id="tel1" pattern="[0-9]{1,20}" 
                    title="TEL 1 kh??ng v?????t qu?? 20 k?? t???" required></td>
                </tr>
                <tr>
                  <td>TEL 2</td>
                  <td><input type="text" name="tel2" value="<?php echo $row["tel2"]; ?>" id="tel2" pattern="[0-9]{1,20}" 
                    title="TEL 2 kh??ng v?????t qu?? 20 k?? t???" required></td>
                </tr>
                <tr>
                  <td>ZIP NO</td>
                  <td><input type="text" name="zip" value="<?php echo $row["zipno"] ?>" id="zip" pattern="[0-9]{1,10}" 
                    title="ZIPNO kh??ng v?????t qu?? 10 k?? t???" required></td>
                </tr>
                <tr>
                  <td>ADDRESS 1</td>
                  <td><input type="text" name="address1" value="<?php echo $row["address1"]; ?>" id="address1" pattern="[a-z]{1,100}[0-9]{1,100}" 
                    title="ADDRESS 1 kh??ng v?????t qu?? 10 k?? t???" required></td>
                </tr>
                <tr>
                  <td>ADDRESS 2</td>
                  <td><input type="text" name="address2" value="<?php echo $row["address2"]; ?>" id="address2" pattern="[a-z]{1,100}[0-9]{1,100}" 
                    title="ADDRESS 2 kh??ng v?????t qu?? 10 k?? t???" required></td>
                </tr>
                <tr>
                  <td>NOTE</td>
                  <td><input type="text" name="note" value="<?php echo $row["note"]; ?>" id="note"></td>
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
            <h5 class="modal-title" id="ModalLabel">ADD STAFF MASTER</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container mt-3">
              <form action="" method="POST">
                <table class="table bg-secondary text-white">
                  <?php
                  if (isset($_POST['btn_Add'])) {
                    $staff_code = $_POST['code'];
                    $staff_name = $_POST['name'];
                    $birthday = $_POST['birthday'];
                    $tel1 = $_POST['tel1'];
                    $tel2 = $_POST['tel2'];
                    $zip = $_POST['zip'];
                    $add1 = $_POST['address1'];
                    $add2 = $_POST['address2'];
                    $note = $_POST['note'];
                    $flag = $_POST['useflag'];


                    $sqlAdd = " INSERT INTO `m_user` (`code`, `name`, `birthday`, `tel1`, `tel2` , `zipno`, `address1`, `address2`, `note`, `useflag`) VALUES ('$staff_code', '$staff_name', '$birthday', '$tel1', '$tel2', '$zip', '$add1', '$add2', '$note', 1)";

                    $sqlRepeat = "SELECT * FROM `m_user` WHERE `code`='$staff_code'";
                    $resultRepeat = mysqli_query($conn, $sqlRepeat);
                    if (mysqli_num_rows($resultRepeat) > 0) {
                      echo '<script type="text/javascript"> alert("Staff code b??? tr??ng l???p, vui l??ng nh???p l???i!") </script>';
                      exit;
                    }

                    if (mysqli_query($conn, $sqlAdd)) {
                      header("location: training-program-no01.php");
                      ob_end_flush();
                    } else {

                      $result = "L???i kh??ng th??? th??m v??o Database!" . mysqli_error($conn);
                    }
                  } ?>

                  <tr>
                    <td>
                      STAFF CODE
                    </td>
                    <td>
                      <input  type="text" value="" name="code" id="code" pattern="[0-9]{1,6}"
                     title="STAFFCODE ph???i l?? s??? v?? kh??ng v?????t qu?? 6 k?? t???" required>
                    </td>
                  </tr>
                  <tr>
                    <td>STAFF NAME</td>
                    <td><input  type="text" name="name" value="" id="name" pattern="[a-z]{1,50}" 
                    title="STAFFNAME kh??ng v?????t qu?? 50 k?? t???"
                    required></td>
                  </tr>
                  <tr>
                    <td>BIRTHDAY</td>
                    <td><input  type="date" name="birthday" value="" id="birthday" pattern="[0-9]{1,10}" 
                    title="BIRTHDAY kh??ng v?????t qu?? 10 k?? t???"
                    required></td>
                  </tr>
                  <tr>
                    <td>TEL 1</td>
                    <td><input  type="text" name="tel1" value="" id="tel1" pattern="[0-9]{1,20}" 
                    title="TEL 1 kh??ng v?????t qu?? 20 k?? t???" required></td>
                  </tr>
                  <tr>
                    <td>TEL 2</td>
                    <td><input  type="text" name="tel2" value="" id="tel2" pattern="[0-9]{1,20}" 
                    title="TEL 2 kh??ng v?????t qu?? 20 k?? t???" required></td>
                  </tr>
                  <tr>
                  <td>TEL 3</td>
                  <td><input type="text" name="tel3" value="" id="tel3_ref" readonly></td>
                </tr>
                  <tr>
                    <td>ZIPNO</td>
                    <td><input  type="text" name="zip" value="" id="zip" pattern="[0-9]{1,10}" 
                    title="ZIPNO kh??ng v?????t qu?? 10 k?? t???" required></td>
                  </tr>
                  <tr>
                    <td>ADDRESS 1</td>
                    <td><input  type="text" name="address1" value="" id="address1" pattern="[a-z]{1,100}[0-9]{1,100}" 
                    title="ADDRESS 1 kh??ng v?????t qu?? 10 k?? t???" required></td>
                  </tr>
                  <tr>
                    <td>ADDRESS 2</td>
                    <td><input  type="text" name="address2" value="" id="address2" pattern="[a-z]{1,100}[0-9]{1,100}" 
                    title="ADDRESS 2 kh??ng v?????t qu?? 10 k?? t???" required></td>
                  </tr>
                  <tr>
                    <td>NOTE</td>
                    <td><input  type="text" name="note" value="" id="note" ></td>
                  </tr>
                 
                  <tr>
                    <td></td>
                    <td>
                      <button type="submit" class="btn btn-primary float-right padd" name="btn_Add" id="btn_Add">OK</button>
                      <button type="button" class="btn btn-danger float-right" data-bs-dismiss="modal" data-dismiss="modal">Cancel</button>
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
              <h5 class="modal-title" id="staticBackdropLabel">DELETE STAFF MASTER</h5>
              <button type="button" class="btn-close" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <table class="table table-bordered bg-secondary text-white">
                <?php
                $query = mysqli_query($conn, "SELECT * FROM `m_user` WHERE `useflag` = 1;");
                $row = mysqli_fetch_assoc($query);
                ?>

                <tr>
                  <td>STAFF CODE</td>
                  <td><input type="text" name="code" value="<?php echo $row["code"]; ?>" id="code_delete" readonly>
                  </td>
                </tr>
                <tr>
                  <td>STAFF NAME</td>
                  <td><input type="text" name="name" value="<?php echo $row["name"]; ?>" id="name_delete" readonly></td>
                </tr>
                <tr>
                  <td>BIRTHDAY</td>
                  <td><input type="date" name="birthday" value="<?php echo $row["birthday"]; ?>" id="birthday_delete" readonly ></td>
                </tr>
                <tr>
                  <td>TEL 1</td>
                  <td><input type="text" name="tel1" value="<?php echo $row["tel1"]; ?>" id="tel1_delete" readonly></td>
                </tr>
                <tr>
                  <td>TEL 2</td>
                  <td><input type="text" name="tel2" value="<?php echo $row["tel2"]; ?>" id="tel2_delete" readonly></td>
                </tr>
                <tr>
                  <td>TEL 3</td>
                  <td><input type="text" name="tel3" value="<?php echo $row["tel3"]; ?>" id="tel3_delete" readonly></td>
                </tr>
                <tr>
                  <td>ZIP NO</td>
                  <td><input type="text" name="zip" value="<?php echo $row["zipno"] ?>" id="zip_delete" readonly></td>
                </tr>
                <tr>
                  <td>ADDRESS 1</td>
                  <td><input type="text" name="address1" value="<?php echo $row["address1"]; ?>" id="address1_delete" readonly></td>
                </tr>
                <tr>
                  <td>ADDRESS 2</td>
                  <td><input type="text" name="address2" value="<?php echo $row["address2"]; ?>" id="address2_delete" readonly></td>
                </tr>
                <tr>
                  <td>NOTE</td>
                  <td><input type="text" name="note" value="<?php echo $row["note"]; ?>" id="note_delete" readonly></td>
                </tr>
                <tr id="onHide">
                  <td>USEFLAG</td>
                  <td><input type="text" name="useflag" value="<?php echo $row["useflag"]; ?>" id="useflag_delete" readonly></td>
                </tr>
                <tr>
                  <td></td>
                  <td>
                    <button type="submit" class="btn btn-primary float-right padd" name="btnDelete" id="btnDelete" value="OK">OK</button>
                    <input type="button" class="btn btn-danger float-right " data-dismiss="modal" data-bs-dismiss="modal" name="btn_Cancel" value="Cancel">
                  </td>
                </tr>
              </table>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Reference -->
    <div class="modal fade" id="myModalReference" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form action="" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">REFERENCE STAFF MASTER</h5>
              <button type="button" class="btn-close" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <table class="table table-bordered bg-secondary text-white">
                <?php
                $query = mysqli_query($conn, "SELECT * FROM `m_user` WHERE `useflag` = 1;");
                $row = mysqli_fetch_assoc($query);
                ?>

                <tr>
                  <td>STAFF CODE</td>
                  <td><input type="text" name="code" value="<?php echo $row["code"]; ?>" id="code_ref" readonly>
                  </td>
                </tr>
                <tr>
                  <td>STAFF NAME</td>
                  <td><input type="text" name="name" value="<?php echo $row["name"]; ?>" id="name_ref" readonly></td>
                </tr>
                <tr>
                  <td>BIRTHDAY</td>
                  <td><input type="date" name="birthday" value="<?php echo $row["birthday"]; ?>" id="birthday_ref" readonly></td>
                </tr>
                <tr>
                  <td>TEL 1</td>
                  <td><input type="text" name="tel1" value="<?php echo $row["tel1"]; ?>" id="tel1_ref" readonly></td>
                </tr>
                <tr>
                  <td>TEL 2</td>
                  <td><input type="text" name="tel2" value="<?php echo $row["tel2"]; ?>" id="tel2_ref" readonly></td>
                </tr>
                <tr>
                  <td>TEL 3</td>
                  <td><input type="text" name="tel3" value="<?php echo $row["tel3"]; ?>" id="tel3_ref" readonly></td>
                </tr>
                <tr>
                  <td>ZIP NO</td>
                  <td><input type="text" name="zip" value="<?php echo $row["zipno"] ?>" id="zip_ref" readonly></td>
                </tr>
                <tr>
                  <td>ADDRESS 1</td>
                  <td><input type="text" name="address1" value="<?php echo $row["address1"]; ?>" id="address1_ref" readonly></td>
                </tr>
                <tr>
                  <td>ADDRESS 2</td>
                  <td><input type="text" name="address2" value="<?php echo $row["address2"]; ?>" id="address2_ref" readonly></td>
                </tr>
                <tr>
                  <td>NOTE</td>
                  <td><input type="text" name="note" value="<?php echo $row["note"]; ?>" id="note_ref" readonly></td>
                </tr>
               
                <tr>
                  <td></td>
                  <td>
                    <input type="button" class="btn btn-danger float-right " data-dismiss="modal" data-bs-dismiss="modal" name="btn_Cancel" value="OK">
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