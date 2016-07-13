<!doctype html>
<html>
<head>
<link href="Content/bootstrap.css" rel="stylesheet"/>
<script src="Scripts/jquery-1.9.1.js"></script>
<script src="Scripts/bootstrap.js"></script>
</head>
<body class="container">
<div class="row">
<div class="col-md-3">

</div>
<div class="col-md-9">
<div class="panel panel-default">
  <div class="panel-body">
    <div class="row">
  <?php 
  require 'database.php';
  $obj=new database();
  $res=$obj->view_product1();
  while($row=mysql_fetch_assoc($res))
  {
 echo' <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="'.$row["pro_photo"].'" alt="...">
      <div class="caption">
        <h3>'.$row["pro_name"].'</h3>
        <p>...</p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
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

</body>
</html>