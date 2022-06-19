<?php
session_start();
include("config.php");
$db = new dbObj();
$conn =  $db->getConnstring();

if(isset($_REQUEST['department'])){
 $sql="select count(*) as counter from department";
}elseif(isset($_REQUEST['manager'])){
 $sql="select count(*) as counter from user where type='manager'";
}elseif(isset($_REQUEST['employee'])){
 $sql="select count(*) as counter from user where type='employee'";
}elseif(isset($_REQUEST['feedback'])){
 $sql="select count(*) as counter from `feedback`";
}elseif(isset($_REQUEST['contact'])){
 $sql="select count(*) as counter from `contact`";
}

$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
echo $row['counter'];
?>