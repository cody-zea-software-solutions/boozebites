<?php
require "C:/xampp/htdocs/meatShop/connection.php";
include "CartItem.php";
session_start();

$pid = $_POST["pid"];
$bid = $_POST["bid"];
$sid = $_POST["sid"];
$qty = $_POST["qty"];

$rs = Database::Search("SELECT `product_name`, `box_type_name`, `price` FROM `price_table` INNER JOIN `product` ON
price_table.product_product_id=product.product_id INNER JOIN `box_type` ON
price_table.box_type_box_type_id=box_type.box_type_id WHERE `product_product_id`='$pid' AND `box_type_box_type_id`='$bid'");

if ($rs->num_rows > 0) {
    $d = $rs->fetch_assoc();

    if (true) { //Maintain a session based cart
        $item = new CartItem($pid, $bid, $qty);
        $_SESSION["cart"][] = $item;
    }

    if (true) { //check if the user logged in
        $user_email = 'user@gmail.com';

        $cart_rs = Database::Search("SELECT * FROM `cart_item` WHERE `user_email`='$user_email' AND `price_table_product_product_id`='$pid' AND `price_table_box_type_box_type_id`='$bid' AND `preference_preference_id`='$sid'");
        if ($cart_rs->num_rows > 0) {
            $cart_d = $cart_rs->fetch_assoc();
            $new_qty = $cart_d["cart_qty"] + $qty;
            Database::IUD("UPDATE `cart_item` SET `cart_qty`='$new_qty' WHERE `user_email`='$user_email' AND `price_table_product_product_id`='$pid' AND `price_table_box_type_box_type_id`='$bid' AND `preference_preference_id`='$sid'");
        } else {
            Database::IUD("INSERT INTO `cart_item` (`user_email`, `price_table_product_product_id`, `price_table_box_type_box_type_id`, `preference_preference_id`,`cart_qty`) 
            VALUES('$user_email', '$pid', '$bid', '$sid', '$qty')");
        }
    }

    echo "success";
} else {
    echo "system error";
}
