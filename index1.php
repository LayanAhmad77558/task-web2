<?php
include 'db.php';

// Fetch data from the database
$result = $conn->query("SELECT * FROM user_form");
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>User Form</h2>

<form method="POST" action="process.php">
    <input type="text" name="name" placeholder="Name" required>
    <input type="number" name="age" placeholder="Age" required>
    <button type="submit">Submit</button>
</form>

<h3>user_form Table</h3>
<table border="1">
    <thead>
        <tr>
            <th>ID</th><th>Name</th><th>Age</th><th>Status</th><th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()) { ?>
        <tr id="row-<?php echo $row['id']; ?>">
            <td><?php echo $row['id']; ?></td>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td><?php echo $row['age']; ?></td>
            <td class="status"><?php echo $row['status']; ?></td>
            <td><button onclick="toggleStatus(<?php echo $row['id']; ?>)">Toggle</button></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<script src="script.js"></script>

</body>
</html>
