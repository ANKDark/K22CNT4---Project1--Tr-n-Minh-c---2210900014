<?php
include('ket-noi-tmd.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['SPID_TMD']) && !empty($data['SPID_TMD'])) {
        $SPID_TMD = $data['SPID_TMD'];
        $sql_del_tmd = "DELETE FROM SANPHAM_TMD WHERE SPID_TMD = '$SPID_TMD'";

        if ($conn_tmd->query($sql_del_tmd)) {
            $response = ['success' => true, 'message' => 'Xóa sản phẩm thành công'];
            echo json_encode($response);
            exit;
        } else {
            $response = ['success' => false, 'message' => 'Lỗi xóa sản phẩm: ' . $conn_tmd->error];
            echo json_encode($response);
            exit;
        }
    } else {
        $response = ['success' => false, 'message' => 'Lỗi xóa sản phẩm: SPID_TMD không hợp lệ'];
        echo json_encode($response);
        exit;
    }
}
?>