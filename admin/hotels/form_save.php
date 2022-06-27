<?php
    if(isset($_POST['name'])){
        $name = $_POST['name'];
        if(isset($_POST['price'])){
            $price = $_POST['price'];
        }
        if(isset($_POST['rating'])){
            $rating = $_POST['rating'];
        }
        // if(isset($_POST['place_id'])){
        //     $place_id = $_POST['place_id'];
        // }
        if(isset($_POST['place_title'])){
            $place_title = $_POST['place_title'];
        }

        if(isset($_POST['description'])){
            $description = $_POST['description'];
        }
        if(isset($_POST['id'])){
            $id = $_POST['id'];
        }
        if(isset($_POST['thumbnail'])){
            $thumbnail = $_POST['thumbnail'];
            // $thumbnail = str_replace('\\', '\\\\', $thumbnail);
            // $thumbnail = str_replace('\'', '\\\'', $thumbnail);
        }
        $updated_at = date('Y-m-d H:i:s');
        // if($id > 0){
            $sql = "update hotel set name = '$name', price = $price, thumbnail = '$thumbnail', description = '$description', rating = $rating, updated_at = '$updated_at' where hotel.id = $id";
            if($connect->query($sql) == true){
                header('Location: index.php');
                die();
            }
            else{
                echo $connect->error;
            }
    }