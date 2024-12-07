<?php

session_start();
if (isset($_SESSION["a"])) {

    include "db.php";

    $uemail = $_SESSION["a"]["user_name"];

    $u_detail = Databases::search("SELECT * FROM `admin` WHERE `user_name`='" . $uemail . "'");

    if ($u_detail->num_rows == 1) {
        session_abort();

        ?>
        <!doctype html>
        <html lang="en">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>CEYNAP New Zealand || Admin-Panel</title>
            <link rel="shortcut icon" type="image/png" href="../admin-panel/assets-admin/images/logos/ceynap_logo.webp" />
            <link rel="stylesheet" href="../admin-panel/assets-admin/css/styles.min.css" />

            <!---Icons-->
            <script src="https://kit.fontawesome.com/dfdb94433e.js" crossorigin="anonymous"></script>

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
                        <div class="row d-flex justify-content-center">
                            <div class="col-12 text-center mb-3">
                                <div class="mb-1"><span class="h4 mb-9 fw-semibold">Manage Discounts&nbsp;&nbsp;<i
                                            class="fa fa-money" aria-hidden="true"></i></span>
                                </div>
                                <div><span class="mb-9 text-dark-emphasis">You can manage product dicounts here</span>
                                </div>
                            </div>

                            <div class="col-12 col-lg-9 border shadow">

                                <div class="row m-3">
                                    <div class="col-12 text-center mt-3">
                                        <span class="fw-500 fw-bold">Discount per amount</span>
                                    </div>

                                    <div class="col-6 mt-3">
                                        <div class="form-floating">
                                            <select class="form-select rounded-0" id="product"
                                                aria-label="Floating label select example">
                                                <option selected>Select Product</option>
                                                <?php

                                                $product_rs = Databases::search("SELECT * FROM `products` WHERE `on_delete`= 0");
                                                $product_num = $product_rs->num_rows;

                                                for ($i = 0; $i < $product_num; $i++) {
                                                    $product_data = $product_rs->fetch_assoc();
                                                    ?>
                                                    <option value="<?php echo $product_data["product_id"] ?>">
                                                        <?php echo $product_data["sku_code"];
                                                        echo " || ";
                                                        echo $product_data["title"] ?>
                                                    </option>
                                                    <?php
                                                }

                                                ?>
                                            </select>
                                            <label for="floatingSelect">Select your product here</label>
                                        </div>
                                    </div>

                                    <div class="col-6 mt-3">
                                        <div class="form-floating">
                                            <input type="number" class="form-control rounded-0" id="qty"
                                                placeholder="qty of the product">
                                            <label for="price">Quantity</label>
                                        </div>
                                    </div>

                                    <div class="col-6 mt-3">
                                        <div class="form-floating">
                                            <select class="form-select rounded-0" id="unit" onchange="SetInput();"
                                                aria-label="Floating label select example">
                                                <?php

                                                $unit_rs = Databases::search("SELECT * FROM `units`");
                                                $unit_num = $unit_rs->num_rows;

                                                for ($i = 0; $i < $unit_num; $i++) {
                                                    $unit_data = $unit_rs->fetch_assoc();
                                                    ?>
                                                    <option value="<?php echo $unit_data["unit_id"] ?>">
                                                        <?php echo $unit_data["unit_name"];
                                                        ?>
                                                    </option>
                                                    <?php
                                                }

                                                ?>
                                            </select>
                                            <label for="floatingSelect">Select your product here</label>
                                        </div>
                                    </div>

                                    <div class="col-6 mt-3" id="inputset">
                                        <div class="input-group">
                                            <span class="input-group-text">NZD</span>
                                            <div class="form-floating is-invalid">
                                                <input type="text" class="form-control" id="discount1"
                                                    placeholder="Enter Amount" required>
                                                <label for="discount1">Discount</label>
                                            </div>
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>

                                    <div class="col-12 mt-3 text-end">
                                        <button class="btn col-4 x rounded-0 mb-2" onclick="AddBulkDiscount();">Add</button>
                                    </div>

                                    <div class="col-12">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-8 col-md-6 mt-3">
                                                <div class="form-floating">
                                                    <select class="form-select rounded-0" id="select_am"
                                                        aria-label="Floating label select example">
                                                        <option value="0">Discount</option>
                                                        <?php

                                                        $unit_rs = Databases::search("SELECT discount.* , products.sku_code , `units`.`unit_name` FROM discount
                                                        INNER JOIN products ON products.product_id=discount.product_id
                                                        INNER JOIN `units` ON `units`.`unit_id`=`discount`.`unit_id`");
                                                        $unit_num = $unit_rs->num_rows;

                                                        for ($i = 0; $i < $unit_num; $i++) {
                                                            $unit_data = $unit_rs->fetch_assoc();
                                                            ?>
                                                            <option value="<?php echo $unit_data["discount_id"] ?>">
                                                                <?php echo $unit_data["sku_code"]." * ".$unit_data["qty"]." ".$unit_data["unit_name"]." - ( ".$unit_data["discount_price"]." )";
                                                                ?>
                                                            </option>
                                                            <?php
                                                        }

                                                        ?>
                                                    </select>
                                                    <label for="select_am">Select discount here</label>
                                                </div>
                                            </div>
                                            <div class="col-4 col-md-2 mt-3 d-flex flex-column justify-content-center">
                                                <button class="btn ub-btn rounded-0 mb-2" onclick="deleteDIS1();">Delete</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <hr class="mt-3">
                                <div class="row m-3">
                                    <div class="col-12 text-center mt-3">
                                        <span class="fw-500 fw-bold">Single item discount</span>
                                    </div>

                                    <div class="col-12">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-8 col-md-6 mt-3">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control rounded-0" id="discount2"
                                                        placeholder="discount">
                                                    <label for="discount2">Discount</label>
                                                </div>
                                            </div>
                                            <div class="col-4 col-md-2 mt-3 d-flex flex-column justify-content-center">
                                                <button class="btn x rounded-0 mb-2" onclick="AddSingleDiscount();">Add</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-8 col-md-6 mt-3">
                                                <div class="form-floating">
                                                    <select class="form-select rounded-0" id="select_sd"
                                                        aria-label="Floating label select example">
                                                        <option value="0">Discount</option>
                                                        <?php

                                                        $unit_rs = Databases::search("SELECT discount.* , products.sku_code , `units`.`unit_name` FROM discount
                                                        INNER JOIN products ON products.product_id=discount.product_id
                                                        INNER JOIN `units` ON `units`.`unit_id`=`discount`.`unit_id` WHERE `discount`.`qty`=1");
                                                        $unit_num = $unit_rs->num_rows;

                                                        for ($i = 0; $i < $unit_num; $i++) {
                                                            $unit_data = $unit_rs->fetch_assoc();
                                                            ?>
                                                            <option value="<?php echo $unit_data["discount_id"] ?>">
                                                                <?php echo $unit_data["sku_code"]." * ".$unit_data["qty"]." ".$unit_data["unit_name"]." - ( ".$unit_data["discount_price"]." )";
                                                                ?>
                                                            </option>
                                                            <?php
                                                        }

                                                        ?>
                                                    </select>
                                                    <label for="select_sd">Select discount here</label>
                                                </div>
                                            </div>
                                            <div class="col-4 col-md-2 mt-3 d-flex flex-column justify-content-center">
                                                <button class="btn ub-btn rounded-0 mb-2" onclick="deleteDIS2();">Delete</button>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="mt-3">
                                </div>

                                <div class="row m-3 mb-5">
                                    <div class="col-12 text-center mt-3">
                                        <span class="fw-500 fw-bold">Tax calculator</span>
                                    </div>

                                    <div class="col-12">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-8 col-md-6 mt-3">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control rounded-0" id="tax"
                                                        placeholder="tax">
                                                    <label for="tax">Tax amount</label>
                                                </div>
                                            </div>
                                            <div class="col-4 col-md-2 mt-3 d-flex flex-column justify-content-center">
                                                <button class="btn x rounded-0 mb-2" onclick="Addtax();">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
            <script>
                ClassicEditor
                    .create(document.querySelector('#floatingTextarea2'))
                    .then(editor => {
                        console.log(editor);
                    })
                    .catch(error => {
                        console.error(error);
                    });
            </script>
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

            <script src="../script.js"></script>
            <script src="../denu.js"></script>
            <script src="../M.js"></script>
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