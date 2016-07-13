<?php 
session_start();
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
	
<title>Login Page</title>
</head>

<body>
 
    <?php 
if(isset($_POST["btnlogin"]))
{
	$emailid=$_POST["txtemailid"];
	$passwd=$_POST["txtpasswd"];
include 'database.php';
$res=new database();
$count1=$res->typeu($emailid,$passwd);
$count=$res->login($emailid,$passwd);
		
		if($count==1)
	{
		
		$_SESSION["emailid"]=$_POST["txtemailid"];
		
		if($count1=="user")
		{
		header('location:user\viewprofile.php');	
		}
		else
		{
		header('location:admin\viewprofile1.php');		
		}
	}
	else
	{
		echo "invalid user & password";
	
	}
	
	}

?>

    <form action="login.php" method="post">
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
      <a class="navbar-brand" href="login.php">Shopping cart</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
        
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="signup.php">Sign Up</a></li>
        
		<li>
		<button type="button" style="
    height: 48px;
    width: 79px;
" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"> Login</button>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" name="btnlog" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Login Form</h4>
      </div>
      <div class="modal-body">
        
          <div class="form-group">
            <label for="recipient-name" class="control-label">UserName:</label>
           	<input type="text" name="txtemailid" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text"   class="control-label">PassWord:</label>
        <input type="password" name="txtpasswd" class="form-control" />
          </div>
        
      </div>
      <div class="modal-footer">
	  
        <button type="submit" name="btnlogin" class="btn btn-success">Log In</button>
		
      </div>
    </div>
  </div>
</div>
		</li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	</div>
</div>
    <div class="container">
	<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="panel ">
  <div class="panel-body">
    <div class="row">
  <?php 
  require 'database.php';
  $obj=new database();
  $res=$obj->view_product1();
  while($row=mysql_fetch_assoc($res))
  {
 echo' <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
    <div class="thumbnail">
      <img src="images/'.$row["pro_photo"].'" alt="..." style="
    height: 180px;
">
      <div class="caption">
        <h3>'.$row["pro_name"].'</h3>
        <p>Product price:=='.$row["pro_price"].'<br>
		description:=='.$row["descr"].'<br>
		manufacture:=='.$row["mfg"].'<br>
		warranty:=='.$row["warranty"].'<br>
		product color:=='.$row["color"].'</p>
        <p><a href="images/'.$row["pro_photo"].'" class="btn btn-primary" role="button">Quick View</a></p>
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