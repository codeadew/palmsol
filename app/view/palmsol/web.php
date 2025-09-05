<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
  <meta charset="utf-8"/>
  <title> <?= $page_title; ?></title>
  <meta name="description" content="<?= $meta_description; ?>">
  <meta name="keywords" content="<?= $meta_keywords; ?>">
  
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="theme-color" content="#ffffff">

  <!-- Favicon -->
  <link rel="icon" href="<?= ASSETS . THEME ?>images/logo.gif" type="image/png">

  <!-- CSS -->
  <link href="<?= ASSETS . THEME ?>css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= ASSETS . THEME ?>css/plugin.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&amp;family=Poppins:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
  <link href="<?= ASSETS . THEME ?>css/style.css" rel="stylesheet">
  <link href="<?= ASSETS . THEME ?>css/responsive.css" rel="stylesheet">

  <style>
    html { scroll-behavior: smooth; }
  </style>
 <!-- LocalBusiness Schema -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "LocalBusiness",
      "name": "<?= $business_name ?>",
      "image": "<?= $business_image ?>",
      "url": "<?= $business_url ?>",
      "telephone": "<?= $telephone ?>",
     
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "<?= $street ?>",
        "addressLocality": "<?= $locality ?>",
        "addressRegion": "<?= $region ?>",
        "postalCode": "<?= $postal_code ?>",
        "addressCountry": "<?= $country ?>"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": <?= $latitude ?>,
        "longitude": <?= $longitude ?>
      },
      "sameAs": <?= json_encode($same_as) ?>
    }
    </script>

</head>
<body>
  <!-- Preloader -->
  <div class="onloadpage" id="page_loader">
    <div class="pre-content">
      <div class="logo-pre">
        <img src="<?= ASSETS . THEME ?>images/logo.gif" alt="Palmsoltechnology Logo" class="img-fluid" />
      </div>
      <div class="pre-text-">
        <span><?= $page_title; ?></span>
      </div>
    </div>
  </div>
  <!-- End Preloader -->

  <!-- Header -->
<header class="top-header header-pr ">
  <nav class="navbar navbar-expand-lg navbar-light justify-content-right navbar-mobile fixed-top navfix">
    <div class="container">
      <a class="navbar-brand" href="index.php"> <img src="<?= ASSETS . THEME ?>images/logo.gif" alt="Logo" width="70" height="70" /></a>
      <button class="navbar-toggler mobile-none" type="button" data-toggle="collapse" data-target="#navbar4" aria-controls="navbar4" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse animate slideIn mobile-none" id="navbar4">
        <ul class="mr-auto"></ul>
        <ul class="navbar-nav d-menu">
          <li class="nav-item"> <a class="nav-link" href="<?= ROOT ?>home">Home </a> </li>
         <li class="nav-item"> <a class="nav-link" href="<?= ROOT ?>aboutus">About </a> </li>
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="Services" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Our products</a>
          <div class="dropdown-menu animate slideIn" aria-labelledby="Services">
            <a class="dropdown-item" href="<?= ROOT ?>animation">2D & 3D Animation</a>
             
             <a class="dropdown-item" href="<?= ROOT ?>webdesign">Web design & development</a>
             <a class="dropdown-item" href="<?= ROOT ?>digital">Digital Marketing</a>
             <a class="dropdown-item" href="<?= ROOT ?>vas">VAS</a>
             <a class="dropdown-item" href="<?= ROOT ?>vendor">Networking & ICT vendor</a>
          </div>
        </li>
         <li class="nav-item"> <a class="nav-link" href="<?= ROOT ?>contact">Contact us</a> </li>
       
        <li class="nav-item"> <a class="nav-link custom-btn lnk btn-main bg-btn" href="contact.php">Get A Quote <span class="circle"></span></a> </li>
      </ul>
    </div>
    <div class="mobile-menu">
      <ul class="mob-nav">
        <li> <a class="custom-btn lnk btn-main bg-btn" href="contact.php">Get A Quote<span class="circle"></span></a></li>
        <li class="ml8"><a class="toggle mobilemenu" href="#"><span></span></a> </li>
      </ul>
    </div>
  </div>
