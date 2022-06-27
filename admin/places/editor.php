<?php
    session_start();
	require_once('../../db/dbhelper.php');
    $id = $title = $address = $price = $thumbnail = $description = $created_at = $updated_at = $point = $rating = '';
    require_once('form_save.php');
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "select * from places where id = $id";
        $placeItem = $connect->query($sql);
        if($placeItem->num_rows > 0){
            // var_dump($placeItem);
            $row = $placeItem->fetch_assoc();
            // var_dump($row);
            $title = $row['title'];
            $address = $row['address'];
            $price = $row['price'];
            // $price = number_format($_row['price']);
            $thumbnail = $row['thumbnail'];
            $thumbnail = str_replace('\\', '\\\\', $thumbnail);
	        $thumbnail = str_replace('\'', '\\\'', $thumbnail);

            $description = $row['description'];
            // $description = $row['description'];
            $point = $row['point'];
            $rating = $row['rating'];

            // $password = $row['password'];

        }
    }
    // $connect->close();
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
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
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
                <div class="col-md-4">
                    <a href="../../home.php">
                        <button class="btn btn-warning">Quay Lại Giao Diện</button>
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
                    <!-- <div class="panel-heading">
				<h5 style="color: red;" class="text-center"><?=$msg?></h5>
			</div> -->
                </div>
                <div class="col-md-10" style="padding-bottom: 15px">
		            <a href="editor.php"><button class="btn btn-success" style="margin: 20px 0">Thêm Địa Chỉ</button></a>
                    <h4 style="text-align: center; margin: 10px 0">Thêm/Sửa Địa Điểm</h4>
				    <!-- <h5 style="color: red;" class="text-center"><?php echo $msg?></h5> -->

                    <form action="" method="post" style="width: 900px; margin: 0 auto">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="title">Địa Điểm:</label>
                                    <input required="true" type="text" class="form-control" id="title" name="title" value="<?=$title?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="price">Giá Tiền:</label>
                                    <input required="true" type="text" class="form-control" id="price" name="price" value="<?=$price?>">
                                </div>

                            </div>
                            
                            <input type="number" name="id" value="<?php echo $id ?>" readonly>
                        </div>
                        
                        <div class="form-group">

                        </div>

                        <div class="form-group">
                            <label for="thumbnail">Link Hình Ảnh:</label>
                            <input required="true" type="text" class="form-control" id="thumbnail" name="thumbnail" value="<?=$thumbnail?>">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="point">Điểm Đánh Giá:</label>
                                    <input required="true" type="text" class="form-control" id="point" name="point" value="<?=$point?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="rating">Số Sao:</label>
                                    <input required="true" type="number" class="form-control" id="rating" name="rating" min=2 value="<?=$rating?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="address">Địa Chỉ:</label>
                                    <input required="true" type="text" class="form-control" id="address" name="address" value="<?=$address?>">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="address">Mô Tả:</label>
                           <textarea name="description" id="description" cols="30" rows="5" class="form-control"><?=$description?></textarea>
                        </div>
                        
                        <p>
                            <a href="index.php">Quay Lại</a>
                        </p>
                        <button class="btn btn-success">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
      $('#description').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    </script>
</body>
</html>
