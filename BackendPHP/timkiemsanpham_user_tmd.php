<?php 
    include('ket-noi-tmd.php');
    if (isset($_POST['sub_srch_tmd'])) {
        $searchTerm = $_POST['timkiem_tmd'];
        $sql_search = "SELECT SPID_TMD FROM sanpham_tmd WHERE TENSP_TMD LIKE '%$searchTerm%'";
        $result_search = $conn_tmd->query($sql_search);
        $row = $result_search->fetch_array();
        $SPID_TMD = $row['SPID_TMD'];
        if ($result_search->num_rows > 0) { 
            header("Location: ../User/chi_tiet_sp_tmd.php?spid=$SPID_TMD");
            exit();
        }else {
            echo "<script>
                    alert('Sản phẩm bạn tìm không tồn tại');
                    window.location.href = '../User/Trangchu-tmd.php';
                </script>";
        }
    }
?>
