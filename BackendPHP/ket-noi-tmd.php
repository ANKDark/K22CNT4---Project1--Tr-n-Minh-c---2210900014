<?php 
    $conn_tmd = new mysqli("localhost", "root", "", "project1_TMD_2210900014");
    if ($conn_tmd->connect_error) {
        echo "<h2>Lỗi: " . $conn_tmd->connect_error . "</h2>";
    } else {
    }
?>