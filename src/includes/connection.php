<?php
$config = require __DIR__ . '/../config/db.php';

$conn = new mysqli($config['host'], $config['user'], $config['pass'], $config['dbname']);

if ($conn->connect_error) {
	die("Database connection failed: " . $conn->connect_error);
}