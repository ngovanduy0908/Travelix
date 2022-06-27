<?php
    session_start();
	require_once('../../db/dbhelper.php');
    $user_id = $_SESSION['user']['id'];
    $name = $_SESSION['user']['fullname'];
    // echo $user_id;
    // exit;
    $msg = '';
    $totel = 0;

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
                <div class="col-md-2">
                    <a href="../../home.php">
                        <button class="btn btn-warning" style="font-weight: bold">Quay Lại Giao Diện</button>
                    </a>
                </div>
                <div class="col-md-8">
                    <h1 style="text-align: center">Manager Ticket (<?php echo $name?>)</h1>
                </div>
                <div class="col-md-2">
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
                    <?php
                        // if($_SESSION['user']['role_id'] == 1){
                        // echo '
                        // <li>
                        //     <a href="../index.php">Trang Chủ</a>
                        // </li>
                    
                        // <li>
                        //     <a href="../user/index.php">Quản Lý Người Dùng</a>
                        // </li>

                        // <li>
                        //     <a href="../places/index.php">Quản Lý Địa Điểm</a>
                        // </li>

                        // <li>
                        //     <a href="../hotels/index.php">Quản Lý Khách Sạn</a>
                        // </li>


                        //         ';
                        //     }
                        ?>
                        <li>
                            <a href="#">Địa điểm đã đặt</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-10">
		            <!-- <a href="add.php"><button class="btn btn-success" style="margin: 20px 0">Thêm Khách Sạn</button></a> -->
                    <span style="width: 300px; display:inline-block; float: right; margin: 20px 50px 10px 0">
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="title" placeholder="Tìm kiếm theo địa điểm...">
                            </div>
                            <input type="submit" name="search" value="Tìm">
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
                                <th>Xem Chi Tiết</th>
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
                                    $sql = "SELECT book.*, places.title as place_title, places.thumbnail as place_thumbnail from places, book where places.id = book.place_id and places.title like '%$title%' and book.user_id = $user_id";
                                    $bookItem = $connect->query($sql);
                                    if($bookItem->num_rows > 0){
                                        $index = 0;
                                        while($row = $bookItem->fetch_assoc()){
                                            // var_dump($row['hotel_id']);
                                            $hotel_id = $row['hotel_id'];
                                            $status = $row['status'];
                                            // var_dump($hotel_id);
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
                                                // var_dump($row['price']);
                                                // exit;
                                                echo '
                                                
                                                <td>Có đặt KS giá: '.number_format($priceHotel).' VND</td>
                                                ';
                                            }
                                            if($hotel_id == null){
                                                echo '
                                                
                                                <td>Không đặt khách sạn</td>
                                                ';
                                            }
                                            if($status == 0){
                                                echo '
                                                    <button class="btn btn-success>Thanh Toán</button>                                              
                                                ';
                                            }
                                            // <td></td>
                                           
                                            echo '
                                            <td>'.number_format($row['sum']).' VNĐ</td> 
                                            <td style="width: 50px">
                                                <a href="delete.php?id='.$row['id'].'"><button class="btn btn-danger">Xóa</button></a>
                                            </td>
                                        </tr>';
                                        }
                                        }
                                        else{
                                            $msg = "Bạn chưa mua vé nào đến ". $title;
                                        }
                                    }
                                
                                else{
                                    $sql = "SELECT book.*, places.title as place_title, places.thumbnail as place_thumbnail, places.id as place_id from places, book where places.id = book.place_id and book.user_id = $user_id order by book.status asc";
                                    $ticket = $connect->query($sql); 
                                    if($ticket->num_rows > 0){
                                        $index = 0;
                                        while($row = $ticket->fetch_assoc()){
                                            $sum = $row['sum'];
                                            $sum = (int)$sum;
                                            // var_dump($sum);
                                            // exit;
                                            $totel += $sum;
                                            // var_dump($totel);
                                            // exit;
                                            // var_dump($row['id']);
                                            // exit;
                                            $hotel_id = $row['hotel_id'];
                                            $places_id = $row['place_id'];
                                            $status = $row['status'];
                                            // echo $status;
                                            // exit;
                                            // var_dump($hotel_id);
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
                                                // var_dump($row['price']);
                                                // exit;
                                                echo '                                                
                                                <td>Có đặt KS giá: '.number_format($priceHotel).' VND</td>
                                                ';
                                            }
                                            if($hotel_id == null){
                                                echo '
                                                
                                                <td>Không đặt khách sạn</td>
                                                ';
                                            }
                                            // <td></td>
                                            echo '
                                            <td>'.number_format($row['sum']).' VNĐ</td>
                                            <td>
                                                <a href="detail.php?hotel_id='.$hotel_id.'&place_id='.$places_id.'">Chi tiết địa điểm</a>
                                            
                                            </td>';
                                            if($status == 0){
                                                echo '
                                                <td>

                                                    <a href="thanhToan.php?id_thanhToan='.$row['id'].'"><button class="btn btn-success">Thanh Toán</button></a>

                                                </td>                                              
                                                ';
                                            }
                                            if($status != 0){
                                                echo '
                                                <td>

                                                    <button class="btn btn-warning">Đã Thanh Toán</button>

                                                </td>                                              
                                                ';
                                            }
                                            echo '
                                            <td style="width: 50px">
                                                <a href="deleteUser.php?id='.$row['id'].'"><button class="btn btn-danger">Xóa</button></a>
                                            </td>
                                        </tr>';
                                        }
                                        // exit;
                                    }
                                    else{
                                        $msg = "Bạn chưa có vé nào. Hãy mua ngay để tận hưởng niềm vui cuộc sống";
                                    }
                                    // while($row = $hotel_id->fetch_assoc()){
                                    //     var_dump($row);
                                    //     exit;
                                    // }
                                    // if($hotel_id->num_rows > 0){
                                    //     while($row = $hotel_id->fetch_assoc()){
                                    //             // var_dump($row);
                                    //             // exit;
                                    //             if($row['hotel_id'] > 0){

                                    //             }
                                    //             if($row['hotel_id'] === 'NULL'){
                                    //                 $sql = "select book.id as book_id, places.thumbnail as place_thumbnail, places.title as place_title, book.sum as sum from places.id = book.place_id";
                                    //                 $result = $connect->query($sql);
                                    //                 while($row = $result->fetch_assoc()){

                                                        // echo '<tr>
                                                        //         <th>'.(++$index).'</th>
                                                        //         <td>'.$row['place_title'].'</td>
                                                        //         <td>                                       
                                                        //             <img src="'.$row['place_thumbnail'].'" alt="" style="width: 120px; height: 100px">                                          
                                                        //         </td>
                                                        //         <td></td>
                                                        //         <td></td>
                                                               
    
                                                        //         <td>'.number_format($row['sum']).' VNĐ</td>
                                                                
                                                              
                                                            
                                                        //         <td style="width: 50px">
                                                        //             <a href="editor.php?id='.$row['id'].'"><button class="btn btn-warning">Sửa</button></a>
                                                        //         </td>
                                                        //         <td style="width: 50px">
                                                        //             <a href="delete.php?id='.$row['id'].'"><button class="btn btn-danger">Xóa</button></a>
                                                        //         </td>
                                                        //     </tr>';
                                    //                 }
                                    //             }
                                    //         }
                                    // }
                                
                                        // $sql = "select book.id, places.title as place_title, places.thumbnail as place_thumbnail, book.sum as sum from book, places where book.place_id = places.id and places.price = book.sum";
                                        // $ticket = $connect->query($sql);
                                        // if($ticket->num_rows > 0){
                                        //     $index = 0;
                                        //     while($row = $ticket->fetch_assoc()){
                                        //         echo '<tr>
                                        //                     <th>'.(++$index).'</th>
                                        //                     <td>'.$row['place_title'].'</td>
                                        //                     <td>                                       
                                        //                         <img src="'.$row['place_thumbnail'].'" alt="" style="width: 120px; height: 100px">                                          
                                        //                     </td>
                                        //                     <td></td>
                                        //                     <td></td>
                                                           

                                        //                     <td>'.number_format($row['sum']).' VNĐ</td>
                                                            
                                                          
                                                        
                                        //                     <td style="width: 50px">
                                        //                         <a href="editor.php?id='.$row['id'].'"><button class="btn btn-warning">Sửa</button></a>
                                        //                     </td>
                                        //                     <td style="width: 50px">
                                        //                         <a href="delete.php?id='.$row['id'].'"><button class="btn btn-danger">Xóa</button></a>
                                        //                     </td>
                                        //                 </tr>';
                                        //     }
                                        // }
                                       
                                }
                                
                                $connect->close();
                            ?>
                        </tbody>
                        <tr>
                            <th>Tổng tiền</th>
                            <th><?php echo number_format($totel)?> VNĐ</th>
                            <?php
                            if($totel == 0){
                                echo '
                                <th><button class="btn btn-warning">Đã Thanh Toán Hết</button></th>
                                ';
                            }
                            else{
                                echo '
                                <th><a href="thanhToan.php"><button class="btn btn-success">Thanh Toán</button></a></th>
                                ';
                            }
                            ?>
                            
                        </tr>
                    </table>
                    <h5 style="text-align:center; color:red"><?php echo $msg ?></h5>
                    <a href="deleteUser.php"><button class="btn btn-danger">Xóa Hết Cá Vé Đã Thanh Toán</button></a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
