<?php
include("ket-noi-tmd.php");
session_start();
$error_message = "";

if (isset($_POST["btn_sub_tmd"])) {
    $ten_dn_tmd = $_POST["ten_dn_tmd"];
    $pass_tmd = $_POST["pass_tmd"];

    $sql_check_tmd = "SELECT TENDN_TMD, MATKHAU_TMD FROM dangky WHERE TENDN_TMD ='$ten_dn_tmd' AND MATKHAU_TMD='$pass_tmd'";
    $res_check_tmd = $conn_tmd->query($sql_check_tmd);

    if ($res_check_tmd->num_rows > 0) {
        $chk = $_POST['rmk_tmd'];
        $_SESSION['user_id'] = $ten_dn_tmd;
        $_SESSION['pass'] = $pass_tmd;
        if (isset($chk)) {
            setcookie('taikhoan', $ten_dn_tmd, time() + 60 * 60);
        }
        header("Location: ../User/Trangchu-tmd.php");

    } else {
        $error_message = "Sai mật khẩu hoặc tên đăng nhập không tồn tại vui lòng kiểm tra lại!!";
    }
}
?>

<?php if (!empty($error_message)): ?>
    <div class="error-message">
        <?php echo $error_message; ?>
    </div>
    <div class="backlogin"><a href="../User/login_tmd.php">Quay lại trang đăng nhập</a></div>
<?php endif; ?>