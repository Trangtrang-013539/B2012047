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

    $sql = "SELECT * FROM major";
    $result = $conn->query($sql);
    
?>
<body>
    
<form action="luu.php" method="POST">
    Name: <input type="text" name="name"><br>
    E-mail: <input type="text" name="email"><br>
    Birthday: <input type="date" name="birth"><br>
    ID major: <input list="major_id_list" name="major_id">
    <datalist id="major_id_list">
        <?php 
        if($result->num_rows > 0) {  
            $result_all = $result->fetch_all(MYSQLI_ASSOC);
            foreach($result_all as $row) {    
                echo "<option>" . $row["id"] . "</option>";
            }
        }
        ?>
    </datalist>
    <br><input type="submit">
</form>

</body>
</html>