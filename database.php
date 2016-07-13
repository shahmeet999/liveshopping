<?php 
class database
{
	public function searchpro($id)
	{
		$con=mysql_connect('localhost','root','');
		mysql_select_db('db_shopping',$con);
		$res=mysql_query("select * from product_tbl where fk_cat_id='$id'",$con);
		return $res;
	}
	
	public function displaybycount()
	{
		$con=mysql_connect('localhost','root','');
		mysql_select_db('db_shopping',$con);
		$res=mysql_query("SELECT COUNT( p.pro_id ) 'cnt' , c.cat_name,c.cat_id
FROM catg_tbl AS c, product_tbl AS p
WHERE p.fk_cat_id = c.cat_id
GROUP BY (
c.cat_name
)",$con);
		return $res;
	}
	public function typeu($txtemailid,$txtpasswd)
	{
		$con=mysql_connect('localhost','root','');
		mysql_select_db('db_shopping',$con);
		$res=mysql_query("select type from user_tbl where email_id='$txtemailid' and password='$txtpasswd'",$con);
		while($row=mysql_fetch_assoc($res))
		{
			$type=$row["type"];
		}
		return $type;
	}
	public  function view_product($proid)
	{
		$con=mysql_connect('localhost','root','');
		mysql_select_db('db_shopping',$con);
		$res=mysql_query("select * from product_tbl where pro_id='$proid'");
		return $res;
		

	}
	public function checkcart($eid,$oid)
	{
		$res=mysql_query("SELECT *
FROM order_tbl
WHERE fk_email_id = '$eid' and fk_pro_id='$oid' and flag='cart'",$this->myconnection());
		return mysql_num_rows($res);
		
	}
	public  function view_product1()
	{
		$con=mysql_connect('localhost','root','');
		mysql_select_db('db_shopping',$con);
		$res=mysql_query("select * from product_tbl");
		return $res;
		

	}
	public function updatecod($eid)
	{
		
		$con=mysql_connect('localhost','root','');
		mysql_select_db('db_shopping',$con);
		$res=mysql_query("update order_tbl set flag='buy' where fk_email_id='$eid' ",$con);
		return $res;
		
	}
	public function countitem($eid)
	{
		$res=mysql_query("SELECT *
FROM order_tbl
WHERE fk_email_id = '$eid' and flag='cart'",$this->myconnection());
		return $res;
		
	}
	public function signup($txtemail,$txtname,$txtpasswd,$txtcity,$btngender,$txtmno)
	{
		$con=mysql_connect('localhost','root','');
		mysql_select_db('db_shopping',$con);
		$res=mysql_query("INSERT INTO user_tbl VALUES('$txtemail','$txtname','$txtpasswd','$txtcity','$btngender','$txtmno','user')");
		return $res;
	}
	
	public function login($txtemailid,$txtpasswd)
	{
	
		$con=mysql_connect('localhost','root','');
		mysql_select_db('db_shopping',$con);
		$res=mysql_query("select * from user_tbl where email_id='$txtemailid' and password='$txtpasswd'");
		$count=mysql_num_rows($res);
		return $count;
	}	
	public function myconnection()
	{
		$con=mysql_connect('localhost','root','');
		mysql_select_db('db_shopping',$con);
		return $con;
	}
	public function viewprofile($emailid)
	{
		$con=new database();
		$con=$con->myconnection();
		//$con=myconnection();
		$res=mysql_query("select * from user_tbl where email_id='$emailid'",$con);
		return $res;
		
	}
	
	public function deletecart1($oid)
	{
		
		$res=mysql_query("delete from order_tbl where pk_order_id ='$oid'",$this->myconnection());
		return $res;
	}
	public function payamt($eid)
	{
		$res=mysql_query("select sum( amount ) 'amt'
from order_tbl where fk_email_id='$eid' and flag='cart'",$this->myconnection());
		return $res;
		
	}
public function payamt1($eid)
	{
		$res=mysql_query("select sum( amount ) 'amt'
from order_tbl where fk_email_id='$eid' and flag='buy'",$this->myconnection());
		return $res;
		
	}		
	public function displaycart($eid)
	{
		$res=mysql_query("SELECT o . * , p . *
FROM order_tbl AS o, product_tbl AS p
WHERE p.pro_id = o.fk_pro_id
AND o.flag = 'cart'
AND fk_email_id = '$eid'",$this->myconnection());
		return $res;
	}
	
	public function displaypurchase($eid)
	{
		
		$res=mysql_query("SELECT o . * , p . *
FROM order_tbl AS o, product_tbl AS p
WHERE p.pro_id = o.fk_pro_id
AND o.flag = 'buy'
AND fk_email_id = '$eid'",$this->myconnection());
		return $res;
	}
	
	public function editprofile($uname,$txtcity,$gender,$mno)
	{
	
		$emailid=$_SESSION["emailid"];
		$con=mysql_connect('localhost','root','');
		mysql_select_db('db_shopping',$con);
		$res=mysql_query("update user_tbl set u_name='$uname',city='$txtcity',gender='$gender',mobileno='$mno' where email_id='$emailid' ");
		return $res;
	}
	public function displayadmin()
	{
		$con=new database();
		$con=$con->myconnection();
		$res=mysql_query("select * from user_tbl where type='user' ",$con);
		return $res;
	}
	
	public function deleteuser($emailid)
	{
		$con=new database();
		$con=$con->myconnection();
		$res=mysql_query("delete from user_tbl where email_id='$emailid'",$con);
		return $res;
		
	}
	
	public function displaycat($catid)
	{
		
		$con=new database();
		$con=$con->myconnection();
		$res=mysql_query("select * from catg_tbl where cat_id='$catid'");
		return $res; 
	}
	public function displaycat1()
	{

		$res=mysql_query("select * from catg_tbl",$this->myconnection());
		return $res; 
	}
	public function deletecatg($catid)
	{
		
		$con=new database();
		$con=$con->myconnection();
		$res=mysql_query("delete from catg_tbl where cat_id='$catid'",$con);
		return $res; 
	}
	public function deletepro($pro_id)
	{
		
		$con=new database();
		$con=$con->myconnection();
		$res=mysql_query("delete from product_tbl where pro_id='$pro_id'",$con);
		return $res; 
	}
	
	public function updatecatg($catid,$catname)
	{
		$con=new database();
		$con=$con->myconnection();
		$res=mysql_query("update catg_tbl set cat_name='$catname' where cat_id='$catid'",$con);
		return $res; 
		
	}
	
	public function insert_product($pname,$pprice,$pdesc,$psoh,$pmfg,$pwar,$pphoto,$pcolor,$pcat)
	{
		$res=mysql_query("insert into product_tbl values('NULL','$pname','$pprice','$pdesc','$psoh','$pmfg','$pwar','$pcolor','$pphoto','$pcat')",$this->myconnection());
		return $res; 
	}
	public function insertcatg($catname)
	{
			
		$res=mysql_query("insert into catg_tbl values('NULL','$catname')",$this->myconnection());
		return $res; 		
	}
	
	public function displaypro()
	{
		
		$con=new database();
		$con=$con->myconnection();
		$res=mysql_query("select p.* , c.cat_name from product_tbl as p,catg_tbl as c where p.fk_cat_id=c.cat_id",$con);
		return $res;
	}
	public function prodelete($proid)
	{
		$con=new database();
		$con=$con->myconnection();
		$res=mysql_query("delete from product_tbl where pro_id='$proid'",$con);
			
	}
	
	public function wishlist_add($amt,$date,$id,$eid,$qty,$flag)
	{
		
		$res=mysql_query("insert into order_tbl values('NULL','$amt','$date','$id','$eid','$qty','$flag')",$this->myconnection());
		return $res;
	}
}
?>