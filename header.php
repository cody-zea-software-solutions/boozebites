<?php
function headerContent($theme)
{
    // Determine the theme class
    $themeClass = $theme == 1 ? "white-menu" : "dark-menu";
    if (isset($_SESSION["user_boost"])) {
        $cart_rs = Database::Search("SELECT SUM(`cart_qty`) AS num_cart FROM `cart_item` WHERE `user_email` = '" . $_SESSION["user_boost"]["email"] . "'");
        $cart_data = $cart_rs->fetch_assoc(); 
    }


    // Output the header content
    echo '
    <!-- main header -->
    <header class="main-header ' . htmlspecialchars($themeClass) . ' menu-absolute">
        <!--Header-Upper-->
        <div class="header-upper">
            <div class="container-fluid clearfix">
                <div class="header-inner rel d-flex align-items-center">
                    <div class="logo-outer">
                        <div class="logo">
                            <a href="index.php"><img src="assets/images/logos/logo-white.png" alt="Logo" title="Logo"></a>
                        </div>
                    </div>

                    <div class="nav-outer ms-lg-5 ps-xxl-4 clearfix">
                        <!-- Main Menu -->
                        <nav class="main-menu navbar-expand-lg">
                            <div class="navbar-header py-10">
                                <div class="mobile-logo">
                                    <a href="index.php">
                                        <img src="assets/images/logos/logo.png" alt="Logo" title="Logo">
                                    </a>
                                </div>

                                <!-- Toggle Button -->
                                <button type="button" class="navbar-toggle" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <div class="navbar-collapse collapse clearfix">
                                <ul class="navigation clearfix">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="about.php">About Us</a></li>
                                    <li><a href="shop.php">Shop</a></li>
                                    <li><a href="contact.php">Contact</a></li>
                                </ul>
                            </div>
                        </nav>
                        <!-- Main Menu End-->
                    </div>
                    
                    <div class="header-number">
                        <i class="far fa-phone"></i> Call : <a href="callto:+(64)273144080">+(64) 27 314 4080</a>
                    </div>
                    
                    <!-- Nav Search -->
                   
                    
                    <!-- Menu Button -->
                    <div class="menu-btns">
                        <button onclick="gotoCart();"><i class="far fa-shopping-cart"></i><span>' . (isset($_SESSION["user_boost"]) ? $cart_data["num_cart"] : "0" ) .'</span></button>
                        <a href="contact.php" class="theme-btn">Order now <i class="far fa-arrow-alt-right"></i></a>
                                <!-- User Profile / Login -->
                        ' . (isset($_SESSION["user_boost"]) ? '
                        <button onclick="window.location=\'profile.php\'"><i class="fa-thin fa-circle-user h3 text-white"></i></button>
                        ' : '
                        <button onclick="window.location=\'login.php\'"><i class="fa-thin fa-circle-user h3 text-white"></i></button>
                        ') . '
                
                    </div>
                </div>
            </div>
            <div class="bg-lines">
                <span></span><span></span>
                <span></span><span></span>
            </div>
        </div>
        <!--End Header Upper-->
    </header>';
}
?>