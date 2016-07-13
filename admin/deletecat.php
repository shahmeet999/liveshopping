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
<script>

function dele()
{
	return confirm("Are You Sure You want to Delete?");
}
</script>
    <link href="../Content/bootstrap.css" rel="stylesheet" />

    <script src="../Scripts/jquery-1.9.1.js"></script>

    <link href="../Content/bootstrap.css" rel="stylesheet" />

	 <script src="../Scripts/bootstrap.js"></script>
	
<title>Category List</title>

</head>


<body>

<form action="deletecat.php" method="post">



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
            
            
          </ul>
        </li>
      </ul>
	  
	  <ul class="nav navbar-nav navbar-right">
		 <li><a href="../login.php">SignOut</a></li>
      </ul>

    </div><!-- /.navbar-collapse -->


</div>

</nav>

</div>
            </div>

        </div>



    <div class="container">
<div class="row">
<div class="col-md-3">
</div>
<div class="col-md-5">
<center><h3>Categories List</h3></center>
        <center><table class="table" border="1">

<tr>
<th>Categories Id</th>
<th>Categories Name</th>
<th>Action</th>
</tr>


<?php 

//$emailid=$_SESSION["emailid"];

$con=mysql_connect('localhost','root','');
mysql_select_db('db_shopping',$con);
$res=mysql_query("select * from catg_tbl",$con);
while($row=mysql_fetch_array($res,MYSQL_ASSOC))
{
	echo '<tr>';
	
		echo '<td>'.$row["cat_id"].'</td>';
echo '<td>'.$row["cat_name"].'</td>';
echo '<td>'.'<a href="deletecat22.php?catid='.$row["cat_id"].'" onClick="return  dele()">Delete</a>'.'</td>';
	echo '</tr>';
}

?>

</center></table>
</div>
<div class="col-md-0"></div>
</div>

</div>
 
</form>

</body>

</html>
