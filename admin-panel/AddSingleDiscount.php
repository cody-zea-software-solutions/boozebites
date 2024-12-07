<?php
session_start();
require_once "../connection.php";

if (isset($_SESSION["a"])) {
    if (isset($_GET["sdis"])) {
        $dis_val = $_GET["sdis"];
        $formattedDiscount = number_format((float) $dis_val, 2, '.', '');
        if (is_numeric($formattedDiscount) && !empty($dis_val)) {
              $query = "INSERT INTO `discount` (`qty`,`discount_price`,`product_id`,`unit_id`) VALUES ('1','" . $formattedDiscount . "',1,2)";
        Database::iud($query);

        echo "success";  
        }else{
            echo "Invalid Data !! Please Try Again";
        }

    
    } else {
        echo "Please Try Again";
    }

} else {
    echo "You Are Not A Admin";
}



?>