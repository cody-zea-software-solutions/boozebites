<?php
require "connection.php";
require "CartItem.php";
session_start();

if (true) { //check if the user logged in
    $user_email = 'user@gmail.com';

    $cart_rs = Database::Search("SELECT * FROM `cart_item` INNER JOIN `price_table` ON
    cart_item.price_table_product_product_id=price_table.product_product_id AND cart_item.price_table_box_type_box_type_id=price_table.box_type_box_type_id INNER JOIN `product` ON
    price_table.product_product_id=product.product_id INNER JOIN `box_type` ON
    cart_item.price_table_box_type_box_type_id=box_type.box_type_id WHERE `user_email`='$user_email'");
    if ($cart_rs->num_rows > 0) {
        for ($x = 0; $x < $cart_rs->num_rows; $x++) {
            $cart_d = $cart_rs->fetch_assoc();
?>
            <tr>
                <td><?php echo $cart_d["product_name"]; ?></td>
                <td><?php echo $cart_d["box_type_name"]; ?></td>
                <td>x<?php echo $cart_d["cart_qty"]; ?></td>
                <td>$<?php echo $cart_d["price"] * $cart_d["cart_qty"]; ?></td>
            </tr>
            <?php
        }
    }else{
        echo "no items in the cart";
    }
} else { //Shows session based cart instead

    if (isset($_SESSION["cart"])) {
        $cartItems = $_SESSION["cart"];
        foreach ($cartItems as $cartItem) {
            $pid = $cartItem->pid;
            $bid = $cartItem->bid;
            $qty = $cartItem->qty;

            $rs = Database::Search("SELECT `product_name`, `box_type_name`, `price` FROM `price_table` INNER JOIN `product` ON
            price_table.product_product_id=product.product_id INNER JOIN `box_type` ON
            price_table.box_type_box_type_id=box_type.box_type_id WHERE `product_product_id`='$pid' AND `box_type_box_type_id`='$bid'");

            if ($rs->num_rows > 0) {
                $d = $rs->fetch_assoc();
            ?>
                <tr>
                    <td><?php echo $d["product_name"]; ?></td>
                    <td><?php echo $d["box_type_name"]; ?></td>
                    <td>x<?php echo $qty; ?></td>
                    <td>$<?php echo $d["price"] * $qty; ?></td>
                </tr>
<?php
            }
        }
    } else {
        echo "no cart ses";
    }
}

?>