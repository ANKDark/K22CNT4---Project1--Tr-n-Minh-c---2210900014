<?php
session_start();
include("ket-noi-tmd.php");
$sql_tmd = "SELECT * FROM `donhang` WHERE 1=1";
$res_tmd = $conn_tmd->query($sql_tmd);
$error_message = "";
if (isset($_SESSION['user_id']) && ($_SESSION['user_id']) != "") {
    if (isset($_POST["btn_sub_mua"])) {
        for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
            $ten_dn_tmd = $_SESSION['user_id'];
            $TENSP_TMD = $_SESSION['giohang'][$i][1];
            $tinh_donhang_tmd = $_POST["tinh_donhang_tmd"];
            $huyen_donhang_tmd = $_POST["huyen_donhang_tmd"];
            $tongtien = $_POST["tongtien"];
            $payment_method = $_POST["payment_method"];
            $SPID_TMD = $_SESSION['giohang'][$i][4];
            $SOLUONG_TMD = $_SESSION['giohang'][$i][3];

            $sql_check_tmd = "SELECT SOLUONG_TMD FROM sanpham_tmd WHERE SPID_TMD ='$SPID_TMD'";
            $res_check_tmd = $conn_tmd->query($sql_check_tmd);

            if ($res_check_tmd->num_rows > 0) {
                $row = $res_check_tmd->fetch_assoc();
                $soLuongTonKho = $row['SOLUONG_TMD'];
                if ($SOLUONG_TMD > $soLuongTonKho) {
                    $error_message = "Sản phẩm không đủ số lượng, mời bạn chọn lại số lượng cho sản phẩm có ID: $SPID_TMD";
                    break;
                } else {
                    $sql_insert_tmd = "INSERT INTO `donhang` (`SPID_TMD`, `TENSP_TMD`, `SOLUONG_TMD`, `TINH_TMD`, `HUYEN_TMD`, `TONGTIEN_TMD`, `TENDN_TMD`, `HINHTHUCTHANHTOAN`) VALUES ('$SPID_TMD', '$TENSP_TMD', '$SOLUONG_TMD', '$tinh_donhang_tmd', '$huyen_donhang_tmd', '$tongtien', '$ten_dn_tmd', '$payment_method')";
                    $NEWSOLUONG = $soLuongTonKho - $SOLUONG_TMD;
                    if ($NEWSOLUONG == 0) {
                        $TINHTRANG_TMD = 0;
                        $sql_sua_tmd = "UPDATE SANPHAM_TMD SET SOLUONG_TMD = $NEWSOLUONG, TINHTRANG_TMD = $TINHTRANG_TMD WHERE SPID_TMD = '$SPID_TMD'";
                    }else {
                        $sql_sua_tmd = "UPDATE SANPHAM_TMD SET SOLUONG_TMD = $NEWSOLUONG WHERE SPID_TMD = '$SPID_TMD'";
                    }
                   
                    if ($conn_tmd->query($sql_insert_tmd)) {
                        unset($_SESSION['giohang']);
                        echo "<script>
                            alert('Đặt hàng thành công! Cảm ơn bạn đã mua hàng.');
                            window.location.href = '../User/cart_products_tmd.php';
                        </script>";
                        exit();
                    } else {
                        echo $error_message = "Lỗi không xác định" . $conn_tmd->error;
                    }
                }
            }
        }
    }
} else {
    echo "<script>
                alert('Vui lòng đăng nhập hoặc đăng ký để thực hiện đặt hàng!!');
                window.location.href = '../User/cart_products_tmd.php';
            </script>";
    exit();
}
?>