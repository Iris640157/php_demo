<?php
// Fetch all users
$result = $conn->query("SELECT * FROM users");
?>
<!DOCTYPE html>
<html>
<head><title>Users CRUD</title></head>
<body>
<h1>Users</h1>
<a href="create.php">Add New User</a>
<table border="1" cellpadding="5">
	<tr><th>ID</th><th>Name</th><th>Email</th><th>Actions</th></tr>
	<?php while($row = $result->fetch_assoc()): ?>
		<tr>
			<td><?= $row['id'] ?></td>
			<td><?= htmlspecialchars($row['name']) ?></td>
			<td><?= htmlspecialchars($row['email']) ?></td>
			<td>
				<a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
				<a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete?')">Delete</a>
			</td>
		</tr>
	<?php endwhile; ?>
</table>
</body>
</html>