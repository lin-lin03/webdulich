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
<?php 
		session_start();
		if (isset($_SESSION['username']) && $_SESSION['username'])
		{
			$id=$_SESSION['username'];
		}
		include("connect.php");
	 	error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
		if(isset($_POST['hoantat']))
		{
			$info='Đổi mặt khẩu thành công';
			$flag=1;
			if(isset($_POST["txtoldpass"]))
			{
				$old_pass=$_POST["txtoldpass"];
			}

			if(isset($_POST['txtnewpass']))
			{
				$new_pass=$_POST['txtnewpass'];
			}

			if(isset($_POST['txtconfirmpass']))
			{
				$confirm_pass=$_POST['txtconfirmpass'];
			}

			$sql="select*FROM `login` where ID='$id'";
			$vara=$connect->query($sql);

			foreach($vara as $a)
			{
				$pass_csdl=$a['PASSWORD'];
			}

			if($old_pass != $pass_csdl)
			{
				$info= "Mật khẩu hiện tại không đúng";
				$flag = 0;
			}
			
			if($new_pass != $confirm_pass)
			{
				$info="Xác nhận mật khẩu không khớp với mật khẩu mới !!!";
				$flag=0;
			}
			if($flag==1)
			{
				$sql1="UPDATE `login` SET `PASSWORD`='$new_pass' WHERE ID='$id'";
				$connect->query($sql1);
				$info="Mật khẩu của bạn đã được đổi";
			}
			else
			{
				$info="Đã xảy ra lỗi !! Vui lòng thử lại";
			}		
				echo $info;
			}

	?>
	
<body ng-app="myApp" ng-controller="MyController" background="images/nen_login.jpg">
		<div class="overlay" style="" ng-show="display">
		<div class="login-wrapper">
			<div class="login-content">
				<a href="index.php" class="close">x</a>
				<h3>Đổi mật khẩu</h3>
				<form method="post" action="change_password.php" >
					<label for="username">
						Password cũ
						<input type="password" name="txtoldpass" id="password" placeholder="Mật khẩu phải viết hoa 1 kí tự đầu, có số và chữ"  required="required" />
					</label>
					<label for="password">
						Password mới
						<input type="password" name="txtnewpass" id="password" placeholder="Mật khẩu phải viết hoa 1 kí tự đầu, có số và chữ"  required="required" />
					</label>
					<label for="password">
						Confirm Password 
						<input type="password" name="txtconfirmpass" id="password" placeholder="Mật khẩu phải viết hoa 1 kí tự đầu, có số và chữ"  required="required" />
					</label>
				
						<input type="submit" class="btn btn-danger" name="hoantat" value="Hoàn tất"></input>	
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