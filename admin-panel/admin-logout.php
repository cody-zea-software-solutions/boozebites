<?php
session_start();
require "../connection.php";

    if(isset($_SESSION["a"])){
        session_unset();
        session_destroy();
        echo "done";
    }else{
        echo "Something went wrong !";
    }
?>