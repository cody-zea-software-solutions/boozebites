<?php
require "C:/xampp/htdocs/meatShop/connection.php";
session_start();
if (true) { //check if the user logged in
    $user_email = 'user@gmail.com';

    $cartTotal = 0.0;
    $shipFee = 6.0;
    $discount = 0.0;
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
                                        <button class="quantity-down" onclick="setCartQty('<?php echo $cart_d['product_id']; ?>', '<?php echo $cart_d['box_type_id']; ?>', '<?php echo $cart_d['preference_id']; ?>', '<?php echo $cart_d['cart_qty'] - 1; ?>')">--</button>
                                        <input class="quantity" type="number" min="1" value="<?php echo $cart_d["cart_qty"]; ?>" name="quantity" disabled>
                                        <button class="quantity-up" onclick="setCartQty('<?php echo $cart_d['product_id']; ?>', '<?php echo $cart_d['box_type_id']; ?>', '<?php echo $cart_d['preference_id']; ?>', '<?php echo $cart_d['cart_qty'] + 1; ?>')">+</button>
                                    </div>
                                </td>
                                <td><b class="price"><?php echo $cart_d["price"] * $cart_d["cart_qty"]; ?></b></td>
                                <td><button type="button" class="close" onclick="removeItem('<?php echo $cart_d['product_id']; ?>', '<?php echo $cart_d['box_type_id']; ?>', '<?php echo $cart_d['preference_id']; ?>', '<?php echo $x; ?>');">×</button></td>
                            </tr>
                    <?php
                        }
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
                                <td><span class="price"><?php echo $cartTotal; ?></span></td>
                            </tr>
                            <tr>
                                <td>Shipping Fee</td>
                                <td><span class="price"><?php echo $shipFee; ?></span></td>
                            </tr>
                            <?php
                            $discount_rs = Database::search("SELECT * FROM `discount` WHERE `amount` <= '$cartTotal' order BY `amount` DESC");
                            if ($discount_rs->num_rows > 0) {
                                $discount_d = $discount_rs->fetch_assoc();
                                $discount = $cartTotal * ($discount_d["percentage"] / 100);
                            ?>
                                <tr>
                                    <td>Discount <?php echo $discount_d["percentage"];?>%</td>
                                    <td><span class="price"><?php echo $discount; ?></span></td>
                                </tr>
                            <?php
                            }

                            $subTotal = ($cartTotal + $shipFee) - $discount;
                            $subTotal = round($subTotal, 0, PHP_ROUND_HALF_UP);
                            ?>
                            <tr>
                                <td><strong>Order Total</strong></td>
                                <td><b class="price"><?php echo $subTotal; ?></b></td>
                            </tr>
                        </tbody>
                    </table>
                    <?php
                    $address_rs = Database::search("SELECT * FROM `address` INNER JOIN `city` ON
                                address.city_id=city.city_id INNER JOIN `user` ON
                                address.user_email=user.email WHERE `user_email`='$user_email'");
                    if ($address_rs->num_rows > 0) {
                        $address_d = $address_rs->fetch_assoc();
                        $userName = $address_d["first_name"] . " " . $address_d["last_name"];
                        $mobile = $address_d["mobile"];
                        $address = $address_d["first_line"] . ", " . $address_d["second_line"] . ", " . $address_d["city_name"];

                        //echo $userName . "</br>";
                        //echo $mobile . "</br>";
                        //echo $address;
                    ?>
                        <a href="checkout.php" class="theme-btn style-two mt-100 w-100">Proceed to checkout</a>
                    <?php
                    } else {
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