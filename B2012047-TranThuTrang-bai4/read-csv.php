<?php
    $csv = array();
    $name_file = "cus.csv";
    // file(): doc tap tin luu vao 1 mang
    $lines = file($name_file, FILE_IGNORE_NEW_LINES); // bo qua dong moi o cuoi moi ptu mang

    // dua du lieu tu file csv vao mang
    foreach($lines as $key => $value) {
        $csv[$key] = str_getcsv($value);
    }

    // in mang
    echo "<pre>";
    print_r($csv);
    echo "</pre>";
?>