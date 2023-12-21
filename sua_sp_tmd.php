<?php
include("ket-noi-tmd.php");

$SPID_TMD = $_POST['spid'];

if (!empty($SPID_TMD)) {
    $sql_sua_tmd = "SELECT * FROM SANPHAM_TMD WHERE SPID_TMD = ?";
    $statement = $conn_tmd->prepare($sql_sua_tmd);
    $statement->bind_param("s", $SPID_TMD);
    $statement->execute();

    $res_sua_tmd = $statement->get_result();
    $row = $res_sua_tmd->fetch_array();

    $statement->close();
} else {
    $error_tmd = "Không có giá trị SPID được gửi đến từ POST.";
}

function getStatusName($SPID_TMD)
{
}
;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="z.css">
    <title>Sửa sản phẩm</title>
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
        $(".choicefile_tmd").unbind('click');
    }

    $(document).ready(function () {
        $(".choicefile_tmd").bind('click', function () {
            $("#uploadfile_tmd").click();
        });
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#thumbimage_tmd').attr('src', e.target.result).show();
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<body>
    <div class="edit-title">Sửa sản phẩm</div>
    <div class="edit-text">
        <form action="xulyform-edit-sp-tmd.php" class="row_tmd" method="post">
            <div class="form_group_edit_tmd">
                <label for="" class="control_label_tmd">Mã sản phẩm</label>
                <input type="number" class="input_box_tmd" name="SPID_TMD" value="<?php echo $SPID_TMD; ?>">
            </div>

            <div class="form_group_edit_tmd">
                <label for="" class="control_label_tmd">Tên sản phẩm</label>
                <input type="text" class="input_box_tmd" name="TENSP_TMD" value="<?php echo $row['TENSP_TMD']; ?>">
            </div>

            <div class="form_group_edit_tmd">
                <label for="" class="control_label_tmd">Số lượng</label>
                <input type="number" class="input_box_tmd" placeholder="" name="SOLUONG_TMD"
                    value="<?php echo $row['SOLUONG_TMD']; ?>">
            </div>

            <div class="form_group_edit_tmd">
                <label for="exampleSelect1_tmd" class="control_label_tmd">Tình trạng</label>
                <select name="TINHTRANG_TMD" id="exampleSelect1_tmd" class="input_box_tmd">
                    <option value="">-- Chọn tình trạng --</option>
                    <option value="1" <?php echo ($row['TINHTRANG_TMD'] == 1) ? 'selected' : ''; ?>>Còn hàng
                    </option>
                    <option value="0" <?php echo ($row['TINHTRANG_TMD'] == 0) ? 'selected' : ''; ?>>Hết hàng
                    </option>
                </select>
            </div>

            <div class="form_group_edit_tmd">
                <label for="exampleSelect1_tmd" class="control_label_tmd">Dòng sản phẩm</label>
                <select name="DONGSP_TMD" id="exampleSelect1_tmd" class="input_box_tmd">
                    <option value="">-- Chọn dòng sản phẩm --</option>
                    <option value="1" <?php echo ($row['DONGSP_TMD'] == 1) ? 'selected' : ''; ?>>Laptop
                        Gaming
                    </option>
                    <option value="0" <?php echo ($row['DONGSP_TMD'] == 0) ? 'selected' : ''; ?>>Laptop Văn
                        Phòng
                    </option>
                </select>
            </div>

            <div class="form_group_edit_tmd">
                <label for="exampleSelect1_tmd" class="control_label_tmd">Loại sản phẩm</label>
                <select name="LOAISP_TMD" id="exampleSelect1_tmd" class="input_box_tmd">
                    <option value="">-- Chọn loại sản phẩm --</option>
                    <option value="0" <?php echo ($row['LOAISP_TMD'] == 0) ? 'selected' : ''; ?>>Sản phẩm
                        mới
                    </option>
                    <option value="1" <?php echo ($row['LOAISP_TMD'] == 1) ? 'selected' : ''; ?>>Sản phẩm
                        phổ biến
                    </option>
                    <option value="2" <?php echo ($row['LOAISP_TMD'] == 2) ? 'selected' : ''; ?>>Sản phẩm
                        khuyến mãi
                    </option>
                    <option value="3" <?php echo ($row['LOAISP_TMD'] == 3) ? 'selected' : ''; ?>>Sản phẩm
                        bán chạy
                    </option>
                </select>
            </div>

            <div class="form_group_edit_tmd">
                <label for="exampleSelect1_tmd" class="control_label_tmd">Giảm giá sản phẩm</label>
                <select name="GIAMGIA_TMD" id="exampleSelect1_tmd" class="input_box_tmd">
                    <option value="">-- Lựa chọn --</option>
                    <option value="1" <?php echo ($row['GIAMGIA_TMD'] == 1) ? 'selected' : ''; ?>>Có
                    </option>
                    <option value="0" <?php echo ($row['GIAMGIA_TMD'] == 0) ? 'selected' : ''; ?>>Không
                    </option>
                </select>
            </div>

            <div class="form_group_edit_tmd">
                <label for="" class="control_label_tmd">Giá bán</label>
                <input type="number" class="input_box_tmd" placeholder="Nhập giá tiền" name="GIABAN_TMD"
                    value="<?php echo $row['GIABAN_TMD']; ?>">
            </div>

            <div class="form_group_edit_tmd">
                <label for="" class="control_label_tmd">Giá gốc</label>
                <input type="number" class="input_box_tmd" placeholder="Nhập giá tiền" name="GIAGOC_TMD"
                    value="<?php echo $row['GIAGOC_TMD']; ?>">
            </div>

            <div class="form_group_edit_tmd">
                <label for="" class="control_label_tmd">Giá đã giảm</label>
                <input type="number" class="input_box_tmd" placeholder="Nhập giá tiền" name="GIADAGIAM_TMD"
                    value="<?php echo $row['GIADAGIAM_TMD']; ?>">
            </div>

            <div class="form_group_tmd col_md12_tmd">
                <label for="" class="control_label_tmd">Ảnh sản phẩm</label>
                <div id="my_img_upload_tmd">
                    <input type="file" id="uploadfile_tmd" name="IMG_TMD" onchange="readURL(this);">
                </div>
                <div id="thumbbox_tmd">
                    <img height="350" width="500" src="" alt="Thumb Img" id="thumbimage_tmd" style="display: none;">
                </div>
                <div id="boxchoice_tmd">
                    <a href="javascript:" class="choicefile_tmd"
                        onclick="document.getElementById('uploadfile_tmd').click();">
                        <i class='bx bx-cloud-upload'></i>
                        Chọn ảnh
                    </a>
                    <p style="clear:both"></p>
                </div>
            </div>

            <div class="form_group_tmd">
                <label for="" class="control_label_tmd">Mô tả sản phẩm</label>
                <textarea name="MOTA_TMD" id="mota_tmd" class="input_box_tmd"><?php echo $row['MOTA_TMD']; ?></textarea>
                <script>CKEDITOR.replace('mota_tmd');</script>
            </div>
            <div>
                <div class="edit-footer">
                    <div class="edit-button-container">
                        <input type="submit" class="edit-button edit-button--confirm" name="btnSuaTMD" value="Cập nhật">
                        <div class="edit-button__loader">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>