<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>BarCode</title>

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
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>BARCODE.</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#hero">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#menu">Menu</a></li> 
          <li><a href="#events">Events</a></li> 
          <li><a href="#contact">Contact</a></li>
          <li><a href="book.php">Book a Table</a></li>
        </ul>
      </nav><!-- .navbar -->

      <a class="btn-book-a-table" href="login.php">Login</a>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="item active"style="background-image: url('assets/img/bg-bar.jpg');" >
    
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h1>About Us</h1>
        </div>

        <div class="row gy-4">
          <div class="col-lg-7 position-relative about-img" style="background-image: url(assets/img/Beerpong-12.jpg) ;" data-aos="fade-up" data-aos-delay="150">
            <div class="call-us position-absolute">
              <h4>Book a Table</h4>
              <p>094 135 6441</p>
            </div>
          </div>
          <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
            <div class="content ps-0 ps-lg-5">
              <p class="fst-italic">
              A bar, also known as a saloon, a tavern or tippling house, or sometimes as a pub or club, 
              is a retail business establishment that serves alcoholic beverages, such as beer, wine, liquor, 
              cocktails, and other beverages such as mineral water and soft drinks. Bars often also sell snack foods, 
              such as crisps or peanuts, for consumption on their premises. Some types of bars, such as pubs, 
              may also serve food from a restaurant menu. The term "bar" refers to the countertop where drinks are 
              prepared and served, and by extension to the overall premises.
              </p>
              <ul>
                <li><i class="bi bi-check2-all"></i> Bars provide stools or chairs that are placed at tables or counters 
                for their patrons. Bars that offer entertainment or live music are often referred to as "music bars", 
                "live venues", or "nightclubs". Types of bars range from inexpensive dive bars to elegant places of 
                entertainment, often accompanying restaurants for dining.
                </li>
              </ul> 
              <div class="position-relative mt-4">
                <img src="assets/img/rum.jpg" class="img-fluid" alt="">
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->


    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h1>Our Menu</h1>
        </div>

        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">

          <li class="nav-item">
            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-Snacks">
              <h4>Snacks</h4>
            </a>
          </li><!-- End tab nav item -->

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-Beer">
              <h4>Beer</h4>
            </a><!-- End tab nav item -->

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-Other">
              <h4>Other</h4>
            </a>
          </li><!-- End tab nav item -->

        </ul>

        <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

          <div class="tab-pane fade active show" id="menu-Snacks">

            <div class="tab-header text-center">
              <p>Menu</p>
              <h3>Snacks</h3>
            </div>

            <div class="row gy-5">

              <div class="col-lg-4 menu-item">
                <a href="assets/img/menu/lay1.jpg" class="glightbox"><img src="assets/img/menu/lay1.jpg" width="120%" class="menu-img img-fluid" alt=""></a>
                <h4>Lays</h4>
                <p class="ingredients">
                  Price per 1 pack.
                </p>
                <p class="price">฿25</p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="assets/img/menu/lay2.jpg" class="glightbox"><img src="assets/img/menu/lay2.jpg" width="85%" class="menu-img img-fluid" alt=""></a>
                <h4>Lays</h4>
                <p class="ingredients">
                  Price per 1 pack.
                </p>
                <p class="price">฿25</p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="assets/img/menu/lay3.jpg" class="glightbox"><img src="assets/img/menu/lay3.jpg" class="menu-img img-fluid" alt=""></a>
                <h4>Lays</h4>
                <p class="ingredients">
                  Price per 1 pack.
                </p>
                <p class="price">฿25</p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="assets/img/menu/peanuts2.jpg" class="glightbox"><img src="assets/img/menu/peanuts2.jpg" class="menu-img img-fluid" alt=""></a>
                <h4>Peanuts</h4>
                <p class="ingredients">
                  Price per 1 plate.
                </p>
                <p class="price">฿30</p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="assets/img/menu/frenchfrie.png" class="glightbox"><img src="assets/img/menu/frenchfrie.png" class="menu-img img-fluid" alt=""></a>
                <h4>French fries</h4>
                <p class="ingredients">
                  Price per 1 plate.
                </p>
                <p class="price">฿45</p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="assets/img/menu/Enchick.jpg" class="glightbox"><img src="assets/img/menu/Enchick.jpg" class="menu-img img-fluid" alt=""></a>
                <h4>Fried Chicken Tendons</h4>
                <p class="ingredients">
                  Price per 1 plate.
                </p>
                <p class="price">฿60</p>
              </div><!-- Menu Item -->

            </div>
          </div><!-- End Starter Menu Content -->

          <div class="tab-pane fade" id="menu-Beer">

            <div class="tab-header text-center">
              <p>Menu</p>
              <h3>Beer</h3>
            </div>

            <div class="row gy-5">

              <div class="col-lg-4 menu-item">
                <a href="assets/img/menu/chang-beer.jpg" class="glightbox"><img src="assets/img/menu/chang-beer.jpg" class="menu-img img-fluid" alt=""></a>
                <h4>Chang Beer</h4>
                <p class="ingredients">
                  Price per bottle.
                </p>
                <p class="price">฿80</p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="assets/img/menu/leo-beer.jpg" class="glightbox"><img src="assets/img/menu/leo-beer.jpg" class="menu-img img-fluid" alt=""></a>
                <h4>Leo Beer</h4>
                <p class="ingredients">
                  Price per bottle.
                </p>
                <p class="price">฿80</p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="assets/img/menu/sing-beer.jpg" class="glightbox"><img src="assets/img/menu/sing-beer.jpg" class="menu-img img-fluid" alt=""></a>
                <h4>Singha Beer</h4>
                <p class="ingredients">
                  Price per bottle.
                </p>
                <p class="price">฿90</p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="assets/img/menu/heineken.png" class="glightbox"><img src="assets/img/menu/heineken.png" class="menu-img img-fluid" alt=""></a>
                <h4>Heineken Beer</h4>
                <p class="ingredients">
                  Price per bottle.
                </p>
                <p class="price">฿120</p>
              </div><!-- Menu Item -->

            </div>
          </div><!-- End Breakfast Menu Content -->

          <div class="tab-pane fade" id="menu-Other">

            <div class="tab-header text-center">
              <p>Menu</p>
              <h3>Other</h3>
            </div>

            <div class="row gy-5">

              <div class="col-lg-4 menu-item">
                <a href="assets/img/menu/smootie.png" class="glightbox"><img src="assets/img/menu/smootie.png" class="menu-img img-fluid" alt=""></a>
                <h4>Blended liquor</h4>
                <p class="ingredients">
                Price per 1 glass.
                </p>
                <p class="price">฿250</p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="assets/img/menu/sort.jpg" class="glightbox"><img src="assets/img/menu/sort.jpg" class="menu-img img-fluid" alt=""></a>
                <h4>Shot of liquor</h4>
                <p class="ingredients">
                Price per 1 set.
                </p>
                <p class="price">฿90</p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="assets/img/menu/ice.png" class="glightbox"><img src="assets/img/menu/ice.png" width="85%" class="menu-img img-fluid" alt=""></a>
                <h4>Ice</h4>
                <p class="ingredients">
                Price per 1 tank.
                </p>
                <p class="price">฿40</p>
              </div><!-- Menu Item -->

            </div>
          </div><!-- End Lunch Menu Content -->

        </div>

      </div>
    </section><!-- End Menu Section -->


    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <div class="container-fluid" data-aos="fade-up">

        <div class="section-header">
          <h1>Events</h1>
        </div>

        <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide event-item d-flex flex-column justify-content-end" style="background-image: url(assets/img/events-1.jpg)">
              <h3>Custom Parties</h3>
              <!-- <div class="price align-self-start">$99</div> -->
              <p class="description">
            </div><!-- End Event item -->

            <div class="swiper-slide event-item d-flex flex-column justify-content-end" style="background-image: url(assets/img/events-2.jpg)">
              <h3>Private Parties</h3>
              <!-- <div class="price align-self-start">$289</div> -->
            </div><!-- End Event item -->

            <div class="swiper-slide event-item d-flex flex-column justify-content-end" style="background-image: url(assets/img/events-3.jpg)">
              <h3>Birthday Parties</h3>
              <!-- <div class="price align-self-start">$499</div> -->
            </div><!-- End Event item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Events Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h1>Contact</h1>
        </div>

        <div class="row gy-4">

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-map flex-shrink-0"></i>
              <div>
                <h3>Our Address</h3>
                <p>
                  No. 1, Village No. 6,
                  Amphoe Kamphaeng Saen, <br>
                  Nakhon Pathom Province 73140 <br>
            </p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center">
              <i class="icon bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email Us</h3>
                <p>barcode-proj@gmail.com</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Call Us</h3>
                <p>094 135 6441</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-share flex-shrink-0"></i>
              <div>
                <h3>Opening Hours</h3>
                <div><strong>Mon-Sun:</strong> 7PM - 1AM;
                  
                </div>
              </div>
            </div>
          </div><!-- End Info Item -->

        </div>

      </div>
    </section><!-- End Contact Section -->

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