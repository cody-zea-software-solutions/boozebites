<?php

session_start();
if (isset($_SESSION["a"])) {

    include "db.php";

    $uemail = $_SESSION["a"]["email"];

    $u_detail = Databases::search("SELECT * FROM `admin` WHERE `email`='" . $uemail . "'");

    if ($u_detail->num_rows == 1) {
        session_abort();

        ?>
        <!doctype html>
        <html lang="en">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>BOOZEBITES New Zealand || Admin-Panel</title>
            <link rel="shortcut icon" href="../assets/img/logo-icon.ico" type="image/x-icon">

            <link rel="stylesheet" href="../admin-panel/assets-admin/css/styles.min.css" />
            <!---Icons-->
            <script src="https://kit.fontawesome.com/dfdb94433e.js" crossorigin="anonymous"></script>

            <style>
                .table-row-with-border {
                    border-bottom: 1px solid #dee2e6;
                    height: 100px !important;
                }
            </style>

            <!---Icons-->
        </head>

        <body>
            <!--  Body Wrapper -->
            <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
                data-sidebar-position="fixed" data-header-position="fixed">
                <?php

                require "side.php";

                ?>
                <!--  Main wrapper -->
                <div class="body-wrapper">
                    <!--  Header Start -->
                    <?php
                    require "nav.php";
                    ?>
                    <!--  Header End -->
                    <div class="container-fluid">

                        <div class="row">
                            <section>
                                <div class="gradient-custom-1 h-100">
                                    <div class="mask d-flex align-items-center h-100">
                                        <div class="container">

                                            <div class="row">

                                            </div>

                                            <div class="row justify-content-center">
                                                <div class="col-12 border shadow px-3 pt-4 pb-5 rounded-2">
                                                    <div class="table-responsive bg-white">
                                                        <table class="table mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col"></th>
                                                                    <th></th>
                                                                    <th scope="col">ITEM</th>
                                                                    <th scope="col">CUSTOMER</th>
                                                                    <th scope="col">DETAILS</th>
                                                                    <th scope="col">PRICE</th>
                                                                    <th scope="col">STATUS</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $order_rs = Databases::search("SELECT * FROM `orders` INNER JOIN `payment-method` ON `orders`.`payment-method` = `payment-method`.`method_id`
                                                        INNER JOIN `products` ON `products`.`product_id` = `orders`.`products_id` INNER JOIN `user` ON `user`.`email` = `orders`.`user_email`
                                                        INNER JOIN `town` ON `user`.`town` = `town`.`id` INNER JOIN `order_status` ON `orders`.`order_status` = `order_status`.`order_status_id`");
                                                                $order_num = $order_rs->num_rows;

                                                                for ($x = 0; $x < $order_num; $x++) {


                                                                    $order_data = $order_rs->fetch_assoc();
                                                                    $pid = $order_data["product_id"];
                                                                    ?>
                                                                    <tr class="table-row-with-border">
                                                                        <td>
                                                                            <?php echo $x + 1 ?>
                                                                        </td>
                                                                        <?php
                                                                        $p_img_rs = Databases::search("SELECT * FROM `product_img` WHERE `product_id` = '" . $pid . "'");
                                                                        $p_img_num = $p_img_rs->num_rows;
                                                                       
                                                                        $product_img_data = $p_img_rs->fetch_assoc();
                                                                        ?>
                                                                        <th><img src="<?php echo $product_img_data["path_code"] ?>" class="img-fluid rounded-3"
                                                                                alt="Shopping item" style="width: 65px;"></th>
                                                                        <?php

                                                                        ?>


                                                                        <th scope="row">
                                                                            <?php echo $order_data['title']; ?></br><span
                                                                                class="fs-2">SKU
                                                                                Code :
                                                                               
                                                                                <?php echo $order_data["sku_code"] ?>
                                                                            </span>
                                                                        </th>
                                                                        <td>
                                                                            <?php echo $order_data["fname"] . " " . $order_data["lname"] ?></br><span
                                                                                class="fs-2">
                                                                                <?php $order_data["user_email"] ?>
                                                                            </span>
                                                                        </td>
                                                                        <td><a class="vd-btn log-link fw-bold" id="triggerme"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#exampleModal<?php echo $order_data["order_id"] ?>">SHOW</a>
                                                                        </td>
                                                                        <td>NZD
                                                                            <?php echo number_format($order_data["total_amount"],2) ?>
                                                                        </td>
                                                                        <?php

                                                                        $status_check_rs = Databases::search("SELECT * FROM `orders` WHERE `order_id` = '" . $order_data["order_id"] . "'");
                                                                        $status_check_data = $status_check_rs->fetch_assoc();

                                                                        if ($status_check_data["order_status"] == 1) {
                                                                            ?>
                                                                            <td><a class="btn btn-warning p-1" data-bs-toggle="modal"
                                                                                    data-bs-target="#exampleModal<?php echo $x ?>3">PENDING</a>
                                                                            </td>
                                                                            <?php
                                                                        } else if ($status_check_data["order_status"] == 2) {
                                                                            ?>
                                                                                <td><a class="btn btn-warning p-1" data-bs-toggle="modal"
                                                                                        data-bs-target="#exampleModal<?php echo $x ?>3">PROCESSING</a>
                                                                                </td>
                                                                            <?php

                                                                        } else if ($status_check_data["order_status"] == 3) {
                                                                            ?>
                                                                                    <td><a class="btn btn-primary p-1" data-bs-toggle="modal"
                                                                                            data-bs-target="#exampleModal<?php echo $x ?>3">DELIVERING</a>
                                                                                    </td>
                                                                            <?php
                                                                        } else if ($status_check_data["order_status"] == 4) {
                                                                            ?>
                                                                                        <td><a class="btn btn-success p-1" data-bs-toggle="modal"
                                                                                                data-bs-target="#exampleModal<?php echo $x ?>3">DELIVERED</a>
                                                                                        </td>
                                                                            <?php
                                                                        } else if ($status_check_data["order_status"] == 5) {
                                                                            ?>
                                                                                            <td><a class="btn ub-btn p-1" data-bs-toggle="modal"
                                                                                                    data-bs-target="#exampleModal<?php echo $x ?>3">CANCELED</a>
                                                                                            </td>
                                                                            <?php
                                                                        }
                                                                        ?>


                                                                    </tr>

                                                                    <!-- status update modal -->
                                                                    <div class="modal fade" id="exampleModal<?php echo $x ?>3"
                                                                        tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-centered">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <div class="modal-title fs-4 fw-bold"
                                                                                        id="exampleModalLabel">
                                                                                    </div>
                                                                                    <button type="button" class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <div class="col-12 mb-3">
                                                                                        <div class="form-floating mb-1">
                                                                                            <select class="form-select rounded-0"
                                                                                                aria-label="Floating label select example"
                                                                                                id="statusChange<?php echo $order_data["order_id"] ?>">
                                                                                                <?php

                                                                                                $status_rs = Databases::search("SELECT * FROM `order_status`");
                                                                                                $status_num = $status_rs->num_rows;

                                                                                                $c = 0;
                                                                                                while ($c < $status_num) {

                                                                                                    $c++;

                                                                                                    $status_data = $status_rs->fetch_assoc();
                                                                                                    ?>
                                                                                                    <option
                                                                                                        value="<?php echo $status_data["order_status_id"] ?>">
                                                                                                        <?php echo $status_data["status_name"] ?>
                                                                                                    </option>
                                                                                                    <?php

                                                                                                }

                                                                                                ?>




                                                                                            </select>
                                                                                            <label for="statusChange">Change This
                                                                                                order status here.</label>
                                                                                        </div>
                                                                                        <label class="small">Warning : Please be
                                                                                            carefull when you selecting <b>
                                                                                                CANCELED
                                                                                            </b>.</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <?php

                                                                                    $oid = $order_data["order_id"];

                                                                                    ?>
                                                                                    <button type="button" class="btn x"
                                                                                        onclick="OrderStatusSave(<?php echo $oid ?>);">Save</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- status update modal end -->

                                                                    <!-- order details modal -->
                                                                    <div class="modal fade"
                                                                        id="exampleModal<?php echo $order_data["order_id"] ?>"
                                                                        tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                        data-bs-backdrop="static" data-bs-keyboard="false"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <div class="modal-title fs-4 fw-bold"
                                                                                        id="exampleModalLabel">
                                                                                        Order Details&nbsp;<i class="fa fa-archive"
                                                                                            aria-hidden="true"></i></div>
                                                                                    <button type="button" class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body pt-4">
                                                                                    <div class="card mb-0">
                                                                                        <div class="row pt-3 px-2">
                                                                                            <div class="col-12 text-end mb-3">
                                                                                                PRODUCT DETAILS
                                                                                                <hr class="m-0 mt-2">
                                                                                            </div>
                                                                                            <div
                                                                                                class="col-12 col-md-2 d-flex justify-content-center align-items-center mb-3">
                                                                                                <img src="../<?php echo $product_img_data["path_code"] ?>"
                                                                                                    class="img-fluid" width="90px"
                                                                                                    alt="" srcset="">
                                                                                            </div>
                                                                                            <div class="col-12 col-md-10">
                                                                                                <div class="row">
                                                                                                    <div class="col-6 mb-3">
                                                                                                        <div class="form-floating">
                                                                                                            <input type="text"
                                                                                                                class="form-control rounded-0"
                                                                                                                id="floatingInput"
                                                                                                                placeholder="title of the product"
                                                                                                                value="<?php echo $order_data["title"] ?>"
                                                                                                                readonly>
                                                                                                            <label
                                                                                                                for="floatingInput">Product
                                                                                                                Name</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-6 mb-3">
                                                                                                        <div class="form-floating">
                                                                                                            <input type="text"
                                                                                                                class="form-control rounded-0"
                                                                                                                id="floatingInput"
                                                                                                                placeholder="title of the product"
                                                                                                                value="<?php echo $order_data["sku_code"] ?>"
                                                                                                                readonly>
                                                                                                            <label
                                                                                                                for="floatingInput">SKU
                                                                                                                Code</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-6 mb-3">
                                                                                                        <div class="form-floating">
                                                                                                            <input type="text"
                                                                                                                class="form-control rounded-0"
                                                                                                                id="floatingInput"
                                                                                                                placeholder="title of the product"
                                                                                                                value="NZD <?php echo number_format($order_data["total_amount"],2)?>"
                                                                                                                readonly>
                                                                                                            <label
                                                                                                                for="floatingInput">Unit
                                                                                                                Price</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-6 mb-3">
                                                                                                        <div class="form-floating">
                                                                                                            <?php

                                                                                                            $productQty = $order_data["qty"];
                                                                                                            $orderQty = $order_data["order_qty"];



                                                                                                            ?>
                                                                                                            <input type="text"
                                                                                                                class="form-control rounded-0"
                                                                                                                id="floatingInput"
                                                                                                                placeholder="title of the product"
                                                                                                                value="<?php echo $productQty - $orderQty ?> Units left"
                                                                                                                readonly>
                                                                                                            <label
                                                                                                                for="floatingInput">Availability</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row pt-3 px-2">
                                                                                            <div class="col-12 text-end mb-3">
                                                                                                CUSTOMER DETAILS
                                                                                                <hr class="m-0 mt-2">
                                                                                            </div>
                                                                                            <div class="col-6 mb-3">
                                                                                                <div class="row">
                                                                                                    <div class="mb-3">
                                                                                                        <div class="form-floating">
                                                                                                            <input type="text"
                                                                                                                class="form-control rounded-0"
                                                                                                                id="floatingInput"
                                                                                                                placeholder="title of the product"
                                                                                                                value="<?php echo $order_data["fname"] . " " . $order_data["lname"] ?>"
                                                                                                                readonly>
                                                                                                            <label
                                                                                                                for="floatingInput">Customer
                                                                                                                Name</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="mb-3">
                                                                                                        <div class="form-floating">
                                                                                                            <input type="text"
                                                                                                                class="form-control rounded-0"
                                                                                                                id="floatingInput"
                                                                                                                placeholder="title of the product"
                                                                                                                value="<?php echo $order_data["mobile"] ?>"
                                                                                                                readonly>
                                                                                                            <label
                                                                                                                for="floatingInput">Mobile
                                                                                                                1</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="mb-3">
                                                                                                        <div class="form-floating">
                                                                                                            <input type="text"
                                                                                                                class="form-control rounded-0"
                                                                                                                id="floatingInput"
                                                                                                                placeholder="title of the product"
                                                                                                                value="<?php echo $order_data["mobile"] ?>"
                                                                                                                readonly>
                                                                                                            <label
                                                                                                                for="floatingInput">Mobile
                                                                                                                2</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-6 mb-3">
                                                                                                <div class="form-floating mb-3">
                                                                                                    <textarea
                                                                                                        class="form-control rounded-0"
                                                                                                        placeholder="address"
                                                                                                        readonly
                                                                                                        id="floatingTextarea2"
                                                                                                        style="height: 205px">
                                                                                            <?php echo $order_data["fname"] . " " . $order_data["lname"] ?>,
                                                                                            <?php echo $order_data["number"] ?>,
                                                                                            <?php echo $order_data["lane"] ?>,
                                                                                            <?php echo $order_data["t_name"] ?>.</textarea>
                                                                                                    <label
                                                                                                        for="floatingTextarea2">Address</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row pt-3 px-2">
                                                                                            <div class="col-12 text-end mb-3">
                                                                                                ORDER DETAILS
                                                                                                <hr class="m-0 mt-2">
                                                                                            </div>
                                                                                            <div class="col-6 mb-3">
                                                                                                <div class="form-floating">
                                                                                                    <input type="text"
                                                                                                        class="form-control rounded-0"
                                                                                                        id="floatingInput"
                                                                                                        placeholder="title of the product"
                                                                                                        value="<?php echo $order_data["order_code"] ?>"
                                                                                                        readonly>
                                                                                                    <label
                                                                                                        for="floatingInput">Invoice
                                                                                                        ID</label>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-6 mb-3">
                                                                                                <div class="form-floating">
                                                                                                    <input type="datetime-local"
                                                                                                        class="form-control rounded-0"
                                                                                                        id="floatingInput"
                                                                                                        placeholder="title of the product"
                                                                                                        value="<?php echo $order_data["date"] ?>"
                                                                                                        readonly>
                                                                                                    <label
                                                                                                        for="floatingInput">Ordered
                                                                                                        On</label>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-6 mb-3">
                                                                                                <div class="form-floating">
                                                                                                    <input type="number"
                                                                                                        class="form-control rounded-0"
                                                                                                        id="floatingInput"
                                                                                                        placeholder="title of the product"
                                                                                                        value="<?php echo $order_data["order_qty"] ?>"
                                                                                                        readonly>
                                                                                                    <label
                                                                                                        for="floatingInput">Quantity</label>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-6 mb-3">
                                                                                                <div class="form-floating">
                                                                                                    <input type="text"
                                                                                                        class="form-control rounded-0"
                                                                                                        id="floatingInput"
                                                                                                        placeholder="title of the product"
                                                                                                        value="NZD <?php echo number_format($order_data["price"],2) ?>"
                                                                                                        readonly>
                                                                                                    <label for="floatingInput">Sub
                                                                                                        Total</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <div class="col-12 mt-3 text-end">
                                                                                        <button class="btn fw-bold x">Save
                                                                                            Changes</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- order details modal end-->


                                                                    <?php
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>


                        </div>

                    </div>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
                integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
                integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
                crossorigin="anonymous"></script>
            <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
            <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
            <script src="../assets/js/sidebarmenu.js"></script>
            <script src="../assets/js/app.min.js"></script>
            <script src="../admin-panel/assets-admin/js/script.js"></script>
            <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
            <script src="../admin-panel/assets-admin/libs/jquery/dist/jquery.min.js"></script>
            <script src="../admin-panel/assets-admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
            <script src="../admin-panel/assets-admin/js/sidebarmenu.js"></script>
            <script src="../admin-panel/assets-admin/js/app.min.js"></script>
            <script src="../admin-panel/assets-admin/libs/apexcharts/dist/apexcharts.min.js"></script>
            <script src="../admin-panel/assets-admin/libs/simplebar/dist/simplebar.js"></script>
            <script src="../admin-panel/assets-admin/js/dashboard.js"></script>
            <script src="../denu.js"></script>
            <script src="../script.js"></script>

        </body>

        </html>
        <?php
    } else {
        ?>

        <script>
            alert("You Are Not an Admin");
            window.location = "authentication-login.php";
        </script>

        <?php
    }
} else {
    ?>

    <script>
        alert("You Are Not an Admin");
        window.location = "authentication-login.php";
    </script>

    <?php

}

?>