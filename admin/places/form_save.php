<?php
    if(isset($_POST['title'])){
        $title = $_POST['title'];
        if(isset($_POST['price'])){
            $price = $_POST['price'];
        }
        if(isset($_POST['rating'])){
            $rating = $_POST['rating'];
        }
        if(isset($_POST['point'])){
            $point = $_POST['point'];
        }
        if(isset($_POST['description'])){
            $description = $_POST['description'];
        }
        if(isset($_POST['address'])){
            $address = $_POST['address'];
        }
        if(isset($_POST['id'])){
            $id = $_POST['id'];
        }
        if(isset($_POST['thumbnail'])){
            $thumbnail = $_POST['thumbnail'];
            $thumbnail = str_replace('\\', '\\\\', $thumbnail);
            $thumbnail = str_replace('\'', '\\\'', $thumbnail);
        }
        $created_at = $updated_at = date('Y-m-d H:i:s');
        if($id > 0){
            $sql = "update places set title = '$title', price = $price, thumbnail = '$thumbnail', description = '$description', point = $point, rating = $rating, address = '$address', updated_at = '$updated_at' where id = $id";
            if($connect->query($sql) == true){
                header('Location: index.php');
                die();
            }
            else{
                echo $connect->error;
            }
        }
        else{
            $sql = "insert into places (title, price, thumbnail, description, point, rating, created_at, updated_at, address) 
            values('$title', $price, '$thumbnail', '$description', $point, $rating, '$created_at', '$updated_at', '$address')";
            if($connect->query($sql) == true){
                header('Location: index.php');
                die();
            }
            else{
                echo "Lỗi";
                echo $connect->error;
            }
        }
    }