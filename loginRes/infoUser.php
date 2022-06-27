<?php
    session_start();
	require_once('../db/dbhelper.php');
	// require_once('../utils/utility.php');
    $email = $phone_number = $msg = $id = $fullname = $password = $username = '';
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$sql = "select * from users where id = $id";
		$result = $connect->query($sql);
		if($result->num_rows > 0){
			$row = $result->fetch_assoc();
			$id = $row['id'];
			$fullname = $row['fullname'];
			$email = $row['email'];
			$phone_number = $row['phone_number'];
			$username = $row['username'];
			$password = $row['password'];
			$thumbnail = $row['thumbnail'];
			// $email = $row['email'];
			// $phone_number = $row['phone_number'];
			// echo $email;
			// exit;
		}
	}
	// require_once('form_login.php');

	// $user = getUserTokens();
	// if($user != null){
	// 	header('Location: ../');
	// 	die();
	// }
    // $path="http://".$_SERVER['HTTP_HOST']."/" ;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travelix</title>
    <link rel="stylesheet" href="../assest/css/main.css">
    <link rel="stylesheet" href="../assest/css/base.css">
    <link rel="stylesheet" href="../assest/css/grid.css">
    <link rel="stylesheet" href="../assest/css/contact.css">
    <!-- <link rel="stylesheet" href="../assest/css/info.css"> -->

    <link rel="stylesheet" href="../assest/font/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../assest/font/beyond_the_mountains.otf">
    <style>
        .header__body-edit{
    color: white;
    text-transform: uppercase;
    font-size: 25px;
    text-decoration: none;
    }

    .body{
        /* background-color: #18191a; */

    }
    .info_body{
        width: 770px;
        height: 500px;
        /* background-color: #3d3d3e; 
        */
        background-image: var(--bg-section-hover);
        margin:160px auto 20px;
        position: relative;
        border-radius: 50px;

    }

    .info_body_img{
        position: absolute;
        border-radius: 50%;
        width: 18%;
        height: 28%;
        top: 22%;
        left: 50%;
        transform: translateX(-50%);

    }

    .body_img{
        width: 100%;
        height: 105%;
        border-radius : 30%;
        border: 1px solid var( --yellow-color);
        box-shadow: 0 0 5px red;
        
    }

    .body_name{
        position: absolute;
        /* left: 205px; */
        top: 35px;
        font-size: 30px;
        color: white;
       
        font-weight: 600;
        text-shadow: 0 0 4px #000;
        left: 50%;
        transform: translateX(-50%);
    }

    .body_list{
        margin: 0;
        padding: 0;
        position: absolute;
        top: 60%;
        left: 50%;
        transform: translateX(-50%);
        list-style: none;
        color: white;
        font-size: 24px;
        font-weight: 600;
        text-shadow: 0 0 4px #000;
    }

    .body_list li{
        margin-bottom: 15px
    }

    .body_list li i{
        margin-right: 10px
    }

    .copy-right{
        margin-top: 2px;
        position: fixed;
        bottom: 0;
        width: 100%;
    }
    </style>
</head>
<body>
    <div class="main">
        </div>
        <header class="header">
            <div class="header__heading">
                <div class="grid wide">
                    <div class="row">
                        <div class="col l-6 m-6">
                            <div class="header__link">
                                <a href="tel:+84 342 517 826" class="header__link-phone">+84 342 517 826</a>
                                
                                <ul class="header__link-list">
                                    <li class="header__link-item">
                                        <a href="" class="header__link-social"><i class="fab fa-pinterest"></i></a>
                                    </li>
                                    <li class="header__link-item">
                                        <a href="" class="header__link-social"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li class="header__link-item">
                                        <a href="" class="header__link-social"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="header__link-item">
                                        <a href="" class="header__link-social"><i class="fas fa-globe"></i></a>
                                    </li>
                                    <li class="header__link-item">
                                        <a href="" class="header__link-social"><i class="fab fa-youtube"></i></a>
                                    </li>
                                    <li class="header__link-item">
                                        <a href="" class="header__link-social"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col l-6 m-6" >
                            <div class="header__login">
                                <a href="./logout.php" class="header__login-login">logout</a>
                                <?php
                                    if(isset($_SESSION['user'])){
                                        if($_SESSION['user']['role_id'] == 1){
                                            echo '
                                                <a href="./admin/" class="header__login-register">Admin</a>                                           
                                            ';
                                        }
                                        else{
                                            echo '                                          
                                            <span href="" class="user" style="">'.$_SESSION['user']['fullname'].'</span>  
                                            ';
                                        }
                                    }                     
                                ?>
                                <style>
                                    .user{
                                        color: #fff;
                                    }                                  
                                </style>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <nav class="header__nav" style="top: 36px">
                <div class="grid wide">
                    <div class="header__body">
                        <a href="../home.php" class="header__body-logo">
                            <img src="./assest/img/glogo.webp" alt="" class="logo__img">
                            <span class="logo__tittle"> <i class="fas fa-home"></i> trang chủ</span>
                        </a>

                        <div class="header__body-icon">
                            <a href="changeInfo.php?id=<?php echo $id ?>" for="open-search" class="header__body-edit">
							<i class="fas fa-user-edit"></i> Chỉnh Sửa
                            </a>
    
                            <div class="header__body-menu-icon js-header__body-menu-icon">
                                <i class="fas fa-bars"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

        </header>
		
		<div class="body">
			<div class="info_body">
				<div class="info_body_img">
					<img src="<?php echo $thumbnail ?>" alt="" class="body_img">
				</div>
                <span class="body_name"><?php echo $fullname?></span>
                <ul class="body_list">
                    <li>
                        <i class="fas fa-at"></i>   
                        <span><?php echo $email?></span>        
                    </li>
                    <li>
                        <i class="fas fa-phone"></i>
                        <span><?php echo $phone_number?></span>        
                    </li>
                </ul>
			</div>
		</div>
		<div class="copy-right">Copyright © 2021 <a href="">3D1H</a></div>
    </div>

    <script src="./JS/test.js">
        
    </script>
</body>
</html>