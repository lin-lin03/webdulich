<!DOCTYPE html>
<html>

<head>
	<title>dulich.vn | Chuyến đi tiên cảnh</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="vendor/bootstrap.css">
	<link rel="stylesheet" href="vendor/angular-material.min.css">
	<link rel="stylesheet" href="vendor/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/1.css">
	<link rel="stylesheet" type="text/css" href="css/default.css" />
	<link rel="stylesheet" type="text/css" href="css/component.css" />
	<link rel="stylesheet" type="text/css" href="css/dangkytour.css" />
	<script src="js/modernizr.custom.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">


	<style>
		a {
			text-decoration: none;
		}

		.btn-info {
			background-color: #222;
			border-color: #222;

		}

		.btn-info:hover {
			background-color: grey;
			border-color: grey;
		}

		.dktx a{
			color: #222;
		}
	</style>
</head>

<?php
session_start();
include("connect.php");

error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

if (isset($_GET['idtour']) && !empty($_GET['idtour'])) {
	// Thêm vào session
	$id5 = $_GET['idtour'];
	$_SESSION['chon_ck' . $id5] = $id5;

}
//print_r($_SESSION);	 

//Khai báo giá trị ban đầu, nếu không có thì khi chưa submit câu lệnh insert sẽ báo lỗi
$tenkh = "";
$cmnd = "";
$dchi = "";
$ns = "";
$sdt = "";
$email = "";

//Lấy giá trị POST từ form vừa submit
if (isset($_POST['btndattour'])) {
	if (!is_numeric($_POST['txtcmnd'])) { ?>
		<script> alert("chứng minh nhân dân phải là chuỗi số !"); </script>
		<?php
	} else {
		if (!is_numeric($_POST['txtsdt'])) { ?>
			<script> alert("số điện thoại phải là chuỗi số !"); </script>
			<?php
		} else {
			if (isset($_POST["txttenkh"])) {
				$tenkh = $_POST['txttenkh'];
			}
			if (isset($_POST["txtcmnd"])) {
				$cmnd = $_POST['txtcmnd'];
			}
			if (isset($_POST["txtdiachi"])) {
				$dchi = $_POST['txtdiachi'];
			}
			if (isset($_POST["txtns"])) {
				$ns = $_POST['txtns'];
			}
			if (isset($_POST["txtsdt"])) {
				$sdt = $_POST['txtsdt'];
			}
			if (isset($_POST["txtemail"])) {
				$email = $_POST['txtemail'];
			}
			if (isset($_POST["txtslnguoilon"])) {
				$nglon = $_POST['txtslnguoilon'];
			}
			if (isset($_POST["txtsltreem"])) {
				$treem = $_POST['txtsltreem'];
			}

			//Code xử lý, insert dữ liệu vào table customers
			$sql3 = "select * from customers where IDCARD='$cmnd'";
			$query0 = $connect->query($sql3);
			$num_row = $query0->rowcount();
			//echo "</br>".$num_row."</br>";
			if ($num_row < 1) {

				$sql = "INSERT INTO `customers`(`NAME`, `IDCARD`, `ADDRESS`, `PHONENUMBER`, `BIRTHDAY`, `EMAIL`) 
					VALUES ('$tenkh','$cmnd','$dchi','$sdt','$ns','$email')";
				if ($connect->query($sql) == TRUE) {
					//echo "Thêm dữ liệu thành công"."<br>";
				} else {
					echo "Error";
				}

			}
			$_SESSION['cmnd_' . $cmnd] = $cmnd;
			//đẩy qua trang cuối dựa vào tenkh vs cmnd để show thong tin khách trang cuối

			//thêm dữ liệu vào bảng order
			foreach ($_SESSION as $key1 => $val) {
				$id1 = substr($key1, 0, 5);
				if ($id1 == 'chon_') {
					$sql1 = "SELECT CHILD_PRICE, ADULT_PRICE FROM `tour_details` WHERE ID = :tour_id";
					$stmt1 = $connect->prepare($sql1);
					$stmt1->execute([':tour_id' => $val]);
					$stmt1->setFetchMode(PDO::FETCH_ASSOC); // Set the fetch mode here
					$tien = $stmt1->fetch(); // Remove the argument

					if ($tien) {
						$child = $tien['CHILD_PRICE'];
						$adult = $tien['ADULT_PRICE'];

						// Calculate total price
						$ttnglon = $adult * $nglon;
						$tttreem = $child * $treem;
						$total = $ttnglon + $tttreem;

						// Insert data into orders table
						$sql2 = "INSERT INTO `orders` (`TOUR_ID`, `IDCARD`, `CHILDS_AMOUNT`, `ADULTS_AMOUNT`, `TOTAL`)
							 VALUES (:tour_id, :idcard, :childs_amount, :adults_amount, :total)";
						$stmt2 = $connect->prepare($sql2);
						$stmt2->execute([
							':tour_id' => $val,
							':idcard' => $cmnd,
							':childs_amount' => $treem,
							':adults_amount' => $nglon,
							':total' => $total
						]);

						// Retrieve the last inserted ID
						$lastInsertId = $connect->lastInsertId();
						$_SESSION['idcuoi_' . $val] = $lastInsertId;
					} else {
						echo "Error fetching tour details.";
					}
				}
			}

		}
	}
}
//Đóng database	
$connect = null;
?>

