<?php
    session_start();
    if(isset($_SESSION['user'])){
        $user_id = $_SESSION['user']['id'];
        // echo $user_id;
        // exit;
    }
	require_once('../../db/dbhelper.php');
    if(isset($_GET['id_thanhToan'])){
        $id_thanhToan = $_GET['id_thanhToan'];
        // echo $id_thanhToan;
        $updateBook = "update book set status = 1, sum = 0 where id = $id_thanhToan";
        $updateHistory = "update historyticket set status = 1 where id = $id_thanhToan";

        if($connect->query($updateBook) == true && $connect->query($updateHistory) == true){
            header('Location: ticketUser.php');
            die();
        }
        else{
            $connect->error;
        }
    }
    else{
        $updateBook = "update book set status = 1, sum = 0 where user_id = $user_id";
        $updateHistory = "update historyticket set status = 1 where user_id = $user_id";
        
        if($connect->query($updateBook) == true && $connect->query($updateHistory) == true){
            header('Location: ticketUser.php');
            die();
        }
        else{
            $connect->error;
        }
    }
    $connect->close();