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
<style>

</style>
    <link href="../Content/bootstrap.css" rel="stylesheet" />

    <script src="../Scripts/jquery-1.9.1.js"></script>

    <link href="../Content/bootstrap.css" rel="stylesheet" />

	 <script src="../Scripts/bootstrap.js"></script>
	
<title>Purchase History</title>

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
						<div class="col-md-12 col-sd-12">
						

						<table class="table">
						
						<th>Bill Number</th>
						<th>Item Name</th>
						<th>price</th>
						<th>Qty</th>
						<th>mfg</th>
						<th>photo</th>
						
<?php

include  '../database.php';
$eid=$_SESSION["emailid"];
$res2=new database();
$res2=$res2->displaypurchase($eid);
 while($row=mysql_fetch_assoc($res2))
 {
	 
	echo '<tr>';
	echo '<td>'.$row["pk_order_id"].'</td>';
	echo '<td>'.$row["pro_name"].'</td>';
	echo '<td>'.$row["amount"].'</td>';
	echo '<td>'.$row["qty"].'</td>';
	echo '<td>'.$row["mfg"].'</td>';
	echo '<td><img src="'.$row["pro_photo"].'" height="70px" width="70px"/></td>';
	echo '</tr>';
 }	 
 
/*while($row=mysql_fetch_array($res2,MYSQL_ASSOC))
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
        <p><button type="submit" class="btn btn-success">Remove from wishlist</button> </p>
      </div>
    </div>
  </div>
  ';
}*/								
?>

<?php 
$res3=new database();
$res3=$res3->payamt1($eid);
while($row=mysql_fetch_assoc($res3))
{
	$amt=$row["amt"];
	
}
?>	
	
<tr>
<td colspan="7" align="right" style="font-size: 23px; color: rgb(8, 54, 251); font-family: times new roman;">You Total Paid:=<?php echo $amt;?></td>
</tr>
<?php 
if(isset($_POST["btnpay"]))
{
	
	header('location:viewprofile.php');
}
?>
<tr>
<td colspan="7" align="right">

<button type="submit" name="btnpay" class="btn btn-default btn-lg" style="background-color: rgb(255, 136, 49);">
  <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Go For Purchaase
</button>

</td>
</tr>
			</table>
		</div>
					</div>
		</div>
			</form>	
		</body>
</html>