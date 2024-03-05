<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qlsv";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if($conn->connect_error) {
        die ("Connection failed: " . $conn->connect_error);
    }

    $date = date_create($_POST["birth"]);

    $sql = "UPDATE student SET fullname='".$_POST["fullname"]."', email='".$_POST["email"]."', Birthday='".$date->format('Y-m-d')."', major_id='".$_POST["major_id"]."'
                WHERE id='".$_POST["id"]."'";
    // $sql = $sql . "WHERE  id='".$_POST["id"]."' ";
    
    if($conn->query($sql) == TRUE) {
        header('Location: taidulieu_bang1.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>