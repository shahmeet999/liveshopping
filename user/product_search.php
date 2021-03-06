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
	
<title>Product Search</title>

</head>

<body>

<form action="" method="post">
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

		</div>
		
		
	<div class="container">
		<div class="row">
			<div class="col-md-3">
	<div class="list-group">

<?php 

$emailid=$_SESSION["emailid"];
require '../database.php';
$obj1=new database();
$res1=$obj1->displaycat1();
$count=mysql_num_rows($res1);

?>


<a href="#" class="list-group-item active" >
Filter
</a>

<a href="viewprofile.php" class="list-group-item">
	all products <span class="badge"><?php echo $count;?></span>
</a>

<?php

$obj=new database();
$res=$obj->displaybycount();
while($row=mysql_fetch_assoc($res))
{
		
	echo '<a class="list-group-item" href="product_search.php?id='.$row["cat_id"].'">'.$row["cat_name"].'<span class="badge">'.$row["cnt"].'</span></a>';
}
?>
</div>
			</div>
			<div class="col-md-9">
			
			
<div class="panel ">
  <div class="panel-body">
    <div class="row">
  <?php 
  $id=$_REQUEST["id"];
//require 'database.php';
  $obj=new database();
  $res2=$obj->searchpro($id);
  while($row=mysql_fetch_assoc($res2))
  {
 echo' <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="'.$row["pro_photo"].'" alt="..." style="
    height: 180px;
">
      <div class="caption">
        <h3>'.$row["pro_name"].'</h3>
        <p>Product price:=='.$row["pro_price"].'<br>
		description:=='.$row["descr"].'<br>
		manufacture:=='.$row["mfg"].'<br>
		warranty:=='.$row["warranty"].'<br>
		product color:=='.$row["color"].'</p>
        <p><a href="#" class="btn btn-success" role="button">Buy</a> <a href="../'.$row["pro_photo"].'" class="btn btn-primary" role="button">Quick View</a></p>
      </div>
    </div>
  </div>
  ';
  }
  ?>
  
</div>
  </div>
</div>

			</div>

		</div>
</div>
</form>
</body>
</html>