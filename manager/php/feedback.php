<?php
include("config.php");
$db = new dbObj();
$conn =  $db->getConnstring();

extract($_REQUEST);
if(!empty($subject) && !empty($mobile) && !empty($description) ){



$sql="INSERT INTO `feedback` (`ID`, `subject`, `mobile`, `description`) VALUES (NULL, '$subject', '$mobile', '$description');";
 
$result=mysqli_query($conn,$sql);

if($result){
  	echo "<div class='alert alert-success'>Your feedback submited  Successfully...</div>";
	 
}else{
	
  	echo "<div class='alert alert-danger'>Internal Server Error</div>";
	

}

}else{
	echo "<div class='alert alert-danger'> Empty Value not Allowed </div>";
}


?>