<?php


// require '../database.php';

include_once("db_connect.php");

// $client_id = ;


if( !isset($_REQUEST['empid']) ){
	echo '{}';
	return;
}

	$sql = "SELECT client_name, client_email, item_order from client";

	$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
	
	// $data = array();
	while( $rows = mysqli_fetch_assoc($resultset) ) { 
		
		?>
	
		<p><?php echo $rows["client_name"]; ?></p>
		<br>	
		
		<?php }	
	

	// while( $rows = mysqli_fetch_assoc($resultset) ) {
	// 	$data = $rows;
	// }
	
	echo json_encode($data);
	return;

	?>