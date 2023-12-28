<?php
include('../BackendPHP/ket-noi-tmd.php');
session_start();
if(!$_SESSION['admin_id'] == 'Admin' && !$_SESSION['admin_pass'] == 'Ducdeptrai') {
    header('Location: ../Admin/login_tmd.php');
}
$sql_login_tmd = "SELECT COUNT(*) as TENDN_TMD FROM DANGKY";

$result_tmd = $conn_tmd->query($sql_login_tmd);

if ($result_tmd->num_rows > 0) {
    $row_login = $result_tmd->fetch_assoc();
}

$sql_products_tmd = "SELECT COUNT(*) as SPID_TMD FROM SANPHAM_TMD";

$result_tmd = $conn_tmd->query($sql_products_tmd);

if ($result_tmd->num_rows > 0) {
    $row_products = $result_tmd->fetch_assoc();
}

$sql_over_products_tmd = "SELECT COUNT(*) as TINHTRANG_TMD FROM SANPHAM_TMD WHERE TINHTRANG_TMD = 0";

$result_tmd = $conn_tmd->query($sql_over_products_tmd);

if ($result_tmd->num_rows > 0) {
    $row_over = $result_tmd->fetch_assoc();
}

$sql_slot_products_tmd = "SELECT SUM(SOLUONG_TMD) as SOLUONG_TMD FROM SANPHAM_TMD";

$result_tmd = $conn_tmd->query($sql_slot_products_tmd);

if ($result_tmd->num_rows > 0) {
    $row_slot = $result_tmd->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Style/z.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#thumbimage_tmd").attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            $("#thumbimage_tmd").attr('src', input.value);
        }
        $("#thumbimage_tmd").show();
        $('.filename').text($("#uploadfile_tmd").val());
        $('.choicefile_tmd').css('background', '#14142B');
        $('.choicefile_tmd').css('cursor', 'default');
        $(".removeimg_tmd").show();
        $(".choicefile_tmd").unbind('click');
    }

    $(document).ready(function () {
        $(".choicefile_tmd").bind('click', function () {
            $("#uploadfile_tmd").click();
        });

        $(".removeimg_tmd").click(function () {
            $("#thumbimage_tmd").attr('src', '').hide();
            $("#uploadfile_tmd").val('');
            $("#myfileupload_tmd").html('<input type="file" id="uploadfile_tmd" onchange="readURL(this);" />');
            $(".removeimg_tmd").hide();
            $(".choicefile_tmd").bind('click', function () {
                $("#uploadfile_tmd").click();
            });
            $('.choicefile_tmd').css('background', '#14142B');
            $('.choicefile_tmd').css('cursor', 'pointer');
            $(".filename").text("");
        });
    });
</script>


