<?php
    session_start();
	require_once('../../db/dbhelper.php');
    // $user_id = $_SESSION['user']['id'];
    // echo $user_id;
    // exit;
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
                    <h1 style="text-align: center">Manager Ticket</h1>
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
                            <a href="#">Quản Lý Vé</a>
                        </li>
                        <li>
                            <a href="../book/index.php">Tổng Doanh Thu</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-10">
		            <!-- <a href="add.php"><button class="btn btn-success" style="margin: 20px 0">Thêm Khách Sạn</button></a> -->
                    <span style="width: 600px; display:inline-block; float: right; margin: 20px 50px 10px 0">
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="title" placeholder="Tìm kiếm theo địa điểm...">
                            </div>
                            <div class="form-group">
                                <label for="choseYes">Lọc người dùng đã thanh toán</label>
                                <input type="radio" name="checkStatus" id="choseYes" value="yes">
                            </div>
                            <div class="form-group">
                                <label for="choseNo">Lọc người dùng đã chưa thanh toán</label>
                                <input type="radio" name="checkStatus" id="choseNo" value="no">
                            </div>
                            <input type="submit" name="search" value="Tìm" class="btn-submit">
                        </form>
                    </span>
                 
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width = 30px>STT</th>
                                <th>Địa Điểm</th>
                                <th>Ảnh Địa Điểm</th>
                                <th>Khách Sạn</th>
                                <th>Giá</th>
                                <th>Người đặt</th>
                                <th>Trạng thái</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $msg = '';
                                if(isset($_POST['search'])){
                                    if(isset($_POST['title'])){
                                        $page = $from = $to = $tongSoTrang = '';

                                        $title = $_POST['title'];
                                        $sql = "SELECT book.*, places.title as place_title, users.fullname as userFullName, places.thumbnail as place_thumbnail from places, book, users where places.id = book.place_id and users.id = book.user_id and places.title like '%$title%'";
                                    }
                                    if(isset($_POST['checkStatus']) && $_POST['checkStatus'] == 'yes'){ 
                                        $sql = "SELECT book.*, places.title as place_title, users.fullname as userFullName, places.thumbnail as place_thumbnail from places, book, users where places.id = book.place_id and users.id = book.user_id and book.status = 1";
                                    }
                                    if(isset($_POST['checkStatus']) && $_POST['checkStatus'] == 'no'){ 
                                        $sql = "SELECT book.*, places.title as place_title, users.fullname as userFullName, places.thumbnail as place_thumbnail from places, book, users where places.id = book.place_id and users.id = book.user_id and book.status = 0";
                                    }
                                    if(isset($_POST['title']) && isset($_POST['checkStatus']) && $_POST['checkStatus'] == 'yes'){
                                        $title = $_POST['title'];
                                        $sql = "SELECT book.*, places.title as place_title, users.fullname as userFullName, places.thumbnail as place_thumbnail from places, book, users where places.id = book.place_id and users.id = book.user_id and book.status = 1 and places.title like '%$title%'";
                                    }
                                    if(isset($_POST['title']) && isset($_POST['checkStatus']) && $_POST['checkStatus'] == 'no'){
                                        $title = $_POST['title'];
                                        $sql = "SELECT book.*, places.title as place_title, users.fullname as userFullName, places.thumbnail as place_thumbnail from places, book, users where places.id = book.place_id and users.id = book.user_id and book.status = 0 and places.title like '%$title%'";
                                    }
                                    $bookItem = $connect->query($sql);
                                    if($bookItem->num_rows > 0){
                                        $index = 0;
                                        while($row = $bookItem->fetch_assoc()){
                                            
                                            $hotel_id = $row['hotel_id'];
                                            
                                            
                                            echo '<tr>
                                            <th>'.(++$index).'</th>
                                            <td>'.$row['place_title'].'</td>
                                            <td>                                       
                                                <img src="'.$row['place_thumbnail'].'" alt="" style="width: 120px; height: 100px">                                          
                                            </td>'
                                            ;
                                            if($hotel_id != null){
                                                $sql = "select price from hotel where id = $hotel_id";
                                                $hotelItem = $connect->query($sql);
                                                $item = $hotelItem->fetch_assoc();
                                                $priceHotel = $item['price'];
                                               
                                                echo '
                                                
                                                <td>Có đặt KS giá: '.number_format($priceHotel).' VND</td>
                                                ';
                                            }
                                            if($hotel_id == null){
                                                echo '
                                                
                                                <td>Không</td>
                                                ';
                                            }
                                            
                                           
                                            echo '
                                            <td>'.number_format($row['sum']).' VNĐ</td>
                                            <td>'.$row['userFullName'].'</td>';
                                            if($row['status'] == 0){
                                                echo '
                                                <td style="color: red">Chưa thanh toán</td>
                                                ';
                                            }
                                            else{
                                                echo '
                                                <td style="color: green">Đã thanh toán</td>
                                                ';
                                            }
                                          
                                        
                                            echo '
                                            <td style="width: 50px">
                                                <a href="deleteAdmin.php?id='.$row['id'].'"><button class="btn btn-danger">Xóa</button></a>
                                            </td>
                                        </tr>';
                                        }
                                        }
                                        else{
                                            $msg = "Không có kết quả trả về";
                                        }
                                    }
                                
                                else{
                                    $page = 1;
                                    $limit = 4;
                                    if(isset($_GET['page'])){
                                        $page = $_GET['page'];
                                    }
                                    $start = ($page - 1) * $limit;
                                    if($start < 1){
                                        $page = 1;
                                    }
                                    $sql = "select count(id) as count from book";

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
                                    $sql = "SELECT book.*, users.fullname as userFullName, places.title as place_title, places.thumbnail as place_thumbnail from places, book, users where places.id = book.place_id and book.user_id = users.id ORDER BY book.sum ASC limit $start,$limit ";
                                    $ticket = $connect->query($sql); 
                                    if($ticket->num_rows > 0){
                                        $index = 0;
                                        while($row = $ticket->fetch_assoc()){
                                            // var_dump($row['id']);
                                            // exit;
                                            $hotel_id = $row['hotel_id'];
                                            // var_dump($hotel_id);
                                            echo '<tr>
                                            <th>'.(++$start).'</th>
                                            <td>'.$row['place_title'].'</td>
                                            <td>                                       
                                                <img src="'.$row['place_thumbnail'].'" alt="" style="width: 120px; height: 100px">                                          
                                            </td>'
                                            ;
                                            if($hotel_id != null){
                                                $sql = "select price from hotel where id = $hotel_id";
                                                $hotelItem = $connect->query($sql);
                                                $item = $hotelItem->fetch_assoc();
                                                $priceHotel = $item['price'];
                                                // var_dump($row['price']);
                                                // exit;
                                                echo '
                                                <td>Có đặt KS giá: '.number_format($priceHotel).' VND</td>
                                                ';
                                            }
                                            if($hotel_id == null){
                                                echo '
                                                
                                                <td>Không</td>
                                                ';
                                            }
                                            // <td></td>
                                           
                                            echo '
                                            
                                            <td>'.number_format($row['sum']).' VNĐ</td>
                                            <td>'.$row['userFullName'].'</td>';
                                            if($row['status'] == 0){
                                                echo '
                                                <td style="color: red">Chưa thanh toán</td>
                                                ';
                                            }
                                            else{
                                                echo '
                                                <td style="color: green">Đã thanh toán</td>
                                                ';
                                            }
                                            echo '                                          
                                            <td style="width: 50px">
                                                <a href="deleteAdmin.php?id='.$row['id'].'"><button class="btn btn-danger">Xóa</button></a>
                                            </td>
                                        </tr>';
                                        }
                                       
                                    }
                                    
                                    echo '
                                    <ul class="pagination" style="margin-top: 189px;">
                                    ';
                                    if($page > 1){
                                        echo '
                                            <li class="page-item"><a class="page-link" href="ticketAdmin.php?page='.($page - 1).'">Previous</a></li>
                                        ';
                                    }
            
                                    for($i=$from; $i<=$to; $i++){
                                        if($page == $i){
                                            echo '
                                            <li class="page-item active"><a class="page-link" href="ticketAdmin.php?page='.$i.'">'.$i.'</a></li>
                                        ';
                                        }
                                        else{
                                            echo '
                                                <li class="page-item"><a class="page-link" href="ticketAdmin.php?page='.$i.'">'.$i.'</a></li>
                                            ';
                                        }
                                    }
                                    if($page < $tongSoTrang){
                                        echo '
                                        <li class="page-item"><a class="page-link" href="ticketAdmin.php?page='.($page + 1).'">Next</a></li>
                                        
                                        ';
                                    }
                                    echo '
                                    </ul>
                                    ';   
                                }
                            ?>
                        </tbody>
                    </table>
                    <h3 style="text-align:center; color: red;"><?php echo $msg ?></h3>
                   <?php

                        // echo '
                        // <ul class="pagination">
                        // ';
                        // if($page > 1){
                        //     echo '
                        //         <li class="page-item"><a class="page-link" href="ticketAdmin.php?page='.($page - 1).'">Previous</a></li>
                        //     ';
                        // }

                        // for($i=$from; $i<=$to; $i++){
                        //     if($page == $i){
                        //         echo '
                        //         <li class="page-item active"><a class="page-link" href="ticketAdmin.php?page='.$i.'">'.$i.'</a></li>
                        //     ';
                        //     }
                        //     else{
                        //         echo '
                        //             <li class="page-item"><a class="page-link" href="ticketAdmin.php?page='.$i.'">'.$i.'</a></li>
                        //         ';
                        //     }
                        // }
                        // if($page < $tongSoTrang){
                        //     echo '
                        //     <li class="page-item"><a class="page-link" href="ticketAdmin.php?page='.($page + 1).'">Next</a></li>
                            
                        //     ';
                        // }
                        // echo '
                        // </ul>
                        // ';       
                        $connect->close();
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
