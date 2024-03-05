<!DOCTYPE html>
<html>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "qlsv";
    
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if($conn->connect_error) {
            die ("Connection failed: ". $conn->connect_error);
        }

        $sql = "SELECT * FROM student WHERE id='".$_POST["id"]."'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    
        $sql2 = "SELECT * FROM major";
        $result2 = $conn->query($sql2);
    ?>

<body>
    <?php print_r($row); ?>

    <form action="sua.php" method="POST">
        ID: <input type="text" name="id" value="<?php echo $row["id"] ?>"><br>
        Name:<input type="text" name="fullname" value="<?php echo $row["fullname"] ?>"><br>
        Email: <input type="text" name="email" value="<?php echo $row["email"] ?>"><br>
        Birthday: <input type="date" name="birth" value="<?php echo $row["Birthday"] ?>"><br>
        ID major: <input list="major_id_list" name="major_id" value="<?php echo $row["major_id"] ?>">
        <datalist id="major_id_list">
            <?php
            if($result2->num_rows > 0) {
                $result_all = $result2->fetch_all(MYSQLI_ASSOC);
                foreach($result_all as $row2) {
                    echo "<option>" . $row2["id"] . "</option>";
                }
            }
            ?>
        </datalist>
        <br><input type="submit">
    </form>

</body>
</html>