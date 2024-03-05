<?php
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

    $date = date_create($_POST["birth"]);
    $sql = "INSERT INTO customers(fullname, email, birthday, password) 
                VALUES('".$_POST["name"]."', '".$_POST["email"]."', '".$date->format('Y-m-d')."', '".md5($_POST["pass"])."')";  // ma hoa password voi giai thuat MD5 de bao mat
    
    if($conn->query($sql) == TRUE) {
        echo "Them khach hang thanh cong";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>