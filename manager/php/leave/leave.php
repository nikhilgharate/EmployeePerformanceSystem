
<?php
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
		
		 
		
		if( !empty($params['searchPhrase']) ) {   
			$where .=" WHERE ";
			$where .=" ( ID LIKE '".$params['searchPhrase']."%' "; 
			$where .=" OR type LIKE '".$params['searchPhrase']."%'";   
			$where .=" OR title LIKE '".$params['searchPhrase']."%'";   
			$where .=" OR description LIKE '".$params['searchPhrase']."%'";   
			$where .=" OR answer LIKE '".$params['searchPhrase']."%' )";
	   }
	   if( !empty($params['sort']) ) {  
			$where .=" ORDER By ".key($params['sort']) .' '.current($params['sort'])." ";
		}else{

            $where .= "ORDER BY ID DESC";

		}
	   // getting total number records without any search
		$sql = "SELECT *,(select user_name from user where ID=leave.user_id) as user_name FROM `leave` ";
		$sqlTot .= $sql;
		$sqlRec .= $sql;
		
		//concatenate search sql if value exist
		if(isset($where) && $where != '') {

			$sqlTot .= $where;
			$sqlRec .= $where;
		}
		if ($rp!=-1)
		$sqlRec .= " LIMIT ". $start_from .",".$rp;
		
		//echo $sqlTot;
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
		
  
  	$sql = "UPDATE `leave` SET `answer` = '".$params["answer"]."'
		WHERE ID='".$params["edit_ID"]."'";

  

   $result = mysqli_query($this->conn, $sql) or die("error to update employee data");

 die('{"msg":"Updated successfully","type":"success","error":"1"}');


	
}
	
	function deleteEmployee($params) {

        

		$data = array();	
		//print_R($_POST);die;
		$sql = "delete from `leave` WHERE ID='".$params["id"]."'";
		
		echo $result = mysqli_query($this->conn, $sql) or die("error to delete employee data");
	}
}
?>
	