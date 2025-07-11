<?php
// Include database connection
include 'db.php';

// Check if request is POST and "id" is sent
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Get current status of the user
    $stmt = $conn->prepare("SELECT status FROM user_form WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($currentStatus);
    $stmt->fetch();
    $stmt->close();

    // Toggle status: if 1 => 0, if 0 => 1
    $newStatus = $currentStatus ? 0 : 1;

    // Update status in the database
    $stmt = $conn->prepare("UPDATE user_form SET status = ? WHERE id = ?");
    $stmt->bind_param("ii", $newStatus, $id);
    $stmt->execute();
    $stmt->close();

    // Return the new status as plain text (for JavaScript to update the table)
    echo $newStatus;
}
?>
