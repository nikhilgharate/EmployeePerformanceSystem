<?php
session_start();
include("config.php");
$db = new dbObj();
$conn =  $db->getConnstring();
$manager_id = $_SESSION['ID'];

if(isset($_REQUEST['department'])){
 $sql="select count(*) as counter from department";
}elseif(isset($_REQUEST['manager'])){
 $sql="select count(*) as counter from user where type='manager'";
}elseif(isset($_REQUEST['employee'])){
 $sql="select count(*) as counter from user where (type='employee' and manager_id='$manager_id')";
}

//echo $sql;die;

$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
echo $row['counter'];
?>