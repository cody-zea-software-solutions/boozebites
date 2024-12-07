<?php

require_once "../connection.php";

$orderID = $_POST["oid"];
$status = $_POST["sid"];


Database::iud("UPDATE `orders` SET `order_status` = '".$status."' WHERE `order_id` = '".$orderID."'");



echo "success";




?>