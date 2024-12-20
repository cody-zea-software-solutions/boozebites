<?php
session_start();
include "connection.php";
if (isset($_SESSION["user_boost"])) {
    $user = Database::Search("SELECT * FROM user WHERE `email`='" . $_SESSION["user_boost"]["email"] . "' ");
    $user_data = $user->fetch_assoc();
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Booze Bites - Profile</title>
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
        <!-- Nice Select -->
        <link rel="stylesheet" href="assets/css/nice-select.min.css">
        <!-- Animate -->
        <link rel="stylesheet" href="assets/css/aos.css">
        <!-- Slick -->
        <link rel="stylesheet" href="assets/css/slick.min.css">
        <!-- Main Style -->
        <link rel="stylesheet" href="assets/css/style.css">
        <style>
            .theme-btn.style-two {
                background-color: #ff4500;
                color: white;
            }

            .theme-btn.style-two:hover {
                background-color: #e03e00;
            }

            .p-25 {
                padding: 25px;
            }

            .shadow-lg {
                box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            }

            .lead {
                font-size: 1.2rem;
            }

            .hidden {
                display: none !important;
            }
        </style>
    </head>

    <body>
        <?php
        require "header.php";
        headerContent(0);
        ?>
        <div class="container-fluid vh-100 d-flex align-items-center">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-lg-4 bg-white shadow-lg rounded-3 p-25">
                    <div class="row d-flex justify-content-center">
                        <img src="./assets/images/profile-icon.png" class="img-fluid w-50 col-12" alt="Profile Icon" />
                        <div class="d-flex justify-content-center flex-column">
                            <p class="text-body lead text-center mt-10">Your Name:
                                <?php echo $user_data["first_name"] . " " . $user_data["last_name"] ?></p>
                            <div class="col-12 d-flex justify-content-center">
                                <a href="cart.php" class="theme-btn style-two col-10">Cart <i
                                        class="far fa-arrow-alt-right"></i></a>
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <a href="shop.php" class="theme-btn style-two col-10">Shop <i
                                        class="far fa-arrow-alt-right"></i></a>
                            </div>
                            <div class="col-12 d-flex justify-content-center mt-10">
                                <button class="theme-btn style-two col-10" onclick="toggleForms()">
                                    Personal Information <i class="far fa-arrow-alt-right"></i>
                                </button>
                            </div>
                            <div class="col-12 d-flex justify-content-center mt-10">
                                <button class="theme-btn style-two col-10" onclick="toggleForms()">
                                    My Orders <i class="far fa-arrow-alt-right"></i>
                                </button>
                            </div>
                            <p class="text-danger lead mt-10 text-center" onclick="logoutUser();">
                                <i class="fas fa-sign-out"></i> Log Out
                            </p>
                        </div>
                    </div>
                </div>

                <div id="personal-info" class="col-12 col-lg-8 d-flex justify-content-center mt-5 mt-lg-0">
                    <div class="header bg-white shadow-lg rounded-3 p-25 col-12">
                        <p class="h2 fw-semibold text-center">Personal Information</p>
                        <p class="lead text-center">Bite Into Booze</p>
                        <div>
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <p class="text-body">First Name</p>
                                    <input id="fname" value="<?php echo $user_data["first_name"] ?>"
                                        class="form-control mt-1" type="text" placeholder="Full Name" required />
                                </div>
                                <div class="col-12 col-lg-6">
                                    <p class="text-body">Last Name</p>
                                    <input id="lname" value="<?php echo $user_data["last_name"] ?>"
                                        class="form-control mt-1" type="text" placeholder="Full Name" required />
                                </div>
                                <div class="col-12 col-lg-6">
                                    <p class="text-body">Email</p>
                                    <input id="email" value="<?php echo $user_data["email"] ?>" class="form-control mt-1"
                                        type="email" placeholder="Email Address" required />
                                </div>
                                <div class="col-12 col-lg-6">
                                    <p class="text-body">Mobile Number</p>
                                    <input id="mobile" value="<?php echo $user_data["mobile"] ?>" class="form-control mt-1"
                                        type="text" placeholder="Mobile Number" required />
                                </div>
                                <div class="col-12 col-lg-6">
                                    <p class="text-body">City</p>
                                    <select class="" id="city">
                                        <?php
                                        $rs = Database::search("SELECT * FROM `city`");
                                        $n = $rs->num_rows;
                                        for ($x = 0; $x < $n; $x++) {
                                            $d = $rs->fetch_assoc();
                                            ?>
                                            <option value="<?php echo $d["city_id"]; ?>"> <?php echo $d["city_name"]; ?>
                                            </option>
                                            <?php

                                        }
                                        ?>
                                    </select>
                                </div>
                                <!-- <hr/> -->
                                <?php
                                $xm = Database::Search("SELECT * FROM `address` WHERE `user_email`='" . $user_data["email"] . "'");
                                $adress = $xm->fetch_assoc();
                                if (empty($adress)) {
                                    ?>
                                    <div class="col-12 col-lg-6">
                                        <p class="text-body">Address Line 1</p>
                                        <input id="a_line_1" class="form-control mt-1" type="text" placeholder="Address Line 01"
                                            required />
                                    </div>
                                    <div class="col-12 col-lg-12">
                                        <p class="text-body">Address Line 2</p>
                                        <input id="a_line_2" class="form-control mt-1" type="text" placeholder="Address Line 02"
                                            required />
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="col-12 col-lg-6">
                                        <p class="text-body">Address Line 1</p>
                                        <input id="a_line_1" value="<?php echo $adress["first_line"] ?>"
                                            class="form-control mt-1" type="text" placeholder="Address Line 01" required />
                                    </div>
                                    <div class="col-12 col-lg-12">
                                        <p class="text-body">Address Line 2</p>
                                        <input id="a_line_2" value="<?php echo $adress["second_line"] ?>"
                                            class="form-control mt-1" type="text" placeholder="Address Line 02" required />
                                    </div>
                                    <?php
                                }
                                ?>
                                <div class="col-12 d-flex justify-content-center">
                                    <div class="col-12 col-lg-10 mt-10">
                                        <button onclick="updateProfile();" class="theme-btn style-two col-12">Update Your
                                            Profile <i class="far fa-arrow-alt-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="my-orders" class="col-12 col-lg-8 d-flex justify-content-center mt-5 mt-lg-0 hidden">
                    <div class="header bg-white shadow-lg rounded-3 p-25 col-12">
                        <p class="h2 fw-semibold text-center">My Orders</p>
                        <div class="row">
                            <?php
                            $order = Database::Search("SELECT * FROM `order` WHERE `user_email`='" . $user_data["email"] . "' ");
                            $order_num = $order->num_rows;

                            for ($i = 0; $i < $order_num; $i++) {
                                $order_details = $order->fetch_assoc();
                                ?>
                                <div class="col-12 col-lg-4 shadow-sm rounded-3 p-4">
                                    <?php
                                    $order_item = Database::Search("SELECT * FROM `order_item` WHERE `order_id`='" . $order_details["id"] . "' ");
                                    $order_item_data = $order_item->fetch_assoc();
                                    $product = Database::Search("SELECT * FROM `product` WHERE `product_id`='" . $order_item_data["price_table_product_product_id"] . "' ");
                                    $product_data = $product->fetch_assoc();
                                    $product_img = Database::Search("SELECT * FROM `product_img` WHERE `product_id`='" . $order_item_data["price_table_product_product_id"] . "' ");
                                    $product_img_path = $product_img->fetch_assoc();
                                    $price_rs = Database::Search("SELECT `invoice_total` FROM `invoice` WHERE `order_id` = '" . $order_details["id"] . "'");
                                    $price_data = $price_rs->fetch_assoc();
                                    $price = number_format($price_data['invoice_total'],2);
                                    ?>
                                    <img src="assets/images/food.png"
                                        class="img-fluid w-100 col-12 rounded-5" alt="Product Image" />
                                    <p class="text-center secondary-color mt-3 h4">
                                        <?php echo htmlspecialchars($product_data['product_name'] ?? 'Unknown Product'); ?></p>
                                    <p class="lead text-black text-center h6">NZD <?php echo $price ?></p>
                                    <br />
                                    <?php
                                    $status = Database::Search("SELECT * FROM `order_status` WHERE `order_status_id`='" . $order_details["order_status_id"] . "' ");
                                    $status_data = $status->fetch_assoc();
                                    ?>
                                    <button
                                        class="btn btn-danger text-center bg-color rounded-0 col-12"><?php echo $status_data["order_status_name"]; ?></button>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        require "footer.php"
            ?>

        <script>
            function toggleForms() {
                const pi = document.getElementById('personal-info');
                const mo = document.getElementById('my-orders');
                // Toggle the visibility of the forms
                pi.classList.toggle("hidden");
                mo.classList.toggle("hidden");
            }
        </script>

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
        <!-- -->
        <script src="sahan.js"></script>
    </body>

    </html>
    <?php
} else {
    ?>
    <script>
        window.location.href = 'index.php';
    </script>
    <?php
}
?>