<?php
require "connection.php";
session_start();
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>WellFood - Resturent HTML Template || Pizza</title>
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
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css">

<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-thin.css">

<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-solid.css">

<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-regular.css">

<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-light.css">
    <script src="https://js.stripe.com/v3/"></script>

</head>
<body>
    <div class="page-wrapper">

        <!-- Preloader -->
        <!-- <div class="preloader"><div class="custom-loader"></div></div> -->
<?php  
require_once("header.php");
headerContent(1); 
?>

        <!--Form Back Drop-->
        <div class="form-back-drop"></div>
   
       
        
        <!-- Hero Area Start -->
        <section class="hero-area-three pt-250 pb-220 rpb-100 rel z-1" style="background-image: url(assets/images/background/hero-three.png)">
           <span class="marquee-wrap style-two text-white">
               <span class="marquee-inner left">Booze Bites</span>
               <span class="marquee-inner left">Booze Bites</span>
               <span class="marquee-inner left">Booze Bites</span>
            </span>
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-lg-6">
                        <div class="hero-content-three mt-250 rmt-0 rmb-55 text-white" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <h1>Savor Boldly</h1>
                            <p>Flavors that Pair Perfectly with Your Drink</p>
                            <a href="shop.php" class="theme-btn style-two">order now <i class="far fa-arrow-alt-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="hero-three-image">
                            <img src="assets/images/hero/hero-three.png" alt="Hero">
                            <div class="offer-badge" style="background-image: url(assets/images/shapes/offer-circle-shape.png)">
                                <span>50% <br>off</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Hero Area End -->
        
        
        <!-- Food Category Area start -->
        <section class="food-category-area pb-90 rpb-65 rel z-1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-9">
                        <div class="section-title text-center mb-50" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <span class="sub-title mb-5">popular food category</span>
                            <h2>Elevate Your Dining & Experience with Booze Bites</h2>
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
                                <h4>Best Quality Food</h4>
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
                                <h4>fast food delivery</h4>
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
                                <h4>money back guarantee</h4>
                                <p>Sed ut perspiciatis unde omnis este natus sit voluptatem</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="food-category-shape">
                <div class="shape one">
                    <img src="assets/images/shapes/food-category1.png" alt="Shape">
                </div>
                <div class="shape two">
                    <img src="assets/images/shapes/food-category2.png" alt="Shape">
                </div>
            </div>
        </section>
        <!-- Food Category Area end -->
        
        
        <!-- Headline area start -->
        <div class="headline-area mb-50 rmb-20 rel z-1">
            <span class="marquee-wrap">
               <span class="marquee-inner left">
                    <span class="marquee-item">Sri Lankan Spiced Bites</span>
                    <span class="marquee-item"><i class="flaticon-star"></i></span>
                    <span class="marquee-item">Booze Bites</span>
                    <span class="marquee-item"><i class="flaticon-star"></i></span>
                    <span class="marquee-item">Weekend Food Pairings</span>
                    <span class="marquee-item"><i class="flaticon-star"></i></span>
               </span>
               <span class="marquee-inner left">
                    <span class="marquee-item">Booze Bites</span>
                    <span class="marquee-item"><i class="flaticon-star"></i></span>
                    <span class="marquee-item">Where Every Bite Meets a Sip</span>
                    <span class="marquee-item"><i class="flaticon-star"></i></span>
                    <span class="marquee-item">Delight</span>
                    <span class="marquee-item"><i class="flaticon-star"></i></span>
               </span>
               <span class="marquee-inner left">
                    <span class="marquee-item">Booze Bites</span>
                    <span class="marquee-item"><i class="flaticon-star"></i></span>
                    <span class="marquee-item">Booze Bites</span>
                    <span class="marquee-item"><i class="flaticon-star"></i></span>
                    <span class="marquee-item">Booze Bites</span>
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
       
        
        <!-- About Us Area start -->
        <section class="about-us-area pb-100 rpb-70 rel z-1">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-xl-8">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="section-title mt-55 mb-25" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                    <span class="sub-title mb-5">learn About Booze Bites</span>
                                    <h2>Serving Bold Flavors to Boost Your Moments</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-6" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <div class="about-video mb-30">
                                    <img src="assets/images/about/about-video-bg.jpg" alt="About Video">
                                    <a href="https://www.youtube.com/watch?v=9Y7ma241N8k" class="mfp-iframe video-play"><i class="fas fa-play"></i></a>
                                </div>
                            </div>
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                                <div class="about-middle-content mb-30">
                                    <h4>we have 25+ Years Of Experience</h4>
                                    <p>Welcome too restaurant, where culinary excellence meets warm hospitality in every dish we nestled in the heart of City name our eatery invites</p>
                                    <div class="about-btn-customer mt-40">
                                        <a href="about.html" class="theme-btn style-two">learn more us <i class="far fa-arrow-alt-right"></i></a>
                                        <div class="customer">
                                            <h6>5m+ Happy customer</h6>
                                            <div class="customer-image">
                                                <img src="assets/images/about/customer1.png" alt="Customer">
                                                <img src="assets/images/about/customer2.png" alt="Customer">
                                                <img src="assets/images/about/customer3.png" alt="Customer">
                                                <img src="assets/images/about/customer4.png" alt="Customer">
                                                <img src="assets/images/about/customer5.png" alt="Customer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-offset="50">
                        <div class="about-image-part style-three mb-30">
                            <img src="assets/images/about/about2.jpg" alt="About">
                            <div class="quality-food" style="background-image: url(assets/images/shapes/about-star.png)">
                                <span class="for-border"></span>
                                <span class="text">quality <br>food</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Us Area end -->
        
        
        <!-- Category Banner area start -->
        <div class="category-banner-area-two">
           <div class="container-fluid">
               <div class="row row-cols-lg-3 row-cols-sm-2 row-cols-1 justify-content-center">
                    <div class="col" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <div class="category-banner-item style-two" style="background-image: url(assets/images/banner/category-banner-two1.png);">
                            <span class="price">only $59</span>
                            <h3>SPECIALTY Beef steak</h3>
                            <div class="ratting">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span>(5k)</span>
                            </div>
                            <a href="shop.html" class="theme-btn style-two">Order now <i class="far fa-arrow-alt-right"></i></a>
                            <div class="food-image">
                                <img src="assets/images/banner/category-banner-food1.png" alt="Food">
                            </div>
                        </div>
                    </div>
                    <div class="col" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                        <div class="category-banner-item style-two color-black" style="background-image: url(assets/images/banner/category-banner-two2.png);">
                            <span class="price">only $43</span>
                            <h3>SPECIALTY Italian pizza</h3>
                            <div class="ratting">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span>(5k)</span>
                            </div>
                            <a href="shop.html" class="theme-btn">Order now <i class="far fa-arrow-alt-right"></i></a>
                            <div class="food-image">
                                <img src="assets/images/banner/category-banner-food2.png" alt="Food">
                            </div>
                        </div>
                    </div>
                    <div class="col" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                        <div class="category-banner-item style-two" style="background-image: url(assets/images/banner/category-banner-two1.png);">
                            <span class="price">only $35</span>
                            <h3>vegetable burger</h3>
                            <div class="ratting">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span>(5k)</span>
                            </div>
                            <a href="shop.html" class="theme-btn style-two">Order now <i class="far fa-arrow-alt-right"></i></a>
                            <div class="food-image">
                                <img src="assets/images/banner/category-banner-food3.png" alt="Food">
                            </div>
                        </div>
                    </div>
               </div>
           </div>
        </div>
        <!-- Category Banner area end -->
        
        
        <!-- Burger Area start -->
        <section class="burger-area pt-100 rpt-70 pb-130 rpb-100 rel z-1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="section-title text-center mb-50" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <span class="sub-title mb-5">popular burger</span>
                            <h2>popular delicious burger</h2>
                        </div>
                    </div>
                </div>
                <div class="pizza-active">
                    <?php
                    $product_rs=Database::search("");
                    ?>
                    <div class="product-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <div class="image">
                            <img src="assets/images/products/burger1.jpg" alt="Burger">
                            <span class="pizza-badge">hot</span>
                        </div>
                        <div class="content">
                            <div class="ratting">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span>(5k)</span>
                            </div>
                            <h5><a href="product-details.html">vegetable beef Burger</a></h5>
                            <span class="price"><del>$50</del> $25</span>
                        </div>
                    </div>
                    <div class="product-item" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                        <div class="image">
                            <img src="assets/images/products/burger2.jpg" alt="Burger">
                            <span class="pizza-badge">-10%</span>
                        </div>
                        <div class="content">
                            <div class="ratting">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span>(5k)</span>
                            </div>
                            <h5><a href="product-details.html">beef checken burger</a></h5>
                            <span class="price"><del>$50</del> $25</span>
                        </div>
                    </div>
                    <div class="product-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                        <div class="image">
                            <img src="assets/images/products/burger3.jpg" alt="Burger">
                        </div>
                        <div class="content">
                            <div class="ratting">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span>(5k)</span>
                            </div>
                            <h5><a href="product-details.html">burgers black bread</a></h5>
                            <span class="price"><del>$50</del> $25</span>
                        </div>
                    </div>
                    <div class="product-item" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-offset="50">
                        <div class="image">
                            <img src="assets/images/products/burger4.jpg" alt="Burger">
                            <span class="pizza-badge">new</span>
                        </div>
                        <div class="content">
                            <div class="ratting">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span>(5k)</span>
                            </div>
                            <h5><a href="product-details.html">delicious burger with beef</a></h5>
                            <span class="price"><del>$50</del> $25</span>
                        </div>
                    </div>
                    <div class="product-item">
                        <div class="image">
                            <img src="assets/images/products/burger1.jpg" alt="Burger">
                            <span class="pizza-badge">hot</span>
                        </div>
                        <div class="content">
                            <div class="ratting">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span>(5k)</span>
                            </div>
                            <h5><a href="product-details.html">vegetable beef Burger</a></h5>
                            <span class="price"><del>$50</del> $25</span>
                        </div>
                    </div>
                    <div class="product-item">
                        <div class="image">
                            <img src="assets/images/products/burger2.jpg" alt="Burger">
                            <span class="pizza-badge">-10%</span>
                        </div>
                        <div class="content">
                            <div class="ratting">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span>(5k)</span>
                            </div>
                            <h5><a href="product-details.html">beef checken burger</a></h5>
                            <span class="price"><del>$50</del> $25</span>
                        </div>
                    </div>
                    <div class="product-item">
                        <div class="image">
                            <img src="assets/images/products/burger3.jpg" alt="Burger">
                        </div>
                        <div class="content">
                            <div class="ratting">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span>(5k)</span>
                            </div>
                            <h5><a href="product-details.html">burgers black bread</a></h5>
                            <span class="price"><del>$50</del> $25</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Burger Area end -->
        
        
        
        <!-- Headline area start -->
        <!-- <div class="headline-area bgc-black pt-120 rpt-90 rel z-2">
            <span class="marquee-wrap white-text">
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
        </div> -->
        <!-- Headline Area end -->
        
        
        <!-- Special Offer Area start -->
        <!-- <section class="special-offer-area-two bgc-black pt-105 rpt-85 pb-130 rpb-100 rel z-1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="offer-content-two text-center text-white rmb-55" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                            <img src="assets/images/offer/special-burger.png" alt="Special burger">
                            <div class="section-title mt-45 mb-25"><h2>Delicious burger</h2></div>
                            <p>Nestled in the heart of the city, our restaurant is a culinary haven where flavors come alive memories are made.</p>
                            <ul class="offer-countdown-wrap mt-40 mb-25">
                                <li><span id="days"></span>Days</li>
                                <li><span id="hours"></span>Hours</li>
                                <li><span id="minutes"></span>Min</li>
                                <li><span id="seconds"></span>Sec</li>
                            </ul>
                            <a href="shop.html" class="theme-btn style-three">order now <i class="far fa-arrow-alt-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="offer-image style-two" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                            <img src="assets/images/offer/burger.png" alt="Burger Image">
                            <div class="offer-badge" style="background-image: url(assets/images/shapes/offer-circle-shape.png)">
                                <span>only <br><span class="price">$59</span></span>
                            </div>
                            <span class="marquee-wrap style-two text-white">
                               <span class="marquee-inner left">burger</span>
                               <span class="marquee-inner left">burger</span>
                               <span class="marquee-inner left">burger</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonials-shapes">
                <div class="shape one">
                    <img src="assets/images/shapes/hero-shape5.png" alt="Shape">
                </div>
                <div class="shape two">
                    <img src="assets/images/shapes/hero-shape3.png" alt="Shape">
                </div>
            </div>
        </section> -->
        <!-- Special Offer Area end -->
        
        
        <!-- Popular Menu Area start -->
        <!-- <section class="popular-menu-area-three pt-130 rpt-100 pb-115 rpb-90 rel z-1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7 col-md-8">
                        <div class="section-title text-center mb-50" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <span class="sub-title mb-5">popular menu</span>
                            <h2>we provide exclusive food based on usa explore our popular food</h2>
                        </div>
                    </div>
                </div>
                <div class="row no-gap">
                    <div class="col-lg-6">
                        <div class="popular-menu-wrap" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                            <div class="food-menu-item style-two">
                                <div class="image">
                                    <img src="assets/images/food/burger-menu1.jpg" alt="Burger Menu">
                                </div>
                                <div class="content">
                                    <h5><span class="title">beef burger</span> <span class="dots"></span> <span class="price">$25</span></h5>
                                    <p>Diverse menu features array of delectable</p>
                                </div>
                            </div>
                            <div class="food-menu-item style-two">
                                <div class="image">
                                    <img src="assets/images/food/burger-menu2.jpg" alt="Burger Menu">
                                </div>
                                <div class="content">
                                    <h5><span class="title">Chicken burger</span> <span class="dots"></span> <span class="price">$25</span></h5>
                                    <p>Diverse menu features array of delectable</p>
                                </div>
                            </div>
                            <div class="food-menu-item style-two">
                                <div class="image">
                                    <img src="assets/images/food/burger-menu3.jpg" alt="Burger Menu">
                                </div>
                                <div class="content">
                                    <h5><span class="title">Beef burger</span> <span class="dots"></span> <span class="price">$25</span></h5>
                                    <p>Diverse menu features array of delectable</p>
                                </div>
                            </div>
                            <div class="food-menu-item style-two">
                                <div class="image">
                                    <img src="assets/images/food/burger-menu4.jpg" alt="Burger Menu">
                                </div>
                                <div class="content">
                                    <h5><span class="title">Italian pizza</span> <span class="dots"></span> <span class="price">$25</span></h5>
                                    <p>Diverse menu features array of delectable</p>
                                </div>
                            </div>
                            <div class="food-menu-item style-two">
                                <div class="image">
                                    <img src="assets/images/food/burger-menu5.jpg" alt="Burger Menu">
                                </div>
                                <div class="content">
                                    <h5><span class="title">black burger</span> <span class="dots"></span> <span class="price">$25</span></h5>
                                    <p>Diverse menu features array of delectable</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="popular-menu-wrap" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                            <div class="food-menu-item style-two">
                                <div class="image">
                                    <img src="assets/images/food/burger-menu6.jpg" alt="Burger Menu">
                                </div>
                                <div class="content">
                                    <h5><span class="title">beef burger</span> <span class="dots"></span> <span class="price">$25</span></h5>
                                    <p>Diverse menu features array of delectable</p>
                                </div>
                            </div>
                            <div class="food-menu-item style-two">
                                <div class="image">
                                    <img src="assets/images/food/burger-menu7.jpg" alt="Burger Menu">
                                </div>
                                <div class="content">
                                    <h5><span class="title">Chicken burger</span> <span class="dots"></span> <span class="price">$25</span></h5>
                                    <p>Diverse menu features array of delectable</p>
                                </div>
                            </div>
                            <div class="food-menu-item style-two">
                                <div class="image">
                                    <img src="assets/images/food/burger-menu8.jpg" alt="Burger Menu">
                                </div>
                                <div class="content">
                                    <h5><span class="title">Beef burger</span> <span class="dots"></span> <span class="price">$25</span></h5>
                                    <p>Diverse menu features array of delectable</p>
                                </div>
                            </div>
                            <div class="food-menu-item style-two">
                                <div class="image">
                                    <img src="assets/images/food/burger-menu9.jpg" alt="Burger Menu">
                                </div>
                                <div class="content">
                                    <h5><span class="title">Italian pizza</span> <span class="dots"></span> <span class="price">$25</span></h5>
                                    <p>Diverse menu features array of delectable</p>
                                </div>
                            </div>
                            <div class="food-menu-item style-two">
                                <div class="image">
                                    <img src="assets/images/food/burger-menu10.jpg" alt="Burger Menu">
                                </div>
                                <div class="content">
                                    <h5><span class="title">black burger</span> <span class="dots"></span> <span class="price">$25</span></h5>
                                    <p>Diverse menu features array of delectable</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="menu-items-shape">
                <div class="shape one">
                    <img src="assets/images/shapes/menu-item1.png" alt="Shape">
                </div>
                <div class="shape two">
                    <img src="assets/images/shapes/menu-item2.png" alt="Shape">
                </div>
            </div>
        </section> -->
        <!-- Popular Menu Area end -->
        
        
        <!-- Headline area start -->
        <!-- <div class="headline-area mb-105 rmb-85 rel z-1">
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
        </div> -->
        <!-- Headline Area end -->
        
        
        <!-- Testimonials Three Area start -->
        <section class="testimonials-three rel z-1 bgc-primary pt-130 rpt-100 pb-215 rpb-150" style="background-image: url(assets/images/testimonials/testimonials-two-bg.png);">
            <div class="container">
                <div class="row justify-content-center rmb-30">
                    <div class="col-xl-10 col-lg-11">
                        <div class="testimonials-three-content rel z-1 text-white">
                           <div class="section-title text-center mb-45" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <span class="sub-title text-white mb-5">customer feedback</span>
                                <h2>what our customer’s say us</h2>
                            </div>
                            <div class="testimonials-two-carousel" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <div class="testimonial-two-item style-two">
                                    <div class="image">
                                        <div class="quote"><i class="flaticon-quote"></i></div>
                                        <img src="assets/images/testimonials/author-three.jpg" alt="Author">
                                    </div>
                                    <div class="content">
                                        <div class="text">Renowned for its versatility in the kitchen, Red King Crab can prepared in various ways, from simple steaming or boiling to elaborate preparations such as grilling incorporating weather loving</div>
                                        <span class="author">Randy R. Pennington</span>
                                        <span class="designation">web designer</span>
                                    </div>
                                </div>
                                <div class="testimonial-two-item style-two">
                                    <div class="image">
                                        <div class="quote"><i class="flaticon-quote"></i></div>
                                        <img src="assets/images/testimonials/author-three.jpg" alt="Author">
                                    </div>
                                    <div class="content">
                                        <div class="text">Renowned for its versatility in the kitchen, Red King Crab can prepared in various ways, from simple steaming or boiling to elaborate preparations such as grilling incorporating weather loving</div>
                                        <span class="author">Salvador I. Burton</span>
                                        <span class="designation">Manager</span>
                                    </div>
                                </div>
                                <div class="testimonial-two-item style-two">
                                    <div class="image">
                                        <div class="quote"><i class="flaticon-quote"></i></div>
                                        <img src="assets/images/testimonials/author-three.jpg" alt="Author">
                                    </div>
                                    <div class="content">
                                        <div class="text">Renowned for its versatility in the kitchen, Red King Crab can prepared in various ways, from simple steaming or boiling to elaborate preparations such as grilling incorporating weather loving</div>
                                        <span class="author">Randy R. Pennington</span>
                                        <span class="designation">web designer</span>
                                    </div>
                                </div>
                                <div class="testimonial-two-item style-two">
                                    <div class="image">
                                        <div class="quote"><i class="flaticon-quote"></i></div>
                                        <img src="assets/images/testimonials/author-three.jpg" alt="Author">
                                    </div>
                                    <div class="content">
                                        <div class="text">Renowned for its versatility in the kitchen, Red King Crab can prepared in various ways, from simple steaming or boiling to elaborate preparations such as grilling incorporating weather loving</div>
                                        <span class="author">Salvador I. Burton</span>
                                        <span class="designation">Manager</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonials-shapes">
                <div class="shape one">
                    <img src="assets/images/shapes/testi-shape1.png" alt="Shape">
                </div>
                <div class="shape two">
                    <img src="assets/images/shapes/testi-shape2.png" alt="Shape">
                </div>
                <div class="shape three">
                    <img src="assets/images/shapes/testi-shape3.png" alt="Shape">
                </div>
                <div class="shape four">
                    <img src="assets/images/shapes/testi-shape4.png" alt="Shape">
                </div>
                <div class="shape five">
                    <img src="assets/images/shapes/testi-shape5.png" alt="Shape">
                </div>
            </div>
        </section>
        <!-- Testimonials Three Area end -->
        
        
        <!-- Client Area start -->
        <div class="client-area rel z-2">
            <div class="container container-1520">
                <div class="client-wrap">
                    <div class="client-active">
                        <a href="#" class="client-item">
                            <img src="assets/images/clients/client1.png" alt="Client Logo">
                        </a>
                        <a href="#" class="client-item">
                            <img src="assets/images/clients/client2.png" alt="Client Logo">
                        </a>
                        <a href="#" class="client-item">
                            <img src="assets/images/clients/client3.png" alt="Client Logo">
                        </a>
                        <a href="#" class="client-item">
                            <img src="assets/images/clients/client4.png" alt="Client Logo">
                        </a>
                        <a href="#" class="client-item">
                            <img src="assets/images/clients/client5.png" alt="Client Logo">
                        </a>
                        <a href="#" class="client-item">
                            <img src="assets/images/clients/client6.png" alt="Client Logo">
                        </a>
                        <a href="#" class="client-item">
                            <img src="assets/images/clients/client1.png" alt="Client Logo">
                        </a>
                        <a href="#" class="client-item">
                            <img src="assets/images/clients/client2.png" alt="Client Logo">
                        </a>
                        <a href="#" class="client-item">
                            <img src="assets/images/clients/client3.png" alt="Client Logo">
                        </a>
                        <a href="#" class="client-item">
                            <img src="assets/images/clients/client4.png" alt="Client Logo">
                        </a>
                        <a href="#" class="client-item">
                            <img src="assets/images/clients/client5.png" alt="Client Logo">
                        </a>
                        <a href="#" class="client-item">
                            <img src="assets/images/clients/client6.png" alt="Client Logo">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Client Area end -->
        
        
        <!-- Blog Area start -->
        <!-- <section class="blog-area pt-130 rpt-100 pb-80 rpb-50 rel z-1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="section-title text-center mb-50" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <span class="sub-title mb-5">latest news & blog</span>
                            <h2>get every single updates latest</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-md-6">
                        <div class="blog-item" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <img src="assets/images/blog/blog1.jpg" alt="Blog">
                                <ul class="blog-meta">
                                    <li>
                                        <a href="#">Quality Food</a>
                                    </li>
                                    <li>
                                        <a href="#">March 25, 2024</a>
                                    </li>
                                    <li>
                                        <a href="#">comments (5)</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="content">
                                <h4><a href="blog-details.html">Culinary Chronicles Exploring Gastronomic Wonders at foodking Restaurant</a></h4>
                                <p>Restaurant where culinary excellence meets hospitality in every dish we serve settled in the heart</p>
                                <a href="blog-details.html" class="read-more">Read more <i class="far fa-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="blog-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <img src="assets/images/blog/blog2.jpg" alt="Blog">
                                <ul class="blog-meta">
                                    <li>
                                        <a href="#">Quality Food</a>
                                    </li>
                                    <li>
                                        <a href="#">March 25, 2024</a>
                                    </li>
                                    <li>
                                        <a href="#">comments (5)</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="content">
                                <h4><a href="blog-details.html">Culinary Chronicles Exploring Gastronomic Wonders at foodking Restaurant</a></h4>
                                <p>Restaurant where culinary excellence meets hospitality in every dish we serve settled in the heart</p>
                                <a href="blog-details.html" class="read-more">Read more <i class="far fa-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="blog-item" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <img src="assets/images/blog/blog3.jpg" alt="Blog">
                                <ul class="blog-meta">
                                    <li>
                                        <a href="#">Quality Food</a>
                                    </li>
                                    <li>
                                        <a href="#">March 25, 2024</a>
                                    </li>
                                    <li>
                                        <a href="#">comments (5)</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="content">
                                <h4><a href="blog-details.html">Culinary Chronicles Exploring Gastronomic Wonders at foodking Restaurant</a></h4>
                                <p>Restaurant where culinary excellence meets hospitality in every dish we serve settled in the heart</p>
                                <a href="blog-details.html" class="read-more">Read more <i class="far fa-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- Blog Area end -->
        
        
        <!-- Headline area start -->
        <div class="headline-area rel z-1">
            <span class="marquee-wrap">
               <span class="marquee-inner left">
                    <span class="marquee-item">newsletter subscribe</span>
                    <span class="marquee-item"><i class="flaticon-star"></i></span>
                    <span class="marquee-item">newsletter subscribe</span>
                    <span class="marquee-item"><i class="flaticon-star"></i></span>
                    <span class="marquee-item">newsletter subscribe</span>
                    <span class="marquee-item"><i class="flaticon-star"></i></span>
               </span>
               <span class="marquee-inner left">
                    <span class="marquee-item">newsletter subscribe</span>
                    <span class="marquee-item"><i class="flaticon-star"></i></span>
                    <span class="marquee-item">newsletter subscribe</span>
                    <span class="marquee-item"><i class="flaticon-star"></i></span>
                    <span class="marquee-item">newsletter subscribe</span>
                    <span class="marquee-item"><i class="flaticon-star"></i></span>
               </span>
               <span class="marquee-inner left">
                    <span class="marquee-item">newsletter subscribe</span>
                    <span class="marquee-item"><i class="flaticon-star"></i></span>
                    <span class="marquee-item">newsletter subscribe</span>
                    <span class="marquee-item"><i class="flaticon-star"></i></span>
                    <span class="marquee-item">newsletter subscribe</span>
                    <span class="marquee-item"><i class="flaticon-star"></i></span>
               </span>
            </span>
            <div class="headline-shapes">
                <div class="shape one">
                    <img src="assets/images/shapes/tomato.png" alt="Shape">
                </div>
            </div>
        </div>
        <!-- Headline Area end -->
       
        
        <!-- Newsletter Area start -->
        <section class="newsletter-area py-65 mb-5 rel z-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section-title rmb-25" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <span class="sub-title mb-5">GET IN TOUCH WITH US ON WHATSAPP</span>
                            <h2>Share your WhatsApp number, and we will contact you shortly</h2>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="newsletter-form-wrap" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                            <h6>Share your WhatsApp number, and the Booze Bites team will get in touch with you soon!
                            Shape</h6>
                            <form class="newsletter-form style-two mt-15" action="#">
                                <label for="news-email"><i class="fa-brands fa-whatsapp"></i></label>
                                <input id="news-email" type="text" placeholder="enter your whatsapp number" required>
                                <button class="theme-btn style-two" type="submit">Submit <i class="far fa-arrow-alt-right"></i></button>
                            </form>
                         
                        </div>
                    </div>
                </div>
            </div>
            <div class="newsletter-shapes">
                <div class="shape">
                    <img src="assets/images/shapes/newsletter-pizza-shape.png" alt="Shape">
                </div>
            </div>
        </section>
        <!-- Newsletter Area end -->
         
         
        <!-- Instagram area start -->
        <div class="instagram-area">
           <div class="row no-gap row-cols-xxl-5 row-cols-xl-4 row-cols-lg-3 row-cols-sm-2 row-cols-1 justify-content-center">
                <div class="col" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <div class="instagram-item">
                        <img src="assets/images/instagram/instagram1.jpg" alt="Instagram">
                        <a href="assets/images/instagram/instagram1.jpg"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                    <div class="instagram-item">
                        <img src="assets/images/instagram/instagram2.jpg" alt="Instagram">
                        <a href="assets/images/instagram/instagram2.jpg"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                    <div class="instagram-item">
                        <img src="assets/images/instagram/instagram3.jpg" alt="Instagram">
                        <a href="assets/images/instagram/instagram3.jpg"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-offset="50">
                    <div class="instagram-item">
                        <img src="assets/images/instagram/instagram4.jpg" alt="Instagram">
                        <a href="assets/images/instagram/instagram4.jpg"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                    <div class="instagram-item">
                        <img src="assets/images/instagram/instagram5.jpg" alt="Instagram">
                        <a href="assets/images/instagram/instagram5.jpg"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
           </div>
        </div>
        <!-- Instagram area end -->
          
    <?php  
    
    require "footer.php"
    ?>

    </div>
    <!--End pagewrapper-->
   <!-- Header -->
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