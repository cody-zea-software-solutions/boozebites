<?php

require_once "../connection.php";
session_start();

if (isset($_SESSION["a"])) {

    $uemail = $_SESSION["a"]["user_name"];
    $img_id_uni = uniqid();
    $u_detail = Database::search("SELECT * FROM `admin` WHERE `user_name`='" . $uemail . "'");

    if ($u_detail->num_rows == 1) {

        if (!isset($_POST['pid'])) {
            echo "Something went wrong !";
        } elseif (!isset($_POST['sku'])) {
            echo "Something went wrong !";
        } elseif (!isset($_POST['pt'])) {
            echo "Something went wrong !";
        } elseif (!isset($_POST['pc'])) {
            echo "Something went wrong !";
        } elseif (!isset($_POST['pp'])) {
            echo "Something went wrong !";
        } elseif (!isset($_POST['pq'])) {
            echo "Something went wrong !";
        } elseif (!isset($_POST['ps'])) {
            echo "Something went wrong !";
        } elseif (!isset($_POST['psd'])) {
            echo "Something went wrong !";
        } elseif (!isset($_POST['pld'])) {
            echo "Something went wrong !";
        } else {

            if (empty($_POST['pid'])) {
                echo "product ID cannot be empty";
            } elseif (empty($_POST['sku'])) {
                echo "SKU code cannot be empty";
            } elseif (empty($_POST['pt'])) {
                echo "product title cannot be empty";
            } elseif (empty($_POST['pc'])) {
                echo "product category cannot be empty";
            } elseif (empty($_POST['pp'])) {
                echo "price cannot be empty";
            } elseif (empty($_POST['pq'])) {
                echo "quantity cannot be empty";
            } elseif (empty($_POST['ps'])) {
                echo "stock cannot be empty";
            } elseif (empty($_POST['psd'])) {
                echo "short description cannot be empty";
            } elseif (empty($_POST['pld'])) {
                echo "main description cannot be empty";
            } else {

                $pid = $_POST['pid'];
                $sku = $_POST['sku'];
                $pt = $_POST['pt'];
                $pc = $_POST['pc'];
                $pp = $_POST['pp'];
                $pq = $_POST['pq'];
                $ps = $_POST['ps'];
                $psd = $_POST['psd'];
                $pld = $_POST['pld'];

                if (!is_numeric($pid) || !is_numeric($pc) || !is_numeric($ps)) {
                    echo "Something went wrongs !";
                } elseif (!is_numeric($pp) || !is_numeric($pq)) {
                    echo "Price and quantity must be numeric values.";
                } else {

                    $image_files = array();

                    if (isset($_FILES["img3"])) {
                        $image_files[] = $_FILES["img3"];
                        $offset = 2;
                    }
                    if (isset($_FILES["img2"])) {
                        $image_files[] = $_FILES["img2"];
                        $offset = 1;
                    }
                    if (isset($_FILES["img1"])) {
                        $image_files[] = $_FILES["img1"];
                        $offset = 0;
                    }

                    $p_q = Database::search("SELECT * FROM `products` WHERE `product_id` ='" . $pid . "'");
                    if ($p_q->num_rows == 1) {

                        $sql = "UPDATE `products`
                        SET `sku_code` = ?,
                            `qty` = ?,
                            `description` = ?,
                            `short_desc` = ?,
                            `title` = ?,
                            `price` = ?,
                            `stock_id` = ?,
                            `category_id` = ?
                        WHERE `product_id` = ?";
                
                // Prepare the statement
                Database::setUpConnection();

                $stmt = Database::$connection->prepare($sql);
                
                // Bind parameters
                $stmt->bind_param("ssssssssi", $sku, $pq, $pld, $psd, $pt, $pp, $ps, $pc, $pid);

                        $i_q = Database::search("SELECT `product_img`.*,`products`.`title` FROM `product_img`
                        INNER JOIN `products` ON `products`.`product_id`=`product_img`.`product_id`
                        WHERE `product_img`.`product_id`='" . $pid . "'");

                        $allowed_image_extensions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");

                        foreach ($image_files as $key => $img) {
                            $file_type = $img["type"];

                            if (in_array($file_type, $allowed_image_extensions)) {

                                $i_d = $i_q->fetch_assoc();
                                $title = preg_replace("/[^[:alnum:]]/", "_", $i_d["title"]);
                                $new_file_type = pathinfo($img['name'], PATHINFO_EXTENSION);
                                $file_name = "product_img/" . $img_id_uni . "_" . uniqid() . "." . $new_file_type;

                                if (move_uploaded_file($img["tmp_name"], $file_name)) {

                                    // File was uploaded successfully
                                    $ui_q = "UPDATE `product_img` SET `path_code` = '" . $file_name . "'
                                    WHERE `id` = (
                                    SELECT `id`
                                    FROM (
                                    SELECT `id`
                                    FROM `product_img`
                                    WHERE `product_id` = '" . $pid . "'
                                    ORDER BY `id`
                                    LIMIT 1 OFFSET " . $offset . "
                                        ) AS temp
                                    );";

                                    Database::iud($ui_q);

                                    $i_img = $i_d["path_code"];
                                    if (file_exists($i_img)) {
                                        unlink($i_img);
                                    }

                                } else {
                                    // Error handling if move_uploaded_file fails
                                    die("Image upload failed.\n");
                                }

                                $offset += 1;

                            } else {
                                die("File type not allowed to upload for image " . ($offset + 1));
                            }
                        }

                        $stmt->execute();
                
                        $stmt->close();
                        echo "Product has been updated.";

                    } else {
                        echo "Invalid product ID";
                    }
                }

            }

        }

    } else {
        echo "Invalid user!";
    }
    ;

} else {
    echo "Please log in first!";
}

?>