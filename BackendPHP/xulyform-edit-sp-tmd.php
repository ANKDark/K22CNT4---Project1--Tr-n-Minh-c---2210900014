<?php
include('ket-noi-tmd.php');
$SPID_TMD = isset($_POST['SPID_TMD']) ? $_POST['SPID_TMD'] : null;
if (isset($_POST["btnSuaTMD"])) {
  $TENSP_TMD = $_POST['TENSP_TMD'];
  $SOLUONG_TMD = $_POST['SOLUONG_TMD'];
  if ($SOLUONG_TMD == 0) {
    $TINHTRANG_TMD = 0;
  } else {
    $TINHTRANG_TMD = $_POST['TINHTRANG_TMD'];
  }
  $DONGSP_TMD = $_POST['DONGSP_TMD'];
  $LOAISP_TMD = $_POST['LOAISP_TMD'];
  $GIAMGIA_TMD = $_POST['GIAMGIA_TMD'];
  $GIABAN_TMD = $_POST['GIABAN_TMD'];
  $GIAGOC_TMD = $_POST['GIAGOC_TMD'];
  $GIADAGIAM_TMD = $_POST['GIADAGIAM_TMD'];
  $IMG_TMD = $_POST['IMG_TMD'];
  if ($IMG_TMD == '') {
    $sql_sua_tmd = "UPDATE SANPHAM_TMD
    SET 
      TENSP_TMD = '$TENSP_TMD',
      SOLUONG_TMD = $SOLUONG_TMD,
      TINHTRANG_TMD = $TINHTRANG_TMD,
      DONGSP_TMD = $DONGSP_TMD,
      LOAISP_TMD = $LOAISP_TMD,
      TINHTRANG_TMD = $TINHTRANG_TMD,
      GIAMGIA_TMD = $GIAMGIA_TMD,
      GIABAN_TMD = $GIABAN_TMD,
      GIAGOC_TMD = $GIAGOC_TMD,
      GIADAGIAM_TMD = $GIADAGIAM_TMD,
      MOTA_TMD = '$MOTA_TMD'
    WHERE
      SPID_TMD = $SPID_TMD";
  }else {
    $sql_sua_tmd = "UPDATE SANPHAM_TMD
    SET 
      TENSP_TMD = '$TENSP_TMD',
      SOLUONG_TMD = $SOLUONG_TMD,
      TINHTRANG_TMD = $TINHTRANG_TMD,
      DONGSP_TMD = $DONGSP_TMD,
      LOAISP_TMD = $LOAISP_TMD,
      TINHTRANG_TMD = $TINHTRANG_TMD,
      GIAMGIA_TMD = $GIAMGIA_TMD,
      GIABAN_TMD = $GIABAN_TMD,
      GIAGOC_TMD = $GIAGOC_TMD,
      GIADAGIAM_TMD = $GIADAGIAM_TMD,
      IMG_TMD = '$IMG_TMD',
      MOTA_TMD = '$MOTA_TMD'
    WHERE
      SPID_TMD = $SPID_TMD";
  }
  $MOTA_TMD = $_POST['MOTA_TMD'];
  if ($conn_tmd->query($sql_sua_tmd)) {
    header("Location: ../Admin/quanly-sp-tmd.php");
    exit();
  } else {
    $error_tmd = "Lỗi cập nhật: " . $conn_tmd->error;
  }
}
?>