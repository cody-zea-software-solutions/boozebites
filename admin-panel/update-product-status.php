<?php
session_start();
if (isset($_SESSION["a"])) {

    require_once "db.php";

    $uemail = $_SESSION["a"]["email"];

    $u_detail = Databases::search("SELECT * FROM `admin` WHERE `email`='" . $uemail . "'");

    if ($u_detail->num_rows == 1) {


        $orderID = $_POST["pid"];
        $status = $_POST["s"];

        if($status==1){
            $status=0;
        }else{
            $status=1;
        }


        Databases::iud("UPDATE `product` SET `on_delete` = '" . $status . "' WHERE `product_id` = '" . $orderID . "' ");

        echo "Product status updated.";

    }
}





?>