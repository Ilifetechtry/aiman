<div class="nk-invoice" id="maintable">
    <?php
    include "invoice_styles.php";
    ?>

    <table border="" style="color: black;" cellpadding='10' class="over">
        <tr>
            <td colspan='7' align='center'>
                <div class="d-flex myDiv22">
                    <div class="img">
                        <img src="images/logo1.png">
                    </div>
                    <div class="content">
                        <b>ASK E ENERGY</b>
                        <br>
                        <span>#48 / 378-2, K.N. Palayam, Pattukkottai.</span>
                        <br>
                        <span>Thanjavur – 614 601.</span>
                        <br>
                        <a class='urls' href="mailto:winnernotes123@gmail.com">askeenergy@gmail.com</a>
                        <p>Phone: <a href="tel:9585106200" class='urls'>95851 06200, 97895 43818</a></p>
                        <!-- <p>Phone: <a href="tel:9994338123" class='urls'>95851 06200</a></p> -->
                    </div>
                </div>


            </td>
        </tr>
        <tr>
            <td colspan='3'>
                <b>Customer Name - &nbsp;<?= $fe['cname'] ?></b>
            </td>
            <td colspan='1' style="background-color:#c21b72;color:white;font-size:20px;">
                <b>INVOICE</b>
            </td>
            <td colspan='2' style="font-size:20px;">
                <?= "#" . $fe['id'] ?>
            </td>
        </tr>
        <tr>
            <td colspan='3'>
                <b>Aadhar:</b>&nbsp;<?= $fe['aadhar']; ?>
            </td>
            <td colspan='1'>
                <b class=''>Date&nbsp;</b>
            </td>
            <td colspan='2'>
                <?php echo date("d-m-Y", strtotime($fe['date'])); ?>
            </td>
        </tr>
        <tr>
            <td colspan='3'>
                <b>Mobile:</b>&nbsp;<?= $fe['mobile']; ?>
            </td>
            <td colspan='1'>
                <b class=''>GST No</b>
            </td>
            <td colspan='2'>
                <span>33BIEPT9039D1Z6</span>
            </td>
        </tr>
        <tr>
            <td colspan='3' rowspan="">
                <b>Address:</b>&nbsp;<?= $fe['address']; ?>
            </td>
            <td colspan='3' rowspan="">
            </td>
            <!-- <td colspan='' rowspan="3">
            </td> cus_gst-->
        </tr>
        <?php if ($fe['cus_gst'] !== null) { ?>
            <tr>
                <td colspan='3' rowspan="">
                    <b>GST No:</b>&nbsp;<?= $fe['cus_gst']; ?>
                </td>
                <td colspan='3' rowspan="">
                </td>
                <!-- <td colspan='' rowspan="3">
            </td> cus_gst-->
            </tr>
        <?php } ?>


        <tr>
            <th>S.No</th>
            <th>Description</th>
            <th>Rate</th>
            <th>QTY</th>
            <th colspan='2'>Total</th>
        </tr>

        <?php
        $quantity = explode(",", $fe['quantity']);
        $name = explode(",", $fe['category_name']);
        $price = explode(",", $fe['price']);
        $l = 0;
        $myarr = [];
        foreach ($name as $category_option) {
            $l += 1;
        }

        for ($i = 0; $i < $l - 1; $i++) {
            $count = 1 + $i;
            $totqty = $quantity[$i];
            $taxamt = ($fe['net_amount'] - $fe['discount']) * $fe['tax'] / 100;
        ?>
            <tr>
                <td colspan=""><?= $count; ?></td>
                <td><?= $name[$i]; ?> <br> </td>
                <td>Rs.<?= $price[$i] - $taxamt; ?></td>
                <td><?= $quantity[$i]; ?></td>
                <!-- <td> <?= $totqty; ?></td> -->
                <?php
                $result = $quantity[$i] * ($price[$i] - $taxamt);
                ?>
                <td colspan='2'>Rs.<?= $result; ?>.00</td>
            </tr>
        <?php
        }
        ?>

        <tr>
            <td colspan='6' class='no_box'>1</td>
        </tr>
        <tr>
            <td colspan="2">Color</td>
            <td><?= $fe['color']; ?></td>
        </tr>
        <tr>
            <td colspan="2">Chassis No</td>
            <td><?= $fe['chassis']; ?></td>
        </tr>
        <tr>
            <td colspan="2">Motor No</td>
            <td><?= $fe['motor']; ?></td>
        </tr>
        <tr>
            <td colspan="2">Controller No</td>
            <td><?= $fe['controller']; ?></td>
        </tr>
        <tr>
            <td colspan="2">Charger No</td>
            <td><?= $fe['charger']; ?></td>
        </tr>
        <tr>
            <td colspan="2">Battery Model</td>
            <td><?= $fe['batterymodel']; ?></td>
        </tr>
        <tr>
            <td colspan="2">Battery S/N</td>
            <td><?= $fe['batterysn']; ?></td>
        </tr>

        <tr>
            <td colspan="3" class='head_text'>Payment Mode</td>
            <!-- <td class='head_text'>Delivery Type</td> -->
            <td colspan='2' class='head_text'>Remarks</td>
        </tr>
        <tr>
            <td colspan='3'><?= $fe['mop']; ?></td>
            <td colspan='2'>
                <?php
                if ($fe['remarks']) {
                    echo $fe['remarks'];
                } else {
                    echo "--";
                }
                ?>
            </td>
        </tr>
        <!-- <tr>
            <td colspan="3" class='head_text'>L.R Date</td>
            <td class='head_text'>L.R No</td>
        </tr> -->
        <!-- <tr>
           
        </tr> -->
        <tr>
            <td colspan='3' rowspan='4'></td>
            <?php if ($fe['tax'] == 0) {
                $taxamt1 = ($fe['total']) * $fe['tax'] / 100;
                $taxamt1 = floor($taxamt1);
            ?>
                <td>Net Amount</td>
                <td colspan="2">Rs.<?= (($fe['total']) + $fe['discount']) - $taxamt1; ?>.00</td>
        </tr>

        <tr>

        </tr>
        <tr>
            <td>Total</td>
            <td colspan="2">Rs.<?= (($fe['total']) + $fe['discount']); ?>.00</td>
        </tr>
    <?php } ?>
    <?php if ($fe['tax'] != 0) {
        $taxamt1 = ($fe['total']) * $fe['tax'] / 100;
        $taxamt1 = floor($taxamt1);
        $taxamt2 = ($fe['total']) * $fe['cgst'] / 100;
        $taxamt2 = floor($taxamt2);
    ?>
        <td>Net Amount</td>
        <td colspan="2">Rs.<?= (($fe['total']) + $fe['discount']) - ($taxamt1 + $taxamt2); ?>.00</td>
        </tr>

        <tr>
            <td>Tax (<?= $fe['tax']; ?>%)</td>

            <td colspan="2">Rs.<?= $taxamt1; ?>.00</td>
        </tr>
        <tr>
            <td>Tax (<?= $fe['cgst']; ?>%)</td>

            <td colspan="2">Rs.<?= $taxamt2; ?>.00</td>
        </tr>
        <tr>
            <td>Total</td>
            <td colspan="2">Rs.<?= (($fe['total']) + $fe['discount']); ?>.00</td>
        </tr>
        <?php if ($fe['discount'] != 0) { ?>
            <tr>
                <td>Discount</td>
                <?php if ($fe['discount'] != 0) {
                ?>
                    <td colspan="2">Rs.<?= $fe['discount']; ?>.00</td>
            </tr>
        <?php
                } else {
        ?>
            <tr>
                <td colspan="2">--</td>
            </tr>
        <?php
                }
            } else {
        ?>
        <tr></tr>
    <?php
            }
    ?>


<?php
    } else {
?>
    <td colspan="2">--</td>
    </tr>
<?php
    }
