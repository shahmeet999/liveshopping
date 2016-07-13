<html>
<head>
</head>
<body>
<?php 

$emailid1=$_REQUEST["emailid"];
require '../database.php';
$res=new database();
$res=$res->deleteuser($emailid1);
	

if(isset($_POST["btndel"]))
{
require '../database.php';
$res=new database();
$res=$res->deleteuser($emailid1);
	
}
?>
<form action="deleteuser1.php" method="post">

<input type="submit" name="btndel" value="delete" />

</form>
</body>
</html>