<?php 
session_start();
if($_SESSION['emailid']=='')
{
	Header('Location:../login.php');
}
?>

<?php 
						include  '../database.php';
						$eid=$_SESSION["emailid"];
						$res4=new database();
						$res4=$res4->updatecod($eid);
						//$cnt=mysql_num_rows($res4);
						
						if($res4==1)
						{
							echo "thank you for purchase";
							echo '</br>';
		echo '<a href="viewprofile.php">For Further Buy Plz Click Here!!!!!!!</a>';
}

?>