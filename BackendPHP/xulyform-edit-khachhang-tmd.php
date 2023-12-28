<?php
include('ket-noi-tmd.php');

$TENDN_TMD = isset($_POST['TENDN_TMD']) ? $_POST['TENDN_TMD'] : null;

if (isset($_POST["btnSuaTMD"])) {
  $HOTEN_TMD = $_POST['HOTEN_TMD'];
  $EMAIL_TMD = $_POST['EMAIL_TMD'];
  $SDT_TMD = $_POST['SDT_TMD'];
  $MATKHAU_TMD = $_POST['MATKHAU_TMD'];

  $sql_sua_tmd = "UPDATE DANGKY SET 
      HOTEN_TMD = ?,
      EMAIL_TMD = ?,
      SDT_TMD = ?,
      MATKHAU_TMD = ?
      WHERE
      TENDN_TMD = ?";

  $statement = $conn_tmd->prepare($sql_sua_tmd);

  if (!$statement) {
    die("Lỗi câu truy vấn: " . $conn_tmd->error);
  }
  $statement->bind_param("ssiss", $HOTEN_TMD, $EMAIL_TMD, $SDT_TMD, $MATKHAU_TMD, $TENDN_TMD);

  if ($statement->execute()) {
    header("Location: ../Admin/quanly-khachhang-tmd.php");
    exit();
  } else {
    $error_tmd = "Lỗi cập nhật: " . $statement->error;
  }
  $statement->close();
}
?>