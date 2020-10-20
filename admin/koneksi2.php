<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "indonesia";
    $con2 = mysqli_connect ($host, $user, $pass,$dbname);
    mysqli_select_db($con2,$dbname);
?>