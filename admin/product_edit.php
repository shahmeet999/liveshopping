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
	
<title>Product Edit</title>

</head>
<?php 
	$pro_id=$_REQUEST["pro_id"];
	//require '../database.php';
	require '../database.php';
	$res=new database();
	$res=$res->view_product($pro_id);
	while($row=mysql_fetch_assoc($res))
	{
		
	
	$pname=$row["pro_name"];
	$pprice=$row["pro_price"];
	$pdesc=$row["descr"];
	$psoh=$row["soh"];
	$pmfg=$row["mfg"];
	$pwar=$row["warranty"];
	$pcolor=$row["color"];
	$pcat=$row["fk_cat_id"];
	$pphoto=$row["pro_photo"];
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

<form action="x1.php?photo=<?php echo $pphoto; ?>"  method="post" enctype="multipart/form-data">

<div class="container">
		<div class="row">
				<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">

<table class="table">

<h1>Product edit Form</h1>

<tr>
<td>Product id</td>
<td><input type="text" class="form-control" readonly value="<?php  echo $pro_id;?>" name="txt_proid"/></td>
</tr>

<tr>
<td>Product Name</td>
<td><input type="text" class="form-control" value="<?php  echo $pname;?>" name="txt_proname"/></td>
</tr>

<tr>
<td>Product Price</td>
<td><input type="text" class="form-control" value="<?php  echo $pprice;?>" name="txt_proprice"/></td>
</tr>

<tr>
<td>Description </td>
<td><textarea name="txt_desc" class="form-control"  rows="5" cols="0"><?php echo $pdesc;?></textarea></td>
</tr>

<tr>
<td>Stock On Hand</td>
<td><input type="number" class="form-control" value="<?php  echo $psoh;?>" name="txt_soh"/></td>
</tr>

<tr>
<td>Manufacture</td>
<td><input type="text" class="form-control" value="<?php  echo $pmfg;?>" name="txt_mfg"/></td>
</tr>

<tr>
<td>Warranty</td>
<td><input type="text" class="form-control" value="<?php  echo $pwar;?>" name="txt_warranty"/></td>
</tr>

<tr>
<td>Product Color</td>
<td>
<select name="txtcolor" class="form-control">

<option value="red" <?php if($pcolor=="red") echo 'selected'; ?> >red</option>
<option value="blue" <?php if($pcolor=="blue") echo 'selected'; ?>  >blue</option>
<option value="black" <?php if($pcolor=="black") echo 'selected'; ?> >black</option>
<option value="white" <?php if($pcolor=="white") echo 'selected'; ?> >white</option>
<option value="gold" <?php if($pcolor=="gold") echo 'selected'; ?> >gold</option>
<option value="space grey" <?php if($pcolor=="space grey") echo 'selected'; ?> >space grey</option>
</td>
</select>
</tr>

<tr>
<td>Product Image</td>
<td>
<img src="<?php echo $pphoto;?>" class="form-control" style="height: 133px; width: 180px;">
<input class="form-control" type="file" name="txtphoto" value="<?php echo $pphoto;?>"/></img>
</img>
</td>
</tr>

<tr>
<td>Category List</td>
<td><select name="txtcat" class="form-control"><br>
<?php 

$obj=new database();
$res=$obj->displaycat1	();
while($row=mysql_fetch_array($res,MYSQL_ASSOC))
{
	echo '<option value="'.$row["cat_id"].'"';
	 if($row["cat_id"]==$pcat)
	echo ' selected';
	echo '>'.$row["cat_name"].'</option>';
}
?>
</td>

<tr>
<td>For Edit data Press here....</td>
<td><input type="submit" name="btnins" value="Edit"/></td>
</tr>
</select>
</tr>			
				</div>
			</div>
		</div>
</form>
</table>
</body>
</html>