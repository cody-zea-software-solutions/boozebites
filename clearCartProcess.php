<?php
require "connection.php";
session_start();

if (isset($_SESSION["user_boost"])) { //check if the user logged in
    $user_email = $_SESSION["user_boost"]["email"];
    Database::IUD("DELETE FROM `cart_item` WHERE `user_email`='$user_email'");
} else {
    session_destroy();
}

echo "success";
