<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style2.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="vendor/bootstrap.css">
	<link rel="stylesheet" href="vendor/angular-material.min.css">
	<link rel="stylesheet" href="vendor/font-awesome.css">
	<link rel="stylesheet" href="2.css"> 


	<?php
	 include("connect.php");
	// $sql="SELECT * FROM `tours` ORDER BY KIND_TOUR DESC";
	// $tours=$connect->query($sql);
	?>

	<title></title>
</head>
<body ng-app="myApp" ng-controller="MyController">
<?php 
			include("navbar.php");
		?>
	<br>
	<div class="titleOfTable"><h1 align="center">DANH SÁCH TOUR</h1></div>
	<br>
	<!-- <h3 ><button ><a href="add_tour.php" style="color: black"></a></button></h3> -->
	<h3 align="center"><button class="btn btn-info"><a href="add_tour.php" style="color:black">Thêm mới tour du lịch</a></button></h3>
	<br>
	<table id="abc" width="1000px" align="center" border="1 solid" cellpadding="5">
		<tr bgcolor="lightblue" style="font-size: 20px">
			<th class="listtour" width="15%" align="left">
				ID tour
			</th>
			<th class="listtour" width="15%" align="left">
				Loại tour
			</th>
			<th class="listtour" width="30%" align="left">
				Tên tour
			</th>
			<th class="listtour" width="10%" align="left">
				Số người tối đa
			</th>
			<th class="listtour" width="12%" align="left">
				Hình ảnh 
			</th>
			<th class="listtour" width="35%" align="left" >
				Chức năng
			</td>
		</tr>
		<?php
		 	include("pagination_listtour.php");
			while ($row = mysqli_fetch_assoc($tours)){
				?>
			<tr>
				<td align="center"><?php echo $row['ID'] ?></td>
				<td align="center"><?php echo $row['KIND_TOUR']?></td>
				<td><?php echo $row['NAME']?></td>
				<td align="center"><?php echo $row['MAX_PEOPLE'] ?></td>
				<td align="center"><?php echo $row['IMAGE'] ?></td>
				<td align="center">
					<button type="button" class="btn btn-danger" ><a href="show_tour_details.php?id=<?php echo $row['ID'] ?>" style="color: black">Chi tiết</a></button>

					<a id="demo" href="delete_tour.php?id=<?php echo $row['ID'] ?>"><input type="button" value="Xóa" class="btn btn-info" onclick="confDelete()"></a>
				</td>
			</tr>			
			<?php 
		}
		?>
		<!-- phân trang -->
		
		<script>
			function confDelete(){
				if(confirm("Bấm vào nút OK để tiếp tục"))
				{
					document.getElementById("demo").setAttribute('target','');
				}
				else
				{	
					document.getElementById("demo").setAttribute('href','list_qltourdl.php');
					alert("Xóa ko thành công!");
				}
			}
		</script>

	</table>
	<br><br>
	<div id="pagination" align="center" style="color: black">
		<?php
		
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG

            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
		if ($current_page > 1 && $total_page > 1){
			echo '<a style="color:black" href="list_qltourdl.php?page='.($current_page-1).'">Prev</a> | ';
		}

            // Lặp khoảng giữa
		for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
			if ($i == $current_page){
				echo '<span>'.$i.'</span> | ';
			}
			else{
				echo '<a style="color:black" href="list_qltourdl.php?page='.$i.'">'.$i.'</a> | ';
			}
		}

            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
		if ($current_page < $total_page && $total_page > 1){
			echo '<a style="color:black" href="list_qltourdl.php?page='.($current_page+1).'">Next</a> | ';
		}
		?>
	</div>	
	<br>		



	<script type="text/javascript" src="vendor/bootstrap.js"></script>  
	<script type="text/javascript" src="vendor/angular-1.5.min.js"></script>  
	<script type="text/javascript" src="vendor/angular-animate.min.js"></script>
	<script type="text/javascript" src="vendor/angular-aria.min.js"></script>
	<script type="text/javascript" src="vendor/angular-messages.min.js"></script>
	<script type="text/javascript" src="vendor/angular-material.min.js"></script>  
	<script type="text/javascript" src="1.js"></script>
</body>
</html>