<?php

		
	$photo=$_REQUEST["photo"];
	$proid=$_POST["txt_proid"];
	$pname=$_POST["txt_proname"];
	$pprice=$_POST["txt_proprice"];
	$pdesc=$_POST["txt_desc"];
	$psoh=$_POST["txt_soh"];
	$pmfg=$_POST["txt_mfg"];
	$pwar=$_POST["txt_warranty"];
	$pcol=$_POST["txtcolor"];
	$pcat=$_POST["txtcat"];
	if($_FILES["txtphoto"]["name"]!="")
{
	$photo="../images/".$_FILES["txtphoto"]["name"];

	move_uploaded_file($_FILES["txtphoto"]["tmp_name"],$photo);
}	
	
		$con=mysql_connect('localhost','root','');
		mysql_select_db('db_shopping',$con);
		$res=mysql_query("update product_tbl set pro_name='$pname',pro_price='$pprice',descr='$pdesc',soh='$psoh',mfg='$pmfg',warranty='$pwar',color='$pcol',pro_photo='$photo',fk_cat_id='$pcat' where pro_id='$proid' ");
		if($res==1)
		{
			
			header('location:product_display.php');
		}
		else
		{
			echo "na thayu";
			
		}

?>
