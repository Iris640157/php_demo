<?php
require __DIR__ . '/../includes/connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Public Site</title>
	<link rel="stylesheet" href="../styles/style.css">
</head>
<body>
<h1>Welcome to Public Site!</h1>
<p>Current server time:
	<?php
	$result = $conn->query("SELECT NOW() AS `current_time`");
	echo $result->fetch_assoc()['current_time'];
	?>
</p>
</body>
</html>