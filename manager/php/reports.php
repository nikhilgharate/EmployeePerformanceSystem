<?php
session_start();
include("config.php");
$db = new dbObj();
$conn =  $db->getConnstring();
$user_id=$_SESSION['ID'];
extract($_REQUEST);


if(!empty($employe_id) && !empty($month_id) && !empty($user_id)){
$date=date("Y-m-d");
$result=mysqli_query($conn,"select * from performance where employe_id='$employe_id' and month_id='$month_id'");
$row=mysqli_fetch_assoc($result);

//


if(!empty($row)){
	extract($row);

	$per = ($presenty/30)*100;
	$x = ($per*$max_value)/100;

	$results=$target+$working_efficient+$performance+$x+$customer_interaction+$overtime+$extra_sales;

	
	if($results >= 25){

		echo "<div class='alert alert-success'>Excellent Performance</div>";


	}elseif($results >= 20){


		echo "<div class='alert alert-info'>Good Performance</div>";


	}elseif($results >= 18){


		echo "<div class='alert alert-warning'>Fair Performance</div>";

	}else{

		echo "<div class='alert alert-danger'>Bad Performance</div>";

	}



    
	 
}else{

	 die("<div class='alert alert-danger'> This Month Reports Not Found.. </div>");

}


   
//$sql="INSERT INTO `performance` (`ID`, `employe_id`, `manager_id`, `month_id`, `target`, `working_efficient`, `performance`, `presenty`, `customer_interaction`, `overtime`, `extra_sales`, `date`) VALUES (NULL, '$employe_id', '$user_id', '$month_id', '$target', '$working_efficient', '$performance', '$presenty', '$customer_interaction', '$overtime','$extra_sales','$date');";


}else{
	echo "<div class='alert alert-danger'> Empty Value not Allowed </div>";
}


?>