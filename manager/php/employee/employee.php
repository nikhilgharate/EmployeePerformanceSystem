<?php
session_start();
	//include connection file 
	include_once("../config.php");
		
	$db = new dbObj();
	$connString =  $db->getConnstring();

	$params = $_REQUEST;
	
	$action = isset($params['action']) != '' ? $params['action'] : '';
	$empCls = new Employee($connString);

	switch($action) {
	 case 'add':
		$empCls->insertEmployee($params);
	 break;
	 case 'edit':
		$empCls->updateEmployee($params);
	 break;
	 case 'delete':
		$empCls->deleteEmployee($params);
	 break;
	 default:
	 $empCls->getEmployees($params);
	 return;
	}
	
	class Employee {
	protected $conn;
	protected $data = array();
	function __construct($connString) {
	$this->conn = $connString;
	}
	
	public function getEmployees($params) {
		
		$this->data = $this->getRecords($params);
		echo json_encode($this->data);
	
	}
	function insertEmployee($params) {
		
  extract($params);
  $manager_id = $_SESSION['ID'];

  $res=mysqli_query($this->conn,"select * from user where user_name='$user_name'");

  $num_rows=mysqli_num_rows($res);
  
  if($num_rows>0){
  	die('{"msg":"Username Id aleady exist","type":"warning","error":"0"}');
  }


 $result = mysqli_query($this->conn,"select dept_id from user where ID='$manager_id'");

 $manager=mysqli_fetch_assoc($result);
 $dept_id = $manager['dept_id'];
 

  
  $sql="INSERT INTO `user` (`ID`,`name`,`user_name`, `mobile`, `email`, `password`,`address`,`gender`,`manager_id`,`city`,`age`,`dept_id`,`post`) VALUES (NULL,'$name','$user_name', '$mobile', '$email', '$password','$address','$gender','$manager_id','$city','$age','$dept_id','$post');";

  //echo $sql;die;
  

$result=mysqli_query($this->conn,$sql) or die('{"msg":"Data Not inserted","type":"warning","error":"0"}');
if($result){
	 echo '{"msg":"saved successfully","type":"success","error":"1"}';
}else{
	
	 echo  '{"msg":"Internal Server error - database","type":"warning","error":"0"}';

}


	}
	
	
	function getRecords($params) {
       $qtot = mysqli_query($this->conn,"SET NAMES utf8"); 

		$rp = isset($params['rowCount']) ? $params['rowCount'] : 10;
		
		if (isset($params['current'])) { $page  = $params['current']; } 
		else { 
			$page=1;
			$params['current']=0; 
		};  
        $start_from = ($page-1) * $rp;
		
		$sql = $sqlRec = $sqlTot = $where = '';


		$manager_id = $_SESSION['ID'];
		
		$where .=" WHERE (type='employee' and manager_id='$manager_id')";
		if( !empty($params['searchPhrase']) ) {   
			$where .=" and ";
			$where .=" ( ID LIKE '".$params['searchPhrase']."%' "; 
			$where .=" OR name LIKE '".$params['searchPhrase']."%'";   
			$where .=" OR user_name LIKE '".$params['searchPhrase']."%'";   
			$where .=" OR mobile LIKE '".$params['searchPhrase']."%'";   
			
			$where .=" OR email LIKE '".$params['searchPhrase']."%' )";
	   }
	   if( !empty($params['sort']) ) {  
			$where .=" ORDER By ".key($params['sort']) .' '.current($params['sort'])." ";
		}else{

            $where .= "ORDER BY ID DESC";

		}
	   // getting total number records without any search
		$sql = "SELECT *,(select name from department where ID=user.dept_id) as dept_name,(select location from department where ID=user.dept_id) as location,(select name from user as A where A.ID=user.manager_id) as manager_name FROM `user` ";




		$sqlTot .= $sql;
		$sqlRec .= $sql;
		
		//concatenate search sql if value exist
		if(isset($where) && $where != '') {

			$sqlTot .= $where;
			$sqlRec .= $where;
		}
		if ($rp!=-1)
		$sqlRec .= " LIMIT ". $start_from .",".$rp;
		
		
		$qtot = mysqli_query($this->conn, $sqlTot) or die("error to fetch tot employees data");
		$queryRecords = mysqli_query($this->conn, $sqlRec) or die("error to fetch employees data");
		
		while( $row = mysqli_fetch_assoc($queryRecords) ) { 



			$data[] = $row;
		}
if(empty($data)){
  $data=array();
}
		$json_data = array(
			"current"            => intval($params['current']), 
			"rowCount"            => 10, 			
			"total"    => intval($qtot->num_rows),
			"rows"            => $data   // total data array
			);
		
		return $json_data;
	}



function updateEmployee($params) {
		
   mysqli_query($this->conn,"SET NAMES utf8");

   $manager_id = $_SESSION['ID'];

  $result = mysqli_query($this->conn,"select dept_id from user where ID='" .$manager_id."'");

 $manager=mysqli_fetch_assoc($result);
 
 $params["dept_id"]=$manager['dept_id'];


 $sql = "UPDATE `user` SET `user_name` = '".$params["user_name"]."',
		`name` = '" . $params["name"]."',
		`dept_id` = '" . $params["dept_id"]."',
		`gender` = '" . $params["gender"]."',
		`post` = '" . $params["post"]."',
		`age` = '" . $params["age"]."',
		`address` = '" . $params["address"]."',
		`mobile` = '" . $params["mobile"]."',
		`password` = '" . $params["password"]."',
		`active` = '" . $params["active"]."'
		WHERE ID='".$params["edit_ID"]."'";

		
   $result = mysqli_query($this->conn, $sql) or die("error to update employee data");

 die('{"msg":"Updated successfully","type":"success","error":"1"}');


	
}
	
	function deleteEmployee($params) {

        

		$data = array();
		//print_R($_POST);die;
		$sql = "delete from `user` WHERE ID='".$params["id"]."'";
		
		echo $result = mysqli_query($this->conn, $sql) or die("error to delete employee data");
	}
}
?>
	