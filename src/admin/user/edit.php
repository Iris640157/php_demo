<?php
$id = $_GET['id'] ?? 0;

// Fetch existing user
$stmt = $conn->prepare("SELECT * FROM users WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$name  = $_POST['name'];
	$email = $_POST['email'];
	$stmt = $conn->prepare("UPDATE users SET name=?, email=? WHERE id=?");
	$stmt->bind_param("ssi", $name, $email, $id);
	$stmt->execute();
	header("Location: index.php");
	exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Edit User</title></head>
<body>
<h1>Edit User</h1>
<form method="post">
	Name: <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required><br>
	Email: <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required><br>
	<input type="submit" value="Update">
</form>
<a href="../user/index.php">Back</a>
</body>
</html>