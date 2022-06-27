<?php
    session_start();
	require_once('../../db/dbhelper.php');
    $msg = '';
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

        form{
            border-radius: 14px;
            padding: 10px;
            border: 2px solid #c336cc;
        }

        .btn-submit{
            width: 100px;
            background-image: linear-gradient(45deg, #e1da12, #0b8a5573);
            outline: none;
            border: none;
            padding: 5px 0;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="main">
        <nav class="main_nav">
            <div class="row">
                <div class="col-md-4">
                    <a href="../../home.php">
                        <button class="btn btn-warning" style="font-weight: bold">Quay Lại Giao Diện</button>
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
                <div class="col-md-2" style="border-right: 1px dashed #000;">
                    <ul class="main_body_list">
                    
                        <li>
                            <a href="../index.php">Trang Chủ</a>
                        </li>
                    
                        <li>
                            <a href="#">Quản Lý Người Dùng</a>
                        </li>

                        <li>
                            <a href="../places/index.php">Quản Lý Địa Điểm</a>
                        </li>

                        <li>
                            <a href="../hotels/index.php">Quản Lý Khách Sạn</a>
                        </li>

                        <li>
                            <a href="../contact/index.php">Quản Lý Liên Lạc</a>
                        </li>

                        <li>
                            <a href="../feedback/index.php">Quản Lý Phản Hồi</a>
                        </li>
                        
                        <li>
                            <a href="../ticket/ticketAdmin.php">Quản Lý Vé</a>
                        </li>

                        <li>
                            <a href="../book/index.php">Tổng Doanh Thu</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-10">
		            <a href="editor.php"><button class="btn btn-success" style="margin: 30px 0 5px">Thêm Tài Khoản</button></a>
                    <span style="width: 300px; display:inline-block; float: right; margin: 20px 50px 10px 0">
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Tìm kiếm theo tên...">
                            </div>
                            <input type="submit" name="search" value="Tìm" class="btn-submit">
                        </form>
                    </span>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width = 30px>STT</th>
                                <th>username</th>
                                <th>Họ Tên</th>
                                <th>Email</th>
                                <th>Số Điện Thoại</th>
                                <th>Quyền</th>
                                <th>Mật Khẩu</th>
                                <th>Ngày Tạo</th>
                                <th>Ngày Sửa</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            if(isset($_POST['search'])){
                                if(isset($_POST['name'])){
                                    $name = $_POST['name'];
                                }
                                $sql = "select users.*, role.name as role_name from users, role where users.role_id = role.id and users.fullname like '%$name%'";
                                $userItem = $connect->query($sql);
                                if($userItem->num_rows > 0){
                                    // $row = $userItem->fetch_assoc();
                                    $index = 0;
                                    while($row = $userItem->fetch_assoc()){
                                        // var_dump($row['username']);
                                        echo '<tr>
                                        <th>'.(++$index).'</th>
                                        <td>'.$row['username'].'</td>
                                        <td>'.$row['fullname'].'</td>
                                        <td>'.$row['email'].'</td>
                                        <td>'.$row['phone_number'].'</td>
                                        <td>'.$row['role_name'].'</td>
                                        <td>'.$row['password'].'</td>
                                        <td>'.$row['created_at'].'</td>
                                        <td>'.$row['updated_at'].'</td>
                                        <td style="width: 50px">
                                            <a href="editor.php?id='.$row['id'].'"><button class="btn btn-warning">Sửa</button></a>
                                        </td>
                                        <td style="width: 50px">';
                                        if($row['role_id'] != 1) {
                                            echo '
                                            <a href="delete.php?id='.$row['id'].'"><button class="btn btn-danger">Xóa</button></a>
                                            ';
                                            }
                                        echo '
                                            </td>
                                        </tr>';
                                        }
                                }
                                else{
                                    // echo "hehe";
                                    $msg = "Người dùng chưa tồn tại trong hệ thống";
                                }
                            }
                            else{
                                $page = 1;
                                $limit = 5;
                                if(isset($_GET['page'])){
                                    $page = $_GET['page'];
                                }
                                $start = ($page - 1) * $limit;
                                if($start < 1){
                                    $page = 1;
                                }
                                $sql = "select count(id) as count from users";

                                $count = $connect->query($sql);
                                if($count->num_rows > 0){
                                    $dem = $count->fetch_assoc();
                                    // echo $dem['count'];
                                    // exit;
                                    $tongSoRecord = $dem['count'];
                                }
                                $tongSoTrang = ceil($tongSoRecord/$limit);
                                $from = $start -2;
                                if($from < 1){
                                    $from = 1;
                                }
                                $to = $start + 2;
                                if($to > $tongSoTrang){
                                    $to = $tongSoTrang;
                                }
                            
                                $sql = "select users.*, role.name as role_name from users, role where users.role_id = role.id limit $start,$limit";
                                $userList = $connect->query($sql);
                                if($userList->num_rows > 0){
                                    $index = 0;
                                    while($row = $userList->fetch_assoc()){
                                        // var_dump($row['username']);
                                        // $date = '2019-11-29';
                                        // // var_dump($date);
                                        // // $hi = "29/11/2021";
                                        // $arr = explode('-', $date);
                                        // $count = count($arr);
                                        // $day = $arr[$count-1];
                                        
                                        // var_dump($day);
                                        // exit;
                                        echo '<tr>
                                        <th>'.(++$start).'</th>
                                        <td>'.$row['username'].'</td>
                                        <td>'.$row['fullname'].'</td>
                                        <td>'.$row['email'].'</td>
                                        <td>'.$row['phone_number'].'</td>
                                        <td>'.$row['role_name'].'</td>
                                        <td>'.$row['password'].'</td>
                                        <td>'.$row['created_at'].'</td>
                                        <td>'.$row['updated_at'].'</td>
                                        <td style="width: 50px">
                                            <a href="editor.php?id='.$row['id'].'"><button class="btn btn-warning">Sửa</button></a>
                                        </td>
                                        <td style="width: 50px">';
                                        if($row['role_id'] != 1) {
                                            echo '
                                            <a href="delete.php?id='.$row['id'].'"><button class="btn btn-danger">Xóa</button></a>
                                            ';
                                            }
                                        echo '
                                            </td>
                                        </tr>';
                                        }
                                    }
                                    echo '
                                        <ul class="pagination" style="margin-top: 15px">
                                            <li class="page-item"><a class="page-link" href="index.php?page=1"><<</a></li>

                                        ';
                                        if($page > 1){
                                            echo '
                                                <li class="page-item"><a class="page-link" href="index.php?page='.($page - 1).'"><</a></li>
                                            ';
                                        }
                                    
                                        for($i=$from; $i<=$to; $i++){
                                            if($page == $i){
                                                echo '
                                                <li class="page-item active"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>
                                            ';
                                            }
                                            else{
                                                echo '
                                                    <li class="page-item"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>
                                                ';
                                            }
                                        }
                                        if($page < $tongSoTrang){
                                            echo '
                                            <li class="page-item"><a class="page-link" href="index.php?page='.($page + 1).'">></a></li>
                                            
                                            ';
                                        }
                                        echo '
                                            <li class="page-item"><a class="page-link" href="index.php?page='.$tongSoTrang.'">>></a></li>
                                        </ul>
                                        ';
                            }
                            ?>
                        <h5 style="text-align:center; color:red"><?php echo $msg ?></h5>
                        </tbody>
                    </table>
                    <?php
                        
$connect->close();
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
