<?php
    // session_start();
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
<html>
<head>
	<title>Change Info User</title>
	<meta charset="utf-8">
	<link rel="icon" type="image/png" href="https://gokisoft.com/uploads/2021/03/s-568-ico-web.jpg" />

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    
</head>
<body>
	<div class="container">
		<div class="panel panel-primary" style="width: 960px; margin: 0px auto; margin-top: 50px; background-color: #ccc; padding: 10px; border-radius: 5px; box-shadow:0 5px 5px 5px #9ac9f5;">
			<div class="panel-heading">
				<h2 class="text-center">Change Info User</h2>
			</div>
			<div class="panel-body">

				<form method="post">
					<div class="row">
						<div class="col-md-6 form-group">
							<label for="">Email Cũ</label>
                            <input required="true" type="text" class="form-control" id="emailOld" name="emailOld" value="<?php echo $email ?>" readonly>
						</div>
						<div class="col-md-6 form-group">
							<label for="">Email Mới</label>
							<input type="text" class="form-control" value="" id="emailNew" name="emailNew">
						</div>
	
					</div>
					<div class="row">
                        <div class="col-md-6 form-group">
							<label for="">Số Điện Thoại Cũ</label>
                            <input required="true" type="text" class="form-control" id="phone_numberOld" name="phone_numberOld" value="<?php echo $phone_number ?>" readonly>
						</div>
						<div class="col-md-6 form-group">
							<label for="">Số Điện Thoại Mới</label>
                            <input type="text" class="form-control" id="phone_numberNew" name="phone_numberNew" value="" >
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12 form-group">
							<label for="thumbnailNew">Ảnh đại điện</label>
                            <input type="text" class="form-control" id="thumbnailNew" name="thumbnailNew" value="" >
							<img src="<?php echo $thumbnail ?>" alt="" class="body-img">
						</div>
					</div>

					<div style="margin-top: 20px; font-size: 20px;">
						<span>
							<a href="./infoUser.php?id=<?php echo $id?>" style="margin-right: 30px">Quay Lại</a>
						</span>
						<input type="submit" value="Lưu" name="send" class="btn btn-success" style="width: 150px">
					</div>
					
					<!-- <button class="btn btn-success">Đăng Nhập</button> -->
                    <!-- <input type="submit" class="btn btn-success" value="Gửi" name="change"> -->
				</form>
                <?php
                // echo $id;
				// echo $email;
                // exit;
                    if(isset(($_POST['send']))){
                       if(isset($_POST['emailNew'])){
						   if($_POST['emailNew'] == ''){
							   $emailNew = $email;
						   }
						   else{
							   $emailNew = $_POST['emailNew'];
						   }
                       }
                       if(isset($_POST['phone_numberNew'])){
							if($_POST['phone_numberNew'] == ''){
								$phone_numberNew = $phone_number;
							}
							else{
								$phone_numberNew = $_POST['phone_numberNew'];
							}
                        }

						if(isset($_POST['thumbnailNew'])){
							if($_POST['thumbnailNew'] == ''){
								$thumbnailNew = $thumbnail;
							}
							else{
								$thumbnailNew = $_POST['thumbnailNew'];
							}
                        }

                        $sql = "update users set email = '$emailNew', phone_number = '$phone_numberNew', thumbnail = '$thumbnailNew' where id = $id";
                        if($connect->query($sql) == true){
                            header("Location: infoUser.php?id=$id");
                            // echo "hê";/
                        }
                        else{
                            echo "Update không thành công";
                        }
                    }
                    $connect->close();
                ?>
			</div>
		</div>
	</div>
<style>
	.body-img{
		width: 250px;
		
		margin-top: 15px;
		border-radius: 20px;
	}
</style>
</body>
</html>