<?php

require_once 'connection.php';

// Check if the form data is received via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     // Sanitize input data (for security)
     $search = isset($_POST['search']) ? htmlspecialchars($_POST['search']) : '';
     $meatTypes = isset($_POST['meatTypes']) ? json_decode($_POST['meatTypes']) : [];
     $cookTypes = isset($_POST['cookTypes']) ? json_decode($_POST['cookTypes']) : [];
     // $boxTypes = isset($_POST['boxTypes']) ? json_decode($_POST['boxTypes']) : [];
     $minPrice = isset($_POST['minPrice']) ? (float)$_POST['minPrice'] : 0;
     $maxPrice = isset($_POST['maxPrice']) ? (float)$_POST['maxPrice'] : 0;
     $sortOption = isset($_POST['sort']) ? $_POST['sort'] : '';

     $query = "SELECT * FROM `product`";
     $conditions = ["`on_delete`='0'"];

     if (!empty($search)) {
          $conditions[] = "`product_name` LIKE '%$search%'";
     }
     if (!empty($minPrice)) {
          $pricequery = "SELECT `product_product_id` FROM price_table WHERE `price` >= $maxPrice";
          $result = Database::Search($pricequery);
          $product_ids = [];
          while ($row = $result->fetch_assoc()) {
               $product_ids[] = $row['product_product_id'];
          }
          if (!empty($product_ids)) {
               $product_ids_str = implode(',', $product_ids);
               $conditions[] = "`product_id` IN ($product_ids_str)";
          } else {
               $conditions[] = "`product_id` IN (0)";
          }
     }

     if (!empty($maxPrice)) {
          $pricequery = "SELECT `product_product_id` FROM price_table WHERE `price` <= $maxPrice";
          $result = Database::Search($pricequery);
          $product_ids = [];
          while ($row = $result->fetch_assoc()) {
               $product_ids[] = $row['product_product_id'];
          }
          if (!empty($product_ids)) {
               $product_ids_str = implode(',', $product_ids);
               $conditions[] = "`product_id` IN ($product_ids_str)";
          } else {
               $conditions[] = "`product_id` IN (0)";
          }
     }

     if (!empty($meatTypes)) {
          $meatTypesConditions = array_map(function($type) {
              return "`meat_type_id` = " . intval($type);
          }, $meatTypes);
          $conditions[] = "(" . implode(" OR ", $meatTypesConditions) . ")";
      }
      
      if (!empty($cookTypes)) {
          $cookTypesConditions = array_map(function($type) {
              return "`cook_type_id` = " . intval($type);
          }, $cookTypes);
          $conditions[] = "(" . implode(" OR ", $cookTypesConditions) . ")";
      }
      

     if (count($conditions) > 0) {
          $query .= " WHERE " . implode(" AND ", $conditions);
     }


     switch ($sortOption) {
          case 'high-to-low':
               $query .= "ORDER BY (SELECT MIN(price) 
                      FROM price_table 
                      WHERE product_product_id = product.product_id) DESC";
               break;
          case 'low-to-high':
               $query .= "ORDER BY (SELECT MIN(price) 
                      FROM price_table 
                      WHERE product_product_id = product.product_id) ASC";
               break;
     }
     $product_rs = Database::search($query);
     $results_num = $product_rs->num_rows;
     $product_num = $product_rs->num_rows;
     for ($i = 0; $i < $product_num; $i++) {
          $results_data = $product_rs->fetch_assoc();
          // echo $results_data["product_name"];
          $product_img = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $results_data['product_id'] . "'");
          $product_img_num = $product_img->num_rows;
          if ($product_img_num != 0) {
               $pimg = $product_img->fetch_assoc();
               $img = $pimg['product_img_path'];
          } else {
               $img = "assets/images/dishes/dish12.png";
          }
?>
          <div class="col-xl-4 col-sm-6" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
               <div class="product-item-two">
                    <div class="image">
                         <img src="<?php echo $img ?>" alt="Dish">
                    </div>
                    <div class="content">
                         <!-- <div class="ratting">
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <span>(5k)</span>
                         </div> -->
                         <h5><a   onclick="singlepr(<?php echo $results_data['product_id']; ?>);"><?php echo $results_data["product_name"] ?></a></h5>
                         <?php
                         $price = Database::Search("SELECT * FROM price_table WHERE `box_type_box_type_id`='1' AND `product_product_id`='" . $results_data["product_id"] . "' ");
                         $price_row = $price->num_rows;
                         if ($price_row != 0) {
                              $price_data = $price->fetch_assoc();
                         ?>
                              <span class="price"><del><?php echo "$" . "" . $price_data["price"] + 50; ?></del><?php echo "$" . "" . $price_data["price"]; ?></span>
                              <?php
                              $box = Database::Search("SELECT * FROM box_type WHERE `box_type_id`='1'");
                              $box_data = $box->fetch_assoc();
                              ?>
                              <br>
                              <p><?php echo $box_data["box_type_name"] ?></p>
                         <?php
                         } else {
                              echo "no price available";
                         }
                         ?>
                    </div>
                    <a onclick="singlepr(<?php echo $results_data['product_id']; ?>);" class="theme-btn">Buy Now<i class="far fa-arrow-alt-right"></i></a>
               </div>
          </div>
<?php
     }
}
