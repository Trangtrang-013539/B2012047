<?php
$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qlsv";

    $conn = new mysqli($servername, $username, $password, $dbname);;

    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO major VALUES('".$_POST["id"]."', '".$_POST["name_major"]."')";

    if($conn->query($sql) == TRUE) {
        header('Location: major_index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>