<?php
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["upload_filecsv"]["name"]);
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $uploadOk = 1;
    
    // Check if file already exists
    if(file_exists($target_file)) {
        echo "Sorry, file is already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if($_FILES["upload_filecsv"]["size"] > 500000) {
        echo "Sorry, file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($fileType != "csv") {
        echo "Sorry, only CSV file is allowed.";
        $uploadOk = 0;
    }

    // Check if uploadOk is set to 0 by an error
    if($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if(move_uploaded_file($_FILES["upload_filecsv"]["tmp_name"], $target_file)) {
            echo "The file " .htmlspecialchars(basename($_FILES["upload_filecsv"]["name"])). " has been uploaded.<br>";

            $csv = array();
            $name_file = $target_file;
            // file(): doc tap tin luu vao 1 mang
            $lines = file($name_file, FILE_IGNORE_NEW_LINES); // bo qua dong moi o cuoi moi ptu mang

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "qlbanhang";    
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if($conn->connect_error) {
                die("Connection failed: " .$conn->connect_error);
            }
            
            // dua du lieu tu file csv vao mang
            foreach($lines as $key => $value) {
                $csv[$key] = str_getcsv($value);
            } 
            for($i = 0; $i < count($csv); $i++) {               
                // dua du lieu tu mang vao csdl
                // $date = date_create($csv[$i][3]); date->format('Y-m-d')
                $sql = "INSERT INTO customers(id, fullname, email, birthday, password, img_profile)
                            VALUES('".$csv[$i][0]."', '".$csv[$i][1]."', '".$csv[$i][2]."', '".$csv[$i][3]."', '".md5($csv[$i][4])."', '".$csv[$i][5]."')";            
                if($conn->query($sql) == TRUE) {
                    echo "Cap nhat csdl thanh cong!<br>";
                }
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
?>