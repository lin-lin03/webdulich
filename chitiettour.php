<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title> Dulich.VN | Chuyến đi tiên cảnh </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		* {
			margin: 0;
			padding: 0;
		}


		.mottin .hrefHCM {
			text-decoration: none;
			color: black;
		}

		.mottin {
			padding: 20px;
			width: 25%;
		}

		.cot .mottin {
			width: 25%;
			margin-right: 5%;
			height: 300px;
			float: left;

		}

		.jumbotron {
			height: 400px;
			/*background-color: hsl(102, 50%, 35%);*/
			background-color: #3e98f2;
			box-shadow: 10px 10px #888888;
		}

		.jumbotron .href_khuyenmai {
			text-decoration: none;
			color: #edeae1;
		}

		.tableSearch {
			margin-right: 5%
		}

		*,
		*:after,
		*:before {
			box-sizing: border-box;
			-moz-box-sizing: border-box;
			-webkit-box-sizing: border-box;
		}

		.cf:before,
		.cf:after {
			content: "";
			display: table;
		}

		.cf:after {
			clear: both;
		}


		a,
		a:visited {
			color: #fff
		}

		/*--------------------------------------------------------------
2.0 - SEARCH FORM
--------------------------------------------------------------*/
		.searchform {
			background: #f4f4f4;
			background: rgba(244, 244, 244, .79);
			border: 1px solid #d3d3d3;
			padding: 2px 5px;
			width: 339px;
			box-shadow: 0 4px 9px rgba(0, 0, 0, .37);
			-moz-box-shadow: 0 4px 9px rgba(0, 0, 0, .37);
			-webkit-box-shadow: 0 4px 9px rgba(0, 0, 0, .37);
			border-radius: 10px;
			-moz-border-radius: 10px;
			-webkit-border-radius: 10px
		}

		.searchform input,
		.searchform button {
			float: left
		}

		.searchform input {
			background: #fefefe;
			border: none;
			font: 12px/12px 'HelveticaNeue', Helvetica, Arial, sans-serif;
			margin-right: 5px;
			padding: 10px;
			width: 216px;
			box-shadow: 0 0 4px rgba(0, 0, 0, .4) inset, 1px 1px 1px rgba(255, 255, 255, .75);
			-moz-box-shadow: 0 0 4px rgba(0, 0, 0, .4) inset, 1px 1px 1px rgba(255, 255, 255, .75);
			-webkit-box-shadow: 0 0 4px rgba(0, 0, 0, .4) inset, 1px 1px 1px rgba(255, 255, 255, .75);
			border-radius: 9px;
			-moz-border-radius: 9px;
			-webkit-border-radius: 9px
		}

		.searchform input:focus {
			outline: none;
			box-shadow: 0 0 4px #0d76be inset;
			-moz-box-shadow: 0 0 4px #0d76be inset;
			-webkit-box-shadow: 0 0 4px #0d76be inset;
		}

		.searchform input::-webkit-input-placeholder {
			font-style: italic;
			line-height: 15px
		}

		.searchform input:-moz-placeholder {
			font-style: italic;
			line-height: 15px
		}

		.searchform button {
			background: rgb(52, 173, 236);
			background: -moz-linear-gradient(top, rgba(52, 173, 236, 1) 0%, rgba(38, 145, 220, 1) 100%);
			background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(52, 173, 236, 1)), color-stop(100%, rgba(38, 145, 220, 1)));
			background: -webkit-linear-gradient(top, rgba(52, 173, 236, 1) 0%, rgba(38, 145, 220, 1) 100%);
			background: -o-linear-gradient(top, rgba(52, 173, 236, 1) 0%, rgba(38, 145, 220, 1) 100%);
			background: -ms-linear-gradient(top, rgba(52, 173, 236, 1) 0%, rgba(38, 145, 220, 1) 100%);
			background: linear-gradient(to bottom, rgba(52, 173, 236, 1) 0%, rgba(38, 145, 220, 1) 100%);
			filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#34adec', endColorstr='#2691dc', GradientType=0);
			border: none;
			color: #fff;
			cursor: pointer;
			font: 13px/13px 'HelveticaNeue', Helvetica, Arial, sans-serif;
			padding: 10px;
			width: 106px;
			box-shadow: 0 0 2px #2692dd inset;
			-moz-box-shadow: 0 0 2px #2692dd inset;
			-webkit-box-shadow: 0 0 2px #2692dd inset;
			border-radius: 9px;
			-moz-border-radius: 9px;
			-webkit-border-radius: 9px;
		}

		.searchform button:hover {
			opacity: .9;
		}

		/*end searchFORM*/


		.ttw-hrmenu {

			border-bottom: 4px solid #2E3639;
		}




		/*banner auto*/

		.banner {
			background: #2a90f7 no-repeat 50% 0;
			height: 391px;
		}

		.inner {
			margin: 0 auto;
			width: 1280px;
		}

		div.bonus {
			float: left;
			width: 400px;
		}

		.bonus h4 {
			font-size: 15px;
			color: #ede6e6
		}

		div.slogan {
			float: left;
			width: 400;
			margin: 100px 0 0 120px;
			line-height: 3px;
		}

		.slogan h1 {
			text-transform: uppercase;
			font-size: 48px;
			color: white
		}

		.slogan h2 {
			font-size: 20px;
			color: #ede6e6
		}

		div.image-block {
			width: 790px;
			float: left;
			position: relative;
		}

		.slogan {
			opacity: 0;
		}

		img.photo-1,
		img.photo-2,
		img.photo-3,
		img.photo-4 {
			position: absolute;
			opacity: 0;
		}

		img.photo-1 {
			z-index: 400;
			top: 90px;
			left: 120px;
			width: 50%;
		}

		img.photo-2 {
			z-index: 300;
			right: 115px;
			top: 180px;
		}

		img.photo-3 {
			z-index: 200;
			top: 60px;
			width: 55%;
		}

		img.photo-4 {
			bottom: -100px;
			right: 700px;
			z-index: 100;
			width: 55%;
		}


		.banner .image-block .photo-1 {
			opacity: 0;
			transform: translateY(-1000px);
			-webkit-transform: translateY(-1000px);
			/* Safari and Chrome */
			-ms-transform: translateY(-1000px);
			/* IE 9 */
		}

		.banner .image-block .photo-2 {
			opacity: 0;
			transform: translateX(3000px);
			-webkit-transform: translateX(3000px);
			/* Safari and Chrome */
			-ms-transform: translateX(3000px);
			/* IE 9 */
		}

		.banner .image-block .photo-4,
		.banner .image-block .photo-3 {
			transform: scale(0);
			-webkit-transform: scale(0);
			-ms-transform: scale(0);
			/* IE 9 */
		}

		.banner .image-block .photo-1 {
			transition: all 500ms cubic-bezier(0.68, -0.55, 0.265, 1.55) 0s;
		}

		.banner .image-block .photo-2 {
			transition: all 500ms cubic-bezier(0.68, -0.55, 0.265, 1.55) 0s;
		}

		.banner .image-block .photo-4,
		.banner .image-block .photo-3 {
			transition: all 500ms cubic-bezier(0.68, -0.55, 0.265, 1.55) 0s;
		}

		.banner .image-block .photo-1.active {
			opacity: 1;
			transform: translateY(0px);
			-webkit-transform: translateY(0px);
			/* Safari and Chrome */
			-ms-transform: translateY(0px);
			/* IE 9 */
		}

		.banner .image-block .photo-2.active {
			opacity: 1;
			transform: translateX(0px);
			-webkit-transform: translateX(0px);
			/* Safari and Chrome */
			-ms-transform: translateX(0px);
			/* IE 9 */
		}

		.banner .image-block .photo-3.active,
		.banner .image-block .photo-4.active {
			transform: scale(1);
			-webkit-transform: scale(1);
			/* Safari and Chrome */
			-ms-transform: scale(1);
			/* IE 9 */
			opacity: 1;
		}

		/*end banner */

		@import url(http://weloveiconfonts.com/api/?family=zocial);

		* {
			margin: 0;
			padding: 0;
		}

		[data-icon]:before {
			font-family: 'zocial';
			content: attr(data-icon);
			-webkit-font-smoothing: antialiased;
		}


		a {
			text-decoration: none;

			-webkit-transition: all .2s linear;
			-moz-transition: all .2s linear;
			-ms-transition: all .2s linear;
			-o-transition: all .2s linear;
			transition: all .2s linear;
		}

		.clear {
			clear: both;
		}

		footer {
			background-color: #2E3639;
			position: relative;
			z-index: 1;
		}

		footer .splitter {
			background-color: #ac0;
			background-image: -webkit-gradient(linear, 0 100%, 100% 0, color-stop(.25, rgba(255, 255, 255, .2)), color-stop(.25, transparent),
					color-stop(.5, transparent), color-stop(.5, rgba(255, 255, 255, .2)),
					color-stop(.75, rgba(255, 255, 255, .2)), color-stop(.75, transparent),
					to(transparent));
			background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .2) 25%, transparent 25%,
					transparent 50%, rgba(255, 255, 255, .2) 50%, rgba(255, 255, 255, .2) 75%,
					transparent 75%, transparent);
			background-image: -moz-linear-gradient(45deg, rgba(255, 255, 255, .2) 25%, transparent 25%,
					transparent 50%, rgba(255, 255, 255, .2) 50%, rgba(255, 255, 255, .2) 75%,
					transparent 75%, transparent);
			background-image: -ms-linear-gradient(45deg, rgba(255, 255, 255, .2) 25%, transparent 25%,
					transparent 50%, rgba(255, 255, 255, .2) 50%, rgba(255, 255, 255, .2) 75%,
					transparent 75%, transparent);
			background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, .2) 25%, transparent 25%,
					transparent 50%, rgba(255, 255, 255, .2) 50%, rgba(255, 255, 255, .2) 75%,
					transparent 75%, transparent);
			background-image: linear-gradient(45deg, rgba(255, 255, 255, .2) 25%, transparent 25%,
					transparent 50%, rgba(255, 255, 255, .2) 50%, rgba(255, 255, 255, .2) 75%,
					transparent 75%, transparent);

			-webkit-background-size: 50px 50px;
			-moz-background-size: 50px 50px;
			background-size: 50px 50px;

			-moz-box-shadow: 1px 1px 8px gray;
			-webkit-box-shadow: 1px 1px 8px gray;
			box-shadow: 1px 1px 8px gray;

			height: 20px;
		}

		footer>ul {
			list-style: none outside none;
			margin: 0 auto;
			max-width: 1200px;
			overflow: hidden;
			padding: 25px 0;
			position: relative;
			width: 95%;
		}

		footer>ul li {
			float: left;
			padding: 20px 15px;
			width: 33.3%;

			box-sizing: border-box;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
		}

		footer>ul li:first-child {
			padding-left: 0;
		}

		footer>ul li:nth-child(3) {
			padding-right: 0;
		}

		footer>ul li .icon {
			color: #999999;
			float: left;
			font-size: 80px;
			line-height: 80px;
		}

		footer>ul li .text {
			color: #848889;
			font-size: 13px;
			line-height: 20px;
			margin-left: 105px;
			position: relative;
			text-align: justify;
		}

		.text h4 {
			color: #FFFFFF;
			font-size: 24px;
			font-weight: bold;
			margin-bottom: 10px;
		}

		.text a {
			border-bottom: 1px dotted transparent;
			color: #FFDD00;
			font-weight: bold;
		}

		.text a:hover {
			border-color: #FFDD00;
		}

		footer .bar {
			background-color: #1E2629;
			padding: 20px 0;
		}

		footer .bar-wrap {
			font-size: 12px;
			margin: 0 auto;
			max-width: 1200px;
			position: relative;
			width: 95%;
		}

		.links {
			float: left;
			list-style: none outside none;
			position: relative;
		}

		.links li {
			float: left;
			margin-right: 10px;
		}

		.links a {
			color: #778888;
		}

		.links a:hover {
			color: #FFFFFF;
		}

		.social {
			position: absolute;
			right: 0;
			top: 0;
		}

		.social a {
			color: #778888;
			margin-left: 20px;
		}

		.social a:hover {
			color: #FFFFFF;
		}

		.social .icon {
			display: inline-block;
			font-size: 36px;
			margin-right: 5px;
			vertical-align: middle;

			-webkit-transition: -webkit-transform .3s linear;
			-moz-transition: -moz-transform .3s linear;
			-ms-transition: -ms-transform .3s linear;
			-o-transition: -o-transform .3s linear;
			transition: transform .3s linear;
		}

		.social a:hover .icon {
			-webkit-transform: rotate(360deg);
			-moz-transform: rotate(360deg);
			-ms-transform: rotate(360deg);
			-o-transform: rotate(360deg);
			transform: rotate(360deg);
		}

		.social .info {
			display: inline-block;
			vertical-align: middle;
		}

		.social .info .follow {
			display: block;
		}

		.social .info .num {
			display: block;
		}

		.copyright {
			color: #778888;
			margin-top: 5px;
		}

		@media screen and (max-width: 1000px) {

			.links,
			.social,
			.copyright {
				float: none;
				text-align: center;
			}

			.social {
				position: relative;
				margin: 10px 0;
			}

			.links li {
				display: inline-block;
				float: none;
			}

			.bar {
				position: relative;
			}

			.bar-wrap {
				margin-bottom: 0;
			}
		}

		@media screen and (max-width: 835px) {
			footer>ul li {
				float: none;
				width: auto;
			}
		}

		@media screen and (max-width: 768px) {
			.links li {
				margin-right: 5px;
			}
		}



		/*chitiettour*/


		table .chitiettour {
			background-color: #f9f9f4;
		}

		/*menu*/


		#nametour {
			color: black;
		}

		#idtour {
			color: black;
			font-family: Times New Roman;
			font-size: 18px;
		}

		#idtour1 {
			color: black;
			font-family: Times New Roman;
			font-size: 18px;
		}

		#idtour2 {
			color: black;
			font-family: Times New Roman;
			font-size: 18px;
		}

		#idtour3 {
			color: black;
			font-family: Times New Roman;
			font-size: 18px;
		}

		#price {
			color: red;
			font-family: Times New Roman;
			font-size: 16px;
		}

		.body2 {
			background-color: #f9f9f4;
			width: 1110px;
			float: center;
		}

		.firstWord {
			font-size: 20px;
			font-family: Arial;
			color: #fc7a00;
		}





		#main_dangkitour {
			color: black;
			font-family: Times New Roman;
			font-size: 16px;
		}
	</style>
	<link rel="stylesheet" href="vendor/bootstrap.css">
	<link rel="stylesheet" href="vendor/angular-material.min.css">
	<link rel="stylesheet" href="vendor/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/default.css" />
	<link rel="stylesheet" type="text/css" href="css/component.css" />
	<link rel="stylesheet" type="text/css" href="css/cart.css">
	<script src="js/modernizr.custom.js"></script>
