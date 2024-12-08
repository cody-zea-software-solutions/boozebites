<?php

require "connect.php";

// Import PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer.php";
require "SMTP.php";
require "Exception.php";

$email = $_POST["email"];

$s = new EmailSender();
echo $s->send($email);

class EmailSender
{
     public function send($email): string{
        $e =  new EmailSender();
       return ($e->sendWelcomeEmail($email));
     }
    protected function sendWelcomeEmail($email): string
    {
    $code = bin2hex(random_bytes(5)); 
    Database::iud("UPDATE `user` SET `v_code`='".$code."' WHERE `email`='".$email."'");
  
        $mail = new PHPMailer;

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'codylanka00@gmail.com';
        $mail->Password = 'jnil boop pwrb sejy';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('codylanka00@gmail.com', 'Ceynap');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Welcome to Ceynap!';

        $bodyContent = '
        <!DOCTYPE html>
        <html>
        <head>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f9f9f9;
                    margin: 0;
                    padding: 0;
                }
                .email-container {
                    max-width: 600px;
                    margin: auto;
                    background-color: #ffffff;
                    border-radius: 8px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    overflow: hidden;
                }
                .email-header {
                    background-color: #ff6f61;
                    color: #ffffff;
                    padding: 20px;
                    text-align: center;
                }
                .email-header h1 {
                    margin: 0;
                    font-size: 24px;
                }
                .email-body {
                    padding: 20px;
                    color: #333333;
                }
                .email-body p {
                    line-height: 1.6;
                }
                .otp {
                    display: inline-block;
                    font-size: 24px;
                    font-weight: bold;
                    color: #ff6f61;
                    background-color: #fff4f2;
                    padding: 10px 20px;
                    margin: 20px 0;
                    border-radius: 5px;
                }
                .email-footer {
                    background-color: #f1f1f1;
                    padding: 20px;
                    text-align: center;
                    font-size: 14px;
                    color: #666666;
                }
                .email-footer a {
                    color: #ff6f61;
                    text-decoration: none;
                }
            </style>
        </head>
        <body>
            <div class="email-container">
                <!-- Header -->
                <div class="email-header">
                    <h1>Booze Bites Pvt Ltd</h1>
                </div>
        
                <!-- Body -->
                <div class="email-body">
                    <p>Dear Valued Customer,</p>
                    <p>We received a request to reset your password. Use the OTP below to reset your password. If you didn’t request this, please ignore this email.</p>
                    <div class="otp">'.$code.'</div>
                    <p>Booze Bites delivers bold, Sri Lankan-inspired bites that pair perfectly with your drinks. Some of our popular foods include:</p>
                    <ul>
                        <li>Hamburger</li>
                        <li>French fries</li>
                        <li>Chicken pizza</li>
                        <li>Onion rings</li>
                        <li>Vegetable roll</li>
                        <li>Chicken nuggets</li>
                        <li>Sea fish</li>
                        <li>Tacos Pizza</li>
                        <li>Fried chicken</li>
                        <li>Hot Dogs</li>
                    </ul>
                    <p>Need help? Contact us:</p>
                    <p><strong>Booze Bites Pvt Ltd</strong></p>
                    <p>89B Cascades Road, Pakuranga, New Zealand</p>
                    <p>Email: <a href="mailto:sugithnz91@gmail.com">sugithnz91@gmail.com</a></p>
                    <p>Phone: <a href="tel:+64273144080">+(64) 27 314 4080</a></p>
                </div>
        
                <!-- Footer -->
                <div class="email-footer">
                    <p>Thank you for choosing Booze Bites Pvt Ltd.</p>
                    <p><a href="#">Visit our website</a></p>
                </div>
            </div>
        </body>
        </html>
        ';

        $mail->Body = $bodyContent;
        if (!$mail->send()) {
            return "Error" ;
        } else {
            return "check your gmailbox";
        }
    }
}
?>
