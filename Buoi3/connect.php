<?php
    // thong tin ve chuoi ket noi bao gom server name, username va mat khau de dang nhao vao mysql
    // mac dinh cua xampp la root, password rong
    $servername = "localhost";
    $username = "root";
    $password = "";

    // Create connection
    $conn = new mysqli($servername, $username, $password);
    // Check connection
    if($conn->connect_error) {
        // hien thi loi khong ket noi duoc
        die ("Connection failed: " . $conn->connect_error);
    }
        // neu ket noi thanh cong
    echo "Connected successfully";
?>