<?php
session_start();

if (isset($_GET['delid']) && $_GET['delid'] == 'logout') {
    unset($_SESSION["admin_id"]);
    unset($_SESSION["admin_pass"]);
    header('Location: ../Admin/login_tmd.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-Trần Minh Đức- 2210900014</title>
    <link rel="stylesheet" href="../Style/main_login_register_tmd.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="../Js/script-login.js"></script>

</head>

<body>
    <div class="login">
        <div class="wrapper_tmd">
            <form action="../BackendPHP/xu-ly-form-login-admin-tmd.php" method="post">
                <h1>Đăng nhập</h1>
                <div class="input_box_tmd">
                    <input type="text" name="ten_dn_tmd" placeholder="Tên đăng nhập" required>
                    <i class='bx bx-user'></i>
                </div>
                <div class="input_box_tmd">
                    <input type="password" name="pass_tmd" placeholder="Mật khẩu" required>
                    <i class='bx bx-lock'></i>
                </div>

                <div class="rmk_tmd">
                    <label for="checkbox-tmd"><input type="checkbox" name="rmk_tmd">Ghi nhớ đăng nhập</label>
                    <a href="#" onclick="hienFormNewpass()">Quên mật khẩu?</a>
                </div>

                <button type="submit" class="btn_sub_tmd" name="btn_sub_tmd">Đăng nhập</button>
                <div class="register_link_tmd">
                    <p>Bạn không có tài khoản? <a href="#" onclick="hienFormDangKy()">Đăng ký</a></p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>