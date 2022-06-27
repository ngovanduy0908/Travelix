<?php
	require_once('../../db/dbhelper.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "delete from users where id = $id";
        if($connect->query($sql) == true){
            header('Location: index.php');
        }
        else{
            echo "Người dùng hiện đang tương tác với website.<br>";
            var_dump($connect->error);
        }
        $connect->close();
    }