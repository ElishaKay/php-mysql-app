<?php


// require '../database.php';

include_once("db_connect.php");

// $client_id = ;


if( !isset($_REQUEST['empid']) ){
	echo '{}';
	return;
}

	$sql = "SELECT client_name, client_email from client WHERE client_id = '".$_REQUEST['empid']."'";

	$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
	
	$data = array();
	
	while( $rows = mysqli_fetch_assoc($resultset) ) {
		$data = $rows;
	}
	
	echo json_encode($data);
	return;

	?>