</head>

<body ng-app="myApp" ng-controller="MyController">

	<form method="post" name="chitiettour">
		<div class="container menu">
			<div class="main">
				<nav id="ttw-hrmenu" class="ttw-hrmenu">
					<ul>


						<a class="tc" style=color:black href="index.php">Trang Chủ</a>


						<li>
							<a style=color:black href="#">Blog</a>
							<div class="ttw-hrsub">
								<div class="ttw-hrsub-inner">
									<div>
										<h4>Tin tức &amp; Điểm đến hot</h4>
										<ul>
											<li><a href="#">Điểm đến cho ngày hè nóng nực</a></li>
											<li><a href="#">Leo núi ban đêm. Tại sao không?</a></li>
											<li><a href="#">Check in nhanh các địa điểm này!</a></li>
										</ul>
									</div>
									<div>
										<h4>Review</h4>
										<ul>
											<li><a href="#">Các khách sạn có view đẹp nhất Vũng Tàu!</a></li>
											<li><a href="#">Ăn gì mặc gì khi đi Đà Lạt</a></li>
										</ul>
									</div><!-- /ttw-hrsub-inner -->
								</div><!-- /ttw-hrsub -->
						</li>


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
		</script><br><br><br>
		<?php
		include("connect.php");
		$id = $_GET['id'];
		$sql = "SELECT * FROM `thongtinchitiettour`where ID='$id'";
		$tours = $connect->query($sql);
		?>

		<?php

		foreach ($tours as $tour) {
			?>
			<div class="container body1">
				<div class="infor" align="left">
					<table class="chitiettour" align="center" width="1100px" border="0px" cellpadding="2px"
						cellspacing="2px">
						<tr>
							<td rowspan="3" width="60%">
								<div id="nametour">
									<h4>
										<?php echo $tour['NAME'] ?>
									</h4>
								</div>
								<img src="images/<?php echo $tour['IMAGE'] ?>" alt="" width="95%" height="400px">
							</td>
							<td id="idtour" colspan="3" align="left" width="20%">

								Mã tour:<br><br>
								Ngày đi:<br><br>
								Ngày về:<br><br>
								Loại tour:<br>

							</td>
							<td width="20%">
								<div id="idtour1">
									<?php echo $tour['ID'] ?><br><br>
									<?php echo $tour['START'] ?><br><br>
									<?php echo $tour['END'] ?><br><br>
									<?php echo $tour['KIND_TOUR'] ?><br>
								</div>
							</td>
						</tr>
						<tr>
							<td id="idtour2" colspan="3">
								<p>Số người tối đa:&nbsp;&nbsp;&nbsp;
									<?php echo $tour['MAX_PEOPLE'] ?><br>
								</p>
							</td>

						</tr>
						<tr>
							<td colspan="3" align="left" id="price">
								<div>
									<p>Người lớn:
										<?php echo $tour['ADULT_PRICE'] ?> VNĐ
									</p>
									<p>Trẻ em:
										<?php echo $tour['CHILD_PRICE'] ?> VNĐ
									</p>
								</div>
							</td>
							<td align="right">
								<p><button class="btn btn-danger" style="width: 200px"><a
											href="dangkitour.php?idtour=<?php echo $tour['ID'] ?>">Đặt ngay</button></p>

							</td>
						</tr>
					</table>
				</div>
			</div>
			<br><br>

			<div class="container body2" align="float-xs-left">
				<table align="center" width="1100px" border="0px" cellpadding="2px" cellspacing="2px">
					<tr>
						<td rowspan="3" width="70%">
							<div id="nametour">

								<div class="firstWord">
									<p><b>CHƯƠNG TRÌNH TOUR</b></p>
								</div>
								<div class="thongtin">
									<?php echo $tour['TOUR_PROGRAM'] ?>
								</div>
								<br><br><br>
								<div class="firstWord">
									<p><b>CHI TIẾT TOUR</b></p>
								</div>
								<div class="hotel">
									<p>Thông tin khách sạn:&nbsp;
										<?php echo $tour['HOTEL_NAME'] ?>
									</p>
								</div>

						</td>
						<td rowspan="3" align="left" width="20%">

						</td>
						<td width="20%">
							<div id=bannerBody2>
								<?php
								/*----------banner-----------*/
								?>
							</div>
						</td>
					</tr>
				</table>
			</div>
			<br><br>
			<?php
		}
		?>
		<div class="container body2" align="float-xs-left">
			<div class="sortGoiytour" ng-hide="display">
				<?php
				include("connect.php");
				$sql2 = "select*from tours";
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
		<br><br><br>

	</form>




	<script type="text/javascript" src="vendor/bootstrap.js"></script>
	<script type="text/javascript" src="vendor/angular-1.5.min.js"></script>
	<script type="text/javascript" src="vendor/angular-animate.min.js"></script>
	<script type="text/javascript" src="vendor/angular-aria.min.js"></script>
	<script type="text/javascript" src="vendor/angular-messages.min.js"></script>
	<script type="text/javascript" src="vendor/angular-material.min.js"></script>

</body>

</html>