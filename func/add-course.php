<?php
include("connections.php");


$message = "";

// Handle User Insert
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_course"])) {
    $course_id = trim($_POST["course_id"]);
    $course_title = trim($_POST["course_title"]);
    $description = trim($_POST["description"]);
    $instructor = trim($_POST["instructor"]);
    $price = trim($_POST["price"]);
    $image = trim($_POST["image"]);

    // Check for duplicate course ID
    $check_sql = "SELECT * FROM courses WHERE course_id='$course_id'";
    $result = $conn->query($check_sql);

    if ($result->num_rows > 0) {
        $_SESSION['message'] = "<div id='message-box' class='error'>⚠️ Course ID already exists.</div>";
    } else {
        // Insert course into database
        $sql = "INSERT INTO courses (course_id, course_title, description, instructor, price, image) 
                VALUES ('$course_id', '$course_title', '$description', '$instructor', '$price', '$image')";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['message'] = "<div id='message-box' class='success'>✅ Course added successfully!</div>";
        } else {
            $_SESSION['message'] = "<div id='message-box' class='error'>⚠️ Error adding course.</div>";
        }
    }
    exit();
}

?>