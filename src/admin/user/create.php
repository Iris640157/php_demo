<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$name  = $_POST['name'];
	$email = $_POST['email'];

	$stmt = $conn->prepare("INSERT INTO users (name,email) VALUES (?,?)");
	$stmt->bind_param("ss", $name, $email);
	$stmt->execute();
	header("Location: index.php");
	exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Create User</title></head>
<body>
<h1>Add User</h1>
<form method="post">
	Name: <input type="text" name="name" required><br>
	Email: <input type="email" name="email" required><br>
	<input type="submit" value="Save">
</form>
<a href="../user/index.php">Back</a>
</body>
</html>