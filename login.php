<?php

session_start();

if( isset($_SESSION['client_id']) ){
	header("Location: /");
}

require 'database.php';

if(!empty($_POST['client_email']) && !empty($_POST['client_password'])):
	
	$records = $conn->prepare('SELECT client_id,client_email,client_password FROM client WHERE client_email = :client_email');
	$records->bindParam(':client_email', $_POST['client_email']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$message = '';
	
// 	die(print_r($results, true ));

	if(count($results) > 0 && password_verify($_POST['client_password'], $results['client_password']) ){

    	$_SESSION['client_id'] = $results['client_id'];
		header("Location: /");
	}
	
    else if(count($results) > 0 && $_POST['client_password'] == $results['client_password'])  {
		$message = 'This also matches something from the client table';
    
    //take client to his custom page and set his client id in the session variable
    	$_SESSION['client_id'] = $results['client_id'];
		header("Location: /");
    
	} else {
		$message = 'Sorry, those credentials do not match';
	}

endif;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Below</title>
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

	<h1>Login</h1>
	<span>or <a href="register.php">register here</a></span>

	<form action="login.php" method="POST">
		
		<input type="text" placeholder="Enter your email" name="client_email">
		<input type="password" placeholder="and password" name="client_password">

		<input type="submit">

	</form>

</body>
</html>