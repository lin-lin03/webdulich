<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="vendor/bootstrap.css">
    <link rel="stylesheet" href="vendor/angular-material.min.css">
    <link rel="stylesheet" href="vendor/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <link rel="stylesheet" type="text/css" href="css/component.css" />
    <link rel="stylesheet" type="text/css" href="css/1.css">
    <link rel="stylesheet" type="text/css" href="css/cart.css">
    <style>
        .nav>li {
            float: left;
            margin-right: 15px;
        }

        .nav>li>a {
            text-transform: uppercase;
            color: red;
        }

        .nav li {
            position: relative;
            list-style: none;
        }

        .nav li a {
            padding: 10px;
            line-height: 20px;
            display: inline-block;
        }

        .nav .sub-menu {
            display: none;
            position: absolute;
            top: 0;
            left: 100%;
            width: 200px;
            background-color: #eee;
            padding: 5px 20px;
            z-index: 5;
        }

        .nav li:hover>.sub-menu {
            display: block;
        }

        .nav>li>.sub-menu {
            top: 40px;
            left: 0;
        }
    </style>
</head>

<body>
    <ul class="nav navbar-nav">
        <li><a href="index.php">Trang chủ</a></li>
        <li>
            <a href="#">Tour trong nước</a>
            <ul class="sub-menu">
                <li>
                    <a href="#">Miền Bắc</a>
                    <ul class="sub-menu">
                        <li><a href="#">Hà Nội</a></li>
                        <li><a href="#">Sapa</a></li>
                        <li><a href="#">Lạng Sơn</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Miền Trung</a>
                    <ul class="sub-menu">
                        <li><a href="#">Đà Nắng</a></li>
                        <li><a href="#">Huế</a></li>
                        <li><a href="#">Quảng Nam</a></li>
                        <li><a href="#">Quy Nhơn</a></li>
                        <li><a href="#">Phú Yên</a></li>
                        <li><a href="#">Nha Trang</a></li>
                        <li><a href="#">Phan Thiết</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Miền Nam</a>
                    <ul class="sub-menu">
                        <li><a href="#">Vũng Tàu</a></li>
                        <li><a href="#">Long An</a></li>
                        <li><a href="#">Cần Thơ</a></li>
                        <li><a href="#">Hồ Chí Minh</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">Tour ngoài nước</a>
            <ul class="sub-menu">
                <li>
                    <a href="#">Châu Âu</a>
                    <ul class="sub-menu">
                        <li><a href="#">Thụy Sỹ</a></li>
                        <li><a href="#">Phần Lan</a></li>
                        <li><a href="#">Pháp</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Châu Á</a>
                    <ul class="sub-menu">
                        <li><a href="#">Thượng Hải</a></li>
                        <li><a href="#">Hồng Kông</a></li>
                        <li><a href="#">Nhật Bản</a></li>
                        <li><a href="#">Singapore</a></li>
                        <li><a href="#">Úc</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">Blog</a>
            <ul class="sub-menu">
                <li>
                    <a href="#">Tin tức &amp; Điểm đến hot</a>
                    <ul class="sub-menu">
                        <li><a href="#">Điểm đến cho ngày hè nóng nực</a></li>
                        <li><a href="#">Leo núi ban đêm. Tại sao không?</a></li>
                        <li><a href="#">Check in nhanh các địa điểm này!</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Review</a>
                    <ul class="sub-menu">
                        <li><a href="#">Các khách sạn có view đẹp nhất Vũng Tàu!</a></li>
                        <li><a href="#">Ăn gì mặc gì khi đi Đà Lạt</a></li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</body>

</html>
<br>
<br>
<?php
include("connect.php");
$search = $_GET['search'];
$sql = "SELECT * FROM `thongtinchitiettour`where NAME like '%$search%'";
$tours = $connect->query($sql);
?>

<div class="container cot">
    <h4>Kết quả tìm kiếm</h4>
    <div class="row" ng-hide="display">
        <?php
        foreach ($tours as $tour) {
            ?>
            <div class="mottin">
                <a href="chitiettour.php?id=<?php echo $tour['ID'] ?>" class="hrefHCM">
                    <div class="vien">
                        <img src="images/<?php echo $tour['IMAGE'] ?>" alt="" class="float-xs-left" width="250px"
                            height="170px">
                        <b>
                            <?php echo $tour['NAME'] ?>
                        </b><br>
                    </div>
                </a>
            </div>

            <?php
        }
        ?>
    </div>
</div>

<div class="container body2" align="float-xs-left">
    <div class="sortGoiytour" ng-hide="display">
        <?php
        include("connect.php");
        $sql2 = "SELECT *from tours  where NAME NOT LIKE '%$search%'";
        $tourGoiy = $connect->query($sql2);
        ?>

    </div>

    <div class="firstWord">
        <p><b>TOUR GỢI Ý</b></p>
    </div>
    <div class="row">
        <?php
        $count = 0;
        foreach ($tourGoiy as $tour) {
            $count++;
            if ($count == 5)
                break;

            ?>

            <div class="mottin">
                <div class="vien">
                    <a href="chitiettour.php?id=<?php echo $tour['ID'] ?>" class="hrefHCM">
                        <img src="images/<?php echo $tour['IMAGE'] ?>" alt="" width="250px" height="170px">
                        <br>
                        <b>
                            <?php echo $tour['NAME'] ?>
                        </b>
                    </a>
                </div>
            </div>
            <?php

        }
        ?>

    </div>
</div>