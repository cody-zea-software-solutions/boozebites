<?php
require "connection.php";
$email = $_POST["email"];
$vcode = $_POST["verificationCode"];
$newpass = $_POST["newPassword"];
$comformp = $_POST["confirmPassword"];

if (empty($email)) {
     echo ("plaece enter your email first");
} else if (empty($vcode)) {
     echo ("pleace enter your verificationCode");
} else if (empty($newpass)) {
     echo ("pleace enter your newPassword");
} else if (empty($comformp)) {
     echo ("pleace enter your comform Password");
} else if ($newpass != $comformp) {
     echo ("new password and coformpassword is not same");
} else {
?>
<?php
     $x = Database::Search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
     $xx = $x->fetch_assoc();
     if ($xx["v_code"] == $vcode) {
          Database::IUD("UPDATE `user` SET `password`='" . $newpass . "' WHERE `email`='" . $email . "'");
          echo ("Password is updated now");
     } else {
          echo "pleace enter true verification code";
     }
}
?>