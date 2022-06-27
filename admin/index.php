<?php
    session_start();
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

        .back-body{
            background-image: url(https://cdn.discordapp.com/attachments/882229400949628980/918410300372443166/huong-dan-vien-du-lich-can-trang-bi-nhung-kien-thuc-gi-02.png);
            background-size: contain;
            background-position: center;
            position: relative;
            background-repeat: no-repeat;
        }

        .back-body h1{
            position: absolute;
            top: 2%;
            left: 13%;
            font-size: 120px;
            transform: translateX(-50%);
            font-family: Brush Script MT;
            color: #f960ea;
        }
    </style>
</head>
<body>
    <div class="main">
        <nav class="main_nav">
            <div class="row">
                <div class="col-md-4">
                    <a href="../home.php">
                        <button class="btn btn-warning" style="font-weight: bold">Quay Lại Giao Diện</button>
                    </a>
                </div>
                <div class="col-md-4">
                    <h1 style="text-align: center">Manager Page</h1>
                </div>
                <div class="col-md-4">
                    <a href="../loginRes/logout.php" style="float: right">
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
                            <a href="#">Trang Chủ</a>
                        </li>
                    
                        <li>
                            <a href="./user/index.php">Quản Lý Người Dùng</a>
                        </li>

                        <li>
                            <a href="./places/index.php">Quản Lý Địa Điểm</a>
                        </li>

                        <li>
                            <a href="./hotels/index.php">Quản Lý Khách Sạn</a>
                        </li>

                        <li>
                            <a href="./contact/index.php">Quản Lý Liên Lạc</a>
                        </li>  
                        
                        <li>
                            <a href="./feedback/index.php">Quản Lý Phản Hồi</a>
                        </li> 
                        
                        <li>
                            <a href="./ticket/ticketAdmin.php">Quản Lý Vé</a>
                        </li>

                        <li>
                            <a href="./book/index.php">Tổng Doanh Thu</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-10 back-body">
                    <h1>3D1H</h1>
                </div>
            </div>
        </div>
    </div>
</body>
</html>