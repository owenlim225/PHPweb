<?php
session_start();
include("../connections.php");

// Function to set a notification in session
function setNotification($type, $message) {
    $_SESSION['notification'] = [
        'type' => $type,  // success, warning, error
        'message' => $message,
        'time' => time()
    ];
}

// Check if user is logged in
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    // Set notification and redirect
    setNotification('error', 'Please login to add items to your cart.');
    header("Location: ../../login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") { // ✅ Only allow POST requests
    $user_id = $_SESSION['user_id']; // ✅ Get user_id from session
    $course_id = $_POST['course_id']; // ✅ Get course_id from POST

    // ✅ Prevent duplicate cart entries
    $check_query = "SELECT * FROM cart WHERE user_id = ? AND course_id = ? AND is_purchased = 0";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("ii", $user_id, $course_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        // ✅ Insert new cart item
        $query = "INSERT INTO cart (user_id, course_id, is_purchased, added_at) VALUES (?, ?, 0, NOW())";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ii", $user_id, $course_id);

        if ($stmt->execute()) {
            // Update cart count in session
            updateCartCount($conn, $user_id);
            
            // Set success notification
            setNotification('success', 'Course added to cart successfully!');
        } else {
            // Set error notification
            setNotification('error', 'Failed to add course to cart. Please try again.');
        }
    } else {
        // Set warning notification
        setNotification('warning', 'This course is already in your cart.');
    }
    
    // Redirect back to courses page
    header("Location: ../../user/home.php");
    exit();
} else {
    // Set error notification for direct access
    setNotification('error', 'Invalid request method.');
    header("Location: ../../user/home.php");
    exit();
}

// Function to update cart count in session
function updateCartCount($conn, $user_id) {
    $query = "SELECT COUNT(*) as cart_count FROM cart WHERE user_id = ? AND is_purchased = 0";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $_SESSION['cart_count'] = $row['cart_count'];
}
?>