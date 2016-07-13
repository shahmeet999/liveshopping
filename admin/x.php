<?php 
session_start();
?>
<html>
<?php

	$catid=$_SESSION["catid"];
	$catgname=$_POST["txtcatname"];
	include '../database.php';
	$resup=new database();
	$resup=$resup->updatecatg($catid,$catgname);

	if($resup==1){
		
		echo "Record updated Successfully";
		header('location:catnamelist.php');
	}
	
	else
	{
		echo $resup;
		echo "not updated";
	}
?>
</html>