<?php

include("../func/connections.php");

// Fetch Total Users (Exclude Admins)
$user_query = "SELECT COUNT(*) AS total_users FROM user WHERE is_admin = 0;";
$user_result = $conn->query($user_query);
$total_users = $user_result->fetch_assoc()['total_users'];

// Fetch Total Products
$course_query = "SELECT COUNT(*) AS total_courses FROM courses";
$course_result = $conn->query($course_query);
$total_courses = $course_result->fetch_assoc()['total_courses'];

// // Fetch Total Sum of Product Prices
// $purchase_query = "SELECT COALESCE(SUM(course_price), 0) AS total_price FROM purchases;";
// $purchase_result = $conn->query($purchase_query);
// $total_price = $purchase_result->fetch_assoc()['total_price'];

// ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- css file -->
    <link rel="stylesheet" href="src/style.css">

    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>



<body>
<!-- Navbar -->
<aside class="col-md-2 d-flex flex-column justify-content-between align-items-center bg-dark text-light text-center py-4 vh-100 position-fixed">
    <div class="w-100 d-flex flex-column align-items-center gap-3">
        <img src="../img/logo.png" alt="logo" class="img-fluid" style="max-width: 80px;">
        <div class="d-flex flex-column gap-3 w-100">
            <a href="../admin/dashboard.php" class="text-warning fw-bold fs-4 text-decoration-none">Dashboard</a>
            <a href="../admin/users.php" class="text-light text-decoration-none">Users</a>
            <a href="../admin/courses.php" class="text-light text-decoration-none">Courses</a>
            <a href="../admin/order.php" class="text-light text-decoration-none">Orders</a>
        </div>
    </div>
    <a class="text-danger text-decoration-none fw-bold" href="../func/logout.php">Logout</a>
</aside>    

<!-- main -->
<main class="p-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 offset-md-2">
            <div class="container py-4">
                <h1 class="text-center fw-bold m-5">Dashboard</h1>


                
                <!-- Dashboard Cards -->
                <div class="row g-4 justify-content-center">
                    <div class="col-sm-3 mx-2 bg-primary p-4 rounded shadow mt-4 text-white text-center">
                        <span class="fs-2 fw-bold"><?php echo $total_users; ?></span>
                        <h4 class="fw-bold">Total Users</h4>
                    </div>

                    <div class="col-sm-3 mx-2 bg-warning p-4 rounded shadow mt-4 text-white text-center">
                        <span class="fs-2 fw-bold"><?php echo $total_courses; ?></span>
                        <h4 class="fw-bold">Total Courses</h4>
                    </div>

                    <div class="col-sm-3 mx-2 bg-danger p-4 rounded shadow mt-4 text-white text-center">
                        <span class="fs-2 fw-bold">$<?php echo $total_price; ?></span>
                        <h4 class="fw-bold">Total Revenue</h4>
                    </div>
                </div>



                <h1 class="text-center fw-bold my-5 text-primary">Users List</h1>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered shadow rounded">
                                    <thead class="table-dark text-center">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Email</th>
                                        </tr>
                                    </thead>

                                    <tbody class="text-center">
                                        <?php
                                            // Fetch users
                                            $sql = "SELECT * FROM user";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {  
                                            ?>
                                                    <tr>
                                                        <td class="fw-bold"><?php echo $row['user_id']; ?></td>
                                                        <td><?php echo $row['first_name']; ?></td>
                                                        <td><?php echo $row['last_name']; ?></td>
                                                        <td><?php echo $row['email']; ?></td>                                    
                                                    </tr>
                                            <?php
                                                }
                                            } else {
                                                echo "<tr><td colspan='5' class='text-center text-muted'>No users found.</td></tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>