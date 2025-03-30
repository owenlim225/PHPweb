<?php
include("connections.php");

// delete user
if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $user_id = intval($_GET["id"]);

    $delete = mysqli_query($conn, "DELETE FROM user WHERE user_id = '$user_id'");

    if ($delete) {
        echo "<script>alert('User deleted successfully!'); window.location.href = '../admin/users.php';</script>";
    } else {
        echo "<script>alert('Failed to delete user!'); window.location.href = '../admin/users.php';</script>";
    }
}
?>
