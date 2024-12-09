<?php
require "connection.php";
$email = $_POST["email"];
$vcode = $_POST["verificationCode"];
$newpass = $_POST["newPassword"];
$comformp = $_POST["confirmPassword"];

if(empty($email)){
     echo ("plaece enter your email first");
}else if(empty($vcode)){
     echo("pleace enter your verificationCode");
}else if(empty($newpass)){
     echo("pleace enter your newPassword");
}else if(empty($comformp)){
     echo("pleace enter your comform Password");
}else if($newpass!=$comformp){
     echo("new password and coformpassword is not same");
}else{
     Database::iud("UPDATE `user` SET `password`='".$newpass."' WHERE `email`='".$email."'");
     echo("Password is updated now");
}
 ?>