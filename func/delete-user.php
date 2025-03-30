<?php
include("../func/connections.php");

$user_id = intval($_GET["user_id"]);

// Fetch user details for confirmation
$sql = "SELECT * FROM user WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
} else {
    $_SESSION['message'] = "<div class='error'>⚠️ User not found.</div>";
    exit();
}

// Handle deletion confirmation
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_user"])) {
    $confirmed_username = trim($_POST["confirm_username"]);

    if ($confirmed_username !== $user['username']) {
        $_SESSION['message'] = "<div class='error'>⚠️ Username does not match. Deletion canceled.</div>";
        exit();
    } else {
        // Execute secure delete query
        $delete_sql = "DELETE FROM users WHERE user_id = ?";
        $stmt = $conn->prepare($delete_sql);
        $stmt->bind_param("i", $user_id);

        if ($stmt->execute()) {
            $_SESSION['message'] = "<div class='success'>✅ User deleted successfully!</div>";
        } else {
            $_SESSION['message'] = "<div class='error'>⚠️ Error deleting user.</div>";
        }
        exit();
    }
}
?>