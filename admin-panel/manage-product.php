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
    <link rel="shortcut icon" href="../assets/img/logo-icon.ico" type="image/x-icon">

    <link rel="stylesheet" href="../admin-panel/assets-admin/css/styles.min.css" />
    <!---Icons-->
    <script src="https://kit.fontawesome.com/dfdb94433e.js" crossorigin="anonymous"></script>
    <!---Icons-->
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
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
                <div class="row mb-5 d-flex justify-content-end">
                    <div class="col-5 mt-3">
                        <div class="input-group">
                            <input class="form-control border rounded-pill rounded-end-0" id="pkey"
                                placeholder="search by name">
                            <button class="btn border rounded-pill rounded-start-0" onclick="SearchProduct();"
                                type="button" id="button-addon2"><i class="fa fa-search fs-4"></i></button>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center" id="ProductResult">
                    <?php
                    $product_rs = Databases::search("SELECT * FROM `products`
                  
                      INNER JOIN `category` ON `products`.`category_id` = `category`.`category_id`
                      INNER JOIN `stock` ON `stock`.`stock_id` = `products`.`stock_id` WHERE `status` = 1 AND `on_delete`='0' ");
                    $product_num = $product_rs->num_rows;



                    for ($x = 0; $x < $product_num; $x++) {

                        $product_data = $product_rs->fetch_assoc();

                        $img_q=Database::search("SELECT * FROM `product_img` WHERE `product_id`='".$product_data["product_id"]."'");
                        if ($img_q->num_rows >= 1) {
                            $img_d = $img_q->fetch_assoc();
                            $img = $img_d["path_code"];
                        } else {
                            $img = null;
                        }

                        // $price = { () $product_data["price"] + 5% }
                    
                        ?>
                        <div class="col-sm-6 col-xl-3">
                            <div class="card overflow-hidden rounded-2">
                                <div class="position-relative p-4 d-flex flex-row align-items-center" style="height:12rem;">
                                    <a href="javascript:void(0)"><img src="<?php echo $img ?>"
                                            class="card-img-top rounded-0" alt="..."></a>
                                    <a href="javascript:void(0)"
                                        class="bg-green rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3"
                                        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i
                                            class="ti ti-basket fs-4"></i></a>
                                </div>
                                <div class="card-body pt-3 p-4">
                                    <h6 class="fw-semibold fs-4">
                                        <?php echo $product_data['title'] ?>
                                    </h6>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h6 class="fw-semibold fs-4 mb-0">
                                            <?php echo number_format($product_data['price'],2) ?><span
                                                class="ms-2 fw-normal text-muted fs-3"><del>
                                                    <?php echo number_format($product_data["price"] * 2,2) ?>
                                                </del></span>
                                        </h6>
                                        <ul class="list-unstyled d-flex align-items-center mb-0">
                                            <li><a class="me-1" href="javascript:void(0)"><i
                                                        class="fa fa-star text-warning"></i></a></li>
                                            <li><a class="me-1" href="javascript:void(0)"><i
                                                        class="fa fa-star text-warning"></i></a></li>
                                            <li><a class="me-1" href="javascript:void(0)"><i
                                                        class="fa fa-star text-warning"></i></a></li>
                                            <li><a class="me-1" href="javascript:void(0)"><i
                                                        class="fa fa-star text-warning"></i></a></li>
                                            <li><a class="me-1" href="javascript:void(0)"><i
                                                        class="fa fa-star-o text-warning"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="d-flex justify-content-end mt-2">
                                        <button class="btn tex-g p-1 mx-1 rounded-0-5" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal<?php echo $product_data["product_id"] ?>">UPDATE</button>
                                            <?php 
                                            $productid = $product_data["product_id"];
                                            ?>
                                        <button onclick="Deleteproduct(<?php echo $productid ; ?>);" class="btn tex-r p-1 rounded-0-5" data-bs-toggle="modalh"
                                            data-bs-target="#exampleModalx">DELETE</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Update product popup -->
                        <div class="modal fade" id="exampleModal<?php echo $product_data["product_id"] ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="modal-title fs-4 fw-bold" id="exampleModalLabel"><i class="fa fa-list"
                                                aria-hidden="true"></i>&nbsp;
                                            Product Management</div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row d-flex justify-content-center my-2">
                                            <div class="col-12 col-lg-9 border shadow">
                                                <div class="row m-3">
                                                    <div class="col-12 mt-3">
                                                        <input type="file" class="form-control d-none" id="newsFileInput">
                                                        <div class="row d-flex justify-content-center">

                                                            <?php
                                                            $img_q->data_seek(0);
                                                            for($y=1;$y<=$img_q->num_rows;$y++){
                                                                
                                                                    $img_dd = $img_q->fetch_assoc();
                                                                    $uimg = $img_dd["path_code"];
                                                                    ?>
                                                                    <div class="col-8 col-md-4 mb-2" style="height: 200px;">
                                                                <input type="file" class="d-none" id="img_update_<?php echo $product_data["product_id"]; echo $y ?>">

                                                                <div class="border-x log-link d-flex justify-content-center align-items-center h-100"
                                                                    onclick="tUpdateImage(<?php echo $product_data["product_id"]; ?><?php echo $y ?>);"><span class="small d-none"
                                                                        id="update_span_<?php echo $product_data["product_id"]; echo $y ?>">Image</span>
                                                                    <img src="<?php echo $uimg ?>" class="img-fluid h-100" id="update_div_<?php echo $product_data["product_id"]; echo $y ?>">
                                                                </div>
                                                            </div>
                                                                    <?php
                                                            }
                                                            for($y=$img_q->num_rows+1;$y<=3;$y++){
                                                                    ?>
                                                                    <div class="col-8 col-md-4 mb-2" style="height: 200px;">
                                                                <input type="file" class="d-none" id="img_update_<?php echo $product_data["product_id"]; echo $y ?>">

                                                                <div class="border-x log-link d-flex justify-content-center align-items-center h-100"
                                                                    onclick="tUpdateImage(<?php echo $product_data["product_id"]; ?><?php echo $y ?>);"><span class="small"
                                                                        id="update_span_<?php echo $product_data["product_id"]; echo $y ?>">Image <?php echo $y ?></span>
                                                                    <img src="" class="img-fluid h-100" id="update_div_<?php echo $product_data["product_id"]; echo $y ?>">
                                                                </div>
                                                            </div>
                                                                    <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-3 mt-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control rounded-0"
                                                                id="<?php echo $product_data["product_id"]; ?>sku" placeholder="title of the product"
                                                                value="<?php echo $product_data['sku_code'] ?>">
                                                            <label for="floatingInput">SKU Code</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-9 mt-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control rounded-0"
                                                                id="<?php echo $product_data["product_id"]; ?>pt"
                                                                value="<?php echo $product_data["title"] ?>"
                                                                placeholder="title of the product">
                                                            <label for="floatingInput">Product Title</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mt-3">
                                                        <div class="form-floating">
                                                            <select class="form-select rounded-0" id="<?php echo $product_data["product_id"]; ?>pc"
                                                                aria-label="Floating label select example">
                                                                <option selected value="<?php echo $product_data["category_id"] ?>">
                                                                    <?php echo $product_data["name"] ?>
                                                                </option>
                                                                <?php
                                                                $category_rs = Databases::search("SELECT * FROM `category`");
                                                                $category_num = $category_rs->num_rows;
                                                                for ($i = 0; $i < $category_num; $i++) {
                                                                    $category_data = $category_rs->fetch_assoc();
                                                                    ?>
                                                                    <option value="<?php echo $category_data["category_id"]?>"><?php echo $category_data["name"] ?></option>
            
                                                                    <?php
                                                                }
                                                                ?>

                                                            </select>
                                                            <label for="floatingSelect">Select your product category
                                                                here</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mt-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control rounded-0"
                                                                id="<?php echo $product_data["product_id"]; ?>pp" value="<?php echo number_format($product_data["price"] ,2)?>" placeholder="title of the product">
                                                            <label for="floatingInput">Price in NZD</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-6 mt-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control rounded-0"
                                                                id="<?php echo $product_data["product_id"]; ?>pq" value="<?php echo $product_data["qty"]?>" placeholder="title of the product">
                                                            <label for="floatingInput">Quantity</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-6 mt-3">
                                                        <div class="form-floating">
                                                            <select class="form-select rounded-0" id="<?php echo $product_data["product_id"]; ?>ps"
                                                                aria-label="Floating label select example">
                                                                <?php
                                                                $stock_rs = Databases::search("SELECT * FROM `stock`");
                                                                $stock_num = $stock_rs->num_rows;
                                                                for ($i=0; $i < $stock_num; $i++) { 
                                                                    $stock_data = $stock_rs->fetch_assoc();
                                                                   ?>
                                                                    <option value="<?php echo $stock_data['stock_id'] ?>" <?php if($stock_data['stock_id']==$product_data["stock_id"]){ echo "selected"; } ?> ><?php echo $stock_data["status_name"] ?></option>
                                                                   <?php
                                                                }
                                                                ?>
                                                               
                                                               
                                                            </select>
                                                            <label for="floatingSelect">Stock Status</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 mt-3">
                                                        <div class="form-floating">
                                                            <textarea class="form-control rounded-0"
                                                                placeholder="Short Description" id="<?php echo $product_data["product_id"]; ?>psd"
                                                                style="height: 100px"><?php echo $product_data["short_desc"] ?></textarea>
                                                            <label for="floatingTextarea">Short Description</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 mt-3 mb-3">
                                                        <textarea class="form-control rounded-0"
                                                            placeholder="Product Description" id="pld<?php echo $product_data['product_id'] ?>"
                                                            style="height: 100px"><?php  echo $product_data["description"] ?></textarea>
                                                    </div>
                                                    <div class="col-12 text-end">
                                                        <button class="btn rounded-1 fw-bold x col-md-2" onclick="update_product(<?php  echo $product_data['product_id'] ?>)"><i
                                                                class="fa fa-floppy-o" aria-hidden="true"></i>
                                                            SAVE</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Update product popupend -->

                        <!-- delete product modal -->
                        <div class="modal fade" id="exampleModalx" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="modal-title fs-4 fw-bold" id="exampleModalLabel">Warning&nbsp;&nbsp;<i
                                                class="fa fa-exclamation" aria-hidden="true"></i>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <span>Do you really want to delete <b>Coir peat-5Kg</b> ?</span>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn x rounded-0-5" data-bs-dismiss="modal">No</button>
                                        <button type="button" class="btn ub-btn">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- delete product modal end -->

           

                        <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.tiny.cloud/1/v6ya2mxbd70fn22v774qp5fw78t114ccnejem2vy8oriyj04/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        // Wait for the document to be ready
        document.addEventListener("DOMContentLoaded", function () {
          // Initialize TinyMCE with API key
          tinymce.init({
            selector: 'textarea',
            apiKey: 'v6ya2mxbd70fn22v774qp5fw78t114ccnejem2vy8oriyj04', // Replace 'YOUR_API_KEY_HERE' with your actual API key
            plugins: 'autosave autolink lists link',
            toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright | bullist numlist | link',
            menubar: false,
          });
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
          <!-- Include jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

      
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