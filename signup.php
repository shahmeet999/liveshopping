<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>

    <link href="../Content/bootstrap.css" rel="stylesheet" />

    <script src="../Scripts/jquery-1.9.1.js"></script>

    <link href="../Content/bootstrap.css" rel="stylesheet" />

	 <script src="../Scripts/bootstrap.js"></script>
	 
	 <script type="text/javascript">
	 
	 function alphanumeric(uname)
{
		var letters=/^[0-9a-zA-Z]+$/;
		if(uname.value.match(letters))
		{
			return true;
		}
		else
		{
			alert('user name must have alphanumeric characters only');
			
			uname.focus();
			return false;
		}
}

function passid_validation(passid,mx,my)
{
	var pl=passid.value.length;
	if(pl==0 || pl>=my || pl<mx)
	{
		alert("password should not be empty/length must be between "+mx+" to "+my);
		passid.focus();
		return false;
	}
	return true;
}

function countryselect(ucountry)
{
		if(ucountry.value=="Default")
		{
			alert('Select Your city from the list')
			ucountry.focus();
			return false;
		}
		else
		{
				return true;
		}
}
function allnumeric(uzip)
{
		var numbers=/^[0-9]+$/;
		if(uzip.value.match(numbers))
		{
			return true;
		}
		else
		{
				alert('mobile number must have numeric characters only')
				uzip.focus();
				return false;
				
		}
}
	 
	 </script>
	
<title>Sign Up</title>

</head>


<?php 
if(isset($_POST["btnsignup"]))
{	

if($_POST["captcha_code"]==$_SESSION["captcha_code"]){
$message = "Your message received successfully";	

	$emailid=$_POST["txtemail"];
	$uname=$_POST["txtname"];
	$password=$_POST["txtpasswd"];
	$password1=$_POST["txtpasswd1"];
	$city=$_POST["txtcity"];
	$gender=$_POST["btngender"];
	$mno=$_POST["txtmno"];
	
	if($password==$password1){
		
	include 'database.php';
	$res=new database();
	$res=$res->signup($emailid,$uname,$password,$city,$gender,$mno);
		if($res==1)
		{
			header('location:login.php');
		}
		else
		{
			
			
		}
	}
	else
	{
		
		echo "invalid password";
	}
}

else{
	
echo "Enter Correct Captcha Code";
}
}

?>


<body onload="document.form1.txtemail.focus();">


<form action="" method="post" name="form1">

<div class="container">
	<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<h2>Sign Up Form For Shopping Cart.com</h2>
				</div>
		</div>
</div>
<div class="container">
	<div class="row">
<table class="table">

<tr>
<td>
<div class="panel panel-success">
  <div class="panel-heading">Email id</div>
	<div class="panel-body">
		<input type="email" class="form-control" name="txtemail" required placeholder="Enter your Email Id" />    
	</div>
</div>
</td>
</tr>

<tr>
<td>
<div class="panel panel-success">
  <div class="panel-heading">User Name</div>
	<div class="panel-body">
		<input type="text" class="form-control" name="txtname" required placeholder="Enter your name" onblur="return alphanumeric(document.form1.txtname);"/>
	</div>
</div>
</td>
</tr>

<tr>
<td>
<div class="panel panel-success">
  <div class="panel-heading">Password</div>
	<div class="panel-body">
<input type="password" class="form-control" name="txtpasswd" required placeholder="Enter your password" onblur="return passid_validation(document.form1.txtpasswd,5,10);"/>
	</div>
</div>
</td>
</td>
</tr>

<tr>
<td>
<div class="panel panel-success">
  <div class="panel-heading">Confirm Password</div>
	<div class="panel-body">
<input type="password" class="form-control" name="txtpasswd1" required placeholder="Enter your password" onblur="return passid_validation(document.form1.txtpasswd1,5,10);"/>
	</div>
</div>
</td>
</tr>

<tr>
<td>
<div class="panel panel-success">
  <div class="panel-heading">City</div>
	<div class="panel-body">
		<select class="form-control" name="txtcity" onblur="return countryselect(document.form1.txtcity);">
				<option value="ahmedabad">Ahmedabad</option>
				<option value="mumbai">Mumbai</option>
				<option value="surat">Surat</option>
				<option value="kerala">Kerala</option>
				<option value="baroda">Baroda</option>
		</select>
	</div>
</div>
</td>
</tr>

<tr>
<td>
<div class="panel panel-success">
  <div class="panel-heading">Gender</div>
	<div class="panel-body">
<input type="radio" name="btngender" checked value="male">Male</input>
		<input type="radio"  name="btngender" value="female">Female</input>
	</div>
</div>
</td>
</tr>

<tr>
<td>
<div class="panel panel-success">
  <div class="panel-heading">Mobile Number</div>
	<div class="panel-body">
<input type="text" class="form-control" name="txtmno" required placeholder="Enter your mobile no" onblur="return allnumeric(document.form1.txtmno);" />
	</div>
</div>
</td>
</tr>

<tr>
<td>
<div class="panel panel-success">
  <div class="panel-heading">Captcha code</div>
	<div class="panel-body">
<input type="text" class="form-control" name="captcha_code" />
<img src="captcha_code.php" />

	</div>
</div>
</td>
</tr>


</table>

<div class="panel panel-success">
  <div class="panel-heading">Action</div>
	<div class="panel-body">
			
			<button type="submit" class="button btn-success" name="btnsignup" value="Sign Up">Sign Up</button>			
	</div>
</div>


	</div>
</div>
</form>

</body>
</html>