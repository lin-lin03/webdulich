<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style2.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php 
	include("permission.php");
	?>
	<title></title>
</head>
<body>
	
	<div class="titleOfTable"><h1 align="center">DANH SÁCH NHÂN VIÊN</h1></div>
	<h3><button id="button1"><a href="add_employees.php">Thêm mới nhân viên</a> </button></h3>
	<table id="abc" width="1150px" align="center" border="1 solid" cellpadding="5">
		<tr bgcolor="lightblue" style="font-size: 20px">
			<th class="listtour"  align="left">
				ID
			</th>
			<th class="listtour"  align="left">
				Tên NV
			</th>
			<th class="listtour"  align="left">
				CMND
			</th>
			<th class="listtour"  align="left">
				Địa chỉ
			</th>
			<th class="listtour"  align="left">
				Điện thoại 
			</th>
			<th class="listtour"  align="left">
				Chức vụ
			</th>
			<th class="listtour"  align="left">
				Ngày làm việc
			</th>
			<th class="listtour"  align="left">
				Ngày sinh
			</th>

			<th class="listtour"  align="left">
				Chức năng
			</th>
		</tr>
		<?php
			include("pagination_listemployees.php");
			while ($employee = mysqli_fetch_assoc($employees)){		
		?>
			<tr>
				<td><?php echo $employee['ID'] ?></td>
				<td><?php echo $employee['NAME'] ?></td>
				<td><?php echo $employee['IDCARD'] ?></td>
				<td><?php echo $employee['ADDRESS'] ?></td>
				<td><?php echo $employee['PHONENUMBER'] ?></td>
				<td><?php echo $employee['POSITION'] ?></td>
				<td><?php echo $employee['PART_DAY'] ?></td>
				<td><?php echo $employee['BIRTHDAY'] ?></td>

				
				
				<td>
				
					<button value="Xóa" class="btn btn-info" onclick="confDelete()">
						<a id="demo" href="delete_employee.php?id=<?php echo $employee['ID'] ?>">Xóa
						</a>
					</button>
					
					
				</td>
			</tr>
			<?php 
		}
		?>
	</table>
	<div id="pagination" align="center" style="color: black">
		<?php
		
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG

            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
		if ($current_page > 1 && $total_page > 1){
			echo '<a style="color:black" href="admin.php?quanly=list_employees?page='.($current_page-1).'">Prev</a> | ';
		}

            // Lặp khoảng giữa
		for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
			if ($i == $current_page){
				echo '<span>'.$i.'</span> | ';
			}
			else{
				echo '<a style="color:black" href="admin.php?quanly=list_employees?page='.$i.'">'.$i.'</a> | ';
			}
		}

            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
		if ($current_page < $total_page && $total_page > 1){
			echo '<a style="color:black" href="admin.php?quanly=list_employees?page='.($current_page+1).'">Next</a> | ';
		}
		?>
	</div>			

	<script>
		function confDelete(){
			if(confirm("Bấm vào nút OK để tiếp tục"))
			{
				document.getElementById("demo").setAttribute('target','');
			}
			else
			{	
				document.getElementById("demo").setAttribute('href','admin.php?quanly=list_employees');
				alert("Xóa ko thành công!");
			}

		}
	</script>


</body>
</html>
