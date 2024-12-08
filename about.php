<!DOCTYPE html>
<html lang="zxx">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>WellFood - Resturent HTML Template</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="assets/images/logos/favicon.png" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    
    <!-- Flaticon -->
    <link rel="stylesheet" href="assets/css/flaticon.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/css/fontawesome-5.14.0.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
    <!-- Nice Select -->
    <link rel="stylesheet" href="assets/css/nice-select.min.css">
    <!-- Animate -->
    <link rel="stylesheet" href="assets/css/aos.css">
    <!-- Slick -->
    <link rel="stylesheet" href="assets/css/slick.min.css">
    <!-- Main Style -->
    <link rel="stylesheet" href="assets/css/style.css">
    
</head>
<body>
    <div class="page-wrapper">

        <!-- Preloader -->
        <div class="preloader"><div class="custom-loader"></div></div>

        <!-- main header -->
        <?php  
require_once("header.php");
headerContent(1); 
?>

        <!--Form Back Drop-->
        <div class="form-back-drop"></div>
        
        <!-- Hidden Sidebar -->
        <section class="hidden-bar">
            <div class="inner-box text-center">
                <div class="cross-icon"><span class="fa fa-times"></span></div>
                <div class="title">
                    <h4>Get Appointment</h4>
                </div>

                <!--Appointment Form-->
                <div class="appointment-form">
                    <form method="post" action="contact.html">
                        <div class="form-group">
                            <input type="text" name="text" value="" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" value="" placeholder="Email Address" required>
                        </div>
                        <div class="form-group">
                            <textarea placeholder="Message" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="theme-btn style-two">Submit now</button>
                        </div>
                    </form>
                </div>

                <!--Social Icons-->
                <div class="social-style-one">
                    <a href="contact.html"><i class="fab fa-twitter"></i></a>
                    <a href="contact.html"><i class="fab fa-facebook-f"></i></a>
                    <a href="contact.html"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                </div>
            </div>
        </section>
        <!--End Hidden Sidebar -->
        
        
        <!-- Page Banner Start -->
        <section class="page-banner-area overlay pt-215 rpt-150 pb-160 rpb-120 rel z-1 bgs-cover text-center" style="background-image: url(assets/images/background/banner.jpg);">
            <div class="container">
                <div class="banner-inner text-white">
                    <h1 class="page-title" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">About company</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">About Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <!-- Page Banner End -->
        
        
        <!-- About Us Area start -->
        <section class="about-us-area-four pt-130 rpt-100 pb-85 rpb-55 rel z-1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-us-content ms-0 rmb-25" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                            <div class="section-title mb-25">
                                <span class="sub-title mb-5">learn About wellfood</span>
                                <h2>we provide best Quality food for your health</h2>
                            </div>
                            <p>Welcome too restaurant, where culinary excellence meets warm hospitality in every dish we serve. Nestled in the heart of City Name our eatery invites you on a journey</p>
                            <a href="about.html" class="theme-btn mt-25 mb-60">learn more us <i class="far fa-arrow-alt-right"></i></a>
                            <div class="row">
                                <div class="col-sm-4 col-6">
                                    <div class="counter-item style-two counter-text-wrap">
                                        <span class="count-text k-plus" data-speed="3000" data-stop="34">0</span>
                                        <span class="counter-title">Organic Planting</span>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6">
                                    <div class="counter-item style-two counter-text-wrap">
                                        <span class="count-text plus" data-speed="3000" data-stop="356">0</span>
                                        <span class="counter-title">Passionate Chef’s</span>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6">
                                    <div class="counter-item style-two counter-text-wrap">
                                        <span class="count-text plus" data-speed="3000" data-stop="8534">0</span>
                                        <span class="counter-title">Favourite Dishes</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-image-four style-two mb-30" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                            <div class="row">
                                <div class="col">
                                    <img src="assets/images/about/about-four1.jpg" alt="About">
                                </div>
                                <div class="col mt-80">
                                    <img src="assets/images/about/about-four2.jpg" alt="About">
                                </div>
                            </div>
                            <div class="badge"><img src="assets/images/about/about-four-badge.jpg" alt="Badge"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Us Area end -->
        
        
        <!-- Headline area start -->
        <div class="headline-area mb-105 rmb-85 rel z-1">
            <span class="marquee-wrap">
               <span class="marquee-inner left">
                    <span class="marquee-item">Italian pizza</span>
                    <span class="marquee-item"><i class="flaticon-star"></i></span>
                    <span class="marquee-item">delicious foods</span>
                    <span class="marquee-item"><i class="flaticon-star"></i></span>
                    <span class="marquee-item">burger king</span>
                    <span class="marquee-item"><i class="flaticon-star"></i></span>
               </span>
               <span class="marquee-inner left">
                    <span class="marquee-item">Italian pizza</span>
                    <span class="marquee-item"><i class="flaticon-star"></i></span>
                    <span class="marquee-item">delicious foods</span>
                    <span class="marquee-item"><i class="flaticon-star"></i></span>
                    <span class="marquee-item">burger king</span>
                    <span class="marquee-item"><i class="flaticon-star"></i></span>
               </span>
               <span class="marquee-inner left">
                    <span class="marquee-item">Italian pizza</span>
                    <span class="marquee-item"><i class="flaticon-star"></i></span>
                    <span class="marquee-item">delicious foods</span>
                    <span class="marquee-item"><i class="flaticon-star"></i></span>
                    <span class="marquee-item">burger king</span>
                    <span class="marquee-item"><i class="flaticon-star"></i></span>
               </span>
            </span>
            <div class="headline-shapes">
                <div class="shape one">
                    <img src="assets/images/shapes/tomato.png" alt="Shape">
                </div>
                <div class="shape two">
                    <img src="assets/images/shapes/burger.png" alt="Shape">
                </div>
            </div>
        </div>
        <!-- Headline Area end -->
        
        
        <!-- Food Category Area start -->
        <section class="food-category-area pb-90 rpb-65 rel z-1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-6 col-xl-7 col-lg-9">
                        <div class="section-title text-center mb-50" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <span class="sub-title mb-5">popular food category</span>
                            <h2>we provide amazing & Quality food for your good health</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <div class="featured-item">
                            <div class="icon">
                                <i class="flaticon-recommended-food"></i>
                            </div>
                            <div class="content">
                                <h4><a href="menu-restaurant.html">Best Quality Food</a></h4>
                                <p>Sed ut perspiciatis unde omnis este natus sit voluptatem</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                        <div class="featured-item">
                            <div class="icon">
                                <i class="flaticon-fast-delivery"></i>
                            </div>
                            <div class="content">
                                <h4><a href="menu-restaurant.html">fast food delivery</a></h4>
                                <p>Sed ut perspiciatis unde omnis este natus sit voluptatem</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                        <div class="featured-item">
                            <div class="icon">
                                <i class="flaticon-cashback"></i>
                            </div>
                            <div class="content">
                                <h4><a href="menu-restaurant.html">money back guarantee</a></h4>
                                <p>Sed ut perspiciatis unde omnis este natus sit voluptatem</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Food Category Area end -->

        
        
        <!-- Headline area start -->
        <!-- <div class="headline-area bgc-lighter pt-120 rpt-90 rel z-2">
            <span class="marquee-wrap">
               <span class="marquee-inner left">
                    <span class="marquee-item">Italian pizza</span>
                    <span class="marquee-item"><i class="flaticon-star"></i></span>
                    <span class="marquee-item">our Testimonials</span>
                    <span class="marquee-item"><i class="flaticon-star"></i></span>
                    <span class="marquee-item">burger king</span>
                    <span class="marquee-item"><i class="flaticon-star"></i></span>
               </span>
               <span class="marquee-inner left">
                    <span class="marquee-item">Italian pizza</span>
                    <span class="marquee-item"><i class="flaticon-star"></i></span>
                    <span class="marquee-item">our Testimonials</span>
                    <span class="marquee-item"><i class="flaticon-star"></i></span>
                    <span class="marquee-item">burger king</span>
                    <span class="marquee-item"><i class="flaticon-star"></i></span>
               </span>
               <span class="marquee-inner left">
                    <span class="marquee-item">Italian pizza</span>
                    <span class="marquee-item"><i class="flaticon-star"></i></span>
                    <span class="marquee-item">our Testimonials</span>
                    <span class="marquee-item"><i class="flaticon-star"></i></span>
                    <span class="marquee-item">burger king</span>
                    <span class="marquee-item"><i class="flaticon-star"></i></span>
               </span>
            </span>
            <div class="headline-shapes">
                <div class="shape one">
                    <img src="assets/images/shapes/chillies.png" alt="Shape">
                </div>
                <div class="shape two">
                    <img src="assets/images/shapes/tomato.png" alt="Shape">
                </div>
            </div>
        </div> -->
        <!-- Headline Area end -->
        
        
        <!-- Testimonials Area start -->
        <section class="testimonials-area bgc-lighter pt-105 rpt-85 pb-130 rpb-100 rel z-1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <div class="section-title text-center mb-50" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <span class="sub-title mb-5">customer feedback</span>
                            <h2>what have lot’s off happy customer explore feedback</h2>
                        </div>
                    </div>
                </div>
                <div class="testimonials-active">
                    <div class="testimonial-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <div class="quote"><i class="flaticon-quote"></i></div>
                        <div class="text">Renowned for its versatility in the kitchen, Red King Crab can be prepared in various ways, from simple steaming or boiling to elaborate preparations such as grilling incorporating</div>
                        <div class="author">
                            <img src="assets/images/testimonials/author1.jpg" alt="Author">
                            <div class="description">
                                <h5>Steven H. Paxson</h5>
                                <span>CEO & Founder</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                        <div class="quote"><i class="flaticon-quote"></i></div>
                        <div class="text">Renowned for its versatility in the kitchen, Red King Crab can be prepared in various ways, from simple steaming or boiling to elaborate preparations such as grilling incorporating</div>
                        <div class="author">
                            <img src="assets/images/testimonials/author2.jpg" alt="Author">
                            <div class="description">
                                <h5>Steven H. Paxson</h5>
                                <span>CEO & Founder</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                        <div class="quote"><i class="flaticon-quote"></i></div>
                        <div class="text">Renowned for its versatility in the kitchen, Red King Crab can be prepared in various ways, from simple steaming or boiling to elaborate preparations such as grilling incorporating</div>
                        <div class="author">
                            <img src="assets/images/testimonials/author3.jpg" alt="Author">
                            <div class="description">
                                <h5>Steven H. Paxson</h5>
                                <span>CEO & Founder</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="quote"><i class="flaticon-quote"></i></div>
                        <div class="text">Renowned for its versatility in the kitchen, Red King Crab can be prepared in various ways, from simple steaming or boiling to elaborate preparations such as grilling incorporating</div>
                        <div class="author">
                            <img src="assets/images/testimonials/author1.jpg" alt="Author">
                            <div class="description">
                                <h5>Steven H. Paxson</h5>
                                <span>CEO & Founder</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="quote"><i class="flaticon-quote"></i></div>
                        <div class="text">Renowned for its versatility in the kitchen, Red King Crab can be prepared in various ways, from simple steaming or boiling to elaborate preparations such as grilling incorporating</div>
                        <div class="author">
                            <img src="assets/images/testimonials/author2.jpg" alt="Author">
                            <div class="description">
                                <h5>Steven H. Paxson</h5>
                                <span>CEO & Founder</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="quote"><i class="flaticon-quote"></i></div>
                        <div class="text">Renowned for its versatility in the kitchen, Red King Crab can be prepared in various ways, from simple steaming or boiling to elaborate preparations such as grilling incorporating</div>
                        <div class="author">
                            <img src="assets/images/testimonials/author3.jpg" alt="Author">
                            <div class="description">
                                <h5>Steven H. Paxson</h5>
                                <span>CEO & Founder</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonials-shapes">
                <div class="shape one">
                    <img src="assets/images/shapes/hero-shape4.png" alt="Shape">
                </div>
                <div class="shape two">
                    <img src="assets/images/shapes/tomato.png" alt="Shape">
                </div>
            </div>
        </section>
        <!-- Testimonials Area end -->
          
    <?php 
    require "footer.php"
    
    ?>

    </div>
    <!--End pagewrapper-->
   
    
    <!-- Jquery -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Appear Js -->
    <script src="assets/js/appear.min.js"></script>
    <!-- Slick -->
    <script src="assets/js/slick.min.js"></script>
    <!-- Magnific Popup -->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Nice Select -->
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <!-- Image Loader -->
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <!-- Circle Progress -->
    <script src="assets/js/circle-progress.min.js"></script>
    <!-- Skillbar -->
    <script src="assets/js/skill.bars.jquery.min.js"></script>
    <!-- Isotope -->
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <!--  AOS Animation -->
    <script src="assets/js/aos.js"></script>
    <!-- Custom script -->
    <script src="assets/js/script.js"></script>

</body>
</html>