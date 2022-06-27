<?php
    session_start();
	require_once('../db/dbhelper.php');
    $username = $password = $msg = $id = '';
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
    
</head>
<body>
	<div class="container">
		<div class="panel panel-primary" style="width: 760px; margin: 0px auto; margin-top: 50px; background-color: #ccc; padding: 10px; border-radius: 5px; box-shadow:0 5px 5px 5px #9ac9f5;">
			<div class="panel-heading">
				<h2 class="text-center">Đổi Mật Khẩu</h2>
			</div>
			<div class="panel-body">
				<form method="post">
                    <div class="form-group">
					  <label for="passwordOld">Nhập Mật Khẩu Cũ:</label>
					  <input required="true" type="password" class="form-control" id="passwordOld" name="passwordOld">
					</div>
					<div class="form-group">
					  <label for="passwordNew">Mật Khẩu Mới:</label>
					  <input required="true" type="password" class="form-control" id="passwordNew" name="passwordNew" minlength="6">
					</div>
                
					<p>
						<a href="../home.php">Quay Lại</a>
					</p>
					
					<!-- <button class="btn btn-success">Đăng Nhập</button> -->
                    <input type="submit" class="btn btn-success" value="Gửi" name="change">
				</form>
			</div>
			<?php
				if(isset($_POST['change'])){
                    if(isset($_POST['passwordOld']) && isset($_POST['passwordNew'])){
                        $pswOld = $_POST['passwordOld'];
                        $pswNew = $_POST['passwordNew'];
						$id = $_SESSION['user']['id'];
						// echo $id;
						// exit;
                        $sql = "select * from users where password = '$pswOld' and id = $id";
                        $user = $connect->query($sql);
						// print_r($user->num_rows);
						// exit;
                        if($user->num_rows > 0){
                            $sql = "update users set password = '$pswNew' where id = $id";
							if($connect->query($sql) == true){	
								$msg = "Bạn đã đổi mật khẩu thành công.
								<a href='login.php'>Truy cập trang Web tại đây</a>
								";
							}
							else{
								echo $connect->error;
							}
                        }
						else{
							$msg = "Mật khẩu cũ không đúng. Vui lòng kiểm tra lại";
						}
                    }

                }
			?>
				<h5 style="color: red;" class="text-center"><?=$msg?></h5>
		</div>
	</div>

</body>
</html>