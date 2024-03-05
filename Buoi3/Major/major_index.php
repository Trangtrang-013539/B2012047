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

    if($result->num_rows > 0) {
        $result_all = $result->fetch_all(MYSQLI_ASSOC);
        // tieu de bang
        ?>
        <h1>Du lieu bang Major</h1>
        <table border="1"><tr><th>ID</th><th>Name major</th><th colspan="2">Hanh dong</th></tr>
        <?php
        // output data of each row
        foreach($result_all as $row) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name_major"] . "</td><td>";
            ?>
            <form action="major_edit.php" method="POST">
                <input type="submit" name="action" value="Sua">
                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
            </form>
            <?php
            echo "</td><td>";
            ?>
            <form action="major_xoa.php" method="POST">
                <input type="submit" name="action" value="Xoa">
                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
            </form>
            <?php
            echo "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 ket qua tra ve";
    }

    $conn->close();
?>