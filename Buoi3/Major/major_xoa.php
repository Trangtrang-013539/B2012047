<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qlsv";

    $conn = new mysqli($servername, $username, $password, $dbname);;

    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM major WHERE id='".$_POST["id"]."'";
    if($conn->query($sql)) {
        header('Location: major_index.php');
    } else {
        echo "Error: " .$sql . "<br>" . $conn->error;
    }
    
    $conn->close();
?>