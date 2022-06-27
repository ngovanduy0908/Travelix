<?php

	require_once('../db/dbhelper.php');

    $fullname = $msg = $email = $username = $password = $created_at = $updated_at = $role_id = $phone_number = $thumbnail = $password_confirm = '';
    require_once('form_register.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Đăng Ký</title>
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
	<style>
		.form-group label{
			font-weight: 600
		}
		.form-register{
			background-image: url(); background-size: cover; background-repeat: no-repeat;	
			color: #000;
			/* text-shadow: 0 0 5px #000; */
		}

		.form-register input{
			background: transparent;
		}
		

	</style>
</head>
<body style="background-image: url(https://vnview.vn/wp-content/uploads/2021/01/Review-du-lich-phu-quoc-4n3d-cua-hot-girl-xinh-dep-22.jpg); background-size: cover; background-repeat: no-repeat;">
	<div class="container">

		<div class="panel panel-primary form-register" style="width: 760px; margin: 0px auto; margin-top: 20px; padding: 10px; border-radius: 5px; box-shadow:0 5px 5px 5px #9ac9f5;">
			<div class="panel-heading">
				<h2 class="text-center">Đăng Ký Tài Khoản</h2>
				<h5 style="color: red;" class="text-center"><?php echo $msg?></h5>
			</div>
			<div class="panel-body">
				<form method="post">

                    <div class="form-group">
					  <label for="username">Tên đăng nhập:</label>
					  <input required="true" type="text" class="form-control" id="username" name="username">
					  <span id="username-mes"></span>
					</div>

					<div class="form-group">
					  <label for="fullname">Họ & Tên:</label>
					  <input required="true" type="text" class="form-control" id="fullname" name="fullname">
					  <span id="fullname-mes"></span>

					</div>

					<div class="form-group">
					  <label for="email">Email:</label>
					  <input required="true" type="email" class="form-control" id="email" name="email">
					  <span id="email-mes"></span>
					</div>

					<div class="form-group">
					  <label for="phone_number">Số điện thoại:</label>
					  <input required="true" type="number" class="form-control" id="phone_number" name="phone_number">
					  <span id="phone_number-mes"></span>

					</div>

					<div class="form-group" style="display:none;">
					  <label for="thumbnail">Ảnh đại diện(Có thể thêm sau):</label>
					  <input type="text" class="form-control" id="thumbnail" name="thumbnail">
					</div>

					<div class="form-group">
					  <label for="pwd">Mật Khẩu:</label>
					  <input required="true" type="text" class="form-control" id="pwd" name="password" min = "6">
					  <span id="pwd-mes"></span>

					</div>
					
					<div class="form-group">
					  <label for="pwd">Nhập lại mật Khẩu:</label>
					  <input required="true" type="text" class="form-control" id="confirm-pwd" name="password-confirm" min = "6" onkeyup = changeBtn()>
					  <span id="confirm-pwd-mes"></span>

					</div>
                    
					<button class="btn btn-success" id="btn" style="margin-bottom: 10px; width: 250px;" disabled>Đăng Ký</button>

					<p style="margin: 0px; ">
						<a style="color: #000; font-size: 20px" href="login.php">Tôi đã có tài khoản</a>
					</p>
					
				</form>
			</div>
		</div>
	</div>
	<script src = "./js./register.js"></script>
	<style>
		.form-control.form-error{
			border-color: red;
			border-width: 2px;
		}

		.form-group span{
			color: red;
			font-weight: bold;
		}

	</style>
</body>
</html>