<?php
include('../BackendPHP/ket-noi-tmd.php');
session_start();
if (!$_SESSION['admin_id'] == 'Admin' && !$_SESSION['admin_pass'] == 'Ducdeptrai') {
    header('Location: ../Admin/login_tmd.php');
}
$limit_tmd_options = [10, 25, 50, 100];
if (isset($_GET['lengthSelect_tmd'])) {
    $limit_tmd = $_GET['lengthSelect_tmd'];
} else {
    $limit_tmd = 10;
}

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit_tmd;

$sql_sp_tmd = "SELECT * FROM news LIMIT $offset, $limit_tmd";
$result_tmd = $conn_tmd->query($sql_sp_tmd);

$sql_count = "SELECT COUNT(*) as total FROM news";
$result_count = $conn_tmd->query($sql_count);
$row_count = $result_count->fetch_assoc();
$total_pages = ceil($row_count['total'] / $limit_tmd);

if (isset($_GET['srch_tmd'])) {
    $searchTerm = $_GET['srch_tmd'];
    $sql_search = "SELECT * FROM news WHERE TITLE LIKE '%$searchTerm%'";
    $result_search = $conn_tmd->query($sql_search);

    if ($result_search->num_rows > 0) {
        while ($row_search = $result_search->fetch_assoc()) {
            echo "<tr class='product-row'>";
            echo "<td width='10px'><input type='checkbox' id='all'></td>";
            echo "<td>{$row_search['MANEW']}</td>";
            echo "<td><img width='100%' max-width='50px' height='20px' style='display: flex; align-items: center; justify-content: center;' src='Img/{$row_search['IMG']}' alt=''></td>";
            echo "<td>{$row_search['TITLE']}</td>";
            echo "<td>{$row_search['CHITIETNEW']}</td>";
            echo "<td>{$row_search['HIENTHI']}</td>";
            echo "<td>";
            echo "<button class='btn btn-primary btn-sm trash' type='button' title='Xóa' onclick=\"button_Delete_tmd('{$row_search['SPID_TMD']}')\"><i class='ank_fa_tmd bx bx-trash'></i></button>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr>";
        echo "<td colspan='13' style='text-align: center;'>Không tìm thấy kết quả tìm kiếm</td>";
        echo "</tr>";
    }
    exit();
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
</head>

<script>
    function updateClock() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();
        var day = now.getDate();
        var month = now.getMonth() + 1;
        var year = now.getFullYear();
        var dayOfWeek = now.getDay();

        hours = (hours < 10) ? "0" + hours : hours;
        minutes = (minutes < 10) ? "0" + minutes : minutes;
        seconds = (seconds < 10) ? "0" + seconds : seconds;

        var daysOfWeek = ["Chủ Nhật ", "Thứ Hai ", "Thứ Ba ", "Thứ Tư ", "Thứ Năm ", "Thứ Sáu ", "Thứ Bảy "];

        var clockHTML =
            '<span>' + daysOfWeek[dayOfWeek] + '</span>' +
            '<span>' + day + '/' + month + '/' + year + '</span>' +
            '<span> ' + hours + ' giờ ' + minutes + ' phút ' + seconds + ' giây</span>';

        document.getElementById('clock_tmd').innerHTML = clockHTML;

        setTimeout(updateClock, 1000);
    }

    window.onload = function () {
        updateClock();
    };
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
            <li><a class="app_menu_item_tmd" href="bang_dieu_khien_tmd.php"><i class='fa bx fa bx-tachometer'></i><span
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
            <li><a class="app_menu_item_tmd active" href="quanly_news_tmd.php"><i class='fa bx fa bx-run'></i><span
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
                <li class="breadcrumb_item_tmd"><a href="#">Danh sách tin tức</a></li>
            </ul>
            <div id="clock_tmd"></div>
        </div>
        <div class="row_tmd">
            <div class="col_tmd">
                <div class="title_tmd">
                    <div class="body_title_tmd">
                        <div class="row_tmd element_button_tmd">
                            <div class="col_ank_tmd">
                                <a href="them-sp-tmd.php" class="btn_tmd btn_sm_tmd">
                                    <i class='ank_fa_tmd bx bx-plus'></i>
                                    Tạo mới sản phẩm
                                </a>
                            </div>
                            <div class="col_ank_tmd">
                                <a href="#" class="btn_tmd btn_sm_tmd">
                                    <i class='ank_fa_tmd bx bxs-file-import'></i>
                                    Tải từ file
                                </a>
                            </div>
                            <div class="col_ank_tmd">
                                <a href="#" class="btn_tmd btn_sm_tmd">
                                    <i class='ank_fa_tmd bx bxs-printer'></i>
                                    In dữ liệu
                                </a>
                            </div>
                            <div class="col_ank_tmd">
                                <a href="#" class="btn_tmd btn_sm_tmd">
                                    <i class='ank_fa_tmd bx bxs-copy'></i>
                                    Sao chép
                                </a>
                            </div>
                            <div class="col_ank_tmd">
                                <a href="#" class="btn_tmd btn_sm_tmd">
                                    <i class='ank_fa_tmd bx bxs-file'></i>
                                    Xuất Excel
                                </a>
                            </div>
                            <div class="col_ank_tmd">
                                <a href="#" class="btn_tmd btn_sm_tmd">
                                    <i class='ank_fa_tmd bx bxs-file-pdf'></i>
                                    Xuất PDF
                                </a>
                            </div>
                            <div class="col_ank_tmd">
                                <a href="#" class="btn_tmd btn_sm_tmd">
                                    <i class='ank_fa_tmd bx bxs-trash'></i>
                                    Xóa tất cả
                                </a>
                            </div>
                        </div>
                        <div class="dataTables_wrapper_tmd container-fluid">
                            <div class="row_tmd">
                                <div class="col_sm12_tmd col_md6_tmd">
                                    <div class="dataTables_length_tmd" id="sampleTable_length_tmd">
                                        <label for="">
                                            Hiện
                                            <select id="lengthSelect_tmd" name="lengthSelect_tmd"
                                                aria-controls="sampleTable_tmd"
                                                class="form_control_tmd form_control_sm_tmd"
                                                onchange="updateProductList()">
                                                <?php
                                                foreach ($limit_tmd_options as $option) {
                                                    echo "<option value=\"$option\"";
                                                    if ($limit_tmd == $option)
                                                        echo 'selected';
                                                    echo ">$option</option>";
                                                }
                                                ?>
                                            </select>
                                            Danh mục
                                        </label>
                                    </div>
                                </div>
                                <div class="col_sm12_tmd col_md6_tmd">
                                    <div class="dataTables_filter_tmd" id="sampleTable_filter_tmd">
                                        <form action="" method="get">
                                            <label style="display:flex; align-items: center;" for="">
                                                Tìm kiếm
                                                <input type="search" class="form_control_tmd form_control_sm_tmd"
                                                    name="srch_tmd">
                                            </label>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table_tmd table_hover_tmd table_bordered_tmd" id="productTable">
                            <thead>
                                <tr>
                                    <th width="10px"></th>
                                    <th>Mã sản phẩm</th>
                                    <th>Ảnh</th>
                                    <th>Title</th>
                                    <th>Chi tiết</th>
                                    <th>Hiển thị</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($result_tmd->num_rows > 0) {
                                    while ($row = $result_tmd->fetch_assoc()) {
                                        ?>
                                        <tr class="product-row">
                                            <td width="10px">
                                                <input type="checkbox" id="all">
                                            </td>
                                            <td>
                                                <?php echo $row['MANEW']; ?>
                                            </td>
                                            <td>
                                                <img width="100%" max-width="50px" height="20px"
                                                    style="display: flex; align-items: center; justify-content: center;"
                                                    src="../Img/<?php echo $row['IMG']; ?>" alt="">
                                            </td>
                                            <td>
                                                <?php echo $row['TITLE']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['CHITIETNEW']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['HIENTHI'] == 1 ? "Hiển thị" : "Không hiển thị"; ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-primary btn-sm trash" type="button" title="Xóa"
                                                    onclick="button_Delete_tmd('<?php echo $row['SPID_TMD']; ?>')"><i
                                                        class='ank_fa_tmd bx bx-trash'></i></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="13" style="  text-align: center;">Chưa có tin tức nào</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <?php
                        echo "<div class='pagination_tmd'>";
                        for ($i = 1; $i <= $total_pages; $i++) {
                            echo "<a class='pages_tmd' href='?page=$i'>$i</a>";
                        }
                        echo "</div>";
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="swal-overlay_tmd swal-overlay--show-modal" tabindex="-1">
            <div class="swal-modal" role="dialog" aria-modal="true">
                <div class="swal-title">Cảnh báo</div>
                <div class="swal-text">Bạn có chắc chắn là muốn xóa tin tức này?</div>
                <div class="swal-footer">
                    <div class="swal-button-container">
                        <button class="swal-button swal-button--cancel">Hủy bỏ</button>
                        <div class="swal-button__loader">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                    <div class="swal-button-container">
                        <button class="swal-button swal-button--confirm">Đồng ý</button>
                        <div class="swal-button__loader">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    </div>
</body>
<script>
    function button_Delete_tmd(SPID_TMD) {
        document.querySelector('.swal-overlay--show-modal').style.opacity = '1';
        document.querySelector('.swal-overlay--show-modal').style.display = 'block';

        var cancelButton = document.querySelector('.swal-button--cancel');
        var confirmButton = document.querySelector('.swal-button--confirm');
        var modalOverlay = document.querySelector('.swal-overlay_tmd');

        cancelButton.addEventListener('click', function () {
            modalOverlay.style.opacity = '0';
            modalOverlay.style.display = 'none';
        });

        confirmButton.addEventListener('click', function () {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../BackendPHP/xoa_sp_tmd.php", true);
            xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
            xhr.onload = function () {
                if (xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        console.log(response.message);
                        window.location.reload();
                    } else {
                        console.error(response.message);
                    }
                    modalOverlay.style.opacity = '0';
                    modalOverlay.style.display = 'none';
                }
            };
            xhr.onerror = function () {
                console.error("Lỗi kết nối");
            };

            var data = { SPID_TMD: SPID_TMD };
            xhr.send(JSON.stringify(data));
        });
    }

    function updateProductList() {
        var limit = document.getElementById('lengthSelect_tmd').value;

        $.ajax({
            url: 'quanly_news_tmd.php',
            type: 'GET',
            data: { lengthSelect_tmd: limit },
            success: function (data) {
                console.log(data);

                $('.dark').html(data);

                loadPage(1);
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }

    $(document).ready(function () {
        $('input[name="srch_tmd"]').on('input', function () {
            var searchTerm = $(this).val();

            $.ajax({
                url: 'quanly_news_tmd.php',
                type: 'GET',
                data: { srch_tmd: searchTerm },
                success: function (data) {
                    $('#productTable tbody').html(data);
                    loadPage(1);
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });

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

</html>