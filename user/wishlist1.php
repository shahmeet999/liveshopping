<?php 
session_start();
include '../database.php';

$id=$_REQUEST["id"];
$eid=$_SESSION["emailid"];

$res2=new database();
$res2=$res2->checkcart($eid,$id);


if($res2==0){
	
	
$res1=new database();
$res1=$res1->view_product($id);
while($row=mysql_fetch_assoc($res1))
{
	
	$amt=$row["pro_price"];
}

//$id=$_REQUEST["id"];
$date=date("d/m/y");
//$eid=$_SESSION["emailid"];
$qty=1;
$flag='cart';

$res=new database();
$res=$res->wishlist_add($amt,$date,$id,$eid,$qty,$flag);

if($res==1)
{
	header('location:viewprofile.php');
	
}
else
{
	echo "not add";
	
}
}
else{
	
	echo '<script language=javascript>
	alert("already add");
	window.location.href="viewprofile.php"
	</script>';
}
?>