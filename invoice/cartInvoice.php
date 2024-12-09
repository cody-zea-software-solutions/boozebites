<?php
session_start();
require "../connection.php";
if (!isset($_SESSION["u"])) {

  $umail = "user@gmail.com";
  if (!isset($_GET["coupon_id"])) {
    $cid = $_GET["coupon_id"];
  }


  require '../vendor/autoload.php';
  $stripe = new \Stripe\StripeClient('sk_test_51OmXPbEXnEGngP01xcch1UHJMAO9Vj18MULj8dhUO68gAlIU3IXr0Ibwq5IODHWUBdfAr54Avo72jL2ipzcVvLJ900PlKAkdcK');


  $session = $stripe->checkout->sessions->retrieve($_GET['session_id']);
  $sid = $session->id;


  $items = $stripe->checkout->sessions->allLineItems(
    $session->id,
    []
  );

  if (isset($_GET["coupon_id"])) {
    $coupon =
      $stripe->coupons->retrieve($cid, []);
  } else {
    $coupon = '0.00';
  }



  $usemail = $_GET["umail"];
  if ($umail == $usemail) {
    ?>

    <!DOCTYPE html>
    <html class="no-js" lang="en">

    <head>
      <!-- Meta Tags -->
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="author" content="ThemeMarch">
      <!-- Site Title -->
      <title>Ceynap - Invoice</title>
      <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <?php
    foreach ($items as $item1) {

      $item_n = $item1->description;
      // If the item is 'Shipping Charge', store its amount in $ship and skip displaying it
      if ($item_n === 'Shipping Charge') {
        $shipping_amount = number_format($item1->amount_subtotal, 2);
      }

    }

    $check_record = Database::search("SELECT * FROM `invoice` WHERE `invoice_id` = '" . $session->payment_intent . "'");
    $check_record_num = $check_record->num_rows;
    $discount_amount = $coupon->amount_off / 100;
    if ($check_record_num == 0) {
      ?>

      <body
        onload="cartInvoice('<?php echo $session->id ?>','<?php echo $session->created ?>','<?php echo $umail ?>','<?php echo $session->payment_intent ?>','<?php echo $session->currency ?>','<?php echo $session->amount_total ?>','<?php echo $discount_amount ?>','<?php echo $shipping_amount ?>');">
        <?php
    } else {
      ?>

        <body>


          <?php
    }
    ?>


        <div class="cs-container">
          <div class="cs-invoice cs-style1">
            <div class="cs-invoice_in" id="download_section">
              <div class="cs-invoice_head cs-type1 cs-mb25">
                <div class="cs-invoice_left">
                  <p class="cs-invoice_number cs-primary_color cs-mb5 cs-f16"><b class="cs-primary_color">Invoice No:</b> #
                    <?php echo $session->payment_intent ?>
                  </p>
                  <p class="cs-invoice_date cs-primary_color cs-m0"><b class="cs-primary_color">Date: </b>
                    <?php $d = new DateTime();
                    $tz = new DateTimeZone("Asia/Colombo");
                    $d->setTimezone($tz);
                    $date = $d->format("Y-m-d H:i:s");
                    echo $date ?>
                  </p>
                </div>
                <div class="cs-invoice_right cs-text_right">
                  <div class="cs-logo cs-mb5"><img src="assets/img/logo.png" alt="Logo"></div>
                </div>
              </div>
              <div class="cs-invoice_head cs-mb10">
                <div class="cs-invoice_left">
                  <oic class="cs-primary_color"><b>Invoice To:</b>
                    <?php
                    $user_rs = Database::search("SELECT * FROM `user` INNER JOIN `town` ON `user`.`town` = `town`.`id`  WHERE `email` = '" . $umail . "' ");
                    $user_num = $user_rs->num_rows;
                    if ($user_num == 1) {
                      $user_data = $user_rs->fetch_assoc();
                      ?>
                      <p>
                        <?php echo $user_data["fname"] . " " . $user_data['lname'] ?><br>
                        <?php echo $user_data["number"] ?>,
                        <?php echo $user_data['lane'] ?>,
                        <?php echo $user_data["t_name"] ?>


                      </p>
                      <?php
                    }
                    ?>

                </div>
                <div class="cs-invoice_right cs-text_right">
                  <b class="cs-primary_color">Pay To:</b>
                  <p>
                    Ceynap - New Zealand<br>
                    6A, Tidey Road, Mount Wellington, <br>
                    Auckland. <br>
                    sales@ceynap.com
                  </p>
                </div>
              </div>
              <div class="cs-table cs-style1">
                <div class="cs-round_border">
                  <div class="cs-table_responsive">
                    <table>
                      <thead>
                        <tr>
                          <th class="cs-width_3 cs-semi_bold cs-primary_color cs-focus_bg">Item</th>
                          <th class="cs-width_2 cs-semi_bold cs-primary_color cs-focus_bg">Qty</th>
                          <th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg">Price</th>
                          <th class="cs-width_2 cs-semi_bold cs-primary_color cs-focus_bg cs-text_right">Total</th>
                          <th class="cs-width_4 cs-semi_bold cs-primary_color cs-focus_bg">Seller</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $ship = null;
                        $totalTax = null;
                        foreach ($items as $item) {
                          $itemName = $item->description;
                          // If the item is 'Shipping Charge', store its amount in $ship and skip displaying it
                          if ($itemName === 'Shipping Charge') {
                            $ship = $item->amount_subtotal;
                            continue; // Skip displaying this item
                          }
                          // If the item is 'Total Tax', store its amount in $totalTax and skip displaying it
                          if ($itemName === 'Total Tax') {
                            $totalTax = $item->amount_subtotal;
                            continue; // Skip displaying this item
                          }
                          ?>
                          <tr>
                            <td class="cs-width_3">
                              <?php echo $itemName ?>
                            </td>
                            <td class="cs-width_4">
                              <?php echo $item->quantity ?>
                            </td>
                            <td class="cs-width_1">
                              NZD
                              <?php echo $item->amount_subtotal /$item->quantity / 100  ?>
                            </td>

                            <td class="cs-width_1">
                              NZD <?php echo number_format($item->amount_subtotal / 100, 2) ?>
                            </td>
                            <td class="cs-width_2 cs-text_right">Ceynap</td>
                          </tr>
                          <?php
                        }
                        ?>






                      </tbody>
                    </table>
                  </div>
                  <div class="cs-invoice_footer cs-border_top">
                    <div class="cs-left_footer cs-mobile_hide">
                      <p class="cs-mb0"><b class="cs-primary_color">Additional Information:</b></p>
                      <p class="cs-m0">At check in you may need to present the credit <br>card used for payment of this
                        ticket.</p>
                    </div>
                    <div class="cs-right_footer">
                      <table>
                        <tbody>
                          <tr class="cs-border_left">
                            <td class="cs-width_3 cs-semi_bold cs-primary_color cs-focus_bg">Subtoal</td>
                            <td class="cs-width_3 cs-semi_bold cs-focus_bg cs-primary_color cs-text_right">
                              <?php echo number_format($session->amount_subtotal / 100, 2) ?>
                            </td>
                          </tr>
                          <tr class="cs-border_left">
                            <td class="cs-width_3 cs-semi_bold cs-primary_color cs-focus_bg">Shipping</td>
                            <td class="cs-width_3 cs-semi_bold cs-focus_bg cs-primary_color cs-text_right">
                              <?php echo number_format($ship / 100, 2) ?>
                            </td>
                          </tr>
                          <tr class="cs-border_left">
                            <td class="cs-width_3 cs-semi_bold cs-primary_color cs-focus_bg">Discount</td>
                            <?php
                            if (isset($_GET["coupon_id"])) {
                              ?>
                              <td class="cs-width_3 cs-semi_bold cs-focus_bg cs-primary_color cs-text_right">
                                <?php echo number_format($coupon->amount_off / 100, 2) ?>
                              </td>
                              <?php
                            } else {
                              ?>
                              <td class="cs-width_3 cs-semi_bold cs-focus_bg cs-primary_color cs-text_right">
                                <?php echo number_format($coupon, 2) ?>
                              </td>
                              <?php
                            }

                            ?>

                          </tr>
                          <tr class="cs-border_left">
                            <td class="cs-width_3 cs-semi_bold cs-primary_color cs-focus_bg">Tax</td>


                            <td class="cs-width_3 cs-semi_bold cs-focus_bg cs-primary_color cs-text_right">
                              <?php echo number_format($totalTax / 100, 2) ?>
                            </td>

                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="cs-invoice_footer">
                  <div class="cs-left_footer cs-mobile_hide"></div>
                  <div class="cs-right_footer">
                    <table>
                      <tbody>
                        <tr class="cs-border_none">
                          <td class="cs-width_3 cs-border_top_0 cs-bold cs-f16 cs-primary_color">Total Amount</td>
                          <td class="cs-width_3 cs-border_top_0 cs-bold cs-f16 cs-primary_color cs-text_right">
                            <?php echo number_format($session->amount_total / 100, 2) ?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="cs-note">
                <div class="cs-note_left">
                  <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                    <path
                      d="M416 221.25V416a48 48 0 01-48 48H144a48 48 0 01-48-48V96a48 48 0 0148-48h98.75a32 32 0 0122.62 9.37l141.26 141.26a32 32 0 019.37 22.62z"
                      fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                    <path d="M256 56v120a32 32 0 0032 32h120M176 288h160M176 368h160" fill="none" stroke="currentColor"
                      stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
                  </svg>
                </div>
                <div class="cs-note_right">
                  <p class="cs-mb0"><b class="cs-primary_color cs-bold">Note:</b></p>
                  <p class="cs-m0">Here we can write a additional notes for the client to get a better understanding of this
                    invoice.</p>
                </div>
              </div><!-- .cs-note -->
            </div>
            <div class="cs-invoice_btns cs-hide_print">
              <a href="javascript:window.print()" class="cs-invoice_btn cs-color1">
                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                  <path
                    d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24"
                    fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                  <rect x="128" y="240" width="256" height="208" rx="24.32" ry="24.32" fill="none" stroke="currentColor"
                    stroke-linejoin="round" stroke-width="32" />
                  <path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none"
                    stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                  <circle cx="392" cy="184" r="24" />
                </svg>
                <span>Print</span>
              </a>
              <button id="download_btn" class="cs-invoice_btn cs-color2">
                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                  <title>Download</title>
                  <path d="M336 176h40a40 40 0 0140 40v208a40 40 0 01-40 40H136a40 40 0 01-40-40V216a40 40 0 0140-40h40"
                    fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
                  <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"
                    d="M176 272l80 80 80-80M256 48v288" />
                </svg>
                <span>Download</span>
              </button>
            </div>
          </div>
        </div>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/jspdf.min.js"></script>
        <script src="assets/js/html2canvas.min.js"></script>
        <script src="assets/js/main.js"></script>
        <script src="../script.js"></script>
      </body>

    </html>
    <?php
  } else {
    ?>
    <script>
      alert("Please Sign-In Or Sign-Up");
      window.location = "../main.php";
    </script>
    <?php
  }

?>
<?php
}

?>