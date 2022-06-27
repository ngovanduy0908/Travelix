<?php
    if(isset($_POST['username']) && isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['phone_number']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password-confirm'];
        if($_POST['thumbnail'] == ''){
            $thumbnail = 'https://ephoto360.com/uploads/effect-data/ephoto360.com/1362b22eb/t5e787cb041e95.jpg';
        }else{
            $thumbnail = $_POST['thumbnail'];
        }
        
        $created_at = $updated_at = date('Y-m-d H:i:s');
        if($password_confirm == $password){
            $sql = "insert into users (username, fullname, email, password, phone_number, thumbnail, created_at, updated_at, role_id) values 
            ('$username', '$fullname', '$email', '$password', '$phone_number', '$thumbnail', '$created_at', '$updated_at', 2)";
    
            if($connect->query($sql) !== true){
                $msg = "Tên đăng nhập này đã tồn tại. Vui lòng đăng kí bằng Tên đăng nhập khác";
                // die();
            }
            
            else{
                header('Location: login.php');
                die();
            }
        }
        else{
            $msg = "Mật khẩu không khớp. Vui lòng xem lại";
        }
        $connect->close();
    }