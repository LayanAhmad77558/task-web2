<?php
// Include database connection
include 'db.php';

// Handle form submission (add new user)
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
}
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['name'], $_POST['age'])) {
    $name = $_POST["name"];
    $age = $_POST["age"];

    // Insert user into the database
    $stmt = $conn->prepare("INSERT INTO user_form (name, age) VALUES (?, ?)");
    $stmt->bind_param("si", $name, $age); // "s" = string, "i" = integer
    $stmt->execute();
    $stmt->close();
}

// Retrieve all users from the database
$result = $conn->query("SELECT * FROM user_form");

// Display user table
echo "<table border='1'>
<tr><th>ID</th><th>Name</th><th>Age</th><th>Status</th><th>Action</th></tr>";

while ($row = $result->fetch_assoc()) {
    $status = $row['status'] ? '1' : '0'; // Convert to 1 or 0 for display

    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['age']}</td>
            <td class='status' data-id='{$row['id']}'>{$status}</td>
            <td><button class='toggleBtn' data-id='{$row['id']}'>Toggle</button></td>
          </tr>";
}

echo "</table>";

// Close database connection
$conn->close();
?>
