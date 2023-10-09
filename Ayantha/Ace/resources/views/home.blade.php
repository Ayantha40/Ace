<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Ace Guardian Solutions</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Favicons -->
  <link href="assets\img\favicon-32x32.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <style>
  /* Style for the "Add to Cart" button */
  .add-to-cart {
    background-color: #3498db; /* Background color */
    color: #fff; /* Text color */
    padding: 8px 16px; /* Padding */
    border: none; /* Remove border */
    cursor: pointer; /* Add hover effect */
    font-size: 16px; /* Font size */
    border-radius: 4px; /* Rounded corners */
  }

  /* Hover effect */
  .add-to-cart:hover {
    background-color: #2980b9; /* Darker background color on hover */
  }
  h2 {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        #cart-total {
            font-weight: bold;
        }
        .add-to-cart, #checkout-button {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        margin-top: 10px;
        transition: background-color 0.2s ease-in-out;
    }

    .add-to-cart:hover, #checkout-button:hover {
        background-color: #0056b3;
    }

    /* Style the checkout table */
    .shopping-cart {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 15px;
        margin-top: 20px;
        box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
    }

    .shopping-cart table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
    }

    .shopping-cart th, .shopping-cart td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .shopping-cart th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    .shopping-cart td {
        background-color: #fff;
    }

    .cart-action-buttons {
        display: flex;
        justify-content: flex-end;
        margin-top: 10px;
    }

    .cart-action-buttons button {
        background-color: #dc3545;
        color: #fff;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        transition: background-color 0.2s ease-in-out;
        margin-left: 10px;
    }

    .cart-action-buttons button:hover {
        background-color: #c82333;
    }
