<?php
    session_start();
    if(isset($_SESSION['user'])){
        $user_id = $_SESSION['user']['id'];
        // echo $user_id;
        // exit;
    }
	require_once('../../db/dbhelper.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "delete from book where id = $id";
        if($connect->query($sql) == true){
            header('Location: ticketUser.php');
            die();
        }else{
            echo $connect->error;
        }
        // $connect->close();
    }
    else{
        $sql = "delete from book where user_id = $user_id and status = 1";
        if($connect->query($sql) == true){
            header('Location: ticketUser.php');
            die();
        }else{
            echo $connect->error;
        }
    }