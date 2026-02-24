<?php
require __DIR__ . '/../includes/connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Admin Dashboard</title>
	<link rel="stylesheet" href="../styles/admin.css">
</head>
<body>
<h1>Admin Dashboard</h1>
<p>Welcome, admin! Current server time:
	<?php
	$result = $conn->query("SELECT NOW() AS `current_time`");
	echo $result->fetch_assoc()['current_time'];
	?>
</p>
</body>
</html>