<?php


require 'database.php';

$records = $conn->prepare("select * from client limit 10");

// $records->bindParam(':client_id', $_SESSION['client_id']);
	
$records->execute();

$results = $records->fetch(PDO::FETCH_ASSOC);

var_dump($results);


?>

