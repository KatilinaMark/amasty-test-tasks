<?php
    $host = 'localhost';
    $dbName = 'testbase';
    $user = 'root';
    $pass = '';

    $dbConn = mysqli_connect($host, $user, $pass, $dbName);

    if(!$dbConn){
        die("Connection failed" . mysqli_connect_error());
    }
?>