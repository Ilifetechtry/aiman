<?php include 'sidebar.php' ?>

<body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg" style="margin-top:40px">
    <?php
    $sel = mysqli_query($conn, "SELECT * FROM book WHERE id='" . $_GET['id'] . "' ");
    if (mysqli_num_rows($sel) > 0) {
        $fe = mysqli_fetch_assoc($sel);
    }
    ?>
    <style>
        spam {
            color: red;
        }
    </style>

    <div class="nk-content">
        <div class="container">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head">
                        <div class="nk-block-head-between flex-wrap gap g-2">
                            <div class="nk-block-head-content">
                                <h2 class="nk-block-title">Edit Book</h2>
                                <nav>
                                    <ol class="breadcrumb breadcrumb-arrow mb-0">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Book</li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit Book</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="nk-block-head-content">
                                <ul class="d-flex">
                                    <li><a href="book.php" class="btn btn-primary btn-md d-md-none"><em class="icon ni ni-eye"></em><span>View</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="nk-block">
                        <form method="post" enctype="multipart/form-data">
                            <div class="row g-gs">
                                <div class="col-xxl-12">
                                    <div class="gap gy-4">
                                        <div class="gap-col">
                                            <div class="card card-gutter-md">
                                                <div class="card-body">
                                                    <div class="row g-gs">

                                                        <!-- Purchase Bill -->
                                                        <div class="col-lg-3">
                                                            <div class="form-group">
                                                                <label class="form-label">Brand <spam>*</spam></label>

                                                                <?php
                                                                $brand_q = mysqli_query($conn, "SELECT brand FROM brand ORDER BY brand ASC");
                                                                ?>

                                                                <select class="form-control" name="brand" id="brand_select" onchange="loadBillsByBrand()" required>
                                                                    <option value="">Select Brand</option>

                                                                    <?php while ($b = mysqli_fetch_assoc($brand_q)) { ?>
                                                                        <option value="<?= $b['brand']; ?>"
                                                                            <?= ($fe['brand'] == $b['brand']) ? 'selected' : ''; ?>>
                                                                            <?= $b['brand']; ?>
                                                                        </option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                    </div>


                                                    <!-- PURCHASE BILL DROPDOWN -->
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label class="form-label">Purchase Bill ID <spam>*</spam></label>

                                                            <select name="purchase_bid" id="purchase_bid" class="form-control" required>
                                                                <option value="">Select Bill</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- HSN -->
                                                    <div class="col-lg-3" id="hsn_box" style="display:<?= ($fe['hsn']) ? 'block' : 'none' ?>;">
                                                        <div class="form-group">
                                                            <label class="form-label">HSN Code</label>
                                                            <input type="text" class="form-control" name="hsn" id="hsn" value="<?= $fe['hsn']; ?>">
                                                        </div>
                                                    </div>

                                                    <!-- Book Name -->
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label class="form-label">Book Name <spam>*</spam></label>
                                                            <input type="text" class="form-control" name="book_name" value="<?= $fe['book_name']; ?>">
                                                        </div>
                                                    </div>

                                                    <!-- Uploaded Date -->
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label class="form-label">Uploaded Date <spam>*</spam></label>
                                                            <input type="date" class="form-control" name="upload_date" value="<?= $fe['upload_date']; ?>">
                                                        </div>
                                                    </div>

                                                    <!-- Book Price -->
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                            <label class="form-label">Book Price <spam>*</spam></label>
                                                            <input type="number" class="form-control" name="book_price" value="<?= $fe['book_price']; ?>">
                                                        </div>
                                                    </div>

                                                    <!-- Book Stock -->
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                            <label class="form-label">Book Stock <spam>*</spam></label>
                                                            <input type="number" class="form-control" name="book_stock" value="<?= $fe['book_stock']; ?>">
                                                        </div>
                                                    </div>

                                                    <!-- Color -->
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label class="form-label">Color</label>
                                                            <input type="text" class="form-control" name="color" value="<?= $fe['color']; ?>">
                                                        </div>
                                                    </div>

                                                    <!-- Chassis No -->
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label class="form-label">Chassis No</label>
                                                            <input type="text" class="form-control" name="chassis_no" value="<?= $fe['chassis_no']; ?>">
                                                        </div>
                                                    </div>

                                                    <!-- Motor No -->
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label class="form-label">Motor No</label>
                                                            <input type="text" class="form-control" name="motor_no" value="<?= $fe['motor_no']; ?>">
                                                        </div>
                                                    </div>

                                                    <!-- Controller No -->
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label class="form-label">Controller No</label>
                                                            <input type="text" class="form-control" name="controller_no" value="<?= $fe['controller_no']; ?>">
                                                        </div>
                                                    </div>

                                                    <!-- Charger No -->
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label class="form-label">Charger No</label>
                                                            <input type="text" class="form-control" name="charger_no" value="<?= $fe['charger_no']; ?>">
                                                        </div>
                                                    </div>

                                                    <!-- Battery Model -->
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label class="form-label">Battery Model</label>
                                                            <input type="text" class="form-control" name="battery_model" value="<?= $fe['battery_model']; ?>">
                                                        </div>
                                                    </div>

                                                    <!-- Battery Serial No -->
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label class="form-label">Battery Serial No</label>
                                                            <input type="text" class="form-control" name="battery_sn" value="<?= $fe['battery_sn']; ?>">
                                                        </div>
                                                    </div>

                                                    <!-- Book Image -->
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <?php if ($fe['book_image']) { ?>
                                                                <label class="form-label">Change Book Image</label>
                                                                <img src="uploads/<?= $fe['book_image'] ?>" alt="" id="myBookImg" height="170">
                                                            <?php } else { ?>
                                                                <label class="form-label">Upload Book Image</label>
                                                                <img id="myBookImg" style="max-height:200px;" class="mb-3">
                                                            <?php } ?>
                                                            <input type="file" id="book_image" name="book_image" accept="image/*" class="form-control mt-2">
                                                        </div>
                                                    </div>

                                                    <!-- Remarks -->
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Remarks</label>
                                                            <textarea name="remarks" class="form-control"><?= $fe['remarks']; ?></textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit -->
                                <div class="row" style="margin-top:20px">
                                    <div class="col-9"></div>
                                    <div class="col-3 text-end">
                                        <input type="submit" name="submit" value="Update Book" class="btn btn-primary">
                                    </div>
                                </div>

                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        function loadBillsByBrand(selectedBillId = null) {
            let brand = document.getElementById("brand_select").value;

            if (brand === "") {
                document.getElementById("purchase_bid").innerHTML = "<option value=''>Select Bill</option>";
                return;
            }

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "load_bills.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhr.onload = function() {
                let dropdown = document.getElementById("purchase_bid");
                dropdown.innerHTML = this.responseText;
                if (selectedBillId) {
                    dropdown.value = selectedBillId;
                }
            };

            xhr.send("brand=" + brand);
        }

        window.onload = function() {
            let brand = "<?= $fe['brand'] ?>";
            let billId = "<?= $fe['purchase_bid'] ?>";

            if (brand !== "") {
                loadBillsByBrand(billId);
            }
        };
    </script>

    <script>
        let book_image = document.querySelector("#book_image");
        let myBookImg = document.querySelector("#myBookImg");
        book_image.addEventListener('change', (e) => {
            const image = URL.createObjectURL(e.target.files[0]);
            myBookImg.src = image;
        });
    </script>

    <?php
    if (isset($_POST['submit'])) {
        $upd = mysqli_query($conn, "UPDATE book SET 
        purchase_bid = '" . $_POST['purchase_bid'] . "',
        brand = '" . $_POST['brand'] . "',
        hsn = '" . $_POST['hsn'] . "',
        book_name = '" . $_POST['book_name'] . "',
        upload_date = '" . $_POST['upload_date'] . "',
        book_price = '" . $_POST['book_price'] . "',
        book_stock = '" . $_POST['book_stock'] . "',
        color = '" . $_POST['color'] . "',
        chassis_no = '" . $_POST['chassis_no'] . "',
        motor_no = '" . $_POST['motor_no'] . "',
        controller_no = '" . $_POST['controller_no'] . "',
        charger_no = '" . $_POST['charger_no'] . "',
        battery_model = '" . $_POST['battery_model'] . "',
        battery_sn = '" . $_POST['battery_sn'] . "',
        remarks = '" . $_POST['remarks'] . "' 
        WHERE id = '" . $_GET['id'] . "'");

        if ($_FILES["book_image"]["tmp_name"] != '') {
            $target_dir = "uploads/";
            $timestamp = time();
            $imageFileType = pathinfo($_FILES["book_image"]["name"], PATHINFO_EXTENSION);
            $target_file2 = $target_dir . $timestamp . "." . $imageFileType;
            $target_file3 = $timestamp . "." . $imageFileType;

            if (move_uploaded_file($_FILES["book_image"]["tmp_name"], $target_file2)) {
                mysqli_query($conn, "UPDATE book SET book_image='" . $target_file3 . "' WHERE id='" . $_GET['id'] . "'");
            }
        }
    ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Updated Successfully',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "book.php";
                }
            });
        </script>
    <?php
    }
    ?>