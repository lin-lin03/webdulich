<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
	<link rel="stylesheet" type="text/css" href="style2.css">
	<link rel="stylesheet" href="vendor/bootstrap.css">
	<link rel="stylesheet" href="vendor/angular-material.min.css">
	<link rel="stylesheet" href="vendor/font-awesome.css">
	<link rel="stylesheet" href="2.css"> 	
<body>
	<?php 
		include("connect.php");
	 	error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
		if(isset($_POST['btnok']))
		{
			if(!is_numeric($_POST['txtcmndnv']))
			{?>
				  <script> alert("chứng minh nhân dân phải là chuỗi số !"); </script>
			<?php
			}
			else{
				if(!is_numeric($_POST['txtsdtnv']))
					{?>
						  <script> alert("số điện thoại phải là chuỗi số !"); </script>
					<?php
					}
				else{
			if(isset($_POST["txttennv"]))
			{
				$ten=$_POST["txttennv"];
			}

			if(isset($_POST['txtcmndnv']))
			{
				$cmnd=$_POST['txtcmndnv'];
			}

			if(isset($_POST['txtdcnv']))
			{
				$dchi=$_POST['txtdcnv'];
			}

			if(isset($_POST['txtsdtnv']))
			{
				$sdt=$_POST['txtsdtnv'];
			}

			if(isset($_POST['chucvu']))
			{
				$chucvu=$_POST['chucvu'];
			}

			if(isset($_POST['ngayvl']))
			{
				$nvl=$_POST['ngayvl'];
			}

			if(isset($_POST['ns']))
			{
				$ns=$_POST['ns'];
			}

			$sql="INSERT INTO `employees`(`NAME`, `IDCARD`, `ADDRESS`, `PHONENUMBER`, `POSITION`, `PART_DAY`, `BIRTHDAY`) 
				  VALUES ('$ten','$cmnd','$dchi','$sdt','$chucvu','$nvl','$ns')";
			$connect->query($sql);
	 		
			?>
				<script> alert("Thêm nhân viên thành công !"); </script>
			<?php
			}
			}	
		}
	?>
	<form method="post">
	<table align="center" border="1px black solid" id="abc">
		<tr align="center">
			<td colspan="2"><h3 style="color: red">THÊM NHÂN VIÊN</h3></td>
		</tr>
		<tr>
			<td>Tên nhân viên</td>
			<td><input type="text" name="txttennv" required="required"></td>
		</tr>
		<tr>
			<td>CMND</td>
			<td><input type="text" name="txtcmndnv" required="required"></td>
		</tr>
		<tr>
			<td>Địa chỉ</td>
			<td><input type="text" name="txtdcnv" required="required"></td>
		</tr>
		<tr>
			<td>Điện thoại</td>
			<td><input type="tel" name="txtsdtnv" required="required" ></td>
		</tr>
		<tr>
			<td>Chức vụ</td>
			<td>
				<input type="radio" name="chucvu" value="Manager">Quản Lý
				<input type="radio" name="chucvu" value="Employee" checked="checked">Nhân Viên
			<!-- 	<input type="radio" name="chucvu" value="Driver" checked="checked">Tài Xế
				<input type="radio" name="chucvu" value="TourGaide" checked="checked">Hướng Dẫn Viên -->
			</td>
		</tr>
		<tr>
			<td>Ngày làm việc</td>
			<td><input type="date" name="ngayvl" required="required"></td>
		</tr>
		<tr>
			<td>Ngày sinh</td>
			<td><input type="date" name="ns" required="required"></td>
		</tr>
		<tr align="center">

			<td colspan="2">
				<button class="btn btn-info"><a href="admin.php?quanly=list_employees" style="text-decoration:none" >Trở về</a></button>
				<input type="submit" name="btnok" value="Thêm" class="btn btn-info">
				
			</td>
		</tr>

	</table>
	</form>
</body>
</html>