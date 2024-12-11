<?php
require "connection.php";
require_once 'vendor/autoload.php'; // Include Stripe PHP library
session_start();
$total = $_POST["total"];
$umail = $_POST["umail"];
$discount = $_POST["dis"];
$shiptotal = $_POST["shiptotal"];

$shiptotal = number_format($shiptotal, 2, '.', '');
$discount = number_format($discount, 2, '.', ''); // Format discount amount


$coupon_id = uniqid();

$response = []; // Initialize an empty array to hold the response

if (isset($_SESSION["user_boost"])) {
    if (!is_null($total) && !is_null($umail)) {
        if ($total != '0.00') {
            try {
                \Stripe\Stripe::setApiKey('sk_test_51QRJPfRwa2ApijVLwBjDgHzsem3ZmaFJqJ4cYXja289L3yNGr9r40SQTA6409bbbHNRZ93Pp9AjhDjcBk6AW1z6t00dKZSALgD');
                // Create a coupon with the specified discount amount
                if ($discount != '0.00') {
                    $coupon = \Stripe\Coupon::create([
                        'id' => $coupon_id,
                        'amount_off' => intval($discount * 100), // Convert discount to cents
                        'currency' => 'nzd', // Currency code
                        'duration' => 'forever', // Valid for one-time use
                    ]);
                }






                // Define shipping charge
                $shippingCharge = 250; // Shipping charge in cents (NZD 2.50)
                if ($discount == '0.00') {
                    $successUrl = 'http://localhost/boozebitenz/invoice/cartInvoice.php?session_id={CHECKOUT_SESSION_ID}&umail=' . $umail . '&qty=' . 1;
                    // $successUrl = 'https://ceynap.co.nz/invoice/cartInvoice.php?session_id={CHECKOUT_SESSION_ID}&umail=' . $umail . '&qty=' . 1;

                } else {
                    $successUrl = 'http://localhost/boozebitenz/invoice/cartInvoice.php?session_id={CHECKOUT_SESSION_ID}&umail=' . $umail . '&qty=' . 1 . '&coupon_id=' . $coupon_id;
                    // $successUrl = 'https://ceynap.co.nz/invoice/cartInvoice.php?session_id={CHECKOUT_SESSION_ID}&umail=' . $umail . '&qty=' . 1 . '&coupon_id=' . $coupon_id;

                }


                // Fetch product details from the database
                $cart_rs = Database::search("SELECT * FROM `cart_item` INNER JOIN `price_table` ON
                                cart_item.price_table_product_product_id=price_table.product_product_id AND cart_item.price_table_box_type_box_type_id=price_table.box_type_box_type_id INNER JOIN `product` ON
                                price_table.product_product_id=product.product_id INNER JOIN `box_type` ON
                                cart_item.price_table_box_type_box_type_id=box_type.box_type_id INNER JOIN `preference` ON 
                                cart_item.preference_preference_id=preference.preference_id WHERE `user_email`='". $umail."'");
                $cart_num = $cart_rs->num_rows;

                $lineItems = [];
                while ($cart_data = $cart_rs->fetch_assoc()) {
                    // Format the price with two decimal places
                    $price = number_format($cart_data["price"], 2, '.', '');

                    $lineItems[] = [
                        'price_data' => [
                            'currency' => 'nzd',
                            'product_data' => [
                                'name' => $cart_data["product_name"],
                                'images' => ['product_image.jpg'], // Change this to the actual image path
                            ],
                            'unit_amount' => intval($price * 100), // Amount in cents
                        ],
                        'quantity' => $cart_data["cart_qty"],
                    ];
                }

                // Add shipping charge as a separate line item
                $lineItems[] = [
                    'price_data' => [
                        'currency' => 'nzd',
                        'product_data' => [
                            'name' => 'Shipping Charge',
                        ],
                        'unit_amount' => intval($shiptotal * 100), // Shipping charge in cents
                    ],
                    'quantity' => 1, // Assuming only one shipping charge
                ];
   

                // Create Stripe Checkout session with the coupon applied
                if ($discount != '0.00') {
                    $session = \Stripe\Checkout\Session::create([
                        'payment_method_types' => ['card'],
                        'line_items' => $lineItems,
                        'mode' => 'payment',
                        'discounts' => [
                            ['coupon' => $coupon->id], // Apply the created coupon
                        ],
                        'success_url' => $successUrl,
                        'cancel_url' => 'https://ceynap.co.nz/payment-cancel.php',

                    ]);
                } else {
                    $session = \Stripe\Checkout\Session::create([
                        'payment_method_types' => ['card'],
                        'line_items' => $lineItems,
                        'mode' => 'payment',

                        'success_url' => $successUrl,
                        'cancel_url' => 'https://ceynap.co.nz/payment-cancel.php',
                     
                    ]);
                }


                // Add the session ID to the response array
                $response['id'] = $session->id;
            } catch (\Stripe\Exception\ApiErrorException $e) {
                $response['error'] = 'Error creating Stripe Checkout session: ' . $e->getMessage();
            }
        } else {
            $response['error'] = "Your Cart Is Empty Or Error";
        }
    } else {
        $response['error'] = "Please Try Again";
    }
} else {
    $response['error'] = "Please Sign-In Or Sign-Up First";
}

// Return the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>