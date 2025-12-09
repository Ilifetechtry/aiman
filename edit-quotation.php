<?php

include 'sidebar.php';
?>
<?php

if (isset($_POST['save'])) {
    $customer_id = $_GET['id'];
    $cus_id = (int) $_GET['id'];
    $pid = "";
    if (!empty($_POST['category_name'])) {
        $category_name = $_POST['category_name'];
        $l = count($category_name);
        for ($i = 0; $i < $l; $i++) {
            if ($category_name[$i] != 0) {
                // echo $category_name[$i]."-"."<br>";
                $upd = mysqli_query($conn, "INSERT INTO all_tabs (customer_id,category_name)values($customer_id,'" . $category_name[$i] . "')");
                // $iiid=mysqli_insert_id($conn);
            }
        }
    }
    if (!empty($_POST['quantity'])) {
        $quantity = $_POST['quantity'];
        $l = count($quantity);
        for ($i = 0; $i < $l; $i++) {
            if (!empty($quantity[$i])) {
                // echo $quantity[$i]."-"."<br>";
                $upd = mysqli_query($conn, "INSERT INTO all_tabs (customer_id,quantity)values($customer_id,'" . $quantity[$i] . "')");
            }
        }
    }
    if (!empty($_POST['price'])) {
        $price = $_POST['price'];
        $l = count($price);
        for ($i = 0; $i < $l; $i++) {
            if (!empty($price[$i])) {
                // echo $price[$i]."-"."<br>";
                $upd = mysqli_query($conn, "INSERT INTO all_tabs (customer_id,price)values($customer_id,'" . $price[$i] . "')");
            }
        }
    }

    $select_all_data = mysqli_query($conn, "SELECT * FROM customer1 where id=$customer_id");

    $cat_id = ["", "", "", "", "", "", "", ""];
    $sel = mysqli_query($conn, "SELECT * FROM all_tabs  where customer_id=$customer_id");
    if (mysqli_num_rows($sel) > 0) {
        while ($fe = mysqli_fetch_assoc($sel)) {
            $l = mysqli_num_rows($sel);
            if ($fe['category_option'] != '') {
                $cat_id[0] = $fe['category_option'] . ',' . $cat_id[0];
            }
            if ($fe['category_name'] != '') {
                $cat_id[1] = $fe['category_name'] . ',' . $cat_id[1];
            }
            if ($fe['price'] != '') {
                $cat_id[2] = $fe['price'] . ',' . $cat_id[2];
            }
            if ($fe['quantity'] != '') {
                $cat_id[3] = $fe['quantity'] . ',' . $cat_id[3];
            }
        }

        $final_update1 = mysqli_query($conn, "UPDATE quotation set 
            cname='" . $_POST['cname'] . "',
            mobile='" . $_POST['mobile'] . "',
            category_option='" . $cat_id[0] . "',
            date='" . $_POST['date'] . "',
            net_amount='" . $_POST['net_amount'] . "',
            tax='" . $_POST['tax'] . "',
            total='" . $_POST['total'] . "',
            discount='" . $_POST['discount'] . "',
            category_name='" . $cat_id[1] . "', 
            price='" . $cat_id[2] . "', 
            quantity='" . $cat_id[3] . "',
            color='" . $_POST['color'] . "',
            chassis='" . $_POST['chassis'] . "',
            motor='" . $_POST['motor'] . "',
            controller='" . $_POST['controller'] . "',
            charger='" . $_POST['charger'] . "',
            batterymodel='" . $_POST['batterymodel'] . "',
            batterysn='" . $_POST['batterysn'] . "'
            where id=$customer_id");

        $select_customer_name = mysqli_query($conn, "SELECT cid from quotation where id=$customer_id");
        if (!$final_update1) {
            echo "Error updating customer1: " . mysqli_error($conn);
        }
        if (mysqli_num_rows($select_customer_name) > 0) {
            $fe_sc = mysqli_fetch_assoc($select_customer_name);
        }
        //stock control
        if (mysqli_num_rows($select_all_data) > 0) {
            $feww = mysqli_fetch_assoc($select_all_data);
            $quantity = explode(",", $feww['quantity']);
            $name = explode(",", $feww['category_name']);
            $quantitynow = explode(",", $cat_id[3]);
            $namenow = explode(",", $cat_id[1]);
            $l = 0;
            $myarr = [];
            foreach ($quantity as $qty) {
                $l += 1;
            }
        }

        //credit 
        if (isset($_POST['c_amount']) && isset($_POST['total'])) {
            $select_customer_name = mysqli_query($conn, "SELECT * from credit where bill_id=$customer_id");

            if (mysqli_num_rows($select_customer_name) > 0) {
                $fe_sc = mysqli_fetch_assoc($select_customer_name);
                $due_amount = $fe_sc['due_amount'];
                $paid_amount =  $fe_sc['paid_amount'];
                $balance_amount = $fe_sc['balance_amount'];
                $c_amount = (int) ($_POST['c_amount']);
                $total = (int)($_POST['total']);
                $paid = $paid_amount + $c_amount;
                $bal = ($total - $due_amount) + $balance_amount;


                $ins = mysqli_query($conn, "UPDATE credit SET date = '" . $_POST['date'] . "',  due_amount='" . $_POST['total'] . "', paid_amount='" . $_POST['c_amount'] . "', balance_amount='$bal' WHERE bill_id=$customer_id");
                $delete = mysqli_query($conn, "DELETE FROM credit1 WHERE bill_id = $customer_id");
                $ins1 = mysqli_query($conn, "INSERT INTO credit1 (bill_id,date,cname,due_amount,paid_amount,balance_amount)VALUES ('" . $fe_sc['bill_id'] . "','" . $_POST['date'] . "','" . $fe_sc['cname'] . "','" . $_POST['total'] . "','$paid','$bal')");
                $ins2 = mysqli_query($conn, "UPDATE customer1 SET  c_amount='" . $_POST['c_amount'] . "', r_amount='$bal' WHERE id=$customer_id");

                // die;
            }
        }

        // $idid = $fe_sc['cid'];
        // $final_update2 = mysqli_query($conn, "UPDATE customer set 
        //     cname='" . $_POST['cname'] . "',
        //     mobile='" . $_POST['mobile'] . "',
        //     city='" . $_POST['city'] . "' where id=$idid");

        // die;
        $delete = mysqli_query($conn, "TRUNCATE all_tabs");
?>
        <!-- <script>
            location.href = 'billing-quotation.php?id=<?= $customer_id; ?>'
        </script> -->
<?php
    }
}

?>
<style>
    .emicon {
        font-size: 30px;
    }

    .emiconall {
        margin-top: -3px;
    }

    .combine {
        display: flex;
    }

    spam {
        color: red;
    }

    label {
        font-size: 16px !important;
    }

    .nav-link {
        font-size: 18px !important;
    }

    .activea {
        color: white !important;
        background: #2daae0 !important;
    }
</style>

<body class="nk-body" style="margin-top:40px" data-sidebar-collapse="lg" data-navbar-collapse="lg">
    <script src="assets/js/bundle.js"></script>
    <script src="assets/js/scripts.js"></script>
    <?php
    include "common/jquery.php";
    ?>
    <div class="nk-content">
        <div class="container m-auto">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
                        <!--begin:::Tab item-->

                        <!--end:::Tab item-->

                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary newuser activea" href="#">Edit Invoice</a>
                        </li>

                        <!--end:::Tab item-->

                    </ul>
                    <?php
                    $select1 = mysqli_query($conn, "SELECT * FROM quotation where id='" . $_GET['id'] . "'");
                    if (mysqli_num_rows($select1) > 0) {
                        $fc = mysqli_fetch_assoc($select1);
                    ?>


                        <form method="post" name="form2" action="" style="margin-top:10px" onsubmit="return myFun()">
                            <div class="row g- new" id="new">
                                <div class="col-xxl-12">
                                    <div class="gap gy-4">
                                        <div class="gap-col">
                                            <div class="card card-gutter-md">
                                                <div class="card-body">
                                                    <div class="row g-gs">
                                                        <!-- <div class="col-lg-12  form-label" style="font-size:16px;font-weight:700;">&nbsp;Customer</div> -->
                                                        <div class="col-lg-3">
                                                            <div class="form-group"><label for="name" class="form-label">Customer Name<spam>*</spam></label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" name="cname" id="cname" placeholder="Enter your name" value=<?= $fc['cname'] ?> readonly />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="form-group"><label for="date" class="form-label">Date<spam>*</spam></label>
                                                                <div class="form-control-wrap">
                                                                    <input type="date" class="form-control" id="date" name="date" value="<?= date('Y-m-d'); ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="form-group">
                                                                <label for="city" class="form-label">Aadhar<spam>*</spam></label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="aadhar" name="aadhar" autocomplete="off" placeholder="Enter Aadhar No" autosuggestion value=<?= $fc['aadhar'] ?> required>
                                                                    <div id="results"></div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="form-group"><label for="mobile_num" class="form-label">Mobile<spam>*</spam></label>
                                                                <div class="form-control-wrap">
                                                                    <input type="tel" class="form-control" pattern="^[0-9]{10}$" id="mobile_num" name="mobile" placeholder="Enter your mobile number" value="<?= $fc['mobile'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <?php
                                                        $category_name = explode(",", $fc['category_name']);
                                                        $quantity = explode(",", $fc['quantity']);
                                                        $price = explode(",", $fc['price']);
                                                        // $specimen = explode(",", $fc['specimen']);
                                                        $l = 0;
                                                        foreach ($category_name as $cat) {
                                                            $l++;
                                                        }
                                                        ?>

                                                        <input type="text" value=<?= $l; ?> id="edit_count" hidden>

                                                        <?php
                                                        for ($i = 0; $i < $l - 1; $i++) {
                                                            $count = $i + 1;
                                                        ?>
                                                            <div class="row category_append mt-4">
                                                                <div class="col-lg-2 vav">
                                                                    <div class="form-group">
                                                                        <div class="form-control-wrap"><label for="" class="form-label">Book Name<spam>*</spam></label>
                                                                            <select class="form-select" data_id="<?= $count ?>" id="p5<?= $count; ?>" name="category_name[]">
                                                                                <option value="<?= $category_name[$i]; ?>"><?= $category_name[$i]; ?></option>
                                                                                <?php $seli = mysqli_query($conn, "SELECT * from book");
                                                                                if (mysqli_num_rows($seli)) {
                                                                                    while ($fz = mysqli_fetch_assoc($seli)) {; ?>
                                                                                        <option value="<?= $fz['book_name']; ?>"><?= $fz['book_name']; ?></option>
                                                                                <?php }
                                                                                } ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2 vav">
                                                                    <div class="form-group">
                                                                        <div class="form-control-wrap">
                                                                            <label for="" class="form-label">Quantity<spam>*</spam></label>
                                                                            <input type="text" placeholder="Quantity" id="quantity" data_id="<?= $count ?>" name="quantity[]" class="form-control" value="<?= $quantity[$i]; ?>">
                                                                            <!-- <input type="text" placeholder="Quantity" name="quantity[]" class="form-control quantity" value="<?= $quantity[$i]; ?>"> -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-1 vav" hidden>
                                                                    <div class="form-group">
                                                                        <div class="form-control-wrap"><label for="" class="form-label">Spec. <span id='specimen_text' class='form-label'></span>
                                                                                <!-- <spam>*</spam> -->
                                                                            </label>
                                                                            <input type="number" placeholder="Specimen" id="specimen" data_id="<?= $count ?>" name="specimen[]" class="form-control" value="<?= $specimen[$i]; ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2 vav">
                                                                    <div class="form-group">
                                                                        <div class="form-control-wrap"><label for="" class="form-label">Price<spam>*</spam></label>
                                                                            <input type="text" placeholder="Price" class="form-control pricee" data_id="<?= $count ?>" value="<?= $price[$i]; ?>" id="price" name="price[]">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2 vav">
                                                                    <div class="form-group">
                                                                        <div class="form-control-wrap"><label for="" class="form-label">Total Price<spam>*</spam></label>
                                                                            <input type="text" placeholder="Total Price" class="form-control tp" data_id="<?= $count ?>" id="tprice1" value=<?= $price[$i] * $quantity[$i]; ?> readonly>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-1 vav">
                                                                    <div class="form-group"><label for="quantity" class="form-label"></label>
                                                                        <div class="form-control-wrap"><button class="btn btn-danger mt-4 rms-button btn-block" data_id="<?= $count; ?>" id="arms-button1<?= $count; ?>"><em style="color:white;font-size:20px" class="icon ni ni-trash"></em></button></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php
                                                        }
                                                        ?>
                                                        <div class="col-9">
                                                        </div>
                                                        <div class="col-3" hidden>
                                                            <a id="add_category" class="btn form-control bg-success text-white"><em class="icon ni ni-plus-circle-fill emicon" style="margin-right:10px"></em>Add Book</a>
                                                        </div>

                                                        <div class="category_append1">

                                                        </div>

                                                        <div class="col-lg-3">
                                                            <div class="form-group"><label for="" class="form-label">Color</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" name="color" id="color" placeholder="Enter Bike Color" value="<?= $fc['color'] ?>" />
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3">
                                                            <div class="form-group"><label for="chassis_no" class="form-label">Chassis No</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="chassis" name="chassis" placeholder="Enter Bike Chassis" value="<?= $fc['chassis'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3">
                                                            <div class="form-group"><label for="aadhar" class="form-label">Motor No</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="motor" name="motor" placeholder="Enter Bike Motor No" value="<?= $fc['motor'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3">
                                                            <div class="form-group"><label for="date" class="form-label">Controller No</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="controller" name="controller" value="<?= $fc['controller'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3 mb-3">
                                                            <div class="form-group"><label for="date" class="form-label">chargerr No</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="charger" name="charger" value="<?= $fc['charger'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3 mb-3">
                                                            <div class="form-group">
                                                                <label for="city" class="form-label">Battery Model</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="batterymodel" name="batterymodel" placeholder="Enter Battery Model" value="<?= $fc['batterymodel'] ?>">
                                                                    <!-- <div id="results"></div> -->
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3 mb-3">
                                                            <div class="form-group">
                                                                <label for="city" class="form-label">Battery S/N</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="batterysn" name="batterysn" placeholder="Enter Battery S/N" value="<?= $fc['batterysn'] ?>">
                                                                    <!-- <div id="results"></div> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 mb-3">
                                                        </div>

                                                        <!-- <div class="col-lg-12 mb-2">
                                                            <div class="col-lg-3 mb-2" style="display: flex; align-items: end;">
                                                                <div class="form-group"><label for="courier" class="form-label">Courier<spam>*</spam></label>
                                                                    <div class="row">
                                                                        <div class="col-1"></div>
                                                                        <div class="col-5">
                                                                            <input type="number" placeholder="Price" class="form-control" id="courier" name="courier">
                                                                        </div>
                                                                        <div class="col-5">
                                                                            <input type="number" placeholder="Price" class="form-control d-none" id="courieramt" name="courieramt" value=<?= $fc['courieramt']; ?>>
                                                                            <a href="#" class='btn btn-primary btn_courieramt form-control' style='margin-left:-32px'>0</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <div class="col-lg-2" hidden>
                                                            <div class="form-group"><label for="mop" class="form-label">Mode of Payment<spam>*</spam></label>
                                                                <div class="form-control-wrap">
                                                                    <select class="form-select" name="mop" id="mop1">
                                                                        <option value="<?= $fc['mop'] ?>" selected hidden><?= $fc['mop'] ?></option>
                                                                        <option value="Cash">Cash</option>
                                                                        <option value="UPI">UPI</option>
                                                                        <option value="Credit">Credit</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group"><label for="net_amount" class="form-label">Net Amount<spam>*</spam></label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="net_amount" name="net_amount" value="<?= $fc['net_amount']; ?>" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="form-group"><label for="net_amount" class="form-label" style="margin-left:30px">Discount<spam>*</spam></label>
                                                                <div class="form-control-wrap">
                                                                    <div class="row">
                                                                        <div class="col-1"></div>
                                                                        <div class="col-5">
                                                                            <input type="number" class="form-control main_discount" id="main_discount" name="discount" value="<?= $fc['discount']; ?>">
                                                                        </div>
                                                                        <div class="col-5">
                                                                            <input type="text" class="form-control main_discount1" id="main_discount1" name="main_discount1" hidden value=<?= $fc['discount']; ?> style='margin-left:-30px' readonly>
                                                                            <a href="#" class='btn btn-primary btn_discount form-control' style="margin-left:-32px">Discount</a>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="form-group"><label for="net_amount" class="form-label" style="margin-left:30px">Tax<spam>*</spam></label>
                                                                <div class="form-control-wrap">
                                                                    <div class="row">
                                                                        <div class="col-1"></div>
                                                                        <div class="col-5">
                                                                            <input type="number" class="form-control main_tax" id="main_tax" name="tax" value="<?= $fc['tax']; ?>">
                                                                        </div>
                                                                        <div class="col-5">
                                                                            <a href="#" class='btn btn-primary btn_tax form-control' style="margin-left:-32px">Tax</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group"><label for="net_amount" class="form-label">Total Amount<spam>*</spam></label>
                                                                <div class="form-control-wrap">
                                                                    <input type="number3" class="form-control" id="main_total" name="total" value="<?= $fc['total']; ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3" id="c_ra">
                                                            <div class="form-group"><label for="net_amount" class="form-label">Paid Amount<spam>*</spam></label>
                                                                <input type="hidden" value="" id="t_amount">
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="c_amount" name="c_amount">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3" id="c_r1a">
                                                            <div class="form-group"><label for="c_amount1" class="form-label">Remaining Amount<spam>*</spam></label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="r_amount" name="r_amount" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" id="id" name="id" />
                                    <input type="hidden" id="credit1" name="credit">
                                    <input type="hidden" value=0 id="totalll" />
                                    <input type="hidden" value=0 id="totalll2" />
                                    <input type="hidden" value=0 id="totalll5" />
                                    <input type="hidden" value=0 id="net_amounta" />
                                    <input type="hidden" value=0 id="net_amountb" />
                                    <!-- <input type="hidden1" value="0" id="abcd"/> -->

                                    <div class="col-lg-3">
                                        <input type="submit" name="save" class="btn btn-primary" style="margin-left:4%;margin-bottom:20px;margin-top:20px;" value="Save Changes">
                                    </div>
                        </form>

                    <?php
                    }
                    ?>
</body>

</html>