<?php
	require_once('../../db/dbhelper.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "delete from places where id = $id";
        if($connect->query($sql) == true){
            header('Location: index.php');
        }
        else{
            echo "Đã có người đặt vé địa điểm này. Hiện tại chưa thể xóa <br>";
            var_dump($connect->error);
        }
        $connect->close();
    }