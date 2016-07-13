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
<form action="x.php" method="post">
<table border="1">
<tr>

<th>Categories Name</th>
</tr>
<?php 

$emailid=$_SESSION["emailid"];

$con=mysql_connect('localhost','root','');
mysql_select_db('db_shopping',$con);
$res=mysql_query("select * from catg_tbl",$con);
while($row=mysql_fetch_array($res,MYSQL_ASSOC))
{
	echo '<tr>';
	
echo '<td>'.$row["cat_name"].'</td>';
echo '</tr>';	
}
?>
</table>
</form>
</body>
</html>