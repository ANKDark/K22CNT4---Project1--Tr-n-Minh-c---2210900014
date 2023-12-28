<?php
include("ket-noi-tmd.php");

$TENDN_TMD = $_POST['tendn'];

if (!empty($TENDN_TMD)) {
    $sql_sua_tmd = "SELECT * FROM DANGKY WHERE TENDN_TMD = ?";
    $statement = $conn_tmd->prepare($sql_sua_tmd);
    $statement->bind_param("s", $TENDN_TMD);
    $statement->execute();

    $res_sua_tmd = $statement->get_result();
    $row = $res_sua_tmd->fetch_array();

    $statement->close();
} else {
    $error_tmd = "Không có giá trị TENDN được gửi đến từ POST.";
}

function getStatusName($TENDN_TMD)
{
}
;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/z.css">
    <title>Sửa khách hàng</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
 
<body>
    <div class="edit-title">Sửa khách hàng</div>
    <div class="edit-text">
        <form action="xulyform-edit-khachhang-tmd.php" class="row_tmd" method="post">
            <div class="form_group_edit_tmd">
                <label for="" class="control_label_tmd">Tên đăng nhập</label>
                <input type="text" class="input_box_tmd" name="TENDN_TMD" value="<?php echo $TENDN_TMD; ?>">
            </div>

            <div class="form_group_edit_tmd">
                <label for="" class="control_label_tmd">Họ và tên</label>
                <input type="text" class="input_box_tmd" name="HOTEN_TMD" value="<?php echo $row['HOTEN_TMD']; ?>">
            </div>

            <div class="form_group_edit_tmd">
                <label for="" class="control_label_tmd">Email</label>
                <input type="text" class="input_box_tmd" name="EMAIL_TMD" value="<?php echo $row['EMAIL_TMD']; ?>">
            </div>

            <div class="form_group_edit_tmd">
                <label for="" class="control_label_tmd">Số điện thoại</label>
                <input type="number" class="input_box_tmd" name="SDT_TMD" value="<?php echo $row['SDT_TMD']; ?>">
            </div>

            <div class="form_group_edit_tmd">
                <label for="" class="control_label_tmd">Mật khẩu</label>
                <input type="text" class="input_box_tmd" name="MATKHAU_TMD" value="<?php echo $row['MATKHAU_TMD']; ?>">
            </div>
            
            <div>
                <div class="edit-footer">
                    <div class="edit-button-container">
                        <input type="submit" class="edit-button edit-button-member-confirm" name="btnSuaTMD" value="Cập nhật">
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