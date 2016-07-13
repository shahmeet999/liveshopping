<?php 
session_start();
?>
<?php 

if(isset($_POST["btnlogin"]))
{
	$emailid=$_POST["txtemail"];
	$passwd=$_POST["txtpass"];
include 'database.php';
$res=new database();
$count=$res->login($emailid,$passwd);
		
		if($count==1)
	{
		$_SESSION["emailid"]=$_POST["txtemail"];
		header('location:user\viewprofile.php');
	}
	else
	{
		echo "invalid user & password";
	
	}
	
}
?>

<html>
<head>
<link href="Content/bootstrap.css" rel="stylesheet"/>
<script src="Scripts/jquery-1.9.1.js"></script>
<script src="Scripts/bootstrap.js"></script>
<style>
body{padding-top: 70px;}
</style>
</head>
<body>
	<form action="login2.php" method="post">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Login</h3>
  </div>
  <div class="panel-body">
    <table class="table">
    	<tr>
    		<td><div class="input-group">
  <span class="input-group-addon" id="basic-addon1">@</span>
  <input type="text" name="txtemail" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
</div></td>
    	</tr>
    	<tr>
    		<td><div class="input-group">
  <span class="input-group-addon" id="basic-addon1">@</span>
  <input type="password" name="txtpass" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
</div></td>
    	</tr>
    	<tr>
    		<td>
<!-- Single button -->
<div class="btn-group">
  <input type="submit" class="btn btn-danger" value="Login" name="btnlogin"/>
  
</div>
    		</td>
    	</tr>
     </table>
  </div>
</div>
			</div>
		</div>
	</div>
</form>
	</body>
</html>