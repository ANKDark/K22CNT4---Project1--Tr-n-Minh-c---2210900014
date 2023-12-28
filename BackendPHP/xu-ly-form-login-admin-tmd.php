<?php
include("ket-noi-tmd.php");
session_start();
$error_message = "";

if (isset($_POST["btn_sub_tmd"])) {
    $ten_dn_tmd = $_POST["ten_dn_tmd"];
    $pass_tmd = $_POST["pass_tmd"];

    if ($ten_dn_tmd == 'Admin' && $pass_tmd == 'Ducdeptrai') {
        $chk = $_POST['rmk_tmd'];
        $_SESSION['admin_id'] = $ten_dn_tmd;
        $_SESSION['admin_pass'] = $pass_tmd;
        if (isset($chk)) {
            setcookie('taikhoan', $ten_dn_tmd, time() + 60 * 60);
        }
        header("Location: ../Admin/bang_dieu_khien_tmd.php");

    } else {
        echo "<script>
                alert('Sai tên đăng nhập hoặc mật khẩu');
                window.location.href = '../User/cart_products_tmd.php';
            </script>";
    }
}
?>

<?php if (!empty($error_message)): ?>
    <div class="error-message">
        <?php echo $error_message; ?>
    </div>
    <div class="backlogin"><a href="../Admin/login_tmd.php">Quay lại trang đăng nhập</a></div>
<?php endif; ?>