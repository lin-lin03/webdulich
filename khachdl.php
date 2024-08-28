<!DOCTYPE html>
<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="user/vendor/bootstrap.css">
    <link rel="stylesheet" href="user/vendor/angular-material.min.css">
    <link rel="stylesheet" href="user/vendor/font-awesome.css">
    <link rel="stylesheet" href="user/2.css">

	<style>
		a {
			text-decoration: none;
		}

		

		.dktx a{
			color: #222;
		}
	</style>
    <?php
    include("connect.php");
    $sql = "SELECT * FROM `customers`";
    $customers = $connect->query($sql);
    ?>
    <link rel="stylesheet" type="text/css" href="style2.css">
    <title></title>
</head>

<body>

    <div class="container menu">
        <div class="main">
            <nav id="ttw-hrmenu" class="ttw-hrmenu">
                <ul class="dktx">
                    <a href="user.php">Trang chủ</a> 
                </ul>

            </nav>
        </div>
    </div>
    <br>

    <div class="titleOfTable">
        <h1 align="center">DANH SÁCH KHÁCH</h1>
    </div>

    <br>
    <table id="abc">
        <tr bgcolor="lightblue" style="font-size: 20px">
            <th class="idCustomer" width="8%" align="left">
                ID
            </th>
            <th class="nametour" width="14%" align="left">
                Tên khách
            </th>
            <th class="addrtour" width="8%" align="left">
                CMND
            </th>
            <th class="phonetour" width="20%" align="left">
                Địa chỉ
            </th>
            <th class="mailtour" width="12%" align="left">
                Điện thoại
            </th>
            <th class="mailtour" width="12%" align="left">
                Ngày sinh
            </th>
            <th class="mailtour" width="15%" align="left">
                Email
            </th>
            <th class="mailtour" width="20%" align="left">
                Ghi chú
            </th>
            <th class="mailtour" width="20%" align="left">
                Chức năng
            </th>
        </tr>
        <?php
        include("pagination_dskhach.php");
        while ($customer = mysqli_fetch_assoc($employees)) {

            ?>
            <tr>
                <td>
                    <?php echo $customer['ID'] ?>
                </td>
                <td>
                    <?php echo $customer['NAME'] ?>
                </td>
                <td>
                    <?php echo $customer['IDCARD'] ?>
                </td>
                <td>
                    <?php echo $customer['ADDRESS'] ?>
                </td>
                <td>
                    <?php echo $customer['PHONENUMBER'] ?>
                </td>
                <td>
                    <?php echo $customer['BIRTHDAY'] ?>
                </td>
                <td>
                    <?php echo $customer['EMAIL'] ?>
                </td>
                <td>
                    <?php echo $customer['NOTES'] ?>
                </td>
                <td><button type="button" class="btn btn-info" onclick="confDelete()"><a id="demo"
                            href="delete_customer.php?id=<?php echo $customer['ID'] ?>">Xóa</a></button></td>

            </tr>
        <?php
        }
        ?>
    </table>
    <br><br>
    <?php

    // PHẦN HIỂN THỊ PHÂN TRANG
    // BƯỚC 7: HIỂN THỊ PHÂN TRANG
    
    // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
    if ($current_page > 1 && $total_page > 1) {
        echo '<a style="color:black" href="khachdl.php?page=' . ($current_page - 1) . '">Prev</a> | ';
    }

    // Lặp khoảng giữa
    for ($i = 1; $i <= $total_page; $i++) {
        // Nếu là trang hiện tại thì hiển thị thẻ span
        // ngược lại hiển thị thẻ a
        if ($i == $current_page) {
            echo '<span>' . $i . '</span> | ';
        } else {
            echo '<a align="center" style="color:black" href="khachdl.php?page=' . $i . '">' . $i . '</a> | ';
        }
    }

    // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
    if ($current_page < $total_page && $total_page > 1) {
        echo '<a align="center" style="color:black" href="khachdl.php?page=' . ($current_page + 1) . '">Next</a> | ';
    }
    ?>

    <script>
        function confDelete() {
            if (confirm("Bấm vào nút OK để tiếp tục")) {
                document.getElementById("demo").setAttribute('target', '');
            }
            else {
                document.getElementById("demo").setAttribute('href', 'khachdl.php');
                alert("Xóa ko thành công!");
            }
        }
    </script>




</body>

</html>