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

    $sql = 'SELECT id, fullname, email, img_profile, password
            FROM customers 
            WHERE email="'.$_POST["email"].'" and password="'.md5($_POST["pass"]).'"';
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // echo "Dang nhap thanh cong <br>";
        // echo "Email: " .$row["email"]. "<br>Fullname: " .$row["fullname"];

        //SỬ DỤNG COOKIE
        // $cookie_name = "user";
        // $cookie_value = $row["email"];
        // setcookie($cookie_name, $cookie_value, time()+(86400/24), "/");
        // setcookie("fullname", $row["fullname"], time()+(86400/24), "/");
        // setcookie("id", $row["id"], time()+(86400/24), "/");
        // setcookie("img_profile", './uploads/'.$row['img_profile'], time()+(86400/24), "/");

        //SỬ DỤNG SESSION
        
        $_SESSION["user"] = $row["email"];
        $_SESSION["fullname"] = $row["fullname"];
        $_SESSION["id"] = $row["id"];
        $_SESSION["img_profile"] = './uploads/' . $row["img_profile"];
        $_SESSION["password"] = $row["password"];

        header('Location: homepage.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        // Tro ve trang dang nhap sau 3 giay
        header('Refresh: 3; url=login.php');
    }

    $conn->close();
?>