<body>
	<form name="dangki" action="dangkitour.php" method="post">
		<div class="container menu">
			<div class="main">
				<nav id="ttw-hrmenu" class="ttw-hrmenu">
					<ul class="dktx">
							<a href="index.php">Trang chủ</a>
					</ul>

				</nav>
			</div>
		</div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="js/ttwHorizontalMenu.min.js"></script>
		<script>
			$(function () {
				ttwHorizontalMenu.init();
			});
		</script>
		<br><br>

		<div class="container img" align="center">
			<img src="https://scontent.fhan3-1.fna.fbcdn.net/v/t1.15752-9/103268293_575964620015002_2296907058995533067_n.jpg?_nc_cat=111&_nc_sid=b96e70&_nc_ohc=9otPYzzWbIMAX9m7EpF&_nc_ht=scontent.fhan3-1.fna&oh=3a391e2f67c5ff488b6eb3dbc202d26f&oe=5F02198B"
				alt="" width="720px">
		</div>
		<br>

		<div class="container dangkitour">
			<div>
				<div id="khung">THÔNG TIN LIÊN LẠC</div>
				<div id="khung_dienthongtin">
					<table id="thongtinll" align="center" width="1100px" cellpadding="15px" cellspacing="15px">
						<tr>
							<td width="10%"></td>
							<td height="60px">Tên khách hàng:</td>
							<td height="60px"><input type="text" name="txttenkh" size="70px" required="required"></td>
						</tr>
						<tr>
							<td width="10%"></td>
							<td height="60px">Chứng minh nhân dân:</td>
							<td height="60px"><input type="text" name="txtcmnd" size="70px" required="required"></td>
						</tr>
						<tr>
							<td width="10%"></td>
							<td height="60px">Địa chỉ:</td>
							<td height="60px"><input type="text" name="txtdiachi" size="70px" required="required"></td>
						</tr>
						<tr>
							<td width="10%"></td>
							<td height="60px">Số điện thoại:</td>
							<td height="60px"><input type="tel" name="txtsdt" size="70px" required="required"></td>
						</tr>
						<tr>
							<td width="10%"></td>
							<td height="60px">Ngày sinh:</td>
							<td height="60px"><input type="date" name="txtns" size="70px" required="required"></td>
						</tr>
						<tr>
							<td width="10%"></td>
							<td height="60px">Email:</td>
							<td height="60px"><input type="email" name="txtemail" size="70px" required="required"></td>
						</tr>
						<tr>
							<td width="10%"></td>
							<td height="60px" width="110px">Số người lớn</td>
							<td height="60px" width="110px"><input type="number" name="txtslnguoilon" min="1" max="20"
									value="1"></td>
							<!-- <td><input type="submit" name="btnthemdk" value="Thêm khung đăng kí"></td> -->
						</tr>
						<td width="10%"></td>
						<td height="60px">Số trẻ em</td>
						<td height="60px" width="110px"><input type="number" name="txtsltreem" min="0" value="0"></td>

					</table>
					<br>

					<p align="center"><input onclick="alert('Vui lòng qua bước tiếp theo')" class="btn btn-info"
							type="submit" name="btndattour" value="Xác Nhận Thông Tin" size="20px"></p>

					<p align="center">
						<button class="btn btn-info"><a href="cart.php?test='true'">Bước Trước</a></button>
						<button class="btn btn-info"><a href="success.php?test='true'">Bước Tiếp Theo</a></button>
					</p>

					</<br>

				</div>
			</div>
		</div>
	</form>

	<script type="text/javascript" src="vendor/bootstrap.js"></script>
	<script type="text/javascript" src="vendor/angular-1.5.min.js"></script>
	<script type="text/javascript" src="vendor/angular-animate.min.js"></script>
	<script type="text/javascript" src="vendor/angular-aria.min.js"></script>
	<script type="text/javascript" src="vendor/angular-messages.min.js"></script>
	<script type="text/javascript" src="vendor/angular-material.min.js"></script>
	<script type="text/javascript" src="js/1.js"></script>
</body>

</html>