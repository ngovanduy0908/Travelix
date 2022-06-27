<?php
	require_once('../../db/dbhelper.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "update feedback set status = 1 where id = $id";
        if($connect->query($sql) == true){
            header('Location: index.php');
        }
        else{
            echo $connect->error;
        }
    }
    else{
        $sql = "update feedback set status = 1";
        if($connect->query($sql) == true){
            header('Location: index.php');
        }
        else{
            echo $connect->error;
        }
    }
    $connect->close();
?>