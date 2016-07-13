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
	
<title>Login Page</title>

</head>


<?php 
if(isset($_POST["btnins"]))
{
	$target_dir="../images/";
	$target_file = $target_dir . basename($_FILES["txt_propic"]["name"]);
	move_uploaded_file($_FILES["txt_propic"]["tmp_name"], $target_file);
	
	
	$pname=$_POST["txt_proname"];
	$pprice=$_POST["txt_proprice"];
	$pdesc=$_POST["txt_desc"];
	$psoh=$_POST["txt_soh"];
	$pmfg=$_POST["txt_mfg"];
	$pwar=$_POST["txt_warranty"];
	$pcolor=$_POST["txtcolor"];
	$pcat=$_POST["txtcat"];
	require '../database.php';
	$res=new database();
	$res=$res->insert_product($pname,$pprice,$pdesc,$psoh,$pmfg,$pwar,$target_file,$pcolor,$pcat);
	header('location:product_display.php');
}
?>
<body>


    <div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

<h2>Admin <?php echo $_SESSION["emailid"];?></h2>

        </div>
        </div>
	</div>	
<form action="" method="post" enctype="multipart/form-data">

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
      <a class="navbar-brand" href="viewprofile1.php">Shopping cart</a>
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
            
          </ul>
        </li>
      </ul>
	  <ul class="nav navbar-nav navbar-right">
		 <li><a href="../login.php">SignOut</a></li>
      </ul>

    </div><!-- /.navbar-collapse -->


</nav>


            </div>

        </div>

        <div class="row">

            

            <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                
				<table class="table">

<h2>Product <span class="label label-primary">Add</span></h2>
<form action="product_display.php" method="post">

<tr>
<td>Product Name</td>
<td><input class="form-control" type="text" name="txt_proname"/></td>
</tr>

<tr>
<td>Product Price</td>
<td><input class="form-control" type="text" name="txt_proprice"/></td>
</tr>

<tr>
<td>Description </td>
<td><textarea class="form-control" name="txt_desc" rows="5" cols="0"></textarea></td>
</tr>

<tr>
<td>Stock On Hand</td>
<td><input class="form-control" type="number" name="txt_soh"/></td>
</tr>

<tr>
<td>Manufacture</td>
<td><input class="form-control" type="text" name="txt_mfg"/></td>
</tr>

<tr>
<td>Warranty</td>
<td><input class="form-control" type="text" name="txt_warranty"/></td>
</tr>

<tr>
<td>product photo</td>
<td><input class="form-control" type="file" name="txt_propic"/></td>
</tr>

<tr>
<td>Product Color</td>
<td>
<select class="form-control" name="txtcolor"><br>
<option value="red">red</option>
<option value="blue">blue</option>
<option value="black">black</option>
<option value="white">white</option>
<option value="gold">gold</option>
<option value="space grey">space grey</option>
</td>
</select>
</tr>

<tr>
<td>Category List</td>
<td><select class="form-control" name="txtcat"><br>
<?php 
require '../database.php';
$obj=new database();
$res=$obj->displaycat1();
while($row=mysql_fetch_array($res,MYSQL_ASSOC))
{
	echo '<option value="'.$row["cat_id"].'"';
	echo ">".$row["cat_name"]."</option>";
}
?>
</td>

<tr>
<td>Input data Press here....</td>
<td><button type="submit"  class="btn btn-success" name="btnins" value="insert">Input</button></td>
</tr>
</select>
</tr>
</form>
</table>
				
            </div>


        </div>


        </div>

</div>

</body>
</html>