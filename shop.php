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
    <!-- jQuery UI -->
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
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
                    <h1 class="page-title" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">Shop With sidebar</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Shop With sidebar</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <!-- Page Banner End -->
        
        
        <!-- Shop Area Start -->
        <section class="shop-area py-130 rpy-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-8">
                        <div class="shop-sidebar rmb-75">
                            <div class="widget widget-search" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <h4 class="widget-title">Search</h4>
                                <form action="#" class="default-search-form">
                                    <input type="text" placeholder="Search here" required>
                                    <button type="submit" class="searchbutton far fa-search"></button>
                                </form>
                            </div>
                            <div class="widget widget-category" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                                <h4 class="widget-title">Category</h4>
                                <ul>
                                    <li><a href="shop.html">Beef & Chicken Hamburger <span class="count">8</span></a></li>
                                    <li><a href="shop.html">Italian Pizza <span class="count">3</span></a></li>
                                    <li><a href="shop.html">Sandwich <span class="count">5</span></a></li>
                                    <li><a href="shop.html">Chicken Roll <span class="count">2</span></a></li>
                                    <li><a href="shop.html">Soup <span class="count">5</span></a></li>
                                </ul>
                            </div>
                            <div class="widget widget-filter" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                                <h4 class="widget-title">Pricing</h4>
                                <div class="price-filter-wrap">
                                    <div class="price-slider-range"></div>
                                    <div class="price">
                                        <span>Price </span>
                                        <input type="text" id="price" readonly>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="widget widget-products" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <h4 class="widget-title">Best Seller</h4>
                                <ul>
                                    <li>
                                        <div class="image">
                                            <img src="assets/images/widgets/product1.jpg" alt="Product">
                                        </div>
                                        <div class="content">
                                            <div class="ratting">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <h6><a href="product-details.html">Vegetable Hamburger</a></h6>
                                            <span class="price">$58.63</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="image">
                                            <img src="assets/images/widgets/product2.jpg" alt="Product">
                                        </div>
                                        <div class="content">
                                            <div class="ratting">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <h6><a href="product-details.html">Italian Chicken Pizza</a></h6>
                                            <span class="price">$83.25</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="image">
                                            <img src="assets/images/widgets/product3.jpg" alt="Product">
                                        </div>
                                        <div class="content">
                                            <div class="ratting">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <h6><a href="product-details.html">Crab Seafood sauce</a></h6>
                                            <span class="price">$83.25</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="widget widget-tag-cloud" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <h4 class="widget-title">Popular Tags</h4>
                                <div class="tag-coulds">
                                    <a href="shop.html">Spicy</a>
                                    <a href="shop.html">Seafoods</a>
                                    <a href="shop.html">Burger</a>
                                    <a href="shop.html">Pizza</a>
                                    <a href="shop.html">Soup</a>
                                    <a href="shop.html">Crap</a>
                                    <a href="shop.html">Juice</a>
                                    <a href="shop.html">Bread</a>
                                </div>
                            </div>
                            
                            <div class="widget widget-banner" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <div class="category-banner-item" style="background-image: url(assets/images/widgets/banner-bg.jpg);">
                                    <span class="price">only $59</span>
                                    <h3>SPECIALTY PIZZAS</h3>
                                    <div class="ratting">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span>(5k)</span>
                                    </div>
                                    <a href="shop.html" class="theme-btn style-two">Order now <i class="far fa-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8">
                        <div class="shop-page-wrap">
                            <div class="shop-shorter rel z-3 mb-35">
                                <div class="sort-text mb-15" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                                    Showing 1–12 of 27 results
                                </div>
                                <div class="products-dropdown mb-15" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                                    <select>
                                        <option value="default" selected="">Default Sorting</option>
                                        <option value="new">Newness Sorting</option>
                                        <option value="old">Oldest Sorting</option>
                                        <option value="hight-to-low">High To Low</option>
                                        <option value="low-to-high">Low To High</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-sm-6" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                    <div class="product-item-two">
                                        <div class="image">
                                            <img src="assets/images/dishes/dish1.png" alt="Dish">
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
                                            <h5><a href="product-details.html">fresh chicken burger</a></h5>
                                            <span class="price"><del>$50</del> $25</span>
                                        </div>
                                        <a href="shop.html" class="theme-btn">add to cart <i class="far fa-arrow-alt-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-6" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                                    <div class="product-item-two">
                                        <div class="image">
                                            <img src="assets/images/dishes/dish2.png" alt="Dish">
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
                                            <h5><a href="product-details.html">pizza with mushrooms</a></h5>
                                            <span class="price"><del>$50</del> $25</span>
                                        </div>
                                        <a href="shop.html" class="theme-btn">add to cart <i class="far fa-arrow-alt-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-6" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                                    <div class="product-item-two">
                                        <div class="image">
                                            <img src="assets/images/dishes/dish3.png" alt="Dish">
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
                                            <h5><a href="product-details.html">double burger & fries</a></h5>
                                            <span class="price"><del>$50</del> $25</span>
                                        </div>
                                        <a href="shop.html" class="theme-btn">add to cart <i class="far fa-arrow-alt-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-6" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                    <div class="product-item-two">
                                        <div class="image">
                                            <img src="assets/images/dishes/dish5.png" alt="Dish">
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
                                            <h5><a href="product-details.html">Italian beef pizza</a></h5>
                                            <span class="price"><del>$50</del> $25</span>
                                        </div>
                                        <a href="shop.html" class="theme-btn">add to cart <i class="far fa-arrow-alt-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-6" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                                    <div class="product-item-two">
                                        <div class="image">
                                            <img src="assets/images/dishes/dish6.png" alt="Dish">
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
                                            <h5><a href="product-details.html">fried chicken burger</a></h5>
                                            <span class="price"><del>$50</del> $25</span>
                                        </div>
                                        <a href="shop.html" class="theme-btn">add to cart <i class="far fa-arrow-alt-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-6" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                                    <div class="product-item-two">
                                        <div class="image">
                                            <img src="assets/images/dishes/dish4.png" alt="Dish">
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
                                            <h5><a href="product-details.html">fried chicken french</a></h5>
                                            <span class="price"><del>$50</del> $25</span>
                                        </div>
                                        <a href="shop.html" class="theme-btn">add to cart <i class="far fa-arrow-alt-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-6" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                    <div class="product-item-two">
                                        <div class="image">
                                            <img src="assets/images/dishes/dish7.png" alt="Dish">
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
                                            <h5><a href="product-details.html">fried chicken french</a></h5>
                                            <span class="price"><del>$50</del> $25</span>
                                        </div>
                                        <a href="shop.html" class="theme-btn">add to cart <i class="far fa-arrow-alt-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-6" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                                    <div class="product-item-two">
                                        <div class="image">
                                            <img src="assets/images/dishes/dish8.png" alt="Dish">
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
                                            <h5><a href="product-details.html">fried chicken drench</a></h5>
                                            <span class="price"><del>$50</del> $25</span>
                                        </div>
                                        <a href="shop.html" class="theme-btn">add to cart <i class="far fa-arrow-alt-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-6" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                                    <div class="product-item-two">
                                        <div class="image">
                                            <img src="assets/images/dishes/dish9.png" alt="Dish">
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
                                            <h5><a href="product-details.html">roasted chicken</a></h5>
                                            <span class="price"><del>$50</del> $25</span>
                                        </div>
                                        <a href="shop.html" class="theme-btn">add to cart <i class="far fa-arrow-alt-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-6" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                    <div class="product-item-two">
                                        <div class="image">
                                            <img src="assets/images/dishes/dish10.png" alt="Dish">
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
                                            <h5><a href="product-details.html">Italian beef pizza</a></h5>
                                            <span class="price"><del>$50</del> $25</span>
                                        </div>
                                        <a href="shop.html" class="theme-btn">add to cart <i class="far fa-arrow-alt-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-6" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                                    <div class="product-item-two">
                                        <div class="image">
                                            <img src="assets/images/dishes/dish11.png" alt="Dish">
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
                                            <h5><a href="product-details.html">Italian beef pizza</a></h5>
                                            <span class="price"><del>$50</del> $25</span>
                                        </div>
                                        <a href="shop.html" class="theme-btn">add to cart <i class="far fa-arrow-alt-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-6" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                                    <div class="product-item-two">
                                        <div class="image">
                                            <img src="assets/images/dishes/dish12.png" alt="Dish">
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
                                            <h5><a href="product-details.html">top fried chicken</a></h5>
                                            <span class="price"><del>$50</del> $25</span>
                                        </div>
                                        <a href="shop.html" class="theme-btn">add to cart <i class="far fa-arrow-alt-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <ul class="pagination pt-30 flex-wrap" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <li class="page-item disabled">
                                    <span class="page-link"><i class="fal fa-arrow-left"></i></span>
                                </li>
                                <li class="page-item active">
                                    <span class="page-link">
                                        1
                                        <span class="sr-only">(current)</span>
                                    </span>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fal fa-arrow-right"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Shop Area End -->
          
           
        <!-- footer area start -->
        <footer class="main-footer bgc-black rel z-1" style="background-image: url(assets/images/background/footer-bg.png);">
            <div class="footer-top py-130 rpy-100">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-7 col-lg-9">
                            <div class="section-title text-white text-center mb-35" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="0">
                                <span class="sub-title mb-10">join our newsletter</span>
                                <h2>subscribe follow our newsletter to get more updates</h2>
                            </div>
                            <form class="newsletter-form" action="#" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                                <label for="news-email"><i class="fas fa-envelope"></i></label>
                                <input id="news-email" type="email" placeholder="Email Address" required>
                                <button class="theme-btn" type="submit">Subscribe <i class="far fa-arrow-alt-right"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget-area pb-70">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="0">
                            <div class="footer-widget footer-text">
                                <div class="footer-logo mb-25">
                                    <a href="index.html"><img src="assets/images/logos/logo.png" alt="Logo"></a>
                                </div>
                                <p>Temporibus autem quibusdam officiis aut rerum necessitatibus eveniet voluta repudiandae molestiae recusandae</p>
                                <div class="social-style-one mt-15">
                                    <a href="contact.html"><i class="fab fa-facebook-f"></i></a>
                                    <a href="contact.html"><i class="fab fa-twitter"></i></a>
                                    <a href="contact.html"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="contact.html"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-sm-6" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="0">
                            <div class="footer-widget footer-links">
                                <div class="footer-title">
                                    <h5>popular food</h5>
                                </div>
                                <ul class="two-column">
                                    <li><a href="product-details.html">Hamburger</a></li>
                                    <li><a href="product-details.html">French fries</a></li>
                                    <li><a href="product-details.html">Chicken pizza</a></li>
                                    <li><a href="product-details.html">Onion rings</a></li>
                                    <li><a href="product-details.html">Vegetable roll</a></li>
                                    <li><a href="product-details.html">Chicken nuggets</a></li>
                                    <li><a href="product-details.html">Sea fish</a></li>
                                    <li><a href="product-details.html">Tacos Pizza</a></li>
                                    <li><a href="product-details.html">Fried chicken</a></li>
                                    <li><a href="product-details.html">Hot Dogs</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-5">
                            <div class="row justify-content-between">
                                <div class="col-xl-6 col-lg-5 col-sm-6" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="0">
                                    <div class="footer-widget footer-contact">
                                        <div class="footer-title">
                                            <h5>contact us</h5>
                                        </div>
                                        <ul>
                                            <li>1403 Washington Ave, New Orlea ns, LA 70130, United States</li>
                                            <li><a href="mailto:wellfood@gmail.com"><u>wellfood@gmail.com</u></a></li>
                                            <li><a href="callto:+(1)0987654321">+(1) 098 765 4321</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-5 col-sm-6" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-offset="0">
                                    <div class="footer-widget opening-hour">
                                        <div class="footer-title">
                                            <h5>opening hour</h5>
                                        </div>
                                        <ul>
                                            <li>Monday – Friday: <span>8am – 4pm</span></li>
                                            <li>Saturday: <span>8am – 12am</span></li>
                                        </ul>
                                        <div class="any-question mt-20">
                                            <h5>Have any questions?</h5>
                                            <a href="#" class="theme-btn style-two">let’s talk us <i class="far fa-arrow-alt-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom pt-30 pb-15">
                <div class="container">
                    <div class="row">
                       <div class="col-lg-5">
                            <div class="copyright-text text-center text-lg-start">
                                <p>Copyright 2024 <a href="index.html">Wellfood</a>. All Rights Reserved </p>
                            </div>
                       </div>
                       <div class="col-lg-7 text-center text-lg-end">
                           <ul class="footer-bottom-nav">
                               <li><a href="#">Privacy Policy</a></li>
                               <li><a href="#">Terms & Condition</a></li>
                           </ul>
                       </div>
                    </div>
                    <!-- Scroll Top Button -->
                    <button class="scroll-top scroll-to-target" data-target="html"><i class="fas fa-arrow-alt-up"></i></button>
                </div>
            </div>
            <div class="footer-shapes">
                <div class="shape one">
                    <img src="assets/images/shapes/hero-shape5.png" alt="Shape">
                </div>
                <div class="shape two">
                    <img src="assets/images/shapes/tomato.png" alt="Shape">
                </div>
                <div class="shape three">
                    <img src="assets/images/shapes/pizza-two.png" alt="Shape">
                </div>
            </div>
        </footer>
        <!-- footer area end -->

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
    <!-- jQuery UI -->
    <script src="assets/js/jquery-ui.min.js"></script>
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