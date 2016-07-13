<?php 
session_start();
if($_SESSION['emailid']=='')
{
	Header('Location:../login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php 	
	$emailid=$_SESSION["emailid"];
	$txtcity=$_POST["txtcity"];
	$name=$_POST["txtname"];
	$gender=$_POST["btngender"];
	$mno=$_POST["txtmno"];
		$con=mysql_connect('localhost','root','');
		mysql_select_db('db_shopping',$con);
		$res=mysql_query("update user_tbl set u_name='$name',city='$txtcity',gender='$gender',mobileno='$mno' where email_id='$emailid' ");
		if($res==1)
		{
			
			header('location:viewprofile.php');
		}
		else
		{
			echo "na thayu";
			
		}
?>
</body>
</html>