<?php
session_start();
include("../func/connections.php");

$user_id = isset($_GET["user_id"]) ? intval($_GET["user_id"]) : 0;
$message = "";
$user = null; // Ensure $user is defined

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
        $_SESSION['user_id'] = $user['user_id']; // Make sure user_id is stored in session
    }
}

// Get the current user's ID
$current_user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

// Fetch Total Sum of Product Prices for the current user only
$purchase_query = "SELECT COALESCE(SUM(c.price), 0) AS total_price 
                  FROM cart ct
                  JOIN courses c ON ct.course_id = c.course_id
                  WHERE ct.user_id = ?";
                  
$stmt = $conn->prepare($purchase_query);
$stmt->bind_param("i", $current_user_id);
$stmt->execute();
$result = $stmt->get_result();
$total_price = $result->fetch_assoc()['total_price'];

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Sherwin P. Limosnero">
    <title>Checkout</title>
    
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
            <a class="navbar-brand" href="home.php"><img src="../img/logo.png" alt="logo" class="fa-custom-logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 me-5">
                    <li class="nav-item ms-4">
                        <a class="nav-link active" aria-current="page" href="home.php"></i>Home</a>
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

<!-- payment -->
<main class="main pt-5 mt-3">
    <div class="container py-4">
        <div class="container d-lg-flex align-items-start justify-content-between py-4">
            <!-- Box 1 -->
            <div class="col-lg-7 bg-light p-4 rounded shadow">
                <div class="d-flex align-items-center mb-3">
                    <img src="https://images.pexels.com/photos/4925916/pexels-photo-4925916.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" 
                        class="rounded-circle me-2" width="50" alt="">
                    <p class="fw-bold mb-0">Oliur</p>
                </div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <p class="fw-bold">Minimal Icons by Oliur</p>
                        <p class="text-muted"><i class="fas fa-dollar-sign"></i> 19.00</p>
                    </div>
                    <!-- Carousel -->
                    <div id="my" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="2000">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#my" data-bs-slide-to="0" class="active" aria-current="true"></button>
                            <button type="button" data-bs-target="#my" data-bs-slide-to="1"></button>
                            <button type="button" data-bs-target="#my" data-bs-slide-to="2"></button>
                        </div>
                        <div class="carousel-inner rounded">
                            <div class="carousel-item active">
                                <img src="https://images.pexels.com/photos/356056/pexels-photo-356056.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" class="d-block w-100">
                            </div>
                            <div class="carousel-item">
                                <img src="https://images.pexels.com/photos/270694/pexels-photo-270694.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="d-block w-100">
                            </div>
                            <div class="carousel-item">
                                <img src="https://images.pexels.com/photos/7974/pexels-photo.jpg?auto=compress&cs=tinysrgb&dpr=2&w=500" class="d-block w-100">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#my" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#my" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                    <p class="mt-3 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    <p class="text-muted">Free updates forever</p>
                    <p class="text-muted">Three different colored sets:</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-arrow-right me-2"></i>Black</li>
                        <li><i class="fas fa-arrow-right me-2"></i>White</li>
                        <li><i class="fas fa-arrow-right me-2"></i>Pastel</li>
                    </ul>
                    <p class="fw-bold">Here is a quick guide on how to apply them</p>
                </div>
            </div>

            <!-- Box 2 (Payment) -->
            <div class="col-lg-4">
                <div class="row">
                    <!-- first row — Order Summary-->
                    <div class="col-12 bg-white p-4 rounded shadow mt-4">
                        <h3 class="mb-3 fw-bold mb-5">Order Summary</h3>
                        
                        <?php
                        // Fetch cart items with course details using JOIN
                        $user_id = $_SESSION['user_id'];
                        
                        $sql = "SELECT c.cart_id, c.user_id, c.course_id, 
                                    cs.course_title, cs.price, cs.image
                                FROM cart c
                                JOIN courses cs ON c.course_id = cs.course_id
                                WHERE c.user_id = $user_id";
                                
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                            echo '<div class="mb-3">';
                            while ($row = $result->fetch_assoc()) {  
                                echo '<div class="d-flex justify-content-between mb-2">
                                    <span>' . $row['course_title'] . '</span>
                                    <span>&#8369;' . number_format($row['price'], 2) . '</span>
                                </div>';
                            }
                            echo '</div>';
                        } else {
                            echo '<div class="text-center text-muted mb-3">No courses in your cart.</div>';
                        }
                        ?>
                        
                        <hr>
                        <div class="d-flex justify-content-between fw-bold fs-5">
                            <span>Total Amount</span>
                            <span>&#8369;<?php echo number_format($total_price, 2); ?></span>
                        </div>    
                    </div>

                    <!-- second row — Customer Details & Payment Due -->
                    <div class="col-12 bg-white p-4 rounded shadow mt-4">
                        <h3 class="mb-3 fw-bold mb-5">Customer Details</h3>
                        <form method="POST" action="process_order.php" class="d-flex flex-column gap-3">
                            
                            <!-- Customer Details -->
                            <div>
                                <div class="mb-3">
                                    <label class="form-label">Full Name *</label>
                                    <input type="text" class="form-control" name="full_name" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email Address *</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Mobile Number *</label>
                                    <div class="input-group">
                                        <span class="input-group-text">+63</span>
                                        <input type="text" class="form-control" name="mobile" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Country *</label>
                                    <input type="text" class="form-control" name="country" required>
                                </div>
                            </div>

                            <!-- Payment Due -->
                            <div>
                                <h6>Select Payment Method</h6>
                                <p class="text-muted">
                                    Payments are secure & payment information is encrypted. The merchant does not store any payment information.
                                </p>

                                <!-- Payment Methods -->
                                <div class="d-flex flex-column gap-3">
                                    <!-- Gcash -->
                                    <label class="w-100 d-flex align-items-center justify-content-between p-2 border rounded bg-white transition" role="button">
                                        <div class="d-flex align-items-center gap-2 flex-grow-1 m-2">
                                            <img alt="Gcash" src="https://cdn.helixpay.ph/images/payment_types/gcash_logo.png" class="payment-type-logo img-fluid" style="max-height: 32px;">
                                        </div>
                                        <input class="form-check-input" value="gcash" name="payment" type="radio">
                                    </label> 

                                    <!-- Maya -->
                                    <label class="w-100 d-flex align-items-center justify-content-between p-2 border rounded bg-white transition" role="button">
                                        <div class="d-flex align-items-center gap-2 flex-grow-1 m-2">
                                            <img src="https://cdn.helixpay.ph/images/payment_types/maya_logo.png" alt="PayMaya" class="payment-type-logo img-fluid" style="max-height: 32px;">
                                        </div>
                                        <input class="form-check-input" value="maya" name="payment" type="radio">
                                    </label> 

                                    <!-- GrabPay -->
                                    <label class="w-100 d-flex align-items-center justify-content-between p-2 border rounded bg-white transition" role="button">
                                        <div class="d-flex align-items-center gap-2 flex-grow-1 m-2">
                                            <img alt="GrabPay" src="https://cdn.helixpay.ph/images/payment_types/grabpay_logo.png" class="payment-type-logo img-fluid" style="max-height: 32px;">
                                        </div>
                                        <input class="form-check-input" value="grabpay" name="payment" type="radio">
                                    </label> 
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary w-100">Pay now</button>
                            
                        </form>
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
