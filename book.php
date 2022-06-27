<?php
    session_start();
    require_once('db/dbhelper.php');
    $title = $msg = '';
    if(isset($_SESSION['user'])){
        $name = $_SESSION['user']['fullname'];
        $user_id = $_SESSION['user']['id'];
    }
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "select * from places where id = $id";
        $place = $connect->query($sql);
        if($place->num_rows > 0){
            $row = $place->fetch_assoc();
            $pricePlace = $row['price'];
            $title = $row['title'];
            $pricePlace = (int)$pricePlace;
            // var_dump($pricePlace);
            // exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Page</title>
    <link rel="stylesheet" href="./assest/font/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./assest/css/main.css">
    <link rel="stylesheet" href="./assest/css/base.css">
    <link rel="stylesheet" href="./assest/css/grid.css">
    <link rel="stylesheet" href="./assest/css/offers.css">
    <link rel="stylesheet" href="./assest/css/book.css">
</head>
<body>
    <div class="overlay">
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
    </div>
    <div class="container">
        <div class="container__header">
            <div class="grid wide header_heading">
                <a href="./offers.php" class="container__header-back"><i class="fas fa-hand-point-left"></i></a>
                <h2 class="">Tour du lịch <?php echo $title?> kính chào <?php echo $name?>.</h2>
            </div>
        </div>

        <?php
            $sql = "select * from book where user_id = $user_id and place_id =  $id and sum > 0";
            $result = $connect->query($sql);
            if($result->num_rows > 0){
                echo '
                <div class="buy-ticket">
                
                    <h3>
                    CHÚ Ý: Bạn đã mua vé này rồi. Nếu bạn muốn thay đổi ý định. Vui lòng HỦY vé để thay đổi theo ý bạn muốn.
                    </h3>
                    <a href="offers.php" style="margin-top: 15px" class="buy-ticket_back"><i class="fas fa-backward" style="margin-right: 10px"></i>Quay lại trang chủ</a> 
                
                </div>
                ';
                // $msg = "CHÚ Ý: Bạn đã mua vé này rồi. Nếu bạn muốn thay đổi ý định. Vui lòng HỦY vé để thay đổi theo ý bạn muốn.
                // <a href='offers.php'>Quay lại trang chủ</a> 
                // ";
            }
            else{
                echo '
                <form action="" method="post" class="container_form">
                <h3>Bạn có muốn đặt khách sạn không ?</h3>
    
                <div class="form-choose">
                    <label for="yes">Có</label>
                    <input type="radio" name="choose" id="yes" value="yes">
                </div>
    
                <div class="form-choose">
                    <label for="no" class="no">Không</label>
                    <input type="radio" name="choose" id="no" value="no">
                </div>
    
                <input type="submit" name="select" value="Chọn" class="">
            </form>                
                
                ';
            }
        ?>
       

        <?php
        if(isset($_POST['select'])){
            if(isset($_POST['choose']) && $_POST['choose'] == 'yes'){
                echo '
            <h2 style="text-align: center; margin-top: 34px" class="hotel-title">
                <i class="fas fa-spa"></i>
                KHÁCH SẠN
                <i class="fas fa-spa"></i>
            </h2>
                ';
                $sql = "select hotel.* from hotel, places where hotel.place_id = places.id and places.id = $id";
                $hotelItem = $connect->query($sql);
                if($hotelItem->num_rows > 0){
                    
                    while($row = $hotelItem->fetch_assoc()){
                        // $priceHotel = $row['price'];
                        // echo $pricePlace;
                        // exit;
                    echo '
                    <div class="offer-container__list">
                            <div class="grid wide">
                                <div class="row">
                                    <div class="col l-12 m-12 c-12">
                                        <div class="offer-container__list-item">
                                            <div class="row">
                                                <div class="l-4 m-12 c-12">
                                                    <div class="offer-container__list-item-content" style="background-image: url('.$row['thumbnail'].');">                            
                                                    <div class="offer-container__list-item-content-tittle">
                                                    <h3>'.$row['name'].'</h3>                                              
                                                </div>      
                                            </div>
                                        </div>
                                                        
                                        <div class="col l-8 m-12 c-12">
                                            <div class="offer-container__list-item-des">
                                                <div class="offer-container__list-item-des-header">
                                                    <div class="offer-container__list-item-des-price">
                                                        <span class="offer-price" style="font-size: 30px">'.number_format($row['price']).' VNĐ</span>
                                                        
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

                                                <div class="offer-container__list-item-des-img">
                                                <img src="./assest/img/offer item img.webp" alt="">
                                                <img src="./assest/img/clock.webp" alt="">
                                                <img src="./assest/img/xe-dap.webp" alt="">
                                                <img src="./assest/img/thuyen-nho.webp" alt="">
                                            </div>

                                            <button class="btn1 offer-container__list-item-des-btn">
                                                <a href="book.php?id='.$id.'&hotel_id='.$row['id'].'" >BOOK</a>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </button>                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                                    
                    ';
                    }

                }
                else{
                    $msg="Địa điểm chưa có khách sạn. Vui lòng chọn KHÔNG để Mua Vé";
                }
            }
            else{
                echo '
                <h3 style="color: #221f2c; text-align:center; text-shadow: 0 1px 1px #fa9e1b; margin-top:30px ">Bạn có thể đặt khách sạn sau. Bây giờ thì</h3> 
                ';
                $month = Date('m');
                $year = Date('Y');
                $insertBook = "insert into book (user_id, place_id, sum, status) values ($user_id, $id, $pricePlace, 0)";
                $insertHistoryTicket = "insert into historyticket (user_id, place_id, sum, status, month, year) values ($user_id, $id, $pricePlace, 0, '$month', '$year')";
                        // $sql = "insert into book (user_id, place_id, sum) values ($user_id, $id, $pricePlace)";
                    if($connect->query($insertBook) == true && $connect->query($insertHistoryTicket) == true){
                        echo '
                            <h3 style="color: #f30c73; text-align:center; text-shadow: 0 1px 1px #fa9e1b;  margin-top:30px ">Bạn đã mua vé <span style="color: #105e03">THÀNH CÔNG</span>. Chúng tôi cảm ơn '.$name.' rất nhiều. Hi vọng bạn ghé thăm các khách sạn              
                            </h3>                
                        ';
                        $msg = "CHÚ Ý: Bạn đã mua vé này rồi. Nếu bạn muốn thay đổi ý định. Vui lòng HỦY vé để thay đổi theo ý bạn muốn.
                        <a href='offers.php'>Quay lại trang chủ</a> 
                        ";
                    }             
            }
        }
        ?>
        <?php
        // $sql = "select * from book where user_id = $user_id and place_id = $place_id and sum > 0";
        // $result = $connect->query($sql);
        
        // if($result->num_rows > 0){
        //     $msg = "CHÚ Ý: Bạn đã mua vé này rồi. Nếu bạn muốn thay đổi ý định. Vui lòng HỦY vé để thay đổi theo ý bạn muốn.
        //     <a href='offers.php'>Quay lại trang chủ</a> 
        //     ";
        // }
        // else{
            if(isset($_GET['hotel_id'])){
                $hotel_id = $_GET['hotel_id'];
                $place_id = $id;
                $sql = "select * from hotel where id = $hotel_id";
                $hotelItem = $connect->query($sql);
                $row = $hotelItem->fetch_assoc();
                $priceHotel = $row['price'];
                $priceHotel = (int)$priceHotel;
                
                $money = $pricePlace + $priceHotel;
                
                $month = Date('m');
                $year = Date('Y');

                $insertBook = "insert into book (user_id, place_id, hotel_id, sum, status) values ($user_id, $place_id, $hotel_id, $money, 0)";
                $insertHistoryTicket = "insert into historyticket (user_id, place_id, hotel_id, sum, status, month, year) values ($user_id, $place_id, $hotel_id, $money, 0, '$month', '$year')";

                if($connect->query($insertBook) == true && $connect->query($insertHistoryTicket) == true){
                    echo '
                        <h3 style="color: #221f2c; text-align:center; text-shadow: 0 1px 1px #fa9e1b; margin-top:30px ">Bạn đã mua vé <span style="color: #105e03">THÀNH CÔNG</span>. Chúng tôi cảm ơn '.$name.' rất nhiều.
                            <a href="offers.php">Tiếp tục</a>                   
                        </h3>                
                    ';
                }
                
            }
        // }
            $connect->close();
        ?>
                        <h3 style="color: #ce8c21; text-align:center; text-shadow: 0 1px 1px #fa9e1b; margin: 30px 0"><?=$msg?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer"> 
        <div class="footer-test">
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

    
<style>
        body{
            position: relative;
        }
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .header{
            height: 36px;
            
        }
        .container{
            position: relative;
        }
        .container__header{
            color: red;
            height: 90px;
            background-image: var(--overlay-color);

        }
        .container__header-back,
        .container__header h2{
            line-height: 90px;
            text-align: center;
            font-size: 24px;
            color: var(--white-color);
            /* display:inline-block; */
        }
        .header_heading{
            display: flex;
        }
        .container__header-back{
            max-width: 150px;
        }
        .container__header h2{
            /* te */
            flex: 1;
        }
        
        
        .container_form{
            width: 600px;
            margin: 45px auto;
            padding: 10px;
            border: 1px solid var(--primary-color);
            text-align:center;
        }
        .container_form h3{
            text-align: center;
            font-size: 20px;
        }
        .form-choose label{
           width: 100px;
            display:inline-block;
            margin: 10px 0;
            font-size: 16px;
            font-weight: bold;
            color: var(--btn1-color);
        }
        .container_form input{
            width: 150px;
            padding: 5px 0;
            background-image: var(--bg-section-hover);
            outline: none;
            color: white;
            border: none;
            border-radius: 5px;
        }

        .hotel-title{
            width: 250px;
            margin: 34px auto 50px;
            background: black;
            color: white;
            text-align: center;
            padding: 12px 0;
            border-radius: 30px;
        }

        .buy-ticket{
            font-size: 18px;
            display: flex;
            height: 208px;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            
        }

        .buy-ticket_back{
            text-decoration: none;
            font-weight: 600;
        }

        .footer-test{
            top: 0
        }

        .offer-container__list-item{
            margin: 0px 0px 50px;
        }

        .bubble{
            position: absolute;
            bottom: 0;
            background-image: linear-gradient(to left, rgba(238, 8, 61,0.9), rgba(163, 255, 79,0.9));
            border-radius: 50%;
            opacity: 0.5;
            animation: flying 1s infinite ease-in;
        }

        .bubble:nth-child(1){
            width: 40px;
            height: 40px;
            left: 10%;
            animation-duration: 6s;
           
        }

        .bubble:nth-child(2){
            width: 20px;
            height: 20px;
            left: 20%;
            animation-duration: 4s;
            animation-delay: 1s;
        }

        .bubble:nth-child(3){
            width: 50px;
            height: 50px;
            left: 35%;
            animation-duration: 8s;
            animation-delay: 2s;
        }

        .bubble:nth-child(4){
            width: 80px;
            height: 80px;
            left: 50%;
            animation-duration: 4s;
            animation-delay: 0s;
        }

        .bubble:nth-child(5){
            width: 35px;
            height: 35px;
            left: 55%;
            animation-duration: 3s;
            animation-delay: 1s;
        }

        .bubble:nth-child(6){
            width: 45px;
            height: 45px;
            left: 65%;
            animation-duration: 6s;
            animation-delay: 3s;
        }

        .bubble:nth-child(7){
            width: 25px;
            height: 25px;
            left: 75%;
            animation-duration: 4s;
            animation-delay: 2s;
        }

        .bubble:nth-child(8){
            width: 80px;
            height: 80px;
            left: 80%;
            animation-duration: 5s;
            animation-delay: 1s;
        }

        .bubble:nth-child(9){
            width: 15px;
            height: 15px;
            left: 85%;
            animation-duration: 6s;
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