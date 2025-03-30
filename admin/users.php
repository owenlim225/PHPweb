<?php

include("../func/connections.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>

    <!-- css file -->
    <link rel="stylesheet" href="src/style.css">

    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>



<body>



<main class="p-0">
    <div class="container-fluid">
        <div class="row">
            <!-- Navbar -->
            <aside class="col-md-2 d-flex flex-column justify-content-between align-items-center bg-dark text-light text-center py-4 vh-100 position-fixed">
                <div class="w-100 d-flex flex-column align-items-center gap-3">
                    <img src="../img/logo.png" alt="logo" class="img-fluid" style="max-width: 80px;">
                    <div class="d-flex flex-column gap-3 w-100">
                        <a href="../admin/dashboard.php" class="text-light text-decoration-none">Dashboard</a>
                        <a href="../admin/users.php" class="text-warning fw-bold fs-4 text-decoration-none">Users</a>
                        <a href="../admin/courses.php" class="text-light text-decoration-none">Courses</a>
                        <a href="../admin/order.php" class="text-light text-decoration-none">Orders</a>
                    </div>
                </div>
                <a class="text-danger text-decoration-none fw-bold" href="../func/logout.php">Logout</a>
            </aside>

<!-- Main Content -->
 
<div class="col-md-10 offset-md-2">
    <div class="container py-4">
        
            <div class="row justify-content-center">
                <div class="col-md-4 bg-white p-4 rounded shadow-lg mt-4 text-center" style="box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); transition: transform 0.3s ease;">
                    <h2 class="mb-3 text-dark">Add New User</h2>
                    
                    <form action="add-user.php" method="POST">
                        <div class="mb-3" style="display: flex; gap: 10px;">
                            <input type="text" class="form-control border-0 border-bottom" name="first_name" required placeholder="First Name" style="flex: 1;">
                            <input type="text" class="form-control border-0 border-bottom" name="last_name" required placeholder="Last Name" style="flex: 1;">
                        </div>

                        <div class="mb-3">
                            <input type="email" name="email" class="form-control border-0 border-bottom" placeholder="Email" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control border-0 border-bottom" placeholder="Password" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-dark">Account Type:</label>
                            <select name="account_type" class="form-select border-0 border-bottom" required>
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                            </select>
                        </div>
                        <button type="submit" name="add_user" class="btn btn-dark w-100 fw-bold">➕ Add User</button>
                    </form>
                </div>
            </div>




        <!-- user list table -->
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
                                    <th scope="col">Account Type</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="text-center">
                                <?php
                                    // Fetch users
                                    $sql = "SELECT * FROM user";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {  
                                            echo "<tr>
                                                <td class='fw-bold'>{$row['user_id']}</td>
                                                <td>{$row['first_name']}</td>
                                                <td>{$row['last_name']}</td>
                                                <td>{$row['email']}</td>
                                                <td>" . ($row['is_admin'] == 1 ? 'Admin' : 'User') . "</td>
                                                <td>
                                                    <a href='../func/edit-user.php?id={$row['user_id']}' class='btn btn-sm btn-outline-success'>✏️ Edit</a>
                                                    <a href='../func/delete-user.php?id={$row['user_id']}' class='btn btn-sm btn-outline-danger' 
                                                        onclick='return confirm('Are you sure you want to delete this user?');'>🗑 Delete
                                                    </a>
                                                </td>
                                            </tr>";
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





</main>



<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>