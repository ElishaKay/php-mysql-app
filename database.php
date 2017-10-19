<!-- Does this get ignored -->
<!-- //sample comment -->


<?php
$server = 'localhost';
$username = 'root';
$password = 'pokemon7';
$database = 'moviehol_PHP-Login';

try{
	$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch(PDOException $e){
	die( "Connection failed: " . $e->getMessage());
}