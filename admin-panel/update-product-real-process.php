<?php

session_start();


if (isset($_SESSION["a"])) {

    require_once "db.php";

    $uemail = $_SESSION["a"]["email"];

    $u_detail = Databases::search("SELECT * FROM `admin` WHERE `email`='" . $uemail . "'");

    if ($u_detail->num_rows == 1) {

        // Capture form inputs
        $pid = $_POST["pid"];
        $pc = $_POST["pc"];
        $pm = $_POST["pm"];
        $pt = $_POST["pt"];
        $pld = $_POST["pld"];

        // Validate inputs for empty values
        if (empty($pt)) {
            echo "Title is empty";
            exit();
        }

        if (empty($pc) || $pc == 0) {
            echo "Cook Type is empty";
            exit();
        }

        if (empty($pm) || $pm == 0) {
            echo "Meat Type is empty";
            exit();
        }

        if (empty($pld)) {
            echo "Description is empty";
            exit();
        }

        $p_detail = Databases::search("SELECT * FROM `product` WHERE `product_id`='" . $pid . "'");
        if ($p_detail->num_rows == 1) {

            // Initializing unique ID for images
            $img_id_uni = uniqid();

            // Establish database connection
            Databases::setUpConnection();

            // Prepare SQL statement
            $stmt = Databases::$connection->prepare("UPDATE product
            INNER JOIN cook_type ON cook_type.cook_type_id = product.cook_type_id
            INNER JOIN meat_type ON meat_type.meat_type_id = product.meat_type_id
            SET product.product_name = ?, 
            product.cook_type_id = ?,
            product.meat_type_id = ?,
            product.description = ?
            WHERE product.product_id = ?; -- Add your condition here
            ");

            // Bind parameters
            $stmt->bind_param("siisi", $pt, $pc, $pm, $pld, $pid);

            // Execute query
            if ($stmt->execute()) {
                $product_id = $stmt->insert_id;

                if (isset($_FILES["img1"]) && $_FILES["img1"]["error"] === UPLOAD_ERR_OK) {
                    $allowed_image_extensions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml", "image/webp");
                    $file_type = $_FILES["img1"]["type"];

                    if (!in_array($file_type, $allowed_image_extensions)) {
                        echo "Invalid image type. Allowed types are JPG, JPEG, PNG, SVG, WEBP.";
                        exit();
                    }

                    $new_file_type = pathinfo($_FILES["img1"]['name'], PATHINFO_EXTENSION);
                    $file_name = "assets-admin/images/product_img/" . $img_id_uni . "_" . uniqid() . "." . $new_file_type;

                    if (move_uploaded_file($_FILES["img1"]["tmp_name"], $file_name)) {
                        // Insert image path into database
                        $stmt_img = Databases::$connection->prepare("UPDATE `product_img` 
                    SET `product_img_path` = ? 
                    WHERE `product_id` = ?");
                        $stmt_img->bind_param("si", $file_name, $pid);
                        $stmt_img->execute();
                        $stmt_img->close();

                        echo "Product has been updated.";
                    } else {
                        echo "Error uploading image.";
                    }

                }else{
                    echo "Product has been updated.";
                }
            } else {
                echo "Error inserting product into database.";
            }

        }

        // Close statement and connection
        $stmt->close();
        Databases::$connection->close();

    } else {
        echo "Something went wrong. Please try again.";
    }
}

?>