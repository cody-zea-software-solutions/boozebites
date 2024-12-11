<?php
require "connection.php";
include "CartItem.php";
session_start();

$pid = $_POST["pid"];
$bid = $_POST["bid"];
$sid = $_POST["sid"];
$qty = $_POST["qty"];

if (isset($_SESSION["user_boost"])) { //check if the user logged in
    $user_email = $_SESSION["user_boost"]["email"];

    Database::iud("UPDATE `cart_item` SET `cart_qty`='$qty' WHERE `user_email`='$user_email' AND `price_table_product_product_id`='$pid' AND `price_table_box_type_box_type_id`='$bid' AND `preference_preference_id`='$sid'");
    echo "success";
}else{
    echo "unauthorized";
}

