<?php
session_start();
if (isset($_SESSION["a"])) {
    require "db.php";
    $dis = $_POST["dis"];
    $dis = intval($dis); 
    if($dis == 0){
        echo("select the discount");
    } else {
     $query = "DELETE FROM `discount` WHERE `discount_id`='$dis'";
     Databases::iud($query);
     echo("deleted");
    }
}
?>
