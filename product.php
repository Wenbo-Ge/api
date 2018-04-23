<?php
header('Content-Type:application/json');
require_once('db.php');

function response($status,$status_message,$data){
	header('HTTP/1.1'.$status);

	$response['status']=$status;
	$response['status_message']=$status_message;
	$response['database']=$data;
	$response['time']='18.04.18';

	// $json_response=json_encode($response);
	// echo $json_response;
}
	
	
	
if ($_GET['action']=='product' && !empty($_GET['id'])) {
	$id=$_GET['id'];
	$conn=new DBConnection();
	$quantity=$conn->getAllItemsReturnArrById($id);

	if (empty($quantity)) {
		response(200,'Product Not Found', NULL);
	} else {
		response(200,'Product Found', $quantity);

	}
	
}else{
	response(400,'Invalid Request', NULL);
}


?>