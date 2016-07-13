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
	
<title>Login Page</title>

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

    <div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

<h2>Admin <?php echo $_SESSION["emailid"];?></h2>

        </div>
        </div>
	</div>	
<form action="viewprofile.php" method="post">

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

            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
  
 <table border="1">

 <div class="list-group">
  <a href="#" class="list-group-item active">
    Categories
  </a>
<?php 

$emailid=$_SESSION["emailid"];

$con=mysql_connect('localhost','root','');
mysql_select_db('db_shopping',$con);
$res=mysql_query("select * from catg_tbl",$con);
while($row=mysql_fetch_array($res,MYSQL_ASSOC))
{
	
  echo '<a href="#" class="list-group-item">'.$row["cat_name"].'</a>';
  

//	echo '<tr>';
	
//echo '<td>'.$row["cat_name"].'</td>';
//echo '</tr>';	
}
?>
</div>
</table>
 
 
 
 

            </div>

            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                

                <table class="table" border="0">




<tr>
<td><h4>Email Id--><span class="label label-info"><?php echo $emailid;?></h4></span>
</td>
</tr>


<tr>
<td><h4>User name--><span class="label label-info"><?php echo $uname;?></h4></span>
</td>
</tr>

<tr>
<td><h4>City--><span class="label label-info"><?php echo $city; ?></h4></span>
</td>
</tr>

<tr>
<td><h4>gender--><span class="label label-info"><?php echo $gender; ?></h4></span>
</td>
</tr>

<tr>
<td><h4>mobile no--><span class="label label-info"><?php echo $mno; ?></h4></span>
</td>
</tr>
</table>


            </div>



        </div>


        </div>

</form>
        </div>

</body>
</html>