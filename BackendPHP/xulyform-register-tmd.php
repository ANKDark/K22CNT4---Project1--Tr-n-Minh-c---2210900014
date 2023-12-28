<?php 
    include("ket-noi-tmd.php");
    $sql_tmd = "SELECT * FROM `dangky` WHERE 1=1";
    $res_tmd = $conn_tmd->query($sql_tmd);
    $error_message = "";

    if(isset($_POST["btn_sub_tmd"])) {
        $ten_dn_tmd = $_POST["ten_dn_tmd"];
        $hoten_dn_tmd = $_POST["hoten_dn_tmd"];
        $email_dn_tmd = $_POST["email_dn_tmd"];
        $phone_tmd = $_POST["phone_tmd"];
        $pass_tmd = $_POST["pass_tmd"];
        
        $sql_check_tmd = "SELECT TENDN_TMD FROM dangky WHERE TENDN_TMD ='$ten_dn_tmd'";
        $res_check_tmd = $conn_tmd->query($sql_check_tmd);

        if($res_check_tmd->num_rows > 0) {
            echo $error_message = "Tên đăng nhập này đã sử dụng";
        } else {
            $sql_insert_tmd = "INSERT INTO `dangky` (`TENDN_TMD`, `HOTEN_TMD`, `EMAIL_TMD`, `SDT_TMD`, `MATKHAU_TMD`) VALUES ('$ten_dn_tmd', '$hoten_dn_tmd', '$email_dn_tmd', '$phone_tmd', '$pass_tmd');";

            if($conn_tmd->query($sql_insert_tmd)) {
                header("Location: ../User/login_tmd.php");
                exit();
            } else {
                echo $error_message = "Lỗi đăng ký" . $conn->error;
            }
        }
    }
?>