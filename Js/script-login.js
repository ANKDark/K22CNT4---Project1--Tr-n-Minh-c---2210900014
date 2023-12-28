function kiemTraForm(event) {
    var matKhau = document.getElementById('pass_tmd').value;
    var xacNhanMatKhau = document.getElementById('check_pass_tmd').value;

    if (matKhau !== xacNhanMatKhau) {
        document.getElementById('loiMatKhau_tmd').innerHTML = 'Mật khẩu không trùng khớp';
        event.preventDefault();
    } else {
        document.getElementById('loiMatKhau_tmd').innerHTML = '';
    }
}

function kiemTraForm(event) {
    var matKhau = document.getElementById('new_pass_tmd').value;
    var xacNhanMatKhau = document.getElementById('check_new_pass_tmd').value;

    if (matKhau !== xacNhanMatKhau) {
        document.getElementById('loiMatKhau_tmd').innerHTML = 'Mật khẩu không trùng khớp';
        event.preventDefault();
    } else {
        document.getElementById('loiMatKhau_tmd').innerHTML = '';
    }
}

function hienFormDangKy() {
    document.querySelector('.login').style.display = 'none';
    document.querySelector('.register').style.display = 'flex';
    document.querySelector('.box_new_pass_tmd').style.display = 'none';
}

function hienFormDangNhap() {
    document.querySelector('.login').style.display = 'flex';
    document.querySelector('.box_new_pass_tmd').style.display = 'none';
    document.querySelector('.register').style.display = 'none';
}

function hienFormNewpass() {
    document.querySelector('.login').style.display = 'none';
    document.querySelector('.box_new_pass_tmd').style.display = 'flex';
    document.querySelector('.register').style.display = 'none';
}