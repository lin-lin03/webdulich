<!DOCTYPE html>
<html>

<head>
	<title></title>
</head>
<link rel="stylesheet" type="text/css" href="style2.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="vendor/bootstrap.css">
<link rel="stylesheet" href="vendor/angular-material.min.css">
<link rel="stylesheet" href="vendor/font-awesome.css">

<?php session_start(); ?>

<?php
include("connect.php");

$manv = ''; // Khởi tạo biến để tránh lỗi undefined variable

if (isset($_SESSION['username']) && $_SESSION['username']) {
	$manv = $_SESSION['username'];
}

$show = "SELECT * FROM `employees` WHERE ID = :manv";
$stmt = $connect->prepare($show);
$stmt->execute([':manv' => $manv]);
$infoes = $stmt->fetchAll(PDO::FETCH_ASSOC); // Lấy tất cả kết quả dưới dạng mảng kết hợp
?>

<?php

foreach ($infoes as $info) {
	?>

	<body>
		<form method="post">
			<table id="abc">
				<tr align="center">
					<h2>
						<td colspan="2">THÔNG TIN NHÂN VIÊN</td>
					</h2>
				</tr>
				<tr>
					<td>Tên nhân viên</td>
					<td><input type="text" name="txttennv" value="<?php echo $info['NAME'] ?>"></td>
				</tr>
				<tr>
					<td>CMND</td>
					<td><input type="text" name="txtcmndnv" value="<?php echo $info['IDCARD'] ?>"></td>
				</tr>
				<tr>
					<td>Địa chỉ</td>
					<td><input type="text" name="txtdcnv" value="<?php echo $info['ADDRESS'] ?>"></td>
				</tr>
				<tr>
					<td>Điện thoại</td>
					<td><input type="tel" name="txtsdtnv" value="<?php echo $info['PHONENUMBER'] ?>"></td>
				</tr>
				<tr>
					<td>Ngày vào làm</td>
					<td><input type="date" name="nvl" value="<?php echo $info['PART_DAY'] ?>"></td>
				</tr>
				<tr>
					<td>Ngày sinh</td>
					<td><input type="date" name="ns" value="<?php echo $info['BIRTHDAY'] ?>"></td>
				</tr>
			<?php
}
?>
			<tr align="center">

				<td colspan="2">
					<button class="btn btn-info"><a href="change_password.php">Đổi mật khẩu</a></button>
					<input class="btn btn-info" type="submit" name="chinhsua" value="Chỉnh Sửa">
					<button class="btn btn-info"><a href="admin.php">Quay về trang chủ</a></button>
				</td>
			</tr>
		</table>
		<?php
		if (isset($_POST['chinhsua'])) {
			if (!is_numeric($_POST['txtcmndnv'])) { ?>
				<script> alert("chứng minh nhân dân phải là chuỗi số !"); </script>
				<?php
			} else {
				if (!is_numeric($_POST['txtsdtnv'])) { ?>
					<script> alert("số điện thoại phải là chuỗi số !"); </script>
					<?php
				} else {
					$ten = $_POST['txttennv'];
					$cmnd = $_POST['txtcmndnv'];
					$dchi = $_POST['txtdcnv'];
					$sdt = $_POST['txtsdtnv'];
					$nvl = $_POST['nvl'];
					$ns = $_POST['ns'];

					$sql = "UPDATE employees Set NAME='$ten', IDCARD='$cmnd', ADDRESS='$dchi', PHONENUMBER='$sdt', PART_DAY='$nvl', BIRTHDAY='$ns' where ID='$manv'";
					$connect->query($sql);
					?>
					<script> alert("Chỉnh sửa thành công !"); </script>
					<?php
				}
			}
		}
		?>
	</form>
</body>

</html>