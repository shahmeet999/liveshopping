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
	
<title>View Items List</title>

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
      
      <ul class="nav navbar-nav">
  <li><a href="purchase_history.php">Purchase History</a></li>
</ul>
	  
	  <ul class="nav navbar-nav navbar-right">
	  <button type="submit" name="btnorder" class="btn btn-primary btn-lg" style="height: 50px;" aria-label="Left Align">
  <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
</button>
        <li><a href="../login.php">SignOut</a></li>
		
      </ul>
    </div><!-- /.navbar-collapse -->
  
</nav>

		</div>
		<?php 
		if(isset($_POST["btnorder"]))
		{
			header('location:wishlist.php');
			
		}
		?>
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
	<div class="list-group">

<?php 

$emailid=$_SESSION["emailid"];

$res1=new database();
$res1=$res1->displaycat1();
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
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
			
			
	
	
<div class="panel ">
  <div class="panel-body">
    <div class="row">
  <?php 
//require 'database.php';
  $obj=new database();
  $res=$obj->view_product1();
  while($row=mysql_fetch_assoc($res))
  {
 echo' <div class="col-sm-6 col-md-6 col-sd-6">
    <div class="thumbnail">
      <img src="'.$row["pro_photo"].'" alt="..." style="
    height: 100px;
">
      <div class="caption">
        <h3>'.$row["pro_name"].'</h3>
        <p>Product price:=='.$row["pro_price"].'<br>
		description:=='.$row["descr"].'<br>
		manufacture:=='.$row["mfg"].'<br>
		warranty:=='.$row["warranty"].'<br>
		product color:=='.$row["color"].'</p>
        <p> <a href="'.$row["pro_photo"].'" class="btn btn-primary" role="button">Quick View</a>
		<a href="wishlist1.php?id='.$row["pro_id"].'" class="btn btn-warning" role="button" style="margin: 15px; margin-left:0px;">Add To Wishlist</a> </p>
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