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
                <div class="mb-1"><span class="h4 mb-9 fw-semibold">Add new Product&nbsp;&nbsp;<i class="fa fa-plus-circle"
                      aria-hidden="true"></i></span>
                </div>
                <div><span class="mb-9 text-dark-emphasis">You can add new product here</span>
                </div>
              </div>
              <div class="col-12 col-lg-9 border shadow">
                <div class="row m-3">
                  <div class="col-12 mt-3">
                    <div class="form-floating">
                      <input type="text" class="form-control rounded-0" id="title" placeholder="title of the product">
                      <label for="title">Product Title</label>
                    </div>
                  </div>
                  <div class="col-6 mt-3">
                    <div class="form-floating">
                      <select class="form-select rounded-0" id="category" aria-label="Floating label select example">
                        <option selected>Select product category</option>
                        <?php

                        $category_rs = Databases::search("SELECT * FROM `category`");
                        $category_num = $category_rs->num_rows;

                        for ($i = 0; $i < $category_num; $i++) {
                          $category_data = $category_rs->fetch_assoc();
                          ?>
                          <option value="<?php echo $category_data["category_id"] ?>">
                            <?php echo $category_data["name"] ?>
                          </option>
                          <?php
                        }

                        ?>


                      </select>
                      <label for="floatingSelect">Select your product category here</label>
                    </div>

                    <button class="btn x rounded-0 mt-2 d-grid col-12" data-bs-toggle="modal"
                      data-bs-target="#exampleModal">Add New Category</button>

                    <!--Add New Category Modal-->

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                      aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fa fa-plus-circle"
                                aria-hidden="true"></i> Add New Category</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="col-12">
                              <div class="form-floating">
                                <input type="text" class="form-control rounded-0" id="cname"
                                  placeholder="title of the product">
                                <label for="cname">Category Name</label>
                              </div>
                            </div>


                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn x" onclick="AddCategory();"><i class="fa fa-plus-circle"
                                aria-hidden="true"></i> Add</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--Add New Category Modal-->
                  </div>

                  <div class="col-6 mt-3" id="inputset">
                    <div class="input-group">
                      <span class="input-group-text">NZD</span>
                      <div class="form-floating is-invalid">
                        <input type="text" class="form-control" id="price" placeholder="Enter Amount" required>
                        <label for="price">Product Price</label>
                      </div>
                      <span class="input-group-text">.00</span>
                    </div>
                  </div>

                  <div class="col-6 mt-3">
                    <div class="form-floating">
                      <select class="form-select rounded-0" aria-label="Floating label select example" id="weight">
                        <option selected>Select Product Weight</option>
                        <?php

                        $weight_rs = Databases::search("SELECT * FROM `weight`");
                        $weight_num = $weight_rs->num_rows;

                        for ($i = 0; $i < $weight_num; $i++) {

                          $weight_data = $weight_rs->fetch_assoc();
                          ?>
                          <option value="<?php echo $weight_data["id"] ?>">
                            <?php echo $weight_data["Amount"] ?> Kg
                          </option>
                          <?php
                        }

                        ?>
                      </select>
                      <label for="floatingSelect">Select Product Weight (*Optional*)</label>
                    </div>

                    <button class="btn x rounded-0 mt-2 d-grid col-12" data-bs-toggle="modal"
                      data-bs-target="#weightModal">Add New Weight</button>

                    <!--Add Weight Modal-->

                    <div class="modal fade" id="weightModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                      aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fa fa-plus-circle"
                                aria-hidden="true"></i> Add New Weight</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="col-12">
                              <div class="form-floating">
                                <input type="text" class="form-control rounded-0" id="wname"
                                  placeholder="title of the product">
                                <label for="wname">Weight (Kg)</label>
                              </div>
                            </div>


                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn x" onclick="AddWeight();"><i class="fa fa-plus-circle"
                                aria-hidden="true"></i> Add</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--Add Weight Modal-->
                  </div>


                  <div class="col-6 mt-3">
                    <div class="form-floating">
                      <input type="text" class="form-control rounded-0" id="sku" placeholder="SKU Code">
                      <label for="sku">Product SKU Code</label>
                    </div>
                  </div>
                  <div class="col-6 mt-3">
                    <div class="form-floating">
                      <input type="text" class="form-control rounded-0" id="qty" placeholder="Product Qty">
                      <label for="qty">Product Qty</label>
                    </div>
                  </div>

                  <div class="col-6 mt-3">
                    <div class="form-floating">
                      <select class="form-select rounded-0" aria-label="Floating label select example" id="stock">
                        <?php

                        $stock_rs = Databases::search("SELECT * FROM `stock`");
                        $stock_num = $stock_rs->num_rows;

                        for ($a = 0; $a < $stock_num; $a++) {

                          $stock_data = $stock_rs->fetch_assoc();
                          ?>
                          <option value="<?php echo $stock_data["stock_id"] ?>">
                            <?php echo $stock_data["status_name"] ?>
                          </option>
                          <?php
                        }

                        ?>
                      </select>
                      <label for="floatingSelect">Select Product Status</label>
                    </div>
                  </div>
                  <div class="col-12 mt-3">
                    <div class="form-floating">
                      <select class="form-select rounded-0" aria-label="Floating label select example" id="solution">
                        <?php

                        $s_rs = Databases::search("SELECT * FROM `solutions`");
                        $s_num = $s_rs->num_rows;

                        for ($a = 0; $a < $s_num; $a++) {

                          $s_data = $s_rs->fetch_assoc();
                          ?>
                          <option value="<?php echo $s_data["solution_id"] ?>">
                            <?php echo $s_data["solution_name"] ?>
                          </option>
                          <?php
                        }

                        ?>
                      </select>
                      <label for="floatingSelect">Select Product Solution Type</label>
                    </div>
                  </div>

                  <div class="col-12 mt-3">
                    <div class="form-floating">
                      <textarea class="form-control rounded-0" placeholder="Short Description" id="sd"
                        style="height: 100px"></textarea>
                      <label for="sd">Short Description</label>
                    </div>
                  </div>

                  <div class="col-12 mt-3 mb-3">
                    <textarea class="form-control rounded-0" placeholder="Product Description" id="description"
                      style="height: 100px"></textarea>
                  </div>

                  <div class="col-12 mb-3">
                    <div class="row d-flex justify-content-center">
                      <div class="col-8 col-md-4 mb-2" style="height: 200px;">
                        <input type="file" class="d-none" id="img_input_1">
                        <div class="border-x log-link d-flex justify-content-center align-items-center h-100 outer-div"
                          onclick="tProductImage(1);"><span class="small" id="img_span_1">Main Image</span>
                          <img src="" class="img-fluid" id="img_div_1">
                        </div>
                      </div>
                      <div class="col-8 col-md-4  mb-2" style="height: 200px;">
                        <input type="file" class="d-none" id="img_input_2">
                        <div class="border-x log-link d-flex justify-content-center align-items-center h-100"
                          onclick="tProductImage(2);"><span class="small" id="img_span_2">Sub Image</span>
                          <img src="" class="img-fluid" id="img_div_2">
                        </div>
                      </div>
                      <div class="col-8 col-md-4 mb-2" style="height: 200px;">
                        <input type="file" class="d-none" id="img_input_3">
                        <div class="border-x log-link d-flex justify-content-center align-items-center h-100"
                          onclick="tProductImage(3);"><span class="small" id="img_span_3">Sub Image</span>
                          <img src="" class="img-fluid" id="img_div_3">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 text-end">
                    <button class="btn rounded-1 fw-bold x col-md-2" onclick="addProduct();"><i class="fa fa-plus-circle"
                        aria-hidden="true"></i>
                      ADD</button>
                  </div>
                </div>
              </div>
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
      <!-- Include jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

      <!-- Include CKEditor library -->
      <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>



      <script src="../script.js"></script>
      <script src="../denu.js"></script>
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