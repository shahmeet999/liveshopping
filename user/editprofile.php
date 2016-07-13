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
	
<title>Edit Profile</title>

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
<form action="x.php" method="post">


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
			<div class="col-md-12">
<table class="table" border="0" width="25%">

<tr>
<td>
<div class="panel panel-primary">
  <div class="panel-heading">Email Id</div>
  <div class="panel-body">
<input type="email" class="form-control" name="txtemail" readonly value="<?php echo $emailid;?>" />
  </div>
</div>
</td>
</tr>

<tr>
<td>
<div class="panel panel-primary">
  <div class="panel-heading">User Name</div>
  <div class="panel-body">
<input type="text" class="form-control" name="txtname" value="<?php echo $uname; ?>" />
  </div>
</div>
</td>
</tr>

<tr>
<td>

<div class="panel panel-primary">
  <div class="panel-heading">City</div>
  <div class="panel-body">

  <select name="txtcity" class="form-control" >
<option value="ahmedabad" <?php if($city=="ahmedabad"){echo 'selected'; } ?> >Ahmedabad</option>
<option value="mumbai" <?php if($city=="mumbai"){echo 'selected'; } ?> >Mumbai</option>
<option value="surat" <?php if($city=="surat"){echo 'selected'; } ?> >Surat</option>
<option value="kerala" <?php if($city=="kerala"){echo 'selected'; } ?> >Kerala</option>
<option value="baroda" <?php if($city=="baroda"){echo 'selected'; } ?> >Baroda</option>

</select>
  
  </div>
</div>


</td>

</tr>

<tr>
<td>

<div class="panel panel-primary">
  <div class="panel-heading">Gender</div>
  <div class="panel-body">	
 <input type="radio" name="btngender" <?php if($gender=="male"){echo 'checked'; } ?> value="male">Male</input>
		<input type="radio" name="btngender" <?php if($gender=="female"){echo 'checked'; } ?> value="female">Female</input>  
  </div>
</div>
</td>
</tr>

<tr>
<td>

<div class="panel panel-primary">
  <div class="panel-heading">Mobile Number</div>
  <div class="panel-body">

  <input type="text" class="form-control" name="txtmno" value="<?php echo $mno;?>" />

  </div>
</div>
</td>
</tr>


<tr>
<td><button class="btn btn-success" type="submit" name="btnedit" value="Edit">Edit</td>
</tr>

</form>
</table>
		</div>
	</div>
</div>
</body>
</html>