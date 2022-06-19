<?php
session_start();
include("config.php");
$db = new dbObj();
$conn =  $db->getConnstring();
$user_id=$_SESSION['ID'];
extract($_REQUEST);
if(!empty($title) && !empty($type) && !empty($description) && !empty($user_id) ){



  $tmp_name=$_FILES['img']['tmp_name'];
  
  //echo $_SERVER['SERVER_NAME'];
    $randome=rand(100,9999);
    $file_name=$randome.$_FILES['img']['name'];
   
    move_uploaded_file($tmp_name, "../uploads/".$file_name);


   
$sql="INSERT INTO `leave` (`ID`, `img`, `type`, `title`, `description`,`answer`,`user_id`,`fdate`,`tdate`) VALUES (NULL, '$file_name', '$type', '$title', '$description','pending','$user_id','$fdate','$tdate');";
 
$result=mysqli_query($conn,$sql);

if($result){
  	echo "<div class='alert alert-success'>Your Post send  Successfully...</div>";
	 
}else{
	
  	echo "<div class='alert alert-danger'>Internal Server Error</div>";
	

}

}else{
	echo "<div class='alert alert-danger'> Empty Value not Allowed </div>";
}


?>