<?php
    session_start();
	require_once('../../db/dbhelper.php');
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
                    <h1 style="text-align: center">Manager Places</h1>
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
                            <a href="../user/index.php">Quản Lý Người Dùng</a>
                        </li>

                        <li>
                            <a href="#">Quản Lý Địa Điểm</a>
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
		            <a href="editor.php"><button class="btn btn-success" style="margin: 20px 0">Thêm Địa Chỉ</button></a>
                    <span style="width: 300px; display:inline-block; float: right; margin: 20px 50px 10px 0">
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="title" placeholder="Tìm kiếm theo địa điểm...">
                            </div>
                            <input type="submit" name="search" value="Tìm" class="btn-submit">
                        </form>
                    </span>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width = 30px>STT</th>
                                <th>Địa Điểm</th>
                                <th>Giá</th>
                                <th>Hình Ảnh</th>
                                <th>Địa Chỉ</th>
                                <th width="30px">Điểm</th>
                                <th width="30px">Số Sao</th>
                                <th>Ngày Tạo</th>
                                <th>Ngày Sửa</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(isset($_POST['search'])){
                                    if(isset($_POST['title'])){
                                        $title = $_POST['title'];
                                    }
                                    $sql = "select * from places where title like '%$title%'";
                                    $placeItem = $connect->query($sql);
                                    if($placeItem->num_rows > 0){
                                        $row = $placeItem->fetch_assoc();
                                        echo '<tr>
                                            <th>1</th>
                                            <td>'.$row['title'].'</td>
                                            <td>'.number_format($row['price']).' VNĐ</td>
                                            <td>                                       
                                                <img src="'.$row['thumbnail'].'" alt="" style="width: 120px; height: 100px">                                          
                                            </td>
                                            <td>'.$row['address'].'</td>
                                            <td>'.$row['point'].'</td>
                                            <td>'.$row['rating'].'</td>
                                            <td>'.$row['created_at'].'</td>
                                            <td>'.$row['updated_at'].'</td>
                                            <td style="width: 50px">
                                                <a href="editor.php?id='.$row['id'].'"><button class="btn btn-warning">Sửa</button></a>
                                            </td>
                                            <td style="width: 50px">
                                                <a href="delete.php?id='.$row['id'].'"><button class="btn btn-danger">Xóa</button></a>
                                            </td>
                                            </tr>';
                                            }
                                    }
                                
                                else{
                                    $limit = 3;
                                    $page = 1;
                                    if(isset($_GET['page'])){
                                        $page = $_GET['page'];
                                    }
                                    $start = ($page - 1) * $limit;
                                    
                                    $sql = "select count(id) as count_id from places";
                                    $count = $connect->query($sql);
                                    if($count->num_rows > 0){
                                    $row = $count->fetch_assoc();
                                    $tongSoRecord = $row['count_id'];
                                    //    echo $tongSoRecord;
                                    //    exit;
                                    }
                                    $tongSoTrang = ceil($tongSoRecord / $limit);
                                    $from = $page - 2;
                                    if($from < 1){
                                        $from = 1;
                                    }
                                    $to = $page + 2;
                                    if($to > $tongSoTrang){
                                        $to = $tongSoTrang;
                                    }
                                    $sql = "select * from places order by updated_at desc limit $start,$limit";
                                    $userList = $connect->query($sql);
                                    if($userList->num_rows > 0){
                                        $index = 0;
                                        while($row = $userList->fetch_assoc()){
                                            // var_dump($row['username']);
                                            echo '<tr>
                                            <th>'.(++$start).'</th>
                                            <td>'.$row['title'].'</td>
                                            <td>'.number_format($row['price']).' VNĐ</td>
                                            <td>                                       
                                                <img src="'.$row['thumbnail'].'" alt="" style="width: 120px; height: 100px">                                          
                                            </td>
                                            <td>'.$row['address'].'</td>
                                            <td>'.$row['point'].'</td>
                                            <td>'.$row['rating'].'</td>
                                            <td>'.$row['created_at'].'</td>
                                            <td>'.$row['updated_at'].'</td>
                                            <td style="width: 50px">
                                                <a href="editor.php?id='.$row['id'].'"><button class="btn btn-warning">Sửa</button></a>
                                            </td>
                                            <td style="width: 50px">
                                                <a href="delete.php?id='.$row['id'].'"><button class="btn btn-danger">Xóa</button></a>
                                            </td>
                                            </tr>';
                                            }
                                            
                                        }

                                        echo '
                                            <ul class="pagination">
                                                <li class="page-item"><a class="page-link" href="index.php?page=1"><<</a></li>

                                            ';
                                            if($page > 1){
                                                echo'
                                                    <li class="page-item"><a class="page-link" href="index.php?page='.($page-1).'"><</a></li>
                                                ';
                                            }
                                            for($i = $from; $i <= $to; $i++){
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
                                                    <li class="page-item"><a class="page-link" href="index.php?page='.($page+1).'">></a></li>';
                                                
                                            }
                                            echo'
                                                <li class="page-item"><a class="page-link" href="index.php?page='.$tongSoTrang.'">>></a></li>
                                            </ul>';
                                }
                                $connect->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
