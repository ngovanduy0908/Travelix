<?php
    if(isset($_POST['username'])){
        $username = $_POST['username'];
        if(isset($_POST['fullname'])){
            $fullname = $_POST['fullname'];
        }
        if(isset($_POST['id'])){
            $id = $_POST['id'];
        }
        if(isset($_POST['phone_number'])){
            $phone_number = $_POST['phone_number'];
        }

        if(isset($_POST['role_id'])){
            $role_id = $_POST['role_id'];
        }
        if(isset($_POST['email'])){
            $email = $_POST['email'];
        }

        if(isset($_POST['password'])){
            $password = $_POST['password'];
        }

        $created_at = $updated_at = date('Y-m-d H:i:s');
        if($id > 0){
            $sql = "select * from users username = '$username' and id <> $id";
            // $uses = $connect->query($sql);
            // print_r($connect->query($sql));
            // exit;
            // $row = $user->fetch_assoc();
            // if($user == true){
                // echo "Tài khoản đã tồn tại";
                // var_dump($connect->error);
                // $msg = "Tài khoản này đã tồn tại. Vui lòng tạo tài khoản khác alo alo";
                // $msg = $connect->error;
            // }
            // if($connect->query($sql) !== true){
            //     if(strpos($connect->error, "Duplicate entry") === true){
            //         $msg = "Tài khoản này đã tồn tại. Vui lòng đăng kí bằng tài khoản khác";
            //     }
            // }
            // else{
                // update
                if($password != ''){
                    $sql = "update users set fullname = '$fullname', username = '$username', phone_number = '$phone_number', role_id = '$role_id', email = '$email', updated_at = '$updated_at', password = '$password' where id = $id";
                }
                else{
                    $sql = "update users set fullname = '$fullname', username = '$username', phone_number = '$phone_number', role_id = '$role_id', email = '$email', updated_at = '$updated_at' where id = $id";
                }
                if($connect->query($sql) == true){
                    header('Location: index.php');
                }
                else{
                    echo $connect->error;
                }
            // }
        }
        else{
            $sql = "select * from users where username = '$username'";
            $result = $connect->query($sql);
            if($result->num_rows > 0){
                $msg = "Tài khoản này đã tồn tại. Vui lòng tạo tài khoản khác";
            }
            else{
                $sql = "insert into users (username, fullname, email, password, phone_number, created_at, updated_at, role_id) values 
                ('$username', '$fullname', '$email', '$password', '$phone_number', '$created_at', '$updated_at', $role_id)";
                if($connect->query($sql)){
                    header('Location: index.php');
                    die();
                }
                else{
                    echo $connect->error;
                }
            }
        }

    }