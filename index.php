<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Sherwin P. Limosnero">
    <title>Sherwin Limosnero</title>
    
    <!-- css file -->
    <link rel="stylesheet" href="src/style.css">
    <link href="src/main.css" rel="stylesheet">

    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="src/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    
  </head>
<body>
    
<!-- Navbar -->
<?php include 'src/header.php'; ?>


<!-- main content -->
<main class="main">

<!-- Hero Section -->
<section id="hero" class="hero section dark-background">

  <img src="img/hero-img.jpg" alt="hero-bg" data-aos="fade-in">

  <div class="container d-flex flex-column align-items-center justify-content-center text-center" data-aos="fade-up" data-aos-delay="100">
    <h2>I am Morgan Freeman</h2>
    <p><span class="typed" data-typed-items="Designer, Developer, Freelancer, Photographer"></span></p>
  </div>

</section><!-- /Hero Section -->

<!-- About Section -->
<section id="about" class="about section">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4">
      <div class="col-md-6">

        <div class="row justify-content-between gy-4">
          <div class="col-lg-5">
            <img src="img/face.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-7 about-info">
            <p><strong>Name: </strong> <span>Morgan Freeman</span></p>
            <p><strong>Profile: </strong> <span>full stack developer</span></p>
            <p><strong>Email: </strong> <span>contact@example.com</span></p>
            <p><strong>Phone: </strong> <span>(617) 557-0089</span></p>
          </div>
        </div>

        <div class="skills-content skills-animation">

          <h5>Skills</h5>

          <div class="progress">
            <span class="skill"><span>HTML</span> <i class="val">100%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div><!-- End Skills Item -->

          <div class="progress">
            <span class="skill"><span>CSS</span> <i class="val">90%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div><!-- End Skills Item -->

          <div class="progress">
            <span class="skill"><span>JavaScript</span> <i class="val">75%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div><!-- End Skills Item -->

          <div class="progress">
            <span class="skill"><span>Photoshop</span> <i class="val">55%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div><!-- End Skills Item -->

        </div>
      </div>

      <div class="col-md-6">
        <div class="about-me">
          <h4>About me</h4>
          <p>
            Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Curabitur arcu erat, accumsan id
            imperdiet et, porttitor
            at sem. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla
            porttitor accumsan tincidunt.
          </p>
          <p>
            Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vivamus suscipit tortor eget felis
            porttitor volutpat. Vestibulum
            ac diam sit amet quam vehicula elementum sed sit amet dui. porttitor at sem.
          </p>
          <p>
            Nulla porttitor accumsan tincidunt. Quisque velit nisi, pretium ut lacinia in, elementum id enim.
            Nulla porttitor accumsan
            tincidunt. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.
          </p>
        </div>
      </div>
    </div>

  </div>

</section><!-- /About Section -->

<!-- Services Section -->
<section id="services" class="services section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Services</h2>
    <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="row gy-4">

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="service-item  position-relative">
          <div class="icon">
            <i class="bi bi-activity"></i>
          </div>
          <a href="#" class="stretched-link">
            <h3>Nesciunt Mete</h3>
          </a>
          <p>Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis tempore et consequatur.</p>
        </div>
      </div><!-- End Service Item -->

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="service-item position-relative">
          <div class="icon">
            <i class="bi bi-broadcast"></i>
          </div>
          <a href="#" class="stretched-link">
            <h3>Eosle Commodi</h3>
          </a>
          <p>Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum hic non ut nesciunt dolorem.</p>
        </div>
      </div><!-- End Service Item -->

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="service-item position-relative">
          <div class="icon">
            <i class="bi bi-easel"></i>
          </div>
          <a href="#" class="stretched-link">
            <h3>Ledo Markt</h3>
          </a>
          <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.</p>
        </div>
      </div><!-- End Service Item -->

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
        <div class="service-item position-relative">
          <div class="icon">
            <i class="bi bi-bounding-box-circles"></i>
          </div>
          <a href="#" class="stretched-link">
            <h3>Asperiores Commodit</h3>
          </a>
          <p>Non et temporibus minus omnis sed dolor esse consequatur. Cupiditate sed error ea fuga sit provident adipisci neque.</p>
          <a href="#" class="stretched-link"></a>
        </div>
      </div><!-- End Service Item -->

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
        <div class="service-item position-relative">
          <div class="icon">
            <i class="bi bi-calendar4-week"></i>
          </div>
          <a href="#" class="stretched-link">
            <h3>Velit Doloremque</h3>
          </a>
          <p>Cumque et suscipit saepe. Est maiores autem enim facilis ut aut ipsam corporis aut. Sed animi at autem alias eius labore.</p>
          <a href="#" class="stretched-link"></a>
        </div>
      </div><!-- End Service Item -->

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
        <div class="service-item position-relative">
          <div class="icon">
            <i class="bi bi-chat-square-text"></i>
          </div>
          <a href="#" class="stretched-link">
            <h3>Dolori Architecto</h3>
          </a>
          <p>Hic molestias ea quibusdam eos. Fugiat enim doloremque aut neque non et debitis iure. Corrupti recusandae ducimus enim.</p>
          <a href="#" class="stretched-link"></a>
        </div>
      </div><!-- End Service Item -->

    </div>

  </div>

</section><!-- /Services Section -->
</main>


<!-- Footer -->
<?php include 'src/footer.php'; ?>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <!-- Main JS File -->
    <script src="src/main.js"></script>
  
  </body>
</html>