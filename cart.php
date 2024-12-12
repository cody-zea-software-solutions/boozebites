<?php
require "connection.php";
require "CartItem.php";
session_start();
$user_email = $_SESSION["user_boost"]["email"];
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
    <title>Cart</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="assets/images/logos/favicon.png" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">

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
    <script src="https://js.stripe.com/v3/"></script>

</head>

<body onload="loadCart();">
    <div class="page-wrapper">

        <!-- Preloader -->
        <div class="preloader">
            <div class="custom-loader"></div>
        </div>

        <?php
        require_once("header.php");
        headerContent(1);
        ?>

        <!--Form Back Drop-->
        <div class="form-back-drop"></div>




        <!-- Page Banner Start -->
        <section class="page-banner-area overlay pt-215 rpt-150 pb-160 rpb-120 rel z-1 bgs-cover text-center"
            style="background-image: url(assets/images/background/banner.jpg);">
            <div class="container">
                <div class="banner-inner text-white">
                    <h1 class="page-title" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">Shopping
                        Cart</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center" data-aos="fade-up" data-aos-delay="200"
                            data-aos-duration="1500" data-aos-offset="50">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Shopping Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <!-- Page Banner End -->


        <!-- Shopping Cart Area start -->
        <?php
        $cart_rs = Database::Search("SELECT * FROM `cart_item` INNER JOIN `price_table` ON
               cart_item.price_table_product_product_id=price_table.product_product_id AND cart_item.price_table_box_type_box_type_id=price_table.box_type_box_type_id INNER JOIN `product` ON
               price_table.product_product_id=product.product_id INNER JOIN `box_type` ON
               cart_item.price_table_box_type_box_type_id=box_type.box_type_id INNER JOIN `preference` ON 
               cart_item.preference_preference_id=preference.preference_id WHERE `user_email`='$user_email'");
        $cart_num = $cart_rs->num_rows;
        if ($cart_num > 0) {
            ?>
            <section class="shopping-cart-area py-130 rel z-1" id="cartBody">
            </section>
            <?php
        } else {
            ?>
            <div class="container-fluid bg-white p-5">
                <div class="row d-flex flex-row justify-content-center align-items-center h-100 px-3">
                    <div class="col-md-6 pb-5">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="assets/images/signup.svg" class="img-fluid" />
                            </div>
                            <div class="col-md-6 d-flex flex-row justify-content-center align-items-center">
                                <div class="row">
                                    <div class="col-12 mb-3 text-center text-md-start">
                                        <p class="h2">Welcome To Booze Bites</p>
                                        <p class="secondary-color h5">Please signup first.</p>
                                    </div>
                                    <div class="col-12 text-center text-md-start">
                                        <a href="login.php" class="theme-btn style-two" type="submit">Sign Up <i
                                                class="far fa-arrow-alt-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
        }

        ?>

        <!-- Shopping Cart Area start -->


        <?php
        require "footer.php"
            ?>

    </div>
    <!--End pagewrapper-->

    <script src="script.js"></script>
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
    <script src="harry.js" defer></script>

</body>

</html>