<body class="dark">
    <div class="header">
        <ul class="app_nav_tmd">
            <li>
            <a href="../Admin/login_tmd.php?delid=logout" title="Đăng xuất">
                    <i class='fa bx fa bx-log-out'></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidebar_tmd">
        <div class="sidebar_user_tmd">
            <img class="sidebar_user_avatar_tmd" src="../Img/Face_tmd.jpg" alt="">
            <div>
                <p class="sidebar_user_name_tmd"><b>Trần Minh Đức</b></p>
                <p class="sidebar_user_designation_tmd">Chào mừng trở lại</p>
            </div>
        </div>
        <hr>
        <ul class="app_menu_tmd">
            <li><a class="app_menu_item_tmd ank" href="#"><i class='fa bx fa bx-cart-alt'></i><span
                        class="app_menu_label_tmd">ANK Bán Hàng</span></a></li>
            <li><a class="app_menu_item_tmd active" href="#"><i class='fa bx fa bx-tachometer'></i><span
                        class="app_menu_label_tmd">Bảng điều khiển</span></a></li>
            <li><a class="app_menu_item_tmd" href="quanly-khachhang-tmd.php"><i class='fa bx fa bx-id-card'></i><span
                        class="app_menu_label_tmd">Quản
                        lý khách hàng</span></a></li>
            <li><a class="app_menu_item_tmd" href="quanly-sp-tmd.php"><i class='fa bx fa bx-data'></i></i><span
                        class="app_menu_label_tmd">Quản lý sản phẩm</span></a></li>
            <li><a class="app_menu_item_tmd" href="them-sp-tmd.php"><i class='fa bx fa bx-purchase-tag-alt'></i><span
                        class="app_menu_label_tmd">Thêm sản phẩm</span></a></li>
            <li><a class="app_menu_item_tmd" href="quanly_donhang_tmd.php"><i class='fa bx fa bx-task'></i><span
                        class="app_menu_label_tmd">Quản lý
                        đơn hàng</span></a></li>
            <li><a class="app_menu_item_tmd" href="quanly_news_tmd.php"><i class='fa bx fa bx-run'></i><span
                        class="app_menu_label_tmd">Quản lý
                        tin tức</span></a></li>
            <li><a class="app_menu_item_tmd" href="#"><i class='fa bx fa bx-dollar-circle'></i><span
                        class="app_menu_label_tmd">Bảng kê lương</span></a></li>
            <li><a class="app_menu_item_tmd" href="#"><i class='fa bx fa bx-pie-chart-alt-2'></i><span
                        class="app_menu_label_tmd">Báo cáo doanh thu</span></a></li>
            <li><a class="app_menu_item_tmd" href="#"><i class='fa bx fa bx-calendar'></i><span
                        class="app_menu_label_tmd">Lịch công tác</span></a></li>
            <li><a class="app_menu_item_tmd" href="#"><i class='fa bx fa bx-cog'></i><span
                        class="app_menu_label_tmd">Cài đặt
                        hệ thống</span></a></li>
        </ul>
    </div>
    <div class="app_content_tmd">
        <div class="app_title_tmd">
            <ul class="app_breadcrumb_tmd breadcrumb_tmd">
                <li class="breadcrumb_item_tmd"><a href="#">Bảng điều khiển</a></li>
            </ul>
        </div>
        <div class="row_tmd">
            <div class="col_md_12_tmd col_lg_6_tmd">
                <div class="widget-small primary coloured-icon">
                    <i class='icon bx bxs-user-account'></i>
                    <div class="info_tmd">
                        <h4>TỔNG KHÁCH HÀNG</h4>
                        <p><b>
                                <?php echo $row_login['TENDN_TMD']; ?> khách hàng
                            </b></p>
                    </div>
                </div>
            </div>

            <div class="col_md_12_tmd col_lg_6_tmd">
                <div class="widget-small primary coloured-icon">
                    <i class='icon bx bx-laptop'></i>
                    <div class="info_tmd">
                        <h4>TỔNG SẢN PHẨM</h4>
                        <p><b>
                                <?php echo $row_products['SPID_TMD']; ?> sản phẩm
                            </b></p>
                    </div>
                </div>
            </div>

            <div class="col_md_12_tmd col_lg_6_tmd">
                <div class="widget-small primary coloured-icon">
                    <i class='icon ired bx bx-message-square-minus'></i>
                    <div class="info_tmd">
                        <h4>HẾT HÀNG</h4>
                        <p><b>
                                <?php echo $row_over['TINHTRANG_TMD']; ?> sản phẩm
                            </b></p>
                    </div>
                </div>
            </div>

            <div class="col_md_12_tmd col_lg_6_tmd">
                <div class="widget-small primary coloured-icon">
                    <i class='icon ired bx bx-shopping-bag'></i></i>
                    <div class="info_tmd">
                        <h4>TỒN KHO</h4>
                        <p><b>
                                <?php echo $row_slot['SOLUONG_TMD']; ?> sản phẩm
                            </b></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row_tmd">
            <div class="col_md_12_tmd">
                <div class="title_tmd">
                    <h3 class="ank_title_tmd">DANH SÁCH SẢN PHẨM HẾT HÀNG</h3>
                    <div class="body_title_tmd">
                        <table class="table_tmd table_hover_tmd table_bordered_tmd" id="productTable">
                            <thead>
                                <tr>
                                    <th>Mã sản phẩm</th>
                                    <th>Ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Tình trạng</th>
                                    <th>Dòng sản phẩm</th>
                                    <th>Loại sản phẩm</th>
                                    <th>Giá gốc</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql_over1_products_tmd = "SELECT * FROM SANPHAM_TMD WHERE TINHTRANG_TMD = 0";

                                $result_tmd = $conn_tmd->query($sql_over1_products_tmd);

                                if ($result_tmd->num_rows > 0) {
                                    while ($row_over1 = $result_tmd->fetch_assoc()) {
                                        ?>
                                        <tr class="product-row">
                                            <td>
                                                <?php echo $row_over1['SPID_TMD']; ?>
                                            </td>
                                            <td>
                                                <img width="100%" max-width="50px" height="20px"
                                                    style="display: flex; align-items: center; justify-content: center;"
                                                    src="../Img/<?php echo $row_over1['IMG_TMD']; ?>" alt="">
                                            </td>
                                            <td>
                                                <?php echo $row_over1['TENSP_TMD']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row_over1['SOLUONG_TMD']; ?>
                                            </td>
                                            <td>
                                                <span class="tt_sp_tmd">
                                                    <?php echo $row_over1['TINHTRANG_TMD'] == 1 ? "Còn hàng" : "Hết hàng"; ?>
                                                </span>
                                            </td>
                                            <td>
                                                <?php echo $row_over1['DONGSP_TMD'] == 1 ? "Laptop Gaming" : "Laptop Văn Phòng"; ?>
                                            </td>
                                            <td>
                                                <?php
                                                $loaiSanPham = ($row_over1['LOAISP_TMD'] == 0) ? 'Sản phẩm mới' :
                                                    (($row_over1['LOAISP_TMD'] == 1) ? 'Sản phẩm phổ biến' :
                                                        (($row_over1['LOAISP_TMD'] == 2) ? 'Sản phẩm khuyến mãi' :
                                                            (($row_over1['LOAISP_TMD'] == 3) ? 'Sản phẩm bán chạy' : 'Không xác định')));

                                                echo $loaiSanPham;
                                                ?>
                                            </td>
                                            <td>
                                                <?php echo $row_over1['GIAGOC_TMD']; ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="13" style="  text-align: center;">Chưa có sản phẩm nào hết hàng!</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row_tmd">
            <div class="col_md_12_tmd">
                <div class="title_tmd">
                    <h3 class="ank_title_tmd">DANH SÁCH KHÁCH HÀNG MỚI</h3>
                    <div class="body_title_tmd">
                        <table class="table_tmd table_hover_tmd table_bordered_tmd" id="memberTable">
                            <thead>
                                <tr>
                                    <th>Tên đăng nhập</th>
                                    <th>Họ và tên</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Mật khẩu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql_login1_tmd = "SELECT * FROM DANGKY WHERE TENDN_TMD IS NOT NULL ORDER BY ThoiGianDangKy DESC LIMIT 3";
                                $result_tmd = $conn_tmd->query($sql_login1_tmd);
                                if ($result_tmd->num_rows > 0) {
                                    while ($row_lg = $result_tmd->fetch_assoc()) {
                                        ?>
                                        <tr class="member-row">
                                            <td>
                                                <?php echo $row_lg['TENDN_TMD']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row_lg['HOTEN_TMD']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row_lg['EMAIL_TMD']; ?>
                                            </td>
                                            <td>
                                                +84
                                                <?php echo $row_lg['SDT_TMD']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row_lg['MATKHAU_TMD']; ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>