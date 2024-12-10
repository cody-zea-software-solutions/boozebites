<div class="row">
                            <?php
                            include "connection.php";
                                $product_rs = Database::search("SELECT * FROM `product`  WHERE  `on_delete` = '0'");
                                $product_num = $product_rs->num_rows;
                                for ($i = 0; $i < $product_num; $i++) {
                                    $product_data = $product_rs->fetch_assoc();
                                    $product_img = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $product_data['product_id'] . "'");
                                    $product_img_num = $product_img->num_rows;
                                    if ($product_img_num != 0) {
                                        $pimg = $product_img->fetch_assoc();
                                        $img = $pimg['product_img_path'];
                                    } else {
                                        $img = null;
                                    }
                                ?>
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
                                <?php
                                }
                                ?> 
                            </div>