<?php
/*if(isset($_POST['delall']))
{
 $cnt=array();
 $cnt=count($_POST['chk']);
 
//echo $cnt;
 for($i=0;$i<$cnt;$i++)
  {
     	$del_id=$_POST['chk'][$i];
     	$con=mysql_connect('localhost','root','');
			mysql_select_db('demo2',$con);
		$res=mysql_query("delete from student_tbl where rno='$del_id'");
		
  }
  header('Location:productdetail.php');
}
	*/
	
	if (count($_POST["chk"]) > 0 ) {
  $all = implode(",", $_POST["chk"]);
  $con=mysql_connect('localhost','root','');
			mysql_select_db('db_shopping',$con);
		$res=mysql_query("delete from catg_tbl where cat_id IN($all)");
header('Location:catnamelist.php');

}
		

?>
