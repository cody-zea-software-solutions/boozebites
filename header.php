<?php
function headerContent($theme)
{
    if ($theme == 1) {
        $theme = "white-menu";
    } else {
        $theme = "dark-menu";
    }
    echo
        '
 
  <!-- main header -->
    <header class="main-header ' . htmlspecialchars($theme) . ' menu-absolute">
            <!--Header-Upper-->
            <div class="header-upper">
                <div class="container-fluid clearfix">

                    <div class="header-inner rel d-flex align-items-center">
                        <div class="logo-outer">
                            <div class="logo"><a href="index.php"><img src="assets/images/logos/logo-white.png" alt="Logo" title="Logo"></a></div>
                        </div>

                        <div class="nav-outer ms-lg-5 ps-xxl-4 clearfix">
                            <!-- Main Menu -->
                            <nav class="main-menu navbar-expand-lg">
                                <div class="navbar-header py-10">
                                   <div class="mobile-logo">
                                       <a href="index.html">
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
                                        <li><a href="index.php">Home</a>
                                            <!-- <ul>
                                                <li><a href="index.html">Home Restauran</a></li>
                                                <li><a href="index2.html">Home Pizza</a></li>
                                                <li><a href="index3.html">Home Burger</a></li>
                                                <li><a href="index4.html">Home Chiken</a></li>
                                                <li><a href="index5.html">Juice & Drinks</a></li>
                                                <li><a href="index6.html">Home Grill</a></li>
                                            </ul> -->
                                        </li>
                                        <!-- <li class="dropdown"><a href="#">Menu</a>
                                            <ul>
                                                <li><a href="menu-restaurant.html">Menu Restaurant</a></li>
                                                <li><a href="menu-pizza.html">Menu Pizza</a></li>
                                                <li><a href="menu-grill.html">Menu Gril</a></li>
                                                <li><a href="menu-burger.html">Menu Burger</a></li>
                                                <li><a href="menu-sea-food.html">Menu Sea Food</a></li>
                                                <li><a href="menu-chicken.html">Menu Chicken</a></li>
                                            </ul>
                                        </li> -->
                                        <li><a href="about.php">About Us</a>
                                            <!-- <ul>
                                                <li><a href="about.html">About Us</a></li>
                                                <li><a href="history.html">Our History</a></li>
                                                <li><a href="faq.html">faqs</a></li>
                                                <li class="dropdown"><a href="#">chefs</a>
                                                    <ul>
                                                        <li><a href="chefs.html">Our chefs</a></li>
                                                        <li><a href="chef-details.html">chef Details</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="gallery.html">Gallery</a></li>
                                            </ul> -->
                                        </li>
                                        <!-- <li class="dropdown"><a href="#">blog</a>
                                            <ul>
                                                <li><a href="blog.html">blog standard</a></li>
                                                <li><a href="blog-details.html">blog details</a></li>
                                            </ul>
                                        </li> -->
                                        <li><a href="shop.php">shop</a>
                                            <!-- <ul>
                                                <li><a href="shop.html">Products</a></li>
                                                <li><a href="product-details.html">Product Details</a></li>
                                                <li><a href="cart.html">Shopping Cart</a></li>
                                                <li><a href="checkout.html">Checkout Page</a></li>
                                            </ul> -->
                                        </li>
                                        <li><a href="contact.php">Contact</a></li>
                                    </ul>
                                </div>

                            </nav>
                            <!-- Main Menu End-->
                        </div>
                        
                        <div class="header-number">
                            <i class="far fa-phone"></i>Call : <a href="callto:+(64)273144080">+(64) 27 314 4080</a>
                        </div>
                        
                        <!-- Nav Search -->
                        <div class="nav-search py-10">
                            <button class="far fa-search"></button>
                            <form action="shop.php" class="hide">
                                <input type="text" placeholder="Search" class="searchbox" required="">
                                <button type="submit" class="searchbutton far fa-search"></button>
                            </form>
                        </div>
                        
                        <!-- Menu Button -->
                        <div class="menu-btns">
                        
                        <button><i class="far fa-shopping-cart" onclick="gotoCart();"></i> <span>+</span></button>
                            <a href="contact.html" class="theme-btn">Book now <i class="far fa-arrow-alt-right"></i></a>
                            <!-- menu sidbar -->
                         
                        </div>
                           <button>
             
                    <i className="fas fa-user"></i>
              
                </button>
                    </div>
                </div>
                <div class="bg-lines">
                   <span></span><span></span>
                   <span></span><span></span>
                </div>
            </div>
            <!--End Header Upper-->
        </header>
';


}
?>