<?php 

require "../connection.php";

$weight = $_GET["wname"];

if (empty($weight)) {
   echo "Please Add Weight Amount (KG)";
}else{

    Database::iud("INSERT INTO `weight` (`Amount`) VALUES ('".$weight."')");

    echo "success";

}

?>