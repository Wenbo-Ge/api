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
	
	
	
if ($_GET['action']=='delete' && !empty($_GET['id'])) {
	$id=$_GET['id'];
	$conn=new DBConnection();
	$new=$conn->deleteItem($id);

	if (empty($new)) {
		response(200,'Product Not Found', NULL);
	} else {
		response(200,'Product Deleted', $new);

	}
	
}else{
	response(400,'Invalid Request', NULL);
}

?>