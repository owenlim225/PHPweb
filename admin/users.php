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



<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>