<?php
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	try{
		include("connect.php");
		$sql="DELETE FROM `customers` WHERE ID='$id'";
		$connect->exec($sql);
		header("location:khachdl.php");
	}
	catch(PDOException $e)
	{
		echo $sql."<br>".$e->getMessage();
		header("location:khachdl.php");
	}
}
$connect=null;
?>
