<!DOCTYPE html>
<html>

<head>
	<title></title>
	<link rel="stylesheet" href="vendor/bootstrap.css">
	<link rel="stylesheet" href="vendor/angular-material.min.css">
	<link rel="stylesheet" href="vendor/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="email.css">
</head>
<?php
include("PHPMailer-master/src/PHPMailer.php");
include("PHPMailer-master/src/Exception.php");
include("PHPMailer-master/src/OAuth.php");
include("PHPMailer-master/src/POP3.php");
include("PHPMailer-master/src/SMTP.php");


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);




if (isset($_POST['btnok'])) {
	$email = $_POST['txtmail'];
	$chude = $_POST['txtchude'];
	$noidung = $_POST['txtnoidung'];
	$mail = new PHPMailer(true); // Passing `true` enables exceptions

	try {
		//Server settings
		$mail->SMTPDebug = 2; // Enable verbose debug output
		$mail->isSMTP(); // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
		$mail->SMTPAuth = true; // Enable SMTP authentication
		$mail->Username = 'khautandat@gmail.com'; // email admin
		$mail->Password = '********'; //  nhập pass email
		$mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587; // TCP port to connect to

		//Recipients
		$mail->CharSet = "utf-8";
		$mail->setFrom('khautandat@gmail.com', 'Quản trị trang du lịch cuộc sống');
		$mail->addAddress($email); // Add a recipient
		// $mail->addAddress('ellen@example.com');               // Name is optional
		// $mail->addReplyTo('info@example.com', 'Information');
		// $mail->addCC('cc@example.com');
		// $mail->addBCC('bcc@example.com');

		//Attachments
		// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

		//Content
		$mail->isHTML(true); // Set email format to HTML
		$mail->Subject = $chude;
		$mail->Body = $noidung;
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		$mail->send();
		echo 'Message has been sent';
	} catch (Exception $e) {
		echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
	}
}
?>

<body id="body2">
	<div class="container">
		<?php
		include("navbar.php");
		?>
	</div>

	<div class="container body">
		<img src="images/vietnam.jpg" alt="" width="1100px">
	</div>

	<br>



	<div class="container" align="center">
		<br>

		<h1>Thông tin gửi mail</h1>
		<br>
		<form method="post">
			<table width="700px">
				<tr>
					<td height="50px" width="150px">Email khách</td>
					<td height="50px"><input size="50px" type="mail" name="txtmail" id="txtmail" required></td>
				</tr>
				<tr>
					<td height="60px" width="150px">Tên chủ đề</td>
					<td><input size="50px" type="text" name="txtchude" id="txtchude" required></td>
				</tr>
				<tr>
					<td height="150px" width="150px">Nội dung</td>
					<td><textarea rows="4" cols="52px" size="50px" type="text" name="txtnoidung" id="txtnoidung"
							required height="50px"></textarea></td>
				</tr>
			</table>
			<br>
			<div class="container">
				<input type="submit" name="btnok" class="btn btn-info" onclick="alert('Gửi thành công!')">

			</div>
		</form>
	</div>

</body>

</html>