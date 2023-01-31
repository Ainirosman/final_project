<?php
include_once('dbconnect.php');

$sqlloadproduct = "SELECT * FROM tbl_products INNER JOIN tbl_users ON tbl_products.pridowner =
tbl_users.user_id ORDER BY tbl_products.prdate DESC";

$result = $conn->query($sqlloadproduct);
if($result->num >0){
	$products["products"] = array();
	while($row = $result->fetch_assoc()){
		$prlist = array();
		$prlist['prid'] = $row['prid'];
		$prlist['prname'] = $row['prname'];
		$prlist['pridowner'] = $row['pridowner'];
		$prlist['user_name'] = $row['user_name'];
		$prlist['prdesc'] = $row['prdesc'];
		$prlist['user_email'] = $row['user_email];
		$prlist['prdesc'] = $row['prprice'];
		$prlist['prdesc'] = $row['prqty'];
		$prlist['prdesc'] = $row['prdel'];
		$prlist['prdesc'] = $row['prstate'];
		$prlist['prdesc'] = $row['prloc'];
		$prlist['prdesc'] = $row['prlat'];
		$prlist['prdesc'] = $row['prlong'];
		$prlist['prdesc'] = $row['prdate'];
		
		array_push($products['products'], $prlist);
	}
	$response = array ('status' => 'success', 'data' => $products);
	sendJsonResponse($response);
}else{
	$response = array ('status' => 'failed', 'data' => null);
	sendJsonResponse($response);
}

function sendJsonResponse($sentArray){
	header ('Content-Type: application/json');
	echo json_encode($sentArray);
}
?>