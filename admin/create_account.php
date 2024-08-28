<?php
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$tam=$_GET['cv'];

	$pos='USER';
	if($tam=='Manager')
	{
		$pos='ADMIN';
	}
	try{
		include("connect.php");
		$sql="INSERT INTO `user`(`ID`,`POSITION`) VALUES ('$id','$pos')";
		$connect->exec($sql);
		header("location:admin.php?quanly=list_employees");
	}
	catch(PDOException $e)
	{
		echo $sql."<br>".$e->getMessage();
		header("location:admin.php?quanly=list_employees");
	}
}
$connect=null;
?>
