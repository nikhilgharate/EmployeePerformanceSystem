<?php
include("config.php");
$db = new dbObj();
$conn =  $db->getConnstring();
extract($_REQUEST);
if(!empty($user_name) && !empty($email) && !empty($mobile) && !empty($password)){

   

  $res=mysqli_query($conn,"select * from user where email='$email'");
  
  $num_rows=mysqli_num_rows($res);
  if($num_rows>0){

  	die("<div class='alert alert-danger'> Email Id aleady exist</div>");
  	

  }



    $tmp_name=$_FILES['img']['tmp_name'];

    $randome=rand(100,9999);
    $file_name=$randome.$_FILES['img']['name'];
   
    move_uploaded_file($tmp_name, "../uploads/".$file_name);


  $sql="INSERT INTO `user` (`ID`, `user_name`, `mobile`, `email`, `password`,`img`) VALUES (NULL, '$user_name', '$mobile', '$email', '$password','$file_name');";
 


$result=mysqli_query($conn,$sql);
if($result){
  	echo "<div class='alert alert-success'>User Register Successfully click to login...</div>";
	 
}else{
	
  	echo "<div class='alert alert-danger'>Internal Server Error</div>";
	

}

}else{
	echo "<div class='alert alert-danger'> Empty Value not Allowed </div>";
}


?>