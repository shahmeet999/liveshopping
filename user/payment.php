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
	
<title>Login Page</title>

</head>

<body>

<form action="upcod.php" method="post">
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
	  

        <li><a href="../login.php">SignOut</a></li>
        
      </ul>
    </div><!-- /.navbar-collapse -->
  
</nav>

		</div>
	
	<div class="container">
			<div class="row">
					<div class="col-md-4 col-sd-4">
					
							<div class="list-group">
  <a href="#" class="list-group-item active">
    Payment Methods
  </a>


  <button type="button" style="
    width:360px;
" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal1" data-whatever="@mdo"> Debit Card</button>
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" name="btnlog" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModal1Label">Payment to Debit Card</h4>
      </div>
      <div class="modal-body">
        
          <div class="form-group">
            <label for="recipient-name" class="control-label">Card Number:</label>
           	<input type="text" name="txtemailid" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text"   class="control-label">Month:</label>
        <input type="text" name="txtpasswd" class="form-control" />
          </div>
        <div class="form-group">
            <label for="message-text"   class="control-label">year:</label>
        <input type="text" name="txtpasswd" class="form-control" />
          </div>
		  <div class="form-group">
            <label for="message-text"   class="control-label">CVV:</label>
        <input type="password" name="txtpasswd" class="form-control" />
          </div>
		  <div class="form-group">
            <label for="message-text"   class="control-label">Enter Your Name Printed on Card:</label>
        <input type="text" name="txtpasswd" class="form-control" />
          </div>
		  
      </div>
      <div class="modal-footer">
	  
        <button type="submit" name="btncod" class="btn btn-default btn-lg" style="background-color: rgb(255, 136, 49);">
  <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Debit Card
</button>
		
      </div>
    </div>
  </div>
</div>


<button type="button" style="
    width:360px;
" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"> Credit Card</button>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" name="btnlog" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Payment to Credit Card</h4>
      </div>
      <div class="modal-body">
        
          <div class="form-group">
            <label for="recipient-name" class="control-label">Card Number:</label>
           	<input type="text" name="txtemailid" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text"   class="control-label">Month:</label>
        <input type="text" name="txtpasswd" class="form-control" />
          </div>
        <div class="form-group">
            <label for="message-text"   class="control-label">year:</label>
        <input type="text" name="txtpasswd" class="form-control" />
          </div>
		  <div class="form-group">
            <label for="message-text"   class="control-label">CVV:</label>
        <input type="password" name="txtpasswd" class="form-control" />
          </div>
		  <div class="form-group">
            <label for="message-text"   class="control-label">Enter Your Name Printed on Card:</label>
        <input type="text" name="txtpasswd" class="form-control" />
          </div>
	
        
      </div>
      <div class="modal-footer">
	  
        <button type="submit" name="btncod" class="btn btn-default btn-lg" style="background-color: rgb(255, 136, 49);">
  <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Credit Card
</button>
		
      </div>
    </div>
  </div>
</div>
  
  
</div>
						</div>
						<div class="col-md-8">
								
<table class="table">
<tr>
<td>Address:= &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td><input type="text" class="form-control" name="btnadd"/></td>
</tr>
<tr>
<td>Pincode:= &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td><input type="text" class="form-control" name="btnpin"/></td>
</tr>
<tr>
<td>Street:= &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td><input type="text" class="form-control" name="btnstr"/></td>
</tr>
<tr>
<td>Area:= &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td><input type="text" class="form-control" name="btnarea"/></td>
</tr>
<tr>
<td>District:= &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td><input type="text" class="form-control" name="btndis"/></td>
</tr>
<tr>
<td>State:= &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td><input type="text" class="form-control" name="btnst"/></td>
</tr>
<tr>

<td colspan="2" align="center"><button type="submit" name="btncod" class="btn btn-default btn-lg" style="background-color: rgb(255, 136, 49);">
  <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Cash On Delivery
</button></td>
</tr>
</table>
						</div>
			</div>
	</div>
	
	</form>
	</body>