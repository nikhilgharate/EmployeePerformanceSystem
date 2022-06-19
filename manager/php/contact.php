<?php
require_once("config.php");
    $db = new dbObj();
	$conn =  $db->getConnstring();
extract($_REQUEST);
if(!empty($name) && !empty($email) && !empty($email) && !empty($mobile) && !empty($message)){

 $date=date('Y-m-d');
 $time=date('h:i A');


	$sql="INSERT INTO `contact` (`ID`, `name`, `email`, `subject`, `mobile`, `message`, `date`, `time`) VALUES (NULL, '$name', '$email', '$subject', '$mobile', '$message', '$date', '$time');";
 $result=mysqli_query($conn,$sql);
 if($result){
	echo "<div class='alert alert-success'>Contact Detail submited successfully - we will contact you as soon as possible - thanks for using online auction system.</div>";
  
 }else{
	echo "<div class='alert alert-danger'>Server Not Responding-Database.</div>";

 }
 

}else{
	echo "<div class='alert alert-danger'> Empty fields not allowed- please re-try.</div>";
}


