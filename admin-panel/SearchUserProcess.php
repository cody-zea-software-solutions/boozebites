<?php
require_once "../connection.php";
session_start();

if (isset ($_GET["ukey"])) {


    $key = $_GET["ukey"];


    $user_rs = Database::search("SELECT * FROM `user` INNER JOIN `town` ON `user`.`town` = `town`.`id`  WHERE `fname` LIKE '%" . $key . "%'");
    $user_num = $user_rs->num_rows;

    if ($user_num != 0) {
        for ($i = 0; $i < $user_num; $i++) {
            $user_data = $user_rs->fetch_assoc();
            $umail = $user_data["email"];

            ?>
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



                             
                                  <tr>
                                    <td>
                                      <?php echo $i + 1 ?>
                                    </td>
                                    <td>
                                      <?php echo $user_data["fname"] . " " . $user_data["lname"] ?>
                                    </td>
                                    <th scope="row">
                                      <?php echo $user_data["email"] ?>
                                    </th>
                                    <td><a class="vd-btn log-link fw-bold" data-bs-toggle="modal"
                                        data-bs-target="#<?php echo $user_data["fname"] ?>">SHOW</a></td>
                                    <td><a class="cv-btn log-link fw-bold" data-bs-toggle="modal"
                                        data-bs-target="#<?php echo $user_data["email"] ?>">VIEW</a></td>
                                    <td><a class="btn ub-btn p-1" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal3">BLOCK</a></td>
                                  </tr>



                                  <!-- user details modal -->
                                  <div class="modal fade" id="<?php echo $user_data["fname"] ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <div class="modal-title fs-4 fw-bold" id="exampleModalLabel"><i
                                              class="fa fa-users" aria-hidden="true"></i>&nbsp;
                                            Consumer Details</div>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body pt-4">
                                          <div class="card mb-0">
                                            <div class="row pt-3 px-2">
                                              <div
                                                class="col-4 col-md-2 d-flex justify-content-center align-items-center">
                                                <img src="../assets/img/avatar.svg" class="img-fluid" width="90px" alt=""
                                                  srcset="">
                                              </div>
                                              <div class="col-8 col-md-10">
                                                <div class="row">
                                                  <div class="col-12 col-md-6 mb-3">
                                                    <div class="form-floating">
                                                      <input type="text" class="form-control rounded-0" id="floatingInput"
                                                        placeholder="title of the product"
                                                        value="<?php echo $user_data["fname"] . " " . $user_data["lname"] ?>"
                                                        readonly>
                                                      <label for="floatingInput">Full Name</label>
                                                    </div>
                                                  </div>
                                                  <div class="col-12 col-md-6 mb-3">
                                                    <div class="form-floating">
                                                      <input type="text" class="form-control rounded-0" id="floatingInput"
                                                        placeholder="title of the product"
                                                        value="<?php echo $user_data["mobile"] ?>" readonly>
                                                      <label for="floatingInput">Mobile</label>
                                                    </div>
                                                  </div>
                                                  <div class="col-12 mb-3">
                                                    <div class="form-floating">
                                                      <input type="text" class="form-control rounded-0" id="floatingInput"
                                                        placeholder="title of the product"
                                                        value="<?php echo $user_data["number"] . ", " . $user_data["lane"] . "," . $user_data["t_name"] ?>"
                                                        readonly>
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
                                  <div class="modal fade" id="<?php echo $user_data["email"] ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <div class="modal-title fs-4 fw-bold" id="exampleModalLabel"><i
                                              class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;
                                            <?php echo $user_data["fname"]; ?>'s Cart
                                          </div>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
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

                                                      for ($a = 0; $a < $product_img_num; $a++) {
                                                        $product_img_data = $product_img_rs->fetch_assoc();
                                                        ?>
                                                        <img src="../<?php echo $product_img_data["path_code"] ?>"
                                                          class="img-fluid rounded-start" alt="...">
                                                        <?php
                                                      }

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
                                                          <?php echo $cart_data["price"] / 100 ?>.00
                                                        </p>
                                                        <p class="card-text">
                                                          <small class="text-muted">
                                                            Added on 01/12/2024
                                                          </small>
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

                                  <!-- user block modal -->
                                  <div class="modal fade" id="exampleModal3" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <div class="modal-title fs-4 fw-bold" id="exampleModalLabel">
                                            Warning&nbsp;&nbsp;<i class="fa fa-exclamation" aria-hidden="true"></i>
                                          </div>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          <span>Do you really want to block <b>Denuwan Kawshalya</b> ?</span>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">No</button>
                                          <button type="button" class="btn btn-danger">Sure</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- user block modal end -->

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
            <?php
        }else{
          echo "User Not Found";
        }
    } else {
     echo "Please Try Again";
    }





?>