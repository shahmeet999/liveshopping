<?php
if(isset($_POST["btnsubmit"]))
{
$eid=$_REQUEST["emailid"];
require '../database.php';
$resdet=new database();
$ans=$resdet->deleteuser($eid);
header('location:displayuser.php');
}

?>