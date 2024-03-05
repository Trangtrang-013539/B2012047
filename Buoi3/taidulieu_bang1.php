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

    $sql = "SELECT * 
            FROM student a, major b 
            WHERE a.major_id=b.id";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        // trinh bay voi bang html
        // load du lieu moi len dua vao bien result
        $result = $conn->query($sql);
        $result_all = $result->fetch_all();
        // $result_all = $result->fetch_all(MYSQLI_ASSOC); // nap tat ca ket qua duoi dang mang "ket hop" (MYSQLI_ASSOC)
        print_r($result_all);
        // trinh bay du lieu trong 1 bang html
        //tieu de bang

        ?>
        <h1>Bang du lieu sinh vien</h1>
        <table border="1"><tr><th>ID</th><th>Ho ten</th><th>Email</th><th>Ngay sinh</th><th>Ma chuyen nganh</th><th>Ten chuyen nganh</th><th colspan="2">Hanh dong</th></tr>
        <?php
        // output data of each row
        foreach($result_all as $row) {
            $date = date_create($row[3]);
            echo "<tr><td>". $row[0] ."</td><td>". $row[1] ."</td><td>". $row[2]."</td><td>". $date->format('d-m-Y') ."</td><td>" . $row[6]."</td><td>" . $row[7]."</td><td>";
            ?>
            <form action="xoa.php" method="POST">
                <input type="submit" name="action" value="xoa">
                <input type="hidden" name="id" value="<?php echo $row[0]; ?>">
            </form>
            <?php
            echo "</td><td>";
            ?>
            <form action="form_sua.php" method="POST">
                <input type="submit" name="action" value="sua">
                <input type="hidden" name="id" value="<?php echo $row[0]; ?>">
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