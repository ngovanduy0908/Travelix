<?php
    session_start();
    require_once('db/dbhelper.php');
    if(isset($_SESSION['user'])){
        $user_id = $_SESSION['user']['id'];
        $name = $_SESSION['user']['fullname'];
    }
// var_dump($name);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offer</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assest/css/main.css">
    <link rel="stylesheet" href="./assest/css/base.css">
    <link rel="stylesheet" href="./assest/css/grid.css">
    <!-- <link rel="stylesheet" href="./assest/css/offers-responsive.css"> -->
    <link rel="stylesheet" href="./assest/css/responsive.css">
    <!-- <link rel="stylesheet" href="./assest/css/offers.css"> -->
    <link rel="stylesheet" href="./assest/css/offer.css">
    <link rel="stylesheet" href="./assest/font/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./assest/font/beyond_the_mountains.otf">
    <link rel="icon" href="./assest/img/glogo.webp" type="image/x-icon"/>
</head>

<body>
    <div class="main">
        <div class="over-lay js-overlay">
            <div class="over-lay__body-close js-close-icon">
                <i class="fas fa-times"></i>
            </div>

            <div class="over-lay__body-content">
                <img src="./assest/img/glogo.webp" alt="">
                <ol class="over-lay__body-list">
                    <li class="over-lay__body-item">
                        <a href="index.php" class="over-lay__body-link">home</a>
                    </li>
                    <li class="over-lay__body-item">
                        <a href="./about-us.html" class="over-lay__body-link">about us</a>
                    </li>
                    <li class="over-lay__body-item">
                        <a href="#" class="over-lay__body-link">offers</a>
                    </li>
                    <li class="over-lay__body-item">
                        <a href="./news.html" class="over-lay__body-link">news</a>
                    </li>
                    <li class="over-lay__body-item">
                        <a href="./contact.html" class="over-lay__body-link">contact</a>
                    </li>
                </ol>
            </div>    
        </div>
        <div class="bubbels">
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
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
                        <div class="col l-6 m-6">
                            <div class="header__login">
                                <a href="./loginRes/logout.php" class="header__login-login" style="display:inline-flex">logout</a>
                
                                <?php
                                    
                                    if($user_id == 1){
                                        echo '
                                            <a href="./admin/" class="header__login-register">Admin</a>  
                                        ';
                                    }
                                    else{
                                        echo '
                                        <a href="" class="user" style="">'.$name.'</a>  
                                        ';
                                    }
                                
                                ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="user_body">
                <div class="user_body-icon">
                    <i class="fas fa-caret-square-left left"></i>
                    <i class="fas fa-caret-square-right right" style="display: none"></i>
                </div>

                <ul class="user_list" style="display: none">
                    <li class="user_item"><a class="user_link" href="./admin/ticket/ticketUser.php">Địa Điểm Đã Đặt</a></li>
                    <li class="user_item"><a class="user_link" href="./loginRes/infoUser.php?id=<?php echo $user_id ?>">Thông Tin Cá Nhân</a></li>
                    <li class="user_item"><a class="user_link" href="./loginRes/changePassword.php">Thay Đổi Mật Khẩu</a></li>
                    <li class="user_item"><a class="user_link" href="./feedback.php">Phản Hồi</a></li>                              
                </ul>
            </nav>
            <nav class="header__nav header__nav-scroll" style="top: 36px">
                <div class="grid wide">
                    <div class="header__body">
                        <a href="#" class="header__body-logo">
                            <img src="./assest/img/glogo.webp" alt="" class="logo__img">
                            <span class="logo__tittle">travelix</span>
                        </a>

                        <ul class="header__body-list hi-on-tablet-mobile">
                            <li class="header__body-item">
                                <a href="./home.php" class="header__body-link">home</a>
                            </li>
                            <li class="header__body-item">
                                <a href="./about-us.php" class="header__body-link">about us</a>
                            </li>
                            <li class="header__body-item">
                                <a href="offers.php" class="header__body-link">order</a>
                            </li>
                            <li class="header__body-item">
                                <a href="./news.php" class="header__body-link">news</a>
                            </li>
                            <li class="header__body-item">
                                <a href="./contact.php" class="header__body-link">contact</a>
                            </li>
                        </ul>

                        <div class="header__body-icon">
                            <label for="open-search" class="header__body-search">
                                <i class="fas fa-search cayvl"></i>
                                <input type="checkbox" name="" id="open-search" class="check" hidden>
                                <input type="text" class="search" placeholder="Search...">
                            </label>
    
                            <div class="header__body-menu-icon js-header__body-menu-icon">
                                <i class="fas fa-bars"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            
        </header>

        <div class="offers-home">
            <div class="offers-home__background" style="background-image: var(--overlay-color), url(./assest/img/imgOffers/1.jpg)"></div>
            <div class="offers-home__tittle">
                <h1 class="offers-home__heading"></h1>
            </div>
        </div>

        <div id="offer-container" style="padding: 50px 0">
            <div class="offer-container__filter">
                <div class="grid wide">
                    <div class="row">
                        <div class="offer-container__filter-content">
                            <ul class="offer-container__filter-list">
                                <li>
                                    <form action="" method="post" class="filter-form">
                                        <input type="text" name="address" id="" placeholder="Tìm kiếm theo địa điểm ..." class="search-address">

                                        <label for="" class="search-label">Giá:</label>
                                        <select name="price" id="" class="select-price-place">
                                            <option value="0">0đ-1.000.000đ</option>
                                            <option value="1000000">1.000.000đ-2.000.000đ</option>
                                            <option value="2000000">2.000.000đ-5.000.000đ</option>
                                            <option value="5000000">5.000.000đ -></option>
                                        </select>
                                        
                                        <label for="" class="search-label">Sao:</label>
                                        <select name="rating" id="" class="select-star-place">
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>

                                        <input type="submit" name="search" value="Tìm" class="btn-search">
                            
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="offer-container__list">
                <div class="grid wide">
                    <div class="row">
                        <?php
                        if(isset($_POST['search'])){
                            if(isset($_POST['price'])){
                                $price = $_POST['price'];
                            }
                        
                            if(isset($_POST['rating'])){
                                $rating = $_POST['rating'];
                            }

                            if(isset($_POST['address'])){
                                $address = $_POST['address'];
                            }
                            $sql = "select * from places where price >= $price and rating >= $rating and address like '%$address%'";
                            $placeList = $connect->query($sql);
                            if($placeList->num_rows > 0){
                                while($row = $placeList->fetch_assoc()){
                                    echo '
                                <div class="col l-12 m-12 c-12">
                                    <div class="offer-container__list-item">
                                        <div class="row">
                                            <div class="l-4 m-12 c-12">
                                                <div class="offer-container__list-item-content" style="background-image: url('.$row['thumbnail'].');">                            
                                                <div class="offer-container__list-item-content-tittle">
                                                <h3>'.$row['title'].'</h3>                                              
                                            </div>      
                                        </div>
                                    </div>
                                    
                                    <div class="col l-8 m-12 c-12">
                                        <div class="offer-container__list-item-des">
                                            <div class="offer-container__list-item-des-header">
                                                <div class="offer-container__list-item-des-price">
                                                    <span class="offer-price" style="font-size: 30px">'.number_format($row['price']).' VNĐ</span>
                                                    
                                                </div>
                                                <div class="offer-container__list-item-des-assess">
                                                    <span class="offer-assess__feedback">
                                                        <h5>Điểm</h5>
                                                        
                                                    </span>
                                                    <p class="offer-assess__feedback-point">'.$row['point'].'</p>
                                                </div>
                                            </div>

                                            <p class="container__content-list-item-rating offer-container__list-item-des-rating">';
                                            if($row['rating'] == 2){
                                                echo '
                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                <span class="rating-star1"><i class="fas fa-star"></i></span>
                                                <span class="rating-star1"><i class="fas fa-star"></i></span>
                                                <span class="rating-star1"><i class="fas fa-star"></i></span>
                                                ';
                                            }
                                            if($row['rating'] == 3){
                                                echo '
                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                <span class="rating-star1"><i class="fas fa-star"></i></span>
                                                <span class="rating-star1"><i class="fas fa-star"></i></span>
                                                ';
                                            }
                                            if($row['rating'] == 4){
                                                echo '
                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                <span class="rating-star1"><i class="fas fa-star"></i></span>
                                                ';
                                            }
                                            if($row['rating'] == 5){
                                                echo '
                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                ';
                                            }
                                            echo'
                                               
                                            </p>';
                                            echo '
                                            <p class="offer-container__list-item-des-text">
                                                '.$row['description'].'
                                            </p>
                                            <p class="offer-container__list-item-address">Địa chỉ: '.$row['address'].'</p>

                                            <div class="offer-container__list-item-des-img">
                                                <img src="./assest/img/offer item img.webp" alt="">
                                                <img src="./assest/img/clock.webp" alt="">
                                                <img src="./assest/img/xe-dap.webp" alt="">
                                                <img src="./assest/img/thuyen-nho.webp" alt="">
                                            </div>

                                            <button class="btn1 offer-container__list-item-des-btn">
                                                <a href="book.php?id='.$row['id'].'">BOOK</a>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                            }

                            }
                            else{
                                echo "<h2 style='margin-top: 5px; color: red'>Không có kết quả tìm kiếm</h2>";
                            }
                        }
                        else{
                            $limit = 4;
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
                            // echo $tongSoTrang;
                            // exit;
                            $sql = "SELECT * FROM `places` ORDER BY updated_at DESC limit $start,$limit";
                            $placeList = $connect->query($sql);
                            if($placeList->num_rows > 0){
                                while($row = $placeList->fetch_assoc()){
                                    echo '
                                <div class="col l-12 m-12 c-12">
                                    <div class="offer-container__list-item">
                                        <div class="row">
                                            <div class="l-4 m-12 c-12">
                                                <div class="offer-container__list-item-content" style="background-image: url('.$row['thumbnail'].');">                            
                                                <div class="offer-container__list-item-content-tittle">
                                                <h3>'.$row['title'].'</h3>                                              
                                            </div>      
                                        </div>
                                    </div>
                                    
                                    <div class="col l-8 m-12 c-12">
                                        <div class="offer-container__list-item-des">
                                            <div class="offer-container__list-item-des-header">
                                                <div class="offer-container__list-item-des-price">
                                                    <span class="offer-price" style="font-size: 30px">'.number_format($row['price']).' VNĐ</span>
                                                    
                                                </div>
                                                <div class="offer-container__list-item-des-assess">
                                                    <span class="offer-assess__feedback">
                                                        <h5>Điểm</h5>
                                                        
                                                    </span>
                                                    <p class="offer-assess__feedback-point">'.$row['point'].'</p>
                                                </div>
                                            </div>

                                            <p class="container__content-list-item-rating offer-container__list-item-des-rating">';
                                            if($row['rating'] == 2){
                                                echo '
                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                <span class="rating-star1"><i class="fas fa-star"></i></span>
                                                <span class="rating-star1"><i class="fas fa-star"></i></span>
                                                <span class="rating-star1"><i class="fas fa-star"></i></span>
                                                ';
                                            }
                                            else if($row['rating'] == 3){
                                                echo '
                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                <span class="rating-star1"><i class="fas fa-star"></i></span>
                                                <span class="rating-star1"><i class="fas fa-star"></i></span>
                                                ';
                                            }
                                            else if($row['rating'] == 4){
                                                echo '
                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                <span class="rating-star1"><i class="fas fa-star"></i></span>
                                                ';
                                            }
                                            else{
                                                echo '
                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                <span class="rating-star"><i class="fas fa-star"></i></span>
                                                ';
                                            }
                                            echo'
                                            </p>';
                                            echo '
                                            <p class="offer-container__list-item-des-text">
                                                '.$row['description'].'
                                            </p>
                                            <p class="offer-container__list-item-address">Địa chỉ: '.$row['address'].'</p>
                                            
                                            <div class="offer-container__list-item-des-img">
                                                <img src="./assest/img/offer item img.webp" alt="">
                                                <img src="./assest/img/clock.webp" alt="">
                                                <img src="./assest/img/xe-dap.webp" alt="">
                                                <img src="./assest/img/thuyen-nho.webp" alt="">
                                            </div>

                                            <button class="btn1 offer-container__list-item-des-btn">
                                                <a href="book.php?id='.$row['id'].'">BOOK</a>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>';

                            }
                            echo '
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="offers.php?page=1"><<</a></li>

                            ';
                            if($page > 1){
                                echo'
                                    <li class="page-item"><a class="page-link" href="offers.php?page='.($page-1).'"><</a></li>
                                ';
                            }
                            for($i = $from; $i <= $to; $i++){
                                if($page == $i){
                                    echo '
                                    <li class="page-item active"><a class="page-link" href="offers.php?page='.$i.'">'.$i.'</a></li>
                                ';
                                }
                                else{
                                    echo '
                                    <li class="page-item"><a class="page-link" href="offers.php?page='.$i.'">'.$i.'</a></li>
                                    ';
                                }
                            }
                            if($page < $tongSoTrang){
                                echo '
                                    <li class="page-item"><a class="page-link" href="offers.php?page='.($page+1).'">></a></li>';
                                
                            }
                            echo'
                                    <li class="page-item"><a class="page-link" href="offers.php?page='.$tongSoTrang.'">>></a></li>
                                </ul>
                            </div>
                        </div>
                        ';
                                
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <i class="fab fa-facebook-messenger offer-contact-mes"></i>
        <div class="offer-contact">
            <div class="offer-contact_body" style="display: block">
                <div class="offer-contact__header">
                    <div class="contact__header-img">
                        <img src="./assest/img/glogo.webp" alt="">
                        <h4>Travelix</h4>
                    </div>
                    <div class="contact_header-icon">
                        <i class="fas fa-phone"></i>
                        <i class="fas fa-video"></i>
                        <i class="fas fa-minus-circle contact-body-exit"></i>
                    </div>
                </div>
                <div class="contact-content">
                    <div class="contact-content-first">
                        <img src="./assest/img/glogo.webp" alt="">
                        <span>Hi, <?php echo $name ?></span>
                    </div>
                </div>
                <!-- <input type="text" name="" id="contact-input"> -->
           
                <div class="contact-content__footer">
                    <div class="content__footer-icon">
                        <i class="fas fa-plus-circle icon-plus"></i>
                        
                        <ul class="list-icon">
                            <li><i class="fas fa-file-image"></i></li>
                            <li><i class="fas fa-sticky-note"></i></li>
                            <li><i class="fas fa-file-archive"></i></li>
                        </ul>

                    </div>
                    
                    <textarea name="" id="contact-textarea" style="height: 30px; width: 56%;" placeholder="Aa"></textarea>
                        <i class="fas fa-heart icon-heart"></i>
                        <i class="fas fa-hand-point-right icon-hand" style="display: none"></i>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

</div>

         <footer class="footer"> 
            <div class="footer-test" style="top: 15px">
                <div class="grid wide">
                    <div class="row">
                        <div class="col l-3 m-6 c-12">
                            <div class="footer__item">
                                <div class="header__body-logo">
                                    <img src="./assest/img/glogo.webp" alt="" class="logo__img">
                                    <span class="logo__tittle">travelix</span>
                                </div>
    
                                <p class="footer__item-des">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis vu lputate eros, iaculis consequat nisl. Nunc et suscipit urna. Integer eleme ntum orci eu vehicula pretium.
                                </p>
                                <ul class="footer__item-list">
                                    <li class="footer__item-item">
                                        <a href="" class="footer__item-social"><i class="fab fa-pinterest"></i></a>
                                    </li>
                                    <li class="footer__item-item">
                                        <a href="" class="footer__item-social"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li class="footer__item-item">
                                        <a href="" class="footer__item-social"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="footer__item-item">
                                        <a href="" class="footer__item-social"><i class="fas fa-globe"></i></a>
                                    </li>
                                    <li class="footer__item-item">
                                        <a href="" class="footer__item-social"><i class="fab fa-youtube"></i></a>
                                    </li>
                                    <li class="footer__item-item">
                                        <a href="" class="footer__item-social"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                </ul>
                                
                            </div>
                        </div>

                        <div class="col l-3 m-6 c-12">
                            <div class="footer__item">
                                <h3 class="footer__item-heading">BLOG POSTS</h3>
                                <div class="footer__item-blog">
                                    <div class="footer__item-blog-item">
                                        <div class="blog__img-test">
                                            <img src="./assest/img/blog tour.webp" alt="" class="footer__item-blog-item-img">
                                        </div>
                                        <div class="footer__item-blog-item-des">
                                            <a href="" class="footer__item-blog-item-link">Travel with us this year</a>
                                            <p class="footer__item-blog-item-day">July 20, 2021</p>
                                        </div>
                                    </div>
                                    <div class="footer__item-blog-item">
                                        <div class="blog__img-test">
                                            <img src="./assest/img/offder-blog.webp" alt="" class="footer__item-blog-item-img">
                                        </div>
                                        <div class="footer__item-blog-item-des">
                                            <a href="" class="footer__item-blog-item-link">Travel with us this year</a>
                                            <p class="footer__item-blog-item-day">July 20, 2021</p>
                                        </div>
                                    </div>
                                    <div class="footer__item-blog-item">
                                        <div class="blog__img-test">
                                            <img src="./assest/img/offer-blog-2.webp" alt="" class="footer__item-blog-item-img">
                                        </div>
                                        <div class="footer__item-blog-item-des">
                                            <a href="" class="footer__item-blog-item-link">Travel with us this year</a>
                                            <p class="footer__item-blog-item-day">July 20, 2021</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col l-3 m-6 c-12">
                            <div class="footer__item">
                                <h3 class="footer__item-heading">TAGS</h3>
                                <div class="footer__item-tags">
                                    <ul class="footer__item-tags-list">
                                        <li class="footer__item-tags-item">
                                            <a href="" class="footer__item-tags-link">design</a>
                                        </li>
                                        <li class="footer__item-tags-item">
                                            <a href="" class="footer__item-tags-link">fashion</a>
                                        </li>
                                        <li class="footer__item-tags-item">
                                            <a href="" class="footer__item-tags-link">music</a>
                                        </li>
                                        <li class="footer__item-tags-item">
                                            <a href="" class="footer__item-tags-link">video</a>
                                        </li>
                                        <li class="footer__item-tags-item">
                                            <a href="" class="footer__item-tags-link">party</a>
                                        </li>
                                        <li class="footer__item-tags-item">
                                            <a href="" class="footer__item-tags-link">photography</a>
                                        </li>
                                        <li class="footer__item-tags-item">
                                            <a href="" class="footer__item-tags-link">adventure</a>
                                        </li>
                                        <li class="footer__item-tags-item">
                                            <a href="" class="footer__item-tags-link">travel</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col l-3 m-6 c-12">
                            <div class="footer__item">
                                <h3 class="footer__item-heading">CONTACT INFO</h3>
                                <div class="footer__item-contact">
                                    <ul class="footer__item-contact-list">
                                        <li class="footer__item-contact-item">
                                            <a href="" class="footer__item-contact-link">
                                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                width="20px" height="20px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                                                    <g>
                                                        <g>
                                                            <path fill="#FA9E1B" d="M446.813,493.966l-67.499-142.78c-1.348-2.85-3.682-5.033-6.48-6.224l-33.58-14.948l58.185-97.519
                                                                c0.14-0.234,0.271-0.471,0.396-0.713c11.568-22.579,17.434-46.978,17.434-72.515c0-42.959-16.846-83.233-47.435-113.402
                                                                C337.248,15.703,296.73-0.588,253.745,0.016c-41.748,0.579-81.056,17.348-110.685,47.22
                                                                c-29.626,29.87-46.078,69.313-46.326,111.066c-0.152,25.515,5.877,50.923,17.431,73.479c0.124,0.241,0.255,0.479,0.394,0.713
                                                                l58.184,97.517l-33.774,15.031c-2.763,1.229-4.993,3.408-6.285,6.142L65.187,493.966c-2.259,4.775-1.306,10.453,2.388,14.23
                                                                c3.693,3.776,9.345,4.858,14.172,2.711l84.558-37.646l84.558,37.646c3.271,1.455,7.006,1.455,10.278,0l84.558-37.646
                                                                l84.558,37.646c1.652,0.734,3.401,1.093,5.135,1.093c3.331,0,6.608-1.318,9.037-3.803
                                                                C448.119,504.419,449.071,498.743,446.813,493.966z M136.473,219.906c-9.73-19.132-14.599-39.805-14.47-61.453
                                                                c0.428-72.429,59.686-132.17,132.094-133.173c36.167-0.486,70.263,13.199,95.993,38.576
                                                                c25.738,25.383,39.911,59.267,39.911,95.412c0,21.359-4.869,41.757-14.473,60.638L266.85,402.054
                                                                c-3.317,5.561-8.691,6.16-10.849,6.16c-2.158,0-7.532-0.6-10.849-6.16L136.473,219.906z M350.834,447.891
                                                                c-3.271-1.455-7.006-1.455-10.277,0l-84.558,37.646l-84.558-37.646c-3.271-1.455-7.006-1.455-10.277,0l-58.578,26.08
                                                                l50.938-107.748l32.258-14.356l37.668,63.133c6.904,11.572,19.072,18.481,32.547,18.481c13.476,0,25.644-6.909,32.547-18.48
                                                                l37.668-63.133l32.261,14.361l50.936,107.743L350.834,447.891z"/>
                                                        </g>
                                                    </g>
                                                    <g>
                                                        <g>
                                                            <path fill="#FA9E1B" d="M256.004,101.607c-31.794,0-57.659,25.865-57.659,57.658s25.865,57.658,57.659,57.658
                                                                c31.793,0.001,57.658-25.865,57.658-57.658S287.797,101.607,256.004,101.607z M256.004,191.657
                                                                c-17.861,0.001-32.393-14.529-32.393-32.392c0-17.861,14.531-32.392,32.393-32.392c17.861,0,32.393,14.531,32.393,32.392
                                                                C288.396,177.126,273.865,191.657,256.004,191.657z"/>
                                                        </g>
                                                    </g>
                                                </svg>
                                                
                                                <span class="footer__item-contact-link-des">4127 Raoul Wallenber 45b-c Gibraltar</span>
                                            </a>
                                        </li>

                                        <li class="footer__item-contact-item">
                                            <a href="tel:+84 945 999 917" class="footer__item-contact-link">
                                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                width="20px" height="20px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                                                    <g>
                                                        <g>
                                                            <path fill="#FA9E1B" d="M446.813,493.966l-67.499-142.78c-1.348-2.85-3.682-5.033-6.48-6.224l-33.58-14.948l58.185-97.519
                                                                c0.14-0.234,0.271-0.471,0.396-0.713c11.568-22.579,17.434-46.978,17.434-72.515c0-42.959-16.846-83.233-47.435-113.402
                                                                C337.248,15.703,296.73-0.588,253.745,0.016c-41.748,0.579-81.056,17.348-110.685,47.22
                                                                c-29.626,29.87-46.078,69.313-46.326,111.066c-0.152,25.515,5.877,50.923,17.431,73.479c0.124,0.241,0.255,0.479,0.394,0.713
                                                                l58.184,97.517l-33.774,15.031c-2.763,1.229-4.993,3.408-6.285,6.142L65.187,493.966c-2.259,4.775-1.306,10.453,2.388,14.23
                                                                c3.693,3.776,9.345,4.858,14.172,2.711l84.558-37.646l84.558,37.646c3.271,1.455,7.006,1.455,10.278,0l84.558-37.646
                                                                l84.558,37.646c1.652,0.734,3.401,1.093,5.135,1.093c3.331,0,6.608-1.318,9.037-3.803
                                                                C448.119,504.419,449.071,498.743,446.813,493.966z M136.473,219.906c-9.73-19.132-14.599-39.805-14.47-61.453
                                                                c0.428-72.429,59.686-132.17,132.094-133.173c36.167-0.486,70.263,13.199,95.993,38.576
                                                                c25.738,25.383,39.911,59.267,39.911,95.412c0,21.359-4.869,41.757-14.473,60.638L266.85,402.054
                                                                c-3.317,5.561-8.691,6.16-10.849,6.16c-2.158,0-7.532-0.6-10.849-6.16L136.473,219.906z M350.834,447.891
                                                                c-3.271-1.455-7.006-1.455-10.277,0l-84.558,37.646l-84.558-37.646c-3.271-1.455-7.006-1.455-10.277,0l-58.578,26.08
                                                                l50.938-107.748l32.258-14.356l37.668,63.133c6.904,11.572,19.072,18.481,32.547,18.481c13.476,0,25.644-6.909,32.547-18.48
                                                                l37.668-63.133l32.261,14.361l50.936,107.743L350.834,447.891z"/>
                                                        </g>
                                                    </g>
                                                    <g>
                                                        <g>
                                                            <path fill="#FA9E1B" d="M256.004,101.607c-31.794,0-57.659,25.865-57.659,57.658s25.865,57.658,57.659,57.658
                                                                c31.793,0.001,57.658-25.865,57.658-57.658S287.797,101.607,256.004,101.607z M256.004,191.657
                                                                c-17.861,0.001-32.393-14.529-32.393-32.392c0-17.861,14.531-32.392,32.393-32.392c17.861,0,32.393,14.531,32.393,32.392
                                                                C288.396,177.126,273.865,191.657,256.004,191.657z"/>
                                                        </g>
                                                    </g>
                                                </svg>
                                                
                                                <span class="footer__item-contact-link-des">+84 945 999 917</span>
                                                    
                                            </a>
                                        </li>

                                        <li class="footer__item-contact-item">
                                            <a href="mailto:travelix@gmail.com" class="footer__item-contact-link">
                                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                width="20px" height="20px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                                                    <g>
                                                        <g>
                                                            <path fill="#FA9E1B" d="M446.813,493.966l-67.499-142.78c-1.348-2.85-3.682-5.033-6.48-6.224l-33.58-14.948l58.185-97.519
                                                                c0.14-0.234,0.271-0.471,0.396-0.713c11.568-22.579,17.434-46.978,17.434-72.515c0-42.959-16.846-83.233-47.435-113.402
                                                                C337.248,15.703,296.73-0.588,253.745,0.016c-41.748,0.579-81.056,17.348-110.685,47.22
                                                                c-29.626,29.87-46.078,69.313-46.326,111.066c-0.152,25.515,5.877,50.923,17.431,73.479c0.124,0.241,0.255,0.479,0.394,0.713
                                                                l58.184,97.517l-33.774,15.031c-2.763,1.229-4.993,3.408-6.285,6.142L65.187,493.966c-2.259,4.775-1.306,10.453,2.388,14.23
                                                                c3.693,3.776,9.345,4.858,14.172,2.711l84.558-37.646l84.558,37.646c3.271,1.455,7.006,1.455,10.278,0l84.558-37.646
                                                                l84.558,37.646c1.652,0.734,3.401,1.093,5.135,1.093c3.331,0,6.608-1.318,9.037-3.803
                                                                C448.119,504.419,449.071,498.743,446.813,493.966z M136.473,219.906c-9.73-19.132-14.599-39.805-14.47-61.453
                                                                c0.428-72.429,59.686-132.17,132.094-133.173c36.167-0.486,70.263,13.199,95.993,38.576
                                                                c25.738,25.383,39.911,59.267,39.911,95.412c0,21.359-4.869,41.757-14.473,60.638L266.85,402.054
                                                                c-3.317,5.561-8.691,6.16-10.849,6.16c-2.158,0-7.532-0.6-10.849-6.16L136.473,219.906z M350.834,447.891
                                                                c-3.271-1.455-7.006-1.455-10.277,0l-84.558,37.646l-84.558-37.646c-3.271-1.455-7.006-1.455-10.277,0l-58.578,26.08
                                                                l50.938-107.748l32.258-14.356l37.668,63.133c6.904,11.572,19.072,18.481,32.547,18.481c13.476,0,25.644-6.909,32.547-18.48
                                                                l37.668-63.133l32.261,14.361l50.936,107.743L350.834,447.891z"/>
                                                        </g>
                                                    </g>
                                                    <g>
                                                        <g>
                                                            <path fill="#FA9E1B" d="M256.004,101.607c-31.794,0-57.659,25.865-57.659,57.658s25.865,57.658,57.659,57.658
                                                                c31.793,0.001,57.658-25.865,57.658-57.658S287.797,101.607,256.004,101.607z M256.004,191.657
                                                                c-17.861,0.001-32.393-14.529-32.393-32.392c0-17.861,14.531-32.392,32.393-32.392c17.861,0,32.393,14.531,32.393,32.392
                                                                C288.396,177.126,273.865,191.657,256.004,191.657z"/>
                                                        </g>
                                                    </g>
                                                </svg>
                                                
                                                <span class="footer__item-contact-link-des">travelix@gmail.com</span>
                                                    
                                            </a>
                                        </li>

                                        <li class="footer__item-contact-item">
                                            <a href="" class="footer__item-contact-link">
                                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                width="20px" height="20px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                                                    <g>
                                                        <g>
                                                            <path fill="#FA9E1B" d="M446.813,493.966l-67.499-142.78c-1.348-2.85-3.682-5.033-6.48-6.224l-33.58-14.948l58.185-97.519
                                                                c0.14-0.234,0.271-0.471,0.396-0.713c11.568-22.579,17.434-46.978,17.434-72.515c0-42.959-16.846-83.233-47.435-113.402
                                                                C337.248,15.703,296.73-0.588,253.745,0.016c-41.748,0.579-81.056,17.348-110.685,47.22
                                                                c-29.626,29.87-46.078,69.313-46.326,111.066c-0.152,25.515,5.877,50.923,17.431,73.479c0.124,0.241,0.255,0.479,0.394,0.713
                                                                l58.184,97.517l-33.774,15.031c-2.763,1.229-4.993,3.408-6.285,6.142L65.187,493.966c-2.259,4.775-1.306,10.453,2.388,14.23
                                                                c3.693,3.776,9.345,4.858,14.172,2.711l84.558-37.646l84.558,37.646c3.271,1.455,7.006,1.455,10.278,0l84.558-37.646
                                                                l84.558,37.646c1.652,0.734,3.401,1.093,5.135,1.093c3.331,0,6.608-1.318,9.037-3.803
                                                                C448.119,504.419,449.071,498.743,446.813,493.966z M136.473,219.906c-9.73-19.132-14.599-39.805-14.47-61.453
                                                                c0.428-72.429,59.686-132.17,132.094-133.173c36.167-0.486,70.263,13.199,95.993,38.576
                                                                c25.738,25.383,39.911,59.267,39.911,95.412c0,21.359-4.869,41.757-14.473,60.638L266.85,402.054
                                                                c-3.317,5.561-8.691,6.16-10.849,6.16c-2.158,0-7.532-0.6-10.849-6.16L136.473,219.906z M350.834,447.891
                                                                c-3.271-1.455-7.006-1.455-10.277,0l-84.558,37.646l-84.558-37.646c-3.271-1.455-7.006-1.455-10.277,0l-58.578,26.08
                                                                l50.938-107.748l32.258-14.356l37.668,63.133c6.904,11.572,19.072,18.481,32.547,18.481c13.476,0,25.644-6.909,32.547-18.48
                                                                l37.668-63.133l32.261,14.361l50.936,107.743L350.834,447.891z"/>
                                                        </g>
                                                    </g>
                                                    <g>
                                                        <g>
                                                            <path fill="#FA9E1B" d="M256.004,101.607c-31.794,0-57.659,25.865-57.659,57.658s25.865,57.658,57.659,57.658
                                                                c31.793,0.001,57.658-25.865,57.658-57.658S287.797,101.607,256.004,101.607z M256.004,191.657
                                                                c-17.861,0.001-32.393-14.529-32.393-32.392c0-17.861,14.531-32.392,32.393-32.392c17.861,0,32.393,14.531,32.393,32.392
                                                                C288.396,177.126,273.865,191.657,256.004,191.657z"/>
                                                        </g>
                                                    </g>
                                                </svg>
                                                
                                                <span class="footer__item-contact-link-des">www.newbiedev.com</span>
                                                   
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="copy-right">Copyright © 2021 <a href="">3D1H</a></div>
            </div>
        </footer>  
    </div>
    
    <script src="./JS/offer.js">
    </script>
    <!-- <script src="./JS/main.js">
    </script> -->
<style>
        .content__footer-icon{
            display: flex;
            align-items: center;
        }
        .list-icon{
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            list-style: none;
            /* margin: 0 4px; */
            /* padding: 4px; */
            font-size: 20px;
        }
        .list-icon i{
            margin-right: 6px;

        }
        .icon-hand,
        .icon-heart{
            margin-right: 6px;
            font-size: 20px;
        }

        .icon-heart{
            color: red;
        }

        .contact-content span{
            color: #ff4843;
        }
    .header__nav.header__nav-scroll{
        background: rgba(54, 19, 84, .85);
        height: 100px;
        position: fixed;
        z-index: 99;
        animation: toTop 1s ease;
    }

    @keyframes toTop {
        from {
            height: 135px;
        }
        to {
            height: 100px;
        }
    }
    .header__login-register:hover{
        color: var(--hover-color);
    }
    .header__body-link:hover{
        text-decoration: none;
        color: red;
    }
    .header__login-login::after{
        height: 40%;
    }
    .user{
        position: relative;
        display: inline-block;
        color: white;
    }

    .left, .right{
        position: fixed;
        top: 30%;
        right: 4%;
        cursor: pointer;
    }
    .user_body i{
        font-size:30px;
    }
    
    .user_list{
        padding: 0px;
        list-style: none;
        margin: 0px;
        position: fixed;
        top: 35%;
        right: 1px;
        background-image: linear-gradient(rgba(231, 55, 13, .55), rgba(29, 4, 62, .55));
        z-index: 8;
        border-radius: 36px;
        box-shadow: 0 0 3px #1f12e1;
        animation: display 0.6s;
    }

    @keyframes display {
        from {
            opacity: 0;
            right: -90px;
        }
         to{
            opacity: 1;
         }
    }

    .offer-contact_body{
        position: fixed;
        width: 310px;
        height: 388px;
        top: 40%;
        right: 35px;
        background: #856290;
        z-index: 1;
        padding-top: 12px;
        border-radius: 10px;
    }

    .offer-contact_body h4 i{
        margin-left: 36px;
    }

    .offer-contact i {
        cursor: pointer;
    }

    .offer-contact_body input,
    .offer-contact_body textarea{
        /* width: 56%; */
        padding: 3px 6px 6px;
        border-radius: 10px;
        word-break: break-word;
        font-size:16px;
        position: absolute;
        right: 36px;
        bottom: 6px;
        transition: width 0.2s ease-in;
    }

    @keyframes changeWidth {
        from{
            width:56%;
        }
        to{
            width: 79%;
        }
    }

    .offer-contact-mes{
        background: rgba(29,171,209,1);
        position: fixed;
        top: 90%;
        right: 14px;
        padding: 10px 9px;
        font-size: 20px;
        border-radius: 50%;
        /* animation: xoay 2s linear infinite !important; */
        animation: animate 2s linear infinite;
        z-index: 1;
        color: white;
        cursor: pointer;
    }

    @keyframes animate{
        0%{
            box-shadow: 0 0 0 0 rgba(29,171,209,0.6), 0 0 0 0 rgba(29,171,209,0.6);
        }

        30%{
            box-shadow: 0 0 0 50px rgba(29,171,209,0), 0 0 0 0 rgba(29,171,209,0.6);
        }

        65%{
            box-shadow: 0 0 0 50px rgba(29,171,209,0), 0 0 0 30px rgba(29,171,209,0);
        }

        100%{
            box-shadow: 0 0 0 0 rgba(29,171,209,0), 0 0 0 30px rgba(29,171,209,0);
        }
    }

    @keyframes xoay {
        from{
            transform: rotate(0deg)
        }
        to{
            transform: rotate(360deg)
        }
    }

    .contact__header-img,
    .offer-contact__header{
        display: flex;
        justify-content: space-between;
        align-items: center;


    }

    .offer-contact__header{
        padding-bottom: 4px;
    /* border: 5px; */
        border-bottom: 1px solid #dbf61da3;
    }

    .contact__header-img img{
        background: #faf6f6;
        margin: 0 9px;
        padding: 4px;
        border-radius: 50%;
        width: 34px;
        box-shadow: 0 0 2px black;
        height: 34px;

       
    }

    .contact__header-img h4{
        text-align: center;
        margin: 0;
        font-size: 20px;
    }

    .contact_header-icon{
        margin-right: 9px;
    }
    .contact_header-icon i {
        margin-left: 6px;
    /* width: 26px; */
    /* height: 26px; */
    /* align-items: center; */
    border-radius: 50%;
    /* line-height: 26px; */
    /* text-align: justify; */
    padding: 5px;
    background: transparent;
    }

    .contact_header-icon i:hover { 
        background-color: #fa9898;
    }

    .contact-content{
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        padding: 0px 16px 0 32px;
        font-size: 16px;
        height: 300px;
        overflow: hidden;
        overflow-y: auto;
    }

    .contact-content .contact-content-first{
        position: relative;
    /* left: -133px; */
    /* margin-top: 4px; */
    /* margin-left: 0px; */
    /* float: left; */
    display: flex;
    align-items: center;
    /* justify-content: space-around; */
    width: 100%;
    left: -17px;
    /* margin-bottom: 6px; */
    margin: 6px 0;
    }
    
    .contact-content-first img{
        width: 20px;
        background: white;
        border-radius: 50%;
        height: 20px;
        padding: 4px;
    }

    .contact-content-first span{
        padding: 0 5px 3px;
        margin-left: 5px;
        border-radius: 10px;
        background: #f6bcbc;
        color: #1d0724;
    }

    .contact-content p{
        background: white;
        padding: 0px 5px 5px;
        margin-left: 20px;
        margin-bottom: 6px;
        border-radius: 10px;
        word-break: break-word;
        /* position: absolute;
        right: 34px; */
    }

    .contact-content__footer{
        display: flex;
        align-items: center;
    justify-content: space-between;

    }

    .icon-plus{
        margin: 0 6px;
    /* padding: 4px; */
    font-size: 20px;
     /* margin-left: 4px; */
    }

    .user_item{
        padding: 6px 16px;    
        text-align: center;
    }

    .user_link{
        color: #fff;
        text-decoration: none;
        font-weight: 600;
    }

    .user_link:hover{
        color: #e6f506;
        text-decoration: none;
    }

    .header__body-link:hover{
        color: white;
    }
    .search-label{
        color: #333;
        font-size: 15px;
        font-weight: bold;
        margin-right: 3px;
    }
    .btn-search,
    .search-address,
    .select-price-place,
    .select-star-place{
        margin-right: 25px;
        padding: 10px 5px;
        border-radius: 3px;
        background-color: rgba(250, 158, 27,0.4);
        color: var(--primary-color);
        font-size: 15px;
        font-weight: 500;
        min-width: 100px;
    }
    .btn-search{
        outline: none;
        border: none;
        background-image: var(--bg-section-hover);
        color: #000;
    }
    #offer-container{
        padding-top: 50px !important;
    }
    .offer-container__list-item-address{
        color: var(--primary-color);
        font-size: 16px;
        font-weight: 500;
        margin: 0px;
    }

    /* .offers-home__background{
        height: 80vh;
        background-size: contain;
        background-position:center -150px;
    } */

    .offers-home__heading{
        font-family: Brush Script MT;
        text-shadow: rgba(255,255,255,0.5) 0px 3px 3px;
    }
        /* .user_list{
            position: absolute;
            top: 100%;
            right: -60px;
            animation: display 0.6s;
        } */
        .bubbels{
        position: absolute;
        width: 100%;
        height: 80%;
        z-index: 0;
        overflow: hidden;
        top: 0;
        left: 0;
    }

    .bubble{
        position: absolute;
        bottom: 0;
        background-image: linear-gradient(to left, rgba(247, 138, 237,0.8), rgba(13, 255, 131,0.6));;
        border-radius: 50%;
        opacity: 0.5;
        animation: flying 10s infinite ease-in;
    }

    .bubble:nth-child(1){
        width: 40px;
        height: 40px;
        left: 10%;
        animation-duration: 8s;
    }

    .bubble:nth-child(2){
        width: 20px;
        height: 20px;
        left: 20%;
        animation-duration: 5s;
        animation-delay: 1s;
    }

    .bubble:nth-child(3){
        width: 50px;
        height: 50px;
        left: 35%;
        animation-duration: 10s;
        animation-delay: 2s;
    }

    .bubble:nth-child(4){
        width: 80px;
        height: 80px;
        left: 50%;
        animation-duration: 7s;
        animation-delay: 0s;
    }

    .bubble:nth-child(5){
        width: 35px;
        height: 35px;
        left: 55%;
        animation-duration: 6s;
        animation-delay: 1s;
    }

    .bubble:nth-child(6){
        width: 45px;
        height: 45px;
        left: 65%;
        animation-duration: 8s;
        animation-delay: 3s;
    }

    .bubble:nth-child(7){
        width: 25px;
        height: 25px;
        left: 75%;
        animation-duration: 7s;
        animation-delay: 2s;
    }

    .bubble:nth-child(8){
        width: 80px;
        height: 80px;
        left: 80%;
        animation-duration: 6s;
        animation-delay: 1s;
    }

    .bubble:nth-child(9){
        width: 15px;
        height: 15px;
        left: 85%;
        animation-duration: 9s;
        animation-delay: 0s;
    }

    .bubble:nth-child(10){
        width: 50px;
        height: 50px;
        left: 85%;
        animation-duration: 5s;
        animation-delay: 3s;
    }


    @keyframes flying{
        0%{
            bottom: -100px;
            transform: translateX(0);
        }
        50%{
            transform: translateX(100px);
        }
        100%{
            bottom: 1080px;
            transform: translateX(0);
        }
    }
   
</style>
</body>
</html>