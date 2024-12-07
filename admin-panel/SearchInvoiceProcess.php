<?php
require_once "../connection.php";
session_start();

if (isset ($_GET["key"])) {


      $key =  $_GET["key"];


    $invoice_rs = Database::search("SELECT * FROM `invoice` INNER JOIN `user` ON `user`.`email` = `invoice`.`user_email` WHERE `invoice_id` LIKE '%" . $key . "%'");
    $invoice_num = $invoice_rs->num_rows;

    if ($invoice_num != 0) {
        for ($i = 0; $i < $invoice_num; $i++) {
            $invoice_data = $invoice_rs->fetch_assoc();
            ?>
         <div class="row justify-content-center">
                                                            <div class="col-12">
                                                                <div class="table-responsive bg-white">
                                                                    <table class="table mb-0">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col"></th>
                                                                                <th scope="col">Invoice ID</th>
                                                                                <th scope="col">Customer Name</th>
                                                                                <th scope="col">Total Price</th>
                                                                                <th scope="col">Date</th>
                                                                                <th scope="col">Download</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                     
                                                                                <tr>
                                                                                    <td>
                                                                                        <?php echo $i ?>
                                                                                    </td>
                                                                                    <th scope="row"><?php echo $invoice_data['invoice_id'] ?></th>
                                                                                    <td><?php echo $invoice_data["fname"]." ".$invoice_data["lname"] ?></td>
                                                                                    <td>NZD <?php echo intval($invoice_data["total_amount"])  ?>.00</td>
                                                                                    <td><?php  echo $invoice_data["date"] ?></td>
                                                                                    <td><a
                                                                                            class="btn x py-1 px-3 rounded-1"><i
                                                                                                class="fa fa-download"
                                                                                                aria-hidden="true"></i></a>
                                                                                    </td>
                                                                                </tr>
                                                                            
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
            <?php
        }
    }else{
        echo "Invoice Not Found";
    }



} else {
    echo "PLease Try Again";
}


?>