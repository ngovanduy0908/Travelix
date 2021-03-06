<?php
    session_start();
	require_once('../../db/dbhelper.php');
    // $user_id = $_SESSION['user']['id'];
    // echo $user_id;
    // exit;
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

        .contact-form{
            border: 1px solid #560764;
            width: 400px;
            border: 2px solid #560764;
            padding: 10px 15px;
        }
    </style>
</head>
<body>
    <div class="main">
        <nav class="main_nav">
            <div class="row">
                <div class="col-md-4">
                    <a href="../../home.php">
                        <button class="btn btn-warning" style="font-weight: bold">Quay L???i Giao Di???n</button>
                    </a>
                </div>
                <div class="col-md-4">
                    <h1 style="text-align: center">Manager Contact</h1>
                </div>
                <div class="col-md-4">
                    <a href="../../loginRes/logout.php" style="float: right">
                        <button class="btn btn-danger">????ng Xu???t</button>
                    </a>
                </div>
            </div>
        </nav>
        <div class="main_body">
            <div class="row">
                <div class="col-md-2" style="border-right: 1px dashed #000">
                    <ul class="main_body_list">
                        <li>
                            <a href="../index.php">Trang Ch???</a>
                        </li>
                    
                        <li>
                            <a href="../user/index.php">Qu???n L?? Ng?????i D??ng</a>
                        </li>

                        <li>
                            <a href="../places/index.php">Qu???n L?? ?????a ??i???m</a>
                        </li>

                        <li>
                            <a href="../hotels/index.php">Qu???n L?? Kh??ch S???n</a>
                        </li>

                        <li>
                            <a href="#">Qu???n L?? Li??n L???c</a>
                        </li>

                        <li>
                            <a href="../feedback/index.php">Qu???n L?? Ph???n H???i</a>
                        </li>

                        <li>
                            <a href="../ticket/ticketAdmin.php">Qu???n L?? V??</a>
                        </li>

                        <li>
                            <a href="../book/index.php">T???ng Doanh Thu</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-10">
		            <!-- <a href="add.php"><button class="btn btn-success" style="margin: 20px 0">Th??m Kh??ch S???n</button></a> -->
                    <span style="width: 600px; display:inline-block; float: right; margin: 20px 50px 10px 0">
                        <form action="" method="post" class="contact-form">
                            
                            <div class="form-group">
                                <label for="choseYes">L???c li??n l???c ???? xem</label>
                                <input type="radio" name="checkStatus" id="choseYes" value="yes">
                            </div>
                            <div class="form-group">
                                <label for="choseNo">L???c li??n l???c ???? ch??a xem</label>
                                <input type="radio" name="checkStatus" id="choseNo" value="no">
                            </div>
                            <input type="submit" name="search" value="T??m">
                        </form>
                    </span>
                 
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width = 30px>STT</th>
                                <th>H???</th>
                                <th>T??n</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Subject</th>
                                <th>Note</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $msg = "";
                                if(isset($_POST['search'])){
                                    
                                    if(isset($_POST['checkStatus']) && $_POST['checkStatus'] == 'yes'){ 
                                        $sql = "SELECT * from contact where status = 1";
                                    }
                                    if(isset($_POST['checkStatus']) && $_POST['checkStatus'] == 'no'){ 
                                        $sql = "SELECT * from contact where status = 0";
                                    }
                                    
                                    $contact = $connect->query($sql);
                                    if($contact->num_rows > 0){
                                        $index = 0;
                                        while($row = $contact->fetch_assoc()){
                                            // var_dump($row['hotel_id']);
                                            $status = $row['status'];
                                            // var_dump($hotel_id);
                                            echo '<tr>
                                            <th>'.(++$index).'</th>
                                            <td>'.$row['firstname'].'</td>
                                            <td>'.$row['lastname'].'</td>
                                            <td>'.$row['email'].'</td>
                                            <td>'.$row['phone_number'].'</td>
                                            <td>'.$row['subject'].'</td>
                                            <td>'.$row['note'].'</td>';
                                            if($status == 0){
                                                echo '
                                                <td>
                                                    <a href="change.php?id='.$row['id'].'"><button class="btn btn-warning">Ch??a xem</button></a>
                                                </td>
                                                ';
                                            }
                                            else{
                                                echo '
                                                <td>
                                                    <button class="btn btn-success">???? xem</button>
                                                </td>
                                                ';
                                            }
                                            
                                            echo '                                          
                                            <td style="width: 50px">
                                                <a href="delete.php?id='.$row['id'].'"><button class="btn btn-danger">X??a</button></a>
                                            </td>
                                        </tr>';
                                        }
                                        }
                                        else{
                                            $msg = "Kh??ng c?? li??n l???c n??o";
                                        }
                                    }
                                
                                else{
                                    $msg = "";
                                    $sql = "SELECT * from contact  order by status asc, created_at desc";
                                    $contact = $connect->query($sql); 
                                    if($contact->num_rows > 0){
                                        $index = 0;
                                        while($row = $contact->fetch_assoc()){
                                            // var_dump($row['id']);
                                            // exit;
                                            $status = $row['status'];
                                            // var_dump($hotel_id);
                                            echo '<tr>
                                            <th>'.(++$index).'</th>
                                            <td>'.$row['firstname'].'</td>
                                            <td>'.$row['lastname'].'</td>
                                            <td>'.$row['email'].'</td>
                                            <td>'.$row['phone_number'].'</td>
                                            <td>'.$row['subject'].'</td>
                                            <td>'.$row['note'].'</td>';
                                            if($status == 0){
                                                echo '
                                                <td>
                                                    <a href="change.php?id='.$row['id'].'"><button class="btn btn-warning">Ch??a xem</button></a>
                                                </td>
                                                ';
                                            }
                                            else{
                                                echo '
                                                <td>
                                                    <button class="btn btn-success">???? xem</button>
                                                </td>
                                                ';
                                            }
                                            
                                            echo '                                          
                                            <td style="width: 50px">
                                                <a href="delete.php?id='.$row['id'].'"><button class="btn btn-danger">X??a</button></a>
                                            </td>
                                        </tr>';
                                        }
                                        // exit;
                                    }
                                    else{
                                        $msg = "Kh??ng c?? li??n l???c n??o";
                                    }
                                }
                             
                                
                            ?>
                        </tbody>
                        
                    </table>

                    <a href="change.php"><button class="btn btn-warning">????nh d???u t???t c??? ???? ?????c</button></a>
                    <a href="delete.php"><button class="btn btn-warning">X??a T???t C???</button></a>
                    <h4 style="color: red;text-align:center" class=""><?=$msg?></h4>

                </div>
<?php
$connect->close();
?>
            </div>
        </div>
    </div>
</body>
</html>
