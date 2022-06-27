<?php
	require_once('../db/dbhelper.php');
    $email = $msg = '';
    if(isset($_POST['send'])){
        if(isset($_POST['email'])){
            $email = $_POST['email'];
            $sql = "select * from users where email = '$email'";
            $result = $connect->query($sql);
            if($result->num_rows > 0){
                $matKhauMoi = md5(rand(0,9999));
                $matKhauMoi = substr($matKhauMoi ,0 ,8);
                $sql = "update users set password = '$matKhauMoi' where email = '$email'";
                if($connect->query($sql) == true){
                    // $msg = "Đã cập nhập mật khẩu";
                   $kq = guiMatKhauMoi($email, $matKhauMoi);
                   if($kq == true){
                         $msg = "Đã cập nhập mật khẩu. Vui lòng kiểm tra Email để lấy mật khẩu mới";
                   }
                   else{
                    $msg = "Fail";
                   }
                }
            }
            else{
                $msg = "Email không tồn tại. Vui lòng nhập lại email";
            }
        }
    }
?>

<?php
    function guiMatKhauMoi($email, $matKhauMoi){
        require "PHPMailer-master/src/PHPMailer.php"; 
        require "PHPMailer-master/src/SMTP.php"; 
        require 'PHPMailer-master/src/Exception.php'; 
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true:enables exceptions
        try {
            $mail->SMTPDebug = 2; //0,1,2: chế độ debug
            $mail->isSMTP();  
            $mail->CharSet  = "utf-8";
            $mail->Host = 'smtp.gmail.com';  //SMTP servers
            $mail->SMTPAuth = true; // Enable authentication
            $mail->Username = 'duyngotxthhd@gmail.com'; // SMTP username
            $mail->Password = 'duyngo0908';   // SMTP password
            $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
            $mail->Port = 465;  // port to connect to                
            $mail->setFrom('duyngotxthhd@gmail.com', 'Duy'); 
            $mail->addAddress($email); 
            $mail->isHTML(true);  // Set email format to HTML
            $mail->Subject = 'Thư cấp lại mật khẩu';
            $noidungthu = "<p>Bạn nhận được thư này, do bạn hoặc ai đó yêu cầu mật khẩu mới từ
            Travelix của chúng tôi .Mật khẩu của bạn là {$matKhauMoi}</p>"; 
            $mail->Body = $noidungthu;
            $mail->smtpConnect( array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true
                )
            ));
            $mail->send();
            return true;
        } catch (Exception $e) {
           return false;
        }

    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Quên Mật Khẩu</title>
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
				<h2 class="text-center">Lấy Lại Mật Khẩu</h2>
		        <h5 style="color: red;" class="text-center"><?=$msg?></h5>
			</div>

			<div class="panel-body">
				<form method="post">
                    <div class="form-group">
					  <label for="email">Nhập Email Đã Đăng Ký Tài Khoản:</label>
					  <input required="true" type="email" class="form-control" id="email" name="email" value="<?php echo $email?>">
					</div>
					                  
					<p>
						<a href="login.php">Quay Lại</a>
					</p>

					<input type="submit" name="send" class="btn btn-success">
				</form>
			</div>

		</div>
	</div>
</body>
</html>