</style>


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

    <h1 class="logo me-auto"><a href="#">Ace Guardian</a></h1>
    
      <nav id="navbar" class="navbar ">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link   scrollto" href="#portfolio">Products</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>  
          </li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li>
          @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                    @auth
                    <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <!-- My Profile Section -->
                                <a class="dropdown-item bg-primary" href="{{ route('profile') }}">
                                 My Profile </a>
                                 
                                <!-- Logout Section -->
                                <a class="dropdown-item bg-primary" href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                    Logout </a>
                                
                                <!-- <a class="dropdown-item bg-primary" href="{{ route('user.edit', Auth::user()->id) }}">
                                        Edit Profile
                                    </a> -->
                                    
                                @if (Auth::user()->is_admin)
                                  
                                  <a class="dropdown-item bg-primary" href="{{route('admin.index')}}">
                                  Dashboard
                                  </a>
                                    @endif
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                    <div class="dropdown-divider"></div>

                                    <!-- <form
                                    id="delete-account-form"
                                    action="{{ route('user.destroy', Auth::user()->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete the account? This action cannot be undone.');"
                                    >
                                    @csrf @method('DELETE')
                                    <button type="submit" class="dropdown-item">Delete Profile</button>
                                </form> -->
                                </div>
                                
                            <li>
                            <li> 
                            </li>

                    @else
                    <li><a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a></li>

                        @if (Route::has('register'))
                        <li> <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a></li>
                        @endif
                    @endauth
                </div>
            @endif
          </li>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
   
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Securing Your World, One Frame at a Time!</h1>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="assets\img\sec.avif" class="img-fluid animated" alt="ahhhh">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
      <div class="container">

        <div class="row" data-aos="zoom-in">

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets\img\Logo-Brand_Dahua.webp" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets\img\Axis-Communications-Logo.webp" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets\img\IDIS-LOGO-1-768x327.webp" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets\img\Hikvision-Logo.webp" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets\img\Lorex-Logo-1-e1628800345510.webp" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets\img\honeywell_logo (1).webp" class="img-fluid" alt="">
          </div>

        </div>

      </div>
    </section><!-- End Cliens Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Us</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p>
            Ace Guardian Solutions is a trusted provider of cutting-edge CCTV solutions for residential, commercial, and industrial applications. With a focus on quality, innovation, and customer satisfaction, our team of experts delivers customized CCTV products and services that meet your unique security needs. Partnering with leading manufacturers, we offer advanced CCTV technologies, professional installation and maintenance, and responsive customer service. 
            </p>
         
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
            Experience the Ace Guardian Solutions difference and let us be your trusted partner in securing your peace of mind. Contact us today to learn more about our comprehensive CCTV solutions.
            </p>
            <a href="#services" class="btn-learn-more">Learn More</a>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
      <div class="container-fluid" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

            <div class="content">
              <h3>Discover smart solutions</h3>
              <p>
              Protect and grow your business with cutting-edge security solutions.
              </p>
            </div>

            <div class="accordion-list">
              <ul>
                <li>
                  <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><span>01</span> Technology you can trust in a changing world<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                    <p>
                    Scalable, easy-to-integrate IP-based products and innovations for security and video surveillance.
                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>02</span> Solutions for smarter business <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                    Get the best possible solutions for creating smarter business from Ace Guardian and our partners.
                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span> Partnering with industry leading experts <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                    We work closely with partners and offer full support throughout the project lifecycle.
                    </p>
                  </div>
                </li>

              </ul>
            </div>

          </div>

          <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("assets/img/why-us.png");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Our Services</h2>
          <p>Our CCTV business offers a range of services, including customized CCTV system design and installation, regular maintenance and repair services, CCTV product sales, remote monitoring and support, and access control systems. Our services are designed to enhance the security of your property and provide you with peace of mind.</p>
        </div>

        <div class="row">
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <h4><a href="">Consultation and System Design</a></h4>
              <p>We offer consultation services to help clients determine their security needs and design a customized CCTV system that meets their specific requirements.</p>
              <br>
              <img src="assets\img\conversation.png" class="img-thumbnail" alt="scuba">
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <h4><a href="">Installation and Configuration</a></h4>
              <p>We provide professional installation services to ensure that CCTV systems are properly set up and configured for optimal performance.</p>
              <br>
              <img src="assets\img\repair-tools.png" class="img-thumbnail" alt="scubarrrr">
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <h4><a href="">Maintenance and Support</a></h4>
              <p>To ensure the longevity and effectiveness of the CCTV systems, we offer ongoing maintenance and support services.</p>
              <br>
              <br>
              <img src="assets\img\maintenance.png" class="img-thumbnail" alt="efkerrr">
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon-box">
              <h4><a href="">Upgrades and Expansion</a></h4>
              <p>We offer upgrade and expansion services to keep the CCTV systems up-to-date and scalable.</p>
              <br>
              <br>
              <br>
              <img src="assets\img\cctv-camera.png" class="img-thumbnail" alt="efkerrr">
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="row">
          <div class="col-lg-9 text-center text-lg-start">
            <h3>Call To Action</h3>
            <p> Secure Your World Today! Contact Us for a Free Consultation and Discover the Best CCTV Solutions for Your Security Needs.</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#contact">Call To Action</a>
          </div>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Product Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Surveillance Gear</h2>
          <p>At Ace Guardian Solutions, we offer a wide range of high-quality security equipment and surveillance gear to meet all of your CCTV needs. Our products are carefully selected from the best brands in the industry, ensuring that you receive top-quality and reliable solutions.</p>
        </div>

        <ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
          <li data-filter="*" class="filter-active">All Gear</li>
          <li data-filter=".filter-app">CCTV Cameras</li>
          <li data-filter=".filter-card">Access Control Systems</li>
          <li data-filter=".filter-web">Accessories</li>  
        </ul>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">


        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-img"><img src="assets\img\dome.jpg" class="img-fluid" alt=""></div>
          <div class="portfolio-info">
            <h4>Dome Cameras</h4>
            <p>50$</p>
            <a href="assets\img\dome.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Discreet and solid in any environment">
              <i class="bx bx-plus"></i><!-- Plus icon -->
            </a>
            <button class="add-to-cart" data-name="Dome Cameras" data-price="50">Add to Cart</button>
            <a href="portfolio-details.html" class="details-link" title="More Details"></a>
          </div>
        </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-img"><img src="assets\img\thermal.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>PTZ Cameras</h4>
              <p>70$</p>
              <a href="assets\img\thermal.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Pan, tilt, and zoom capabilities for wide-area coverage"> <i class="bx bx-plus"></i><!-- Plus icon -->
              </a>
              <button class="add-to-cart" data-name="PTZ Cameras" data-price="70">Add to Cart</button>
              <a href="portfolio-details.html" class="details-link" title="More Details"></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-img"><img src="assets\img\tc.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Thermal Cameras</h4>
              <p>80$</p>
              <a href="assets\img\tc.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Temperature monitoring and heat-based detection - regardless of visibility"> <i class="bx bx-plus"></i><!-- Plus icon --></a>
              <button class="add-to-cart" data-name="Thermal Cameras" data-price="80">Add to Cart</button>
              <a href="portfolio-details.html" class="details-link" title="More Details"></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-img"><img src="assets\img\rolling.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Onboard Cameras</h4>
              <p>40$</p>
              <a href="assets\img\rolling.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="For use on vehicles and rolling stock"> <i class="bx bx-plus"></i><!-- Plus icon -->
              </a>
              <button class="add-to-cart" data-name="Onboard Cameras" data-price="40">Add to Cart</button>
              <a href="portfolio-details.html" class="details-link" title="More Details"></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-img"><img src="assets\img\wirekit.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>TC1901 Wire Kit </h4>
              <p>30$</p>
              <a href="assets\img\wirekit.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Wire Kit for C15 Network Pendant Speaker Series"> <i class="bx bx-plus"></i><!-- Plus icon -->
              </a>
              <button class="add-to-cart" data-name="TC1901 Wire Kit" data-price="30">Add to Cart</button>
              <a href="portfolio-details.html" class="details-link" title="More Details"></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-img"><img src="assets\img\box cam.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Box Camera</h4>
              <p>45$</p>
              <a href="assets\img\box cam.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Deterrence in any environment"> <i class="bx bx-plus"></i><!-- Plus icon -->
              </a>
              <button class="add-to-cart" data-name="Box Camera" data-price="45">Add to Cart</button>
              <a href="portfolio-details.html" class="details-link" title="More Details"></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-img"><img src="assets\img\acs.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Access control management software</h4>
              <p>180$</p>
              <a href="assets\img\acs.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Access control management for every need"> <i class="bx bx-plus"></i><!-- Plus icon -->
            </a>
              <button class="add-to-cart" data-name="Accesss control management software" data-price="180">Add to Cart</button>
              <a href="portfolio-details.html" class="details-link" title="More Details"></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-img"><img src="assets\img\pc.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Power and connectivity</h4>
              <p>60$</p>
              <a href="assets\img\pc.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="All you need to power your system and connect its components"> <i class="bx bx-plus"></i><!-- Plus icon -->
              </a>
              <button class="add-to-cart" data-name="Power and connectivity" data-price="60">Add to Cart</button>
              <a href="portfolio-details.html" class="details-link" title="More Details"></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-img"><img src="assets\img\bullet cam.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Bullet Camera</h4>
              <p>38$</p>
              <a href="assets\img\bullet cam.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="For all purposes in any environment"> <i class="bx bx-plus"></i><!-- Plus icon -->
              </a>
              <button class="add-to-cart" data-name="Bullet Camera" data-price="38">Add to Cart</button>
              <a href="portfolio-details.html" class="details-link" title="More Details"></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-img"><img src="assets\img\readers.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Readers</h4>
              <p>100$</p>
              <a href="assets\img\readers.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Indoor and outdoor readers for access control and more"> <i class="bx bx-plus"></i><!-- Plus icon -->
              </a>
              <button class="add-to-cart" data-name="Readers" data-price="100">Add to Cart</button>
              <a href="portfolio-details.html" class="details-link" title="More Details"></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-img"><img src="assets\img\io.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Network I/O Relay Modules</h4>
              <p>90$</p>
              <a href="assets\img\io.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Intelligent modules for extended functionality"> <i class="bx bx-plus"></i><!-- Plus icon -->
            </a>
            <button class="add-to-cart" data-name="Network I/O Relay Modules" data-price="90">Add to Cart</button>
              <a href="portfolio-details.html" class="details-link" title="More Details"></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-img"><img src="assets\img\credentials.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Credentials</h4>
              <p>10$</p>
              <a href="assets\img\credentials.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="User credentials for access control systems"> <i class="bx bx-plus"></i><!-- Plus icon -->
            </a>
            <button class="add-to-cart" data-name="Credentials" data-price="10">Add to Cart</button>
              <a href="portfolio-details.html" class="details-link" title="More Details"></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-img"><img src="assets\img\TA.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>TA4701 Access Card </h4>
              <p>10$</p>
              <a href="assets\img\TA.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Secure access card made from recycled material"> <i class="bx bx-plus"></i><!-- Plus icon -->
              </a>
              <button class="add-to-cart" data-name="TA4701 Access Card" data-price="10">Add to Cart</button>
              <a href="portfolio-details.html" class="details-link" title="More Details"></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-img"><img src="assets\img\door.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Network Door Controllers</h4>
              <p>120$</p>
              <a href="assets\img\door.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Open and flexible powered by IP"> <i class="bx bx-plus"></i><!-- Plus icon -->
              </a>
              <button class="add-to-cart" data-name="Network Door Controllers" data-price="120">Add to Cart</button>
              <a href="portfolio-details.html" class="details-link" title="More Details"></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-img"><img src="assets\img\illuminator.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Illuminators</h4>
              <p>45$</p>
              <a href="assets\img\illuminator.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="White and infra-red LED illuminators"> <i class="bx bx-plus"></i><!-- Plus icon -->
              </a>
              <button class="add-to-cart" data-name="Illumniators" data-price="45">Add to Cart</button>
              <a href="portfolio-details.html" class="details-link" title="More Details"></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-img"><img src="assets\img\joystick.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Joysticks and Keypads</h4>
              <p>95$</p>
              <a href="assets\img\joystick.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Modular control board for professional camera and video management"> <i class="bx bx-plus"></i><!-- Plus icon -->
              </a>
              <button class="add-to-cart" data-name="Joysticks and Keypads" data-price="95">Add to Cart</button>
              <a href="portfolio-details.html" class="details-link" title="More Details"></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-img"><img src="assets\img\sd.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Storage</h4>
              <p>20$</p>
              <a href="assets\img\sd.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Reliable storage on hard drives or SD cards"> <i class="bx bx-plus"></i><!-- Plus icon -->
              </a>
              <button class="add-to-cart" data-name="Storage" data-price="20">Add to Cart</button>
              <a href="portfolio-details.html" class="details-link" title="More Details"></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-img"><img src="assets\img\Tools.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Tools & Extras</h4>
              <p>150$</p>
              <a href="assets\img\Tools.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Tools and accessories to manage, maintan and wash your products"> <i class="bx bx-plus"></i><!-- Plus icon -->
              </a>
              <button class="add-to-cart" data-name="Tools & Extras" data-price="150">Add to Cart</button>
              <a href="portfolio-details.html" class="details-link" title="More Details"></a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Section -->

        <h2>Shopping Cart</h2>
    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="cart-items">
            
        </tbody>
       
        <tfoot>
            <tr>
                <td colspan="3">Total:</td>
                <td id="cart-total">0</td>
                <td></td>
            </tr>
        </tfoot>
      
    </table>
    <div class="shopping-cart">
        <div class="cart-action-buttons">
            <button type="submit" id="checkout-button">Checkout</button>
        </div>
    </div>

    <!-- <div class="shopping-cart">
        <div class="cart-action-buttons">
        <form action="{{ route('checkout') }}" method="POST">
            @csrf
            <button type="submit">Checkout</button>
        </form>
        </div>
    </div> -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Meet the Team</h2>
          <p>Get to know our team and experience the Ace Guardian Solutions difference! Contact us today to learn more about our comprehensive CCTV services and solutions.</p>
        </div>

        <div class="row">

          <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets/img/team/team-3.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Ayantha Seneviratne</h4>
                <span>Project Manager</span>
       
                <div class="social">
                  <a href="https://twitter.com/"><i class="ri-twitter-fill"></i></a>
                  <a href="https://web.facebook.com/"><i class="ri-facebook-fill"></i></a>
                  <a href="https://www.instagram.com/"><i class="ri-instagram-fill"></i></a>
                  <a href="https://www.linkedin.com/in/ayantha-seneviratne-45085a1a9"> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets/img/team/team-2.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Bashini Weerasinghe</h4>
                <span>Operations Manager</span>
               
                <div class="social">
                  <a href="https://twitter.com/"><i class="ri-twitter-fill"></i></a>
                  <a href="https://web.facebook.com/"><i class="ri-facebook-fill"></i></a>
                  <a href="https://www.instagram.com/"><i class="ri-instagram-fill"></i></a>
                  <a href="https://www.linkedin.com/in/bashini-weerasinghe-096750236"> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets/img/team/team-1.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Tharusha Nayakkara</h4>
                <span>Business Head</span>
                
                <div class="social">
                  <a href="https://twitter.com/"><i class="ri-twitter-fill"></i></a>
                  <a href="https://web.facebook.com/"><i class="ri-facebook-fill"></i></a>
                  <a href="https://www.instagram.com/"><i class="ri-instagram-fill"></i></a>
                  <a href="https://www.linkedin.com/in/tharusha-nanayakkara-641411269"> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="400">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets/img/team/team-4.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Sulakshi Illangeshwaran</h4>
                <span>Tech Head</span>
               
                <div class="social">
                  <a href="https://twitter.com/"><i class="ri-twitter-fill"></i></a>
                  <a href="https://web.facebook.com/"><i class="ri-facebook-fill"></i></a>
                  <a href="https://www.instagram.com/"><i class="ri-instagram-fill"></i></a>
                  <a href="https://www.linkedin.com/in/sulakshi-ilangeshwaran-608a17236"> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Frequently Asked Questions</h2>
          <p>If you have any further questions or would like to learn more about our CCTV services, please don't hesitate to contact us!</p>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">What are the benefits of installing CCTV cameras? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                <p>
                Installing CCTV cameras can provide numerous benefits, such as increased security and safety, deterring criminal activity, improving employee productivity, and reducing liability risks. CCTV cameras can also be used for remote monitoring, which allows you to keep an eye on your property from anywhere, at any time.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">What types of CCTV cameras are available? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                <p>
                There are many different types of CCTV cameras available, including dome cameras, bullet cameras, PTZ cameras, and wireless cameras. Each type of camera has its own set of features and benefits, and the best type of camera for you will depend on your specific needs and budget.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">How long do CCTV cameras last? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                <p>
                The lifespan of a CCTV camera will depend on the quality of the camera, the environment it's installed in, and how well it's maintained. On average, a good quality CCTV camera can last anywhere from 5 to 10 years.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">Do you provide installation services for CCTV cameras? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                <p>
                Yes, we provide professional installation services for all of our CCTV products. Our technicians are highly skilled and certified in the latest CCTV technologies, and will ensure that your system is installed and configured for optimal performance.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="500">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed">How much does a CCTV system cost?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                <p>
                The cost of a CCTV system will depend on a variety of factors, including the number of cameras needed, the type of cameras selected, the complexity of the installation, and any additional features or services requested. We offer customized solutions to fit your specific needs and budget, and will provide you with a detailed quote after a consultation.
                </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact Us</h2>
          <p>We'd love to hear from you! If you have any questions, comments, or would like to request a free consultation, please fill out the form below or give us a call. Our friendly and knowledgeable team is always ready to assist you with your CCTV needs. At Ace Guardian Solutions, we prioritize customer satisfaction and are committed to providing prompt and responsive service. Contact us today and discover the best CCTV solutions for your security needs!</p>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>119, Kandy Road, Weligalla,Sri Lanka</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>aceguardian@gmail.com</p>  
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+94 0812389687</p>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.412434031091!2d80.59297197415356!3d7.193692815014301!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae36fafe28ebf65%3A0x3712bcf0d136e364!2s5HVW%2BF6F%2C%20Polgaha-anga!5e0!3m2!1sen!2slk!4v1682351571767!5m2!1sen!2slk" width="400" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="{{ route('messages.store') }}" method="post" class="php-email-form">
              @csrf
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="form-group">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" required>
              </div>
              <div class="form-group">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              
              <div class="text-center"><button type="submit">Send Message</button></div>
              
            </form>
          </div>
        </div>
        </div> 
    </section><!-- End Contact Section -->
    
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
           <!-- <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>-->
          </div>
        </div>
      </div>
    </div>

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>ACE GUARDIAN</h3>
            <p>
              119, <br>
              Kandy Road, Weligalla<br>
              Sri Lanka<br><br>
              <strong>Phone:</strong> +94 0812389687<br>
              <strong>Hot Line:</strong> +94 0778565897<br>
              <strong>Email:</strong> aceguardian@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Consultation and System Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Installation and Configuration</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Maintenance and Support</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Upgrades and Expansion</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 mb-5 footer-links">
            <h4>Our Social Networks</h4>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="p-5 container footer-bottom clearfix">
     <div class="copyright">
        &copy; Copyright <strong><span> Ace Guardian </span></strong> All Rights Reserved.
      </div> 
      <div class="credits">

        Designed by Ayantha Seneviratne
      </div>
    </div>
  </footer><!-- End Footer -->

  <!-- <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> -->

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <script src="assets/js/main.js"></script>

  <script>
 const cart = [];
