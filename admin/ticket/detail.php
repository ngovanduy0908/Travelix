<?php
	require_once('../../db/dbhelper.php');
if(isset($_GET['hotel_id']) && $_GET['hotel_id'] == ''){
        if(isset($_GET['place_id'])){
            $place_id = $_GET['place_id'];
        }
       $sql = "select * from places where $place_id";
       $placeItem = $connect->query($sql);
       if($placeItem->num_rows > 0){
           $row = $placeItem->fetch_assoc();
           echo '
           <h2>'.$row['title'].'</h2>
           <h2>'.$row['address'].'</h2>

    <p>'.$row['description'].'</p>
    <p>'.number_format($row['price']).' VNĐ</p>
    <img src="'.$row['thumbnail'].'" alt="">';
       }
}

if(isset($_GET['hotel_id']) && $_GET['hotel_id'] != ''){
    if(isset($_GET['place_id'])){
        $place_id = $_GET['place_id'];
    }
    $hotel_id = $_GET['hotel_id'];
    // echo $hotel_id;
    // exit;
//    $sql = "select places.*, hotel.* from places, hotel where places.id = hotel.place_id and hotel.id = $hotel_id";
    $sql = "select places.*, hotel.thumbnail as hotel_thumbnail, hotel.price as hotel_price, hotel.description as hotel_description, hotel.rating as hotel_rating, hotel.name as hotel_name from places, hotel where places.id = hotel.place_id and hotel.id = $hotel_id";
   $ticket = $connect->query($sql);
   if($ticket->num_rows > 0){
       $row = $ticket->fetch_assoc();
    //    var_dump($row);
    //    exit;
    echo '
    <h2 style="color: red">Về địa điểm</h2>
    <p>Tên địa điểm '.$row['title'].'</p>
    <p>Mô tả :'.$row['description'].'</p>
    <img src="'.$row['thumbnail'].'" alt="">

    <h2 style="color: red">Về khách sạn</h2>
    <p>Tên khách sạn '.$row['hotel_name'].'</p>
    <p>Mô tả :'.$row['hotel_description'].'</p> 
    <img src="'.$row['hotel_thumbnail'].'" alt="">

    ';

   }
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="ticketUser.php"><button>Xem các vé đã mua</button></a>
    <a href="../../home.php"><button>Trở lại trang chủ</button></a>

</body>
</html>