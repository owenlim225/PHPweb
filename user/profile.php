<?php
session_start();
include("../func/connections.php");

$message = "";

// Ensure user is logged in before querying
if (isset($_SESSION['email'])) {
    $sql = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_SESSION['email']);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['contact'] = $user['contact'];
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Sherwin P. Limosnero">
    <title>Profile</title>
    
    <!-- css file -->
    <link href="../src/style.css" rel="stylesheet">
    <link href="../src/main.css" rel="stylesheet">
    <link href="../src/course-card.css" rel="stylesheet">

    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../src/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  </head>
<body>


<!-- navbar -->
<div class="container-fluid p-0">
    <nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-black bg-opacity-95 fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="../img/logo.png" alt="logo" class="fa-custom-logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 me-5">
                    <li class="nav-item ms-4">
                        <a class="nav-link active" aria-current="page" href="#home"></i>Home</a>
                    </li>

                    <li class="nav-item ms-4">
                        <a class="nav-link" href="#courses-section">My Courses</a>
                    </li>
                    
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <!-- If the user is logged in -->
                <?php if (isset($_SESSION["email"])): ?>
                    <!-- profile button -->
                    <li class="nav-item">
                        <a class="nav-link active text-warning" aria-current="page" href="profile.php">
                            <i>
                                <?php echo isset($_SESSION["first_name"]) ? htmlspecialchars($_SESSION["first_name"]) : 'Profile'; ?>
                            </i>
                        </a>
                    </li>
                    <!-- cart button -->
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
                    </li>
                    <!-- Logout button -->
                    <li class="nav-item">
                    <a class="nav-link active text-danger" aria-current="page" href="../func/logout.php">Logout</a>
                    </li>

                <!-- If the user is not logged in -->
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                <?php endif; ?>
                </ul>
        </div>
    </nav>
    
</div>


<main class="main pt-5 mt-3">
    <div class="container py-4">
        <div class="row justify-content-center">
            <!-- Left column: User profile -->
            <div class="col-md-3 bg-white p-4 rounded shadow-lg mt-4 text-center p-2">
                <span class="mb-3 text-dark">Edit User</span>

                <!-- user name -->
                <h1><?php echo isset($_SESSION["first_name"]) ? htmlspecialchars($_SESSION["first_name"]) : ''; ?></h1><br>
                <?php echo $message; ?>

                <form action="edit-user.php?user_id=<?php echo $user_id; ?>" method="POST">
                    <div class="mb-3 d-flex gap-2">
                        <input type="text" class="form-control border-0 border-bottom" name="first_name" required value="<?php echo isset($_SESSION["first_name"]) ? htmlspecialchars($_SESSION["first_name"]) : ''; ?>">
                        <input type="text" class="form-control border-0 border-bottom" name="last_name" required value="<?php echo isset($_SESSION["last_name"]) ? htmlspecialchars($_SESSION["last_name"]) : ''; ?>">
                    </div>

                    <div class="mb-3">
                        <input type="text" name="contact" class="form-control border-0 border-bottom" required value="<?php echo isset($_SESSION["contact"]) ? htmlspecialchars($_SESSION["contact"]) : ''; ?>">
                    </div>

                    <div class="mb-3">
                        <input type="email" name="email" class="form-control border-0 border-bottom" required value="<?php echo isset($_SESSION["email"]) ? htmlspecialchars($_SESSION["email"]) : ''; ?>">
                    </div>

                    <div class="mb-3">
                        <input type="password" name="password" class="form-control border-0 border-bottom" placeholder="New Password">
                    </div>

                    <div class="mb-3">
                        <input type="password" name="confirm_password" class="form-control border-0 border-bottom" placeholder="Retype Password">
                    </div>

                    <button type="submit" name="update_user" class="btn btn-dark w-100 fw-bold">Update User</button>
                </form>

                <p class="mt-5"><a href="users.php">Back to Users</a></p>
            </div>
            
            <div class="col-md-1"></div> <!-- Add space between columns -->

            <!-- Right column: User courses -->
            <div class="col-md-8 bg-white p-4 rounded shadow-lg mt-4 text-center">
                <h2 class="mb-3 text-dark">Edit Profile</h2>
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="row">
                            <?php
                                // Fetch courses
                                $sql = "SELECT * FROM courses";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {  
                                        echo "<div class='service-item col-md-4 mb-4'>
                                                <div class='course-card'>
                                                    <div class='course-image-container'>
                                                        <img src='../img/courses/{$row['image']}' alt='{$row['course_title']}' class='course-image'>
                                                    </div>

                                                    <div class='course-info p-3'>
                                                        <h5 class='mb-2 text-truncate'>{$row['course_title']}</h5>
                                                        <p class='mb-0 text-muted small'><i class='fas fa-user-tie me-2'></i>{$row['instructor']}</p>
                                                    </div>
                                                    
                                                    <div class='course-card-body'>
                                                        <h5 class='course-title'>{$row['course_title']}</h5>
                                                        <p class='course-instructor'>{$row['instructor']}</p>
                                                        <a href='../func/admin/edit-course.php?course_id={$row['course_id']}' class='edit-button'>
                                                            <span class='edit-icon'>✏️</span> Start Course
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>";
                                    }
                                } else {
                                    echo "<p class='text-center text-muted'>No courses found.</p>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>










<?php include 'footer.php'; ?>

<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
