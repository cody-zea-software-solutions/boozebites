<?php
session_start();
require "../connection.php";
require '../vendor/autoload.php';


// Import PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer.php";
require "SMTP.php";
require "Exception.php";

$sid = $_POST["sid"];
$scc = $_POST["scc"];
$umail = $_POST["umail"];
$paid = $_POST["payid"];
$nzd = $_POST["currency"];
$total = $_POST["total"];
$discount = $_POST["dis"];
$ship_amount = $_POST["ship"];

$tax_per;
// $discount = 0;
$dfi = 1;
Database::setUpConnection();
$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");
$ptype = 2;
$status = 1;
$pm = 1;
// find a products using user cart
$user_cart_rs = Database::search("SELECT * FROM `cart_item` INNER JOIN `price_table` ON
                                cart_item.price_table_product_product_id=price_table.product_product_id AND cart_item.price_table_box_type_box_type_id=price_table.box_type_box_type_id INNER JOIN `product` ON
                                price_table.product_product_id=product.product_id INNER JOIN `box_type` ON
                                cart_item.price_table_box_type_box_type_id=box_type.box_type_id INNER JOIN `preference` ON 
                                cart_item.preference_preference_id=preference.preference_id WHERE `user_email`='" . $umail . "'");
$user_cart_num = $user_cart_rs->num_rows;
$order_status = 1; //order status
//----------------------------------Order To Database------------------------------------------//
$order = Database::$connection->prepare("INSERT INTO `order` (`order_date`,`order_code`,`user_email`,`order_status_id`,`payment_method`) VALUES (?,?,?,?,?)");
$order->bind_param("sssii", $date, $paid, $umail, $order_status, $pm);
// $order->execute();
if ($order->execute()) {
    $order_id = $order->insert_id;
}
//----------------------------------------------------------------------------///
//----------------------------------Invoice To Database------------------------------------------//
$stmt = Database::$connection->prepare("INSERT INTO `invoice` (`invoice_date`,`payment_intent`,`discount`,`invoice_total`,`order_id`) VALUES (?,?,?,?,?)");
$stmt->bind_param("ssddi", $date, $paid, $discount, $total, $order_id);
$stmt->execute();
//----------------------------------------------------------------------------///
// Insert To Database invoice items and order items // 
for ($i = 0; $i < $user_cart_num; $i++) {
    $user_cart_data = $user_cart_rs->fetch_assoc();
    $qty = $user_cart_data["cart_qty"];
    $price = number_format($user_cart_data["price"], 2);
    $pid = $user_cart_data["product_id"];
    $price_table_product_product_id = $user_cart_data["price_table_product_product_id"];
    $price_table_box_type_box_type_id = $user_cart_data["price_table_box_type_box_type_id"];
    $preference_preference_id = $user_cart_data["preference_preference_id"];
    //Order items  
    $orderi = Database::$connection->prepare("INSERT 
INTO `order_item` (`order_id`,`price_table_product_product_id`,`price_table_box_type_box_type_id`,`preference_preference_id`,`qty`) 
                          VALUES (?,?,?,?,?)");
    $orderi->bind_param("iiiii", $order_id, $price_table_product_product_id, $price_table_box_type_box_type_id, $preference_preference_id, $qty);
    $orderi->execute();
}
echo "Okay Checkout Successed";
$s = new EmailSender();
echo $s->send($umail);



class EmailSender
{
    public function send($umail): string
    {
        $e = new EmailSender();
        return ($e->sendWelcomeEmail($umail));
    }
    protected function sendWelcomeEmail($umail): string
    {
        $sid = $_POST["sid"];
        $scc = $_POST["scc"];
        $umail = $_POST["umail"];
        $paid = $_POST["payid"];
        $nzd = $_POST["currency"];
        $total = $_POST["total"];
        $discount = $_POST["dis"];
        $ship_amount = $_POST["ship"];
        $stripe = new \Stripe\StripeClient('sk_test_51QRJPfRwa2ApijVLwBjDgHzsem3ZmaFJqJ4cYXja289L3yNGr9r40SQTA6409bbbHNRZ93Pp9AjhDjcBk6AW1z6t00dKZSALgD');
        $items = $stripe->checkout->sessions->allLineItems(
            $sid,
            []
        );
        $user_rs = Database::Search("SELECT * FROM `user` WHERE `email` = '" . $_SESSION["user_boost"]["email"] . "'");
        $user_data = $user_rs->fetch_assoc();

        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'codylanka00@gmail.com';
        $mail->Password = 'jnil boop pwrb sejy';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('codylanka00@gmail.com', 'Ceynap');
        $mail->addAddress($umail);
        $mail->isHTML(true);
        $mail->Subject = '🍢 Hello ' . $user_data["first_name"] . ',Booze Bites Invoice is Ready! 🍢';
        $bodyContent = "<!DOCTYPE html>
        <html lang=\"en\">
        <head>
            <meta charset=\"UTF-8\">
            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
            <style>
                body {
                    margin: 0;
                    padding: 0;
                    font-family: Montserrat , sans-serif;
                    background-color: #f4f4f4;
                    color: #333;
                }
                .email-container {
                    max-width: 600px;
                    margin: 20px auto;
                    background: #ffffff;
                    border-radius: 5px;
                    overflow: hidden;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                }
                .header {
                    background-color: #e65a11;
                    color: #ffffff;
                    padding: 20px;
                    text-align: center;
                }
                .header h1 {
                    margin: 0;
                    font-size: 24px;
                }
                .content {
                    padding: 20px;
                }
                .content p {
                    margin: 0 0 10px;
                }
                .invoice-details {
                    width: 100%;
                    border-collapse: collapse;
                    margin: 20px 0;
                }
                .invoice-details th, .invoice-details td {
                    border: 1px solid #ddd;
                    padding: 8px;
                    text-align: left;
                }
                .invoice-details th {
                    background-color: #e65a11;
                    font-weight: bold;
                }
                .total {
                    text-align: right;
                    margin-top: 20px;
                    font-size: 18px;
                }
                .footer {
                    background-color: #ffb936;
                    padding: 10px;
                    text-align: center;
                    font-size: 14px;
                    color: #666;
                }
                .footer a {
                    color: black;
                    text-decoration: none;
                }
                .inbg {
                    background-color: #f28951;
                }
            </style>
        </head>
        <body>
            <div class=\"email-container\">
                <div class=\"header\">
                    <h1>Booze Bites Order Confirmation</h1>
                </div>
                <div class=\"content\">
<p>Hello, " . htmlspecialchars($user_data["first_name"]) . "</p>       
<center>
<b> <p>Thank you for your purchase! Here are the details of your invoice:</p></b>
</center>          

                    <table class=\"invoice-details\">
                        <thead class=\"inbg\">
                            <tr>
                                <th>Item</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>";

        foreach ($items as $item) {
            $itemTotal = $item->quantity * $item->amount_subtotal;
            $bodyContent .= "<tr>
                <td>" . htmlspecialchars($item->description) . "</td>
                <td>" . htmlspecialchars($item->quantity) . "</td>
                <td>$" . number_format($item->amount_subtotal / 100, 2) . "</td>
                <td>$" . number_format($itemTotal / 100, 2) . "</td>
            </tr>";
        }

        $bodyContent .= "</tbody>
                    </table>
                    <div class=\"total\">
                        <strong>Total: $" . number_format($total / 100, 2) . "</strong>
                    </div>
                    <p>If you have any questions about your order, please <a href=\"mailto:support@example.com\">Contact Us</a>.</p>
                </div>
                <div class=\"footer\">
                    <p>&copy; 2024 Booze Bites. All rights reserved.</p>
                    <p><a href=\"#\">Visit our website</a></p>
                </div>
            </div>
        </body>
        </html>";

        $mail->Body = $bodyContent;
        if (!$mail->send()) {
            return "Error";
        } else {
            return "check your gmailbox";
        }

    }
}

echo "success";




?>