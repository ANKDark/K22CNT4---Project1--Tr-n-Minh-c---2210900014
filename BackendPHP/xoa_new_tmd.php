<?php
include('ket-noi-tmd.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['MANEW']) && !empty($data['MANEW'])) {
        $MANEW = $data['MANEW'];
        $sql_del_tmd = "DELETE FROM NEW WHERE MANEW = '$MANEW'";

        if ($conn_tmd->query($sql_del_tmd)) {
            $response = ['success' => true, 'message' => 'Xóa tin thành công'];
            echo json_encode($response);
            exit;
        } else {
            $response = ['success' => false, 'message' => 'Lỗi xóa tin: ' . $conn_tmd->error];
            echo json_encode($response);
            exit;
        }
    } else {
        $response = ['success' => false, 'message' => 'Lỗi xóa tin: MANEW không hợp lệ'];
        echo json_encode($response);
        exit;
    }
}
?>