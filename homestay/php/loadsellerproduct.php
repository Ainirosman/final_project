<?php
include_once('dbconnect.php');
$userid = $_POST['userid'];

$sqlloadproduct = "SELECT * FROM tbl_products WHERE pridowner = '$userid' 
ORDER BY prdate DESC";
$result = $conn->query($sqlloadproduct);
	if ($result->num_rows > 0) {
		$productsarray["products"] = array();
		while ($row = $result->fetch_assoc()) {
			$prlist = array();
			$prlist['product_id'] = $row['product_id'];
			$prlist['user_id'] = $row['user_id'];
			$prlist['product_name'] = $row['product_name'];
			$prlist['product_desc'] = $row['product_desc'];
			$prlist['product_price'] = $row['product_price'];
			$prlist['product_delivery'] = $row['product_delivery'];
			$prlist['product_qty'] = $row['product_qty'];
			$prlist['product_state'] = $row['product_state'];
			$prlist['product_local'] = $row['product_local'];
			$prlist['product_lat'] = $row['product_lat'];
			$prlist['product_lat'] = $row['product_lat'];
			$prlist['product_date'] = $row['product_date'];
			array_push($response["products"],$prlist);
		}
		$response = array('status' => 'success', 'data' => $products);
         sendJsonResponse($response);
		}else{
		$response = array('status' => 'failed', 'data' => null);
         sendJsonResponse($response);
	}
	
	function sendJsonResponse($sentArray)
	{
    header('Content-Type: application/json');
    echo json_encode($sentArray);
	}
?>