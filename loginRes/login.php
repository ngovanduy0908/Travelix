<?php
	session_start();
	require_once('../db/dbhelper.php');
    $username = $password = $msg = '';
	if(isset($_SESSION['user'])){
		header('Location: ../home.php');
		die();
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Đăng Nhập</title>
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
    <link rel="stylesheet" href="../assest/font/fontawesome-free-5.15.4-web/css/all.min.css">
	
    
</head>

<body>
	<div class="container">
		<div class="panel panel-primary form-login" style="">
			<div class="panel-heading">
				<h2 class="text-center">Đăng Nhập Tài Khoản</h2>
			</div>
			<div class="panel-body">
				<form method="post">
                    <div class="form-group">
					  <label for="username">Tên đăng nhập:</label>
					  <input required="true" type="text" class="form-control" id="username" name="username">
					</div>
					<div class="form-group">
					  <label for="pwd">Mật Khẩu:</label>
					  <input required="true" type="password" class="form-control form-password" id="pwd" name="password" minlength="6">
					  <div class="icon-element">
							<i class="fas fa-eye see"></i>
							<i class="fas fa-eye-slash no-see" style="display: none"></i>
						</div>
					</div>
                    
					<p>
						<a href="register.php" style="color: #292931">Đăng ký tài khoản mới</a>
					</p>

					<p>
						<a href="forgetPassword.php" style="color: red; font-size: 16px">Quên Mật Khẩu ?</a>
					</p>

					<button class="btn btn-success" id="btn-login" disabled>Đăng Nhập</button>
				</form>
			</div>
			<?php
				if(isset($_POST['username'])){
					$username = $_POST['username'];
					if(isset($_POST['password'])){
						$password = $_POST['password'];
						$sql = "select users.* from users, role where users.role_id = role.id AND username = '$username' and password = '$password'";
						$result = $connect->query($sql);
						if($result->num_rows > 0){
							$user = $result->fetch_assoc();
							$_SESSION['user'] = $user;
							header('Location: ../home.php');
						}
						else{
							$msg = "Tài khoản hoặc mật khẩu không chính xác. Vui lòng kiểm tra lại";
						}
					}
				}
			?>
				<h5 style="color: red; margin-top: 8px;" class="text-center"><?php echo $msg ?></h5>
		</div>

	</div>
<style>
	body{
		background-image: url(https://sohanews.sohacdn.com/2018/10/1/429703988601793577050773128299984785506304n-1538391675410268783754.jpg); 
		background-size: cover; 
		background-repeat: no-repeat;
	}
	.form-login{
		width: 700px; 
		margin: 160px auto ; 
		padding: 10px; 
		border-radius: 5px; 
		box-shadow:0 0px 5px #000;
		color: #181817;
	}

	.form-login label{
		font-weight: 600;
	}

	.form-login input{
		background: transparent;
		border: 2px solid #f69b1d;
	}

	.form-password{
		position: relative;
		font-size: 18px;
		color: brown;
	}

	.see, .no-see{
		position: absolute;
    	top: 346px;
    	left: 70%;
	}

</style>
<script src = "./js./login.js"></script>
</body>
</html>