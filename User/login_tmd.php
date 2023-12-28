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
            <form action="../BackendPHP/xu-ly-form-login-tmd.php" method="post">
                <h1>Đăng nhập</h1>  
                <div class="input_box_tmd">
                    <input type="text" name="ten_dn_tmd" placeholder="Tên đăng nhập" required>
                    <i class='bx bx-user'></i>
                </div>
                <div class="input_box_tmd">
                    <input type="password" name="pass_tmd" placeholder="Mật khẩu" required>
                    <i class='bx bx-lock' ></i>
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
    <div class="register">
        <div class="wrapper_tmd">
            <form action="../BackendPHP/xulyform-register-tmd.php" onsubmit="kiemTraForm(event)" method="post">
                <h1>Đăng ký</h1>  
                <div class="input_box_tmd">
                    <input type="text" name="ten_dn_tmd" placeholder="Tên đăng nhập" required>
                    <i class='bx bx-user'></i>
                </div>
                <div class="input_box_tmd">
                    <input type="text" name="hoten_dn_tmd" placeholder="Họ tên" required>
                    <i class='bx bx-user-circle' ></i>
                </div>
                <div class="input_box_tmd">
                    <input type="email" name="email_dn_tmd" placeholder="Email" required>
                    <i class='bx bx-envelope' ></i>
                </div>
                <div class="input_box_tmd">
                    <input type="number" name="phone_tmd" placeholder="Số điện thoại" required>
                    <i class='bx bx-phone' ></i>
                </div>
                <div class="input_box_tmd">
                    <input type="password" id="pass_tmd" name="pass_tmd" placeholder="Mật khẩu" required>
                    <i class='bx bx-lock' ></i>
                </div>
                <div class="input_box_tmd">
                    <input type="password" id="check_pass_tmd" name="check_pass_tmd" placeholder="Nhập lại mật khẩu" required>
                    <i class='bx bx-lock' ></i>
                    <span id="loiMatKhau_tmd" class="error_tmd"></span><br>
                </div>
                <button type="submit" class="btn_sub_tmd" name="btn_sub_tmd">Đăng ký</button>
                <div class="register_link_tmd">
                    <p>Bạn đã có tài khoản? <a href="#" onclick="hienFormDangNhap()">Đăng nhập</a></p>
                </div>
            </form>
        </div>
    </div>
    <div class="box_new_pass_tmd">
        <div class="wrapper_tmd">
            <form action="" onsubmit="kiemTraForm(event)">
                <h1>Quên mật khẩu</h1>  
                <div class="input_box_tmd">
                    <input type="text" name="ten_dn_tmd" placeholder="Tên đăng nhập" required>
                    <i class='bx bx-user'></i>
                </div>
                <div class="input_box_tmd">
                    <input type="email" name="email_dn_tmd" placeholder="Email" required>
                    <i class='bx bx-envelope' ></i>
                </div>
                <div class="input_box_tmd">
                    <input type="number" name="phone_tmd" placeholder="Số điện thoại" required>
                    <i class='bx bx-phone' ></i>
                </div>
                <div class="input_box_tmd">
                    <input type="password" id="new_pass_tmd" name="new_pass_tmd" placeholder="Nhập mật khẩu mới" required>
                    <i class='bx bx-lock' ></i>
                </div>
                <div class="input_box_tmd">
                    <input type="password" id="check_new_pass_tmd" name="check_new_pass_tmd" placeholder="Nhập lại mật khẩu" required>
                    <i class='bx bx-lock' ></i>
                    <span id="loiMatKhau_tmd" class="error_tmd"></span><br>
                </div>
                <button type="submit" class="btn_sub_tmd" name="btn_sub_tmd">Xác nhận</button>
                <div class="register_link_tmd">
                    <p>Bạn đã có tài khoản? <a href="#" onclick="hienFormDangNhap()">Đăng nhập</a></p>
                </div>
                <div class="register_link_tmd">
                    <p>Bạn không có tài khoản? <a href="#" onclick="hienFormDangKy()">Đăng ký</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
