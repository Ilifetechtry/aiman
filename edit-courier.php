<?php

include 'sidebar.php';
?>
<?php

if (isset($_POST['save'])) {
    $customer_id = $_GET['id'];
    echo $customer_id;

    $sel = mysqli_query($conn, "SELECT * FROM customer1 where id=$customer_id");
    if (mysqli_num_rows($sel) > 0) {

        $final_update = mysqli_query($conn, "UPDATE invoice set 
            address='" . $_POST['address'] . "',
            l_r_date='" . $_POST['l_r_date'] . "',
            l_r_no='" . $_POST['l_r_no'] . "',
            delivery_type='" . $_POST['delivery_type'] . "',
            remarks='" . $_POST['remarks'] . "'
            where id=$customer_id");


        $final_update1 = mysqli_query($conn, "UPDATE customer1 set 
            address='" . $_POST['address'] . "',
            mobile='" . $_POST['mobile'] . "',
            city='" . $_POST['city'] . "',
            l_r_date='" . $_POST['l_r_date'] . "',
            l_r_no='" . $_POST['l_r_no'] . "',
            delivery_type='" . $_POST['delivery_type'] . "',
            remarks='" . $_POST['remarks'] . "'
            where id=$customer_id");

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
                        <li class="nav-item">
                            <a class="nav-link text-active-primary newuser activea" href="#">Edit Courier Invoice</a>
                        </li>
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
                                                            <div class="form-group"><label for="category" class="form-label">Place<spam>*</spam></label>
                                                                <div class="form-control-wrap">
                                                                    <select id="districtSelect" class="form-select" name="city">
                                                                        <option value=<?= $fc['city']; ?> selected hidden><?= $fc['city']; ?></option>
                                                                        <?php
                                                                        $sel = mysqli_query($conn, "SELECT * FROM district order by district");
                                                                        if (mysqli_num_rows($sel) > 0) {
                                                                            while ($fd = mysqli_fetch_array($sel)) {
                                                                        ?>
                                                                                <option value="<?= $fd['district']; ?>"><?= $fd['district']; ?></option>
                                                                        <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
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
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="address" class="form-label">Address<spam>*</spam></label>
                                                                <div class="form-control-wrap">
                                                                    <textarea name="address" id="address" class="form-control" placeholder="Enter Address" required><?= htmlspecialchars($fc['address']) ?></textarea>
                                                                </div>
                                                                <!-- <input type="hidden" name="address" id="address1"> -->
                                                            </div>
                                                        </div>

                                                        <!-- Courier Details -->
                                                        <div class="row py-2 m-0 p-0  mt-4 bt m-auto">
                                                            <?php
                                                            $select_id = mysqli_query($conn, "SELECT * FROM customer1 order by id desc limit 1");
                                                            if (mysqli_num_rows($select_id) > 0) {
                                                                $fect = mysqli_fetch_assoc($select_id);
                                                                $value = 1000 + $fect['id'];
                                                            } else {
                                                                $value = 1000;
                                                            }
                                                            ?>
                                                            <div class="col-lg-4 my-2">
                                                                <div class="form-group">
                                                                    <label for="l_r_no" class="form-label">L.R No</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control" placeholder='Enter L.R No' name="l_r_no" id="l_r_no" value='L.R-#<?= $value; ?>'>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4 my-2">
                                                                <div class="form-group">
                                                                    <label for="l_r_date" class="form-label">L.R Date</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="date" class="form-control" name="l_r_date" value="<?= date('Y-m-d', strtotime('+5 days')); ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 my-2">
                                                                <div class="form-group">
                                                                    <label for="c_amount1" class="form-label">Delivery Types<spam>*</spam></label>
                                                                    <div class="form-control-wrap">
                                                                        <select name="delivery_type" id="" class="form-select" required>
                                                                            <option value="0" hidden>--SELECT MODE--</option>
                                                                            <?php
                                                                            $select_delivery = mysqli_query($conn, "SELECT * FROM delivery_type order by delivery_type asc");
                                                                            if (mysqli_num_rows($select_delivery) > 0) {
                                                                                while ($fetchhh = mysqli_fetch_assoc($select_delivery)) {
                                                                            ?>
                                                                                    <option value='<?= $fetchhh['delivery_type']; ?>'><?= $fetchhh['delivery_type']; ?></option>
                                                                            <?php
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12 my-2">
                                                                <div class="form-group">
                                                                    <label for="l_r_no" class="form-label">Remarks</label>
                                                                    <div class="form-control-wrap">
                                                                        <textarea type="text" class="form-control" placeholder='Enter Remarks' name="remarks" id="remarks"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-lg-3">
                                                            <input type="submit" name="save" class="btn btn-primary" style="margin-left:4%;margin-bottom:20px;margin-top:20px;" value="Save Changes">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>

                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>