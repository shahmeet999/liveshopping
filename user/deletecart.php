<?php 
session_start();


$oid=$_REQUEST["id"];

include '../database.php';
$res=new database();

$res=$res->deletecart1($oid);

if($res==1)
{
	header('location:wishlist.php');
	
}
else
{
	echo "na thayu";
}
?>