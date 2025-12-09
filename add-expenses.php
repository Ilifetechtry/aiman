<?php include 'sidebar.php'; ?>

<body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg" style="margin-top:40px">
    <script src="assets/js/bundle.js"></script>
    <script src="assets/js/scripts.js"></script>
    <style>
        spam {
            color: red;
        }

        label {
            text-transform: capitalize;
        }

        input[type="radio"] {
            transform: scale(1.4);
            /* Increase size: 1.2, 1.4, 1.6, etc */
            margin-right: 5px;
            /* Space between radio and label */
            cursor: pointer;
        }
    </style>
    <div class="nk-content">
        <div class="container">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head">
                        <div class="nk-block-head-between flex-wrap gap g-2">
                            <div class="nk-block-head-content">
                                <h2 class="nk-block-title">Add Expenses</h1>
                                    <nav>
                                        <ol class="breadcrumb breadcrumb-arrow mb-0">
                                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                                            <li class="breadcrumb-item"><a href="#">Expenses</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Add Expenses</li>
                                        </ol>
                                    </nav>
                            </div>
                            <div class="nk-block-head-content">
                                <ul class="d-flex">
                                    <li>
                                        <a href="expenses.php" class="btn btn-primary btn-md d-md-none">
                                            <em class="icon ni ni-eye"></em><span>View</span></a>
                                    </li>
                                    <li>
                                        <a href="expenses.php" class="btn btn-success d-none d-md-inline-flex"><em class="icon ni ni-eye"></em><span>View All expenses</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="nk-block">
                        <?php
                        if (isset($_POST['submit'])) {
                            $ins = mysqli_query($conn, "INSERT INTO expenses (bid, type, brand, brandid, name, price, quantity, tax, total_price, remarks, date) VALUES 
                            (
                                '" . $_POST['bid'] . "',
                                '" . $_POST['type'] . "',
                                '" . $_POST['brand_name'] . "',
                                '" . $_POST['brand'] . "',
                                '" . $_POST['name'] . "',
                                '" . $_POST['price'] . "',
                                '" . $_POST['quantity'] . "',
                                '" . $_POST['tax'] . "',
                                '" . $_POST['total_price'] . "',
                                '" . $_POST['remarks'] . "',
                                '" . $_POST['date'] . "'
                            )");
                            $iddd = mysqli_insert_id($conn);
                            if ($_FILES["upload_media"]["tmp_name"] != '') {
                                $target_dir = "uploads/";
                                $target_file2 = $target_dir . basename($_FILES["upload_media"]["name"]);
                                $check2 = getimagesize($_FILES["upload_media"]["tmp_name"]);
                                if ($check2 !== false) {
                                    if (move_uploaded_file($_FILES["upload_media"]["tmp_name"], $target_file2)) {
                                        $ins = mysqli_query($conn, "UPDATE expenses set upload_media='" . $target_file2 . "' where id='" . $iddd . "'");
                        ?>
                            <?php
                                    }
                                }
                            }
                            ?>
                            <script>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Added Successfully',
                                    confirmButtonText: 'OK'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = "expenses.php";
                                    }
                                });
                            </script>
                        <?php
                        }
                        $sel = mysqli_query($conn, "SELECT max(id) from expenses");
                        if (mysqli_num_rows($sel) > 0) {
                            $fe = mysqli_fetch_array($sel);
                            $fes = $fe[0];
                        ?>

                            <form action="#" method="post" enctype="multipart/form-data">
                                <div class="row g-gs">
                                    <div class="col-xxl-12">
                                        <div class="gap gy-4">
                                            <div class="gap-col">
                                                <div class="card card-gutter-md">
                                                    <div class="card-body">
                                                        <div class="row g-gs">

                                                            <!-- TYPE (Purchase / General) -->
                                                            <div class="col-lg-12">
                                                                <label class="form-label">Type <spam>*</spam></label>
                                                                <div class="d-flex">
                                                                    <label class="radio-label me-3">
                                                                        <input required type="radio" name="type" value="purchase" onclick="toggleBrand()"> Purchase
                                                                    </label>

                                                                    <label class="radio-label">
                                                                        <input required type="radio" name="type" value="general" checked onclick="toggleBrand()"> General
                                                                    </label>

                                                                </div>
                                                            </div>

                                                            <!-- BRAND FIELD (Only if Purchase selected) -->
                                                            <div class="col-lg-12 text-center" id="brand_field1" style="display:none;">
                                                                <h1>Purchase Bill</h1>
                                                            </div>
                                                            <div class="col-lg-3" id="brand_field" style="display:none;">
                                                                <div class="form-group">
                                                                    <label class="form-label">Brand <spam>*</spam></label>
                                                                    <?php
                                                                    $brands = $conn->query("SELECT id, brand FROM brand ORDER BY brand ASC");
                                                                    ?>

                                                                    <select class="form-control" name="brand" id="brand_select" onchange="setBrandName()" >
                                                                        <option value="">Select Brand</option>

                                                                        <?php while ($row = $brands->fetch_assoc()) { ?>
                                                                            <option value="<?= $row['id'] ?>" data-brand="<?= $row['brand']?>">
                                                                                <?= htmlspecialchars($row['brand']) ?>
                                                                            </option>
                                                                        <?php } ?>
                                                                    </select>
                                                                    <input type="hidden" name="brand_name" id="brand_name">
                                                                </div>
                                                            </div>

                                                            <!-- BILL ID -->
                                                            <div class="col-lg-3">
                                                                <div class="form-group">
                                                                    <label class="form-label">Bill Id <spam>*</spam></label>
                                                                    <input required type="text" class="form-control" name="bid" value="BID-<?= $fes + 1; ?>">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-3">
                                                                <div class="form-group">
                                                                    <label class="form-label">Bill Date <spam>*</spam></label>
                                                                    <input type="date" value="<?= date('Y-m-d'); ?>" name="date" class='form-control'>
                                                                </div>
                                                            </div>

                                                            <!-- BILL NAME -->
                                                            <div class="col-lg-3">
                                                                <div class="form-group">
                                                                    <label class="form-label">Particulars <spam>*</spam></label>
                                                                    <input required type="text" class="form-control" name="name">
                                                                </div>
                                                            </div>

                                                            <!-- PRICE -->
                                                            <div class="col-lg-3">
                                                                <div class="form-group">
                                                                    <label class="form-label">Bill Price <spam>*</spam></label>
                                                                    <input required type="number" step="0.01" class="form-control" name="price" id="price" oninput="calculateTotal()">
                                                                </div>
                                                            </div>

                                                            <!-- QUANTITY -->
                                                            <div class="col-lg-3">
                                                                <div class="form-group">
                                                                    <label class="form-label">Quantity <spam>*</spam></label>
                                                                    <input required type="number" min="1" value="1" class="form-control" name="quantity" id="quantity" oninput="calculateTotal()">
                                                                </div>
                                                            </div>

                                                            <!-- TAX -->
                                                            <div class="col-lg-3">
                                                                <div class="form-group">
                                                                    <label class="form-label">Tax</label>
                                                                    <input type="number" step="0.01" class="form-control" name="tax" id="tax" oninput="calculateTotal()">
                                                                </div>
                                                            </div>

                                                            <!-- TOTAL PRICE (Auto Calculated) -->
                                                            <div class="col-lg-3">
                                                                <div class="form-group">
                                                                    <label class="form-label">Total Price</label>
                                                                    <input type="number" step="0.01" readonly class="form-control" name="total_price" id="total_price">
                                                                </div>
                                                            </div>                                                            

                                                            <!-- FILE UPLOAD -->
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">Bill Photo</label>
                                                                    <input id="upload_media" class="form-control" name="upload_media" type="file">
                                                                </div>
                                                            </div>

                                                            <!-- REMARKS -->
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">Remarks</label>
                                                                    <textarea name="remarks" class="form-control"></textarea>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <input type="submit" name="submit" class="btn btn-primary" value="Save Changes">
                                </div>

                            </form>


</body>

<script>
    function toggleBrand() {
        let type = document.querySelector('input[name="type"]:checked').value;
        document.getElementById('brand_field').style.display =
            type === 'purchase' ? 'block' : 'none';
        document.getElementById('brand_field1').style.display =
            type === 'purchase' ? 'block' : 'none';
    }

    function calculateTotal() {
        let price = parseFloat(document.getElementById("price").value) || 0;
        let qty = parseInt(document.getElementById("quantity").value) || 0;
        let tax = parseFloat(document.getElementById("tax").value) || 0;

        let total = (price * qty);
        let to1 = total + (total * tax / 100);
        document.getElementById("total_price").value = to1.toFixed(2);
    }

    function setBrandName() {
    let select = document.getElementById("brand_select");
    let brandName = select.options[select.selectedIndex].getAttribute("data-brand");
    document.getElementById("brand_name").value = brandName;
    console.log('brand name', brandName)
}


</script>


</html>

<?php
                        }
?>