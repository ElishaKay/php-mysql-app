<?php

session_start();

require 'database.php';
 
include 'header.php';

if( isset($_SESSION['client_id']) ){

	$records = $conn->prepare('SELECT client_id,client_email,client_password FROM client WHERE client_id = :client_id');
	$records->bindParam(':client_id', $_SESSION['client_id']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$user = NULL;

	if( count($results) > 0){
		$user = $results;
	}

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome to your Web App</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>
<body>

	<div class="header">

	</div>

	<?php if( !empty($user) ): ?>

		<br />Welcome <?= $user['client_email']; ?> 
		<br /><br />You are successfully logged in!
		<br /><br />


	<?php include 'clientDetails.php'; ?>


<br>
<br>
<br>

		<a href="logout.php">Logout?</a>
		<a href="dropdown/">Go to the awesome dropdown</a>
		<a href="drag-and-drop/">Check out the Drag and Drop</a>


	<?php else: ?>

		<h1>Please Login or Register</h1>
		<a href="login.php">Login</a> or
		<a href="register.php">Register</a>

	<?php endif; ?>

</body>
</html>