</nav>
<!--Mobile Menu-->
<nav id="main-nav">
        <ul class="first-nav">
            <li><a href="<?= ROOT ?>home">Home</a>
            </li>
            <li><a href="<?= ROOT ?>aboutus">About us</a>
            </li>
            <li><a href="#">Our products</a>
                <ul>
                    <li><a href="<?= ROOT ?>animation">2D & 3D Animation</a></li>
                    <li><a href="<?= ROOT ?>webdesign">Web design & development</a></li>
                    <li><a href="<?= ROOT ?>digital">Digital Marketing</a></li>
                    <li><a href="<?= ROOT ?>vas">VAS</a> </li>
                    <li><a href="<?= ROOT ?>vendor">Networking & ICT vendor</a></li>
                </ul>
            <li><a href="<?= ROOT ?>contact">Contact us</a>
            </li>
        <ul class="bottom-nav">
            <li class="prb">
                <a href="tel:+2348164203793">
                    <svg xmlns="" viewBox="0 0 384 384">
                        <path d="M353.188,252.052c-23.51,0-46.594-3.677-68.469-10.906c-10.719-3.656-23.896-0.302-30.438,6.417l-43.177,32.594
                        c-50.073-26.729-80.917-57.563-107.281-107.26l31.635-42.052c8.219-8.208,11.167-20.198,7.635-31.448
                        c-7.26-21.99-10.948-45.063-10.948-68.583C132.146,13.823,118.323,0,101.333,0H30.813C13.823,0,0,13.823,0,30.813
                        C0,225.563,158.438,384,353.188,384c16.99,0,30.813-13.823,30.813-30.813v-70.323C384,265.875,370.177,252.052,353.188,252.052z"
                        />
                    </svg>
                </a>
            </li>
            <li class="prb">
                <a href="mailto:info@palmsolechnology.com">
                    <svg xmlns="" width="24" height="24" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
                </a>
            </li>
        </ul>
    
