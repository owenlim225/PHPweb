<?php
session_start();
include("../connections.php");

if (!isset($_SESSION['user_id'])) {
    die("Error: User is not logged in.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_to_cart'])) {
    if (!isset($_POST['course_id']) || empty($_POST['course_id'])) {
        die("Error: Course ID is missing.");
    }

    $user_id = $_SESSION['user_id'];
    $course_id = intval($_POST['course_id']);

    // Check if the course is already in the cart
    $check_query = "SELECT * FROM cart WHERE user_id = ? AND course_id = ? AND is_purchased = 0";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("ii", $user_id, $course_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        // Insert new cart item
        $query = "INSERT INTO cart (user_id, course_id, is_purchased, added_at) VALUES (?, ?, 0, NOW())";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ii", $user_id, $course_id);

        if ($stmt->execute()) {
            echo "Course added to cart!";
        } else {
            echo "Error adding to cart.";
        }
    } else {
        echo "Course already in cart.";
    }
}
?>
