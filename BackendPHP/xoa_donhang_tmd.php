<?php
include('ket-noi-tmd.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['MADONHANG']) && !empty($data['MADONHANG'])) {
        $MADONHANG = $data['MADONHANG'];
        $sql_del_tmd = "DELETE FROM DONHANG WHERE MADONHANG = '$MADONHANG'";

        if ($conn_tmd->query($sql_del_tmd)) {
            $response = ['success' => true, 'message' => 'Xóa khách hàng thành công'];
            echo json_encode($response);
            exit;
        } else {
            $response = ['success' => false, 'message' => 'Lỗi xóa khách hàng: ' . $conn_tmd->error];
            echo json_encode($response);
            exit;
        }
    } else {
        $response = ['success' => false, 'message' => 'Lỗi xóa khách hàng: MADONHANG không hợp lệ'];
        echo json_encode($response);
        exit;
    }
}
?>