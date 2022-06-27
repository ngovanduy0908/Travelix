<?php
    session_start();
	require_once('../../db/dbhelper.php');
    $id = $fullname = $msg = $email = $username = $password = $created_at = $updated_at = $role_id = $phone_number = '';
    require_once('form_save.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "select * from users where id = $id";
        $userItem = $connect->query($sql);
        if($userItem->num_rows > 0){
            // var_dump($userItem);
            $row = $userItem->fetch_assoc();
            // var_dump($row);
            $fullname = $row['fullname'];
            $username = $row['username'];
            $email = $row['email'];
            $phone_number = $row['phone_number'];
            $role_id = $row['role_id'];
            // $password = $row['password'];

        }
    }
    $sql = "select * from role";
    $role = $connect->query($sql);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MANAGER</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        *{
            box-sizing: border-box;
        }
        body{
            margin: 0px;
            padding: 0px;
        }
        .main{
            
        }
        .main_nav{
            padding: 10px 20px;
            border-bottom: 2px solid #ccc;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 10;
            height: 90px;
            background: #ccc;
        }
        .main_body{
            margin-top: 90px;
        }
        .main_body_list{
            padding: 10px 0 0 38px;
            list-style: none;
            min-height: 600px;
        }
        .main_body_list li{
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="main">
        <nav class="main_nav">
            <div class="row">
                <div class="col-md-4">
                    <a href="../../home.php">
                        <button class="btn btn-warning">Quay Lại Giao Diện</button>
                    </a>
                </div>
                <div class="col-md-4">
                    <h1 style="text-align: center">Manager Users</h1>
                </div>
                <div class="col-md-4">
                    <a href="../../loginRes/logout.php" style="float: right">
                        <button class="btn btn-danger">Đăng Xuất</button>
                    </a>
                </div>
            </div>
        </nav>
        <div class="main_body">
            <div class="row">
                <div class="col-md-2" style="border-right: 1px dashed #000">
                    <ul class="main_body_list">
                    
                        <li>
                            <a href="../index.php">Trang Chủ</a>
                        </li>
                    
                        <li>
                            <a href="$">Quản Lý Người Dùng</a>
                        </li>

                        <li>
                            <a href="../places/index.php">Quản Lý Địa Điểm</a>
                        </li>

                        <li>
                            <a href="../hotels/index.php">Quản Lý Khách Sạn</a>
                        </li>
                               
                        <li>
                            <a href="../ticket/ticketAdmin.php">Quản Lý Vé</a>
                        </li>

                        <li>
                            <a href="../book/index.php">Tổng Doanh Thu</a>
                        </li>
                    </ul>
                    <!-- <div class="panel-heading">
				<h5 style="color: red;" class="text-center"><?=$msg?></h5>
			</div> -->
                </div>
                <div class="col-md-10" style="padding-bottom: 15px">
		            <!-- <a href="editor.php"><button class="btn btn-success" style="margin: 20px 0">Thêm Tài Khoản</button></a> -->
                    <h4 style="text-align: center; margin: 10px 0">Thêm/Sửa Người Dùng</h4>
				    <h5 style="color: red;" class="text-center"><?php echo $msg?></h5>

                    <form action="" method="post" style="width: 800px; margin: 0 auto">
                        <div class="form-group">
                            <label for="username">Tên đăng nhập:</label>
                            <input required="true" type="text" class="form-control" id="username" name="username" value="<?=$username?>">
                            <input type="number" name="id" value="<?php echo $id ?>" readonly>
                        </div>
                        
                        <div class="form-group">
                            <select name="role_id" id="" class="form-control">
                                <option value="">--Chọn--</option>
                                <?php
                                    if($role->num_rows > 0){
                                        while($row = $role->fetch_assoc()){
                                            if($role_id == $row['id']){
                                                echo '
                                                <option selected value="'.$row['id'].'">'.$row['name'].'</option>                                           
                                                ';
                                            }
                                            else{
                                                echo '
                                                <option value="'.$row['id'].'">'.$row['name'].'</option>                                           
                                                ';

                                            }
                                        }
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="usr">Họ & Tên:</label>
                            <input required="true" type="text" class="form-control" id="usr" name="fullname" value="<?=$fullname?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input required="true" type="email" class="form-control" id="email" name="email" value="<?=$email?>">
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Số điện thoại:</label>
                            <input required="true" type="number" class="form-control" id="phone_number" name="phone_number" value="<?=$phone_number?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="pwd">Mật Khẩu:</label>
                            <input <?=($id > 0?'':'required="true"')?> type="password" class="form-control" id="pwd" name="password" minlength="6">
                        </div>
                        
                        <p>
                            <a href="index.php">Quay Lại</a>
                        </p>
                        <button class="btn btn-success">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
