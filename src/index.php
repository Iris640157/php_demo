<?php
$host = "db";
$user = "php_user";
$password = "secret";
$database = "php_app";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

echo "Connected to MySQL successfully!";
?>