<?php
	require_once('../../db/dbhelper.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "delete from contact where id = $id";
        if($connect->query($sql) == true){
            header('Location: index.php');
        }
        else{
            echo $connect->error;
        }
    }
    else{
        $sql = "delete from contact";
        if($connect->query($sql) == true){
            header('Location: index.php');
        }
        else{
            echo $connect->error;
        }
    }
    $connect->close();
?>