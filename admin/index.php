<!DOCTYPE html>
<html lang="en"  >
<head>
	<title> Document  </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 	
	<link rel="stylesheet" href="vendor/bootstrap.css">
	<link rel="stylesheet" href="vendor/angular-material.min.css">
	<link rel="stylesheet" href="vendor/font-awesome.css">
	<link rel="stylesheet" href="2.css">
</head>
<body ng-app="myApp" ng-controller="MyController" background="images/nen_login.jpg">
<?php
//Khai báo sử dụng session
session_start();
 
//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');
 
//Xử lý đăng nhập
if (isset($_POST['dangnhap'])) 
{

    $connect = mysqli_connect("localhost", "root", "", "webdulich");

	// ktra connect
	if (!$connect) {
	    die("Connection failed: " . mysqli_connect_error());
	}


    //Lấy dữ liệu nhập vào tu input
    $username = addslashes($_POST['txtUsername']);
    $password = addslashes($_POST['txtPassword']);
     
    //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
    if (!$username || !$password) {
        echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại đăng nhập!</a>";
        exit;
    }    
     
    //Kiểm tra tên đăng nhập có tồn tại không
    $query = mysqli_query($connect,"SELECT ID, PASSWORD,POSITION FROM login WHERE ID='$username' and PASSWORD='$password'");
    if (mysqli_num_rows($query) == 0) {
        echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại đăng nhập!</a>";
        exit;
    }
     
    //Lấy mật khẩu trong database ra
    $row = mysqli_fetch_array($query);
     
    //So sánh 2 mật khẩu có trùng khớp hay không
    if ($password != $row['PASSWORD']) {
        echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại đăng nhập!</a>";
        exit;
    }
     
    //Lưu tên đăng nhập
    $_SESSION['username'] = $username;
    $_SESSION['position'] = $row['POSITION'];
     header("location:admin.php");
    die();
}
?>
	<div class="overlay" style="" ng-show="display">
		<div class="login-wrapper">
			<div class="login-content">
				<a href="index.php" class="close">x</a>
				<h3>Đăng nhập hệ thống</h3>
				<form method="post" action="index.php" >
					<label for="username">
						Tài Khoản
						<input type="text" name="txtUsername" id="username" placeholder="Trên 6 ký tự"  required="required" />
					</label>
					<label for="password">
						Mật khẩu
						<input type="password" name="txtPassword" id="password" placeholder="Mật khẩu phải viết hoa 1 kí tự đầu, có số và chữ"  required="required" />
					</label>
						<?php 
						 ?>
						<input type="submit" class="btn btn-danger" name="dangnhap" value="Đăng nhập" ></input>
					</form>

				</div>
			</div>
		</div>

	
		<script type="text/javascript" src="vendor/bootstrap.js"></script>  
		<script type="text/javascript" src="vendor/angular-1.5.min.js"></script>  
		<script type="text/javascript" src="vendor/angular-animate.min.js"></script>
		<script type="text/javascript" src="vendor/angular-aria.min.js"></script>
		<script type="text/javascript" src="vendor/angular-messages.min.js"></script>
		<script type="text/javascript" src="vendor/angular-material.min.js"></script>  
		<script type="text/javascript" src="2.js"></script>
	</body>
	</html>