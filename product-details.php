<?php
require "connection.php";
session_start();
if (isset($_GET["pid"])) {
  $pid = $_GET["pid"];
  $p_rs = Database::Search("SELECT * FROM `product` WHERE `product_id`='" . $pid . "'");
  if ($p_rs->num_rows > 0) {
    $p_d = $p_rs->fetch_assoc();
?>
    <!DOCTYPE html>
    <html lang="zxx">

    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8" />
      <meta name="description" content="" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

      <!-- Title -->
      <title><?php echo $p_d["product_name"]; ?> | BoostBite</title>
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
      <style>
        .gallery-img {
          width: 100px;
          height: 100px;
          cursor: pointer;
          margin: 5px;
        }

        .popup-image {
          display: none;
          position: fixed;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          max-width: 80%;
          max-height: 80%;
          background: rgba(0, 0, 0, 0.8);
          padding: 20px;
          border: 1px solid #ccc;
          z-index: 1000;
        }

        .popup-image img {
          width: 100%;
          height: auto;
        }

        .popup-image .close {
          position: absolute;
          top: 10px;
          right: 10px;
          color: #fff;
          font-size: 24px;
          cursor: pointer;
        }
      </style>
      <div class="page-wrapper">
        <!-- Preloader -->
        <div class="preloader">
          <div class="custom-loader"></div>
        </div>

        <!--Form Back Drop-->
        <div class="form-back-drop"></div>

        <?php
        require_once("header.php");
        headerContent(0)
        ?>

        <!-- Product Details Start -->
        <section class="product-details pb-10 pt-130 rpt-100">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-6">
                <div class="product-details-image rmb-55 bg-body p-5" data-aos="fade-left" data-aos-duration="1500"
                  data-aos-offset="50">
                  <?php
                  $img_rs = Database::Search("SELECT * FROM `product_img` WHERE `product_id`='" . $pid . "'");
                  if ($img_rs->num_rows > 0) {
                    $img_d = $img_rs->fetch_assoc();
                  ?>
                    <img src="<?php echo $img_d["product_img_path"]; ?>" class="img-fluid w-100" alt="Product Details">
                  <?php
                  } else {
                    echo "no image set";
                  }
                  ?>
                </div>
                <div class="row">
                  <?php
                  for ($x = 1; $x < $img_rs->num_rows; $x++) {
                    $img_d = $img_rs->fetch_assoc();
                  ?>
                    <div class="col-6 col-md-6 col-lg-4 mt-2">
                      <img src="<?php echo $img_d["product_img_path"]; ?>" alt="Product Details" />
                    </div>
                  <?php
                  }
                  ?>
                </div>
              </div>

              <div class="col-lg-6 mt-10">
                <div class="product-details-content" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                  <div class="section-title">
                    <h2><?php echo $p_d["product_name"]; ?></h2>
                  </div>
                  <p><?php echo $p_d["description"]; ?></p>
                  <!-- SPICY LEVEL -->
                  <h5 class="pt-4">Spicy Level 🌶️<span id="prefRef">1</span></h5>
                  <div class="row row-cols-3 g-2">
                    <!-- Example Spicy Levels -->
                    <!-- Replace these with dynamic values using a template engine or JavaScript -->
                    <?php
                    $pref_rs = Database::Search("SELECT * FROM `preference`");
                    for ($x = 0; $x < $pref_rs->num_rows; $x++) {
                      $pref_d = $pref_rs->fetch_assoc();
                    ?>
                      <div class="col">
                        <div
                          class="px-4 py-2 rounded-pill border d-flex justify-content-center align-items-center text-dark"
                          style="cursor: pointer" onclick="setPref('<?php echo $pref_d['preference_id']; ?>')">
                          <?php echo $pref_d["preference_name"]; ?>
                        </div>
                      </div>
                    <?php
                    }
                    ?>
                  </div>
                  <!-- SIZES LEVEL -->
                  <h5 class="pt-4">Sizes available 🍽️<span id="sizeRef">1</span></h5>
                  <div class="row row-cols-3 g-2">
                    <!-- Example Spicy Levels -->
                    <!-- Replace these with dynamic values using a template engine or JavaScript -->
                    <?php
                    $size_rs = Database::Search("SELECT * FROM `price_table` INNER JOIN `box_type` ON
                                                price_table.box_type_box_type_id=box_type.box_type_id WHERE `product_product_id`='" . $pid . "'");
                    for ($x = 0; $x < $size_rs->num_rows; $x++) {
                      $size_d = $size_rs->fetch_assoc();
                    ?>
                    <div class="col">
                        <div
                          class="px-4 py-2 rounded-pill border d-flex justify-content-center align-items-center text-dark"
                          style="cursor: pointer" onclick="setSize('<?php echo $p_d['product_id']; ?>', '<?php echo $size_d['box_type_id']; ?>')">
                          <?php echo $size_d["box_type_name"]; ?>
                        </div>
                      </div>
                    <?php
                    }
                    ?>
                  </div>


                  <?php
                  $price_rs = Database::Search("SELECT * FROM `price_table` WHERE `product_product_id`='" . $pid . "'");
                  if ($price_rs->num_rows > 0) {
                    $price_d = $price_rs->fetch_assoc();
                  ?>
                    <span class="price mb-15 mt-4" id="priceT">$<?php echo $price_d['price']; ?></span>
                  <?php
                  } else {
                    echo "coming soon...";
                  }
                  ?>


                  <div class="add-to-cart py-25">
                    <h5>Quantity</h5>
                    <input type="number" value="1" min="1" max="20" id="qty"
                      onchange="if(parseInt(this.value,10)<10)this.value='0'+this.value;" required />
                    <button class="theme-btn mb-15" onclick="addToCart('<?php echo $p_d['product_id']; ?>');">
                      Add to Cart <i class="far fa-arrow-alt-right"></i>
                    </button>
                </div>
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
            <!-- Popup Image Modal -->
            <div class="popup-image" id="popupImage">
              <span class="close">&times;</span>
              <img src="" alt="Popup Image">
            </div>
            <ul class="nav nav tab-style-one mt-125 rmt-95 mb-40" data-aos="fade-up" data-aos-duration="1500"
              data-aos-offset="50">
              <li>
                <a href="#details" data-bs-toggle="tab" class="active show">Descrptions</a>
              </li>
              <li>
                <a href="#information" data-bs-toggle="tab">Additional Information's</a>
              </li>
              <!-- <li><a href="#reviews" data-bs-toggle="tab">Reviews(3)</a></li> -->
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
              <!-- <div class="tab-pane fade" id="reviews">
              <h5>Reviews (3)</h5>
              <div class="comments rattings mt-25">
                <div class="comment-body">
                  <div class="author-thumb">
                    <img
                      src="assets/images/products/product-comment1.jpg"
                      alt="Author"
                    />
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
                    <img
                      src="assets/images/products/product-comment2.jpg"
                      alt="Author"
                    />
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
                    <img
                      src="assets/images/products/product-comment3.jpg"
                      alt="Author"
                    />
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
            </div> -->
            </div>
          </div>
        </section>
        <!-- Product Details End -->

        <!-- Review Form Start -->
        <!-- <section class="review-form-area">
            <div class="container">
                <form id="review-form" class="review-form z-1 rel" name="review-form" action="#" method="post" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <h5>Add a review</h5>
                    <p>3 reviews for Blue Stripes & Stone Earrings</p>
                    <div class="row mt-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input type="text" id="full-name" name="full-name" class="form-control" value="" placeholder="Full Name" required="">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input type="email" id="email-address" name="email" class="form-control" value="" placeholder="Email Address" required="">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input type="text" id="phone" name="phone" class="form-control" value="" placeholder="Phone Number" required="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="message" id="message" class="form-control" rows="4" placeholder="Write Message" required=""></textarea>
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
                                <button type="submit" class="theme-btn">Send Reviews <i class="fas fa-angle-double-right"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section> -->
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
        <?php
        require("footer.php")
        ?>
      </div>
      <!--End pagewrapper-->
      <!-- jQuery and JavaScript -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script>
        $(document).ready(function() {
          // Click event for sub-images
          $('.gallery-img').on('click', function() {
            var fullImageUrl = $(this).data('full-image');
            $('#popupImage img').attr('src', fullImageUrl);
            $('#popupImage').fadeIn();
          });

<<<<<<< HEAD
          // Close popup
          $('.close').on('click', function() {
            $('#popupImage').fadeOut();
          });
        });
      </script>
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

  </script>
  
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
<?php
  }
}
?>