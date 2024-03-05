<!DOCTYPE html>
<html>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qlsv";

    $conn = new mysqli($servername, $username, $password, $dbname);;

    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM major WHERE id='".$_POST["id"]."'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>
<body>
    <form action="major_edit_save.php" method="POST">
        ID: <input type="text" name="id" value="<?php echo $row["id"]; ?>"><br>
        Name major: <input type="text" name="name_major" value="<?php echo $row["name_major"]; ?>"><br>
        <input type="submit">
    </form>
</body>
</html>
