<?php 
session_start();
?>
<?php 

if(isset($_POST["btnlogin"]))
{
	$emailid=$_POST["txtemailid"];
	$passwd=$_POST["txtpasswd"];
include 'database.php';
$res=new database();
$count=$res->login($emailid,$passwd);
		
		if($count==1)
	{
		$_SESSION["emailid"]=$_POST["txtemailid"];
		header('location:user\viewprofile.php');
	}
	else
	{
		echo "invalid user & password";
	
	}
	
}
?>
<!DOCTYPE html>
<html>

<head>

    <link href="Content/bootstrap.css" rel="stylesheet" />

    <script src="Scripts/jquery-1.9.1.js"></script>

    <link href="Content/bootstrap.css" rel="stylesheet" />

<title></title>

</head>


<body>
 
    <form action="login.php" method="post">

    <div class="container">
 
        <div class="row">
    <div class="col-md-12">
        
        <table class="table">
<tr>
<td>
 
  <div class="input-group">
  <span class="input-group-addon glyphicon glyphicon-user" id="basic-addon1"></span>
  <input type="text" name="txtmailid" class="form-control" placeholder="Email-ID" aria-describedby="basic-addon1">
</div>

</td>

</tr>

<tr>

<td>

    <div class="input-group">
  <span class="input-group-addon glyphicon glyphicon-lock" id="Span1"></span>
  <input type="password" name="txtpasswd" class="form-control" placeholder="PassWord" aria-describedby="basic-addon1">
</div>
</td>

</tr>


<tr>

<td>

  
<div class="btn-group">
  
    <button type="submit" class="btn btn-success" name="btnlogin" >Log In
    
  </button>
  
</div>


</td>
</tr>
            
 </table>      
    </div>

</div>
  </div>

</form>

</body>
</html>