<?php
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	try{
		include("connect.php");
		$sql="DELETE FROM `user` WHERE ID='$id'";
		$connect->exec($sql);
		$sql1="DELETE FROM `employees` WHERE ID='$id'";
		$connect->exec($sql1);
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