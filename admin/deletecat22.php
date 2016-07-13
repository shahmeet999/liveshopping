<?php 
	$catid=$_REQUEST["catid"];
	require '../database.php';
	$resdel=new database();
	$count=$resdel->deletecatg($catid);

		if($count==1)
		header('location:catnamelist.php');
	else
		echo 'some thing went wrong';

?>