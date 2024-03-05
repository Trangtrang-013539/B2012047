<?php
    session_start();
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qlbanhang";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // (Thong tin nguoi dung da co trong bien cuc bo $_SESSION)
    // Cap nhat lai passwork trong csdl neu: mk cu trung voi trong csdl, mk moi va nhap lai trung khop, mk moi khong trung mk cu
    if(md5($_POST["old_pass"]) === $_SESSION["password"] && $_POST["new_pass"] === $_POST["renew_pass"] && md5($_POST["new_pass"]) !== $_SESSION["password"]) {
        $sql = "UPDATE customers 
                SET password='".md5($_POST["new_pass"])."' 
                WHERE id='".$_SESSION["id"]."'";
        $conn->query($sql);
        echo "Cap nhat mat khau thanh cong!";
        header('Refresh: 3; url=homepage.php');
    } else {
        echo "Cap nhat mat khau khong thanh cong!";
        header('Refresh: 3; url=sua_mk.php');
    }
?>
