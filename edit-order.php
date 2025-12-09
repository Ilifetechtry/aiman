<?php
include 'sidebar.php';
?>

<body class="nk-body" style="margin-top:40px" data-sidebar-collapse="lg" data-navbar-collapse="lg">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="assets/js/bundle.js"></script>
    <script src="assets/js/scripts.js"></script>
    <div class="nk-content">
        <div class="container m-auto">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <h1 style="margin-top:10px;margin-bottom:20px">Billing Form</h1>
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
                        <!--begin:::Tab item-->

                        <!--end:::Tab item-->

                        <!--begin:::Tab item-->
                        <!-- <li class="nav-item">
                            <a class="nav-link text-active-primary existing activea" href="#">Existing Customer</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary newuser activea" href="#">New Customer</a>
                        </li>
                        <!--end:::Tab item-->

                    </ul>
                    <?php
                    $select1 = mysqli_query($conn, "SELECT * FROM customer1 where id='" . $_GET['id'] . "'");
                    if (mysqli_num_rows($select1) > 0) {
                        $fc = mysqli_fetch_assoc($select1);
                    ?>
                        <form method="post" name="form2" action="" style="margin-top:10px" onsubmit="return myFun()" autoComplete="off">
                            <div class="row g- new" id="new">
                                <div class="col-xxl-12">
                                    <div class="gap gy-4">
                                        <div class="gap-col">
                                            <div class="card card-gutter-md">
                                                <div class="card-body">
                                                    <div class="row g-gs">
                                                        <div class="col-lg-3 new_cus">
                                                            <div class="form-group"><label for="name" class="form-label">Customer Name<spam>*</spam></label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" name="cname" id="cname" placeholder="Enter your name" value=<?= $fc['cname'] ?> readonly />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 ex_cus">
                                                            <div class="form-group"><label for="choose_cus" class="form-label">Customer Name<spam>*</spam></label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" name="cname" id="cname" placeholder="Enter your name" value=<?= $fc['cname'] ?> readonly />
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-2">
                                                            <div class="form-group"><label for="mobile_num" class="form-label">Mobile<spam>*</spam></label>
                                                                <div class="form-control-wrap">
                                                                    <input type="tel" class="form-control" pattern="^[0-9]{10}$" id="mobile_num" name="mobile" placeholder="Enter your mobile number" value=<?= $fc['mobile'] ?> readonly>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- <div class="col-lg-3">
                                                            <div class="form-group"><label for="email" class="form-label">Email</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email id">
                                                                </div>
                                                            </div>
                                                        </div> -->

                                                        <div class="col-lg-2">
                                                            <div class="form-group"><label for="date" class="form-label">Billing Date<spam>*</spam></label>
                                                                <div class="form-control-wrap">
                                                                    <input type="date" class="form-control" id="date" name="date" value="<?= $fc['date']; ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <label for="city" class="form-label">City<spam>*</spam></label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="city" name="city" autocomplete="off" placeholder="Enter City" autosuggestion value=<?= $fc['city'] ?> readOnly>
                                                                    <div id="results"></div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="address" class="form-label">Address<spam>*</spam></label>
                                                                <div class="form-control-wrap">
                                                                    <textarea name="address1" id="address" class='form-control' placeholder='Enter Address' value=<?= $fc['address'] ?>></textarea>
                                                                </div>
                                                                <input type="hidden" name="address" id="address1">
                                                            </div>
                                                        </div>

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
                                                                        <select name="delivery_type" id="" class="form-select">
                                                                            <option value=<?= $fc['delivery_type']; ?> selected hidden><?= $fc['delivery_type']; ?></option>
                                                                            <!-- <option value="0" hidden>--SELECT MODE--</option> -->
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

                                                        <?php
                                                        // $category = explode(",", $fc['category_option']);
                                                        $category_name = explode(",", $fc['category_name']);
                                                        $quantity = explode(",", $fc['quantity']);
                                                        $price = explode(",", $fc['price']);
                                                        $specimen = explode(",", $fc['specimen']);
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
                                                            <div class="row category_append10 m-0 p-2 mt-3 mb-0 m-auto pt-3 pb-4 bt bg-light1">
                                                                <div class="col-lg-2 vav">
                                                                    <div class="form-group">
                                                                        <div class="form-control-wrap">
                                                                            <label for="" class="form-label">Book Name<spam>*</spam></label>
                                                                            <select class="form-select" data_id="'+click_count+'" id="p5" name="category_name[]" required>
                                                                                <option value="<?= $category_name[$i]; ?>"><?= $category_name[$i]; ?></option>
                                                                                <!-- <?php $seli = mysqli_query($conn, "SELECT * from book");
                                                                                        if (mysqli_num_rows($seli)) {
                                                                                            while ($fz = mysqli_fetch_assoc($seli)) {; ?>
                                                                                        <option value="<?= $fz['book_name']; ?>"><?= $fz['book_name']; ?></option>
                                                                                <?php }
                                                                                        } ?> -->
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2 vav">
                                                                    <div class="form-group">
                                                                        <div class="form-control-wrap"><label for="" class="form-label">Quantity <span id='quantity_text' class='form-label'></span>
                                                                                <spam>*</spam>
                                                                            </label>
                                                                            <input type="number" placeholder="Quantity" id="quantity<?= $count; ?>" name="quantity[]" class="form-control" value="<?= $quantity[$i]; ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-1 vav">
                                                                    <div class="form-group">
                                                                        <div class="form-control-wrap"><label for="" class="form-label">Spec. <span id='specimen_text' class='form-label'></span>
                                                                                <!-- <spam>*</spam> -->
                                                                            </label>
                                                                            <input type="number" placeholder="Specimen" id="specimen<?= $count; ?>" name="specimen[]" class="form-control" value="<?= $specimen[$i]; ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2 vav">
                                                                    <div class="form-group">
                                                                        <div class="form-control-wrap">
                                                                            <label for="" class="form-label">Price<spam>*</spam></label>
                                                                            <input type="text" placeholder="Price" class="form-control" data_id="<?= $i + 1; ?>" id="price<?= $count; ?>" name="price[]" value="<?= $price[$i]; ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2 vav">
                                                                    <div class="form-group">
                                                                        <div class="form-control-wrap">
                                                                            <label for="" class="form-label">Total Price<spam>*</spam></label>
                                                                            <input type="text" placeholder="Total Price" class="form-control tp" data_id=<?= $i; ?> id="tprice1<?= $count; ?>" value=<?= $price[$i] * $quantity[$i]; ?> readonly>
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
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <label class="form-label" style='color:transparent'>.</label>
                                                                <div class="form-control-wrap">
                                                                    <a id="add_category" class="btn form-control bg-success text-white"><em class="icon ni ni-plus-circle-fill emicon" style="margin-right:10px"></em>Add</a>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="category_append1 bg-light1 mt-0 pb-2 p-2">

                                                        </div>


                                                        <div class="col-lg-2 mb-2">
                                                            <div class="form-group"><label for="courier" class="form-label">Courier<spam>*</spam></label>
                                                                <div class="form-control-wrap">
                                                                    <input type="number" placeholder="Price" class="form-control" id="courier" name="courier" value=<?= $fc['courieramt']; ?>>
                                                                    <!-- <input type="text" class="form-control" id="courier" name="courier" value=""> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="d-flex align-items-center">
                                                                <label for="courieramt" class="form-label" style='margin-left:-60px'>Courier Amount</label>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-5">
                                                                    <input type="number" placeholder="Price" class="form-control d-none" id="courieramt" name="courieramt" hidden value=<?= $fc['courieramt']; ?>>
                                                                    <a href="#" class='btn btn-primary btn_courieramt form-control' style='margin-left:-60px'>0</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row  m-auto py-3 bt">
                                                        <!-- <div class="col-lg-2">
                                                            <div class="form-group"><label for="mop" class="form-label">Payment<spam>*</spam></label>
                                                                <div class="form-control-wrap">
                                                                    <select class="form-select" name="mop" id="mop1">
                                                                        <option value="Cash" selected>Cash</option>
                                                                        <option value="UPI">UPI</option>
                                                                        <option value="Credit">Credit</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group"><label for="net_amount" class="form-label">Net Amount<spam>*</spam></label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="net_amount" name="net_amount" value="" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="d-flex align-items-center">
                                                                <label for="main_discount" class="form-label">
                                                                    Discount in</label>
                                                                <div class='d-flex ms-2'>
                                                                    <span class='form-label border-end px-1'>( %</span>
                                                                    <span class='form-label border-end px-1'>Rs.</span>
                                                                    <span class='form-label px-1'>Total )</span>
                                                                </div>
                                                            </div>
                                                            <?php
                                                            $select_tax_disc = mysqli_query($conn, "SELECT * FROM settings");
                                                            if (mysqli_num_rows($select_tax_disc) > 0) {
                                                                $fes = mysqli_fetch_assoc($select_tax_disc);
                                                            }
                                                            ?>
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <input type="text" class="form-control main_discount" id="main_discount" name="discount" value=<?= $fes['discount']; ?>>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <input type="text" class="form-control main_discount1" id="main_discount1" name="main_discount1" value=<?= $fes['discount']; ?> style='margin-left:-30px' readonly>
                                                                </div>
                                                                <div class="col-lg-5">
                                                                    <a href="#" class='btn btn-primary btn_discount form-control' style='margin-left:-60px'>0</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <div class="d-flex align-items-center">
                                                                    <label for="main_tax" class="form-label">
                                                                        Tax in</label>
                                                                    <div class='d-flex'>
                                                                        <span class='form-label border-end px-1'>( %</span>
                                                                        <span class='form-label px-1'>Rs. )</span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-control-wrap">
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <input type="text" class="form-control main_tax" id="main_tax" name="tax" value=<?= $fes['tax']; ?>>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <a href="#" class='btn btn-primary btn_tax form-control' style="margin-left:-32px">0</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <label for="main_total" class="form-label">Total Amount<spam>*</spam></label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="main_total" name="total" value="" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 mt-4" id="c_ra">
                                                            <div class="form-group">
                                                                <label for="c_amount" class="form-label">Paid Amount<spam>*</spam></label>
                                                                <input type="hidden" value="" id="t_amount">
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="c_amount" name="c_amount">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 mt-4" id="c_r1a">
                                                            <div class="form-group">
                                                                <label for="r_amount" class="form-label">Remaining Amount<spam>*</spam></label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="r_amount" name="r_amount" readonly>
                                                                </div>
                                                            </div>
                                                        </div> -->

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

                                </div>
                                <input value="0" id="credit_status" name="credit_status" hidden>
                                <input type="hidden" value="" id="total_sample">
                                <input type="hidden" value="" id="q_count">
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


<script>
    let address = document.querySelector("#address");
    let address1 = document.querySelector("#address1");

    address.addEventListener("keyup", (e) => {
        address1.value = address.value.replace(/\n/g, "<br>"); // Replace newlines with <br>
    });
</script>

<?php
$customer_id = 0;
if (isset($_POST['save'])) {
    if ($_POST['choose_name'] == 0) {
        $ins1 = mysqli_query($conn, "INSERT INTO customer (cname,date,mobile,city,address,email)values('" . $_POST['cname'] . "','" . $_POST['date'] . "','" . $_POST['mobile'] . "','" . $_POST['city'] . "','" . $_POST['address'] . "','" . $_POST['email'] . "')");
        $customer_id = mysqli_insert_id($conn);
        $ins1a = mysqli_query($conn, "INSERT INTO invoice (cid,c_amount,r_amount,mop,discount,tax,total,net_amount,l_r_date,l_r_no,delivery_type,remarks,address,courieramt)values($customer_id,'" . $_POST['c_amount'] . "','" . $_POST['r_amount'] . "','" . $_POST['mop'] . "','" . $_POST['main_discount1'] . "','" . $_POST['tax'] . "','" . $_POST['total'] . "','" . $_POST['net_amount'] . "','" . $_POST['l_r_date'] . "','" . $_POST['l_r_no'] . "','" . $_POST['delivery_type'] . "','" . $_POST['remarks'] . "','" . $_POST['address'] . "','" . $_POST['courieramt'] . "')");

        $ins2 = mysqli_query($conn, "INSERT INTO customer1 (cid,cname,date,mobile,city,c_amount,r_amount,mop,discount,tax,total,net_amount,credit_status,address,l_r_date,l_r_no,delivery_type,remarks,courieramt)values($customer_id,'" . $_POST['cname'] . "','" . $_POST['date'] . "','" . $_POST['mobile'] . "','" . $_POST['city'] . "','" . $_POST['c_amount'] . "','" . $_POST['r_amount'] . "','" . $_POST['mop'] . "','" . $_POST['main_discount1'] . "','" . $_POST['tax'] . "','" . $_POST['total'] . "','" . $_POST['net_amount'] . "','" . $_POST['credit_status'] . "','" . $_POST['address'] . "','" . $_POST['l_r_date'] . "','" . $_POST['l_r_no'] . "','" . $_POST['delivery_type'] . "','" . $_POST['remarks'] . "','" . $_POST['courieramt'] . "')");
        if ($_POST['credit_status'] != 0) {
            $id_max = mysqli_query($conn, "SELECT max(id) from customer1");
            $id_fetch = mysqli_fetch_array($id_max);
            $ins = mysqli_query($conn, "INSERT INTO credit (bill_id,date,cname,due_amount,paid_amount,balance_amount)VALUES ('" . $id_fetch[0] . "','" . $_POST['date'] . "','" . $_POST['cname'] . "','" . $_POST['total'] . "','" . $_POST['c_amount'] . "','" . $_POST['r_amount'] . "')");
            $ins1 = mysqli_query($conn, "INSERT INTO credit1 (bill_id,date,cname,due_amount,paid_amount,balance_amount)VALUES ('" . $id_fetch[0] . "','" . $_POST['date'] . "','" . $_POST['cname'] . "','" . $_POST['total'] . "','" . $_POST['c_amount'] . "','" . $_POST['r_amount'] . "')");

            // die;
        }
    } else if ($_POST['choose_name'] != 0) {
        $select_name = mysqli_query($conn, "SELECT * FROM customer where id='" . $_POST['choose_name'] . "'");
        if (mysqli_num_rows($select_name) > 0) {
            $fech = mysqli_fetch_assoc($select_name);
            $ins3 = mysqli_query($conn, "UPDATE customer set cname='" . $fech['cname'] . "',mobile='" . $_POST['mobile'] . "',city='" . $_POST['city'] . "',address='" . $_POST['address'] . "',email='" . $_POST['email'] . "' where id='" . $_POST['choose_name'] . "'");
        }
        $ins3a = mysqli_query($conn, "INSERT INTO invoice (cid,c_amount,r_amount,mop,discount,tax,total,net_amount,date,l_r_date,l_r_no,delivery_type,remarks,address,courieramt)VALUES('" . $_POST['choose_name'] . "','" . $_POST['c_amount'] . "','" . $_POST['r_amount'] . "','" . $_POST['mop'] . "','" . $_POST['main_discount1'] . "','" . $_POST['tax'] . "','" . $_POST['total'] . "','" . $_POST['net_amount'] . "','" . $_POST['date'] . "','" . $_POST['l_r_date'] . "','" . $_POST['l_r_no'] . "','" . $_POST['delivery_type'] . "','" . $_POST['remarks'] . "','" . $_POST['address'] . "','" . $_POST['courieramt'] . "')");


        $ins4 = mysqli_query($conn, "INSERT INTO customer1 (cid,cname,date,mobile,city,c_amount,r_amount,mop,discount,tax,total,net_amount,credit_status,l_r_date,l_r_no,delivery_type,remarks,address,courieramt)values('" . $_POST['choose_name'] . "','" . $_POST['cname'] . "','" . $_POST['date'] . "','" . $_POST['mobile'] . "','" . $_POST['city'] . "','" . $_POST['c_amount'] . "','" . $_POST['r_amount'] . "','" . $_POST['mop'] . "','" . $_POST['main_discount1'] . "','" . $_POST['tax'] . "','" . $_POST['total'] . "','" . $_POST['net_amount'] . "','" . $_POST['credit_status'] . "','" . $_POST['l_r_date'] . "','" . $_POST['l_r_no'] . "','" . $_POST['delivery_type'] . "','" . $_POST['remarks'] . "','" . $_POST['address'] . "','" . $_POST['courieramt'] . "')");
        $customer_id = $_POST['choose_name'];

        $select_customer_id = mysqli_query($conn, "SELECT * from customer1 where cid=$customer_id");
        $cccc = 0;
        if (mysqli_num_rows($select_customer_id) > 0) {
            $fetch = mysqli_fetch_assoc($select_customer_id);
            $linsert_id = mysqli_query($conn, "SELECT max(id) from customer1");
            $flin = mysqli_fetch_array($linsert_id);
            $cuc = 0;
            $fetch['cid']++;
            $insert_id = mysqli_query($conn, "UPDATE customer1 set check_id='" . $flin[0] . "' where id='" . $flin[0] . "'");

            $insert_id1 = mysqli_query($conn, "UPDATE invoice set check_id='" . $flin[0] . "' where id='" . $flin[0] . "'");
        }
        if ($_POST['credit_status'] != 0) {
            $id_max = mysqli_query($conn, "SELECT max(id) from customer1");
            $id_fetch = mysqli_fetch_array($id_max);
            $ins = mysqli_query($conn, "INSERT INTO credit (bill_id,date,cname,due_amount,paid_amount,balance_amount)VALUES ('" . $id_fetch[0] . "','" . $_POST['date'] . "','" . $_POST['cname'] . "','" . $_POST['total'] . "','" . $_POST['c_amount'] . "','" . $_POST['r_amount'] . "')");
            $ins1 = mysqli_query($conn, "INSERT INTO credit1 (bill_id,date,cname,due_amount,paid_amount,balance_amount)VALUES ('" . $id_fetch[0] . "','" . $_POST['date'] . "','" . $_POST['cname'] . "','" . $_POST['total'] . "','" . $_POST['c_amount'] . "','" . $_POST['r_amount'] . "')");

            // die;
        }
    }




    echo "<br>";
    $pid = "";

    if (!empty($_POST['category_name'])) {
        $category_name = $_POST['category_name'];
        $l = count($category_name);
        for ($i = 0; $i < $l; $i++) {
            if ($category_name[$i] != 0) {
                // echo "--".$category_name[$i]."-"."<br>"; 
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
    if (!empty($_POST['specimen'])) {
        $quantity = $_POST['specimen'];
        $l = count($quantity);
        for ($i = 0; $i < $l; $i++) {
            if (!empty($quantity[$i])) {
                // echo $quantity[$i]."-"."<br>";
                $upd = mysqli_query($conn, "INSERT INTO all_tabs (customer_id,specimen)values($customer_id,'" . $quantity[$i] . "')");
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
    $cat_id = ["", "", "", "", "", "", "", ""];
    $sel = mysqli_query($conn, "SELECT * FROM all_tabs  where customer_id=$customer_id");
    if (mysqli_num_rows($sel) > 0) {
        while ($fe = mysqli_fetch_assoc($sel)) {
            $l = mysqli_num_rows($sel);

            if ($fe['category_name'] != '') {
                $cat_id[1] = $fe['category_name'] . ',' . $cat_id[1];
            }
            if ($fe['price'] != '') {
                $cat_id[2] = $fe['price'] . ',' . $cat_id[2];
            }
            if ($fe['quantity'] != '') {
                $cat_id[3] = $fe['quantity'] . ',' . $cat_id[3];
            }
            if ($fe['specimen'] != '') {
                $cat_id[4] = $fe['specimen'] . ',' . $cat_id[4];
            }
        }

        if ($_POST['choose_name'] == 0) {
            $final_update = mysqli_query($conn, "UPDATE invoice set 
                    date='" . $_POST['date'] . "',
                    category_name='" . $cat_id[1] . "', 
                    total='" . $_POST['total'] . "', 
                    net_amount='" . $_POST['net_amount'] . "',
                    price='" . $cat_id[2] . "',  
                    quantity='" . $cat_id[3] . "',
                    specimen='" . $cat_id[4] . "'
                    where cid=$customer_id");

            $final_update1 = mysqli_query($conn, "UPDATE customer1 set 
                    date='" . $_POST['date'] . "',
                    total='" . $_POST['total'] . "', 
                    net_amount='" . $_POST['net_amount'] . "',
                    category_name='" . $cat_id[1] . "', 
                    price='" . $cat_id[2] . "', 
                    quantity='" . $cat_id[3] . "',
                    specimen='" . $cat_id[4] . "'
                    where cid=$customer_id");
        } else if ($_POST['choose_name'] != 0) {
            $select_customer_id1 = mysqli_query($conn, "SELECT * from customer1 ORDER BY id desc limit 1");
            if (mysqli_num_rows($select_customer_id1) > 0) {
                $flin = mysqli_fetch_assoc($select_customer_id1);
            }
            $final_update = mysqli_query($conn, "UPDATE invoice set 
                    category_name='" . $cat_id[1] . "', 
                    date='" . $_POST['date'] . "',
                    check_id='" . $flin['id'] . "',
                    price='" . $cat_id[2] . "',
                    total='" . $_POST['total'] . "', 
                    net_amount='" . $_POST['net_amount'] . "', 
                    quantity='" . $cat_id[3] . "',
                    specimen='" . $cat_id[4] . "'
                    where cid='" . $_POST['choose_name'] . "' && check_id='" . $flin['id'] . "'");

            $final_update = mysqli_query($conn, "UPDATE customer1 set 
                    category_name='" . $cat_id[1] . "',
                    date='" . $_POST['date'] . "',
                    check_id='" . $flin['id'] . "',
                    price='" . $cat_id[2] . "',
                    total='" . $_POST['total'] . "', 
                    net_amount='" . $_POST['net_amount'] . "', 
                    quantity='" . $cat_id[3] . "',
                    specimen='" . $cat_id[4] . "'
                    where cid='" . $_POST['choose_name'] . "' && check_id='" . $flin['id'] . "'");
        }
        $delete = mysqli_query($conn, "TRUNCATE all_tabs");
        $sc_id = mysqli_query($conn, "SELECT max(id) from customer1");
        $select_customer_id = mysqli_fetch_array($sc_id);
    }



    $select_all_data = mysqli_query($conn, "SELECT * FROM customer1 order by id desc limit 1");
    if (mysqli_num_rows($select_all_data) > 0) {
        $feww = mysqli_fetch_assoc($select_all_data);
        $quantity = explode(",", $feww['quantity']);
        $specimen = explode(",", $feww['specimen']);
        $name = explode(",", $feww['category_name']);
        $l = 0;
        $myarr = [];
        foreach ($quantity as $qty) {
            $l += 1;
        }
        for ($i = 0; $i < $l; $i++) {
            $select_book = mysqli_query($conn, "SELECT * FROM book where book_name='" . $name[$i] . "'");
            if (mysqli_num_rows($select_book) > 0) {
                $fe_book = mysqli_fetch_assoc($select_book);
                $fulbuy = (int)$quantity[$i] + (int)$specimen[$i];
                $final_stock = $fe_book['book_stock'] - $fulbuy;
                echo "Book Name: " . $name[$i] . "<br>";
                echo "Original Stock: " . $fe_book['book_stock'] . "<br>";
                echo "Quantity: " . $quantity[$i] . "<br>";
                echo "Specimen: " . $specimen[$i] . "<br>";
                echo "Final Stock: " . $final_stock . "<br><hr>";
                $update_book = mysqli_query($conn, "UPDATE book SET book_stock='$final_stock' WHERE book_name='$name[$i]'");
            }
        }
    }
    $select_district = mysqli_query($conn, "SELECT * FROM district where district='" . $_POST['city'] . "'");
    if (mysqli_num_rows($select_district) == 0) {
        $insert_district = mysqli_query($conn, "INSERT INTO district (district) VALUES ('" . $_POST['city'] . "')");
    } else {
        echo "";
    }

?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Invoice Generated Successfully',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "billing-invoice.php?id=<?= $select_customer_id[0]; ?>";
            }
        });
    </script>
<?php

}

?>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<?php
include "common/jquery.php";
?>