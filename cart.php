<?php
require "connection.php";
require "CartItem.php";
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
        <div class="preloader">
            <div class="custom-loader"></div>
        </div>

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
            <?php
            if (true) { //check if the user logged in
                $user_email = 'user@gmail.com';

                $cartTotal = 0.0;
                $shipFee = 6.0;
                $vat = 0.0;
                $subTotal = 0.0;
            ?>
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
                                <?php
                                $cart_rs = Database::Search("SELECT * FROM `cart_item` INNER JOIN `price_table` ON
                                cart_item.price_table_product_product_id=price_table.product_product_id AND cart_item.price_table_box_type_box_type_id=price_table.box_type_box_type_id INNER JOIN `product` ON
                                price_table.product_product_id=product.product_id INNER JOIN `box_type` ON
                                cart_item.price_table_box_type_box_type_id=box_type.box_type_id INNER JOIN `preference` ON 
                                cart_item.preference_preference_id=preference.preference_id WHERE `user_email`='$user_email'");
                                if ($cart_rs->num_rows > 0) {
                                    for ($x = 0; $x < $cart_rs->num_rows; $x++) {
                                        $cart_d = $cart_rs->fetch_assoc();
                                        $cartTotal += $cart_d["price"] * $cart_d["cart_qty"];
                                ?>
                                        <tr id="cartRow<?php echo $x; ?>">
                                            <td>
                                                <?php
                                                $img_rs = Database::Search("SELECT * FROM `product_img` WHERE `product_id`='" . $cart_d["product_id"] . "'");
                                                if ($img_rs->num_rows > 0) {
                                                    $img_d = $img_rs->fetch_assoc();
                                                ?>
                                                    <img src="<?php echo $img_d["product_img_path"]; ?>" alt="Product Details">
                                                <?php
                                                } else {
                                                ?>
                                                    <img src="assets/images/widgets/news1.jpg" alt="Product">
                                                <?php
                                                }
                                                ?>
                                            </td>
                                            <td><span class="title"><?php echo $cart_d["product_name"]; ?> <?php echo $cart_d["box_type_name"]; ?> (<?php echo $cart_d["preference_name"]; ?>)</span></td>
                                            <td><span class="price"><?php echo $cart_d["price"]; ?></span></td>
                                            <td>
                                                <div class="quantity-input">
                                                    <button class="quantity-down">--</button>
                                                    <input class="quantity" type="text" value="<?php echo $cart_d["cart_qty"]; ?>" name="quantity">
                                                    <button class="quantity-up">+</button>
                                                </div>
                                            </td>
                                            <td><b class="price"><?php echo $cart_d["price"] * $cart_d["cart_qty"]; ?></b></td>
                                            <td><button type="button" class="close" onclick="removeItem('<?php echo $cart_d['product_id']; ?>', '<?php echo $cart_d['box_type_id']; ?>', '<?php echo $cart_d['preference_id']; ?>', '<?php echo $x; ?>');">×</button></td>
                                        </tr>
                                <?php
                                    }

                                    $subTotal = $cartTotal + $vat + $shipFee;
                                } else {
                                    echo "no items in the cart";
                                }
                                ?>
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
                                <a class="theme-btn bg-secondary my-5" onclick="clearCart();">Clear cart <i class="fas fa-angle-double-right"></i></a>
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
                                            <td><span class="price"><?php echo $cartTotal;?></span></td>
                                        </tr>
                                        <tr>
                                            <td>Shipping Fee</td>
                                            <td><span class="price"><?php echo $shipFee;?></span></td>
                                        </tr>
                                        <tr>
                                            <td>Vat</td>
                                            <td><span class="price"><?php echo $vat;?></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Order Total</strong></td>
                                            <td><b class="price"><?php echo $subTotal;?></b></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php
                                $address_rs = Database ::search("SELECT * FROM `address` INNER JOIN `city` ON
                                address.city_id=city.city_id INNER JOIN `user` ON
                                address.user_email=user.email WHERE `user_email`='$user_email'");
                                if($address_rs->num_rows>0){
                                    $address_d = $address_rs->fetch_assoc();
                                    $userName = $address_d["first_name"]." ".$address_d["last_name"];
                                    $mobile = $address_d["mobile"];
                                    $address = $address_d["first_line"].", ".$address_d["second_line"].", ".$address_d["city_name"];

                                    echo $userName."</br>";
                                    echo $mobile."</br>";
                                    echo $address;
                                    ?>
                                    <a href="checkout.php" class="theme-btn style-two mt-25 w-100">Proceed to checkout</a>
                                    <?php
                                }else{
                                    ?>
                                    <div class="text-center my-100">
                                        <div class="theme-btn">You need to have your address set in your profile</div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
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
    <script src="harry.js" defer></script>

</body>

</html>