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

 <!--   <link href="../Content/bootstrap.css" rel="stylesheet" />

    <script src="../Scripts/jquery-1.9.1.js"></script>

    <link href="../Content/bootstrap.css" rel="stylesheet" />

	 <script src="../Scripts/bootstrap.js"></script> -->
	 
	 <link href="../Content/bootstrap.min.css" rel="stylesheet">
    <link href="../css/jquery.dataTables_themeroller.css" rel="stylesheet">
    <link href="../css/endless.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <script src="../js/jquery-1.10.2.min.js"></script>
  <script src="../Scripts/bootstrap.min.js"></script>
  <script src='../js/jquery.dataTables.min.js'></script>	 
  
  <script type="text/javascript ">
        $(function () {
            $('#dataTable').dataTable({
                "bJQueryUI": true,
                "sPaginationType": "full_numbers"
            });

            $('#chk-all').click(function () {
                if ($(this).is(':checked')) {
                    $('#responsiveTable').find('.chk-row').each(function () {
                        $(this).prop('checked', true);
                        $(this).parent().parent().parent().addClass('selected');
                    });
                }
                else {
                    $('#responsiveTable').find('.chk-row').each(function () {
                        $(this).prop('checked', false);
                        $(this).parent().parent().parent().removeClass('selected');
                    });
                }
            });
        }); 

</script>

<script type="text/javascript">
       $(document).ready(function () { 

  // binding the check all box to onClick event
    $(".chkhead").click(function () {

    var checkAll = $(".chkhead").prop('checked');
    if (checkAll) {
      $(".checkboxes").prop("checked", true);
    } else {
      $(".checkboxes").prop("checked", false);
    } 

    });

    // if all checkboxes are selected, then checked the main checkbox class and vise versa
    $(".checkboxes").click(function(){

        if($(".checkboxes").length == $(".subscheked:checked").length) {
            $(".chk_all").attr("checked", "checked");
        } else {
            $(".chk_all").removeAttr("checked");
        }

    });

});

    </script>
	
<title>Category Name List</title>

</head>


<body>

<form action="delallcat.php" method="post">



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
            <li><a href="deletecat.php">Delete Category</a></li>
            
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
<h3>Categories List</h3>
        <center><table class="table" id="dataTable">

		<thead>
<tr>
    <th><input type="checkbox" class="chkhead" name="chkhead" style="opacity:1;margin-top: -16px;"></th>
<th>Categories Id</th>
<th>Categories Name</th>
<th>Action</th>
</tr>
</thead>

<tbody>
<?php 

//$emailid=$_SESSION["emailid"];

$con=mysql_connect('localhost','root','');
mysql_select_db('db_shopping',$con);
$res=mysql_query("select * from catg_tbl",$con);
while($row=mysql_fetch_array($res,MYSQL_ASSOC))
{
	echo '<tr>';
	   echo '<td><input type="checkbox" class="checkboxes" name="chk[]"  value="'.$row["cat_id"].'" style="opacity:1";/>';    
		echo '<td>'.$row["cat_id"].'</td>';
echo '<td>'.$row["cat_name"].'</td>';
echo '<td><a href="updatecat.php?catid='.$row["cat_id"].'">Update</a></td>';
	echo '</tr>';
}

?>

	</tbody>
</table>
<center><input type="submit" name="delall" value="DeleteAll" class="btn btn-danger"/></center>
</div>
<div class="col-md-0"></div>
</div>

</div>
 
</form>

</body>

</html>
