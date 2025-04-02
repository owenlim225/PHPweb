<?php
include("connections.php");

// delete course
if (isset($_GET["course_id"]) && is_numeric($_GET["course_id"])) {
    $course_id = intval($_GET["course_id"]);

    $delete = mysqli_query($conn, "DELETE FROM courses WHERE course_id = '$course_id'");

    if ($delete) {
        echo "<script>alert('Course deleted successfully!'); window.location.href = '../../user/cart.php';</script>";
    } else {
        echo "<script>alert('Failed to delete Course!'); window.location.href = '../../user/cart.php';</script>";
    }
}
?>
