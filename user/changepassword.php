<?php 
session_start();
if($_SESSION['emailid']=='')
{
	Header('Location:../login.php');
}
?>
<html>
<head>

    <link href="../Content/bootstrap.css" rel="stylesheet" />

    <script src="../Scripts/jquery-1.9.1.js"></script>

    <link href="../Content/bootstrap.css" rel="stylesheet" />

	 <script src="../Scripts/bootstrap.js"></script>
	
<title>Change Password</title>

</head>

<body>
<form action="y.php" method="post">
<div class="container">
		<div class="row">
				<div class="page-header">
	<h1>Welcome to the shopping cart <?php echo $_SESSION["emailid"];?></h1>
				</div>
		</div>
	</div>
	
	<div class="container">
	<nav class="navbar navbar-default">
  
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="viewprofile.php">Shopping Cart</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Profile <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="viewprofile1.php">View Profile</a></li>
            <li><a href="editprofile.php">Edit Profile</a></li>
            <li><a href="changepassword.php">Change password</a></li>
            
          </ul>
        </li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../login.php">SignOut</a></li>
        
      </ul>
    </div><!-- /.navbar-collapse -->
  
</nav>
</div><!-- /.container-fluid -->

<div class="container">
	<div class="row">
		<div class="col-md-12 col-sd-12">
			
<table class="table">

<?php 
$emailid=$_SESSION["emailid"];
?>

<tr>
<td>
<div class="panel panel-primary">
  <div class="panel-heading">Email Id</div>
  <div class="panel-body">
<input type="email" class="form-control" name="txtemail" readonly value="<?php echo $emailid; ?>" />
  </div>
</div>
</td>
</tr>

<tr>
<td>
<div class="panel panel-warning">
  <div class="panel-heading">Password</div>
  <div class="panel-body">
<input type="password" class="form-control" name="txtpasswd" required placeholder="Enter your old password" />
  </div>
</div>
</td>
</tr>

<tr>
<td>

<div class="panel panel-info">
  <div class="panel-heading">Retype Password</div>
  <div class="panel-body">
<input type="password" class="form-control" name="txtpasswd1" required placeholder="Enter your new password" />
  </div>
</div>
</td>
</tr>

<tr>
<td>
<div class="panel panel-info">
  <div class="panel-heading">Retype New Password</div>
  <div class="panel-body">
<input type="password" class="form-control" name="txtpasswd2"  placeholder="Enter your new password" />
  </div>
</div>
</td>
</tr>


<tr>
<td>
<button type="submit" class="btn btn-danger" name="btnpass" value="change password" >Change Password</button>
</td>
</tr>
</table>
			</div>
			
		</div>
</div>

</form>
</body>
</html>