</nav>
</header>
  <!-- End Header -->

  <!-- Mobile Contact Modal -->
  <div class="popup-modal1">
    <div class="modal" id="menu-popup">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <div class="common-heading">
              <h4 class="mt0 mb0">Request A Quote</h4>
            </div>
            <button type="button" class="closes" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-block fdgn2 mt10 mb10">
              <form action="#" method="post" name="feedback-form">
                <div class="fieldsets row">
                  <div class="col-md-12"><input type="text" placeholder="Full Name" name="name"></div>
                  <div class="col-md-12"><input type="email" placeholder="Email Address" name="email"></div>
                  <div class="col-md-12"><input type="number" placeholder="Contact Number" name="phone"></div>
                  <div class="col-md-12"><input type="text" placeholder="Subject" name="subject"></div>
                  <div class="col-md-12"><textarea placeholder="Message" name="message"></textarea></div>
                </div>
                <div class="fieldsets mt20 pb20">
                  <button type="submit" name="submit" class="lnk btn-main bg-btn" data-dismiss="modal">
                    Submit <i class="fas fa-chevron-right fa-icon"></i><span class="circle"></span>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Mobile Contact -->

  <!-- Hero Section -->
  <section class="hero-section business-startup" id="home">
    <div class="text-block">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 v-center">
            <div class="header-heading">
              <h1 class="wow fadeInUp" data-wow-delay=".2s">We Build Scalable & Smart Solutions</h1>
              <p class="wow fadeInUp" data-wow-delay=".4s">
                In today’s digital world, your website is often the first interaction clients have with your business. 
                At Palmsol Technology Limited, we transform ideas into high-performing websites trusted across Nigeria.
              </p>
              <div class="-cta-btn mt70">
                <div class="free-cta-title v-center wow zoomInDown" data-wow-delay=".9s">
                  <a href="#" class="btn-main bg-btn2 lnk" data-toggle="modal" data-target="#modalform-full">
                    Get Started <i class="fas fa-chevron-right fa-icon"></i><span class="circle"></span>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 v-center">
            <div class="hero-photo">
              <img src="<?= ASSETS . THEME ?>images/hero/designer-girl-animate.svg" alt="Web Design Illustration" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Hero Section -->

  <!-- Services -->
  <section class="dg-service2 pb120 pt0" id="services">
    <div class="container">
      <div class="row upset">
        <!-- Service Item -->
        <div class="col-lg-3 col-sm-6 mt30 wow fadeInUp" data-wow-delay=".2s">
          <div class="s-block up-hor pt20">
            <div class="nn-card-set">
              <div class="card-icon"><img src="<?= ASSETS . THEME ?>images/icons/designer.svg" alt="Custom Website Design & Development" class="img-fluid" /></div>
              <h4>Custom Website Design & Development</h4>
              <p>We create responsive, user-friendly websites tailored to your needs.</p>
              <a href="#">Learn More <i class="fas fa-chevron-right fa-icon"></i></a>
            </div>
          </div>
        </div>
        <!-- Service Item -->
        <div class="col-lg-3 col-sm-6 mt30 wow fadeInUp" data-wow-delay=".4s">
          <div class="s-block up-hor pt20">
            <div class="nn-card-set">
              <div class="card-icon"><img src="<?= ASSETS . THEME ?>images/icons/mobile-rafiki.svg" alt="E-Commerce Solutions" class="img-fluid" /></div>
              <h4>E-Commerce Solutions</h4>
              <p>We build secure, scalable online stores to grow your business.</p>
              <a href="#">Learn More <i class="fas fa-chevron-right fa-icon"></i></a>
            </div>
          </div>
        </div>
        <!-- Service Item -->
        <div class="col-lg-3 col-sm-6 mt30 wow fadeInUp" data-wow-delay=".6s">
          <div class="s-block up-hor pt20">
            <div class="nn-card-set">
              <div class="card-icon"><img src="<?= ASSETS . THEME ?>images/icons/strategy-cuate.svg" alt="SaaS Applications" class="img-fluid" /></div>
              <h4>SaaS Applications</h4>
              <p>We develop custom SaaS solutions to streamline your operations.</p>
              <a href="#">Learn More <i class="fas fa-chevron-right fa-icon"></i></a>
            </div>
          </div>
        </div>
        <!-- Service Item -->
        <div class="col-lg-3 col-sm-6 mt30 wow fadeInUp" data-wow-delay=".8s">
          <div class="s-block up-hor pt20">
            <div class="nn-card-set">
              <div class="card-icon"><img src="<?= ASSETS . THEME ?>images/icons/growth-ico.svg" alt="Website Optimization & Maintenance" class="img-fluid" /></div>
              <h4>Website Optimization & Maintenance</h4>
              <p>We keep your website fast, secure, and performing at its best.</p>
              <a href="#">Learn More <i class="fas fa-chevron-right fa-icon"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Services -->

  <!-- About -->
  <section class="about-agencys pad-tb block-1">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="common-heading text-l">
            <h2 class="mb20">Get Started with a Free Consultation</h2>
            <p>Tell us about your project, and we’ll help bring your vision to life. Fill out the form below, and one of our experts will contact you shortly.</p>
          </div>
        </div>
        <div class="col-lg-6 v-center">
          <div class="image-block mb0 m-mt30">
            <img src="<?= ASSETS . THEME ?>images/team1.avif" alt="Consultation with Web Experts" class="img-fluid"/>
          </div>
        </div>
        <div class="-cta-btn mt70">
          <div class="free-cta-title v-center wow zoomInDown" data-wow-delay=".9s">
            <a href="#" class="btn-main bg-btn2 lnk" data-toggle="modal" data-target="#modalform-full">
              Send Consultation Request <i class="fas fa-chevron-right fa-icon"></i><span class="circle"></span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End About -->

  <!-- Agency Info Section -->
  <section class="about-dg-busign pb120 pt120 bg-light-ylo upset" id="about">
    <div class="up-curvs">
      <svg height="100" width="100%" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 89.3" fill="#e9f5ff">
        <path d="M1919.5,89.5H-0.5c0,0,0-90,0-90c114.9,4.8,228.6,17.9,343.6,24.6c118.6,7,237.4,11.9,356.1,14.7
          c237.6,5.7,475.3,3.1,712.7-7.7c164.2-7.5,328.1-23.7,492.3-31C1919.5-0.5,1919.5,89.5,1919.5,89.5z"/>
      </svg>
    </div>
    <div class="container">
      <div class="row">
        <!-- Section 1 -->
        <div class="col-lg-6 v-center">
          <div class="common-heading-2 text-l">
            <span class="text-effect-1">We Are a Creative Agency</span>
            <h2 class="mb20">Work Together for Success</h2>
            <p>We partner with clients to deliver innovative digital solutions that fuel business growth and success.</p>
          </div>
        </div>
        <div class="col-lg-6 v-center">
          <img src="<?= ASSETS . THEME ?>images/about/finance-cuate.svg" alt="Creative Agency Success" class="img-fluid">
        </div>
        <!-- Section 2 -->
        <div class="col-lg-6 v-center mt40 order2">
          <img src="<?= ASSETS . THEME ?>images/about/businessplan.svg" alt="Crafting Digital Experiences" class="img-fluid">
        </div>
        <div class="col-lg-6 v-center mt40 order1">
          <div class="common-heading-2 text-l">
            <span class="text-effect-1">We Are a Creative Agency</span>
            <h2 class="mb20">Crafting Beautiful Digital Experiences</h2>
            <p>We design and build engaging digital platforms tailored to your business goals and customer experiences.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="bottom-curvs">
      <svg height="100" width="100%" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 89.3" fill="#e9f5ff">
        <path d="M1919.5-0.5H-0.5c0,0,0,90,0,90c114.9-4.8,228.6-17.9,343.6-24.6c118.6-7,237.4-11.9,356.1-14.7
          c237.6-5.7,475.3-3.1,712.7,7.7c164.2,7.5,328.1,23.7,492.3,31C1919.5,89.5,1919.5-0.5,1919.5-0.5z"/>
      </svg>
    </div>
  </section>
  <!-- End Agency Info Section -->

  <!-- Footer -->