const cartItemsElement = document.getElementById("cart-items");
const cartTotalElement = document.getElementById("cart-total");

// Function to load the cart from local storage and update the shopping cart table
function loadCartFromLocalStorage() {
  const savedCart = localStorage.getItem("cart");
  if (savedCart) {
    cart.length = 0; // Clear the existing cart
    cart.push(...JSON.parse(savedCart));
    updateCart();
  }
}

// Initialize the cart from local storage when the page loads
window.addEventListener("load", function () {
  loadCartFromLocalStorage();
});

function addToCart(name, price) {
  const existingItem = cart.find(item => item.name === name);
  if (existingItem) {
    existingItem.quantity++;
  } else {
    cart.push({ name, price, quantity: 1 });
  }
  updateCart();
}

function removeFromCart(name) {
  const itemIndex = cart.findIndex(item => item.name === name);
  if (itemIndex !== -1) {
    const item = cart[itemIndex];
    if (item.quantity > 1) {
      item.quantity--;
    } else {
      cart.splice(itemIndex, 1);
    }
  }
  updateCart();
}

function updateCart() {
  cartItemsElement.innerHTML = "";
  let total = 0;
  cart.forEach(item => {
    const row = document.createElement("tr");
    row.innerHTML = `
      <td>${item.name}</td>
      <td>$${item.price}</td>
      <td>${item.quantity}</td>
      <td>$${item.price * item.quantity}</td>
      <td>
        <button onclick="removeFromCart('${item.name}')">-</button>
        <button onclick="addToCart('${item.name}', ${item.price})">+</button>
      </td>
    `;
    cartItemsElement.appendChild(row);
    total += item.price * item.quantity;
  });
  cartTotalElement.textContent = "$" + total.toFixed(2);

  // Save the cart to local storage
  localStorage.setItem("cart", JSON.stringify(cart));
}

// Add event listeners to the "Add to Cart" buttons
const addToCartButtons = document.querySelectorAll(".add-to-cart");
addToCartButtons.forEach(button => {
  button.addEventListener("click", function () {
    const name = this.getAttribute("data-name");
    const price = parseFloat(this.getAttribute("data-price"));
    addToCart(name, price);
  });
});

// Add event listener for the checkout button
const checkoutButton = document.getElementById("checkout-button");
checkoutButton.addEventListener("click", function () {

  localStorage.clear();
  
  // Calculate the total price
  const total = parseFloat(cartTotalElement.textContent.replace("$", ""));
  
  // Send the total price to the server
  fetch('/save-order', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    },
    body: JSON.stringify({ total }),
  })
  .then(response => response.json())
  .then(data => {
    // Redirect to the Stripe checkout page
    window.location.href = data.checkoutUrl;
  })
  .catch(error => {
    console.error('Error:', error);
    alert('Ohh Snap!! You Need to Be a Registered Customer');
  });
});


// Example logout function
function logout() {
  // Save the cart to local storage when the user logs out
  updateCart();
  // Perform logout actions, such as clearing user sessions or redirecting to a login page
}


  </script>

</body>
</html>