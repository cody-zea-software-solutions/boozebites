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
                    <h1 class="page-title" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">Shopping Cart</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Shopping Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <!-- Page Banner End -->
        
        
        <!-- Shopping Cart Area start -->
        <section class="shopping-cart-area py-130 rel z-1">
            <div class="container">
                <div class="shoping-table mb-50 wow fadeInUp delay-0-2s">
                    <table>
                        <thead>
                            <tr>
                                <th>Images</th>
                                <th>Product</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="assets/images/widgets/news1.jpg" alt="Product"></td>
                                <td><span class="title">Shopping Cart</span></td>
                                <td><span class="price">70</span></td>
                                <td>
                                    <div class="quantity-input">
                                        <button class="quantity-down">--</button>
                                        <input class="quantity" type="text" value="1" name="quantity">
                                        <button class="quantity-up">+</button>
                                    </div>
                                </td>
                                <td><b class="price">70</b></td>
                                <td><button type="button" class="close">×</button></td>
                            </tr>
                            <tr>
                                <td><img src="assets/images/widgets/news2.jpg" alt="Product"></td>
                                <td><span class="title">Chicken Soup</span></td>
                                <td><span class="price">65</span></td>
                                <td>
                                    <div class="quantity-input">
                                        <button class="quantity-down">--</button>
                                        <input class="quantity" type="text" value="2" name="quantity">
                                        <button class="quantity-up">+</button>
                                    </div>
                                </td>
                                <td><b class="price">130</b></td>
                                <td><button type="button" class="close">×</button></td>
                            </tr>
                            <tr>
                                <td><img src="assets/images/widgets/news3.jpg" alt="Product"></td>
                                <td><span class="title">Red king Crab</span></td>
                                <td><span class="price">80</span></td>
                                <td>
                                    <div class="quantity-input">
                                        <button class="quantity-down">--</button>
                                        <input class="quantity" type="text" value="3" name="quantity">
                                        <button class="quantity-up">+</button>
                                    </div>
                                </td>
                                <td><b class="price">80</b></td>
                                <td><button type="button" class="close">×</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row text-center text-lg-left align-items-center">
                    <div class="col-lg-6">
                        <div class="discount-wrapper mb-30 wow fadeInLeft delay-0-2s">
                            <form action="#" class="d-sm-flex justify-content-center justify-content-lg-start">
                                <input type="text" placeholder="Coupon Code" required>
                                <button class="theme-btn flex-none" type="submit">apply Coupon <i class="fas fa-angle-double-right"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="update-shopping mb-30 text-lg-end wow fadeInRight delay-0-2s">
                            <a href="shop.html" class="theme-btn style-two my-5">shopping <i class="fas fa-angle-double-right"></i></a>
                            <a href="shop.html" class="theme-btn my-5">update cart <i class="fas fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="shoping-cart-total pt-20 wow fadeInUp delay-0-2s">
                            <h4 class="form-title mb-25 text-center">Cart Totals</h4>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Cart Subtotal</td>
                                        <td><span class="price">280</span></td>
                                    </tr>
                                    <tr>
                                        <td>Shipping Fee</td>
                                        <td><span class="price">10.00</span></td>
                                    </tr>
                                    <tr>
                                        <td>Vat</td>
                                        <td>$0.00</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Order Total</strong></td>
                                        <td><b class="price">290</b></td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="checkout.html" class="theme-btn style-two mt-25 w-100">Proceed to checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Shopping Cart Area start -->
          
           
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