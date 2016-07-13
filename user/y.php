<?php 
session_start();
	$emailid=$_SESSION["emailid"];
	$pass1=$_POST["txtpasswd"];
	$pass2=$_POST["txtpasswd1"];
	$pass3=$_POST["txtpasswd2"];
	
	$con=mysql_connect('localhost','root','');
		mysql_select_db('db_shopping',$con);
		$res=mysql_query("select * from user_tbl where email_id='$emailid' and password='$pass1'",$con);
		$count=mysql_num_rows($res);
if($count==1)
{
		if($pass2==$pass3)
		{	
		$con=mysql_connect('localhost','root','');
		mysql_select_db('db_shopping',$con);
		$res=mysql_query("update user_tbl set password='$pass2' where email_id='$emailid' ");
		Header('Location:viewprofile.php');
		}
		
		else
		{
			echo "retype new password";
		}
	
}
else{
	
	echo "old password is wrong";
}	

	
		
?>
