<?php
include("ket-noi-tmd.php");
$sql_sp_tmd = "SELECT * FROM sanpham_tmd";
$res_sp_tmd = $conn_tmd->query($sql_sp_tmd);
$error_tmd = "";

if (isset($_POST["btnSubtmd"])) {
    $SPID_TMD = $_POST["SPID_TMD"];
    $TENSP_TMD = $_POST["TENSP_TMD"];
    $SOLUONG_TMD = $_POST["SOLUONG_TMD"];
    $TINHTRANG_TMD = $_POST["TINHTRANG_TMD"];
    $DONGSP_TMD = $_POST["DONGSP_TMD"];
    $LOAISP_TMD = $_POST["LOAISP_TMD"];
    $GIAMGIA_TMD = $_POST["GIAMGIA_TMD"];
    $GIABAN_TMD = $_POST["GIABAN_TMD"];
    $GIAGOC_TMD = $_POST["GIAGOC_TMD"];
    $GIADAGIAM_TMD = $_POST["GIADAGIAM_TMD"];
    $IMG_TMD = $_POST["IMG_TMD"];
    $MOTA_TMD = $_POST["MOTA_TMD"];

    $sql_them_tmd = "INSERT INTO `sanpham_tmd` 
                (`SPID_TMD`, `TENSP_TMD`, `SOLUONG_TMD`, `TINHTRANG_TMD`, `DONGSP_TMD`, 
                `LOAISP_TMD`, `GIAMGIA_TMD`, `GIABAN_TMD`, `GIAGOC_TMD`, `GIADAGIAM_TMD`, 
                `IMG_TMD`, `MOTA_TMD`) 
                VALUES ('$SPID_TMD', '$TENSP_TMD', '$SOLUONG_TMD', '$TINHTRANG_TMD', '$DONGSP_TMD', 
                '$LOAISP_TMD', '$GIAMGIA_TMD', '$GIABAN_TMD', '$GIAGOC_TMD', '$GIADAGIAM_TMD', 
                '$IMG_TMD', '$MOTA_TMD');";

    if ($conn_tmd->query($sql_them_tmd)) {
        header("Location: ../Admin/them-sp-tmd.php");
        exit();
    } else {
        $error_tmd = "Lỗi thêm mới:" . $conn_tmd->errno;
    }
}
?>