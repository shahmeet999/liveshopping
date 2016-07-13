<?php 
session_start();
if($_SESSION['emailid']=='')
{
	Header('Location:../login.php');
}
?>
<?php 


//	$eid=$_SESSION["emailid"];
	$eid1=$_REQUEST["emailid"];
	echo $eid1;
	include '../database.php';
	$resdel=new database();
	$resdel=$resdel->deleteuser($eid1);
	if ($resdel==1)
	{
	//	header('location:displayuser.php');
		
	}
	

?>