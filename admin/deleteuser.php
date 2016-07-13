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
<title>Admin View Page</title>

</head>


<body>

<?php 

if(isset($_POST["btndel"]))
{
//	$eid=$_SESSION["emailid"];
	$eid1=$_REQUEST["emailid"];
	//echo $eid1;
	include '../database.php';
	$resdel=new database();
	$resdel=$resdel->deleteuser($eid1);
	if ($resdel==1)
	{
	header('location:displayuser.php');
		
	}
	
}
?>

<form action="" method="post">



    <div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

<h2>Admin <?php echo $_SESSION["emailid"];?></h2>

        </div>
        </div>
</div>

    <div class="container">

        <div class="row">

            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">


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
      <a class="navbar-brand" href="#">Shopping cart</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User table <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="displayuser.php">Display user</a></li>
  
          </ul>
        </li>
      </ul>

        <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Product table <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="product_display.php">Display Product</a></li>
            <li><a href="product_add.php">Insert Product</a></li>
            <li><a href="#">Delete Product</a></li>
            <li><a href="#">Edit Product</a></li>  
          </ul>
        </li>
      </ul>
    
        <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Category table <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="catnamelist.php">Display Category</a></li>
            <li><a href="insertcatg.php">Insert Category</a></li>
            <li><a href="deletecat.php">Delete Category</a></li>
            <li><a href="updatecat.php">Edit Category</a></li>  
          </ul>
        </li>
      </ul>

    </div><!-- /.navbar-collapse -->


</div>

</nav>

</div>
            </div>

        </div>



    <div class="container">
are you sure want to delete the user???
<button type="submit" name="btndel" value="delete">Delete</button>
</div>
</form>

</body>

</html>
