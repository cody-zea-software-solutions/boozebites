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
      <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
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

            <div class="row px-3">
              <div class="col-12 py-4 mb-3 border shadow">

                <div class="row p-2 d-flex flex-row justify-content-end">
                  <div class="col-12 col-lg-6">

                    <form action="">
                      <div class="input-group rounded border rounded-5">
                        <input type="search" class="form-control border-0 border-end" placeholder="Search by name" aria-label="Search" id="ukey" aria-describedby="search-addon" />
                        <span class="input-group-text bg-green btn border-0" onclick="SearchUser();" id="search-addon">
                          <i class="fas fa-search"></i>
                        </span>
                      </div>
                    </form>
                  </div>
                </div>

                <div class="row" id="userarea">
                  <section>
                    <div class="gradient-custom-1 h-100">
                      <div class="mask d-flex align-items-center h-100">
                        <div class="container">
                          <div class="row justify-content-center">
                            <div class="col-12">
                              <div class="table-responsive bg-white">
                                <table class="table mb-0">
                                  <thead>
                                    <tr>
                                      <th scope="col"></th>
                                      <th scope="col">FULL NAME</th>
                                      <th scope="col">EMAIL</th>
                                      <th scope="col">DETAILS</th>
                                      <th scope="col">CART</th>
                                      <th scope="col">STATUS</th>
                                    </tr>
                                  </thead>
                                  <tbody>



                                    <?php
                                    $user_rs = Databases::search("SELECT * FROM `user` INNER JOIN `town` ON `user`.`town` = `town`.`id` ");
                                    $user_num = $user_rs->num_rows;

                                    for ($i = 0; $i < $user_num; $i++) {
                                      $user_data = $user_rs->fetch_assoc();
                                      $umail = $user_data["email"];
                                    ?>
                                      <tr id="userarea">
                                        <td>
                                          <?php echo $i + 1 ?>
                                        </td>
                                        <td>
                                          <?php echo $user_data["fname"] . " " . $user_data["lname"] ?>
                                        </td>
                                        <th scope="row">
                                          <?php echo $user_data["email"] ?>
                                        </th>
                                        <td><a class="vd-btn log-link fw-bold" data-bs-toggle="modal" data-bs-target="#<?php echo $user_data["fname"] ?>">SHOW</a></td>
                                        <td><a class="cv-btn log-link fw-bold" data-bs-toggle="modal" data-bs-target="#<?php echo $user_data["email"] ?>">VIEW</a></td>
                                        <td>
                                          <?php
                                          if ($user_data["user_status"] == 1) {
                                          ?>
                                            <?php
                                            $fname = $user_data["fname"];
                                            $email = $user_data["email"];
                                            $lname = $user_data["lname"]
                                            ?>
                                            <a onclick="userblockandunblcok('BLOCK','<?php echo addslashes($fname); ?>','<?php echo addslashes($lname); ?>', '<?php echo addslashes($email); ?>');" class="btn ub-btn p-1" data-bs-toggle="modal" data-bs-target="#exampleModal3">BLOCK</a>
                                          <?php
                                          } else {
                                          ?>
                                          <?php
                                            $fname = $user_data["fname"];
                                            $email = $user_data["email"];
                                            $lname = $user_data["lname"]
                                            ?>
                                            <a class="btn ub-btn p-1" data-bs-toggle="modal" data-bs-target="#exampleModal3" onclick="userblockandunblcok('UN BLOCK','<?php echo addslashes($fname); ?>','<?php echo addslashes($lname); ?>', '<?php echo addslashes($email); ?>');">UN BLOCK</a>
                                          <?php
                                          }
                                          ?>
                                        </td>
                                      </tr>

                                      <!-- user block modal -->
                                      <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <div class="modal-title fs-4 fw-bold" id="exampleModalLabel">
                                                Warning&nbsp;&nbsp;<i class="fa fa-exclamation" aria-hidden="true"></i>
                                              </div>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                              <span id="block_fname_lname"></span>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                              <button type="button" class="btn btn-danger">Sure</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- user block modal end -->


                                      <!-- user details modal -->
                                      <div class="modal fade" id="<?php echo $user_data["fname"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <div class="modal-title fs-4 fw-bold" id="exampleModalLabel"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;
                                                Consumer Details</div>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body pt-4">
                                              <div class="card mb-0">
                                                <div class="row pt-3 px-2">
                                                  <div class="col-4 col-md-2 d-flex justify-content-center align-items-center">
                                                    <img src="../assets/img/avatar.svg" class="img-fluid" width="90px" alt="" srcset="">
                                                  </div>
                                                  <div class="col-8 col-md-10">
                                                    <div class="row">
                                                      <div class="col-12 col-md-6 mb-3">
                                                        <div class="form-floating">
                                                          <input type="text" class="form-control rounded-0" id="floatingInput" placeholder="title of the product" value="<?php echo $user_data["fname"] . " " . $user_data["lname"] ?>" readonly>
                                                          <label for="floatingInput">Full Name</label>
                                                        </div>
                                                      </div>
                                                      <div class="col-12 col-md-6 mb-3">
                                                        <div class="form-floating">
                                                          <input type="text" class="form-control rounded-0" id="floatingInput" placeholder="title of the product" value="<?php echo $user_data["mobile"] ?>" readonly>
                                                          <label for="floatingInput">Mobile</label>
                                                        </div>
                                                      </div>
                                                      <div class="col-12 mb-3">
                                                        <div class="form-floating">
                                                          <input type="text" class="form-control rounded-0" id="floatingInput" placeholder="title of the product" value="<?php echo $user_data["number"] . ", " . $user_data["lane"] . "," . $user_data["t_name"] ?>" readonly>
                                                          <label for="floatingInput">Address</label>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="modal-footer">
                                              <div class="col-12 mt-3 text-end">
                                                <button class="btn fw-bold x" data-bs-dismiss="modal">Close</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- user details modal end-->

                                      <!-- user cart modal -->
                                      <div class="modal fade" id="<?php echo $user_data["email"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <div class="modal-title fs-4 fw-bold" id="exampleModalLabel"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;
                                                <?php echo $user_data["fname"]; ?>'s Cart
                                              </div>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                              <div class="row p-1 d-flex justify-content-center">

                                                <?php

                                                $cart_rs = Databases::search("SELECT * FROM `cart` INNER JOIN `products` ON `cart`.`products_id` = `products`.`product_id`
                   WHERE `user_email` = '" . $umail . "' ");
                                                $cart_num = $cart_rs->num_rows;

                                                for ($x = 0; $x < $cart_num; $x++) {
                                                  $cart_data = $cart_rs->fetch_assoc();
                                                  $pid = $cart_data["products_id"]
                                                ?>
                                                  <?php
                                                  if ($cart_num != 0) {
                                                  ?>
                                                    <div class="card mb-3 border-bottom" style="max-width:540px;">
                                                      <div class="row g-0 mb-2">
                                                        <div class="col-md-6">
                                                          <?php

                                                          $product_img_rs = Databases::search("SELECT * FROM `product_img` WHERE `product_id` = '" . $pid . "'");
                                                          $product_img_num = $product_img_rs->num_rows;

                                                          // for ($a = 0; $a < $product_img_num; $a++) {
                                                          $product_img_data = $product_img_rs->fetch_assoc();
                                                          ?>
                                                          <img src="<?php echo $product_img_data["path_code"] ?>" class="img-fluid rounded-start" alt="...">
                                                          <?php
                                                          // }

                                                          ?>
                                                        </div>
                                                        <div class="col-md-6">
                                                          <div class="card-body">
                                                            <h5 class="card-title">
                                                              <?php echo $cart_data["title"] ?>
                                                            </h5>
                                                            <p class="card-text m-0">
                                                              SKU Code :
                                                              <?php echo $cart_data["sku_code"] ?>
                                                            </p>
                                                            <p class="card-text m-1">
                                                              NZD
                                                              <?php echo number_format($cart_data["price"] ,2) ?>
                                                            </p>
                                                            <p class="card-text">
                                                              <!-- <small class="text-muted">
                                                                Added on 01/12/2024
                                                              </small> -->
                                                            </p>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  <?php
                                                  } else {

                                                  ?>

                                                    <div class="col-12">
                                                      <span class="display-1 text-black">Products Not Found</span>
                                                    </div>
                                                  <?php
                                                  }


                                                  ?>




                                                <?php
                                                }
                                                ?>

                                              </div>
                                            </div>
                                            <div class="modal-footer">
                                              <div class="col-12 mt-3 text-end">
                                                <button class="btn fw-bold x" data-bs-dismiss="modal">Close</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- user cart modal end-->



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
        </div>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
      <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
      <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
      <script src="../assets/js/sidebarmenu.js"></script>
      <script src="../assets/js/app.min.js"></script>
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