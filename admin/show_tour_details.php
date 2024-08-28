<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" type="text/css" href="style2.css">
<?php 
		$id= $_GET['id'];
		include("connect.php");
		$sql = "SELECT * FROM `thongtinchitiettour`where ID='$id'";
		$tours= $connect->query($sql);	
?>
	<?php 
	$id= $_GET['id'];
		include("connect.php");
	try{
		if(isset($_POST['btnsua']))
		{

				if(isset($_POST["txttentour1"]))
				{
					$ten=$_POST["txttentour1"];
				}
				if(isset($_POST['txtsonguoi1']))
				{
					$songuoi=$_POST['txtsonguoi1'];
				}
				if(isset($_POST['txtfileanh1']))
				{
					$fileanh=$_POST['txtfileanh1'];
				}
				if(isset($_POST['txtngaybd']))
				{
					$bd=$_POST['txtngaybd'];
				}
				if(isset($_POST['txtngaykt']))
				{
					$kt=$_POST['txtngaykt'];
				}
				if(isset($_POST['txtks']))
				{
					$ks=$_POST['txtks'];
				}
				if(isset($_POST['txtptien']))
				{
					$pt=$_POST['txtptien'];
				}
				if(isset($_POST['txtgiatreem']))
				{
					$treem=$_POST['txtgiatreem'];
				}
				if(isset($_POST['txtgianguoilon']))
				{
					$nglon=$_POST['txtgianguoilon'];
				}
				if(isset($_POST['txtchuongtrinhtour']))
				{
					$cttour=$_POST['txtchuongtrinhtour'];
				}
				$loai=$_POST['loaitour'];
		 		$sql="UPDATE tours
		 			 SET `NAME`='$ten',`KIND_TOUR`='$loai',`MAX_PEOPLE`='$songuoi',`IMAGE`='$fileanh' 
		 			 WHERE ID='$id'";
				$connect->exec($sql);

				$sql1="UPDATE `tour_details` 
					   SET `START`='$bd',`END`='$kt',`HOTEL_NAME`='$ks',`VEHICLE`='$pt',`CHILD_PRICE`='$treem',`ADULT_PRICE`='$nglon',`TOUR_PROGRAM`='$cttour' 
		 			   WHERE ID='$id'";
				$connect->exec($sql1);
				echo 'CẬP NHẬT THÀNH CÔNG !!';

}
}
	catch(PDOException $e)
	{
		echo $sql."<br>".$e->getMessage();
		header("location:list_qltourdl.php");
	}
?>

<body>
	<?php 
			include("navbar.php");
		?>
	<form method="post">
	<table id="abc" align="center" border="1px black solid">
		<tr align="center">
			<td colspan="2">CHI TIẾT TOURS</td>
		</tr>
		<tr>
			<td>Tên tour</td>
			<?php 

				foreach ($tours as $tour) 
				{
			?>
			<td><input type="text" name="txttentour1" size='42' value="<?php echo $tour['NAME']?>"></td>
		</tr>
		<tr>
			<td>Loại tour</td>
			<td>
				<select name="loaitour">
					<option value='Trong Nước'>Trong Nước</option>
					<option value='Tiết kiệm'>Tiết kiệm</option>
					<option value='Nước Ngoài'>Nước Ngoài</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Số người tối đa</td>
			<td><input type="number" name="txtsonguoi1" size='42' value="<?php echo $tour['MAX_PEOPLE']?>" min="1" max="20"></td>
		</tr>
		<tr>
			<td>Tên file ảnh</td>
			<td><input type="file" name="txtfileanh1" size='42'  value="<?php echo $tour['IMAGE']?>"></td>
		</tr>	
		</tr>
		<tr>
			<td>Ngày bắt đầu</td>
			<td><input type="text" name="txtngaybd" size='42' value="<?php echo $tour['START']?>"></td>
		</tr>
		<tr>
			<td>Ngày kết thúc</td>
			<td><input type="text" name="txtngaykt" size='42' value="<?php echo $tour['END']?>"></td>
		</tr>
		<tr>
			<td>Tên khách sạn</td>
			<td><input type="text" name="txtks" size='42' value="<?php echo $tour['HOTEL_NAME']?>"></td>
		</tr>
		<tr>
			<td>Phương tiện di chuyển</td>
			<td><input type="text" name="txtptien" size='42' value="<?php echo $tour['VEHICLE']?>"></td>
		</tr>
		<tr>
			<td>Giá trẻ em</td>
			<td><input type="text" name="txtgiatreem" size='42' value="<?php echo $tour['CHILD_PRICE']?>"></td>
		</tr>
		<tr>
			<td>Giá người lớn</td>
			<td><input type="text" name="txtgianguoilon" size='42' value="<?php echo $tour['ADULT_PRICE']?>"></td>
		</tr>
		<tr>
			<td>Chương trình tour</td>
			<td><input type="text" name="txtchuongtrinhtour" size='42' value="<?php echo $tour['TOUR_PROGRAM']?>"></td>
		</tr>
		<tr>
			<td>Xem trước ảnh</td>
			<td> <img src="images/<?php echo $tour['IMAGE'] ?>" width=300px height=150px></td>
		</tr>
		<tr align="center">
			<td colspan="2">
				<button id="button1"><a href="admin.php?quanly=list_qltourdl">Quay về danh sách tour</a></button>
				<input type="submit" name='btnsua'value='Chỉnh sửa' id="button1">
			</td>
		</tr>
		<?php } ?>
	</table>
</form>
</body>
</html>