?>
</tr>
<tr>
    <?php
    if (!$fe['c_amount']) {
    ?>
        <td colspan="3">
            <span>RUPEES <span id="words" style='text-transform:capitalize;'></span>Only</span>
            <input id="number" type="hidden" value="<?= $fe['total']; ?>" />
        </td>
        <td style='font-size:1.4em'>Grand Total</td>
        <td colspan="2" style='font-size:1.4em'>Rs.<?= $fe['total']; ?>.00</td>
    <?php
    } else {
    ?>
        <td colspan="3">
            <span style="">RUPEES <span id="words" style='text-transform:uppercase;'></span>Only</span>
            <input id="number" type="hidden" value="<?= $fe['total']; ?>" />
        </td>
        <td style='font-size:1.4em'>Grand Total</td>
        <td colspan="2" style='font-size:1.4em'>Rs.<?= $fe['total']; ?>.00</td>

    <?php
    }
    ?>

</tr>
<?php
$i = 1;
$selec = mysqli_query($conn, "SELECT * FROM credit1 where bill_id='" . $_GET['id'] . "'");
$selec1 = mysqli_query($conn, "SELECT * FROM customer1 where id='" . $_GET['id'] . "'");
$fe1 = mysqli_fetch_assoc($selec1);
if (mysqli_num_rows($selec) > 0) {
?>
    <tr>
        <th>SI.NO</th>
        <th>Date</th>
        <th>Total Amount</th>
        <th>Paid Amount</th>
        <th colspan='2'>Balance</th>
    </tr>
    <?php
    while ($fe = mysqli_fetch_assoc($selec)) {
    ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= date("d-m-Y", strtotime($fe['date'])); ?></td>
            <td>Rs.<?= $fe1['total']; ?></td>
            <td>Rs.<?= $fe['paid_amount'] ?></td>
            <td colspan='2'>Rs.<?= $fe['balance_amount'] ?></td>
        </tr>
    <?php
    }
    ?>

<?php
}
?>
    </table>