<?php
require "C:/xampp/htdocs/meatShop/connection.php";
session_start();

if (true) { //check if the user logged in
    $user_email = 'user@gmail.com';
    Database::IUD("DELETE FROM `cart_item` WHERE `user_email`='$user_email'");
} else {
    session_destroy();
}

echo "success";
