<?php
require_once 'condb.php';
$query = "SELECT * FROM tbl_table ORDER BY table_id ASC";
$result = mysqli_query($condb, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>BarCode</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>BARCODE.</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php#hero">Home</a></li>
          <li><a href="index.php#about">About</a></li>
          <li><a href="index.php#menu">Menu</a></li> 
          <li><a href="index.php#events">Events</a></li> 
          <li><a href="index.php#contact">Contact</a></li>
          <li><a href="book.php">Reserved Table</a></li>
        </ul>
      </nav><!-- .navbar -->

      <a class="btn-book-a-table" href="login.php">Login</a>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Reserved Table</li>
          </ol>
        </div>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Book A Table Section ======= -->
    <section id="book-a-table" class="book-a-table">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h1>Reserved Table</h1>
        </div>

        <div class="row g-0">

          <div class="col-lg-6 reservation-img" style="background-image: url(assets/img/tables.png);" data-aos="zoom-out" data-aos-delay="200"></div>

          <div class="col-lg-6 d-flex align-items-center reservation-form-bg">
          <div class="container">
      <div class="row">
        <div class="col-sm-2 col-md-2"></div>
        <div class="col-12 col-sm-11 col-md-7 devbanban" style="margin-top: 50px;">
          <div class="row">
            <div class="col-sm-12 col-md-12">
            <p>หมายเหตุ : โต๊ะ 1 ที่ จัดเก้าอี้นั่งได้ไม่เกิน 5 คน โปรดจองโต๊ะให้พอดีสำหรับจำนวนลูกค้า</p>
              <div class="alert alert-warning" role="alert">
                <center><h2>Tables</h1></center>
              </div>
              <hr>
              <div class="row" style="margin-bottom: 20px;">
                <?php foreach ($result as  $row) {
                  if($row['table_status']==0){ //ว่าง
                      echo '<div class="col-2 col-md-2 col-sm-2" style="margin: 5px;">';
                    echo '<a href="booking.php?id='.$row["table_id"].'&act=booking"class="btn btn-success" target="">'.$row['table_name'].'</a></div>';
                    }else{ //ถูกจอง
                      echo '<div class="col-2 col-md-2 col-sm-2" style="margin: 5px;">';
                    echo '<a href="#" class="btn btn-secondary disabled" target="">'.$row['table_name'].'</a></div>';
                      }
                    } ?>
                  </div>
                  <p>*เขียว = ว่าง, เทา = จองแล้ว</p>
                </div>
              </div>
            </div>
          </div>
        </div>
          </div><!-- End Reservation Form -->

        </div>

      </div>
    </section><!-- End Book A Table Section -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

<div class="container">
  <div class="row gy-3">
    <div class="col-lg-3 col-md-6 d-flex">
      <i class="bi bi-geo-alt icon"></i>
      <div>
        <h4>Address</h4>
        <p>
          No. 1, Village No. 6, <br>
          Amphoe Kamphaeng Saen, <br>
          Nakhon Pathom Province 73140 <br>
        </p>
      </div>

    </div>

    <div class="col-lg-3 col-md-6 footer-links d-flex">
      <i class="bi bi-telephone icon"></i>
      <div>
        <h4>Reservations</h4>
        <p>
          <strong>Phone:</strong> 094 135 6441<br>
          <strong>Email:</strong> barcode-proj@gmail.com <br>
        </p>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 footer-links d-flex">
      <i class="bi bi-clock icon"></i>
      <div>
        <h4>Opening Hours</h4>
        <p>
          <strong>Mon - Sun : open from 7:00 p.m. to 1:00 a.m.</strong>
        </p>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 footer-links">
      <h4>Follow Us</h4>
      <div class="social-links d-flex">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div>
    </div>

  </div>
</div>


  </footer><!-- End Footer -->
  <!-- End Footer -->


  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>