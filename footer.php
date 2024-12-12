<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css">

<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-thin.css">

<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-solid.css">

<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-regular.css">

<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-light.css">
<footer class="main-footer bgc-black rel z-1" style="background-image: url(assets/images/background/footer-bg.png);">
    <div class="footer-top py-130 rpy-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9">
                    <div class="section-title text-white text-center mb-35" data-aos="fade-up" data-aos-duration="1500"
                        data-aos-offset="0">
                        <span class="sub-title mb-10">Stay Connected with Us!</span>
                        <h2>Contact us on WhatsApp for quick updates and support</h2>
                    </div>
                    <form class="newsletter-form"  data-aos="fade-up" data-aos-delay="50"
                        data-aos-duration="1500" data-aos-offset="50">
                        <label for="news-email1"><i class="fa-thin fa-messages"></i></label>
                        <input id="news-email1" type="text" placeholder="Enter Your Message" required>

                        <a href="" id="link2" class="theme-btn" onclick="sendSingle();">Send <i class="far fa-arrow-alt-right"></i></a>
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
                            <a href="index.php"><img src="assets/images/logos/logo.png" alt="Logo"></a>
                        </div>
                        <p>Booze Bites delivers bold, Sri Lankan-inspired bites that pair perfectly with your drinks.
                        </p>
                        <div class="social-style-one mt-15">
                            <a href="contact.html"><i class="fab fa-facebook-f"></i></a>
                            <a href="contact.html"><i class="fab fa-twitter"></i></a>
                            <a href="contact.html"><i class="fab fa-linkedin-in"></i></a>
                            <a href="contact.html"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-sm-6" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500"
                    data-aos-offset="0">
                    <div class="footer-widget footer-links">
                        <div class="footer-title">
                            <h5>popular food</h5>
                        </div>
                        <ul class="two-column">
                            <?php
                            // $cart_rs = Database::Search("SELECT * FROM `cart_item` INNER JOIN `price_table` ON
                            // cart_item.price_table_product_product_id=price_table.product_product_id AND cart_item.price_table_box_type_box_type_id=price_table.box_type_box_type_id INNER JOIN `product` ON
                            // price_table.product_product_id=product.product_id INNER JOIN `box_type` ON
                            // cart_item.price_table_box_type_box_type_id=box_type.box_type_id INNER JOIN `preference` ON 
                            // cart_item.preference_preference_id=preference.preference_id WHERE `user_email`='$user_email'");
                            // if ($cart_rs->num_rows > 0) {
                            //     for ($x = 0; $x < $cart_rs->num_rows; $x++) {
                            //         $cart_d = $cart_rs->fetch_assoc();
                            
                            $pro_footer_rs = Database::search("SELECT * FROM `product` WHERE `on_delete` = 0");
                            $pro_footer_num = $pro_footer_rs->num_rows;
                            $pro_footer_num = $pro_footer_num >= 5 ? 5 : $pro_footer_num;
                            for ($i = 0; $i < $pro_footer_num; $i++) {
                                $pro_footer_data = $pro_footer_rs->fetch_assoc(); 
                                ?>
                                 <li><a href="product-details.php"><?php echo $pro_footer_data["product_name"] ?></a></li>
                                <?php 
                            }
                            ?>
                           
                    
                        </ul>
                    </div>
                </div>
                <div class="col-xl-5">
                    <div class="row justify-content-between">
                        <div class="col-xl-6 col-lg-5 col-sm-6" data-aos="fade-up" data-aos-delay="100"
                            data-aos-duration="1500" data-aos-offset="0">
                            <div class="footer-widget footer-contact">
                                <div class="footer-title">
                                    <h5>contact us</h5>
                                </div>
                                <ul>
                                    <li>89B Cascades Road, Pakuranga, New Zealand</li>
                                    <li><a href="mailto:wellfood@gmail.com"><u>sugithnz91@gmail.com</u></a></li>
                                    <li><a href="callto:+(1)0987654321">+(64) 27 314 4080</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-5 col-sm-6" data-aos="fade-up" data-aos-delay="150"
                            data-aos-duration="1500" data-aos-offset="0">
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
                                    <a href="contact.php" class="theme-btn style-two">let’s talk us <i
                                            class="far fa-arrow-alt-right"></i></a>
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
                        <p>2024 Designed & Developed by <span class="primary-color">CODY ZEA SOFTWARE SOLUTIONS</span>
                        </p>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</footer>