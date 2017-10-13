<?php

session_start();

if( isset($_SESSION['client_id']) ){
	header("Location: /");
}

require 'database.php';

$message = '';

if(!empty($_POST['client_email']) && !empty($_POST['client_password'])):
	
	// Enter the new user in the database
	$sql = "INSERT INTO client (client_email, client_password) VALUES (:client_email, :client_password)";
	$stmt = $conn->prepare($sql);

	$stmt->bindParam(':client_email', $_POST['client_email']);
	$stmt->bindParam(':client_password', password_hash($_POST['client_password'], PASSWORD_BCRYPT));

	if( $stmt->execute() ):
		$message = 'Successfully created new user';
	else:
		$message = 'Sorry there must have been an issue creating your account';
	endif;

endif;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Register Below</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>
<body>

	<div class="header">
		<a href="/">Your App Name</a>
	</div>

	<?php if(!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>

	<h1>Register</h1>
	<span>or <a href="login.php">login here</a></span>

	<form action="register.php" method="POST">
		
		<input type="text" placeholder="Enter your email" name="client_email">
		<input type="password" placeholder="and password" name="client_password">
		<input type="password" placeholder="confirm password" name="confirm_client_password">
		<input type="submit">

	</form>

</body>
</html>