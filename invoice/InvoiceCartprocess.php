<?php
session_start();
require "../connection.php";

$sid = $_POST["sid"];
$scc = $_POST["scc"];
$umail = $_POST["umail"];
$paid = $_POST["payid"];
$nzd = $_POST["currency"];
$total = $_POST["total"];
$discount = $_POST["dis"];
$ship_amount = $_POST["ship"];

$tax_per;
// $discount = 0;
$dfi = 1;


Database::setUpConnection();



$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");


$tax_rs = Database::search("SELECT * FROM `tax`");
$tax_num = $tax_rs->num_rows;
if ($tax_num != 0) {
    $tax_data = $tax_rs->fetch_assoc();
    $tax_per = $tax_data["tax_percentage"];

} else if ($tax_num == 0) {
    $tax_per = 0;

}

$ptype = 2;
$status = 1;
$pm = 1;
$user_cart_rs = Database::search("SELECT * FROM `cart` INNER JOIN `products` ON `cart`.`products_id` = `products`.`product_id` WHERE `user_email` = '" . $umail . "'");
$user_cart_num = $user_cart_rs->num_rows;
$order_status = 1;
for ($i = 0; $i < $user_cart_num; $i++) {
    $user_cart_data = $user_cart_rs->fetch_assoc();
    $qty = $user_cart_data["cart_qty"];
    $price = number_format($user_cart_data["price"], 2);
    $pid = $user_cart_data["products_id"];
    $stmt = Database::$connection->prepare("INSERT 
INTO `invoice` (`invoice_id`, `date`, `qty`, `product_price`, `total_amount`, `tax`,`discount`, `product_id`, `delivery_fee`, `user_email`,`ptype_id`,`status`) 
                          VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");


    $stmt->bind_param("ssiddididsii", $paid, $date, $qty, $price, $price, $tax_per, $discount, $pid, $ship_amount, $umail, $ptype, $status);
    $stmt->execute();

    //Order Create 

    $stmt1 = Database::$connection->prepare("INSERT 
INTO `orders` (`date`,`product_amount`,`total_amount`, `tax`,`discount`, `order_qty`, `products_id`, `user_email`,`payment-method`,`order_code`,`order_status`) 
                          VALUES (?,?,?,?,?,?,?,?,?,?,?)");


    $stmt1->bind_param("sddddiisiss", $date, $price, $price, $tax_per, $discount, $qty, $pid, $umail, $pm, $paid, $order_status);
    $stmt1->execute();
}

echo "1";




?>