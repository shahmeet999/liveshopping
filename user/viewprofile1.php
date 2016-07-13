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

    <link href="../Content/bootstrap.css" rel="stylesheet" />

    <script src="../Scripts/jquery-1.9.1.js"></script>

    <link href="../Content/bootstrap.css" rel="stylesheet" />

	 <script src="../Scripts/bootstrap.js"></script>
	
<title>View Profile</title>

</head>

<?php 
$emailid=$_SESSION["emailid"];

require '../database.php';
$res=new database();
$res=$res->viewprofile($emailid);

while($row=mysql_fetch_array($res,MYSQL_ASSOC))
{
$uname=$row["u_name"];	
$city=$row["city"];
$gender=$row["gender"];
$mno=$row["mobileno"];
	
}
?>
<body>

<form action="viewprofile.php" method="post">
	<div class="container">
		<div class="row">
				<div class="page-header">
	<h1>Welcome to the shopping cart <?php echo $_SESSION["emailid"];?></h1>
				</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
	<nav class="navbar navbar-default">
  <div class="container">
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
  </div><!-- /.container-fluid -->
</nav>
	</div>
</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">

<table class="table">
<tr>
<td>
<div class="panel panel-primary">
  <div class="panel-heading">Email Id</div>
  <div class="panel-body">
    <?php echo $emailid;?>
  </div>
</div>
</td>
</tr>


<tr>

<td>
<div class="panel panel-success">
  <div class="panel-heading">User Name</div>
  <div class="panel-body">
<?php echo $uname;?>
  </div>
</div>
</td>
</tr>

<tr>
<td>
<div class="panel panel-info">
  <div class="panel-heading">City</div>
  <div class="panel-body">
<?php echo $city; ?>
  </div>
</div>

</td>
</tr>

<tr>
<td>
<div class="panel panel-warning">
  <div class="panel-heading">Gender</div>
  <div class="panel-body">
<?php echo $gender; ?>
  </div>
</div>

</td>
</tr>

<tr>
<td>
<div class="panel panel-danger">
  <div class="panel-heading">Mobile No</div>
  <div class="panel-body">
<?php echo $mno; ?>
  </div>
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