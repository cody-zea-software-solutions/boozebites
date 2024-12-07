<?php 
require "../connection.php";
$cname = $_GET["cname"];

// echo $cname;

if (empty($cname)) {
    echo "Please Enter Category Name";
}else{

Database::iud("INSERT INTO `category` (`name`) VALUES ('".$cname."')");

echo "success";
}

?>