<?php
    /*$host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "bisnisproperti";
    $con = mysqli_connect ($host, $user, $pass);
    mysqli_select_db($dbname,$con);*/
    #Deprecated
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "bisnisproperti";
    $con = mysqli_connect ($host, $user, $pass,$dbname);
    mysqli_select_db($con,$dbname);
?>