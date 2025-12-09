<?php

include 'sidebar.php';
?>
<?php

if (isset($_POST['save'])) {
    $customer_id = $_GET['id'];
    $cus_id = (int) $_GET['id'];
    $pid = "";

    if (!empty($_POST['book_name'])) {
        $category_name = [$_POST['book_name']];  // wrap into array
        $l = 1;
        for ($i = 0; $i < $l; $i++) {
            if (!empty($category_name[$i])) {
                echo "--".$category_name[$i]."-"."<br>"; 
                $upd = mysqli_query($conn, "INSERT INTO all_tabs (customer_id,category_name)values($customer_id,'" . $category_name[$i] . "')");
                // $iiid=mysqli_insert_id($conn);
            } else {
                $upd = mysqli_query($conn, "INSERT INTO all_tabs (customer_id,category_name)values($customer_id,'" . $category_name[$i] . "')");
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

    $cat_id = ["", "", "", "", "", "", "", "", ""];
    print_r($cat_id);
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
        $final_update = mysqli_query($conn, "UPDATE invoice set 
            category_option='" . $cat_id[0] . "',
            date='" . $_POST['date'] . "',
            c_amount='" . $_POST['c_amount'] . "',
            r_amount='" . $_POST['r_amount'] . "',
            net_amount='" . $_POST['net_amount'] . "',
            mop='" . $_POST['mop'] . "',
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
            batterysn='" . $_POST['batterysn'] . "',
            aadhar='" . $_POST['aadhar'] . "',
            brand='" . $_POST['brand'] . "',
            where id=$customer_id");


        $final_update1 = mysqli_query($conn, "UPDATE customer1 set 
            cname='" . $_POST['cname'] . "',
            mobile='" . $_POST['mobile'] . "',
            category_option='" . $cat_id[0] . "',
            date='" . $_POST['date'] . "',
            c_amount='" . $_POST['c_amount'] . "',
            r_amount='" . $_POST['r_amount'] . "',
            net_amount='" . $_POST['net_amount'] . "',
            mop='" . $_POST['mop'] . "',
            tax='" . $_POST['tax'] . "',
            cgst='" . $_POST['cgst'] . "',
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
            batterysn='" . $_POST['batterysn'] . "',
            aadhar='" . $_POST['aadhar'] . "',
            hsn='" . $_POST['hsn'] . "',
            brand='" . $_POST['brand'] . "'
            where id=$customer_id");

        $select_customer_name = mysqli_query($conn, "SELECT cid from customer1 where id=$customer_id");
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

            foreach ($namenow as $index => $bookname_now) {
                $qty_now = (int) ($quantitynow[$index] ?? 0);
                foreach ($name as $old_index => $bookname_old) {
                    if ($bookname_now === $bookname_old) {
                        $qty_old = (int) ($quantity[$old_index] ?? 0);

                        $diff_qty = $qty_now - $qty_old;
                        $total_diff = $diff_qty;

                        $select_book = mysqli_query($conn, "SELECT * FROM book WHERE book_name='" . $bookname_now . "'");
                        if ($fe_book = mysqli_fetch_assoc($select_book)) {
                            $final_stock = $fe_book['book_stock'] - $total_diff;
                            $update_book = mysqli_query($conn, "UPDATE book SET book_stock='$final_stock' WHERE book_name='" . $bookname_now . "'");
                        }

                        break;
                    }
                }
            }
            // Add stock for removed books
            foreach ($name as $old_index => $bookname_old) {
                if (!in_array($bookname_old, $namenow)) {
                    $qty_old = (int) ($quantity[$old_index] ?? 0);
                    $total_old = $qty_old;

                    $select_book = mysqli_query($conn, "SELECT * FROM book WHERE book_name='" . $bookname_old . "'");
                    if ($fe_book = mysqli_fetch_assoc($select_book)) {
                        $final_stock = $fe_book['book_stock'] + $total_old;
                        $update_book = mysqli_query($conn, "UPDATE book SET book_stock='$final_stock' WHERE book_name='" . $bookname_old . "'");
                    }
                }
            }

            // Add stock for newly added books
            foreach ($namenow as $index => $bookname_now) {
                if (!in_array($bookname_now, $name)) {
                    $qty_now = (int) ($quantitynow[$index] ?? 0);
                    $total_now = $qty_now;

                    $select_book = mysqli_query($conn, "SELECT * FROM book WHERE book_name='" . $bookname_now . "'");
                    if ($fe_book = mysqli_fetch_assoc($select_book)) {
                        // Subtract stock for newly added books
                        $final_stock = $fe_book['book_stock'] - $total_now;
                        $update_book = mysqli_query($conn, "UPDATE book SET book_stock='$final_stock' WHERE book_name='" . $bookname_now . "'");
                    }
                }
            }
        }

        //credit 
        if (isset($_POST['c_amount']) && isset($_POST['total']) && ($_POST['mop'] === 'Credit')) {
            //  echo "POST['mop']" .$_POST['mop'];
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
                $ins1 = mysqli_query($conn, "INSERT INTO credit1 (bill_id,date,cname,due_amount,paid_amount,balance_amount)VALUES ('" . $id_fetch[0] . "','" . $_POST['date'] . "','" . $_POST['cname'] . "','" . $_POST['total'] . "','$paid','$bal')");
                $ins2 = mysqli_query($conn, "UPDATE customer1 SET  c_amount='" . $_POST['c_amount'] . "', r_amount='$bal' WHERE id=$customer_id");

                // die;
            } else {
                $id_max = mysqli_query($conn, "SELECT max(id) from customer1");
                $id_fetch = mysqli_fetch_array($id_max);
                $ins = mysqli_query($conn, "INSERT INTO credit (bill_id,date,cname,due_amount,paid_amount,balance_amount)VALUES ('" . $id_fetch[0] . "','" . $_POST['date'] . "','" . $_POST['cname'] . "','" . $_POST['total'] . "','" . $_POST['c_amount'] . "','" . $_POST['r_amount'] . "')");
                $ins1 = mysqli_query($conn, "INSERT INTO credit1 (bill_id,date,cname,due_amount,paid_amount,balance_amount)VALUES ('" . $id_fetch[0] . "','" . $_POST['date'] . "','" . $_POST['cname'] . "','" . $_POST['total'] . "','" . $_POST['c_amount'] . "','" . $_POST['r_amount'] . "')");
                $ins2 = mysqli_query($conn, "UPDATE customer1 SET  credit_status=1 WHERE id=$customer_id");
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
        <script>
            location.href = 'billing-invoice-edit.php?id=<?= $customer_id; ?>'
        </script>
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
                    $select1 = mysqli_query($conn, "SELECT * FROM customer1 where id='" . $_GET['id'] . "'");
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
                                                                <!-- <div class="col-lg-2 vav">
                                                                    <div class="form-group">
                                                                        <div class="form-control-wrap"><label for="" class="form-label">Book Name<spam>*</spam></label>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div> -->
                                                                <div class="col-lg-3">
                                                                    <label class="form-label">Chassis No <span>*</span></label>
                                                                    <select class="form-select chassis_select"  id="chassis_no" name="chassis_no" data-index="<?= $i ?>">
                                                                        <option value="" hidden>--- SELECT CHASSIS NO ---</option>
                                                                        <?php
                                                                        $sel = mysqli_query($conn, "SELECT chassis_no FROM book ORDER BY chassis_no ASC");
                                                                        while ($r = mysqli_fetch_assoc($sel)) {
                                                                            $selected = ($r['chassis_no'] == $fc['chassis']) ? "selected" : "";
                                                                            echo "<option value='{$r['chassis_no']}' {$selected}>{$r['chassis_no']}</option>";
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    <label class="form-label">Bike Name <span>*</span></label>
                                                                    <input type="text" class="form-control book_name" name="book_name" id="book_name" value="<?= htmlspecialchars($category_name[$i]) ?>" readonly>
                                                                </div>

                                                                <!-- Brand -->
                                                                <div class="col-lg-3">
                                                                    <label class="form-label">Brand <span>*</span></label>
                                                                    <input type="text" class="form-control brand" name="brand" id="brand" value="<?= $fc['brand'] ?>" >
                                                                </div>

                                                                <!-- Quantity -->
                                                                <div class="col-lg-3 mt-2">
                                                                    <label class="form-label">Quantity <span>*</span></label>
                                                                    <input type="number" class="form-control" id="quantity" data_id="<?= $count ?>" name="quantity[]" value="1" readonly>
                                                                </div>

                                                                <!-- Price -->
                                                                <div class="col-lg-3 mt-2">
                                                                    <label class="form-label">Price <span>*</span></label>
                                                                    <input type="text" class="form-control price" name="price[]" id="price" value="<?= htmlspecialchars($price[$i]) ?>">
                                                                </div>

                                                                <!-- Total Price -->
                                                                <div class="col-lg-3 mt-2">
                                                                    <label class="form-label">Total Price</label>
                                                                    <input type="text" class="form-control tp" data_id="<?= $count ?>" id="tprice1" value=<?= $price[$i] * $quantity[$i]; ?> readonly>
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
                                                        <div>
                                                            <input type='checkbox' class="form-check-input large-checkbox" name='cal' id='cal' value='1' /> Do you want Edit?
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
                                                            <div class="form-group">
                                                                <label for="city" class="form-label">HSN</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="hsn" name="hsn" placeholder="HSN" value="<?= $fc['hsn'] ?>">
                                                                    <!-- <div id="results"></div> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-lg-12 mb-2" hidden>
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
                                                        <!-- <?php
                                                                echo $cal;
                                                                ?> -->
                                                        <div class="col-lg-2">
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
                                                        <div class="col-lg-2">
                                                            <div class="form-group"><label for="net_amount" class="form-label" style="margin-left:30px">Discount<spam>*</spam></label>
                                                                <div class="form-control-wrap">
                                                                    <div class="row">
                                                                        <div class="col-1"></div>
                                                                        <div class="col-9">
                                                                            <input type="number" class="form-control main_discount" id="main_discount" name="discount" value="<?= $fc['discount']; ?>">
                                                                        </div>
                                                                        <div class="col-2">
                                                                            <input type="text" class="form-control main_discount1" id="main_discount1" name="main_discount1" hidden value=<?= $fc['discount']; ?> style='margin-left:-30px' readonly>
                                                                            <a href="#" class='btn btn-primary btn_discount form-control' style="margin-left:-32px" hidden>Discount</a>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="form-group"><label for="net_amount" class="form-label" style="margin-left:30px">SGST Tax<spam>*</spam></label>
                                                                <div class="form-control-wrap">
                                                                    <div class="row">
                                                                        <div class="col-1"></div>
                                                                        <div class="col-8">
                                                                            <input type="number" class="form-control main_tax" id="main_tax" name="tax" value="<?= $fc['tax']; ?>">
                                                                        </div>
                                                                        <div class="col-2">
                                                                            <a href="#" class='btn btn-primary btn_tax form-control' style="margin-left:-32px" hidden>SGST</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="form-group"><label for="net_amount" class="form-label" style="margin-left:30px">CGST Tax<spam>*</spam></label>
                                                                <div class="form-control-wrap">
                                                                    <div class="row">
                                                                        <div class="col-1"></div>
                                                                        <div class="col-8">
                                                                            <input type="number" class="form-control main_tax" id="main_tax" name="cgst" value="<?= $fc['cgst']; ?>">
                                                                        </div>
                                                                        <div class="col-2">
                                                                            <a href="#" class='btn btn-primary btn_tax form-control' style="margin-left:-32px" hidden>CGST</a>
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

<script>
    $(document).ready(function() {
        // Auto-fill Bike Name & Brand based on selected Chassis
        $('.chassis_select').change(function() {
            let index = $(this).data('index');
            let chassis = $(this).val();

            $.ajax({
                url: 'get_bike_details.php', // Create this file to fetch book_name & brand by chassis
                type: 'GET',
                data: {
                    chassis_no: chassis
                },
                dataType: 'json',
                success: function(res) {
                    $(`.book_name:eq(${index})`).val(res.book_name);
                    $(`.brand:eq(${index})`).val(res.brand);
                }
            });
        });

        // Auto-calculate total price
        $('.price').on('input', function() {
            let row = $(this).closest('.bike-row');
            let price = parseFloat($(this).val()) || 0;
            let qty = parseInt(row.find('input[name="quantity[]"]').val()) || 1;
            row.find('.tp').val(price * qty);
        });
    });
</script>

</html>