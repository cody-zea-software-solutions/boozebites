<!DOCTYPE html>
<html lang="zxx">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="description" content="" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Title -->
  <title>WellFood - Resturent HTML Template</title>
  <!-- Favicon Icon -->
  <link rel="shortcut icon" href="assets/images/logos/favicon.png" type="image/x-icon" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto:wght@400;500;700&display=swap"
    rel="stylesheet" />

  <!-- Flaticon -->
  <link rel="stylesheet" href="assets/css/flaticon.min.css" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/css/fontawesome-5.14.0.min.css" />
  <!-- Bootstrap -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <!-- Magnific Popup -->
  <link rel="stylesheet" href="assets/css/magnific-popup.min.css" />
  <!-- jQuery UI -->
  <link rel="stylesheet" href="assets/css/jquery-ui.min.css" />
  <!-- Nice Select -->
  <link rel="stylesheet" href="assets/css/nice-select.min.css" />
  <!-- Animate -->
  <link rel="stylesheet" href="assets/css/aos.css" />
  <!-- Slick -->
  <link rel="stylesheet" href="assets/css/slick.min.css" />
  <!-- Main Style -->
  <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
  <div class="page-wrapper">
    <!-- Preloader -->
    <div class="preloader">
      <div class="custom-loader"></div>
    </div>

    <?php
    require "header.php";
    headerContent(1);
    ?>

    <!--Form Back Drop-->
    <div class="form-back-drop"></div>

    <!-- Page Banner Start -->
    <!-- <section class="page-banner-area overlay pt-215 rpt-150 pb-160 rpb-120 rel z-1 bgs-cover text-center" style="background-image: url(assets/images/background/banner.jpg);">
            <div class="container">
                <div class="banner-inner text-white">
                    <h1 class="page-title" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">single product</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">single product</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section> -->
    <!-- Page Banner End -->

    <!-- Product Details Start -->
    <section class="product-details pb-10 pt-130 rpt-100">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="product-details-image rmb-55" data-aos="fade-left" data-aos-duration="1500"
              data-aos-offset="50">
              <img src="assets/images/products/product-details.jpg" alt="Product Details" />
            </div>
          </div>
          <div class="col-lg-6">
            <div class="product-details-content" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
              <div class="section-title">
                <h2>Italian beef pizza</h2>
              </div>

              <!-- SPICY LEVEL -->
              <h5 style="padding-top: 20px">Spicy Level</h5>
              <div class="row" style="
                    padding-top: 4px;
                    padding-bottom: 24px;
                    padding-left: 18px;
                  ">
                <!-- Dynamically render spicy levels -->
                <div class="px-4 py-2 rounded-pill border text-danger fw-bold"
                  style="width: fit-content; cursor: pointer">
                  Mild
                </div>
                <div class="px-4 py-2 rounded-pill border text-gray" style="width: fit-content; cursor: pointer">
                  Medium
                </div>
                <div class="px-4 py-2 rounded-pill border text-gray" style="width: fit-content; cursor: pointer">
                  Spicy
                </div>
              </div>

              <!-- SIZE AVAILABLE -->
              <h5 style="padding-top: 20px">Sizes available 🍽️</h5>
              <div class="row" style="
                    padding-top: 4px;
                    padding-bottom: 24px;
                    padding-left: 18px;
                  ">
                <!-- Dynamically render sizes -->
                <div class="px-4 py-2 rounded-pill border text-danger fw-bold"
                  style="width: fit-content; cursor: pointer">
                  Small
                </div>
                <div class="px-4 py-2 rounded-pill border text-gray" style="width: fit-content; cursor: pointer">
                  Medium
                </div>
                <div class="px-4 py-2 rounded-pill border text-gray" style="width: fit-content; cursor: pointer">
                  Large
                </div>
              </div>

              <form action="#" class="add-to-cart py-25">
                <h5>Quantity</h5>
                <input type="number" value="2" min="1" max="20"
                  onchange="if(parseInt(this.value,10)<10)this.value='0'+this.value;" required />
                <button type="submit" class="theme-btn mb-15">
                  Add to Cart <i class="far fa-arrow-alt-right"></i>
                </button>
              </form>
              <ul class="category-tags pt-20 pb-30">
                <li>
                  <h6>Categories</h6>
                  :
                  <a href="#">Restaurant</a>
                </li>
                <li>
                  <h6>Tags</h6>
                  :
                  <a href="#">Pizza</a>
                  <a href="#">Burger</a>
                  <a href="#">Soup</a>
                </li>
              </ul>
              <div class="social-style-one">
                <h5>Share</h5>
                <a href="contact.html"><i class="fab fa-twitter"></i></a>
                <a href="contact.html"><i class="fab fa-facebook-f"></i></a>
                <a href="contact.html"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-pinterest-p"></i></a>
              </div>
            </div>
          </div>
        </div>
        <ul class="nav nav tab-style-one mt-125 rmt-95 mb-40" data-aos="fade-up" data-aos-duration="1500"
          data-aos-offset="50">
          <li>
            <a href="#details" data-bs-toggle="tab" class="active show">Descrptions</a>
          </li>
          <li>
            <a href="#information" data-bs-toggle="tab">Additional Information's</a>
          </li>
          <li><a href="#reviews" data-bs-toggle="tab">Reviews(3)</a></li>
        </ul>
        <div class="tab-content pb-60" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500"
          data-aos-offset="50">
          <div class="tab-pane fade active show" id="details">
            <p>
              Sorem ipsum dolor sit amet, consectetur adipiscing elit. Tortor
              nulla id sit neque scelerisque pulvinar. Mus amet interdum
              turpis consequat adipiscing. Elementum feugiat sed duis
              consectetur varius et cras mattis. Lobortis auctor sit in eu
              nisl fusce augue venenatis, dui. Phasellus eget sagittis mauris,
              nibh augue cursus pellentesque amet elementum. Tristique amet
              sollicitudin sit nulla aliquam, imperdiet sed ut diam.
              Suspendisse ipsum rhoncus nulla lectus. Id neque in urna neque
              non amet. Tortor sed aliquam in faucibus enim, posuere. Sed et
              accumsan, neque posuere tempus in cras. Ornare lectus pretium,
              est eget purus, enim quam purus netus. Turpis nunc
            </p>
            <p>
              Dictum ultrices et suspendisse amet mattis in pellentesque.
              Vulputate arcu, consectetur odio donec nec duis ultrices
              facilisi. Mauris cursus elit diam, urna suspendisse et, amet.
              Vitae ligula ultrices nulla justo, enim lorem duis. Volutpat sit
              et neque, aliquam, diam at at neque. Lacus augue
            </p>
          </div>
          <div class="tab-pane fade" id="information">
            <p>
              Circumstances occur in which toil and pain can procure him some
              great pleasure. To take a trivial example, which of us ever
              undertakes laborious physical exercise, except to obtain some
              advantage from it? But who has any right to find fault with a
              man who chooses
            </p>
            <ul class="list-style-one mt-20 mb-15">
              <li>Fresh Chicken Burger</li>
              <li>Pizza With Mushrooms</li>
              <li>Double Burger & Fries</li>
            </ul>
            <p>
              Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
              consectetur, adipisci velit sed quia non numquam eius modi
              tempora incidunt ut labore et dolore magnam aliquam quaerat
              voluptatem.
            </p>
          </div>
          <div class="tab-pane fade" id="reviews">
            <h5>Reviews (3)</h5>
            <div class="comments rattings mt-25">
              <div class="comment-body">
                <div class="author-thumb">
                  <img src="assets/images/products/product-comment1.jpg" alt="Author" />
                </div>
                <div class="content">
                  <div class="ratting">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  <ul class="comment-header">
                    <li>
                      <h6>Daniel A. Hayes</h6>
                    </li>
                    <li>15 Jan 2024</li>
                  </ul>
                  <p>
                    SaaS, or Software as a Service, is a cloud-based software
                    delivery model where applications are hosted by a
                    third-party provider and accessed via the internet. It
                    offers benefits such as scalability, cost-effectiveness
                  </p>
                </div>
              </div>
              <div class="comment-body">
                <div class="author-thumb">
                  <img src="assets/images/products/product-comment2.jpg" alt="Author" />
                </div>
                <div class="content">
                  <div class="ratting">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  <ul class="comment-header">
                    <li>
                      <h6>Daniel A. Hayes</h6>
                    </li>
                    <li>15 Jan 2024</li>
                  </ul>
                  <p>
                    SaaS, or Software as a Service, is a cloud-based software
                    delivery model where applications are hosted by a
                    third-party provider and accessed via the internet. It
                    offers benefits such as scalability, cost-effectiveness
                  </p>
                </div>
              </div>
              <div class="comment-body">
                <div class="author-thumb">
                  <img src="assets/images/products/product-comment3.jpg" alt="Author" />
                </div>
                <div class="content">
                  <div class="ratting">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  <ul class="comment-header">
                    <li>
                      <h6>Daniel A. Hayes</h6>
                    </li>
                    <li>15 Jan 2024</li>
                  </ul>
                  <p>
                    SaaS, or Software as a Service, is a cloud-based software
                    delivery model where applications are hosted by a
                    third-party provider and accessed via the internet. It
                    offers benefits such as scalability, cost-effectiveness
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Product Details End -->

    <!-- Review Form Start -->
    <section class="review-form-area">
      <div class="container">
        <form id="review-form" class="review-form z-1 rel" name="review-form" action="#" method="post"
          data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
          <h5>Add a review</h5>
          <p>3 reviews for Blue Stripes & Stone Earrings</p>
          <div class="row mt-25">
            <div class="col-lg-4">
              <div class="form-group">
                <input type="text" id="full-name" name="full-name" class="form-control" value="" placeholder="Full Name"
                  required="" />
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <input type="email" id="email-address" name="email" class="form-control" value=""
                  placeholder="Email Address" required="" />
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <input type="text" id="phone" name="phone" class="form-control" value="" placeholder="Phone Number"
                  required="" />
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <textarea name="message" id="message" class="form-control" rows="4" placeholder="Write Message"
                  required=""></textarea>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group mb-0">
                <div class="ratting d-flex mb-25">
                  <b>Add Reviews</b>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
                <button type="submit" class="theme-btn">
                  Send Reviews <i class="fas fa-angle-double-right"></i>
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>
    <!-- Review Form End -->

    <!-- Related Products Area start -->
    <section class="related-products-area pt-130 rpt-100 pb-100 rpb-70 rel z-1">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12">
            <div class="section-title text-center mb-50" data-aos="fade-up" data-aos-duration="1500"
              data-aos-offset="50">
              <h2>Related Product</h2>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
            <div class="product-item-two">
              <div class="image">
                <img src="assets/images/dishes/dish1.png" alt="Dish" />
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
                <h5>
                  <a href="product-details.html">fresh chicken burger</a>
                </h5>
                <span class="price"><del>$50</del> $25</span>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500"
            data-aos-offset="50">
            <div class="product-item-two">
              <div class="image">
                <img src="assets/images/dishes/dish2.png" alt="Dish" />
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
                <h5>
                  <a href="product-details.html">pizza with mushrooms</a>
                </h5>
                <span class="price"><del>$50</del> $25</span>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500"
            data-aos-offset="50">
            <div class="product-item-two">
              <div class="image">
                <img src="assets/images/dishes/dish3.png" alt="Dish" />
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
                <h5>
                  <a href="product-details.html">double burger & fries</a>
                </h5>
                <span class="price"><del>$50</del> $25</span>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500"
            data-aos-offset="50">
            <div class="product-item-two">
              <div class="image">
                <img src="assets/images/dishes/dish4.png" alt="Dish" />
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
                <h5>
                  <a href="product-details.html">fried chicken french</a>
                </h5>
                <span class="price"><del>$50</del> $25</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Related Products Area end -->

    <!-- footer area start -->
    <footer class="main-footer bgc-black rel z-1" style="background-image: url(assets/images/background/footer-bg.png)">
      <div class="footer-top py-130 rpy-100">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-9">
              <div class="section-title text-white text-center mb-35" data-aos="fade-up" data-aos-duration="1500"
                data-aos-offset="0">
                <span class="sub-title mb-10">join our newsletter</span>
                <h2>subscribe follow our newsletter to get more updates</h2>
              </div>
              <form class="newsletter-form" action="#" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500"
                data-aos-offset="50">
                <label for="news-email"><i class="fas fa-envelope"></i></label>
                <input id="news-email" type="email" placeholder="Email Address" required />
                <button class="theme-btn" type="submit">
                  Subscribe <i class="far fa-arrow-alt-right"></i>
                </button>
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
                  <a href="index.html"><img src="assets/images/logos/logo.png" alt="Logo" /></a>
                </div>
                <p>
                  Temporibus autem quibusdam officiis aut rerum necessitatibus
                  eveniet voluta repudiandae molestiae recusandae
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
                <div class="col-xl-6 col-lg-5 col-sm-6" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500"
                  data-aos-offset="0">
                  <div class="footer-widget footer-contact">
                    <div class="footer-title">
                      <h5>contact us</h5>
                    </div>
                    <ul>
                      <li>
                        1403 Washington Ave, New Orlea ns, LA 70130, United
                        States
                      </li>
                      <li>
                        <a href="mailto:wellfood@gmail.com"><u>wellfood@gmail.com</u></a>
                      </li>
                      <li>
                        <a href="callto:+(1)0987654321">+(1) 098 765 4321</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-xl-6 col-lg-5 col-sm-6" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500"
                  data-aos-offset="0">
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
                <p>
                  Copyright 2024 <a href="index.html">Wellfood</a>. All Rights
                  Reserved
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
          <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-arrow-alt-up"></i>
          </button>
        </div>
      </div>
      <div class="footer-shapes">
        <div class="shape one">
          <img src="assets/images/shapes/hero-shape5.png" alt="Shape" />
        </div>
        <div class="shape two">
          <img src="assets/images/shapes/tomato.png" alt="Shape" />
        </div>
        <div class="shape three">
          <img src="assets/images/shapes/pizza-two.png" alt="Shape" />
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