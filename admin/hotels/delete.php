<?php
	require_once('../../db/dbhelper.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "delete from hotel where id = $id";
        if($connect->query($sql) == true){
            header('Location: index.php');
        }
        else{
            echo "Đã có người đặt vé khách sạn. Hiện tại chưa thể xóa <br>";
            var_dump($connect->error);
        }
        $connect->close();
    }