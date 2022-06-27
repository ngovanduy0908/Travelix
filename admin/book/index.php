<?php
    session_start();
	require_once('../../db/dbhelper.php');
   
    $page = $from = $to = $tongSoTrang =  $msg = $month = "";
    $moneyOfMonth = 0;
   
    $sum = 0;
    $sql = "select sum(sum) as money from historyticket where status = 1";
    $totelMoney = $connect->query($sql);
    if($totelMoney->num_rows > 0){
        while($money = $totelMoney->fetch_assoc()){
            $sum += $money['money'];
        }
    }             
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
    <link href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" rel="stylesheet">
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

        .header-heading{
            text-transform: uppercase;
            margin: 20px auto;
            text-align: center;
            background-image: linear-gradient(to left, rgba(250, 158, 27,0.6), rgba(141, 79, 255,0.6));
           /* display: inline-block; */
           width: 900px;
           color: #fff;
           padding: 10px 0;
            border-radius: 20px;
            text-shadow: 0 0 3px #000;
        }

        .header-heading i{
            color: #ebb20a;
        }

        .form-money{
            margin: 5px 0 23px 0px;
            width: 400px;
            border: 2px solid #560764;
            padding: 10px 15px;
            display: inline-block;
        }
        .form-money label{
            font-weight: bold;
        }

        .form-money-search{
            float: right;
            width: 700px;

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
                    <h1 style="text-align: center">Check Money</h1>
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
                            <a href="../ticket/ticketAdmin.php">Quản Lý Vé</a>
                        </li>
                        <li>
                            <a href="#">Tổng Doanh Thu</a>
                        </li>
                    </ul>

                </div>

                <div class="col-md-10">
		            <h1 class="header-heading">
                        <i class="fas fa-donate"></i>
                        Tổng Tiền Của Doanh Nghiệp 3D1H
                        <i class="fas fa-donate"></i>
                    </h1>
                    <h2>Tổng doanh thu: <span style="color: red"> <?php echo number_format($sum) ?></span> VNĐ</h2>

                    <div>

                        <?php
                            $userName = $namePlace = "";
                            if(isset($_POST['nameUser'])){
                                $userName = $_POST['nameUser'];
                            }
                            if(isset($_POST['namePlace'])){
                                $namePlace = $_POST['namePlace'];
                            }
                        ?>

                        <form action="" method="post" class="form-money">
                            <div class="form-group">
                                <label for="">Tên Người Đặt Vé</label>
                                <input type="text" name="nameUser" class="form-control" value="<?php echo $userName ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Tên Địa Điểm</label>
                                <input type="text" name="namePlace" class="form-control" value="<?php echo $namePlace ?>">
                            </div>
                            <input type="submit" class="btn btn-success" name="search" value="Tìm">
                        </form>


                        <?php
                            if(isset($_POST['seen'])){
                                if(isset($_POST['month']) && $_POST['month'] >= 1 && $_POST['month'] <= 12){
                                    $month = $_POST['month'];
                                }
                                if(isset($_POST['year'])){
                                    $year = $_POST['year'];
                                }
                                $sql = "select sum(sum) as totalMoney from historyticket where month = '$month' and year = '$year'";
                                $money = $connect->query($sql);
                                if($money->num_rows > 0){
                                    while($moneyItem = $money->fetch_assoc()){
                                        $moneyOfMonth += $moneyItem['totalMoney'];
                                    }
                                    
                                }
                                
                            }
                        ?>

                        <form action="" method="post" class="form-money form-money-search">
                                <h3>Xem Doanh Thu Theo Tháng</h3>
                                <div class="form-group">
                                    <label for="">Nhập tháng muốn xem doanh thu (Nhập đầy đủ 2 số và trong khoảng 01-12)</label>
                                    <input type="text" name="month" class="form-control" value="<?php echo $month ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Chọn năm muốn xem doanh thu</label>
                                    <select name="year" id="">
                                        <?php
                                            $currentYear = Date('Y');
                                            for($i = $currentYear ; $i<= $currentYear + 2; $i++){
                                                echo '
                                                    <option value="'.$i.'">'.$i.'</option>                                               
                                                ';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <h3><?php echo 'Doanh Thu: ' . number_format($moneyOfMonth) ?>VNĐ</h3>

                            <input type="submit" class="btn btn-success" name="seen" value="Xem">

                        </form>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width = "40px">STT</th>
                                <th width = "220px">Người Đặt Vé</th>
                                <th  width = "220px">Địa Điểm</th>
                                <th width = "145px">Tổng Tiền</th>
                                <th width = "140px">Tháng Mua Vé</th>
                                <th width = "140px">Năm Mua Vé</th>
                                <th width = "180px">Trạng thái vé</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                
                                if(isset($_POST['search'])){
                                    if(isset($_POST['nameUser']) && isset($_POST['namePlace'])){
                                        $userName = $_POST['nameUser'];
                                        $namePlace = $_POST['namePlace'];
                                        $sql = "SELECT historyticket.*, users.fullname as userFullName, places.title as placeTitle from historyticket, users, places where historyticket.user_id = users.id and historyticket.place_id = places.id and users.fullname like '%$userName%' and places.title like '%$namePlace%'";
                                        $result = $connect->query($sql);
                                        if($result->num_rows > 0){
                                            $index = 1;
                                            while($ticketItem = $result->fetch_assoc()){
                                                if($index % 2 == 0){
                                                    echo '
                                                    <tr style="background: antiquewhite;">';
                                                }
                                                else{
                                                    echo '
                                                    <tr>';
                                                }
                                                echo '
                                                    <th>'.$index++.'</th>
                                                    <td>'.$ticketItem['userFullName'].'</td>
                                                    <td>'.$ticketItem['placeTitle'].'</td>
                                                    <td>'.number_format($ticketItem['sum']).'VNĐ</td>
                                                    <td>'.$ticketItem['month'].'</td>
                                                    <td>'.$ticketItem['year'].'</td>
                                                </tr>
                                                ';
                                            }
                                        }
                                        else{
                                            $msg = "Người này chưa mua(Thanh Toán) vé nào";
                                        }
                                    }
                                }
                                else{
                                    $limit = 3;
                                    $page = 1;
                                    if(isset($_GET['page'])){
                                        $page = $_GET['page'];
                                    }
                                    $start = ($page - 1) * $limit;
                                    
                                    $sql = "select count(id) as count_id from historyticket";
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
                                    $sql = "SELECT historyticket.*, users.fullname as userFullName, places.title as placeTitle from historyticket, users, places where historyticket.user_id = users.id and historyticket.place_id = places.id limit $start,$limit";
                                    $result = $connect->query($sql);
                                    if($result->num_rows > 0){
                                        // $index = 1;
                                        $start++;
                                        while($row = $result->fetch_assoc()){
                                            if($start % 2 == 0){
                                                echo '
                                                <tr style="background: antiquewhite;">';
                                            }
                                            else{
                                                echo '
                                                <tr>';
                                            }
                                            echo '
                                                <th>'.$start++.'</th>
                                                <td>'.$row['userFullName'].'</td>
                                                <td>'.$row['placeTitle'].'</td>
                                                <td>'.number_format($row['sum']).'VNĐ</td>
                                                <td>'.$row['month'].'</td>
                                                <td>'.$row['year'].'</td>';
                                            if($row['status'] == 0){
                                                echo '
                                                    <td><span style="color: red; font-weight: 600">Chưa thanh toán</span></td>                                          
                                                ';
                                            }
                                            else{
                                                echo '
                                                <td><span style="color: green; font-weight: 600">Đã thanh toán</span></td>                                                                                       
                                                ';
                                            }
                                            echo '
                                            </tr>
                                            ';
                                        }
                                    }
                                }
                            ?>
                        </tbody>
                    <?php
                        echo '
                        <ul class="pagination">
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
                    ?>
                    </table>          
                    <h4 style="color: orange; font-weight: bold"><?php echo $msg?> <i class="fas fa-question-circle"></i></h4>
                </div>  
            </div>
        </div>
    </div>
</body>
</html>
