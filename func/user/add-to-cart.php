<?php
session_start();
include("connections.php");

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

$user_id = $_SESSION['user_id']; // Get logged-in user's ID
$course_id = isset($_GET['course_id']) ? intval($_GET['course_id']) : 0;

// Validate course_id
if ($course_id <= 0) {
    die("Invalid course selection.");
}

// Check if the course is already in the cart
$check_cart = $conn->prepare("SELECT * FROM cart WHERE user_id = ? AND course_id = ?");
$check_cart->bind_param("ii", $user_id, $course_id);
$check_cart->execute();
$result = $check_cart->get_result();

if ($result->num_rows > 0) {
    echo "<script>alert('Course is already in your cart!'); window.history.back();</script>";
    exit();
}

// Insert the course into the cart
$insert_cart = $conn->prepare("INSERT INTO cart (user_id, course_id) VALUES (?, ?)");
$insert_cart->bind_param("ii", $user_id, $course_id);

if ($insert_cart->execute()) {
    echo "<script>alert('Added to cart successfully!'); window.location.href='courses.php';</script>";
} else {
    echo "<script>alert('Failed to add to cart. Try again.'); window.history.back();</script>";
}
?>
