<?php
session_start();
include("config.php");
$db = new dbObj();
$conn =  $db->getConnstring();
$user_id=$_SESSION['ID'];
extract($_REQUEST);





$date=date("Y-m-d");
$result=mysqli_query($conn,"select count(*) as noofrow from performance where employe_id='$employe_id' and month_id='$month_id'");

$row=mysqli_fetch_assoc($result);

if($row['noofrow'] > 0){

    die("<div class='alert alert-danger'> This Month Reports Already Submited.. </div>");

}


   
$sql="INSERT INTO `performance` (`ID`, `employe_id`, `manager_id`, `month_id`, `target`, `working_efficient`, `performance`, `presenty`, `customer_interaction`, `overtime`, `extra_sales`, `date`) VALUES (NULL, '$employe_id', '$user_id', '$month_id', '$target', '$working_efficient', '$performance', '$presenty', '$customer_interaction', '$overtime','$extra_sales','$date');";

//echo $sql;die;

 
$result=mysqli_query($conn,$sql);

if($result){
  	echo "<div class='alert alert-success'>Your Post send  Successfully...</div>";
	 
}else{
	
  	echo "<div class='alert alert-danger'>Internal Server Error</div>";
	

}




?>