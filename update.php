<?php

header('Content-Type:application/json');
require_once('db.php');

function response($status,$status_message,$data){
	header('HTTP/1.1'.$status);

	$response['status']=$status;
	$response['status_message']=$status_message;
	$response['database']=$data;
	$response['time']='18.04.18';

	$json_response=json_encode($response);
	echo $json_response;
}
	
	
	
if ($_GET['action']=='update' && !empty($_GET['id']) && !empty($_GET['new_quantity'])) {
	$id=$_GET['id'];
	$new_quantity=$_POST['new_quantity'];
	$conn=new DBConnection();
	$new=$conn->updateItem($id,$new_quantity);

	if (empty($new)) {
		response(200,'Product Not Found', NULL);
	} else {
		response(200,'Product updated', $new);

	}
	
}else{
	response(400,'Invalid Request', NULL);
}

?>