<?php
	require_once('../../db/dbhelper.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "delete from book where id = $id";
        if($connect->query($sql) == true){
            header('Location: ticketAdmin.php');
            die();
        }else{
            echo $connect->error;
        }
        $connect->close();
    }