<footer class="ftshap">
    <div class="footer-row1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="email-subs">
                        <h3>Get New Insights Weekly</h3>
                        <p>Don't want to miss anything Palmsoltechnology, Enter your email</p>
                    </div>
                </div>
                <div class="col-lg-6 v-center">
                    <div class="email-subs-form">
                        <form>
                            <input type="email" placeholder="Email Your Address" name="emails">
                            <button type="submit" name="submit" class="lnk btn-main bg-btn">Subscribe <i class="fas fa-chevron-right fa-icon"></i><span class="circle"></span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-svg">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="0 0 1920 80" style="enable-background:new 0 0 1920 80;" xml:space="preserve">
<path class="st0" d="M0,27.2c589.2,129.4,1044-69,1920,31v-60H3.2L0,27.2z"/>
</svg>
    </div>
    <div class="footer-row2">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <h5>Contact Us</h5>
                    <ul class="footer-address-list ftr-details">
                        <li>
                            <span><i class="fas fa-envelope"></i></span>
                            <p>Email <span> <a href="mailto:info@palmsoltechnology.com">info@palmsoltechnology.com</a></span></p>
                        </li>
                        <li>
                            <span><i class="fas fa-phone-alt"></i></span>
                            <p>Phone <span> <a href="tel:+2349031499108">(+234) 9031499108</a></span></p>
                        </li>
                        <li>
                            <span><i class="fas fa-map-marker-alt"></i></span>
                            <p>Address <span> 13D Kenneth Agbakuru Street, Lekki Phase 1, Lagos,Nigeria</span></p>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <h5>Company</h5>
                    <ul class="footer-address-list link-hover">
                        <li><a href="<?= ROOT ?>home">Home</a></li>
                        <li><a href="<?= ROOT ?>aboutus">About us</a></li>
                        
                        <li><a href="<?= ROOT ?>contact">Contact reach us</a></li>
                        <li><a href="#">Blogs</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <h5>Service</h5>
                    <ul class="footer-address-list link-hover">
                        <li><a href="3d.php">3D rendering</a></li>
                        <li><a href="web.php">Website Development</a></li>
                        <li><a href="digital.php">Digital marketing</a></li>
                        <li><a href="javascript:void(0)">Search Engine Optimization</a></li>
                        <li><a href="javascript:void(0)">Pay-Per-Click</a></li>
                        <li><a href="javascript:void(0)">Social Media Marketing</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <h5>Support</h5>
                    <ul class="footer-address-list link-hover">
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="javascript:void(0)">Privacy Policy</a></li>
                        <li><a href="javascript:void(0)">Sitemap</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <hr class="hline">
    <div class="footer-row3">
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-social-media-icons">
                            <a href="javascript:void(0)" target="blank"><i class="fab fa-facebook"></i></a>
                            <a href="javascript:void(0)" target="blank"><i class="fab fa-twitter"></i></a>
                            <a href="javascript:void(0)" target="blank"><i class="fab fa-instagram"></i></a>
                            <a href="javascript:void(0)" target="blank"><i class="fab fa-linkedin"></i></a>
                            <a href="javascript:void(0)" target="blank"><i class="fab fa-youtube"></i></a>
                        </div>
                        <div class="footer-">
                            <p>Copyright &copy; <?php echo date("Y");?> Palmsol technology. All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </footer>
  <!-- End Footer -->

  <!-- JS -->
  <script src="<?= ASSETS . THEME ?>js/vendor/modernizr-3.5.0.min.js"></script>
  <script src="<?= ASSETS . THEME ?>js/jquery.min.js"></script>
  <script src="<?= ASSETS . THEME ?>js/bootstrap.bundle.min.js"></script> 
  <script src="<?= ASSETS . THEME ?>js/plugin.min.js"></script>
  <script src="<?= ASSETS . THEME ?>js/preloader.js"></script>
  <script src="<?= ASSETS . THEME ?>js/main.js"></script>
</body>
</html>
