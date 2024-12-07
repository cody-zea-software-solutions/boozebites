<?php

session_start();
require "../connection.php";

$title = $_POST["t"];
$sku = $_POST["sku"];
$weight = $_POST["weight"];
$price = $_POST["price"];
$des = $_POST["des"];
$category = $_POST["cat"];
$s_des = $_POST["s_des"];
$stock = $_POST["stock"];
$qty = $_POST["qty"];
$solution = $_POST["solu"];

// if (is_numeric($price) || is_numeric($qty)) {
    
// } else {

    // Set initial status
    $status = 1;
    $brand = 1;
    $delete_on = 0;
    $img_id_uni = uniqid();
    // Establish database connection
    Database::setUpConnection();

    // Prepare SQL statement to prevent SQL injection
    $stmt = Database::$connection->prepare("INSERT INTO `products` (`sku_code`, `qty`, `description`, `short_desc`, `title`, `price`,`datetime_added`, `brand_id`, `status`, `category_id`, `weight_id`, `stock_id`,`solutions_id`,`on_delete`) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)");
    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");
    // Bind parameters to prepared statement
    $stmt->bind_param("sisssdsiisiiii", $sku, $qty, $des, $s_des, $title, $price, $date, $brand, $status, $category, $weight, $stock, $solution,$delete_on);

    // Execute prepared statement
    if ($stmt->execute()) {
        $product_id = $stmt->insert_id;

        $allowed_image_extensions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml", "image/webp");

        if (isset($_FILES["img1"], $_FILES["img2"], $_FILES["img3"])) {
            $image_files = array($_FILES["img1"], $_FILES["img2"], $_FILES["img3"]);

            foreach ($image_files as $key => $img) {
                $file_type = $img["type"];

                if (in_array($file_type, $allowed_image_extensions)) {
                    $new_file_type = pathinfo($img['name'], PATHINFO_EXTENSION);
                    $file_name = "product_img/" . $img_id_uni . "_" . uniqid() . "." . $new_file_type;
                    move_uploaded_file($img["tmp_name"], $file_name);

                    // Prepare and execute statement to insert image paths into database
                    $stmt_img = Database::$connection->prepare("INSERT INTO `product_img` (`path_code`, `product_id`) VALUES (?, ?)");
                    $stmt_img->bind_param("si", $file_name, $product_id);
                    $stmt_img->execute();
                    $stmt_img->close();
                } else {
                    echo "File type not allowed to upload for image " . ($key + 1) . ".";
                }
            }
            echo "success";
            // echo "1";
        } else {
            echo "Images not updated.";
        }
    } else {
        echo "Error inserting product into database.";
    }

    // Close statement and database connection
    $stmt->close();
    Database::$connection->close();
// }
?>