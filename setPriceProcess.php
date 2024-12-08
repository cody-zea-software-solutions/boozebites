<?php
require "connection.php";

$pid = $_POST["pid"];
$bid = $_POST["bid"];

$rs = Database::Search("SELECT * FROM `price_table` WHERE `product_product_id`='" . $pid . "' AND `box_type_box_type_id`='".$bid."'");
$d = $rs->fetch_assoc();

echo $d["price"];
