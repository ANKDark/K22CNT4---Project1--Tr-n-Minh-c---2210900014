<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="z.css">
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
                <a href="Trangchu-tmd.php" title="Đăng xuất">
                    <i class='fa bx fa bx-log-out'></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidebar_tmd">
        <div class="sidebar_user_tmd">
            <img class="sidebar_user_avatar_tmd" src="Img/Face_tmd.jpg" alt="">
            <div>
                <p class="sidebar_user_name_tmd"><b>Trần Minh Đức</b></p>
                <p class="sidebar_user_designation_tmd">Chào mừng trở lại</p>
            </div>
        </div>
        <hr>
        <ul class="app_menu_tmd">
            <li><a class="app_menu_item_tmd ank" href="#"><i class='fa bx fa bx-cart-alt'></i><span
                        class="app_menu_label_tmd">ANK Bán Hàng</span></a></li>
            <li><a class="app_menu_item_tmd" href="bang_dieu_khien_tmd.php"><i class='fa bx fa bx-tachometer'></i><span
                        class="app_menu_label_tmd">Bảng điều khiển</span></a></li>
            <li><a class="app_menu_item_tmd" href="quanly-khachhang-tmd.php"><i class='fa bx fa bx-id-card'></i><span
                        class="app_menu_label_tmd">Quản
                        lý khách hàng</span></a></li>
            <li><a class="app_menu_item_tmd" href="quanly-sp-tmd.php"><i class='fa bx fa bx-data'></i></i><span
                        class="app_menu_label_tmd">Quản lý sản phẩm</span></a></li>
            <li><a class="app_menu_item_tmd active" href="#"><i class='fa bx fa bx-purchase-tag-alt'></i><span
                        class="app_menu_label_tmd">Thêm sản phẩm</span></a></li>
            <li><a class="app_menu_item_tmd" href="#"><i class='fa bx fa bx-task'></i><span
                        class="app_menu_label_tmd">Quản lý
                        đơn hàng</span></a></li>
            <li><a class="app_menu_item_tmd" href="#"><i class='fa bx fa bx-run'></i><span
                        class="app_menu_label_tmd">Quản lý
                        nội bộ</span></a></li>
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
                <li class="breadcrumb_item_tmd">Danh sách sản phẩm</li>
                <li class="breadcrumb_item_tmd"><a href="#">Thêm sản phẩm</a></li>
            </ul>
        </div>
        <div class="row_tmd">
            <div class="col_tmd">
                <div class="title_tmd">
                    <h3 class="ank_title_tmd">Tạo mới sản phẩm</h3>
                    <div class="body_title_tmd">
                        <div class="row_tmd element_button_tmd">
                            <div class="col_ank_tmd">
                                <a href="#" class="btn_tmd btn_sm_tmd">
                                    <i class='ank_fa_tmd bx bxs-folder-plus'></i>
                                    Thêm nhãn hiệu
                                </a>
                            </div>
                            <div class="col_ank_tmd">
                                <a href="#" class="btn_tmd btn_sm_tmd">
                                    <i class='ank_fa_tmd bx bxs-folder-plus'></i>
                                    Thêm loại sản phẩm
                                </a>
                            </div>
                            <div class="col_ank_tmd">
                                <a href="#" class="btn_tmd btn_sm_tmd">
                                    <i class='ank_fa_tmd bx bxs-folder-plus'></i>
                                    Thêm tình trạng
                                </a>
                            </div>
                        </div>
                        <form action="xulyform-sp-tmd.php" class="row_tmd" method="POST">
                            <div class="form_group_tmd col_md3_tmd">
                                <label for="" class="control_label_tmd">Mã sản phẩm</label>
                                <input type="number" class="form_control_tmd" name="SPID_TMD">
                            </div>

                            <div class="form_group_tmd col_md3_tmd">
                                <label for="" class="control_label_tmd">Tên sản phẩm</label>
                                <input type="text" class="form_control_tmd" placeholder="" name="TENSP_TMD">
                            </div>

                            <div class="form_group_tmd col_md3_tmd">
                                <label for="" class="control_label_tmd">Số lượng</label>
                                <input type="number" class="form_control_tmd" placeholder="" name="SOLUONG_TMD">
                            </div>

                            <div class="form_group_tmd col_md3_tmd">
                                <label for="exampleSelect1_tmd" class="control_label_tmd">Tình trạng</label>
                                <select name="TINHTRANG_TMD" id="exampleSelect1_tmd" class="form_control_tmd">
                                    <option value="">-- Chọn tình trạng --</option>
                                    <option value="1">Còn hàng</option>
                                    <option value="0">Hết hàng</option>
                                </select>
                            </div>

                            <div class="form_group_tmd col_md3_tmd">
                                <label for="exampleSelect1_tmd" class="control_label_tmd">Dòng sản phẩm</label>
                                <select name="DONGSP_TMD" id="exampleSelect1_tmd" class="form_control_tmd">
                                    <option value="">-- Chọn dòng sản phẩm --</option>
                                    <option value="1">Laptop Gaming</option>
                                    <option value="0">Laptop Văn Phòng</option>
                                </select>
                            </div>

                            <div class="form_group_tmd col_md3_tmd">
                                <label for="exampleSelect1_tmd" class="control_label_tmd">Loại sản phẩm</label>
                                <select name="LOAISP_TMD" id="exampleSelect1_tmd" class="form_control_tmd">
                                    <option value="">-- Chọn loại sản phẩm --</option>
                                    <option value="0">Sản phẩm mới</option>
                                    <option value="1">Sản phẩm phổ biến</option>
                                    <option value="2">Sản phẩm khuyến mãi</option>
                                    <option value="3">Sản phẩm bán chạy</option>
                                </select>
                            </div>

                            <div class="form_group_tmd col_md3_tmd">
                                <label for="exampleSelect1_tmd" class="control_label_tmd">Giảm giá sản phẩm</label>
                                <select name="GIAMGIA_TMD" id="exampleSelect1_tmd" class="form_control_tmd">
                                    <option value="">-- Lựa chọn --</option>
                                    <option value="1">Có</option>
                                    <option value="0">Không</option>
                                </select>
                            </div>

                            <div class="form_group_tmd col_md3_tmd">
                                <label for="" class="control_label_tmd">Giá bán</label>
                                <input type="number" class="form_control_tmd" placeholder="Nhập giá tiền"
                                    name="GIABAN_TMD">
                            </div>

                            <div class="form_group_tmd col_md3_tmd">
                                <label for="" class="control_label_tmd">Giá gốc</label>
                                <input type="number" class="form_control_tmd" placeholder="Nhập giá tiền"
                                    name="GIAGOC_TMD">
                            </div>

                            <div class="form_group_tmd col_md3_tmd">
                                <label for="" class="control_label_tmd">Giá đã giảm</label>
                                <input type="number" class="form_control_tmd" placeholder="Nhập giá tiền"
                                    name="GIADAGIAM_TMD">
                            </div>

                            <div class="form_group_tmd col_md12_tmd">
                                <label for="" class="control_label_tmd">Ảnh sản phẩm</label>
                                <div id="my_img_upload_tmd">
                                    <input type="file" id="uploadfile_tmd" name="IMG_TMD" onchange="readURL(this);">
                                </div>
                                <div id="thumbbox_tmd">
                                    <img height="350" width="500" src="" alt="Thumb Img" id="thumbimage_tmd"
                                        style="display: none;">
                                    <a href="javascript:" class="removeimg_tmd"></a>
                                </div>
                                <div id="boxchoice_tmd">
                                    <a href="javascript:" class="choicefile_tmd">
                                        <i class='bx bx-cloud-upload'></i>
                                        Chọn ảnh
                                    </a>
                                    <p style="clear:both"></p>
                                </div>
                            </div>

                            <div class="form_group_tmd col_md12_tmd">
                                <label for="" class="control_label_tmd">Mô tả sản phẩm</label>
                                <textarea name="MOTA_TMD" id="mota_tmd" class="form_control_tmd"></textarea>
                                <script>CKEDITOR.replace('mota_tmd');</script>
                            </div>

                            <input type="submit" value="Lưu lại" name="btnSubtmd" class="btn_sub_tmd">
                            <input type="reset" value="Làm lại" name="btnResettmd" class="btn_reset_tmd">
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>