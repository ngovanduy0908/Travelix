<?php
    require_once('config.php');
    // $connect = new mysqli()
    $connect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    if($connect->connect_error){
        var_dump($connect->connect_error);
        die();
    }
    // echo "Phê";