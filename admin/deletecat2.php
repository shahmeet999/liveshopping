<?php 
if(isset($_POST["btndel"]))
{
	$cid=$_POST["$catid"];
	//$rno=$_REQUEST["rno"];
	include '../database.php';
	$resdel=new database();
	$resdel=$resdel->deletecatg($cid);
if($resdel==1)
{
//		echo "Record Deleted Successfully";
		header('location:catnamelist.php');
}	
}
?>