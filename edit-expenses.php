<?php include 'sidebar.php'; ?>

<body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg" style="margin-top:40px">

<?php
$sel = mysqli_query($conn, "SELECT * FROM expenses WHERE id='" . $_GET['id'] . "' ");
$fe = mysqli_fetch_assoc($sel);

// Fetch brands
$brandList = mysqli_query($conn, "SELECT id, brand FROM brand ORDER BY brand ASC");
?>
<style>
    spam { color: red; }
    li, h2 { text-transform: capitalize; }
</style>

<div class="nk-content">
<div class="container">
<div class="nk-content-inner">
<div class="nk-content-body">

<div class="nk-block-head">
    <div class="nk-block-head-between flex-wrap gap g-2">
        <div class="nk-block-head-content">
            <h2 class="nk-block-title">Edit Expenses</h2>
            <nav>
                <ol class="breadcrumb breadcrumb-arrow mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Expenses</a></li>
                    <li class="breadcrumb-item active">Edit Expenses</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="nk-block">

<form method="post" enctype="multipart/form-data">
<div class="row g-gs">
    <div class="col-xxl-12">
        <div class="card card-gutter-md">
            <div class="card-body">
                <div class="row g-gs">

                    <!-- TYPE -->
                    <div class="col-lg-3">
                        <label class="form-label">Type <spam>*</spam></label>
                        <div class="d-flex">
                            <label class="me-3">
                                <input type="radio" name="type" value="purchase" 
                                    <?= ($fe['type'] == "purchase") ? "checked" : ""; ?> 
                                    onclick="toggleBrand()"> Purchase
                            </label>
                            <label>
                                <input type="radio" name="type" value="general" 
                                    <?= ($fe['type'] == "general") ? "checked" : ""; ?> 
                                    onclick="toggleBrand()"> General
                            </label>
                        </div>
                    </div>

                    <!-- BRAND DROPDOWN (Same as Add Form) -->
                    <div class="col-lg-3" id="brand_field" 
                        style="display:<?= ($fe['type'] == "purchase") ? "block" : "none"; ?>;">
                        
                        <label class="form-label">Brand <spam>*</spam></label>
                        <select class="form-control" name="brand" id="brand_select" onchange="setBrandName()">
                            <option value="">Select Brand</option>

                            <?php while ($b = mysqli_fetch_assoc($brandList)) { ?>
                                <option value="<?= $b['id'] ?>" 
                                    data-brand="<?= $b['brand']; ?>"
                                    <?= ($fe['brandid'] == $b['id']) ? "selected" : ""; ?>>
                                    
                                    <?= htmlspecialchars($b['brand']); ?>
                                </option>
                            <?php } ?>
                        </select>

                        <input type="hidden" name="brand_name" id="brand_name" value="<?= $fe['brand']; ?>">
                    </div>


                    <!-- BILL ID -->
                    <div class="col-lg-3">
                        <label class="form-label">Bill Number <spam>*</spam></label>
                        <input type="text" class="form-control" name="bid" value="<?= $fe['bid']; ?>">
                    </div>

                    <!-- BILL NAME -->
                    <div class="col-lg-3">
                        <label class="form-label">Particulars <spam>*</spam></label>
                        <input type="text" class="form-control" name="name" value="<?= $fe['name']; ?>">
                    </div>

                    <!-- PRICE -->
                    <div class="col-lg-3">
                        <label class="form-label">Bill Price <spam>*</spam></label>
                        <input type="number" step="0.01" class="form-control" name="price" id="price"
                               value="<?= $fe['price']; ?>" oninput="calculateTotal()">
                    </div>

                    <!-- QTY -->
                    <div class="col-lg-3">
                        <label class="form-label">Quantity <spam>*</spam></label>
                        <input type="number" min="1" class="form-control" name="quantity" id="quantity"
                               value="<?= $fe['quantity']; ?>" oninput="calculateTotal()">
                    </div>

                    <!-- TAX -->
                    <div class="col-lg-3">
                        <label class="form-label">Tax</label>
                        <input type="number" step="0.01" class="form-control" name="tax" id="tax"
                               value="<?= $fe['tax']; ?>" oninput="calculateTotal()">
                    </div>

                    <!-- TOTAL PRICE -->
                    <div class="col-lg-3">
                        <label class="form-label">Total Price</label>
                        <input type="number" step="0.01" class="form-control" name="total_price" id="total_price"
                               value="<?= $fe['total_price']; ?>" readonly>
                    </div>

                    <!-- DATE -->
                    <div class="col-lg-3">
                        <label class="form-label">Date <spam>*</spam></label>
                        <input type="date" class="form-control" name="date" value="<?= $fe['date']; ?>">
                    </div>

                    <!-- REMARKS -->
                    <div class="col-lg-12">
                        <label class="form-label">Remarks</label>
                        <textarea name="remarks" class="form-control"><?= $fe['remarks']; ?></textarea>
                    </div>

                    <!-- IMAGE -->
                    <div class="col-lg-12 text-center mt-4">
                        <img src="<?= $fe['upload_media']; ?>" height="150">
                        <input id="upload_media" type="file" name="upload_media" hidden>
                        <label for="upload_media" class="btn btn-primary mt-2">Upload New Image</label>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-3 mt-3">
        <input type="submit" name="submit" class="btn btn-primary" value="Update">
    </div>

</div>
</form>

</div>
</div>
</div>
</div>

<script>
function toggleBrand() {
    let type = document.querySelector('input[name="type"]:checked').value;
    document.getElementById("brand_field").style.display =
        type === "purchase" ? "block" : "none";
}

function setBrandName() {
    let sel = document.getElementById("brand_select");
    let bname = sel.options[sel.selectedIndex].dataset.brand;
    document.getElementById("brand_name").value = bname;
}

function calculateTotal() {
    let p = parseFloat(price.value) || 0;
    let q = parseInt(quantity.value) || 0;
    let t = parseFloat(tax.value) || 0;

    let total = p * q;
    total = total + (total * t / 100);

    total_price.value = total.toFixed(2);
}
</script>

</body>

<?php
// UPDATE QUERY
if (isset($_POST['submit'])) {

    mysqli_query($conn,
        "UPDATE expenses SET 
            type='{$_POST['type']}',
            brand='{$_POST['brand_name']}',
            brandid='{$_POST['brand']}',
            bid='{$_POST['bid']}',
            name='{$_POST['name']}',
            price='{$_POST['price']}',
            quantity='{$_POST['quantity']}',
            tax='{$_POST['tax']}',
            total_price='{$_POST['total_price']}',
            remarks='{$_POST['remarks']}',
            date='{$_POST['date']}'
        WHERE id='{$_GET['id']}'"
    );

    // IMAGE UPDATE
    if (!empty($_FILES["upload_media"]["tmp_name"])) {
        $path = "uploads/" . basename($_FILES["upload_media"]["name"]);
        move_uploaded_file($_FILES["upload_media"]["tmp_name"], $path);
        mysqli_query($conn, "UPDATE expenses SET upload_media='$path' WHERE id='{$_GET['id']}'");
    }

    echo "<script>
        Swal.fire({ icon:'success', title:'Updated Successfully' })
            .then(()=>window.location='expenses.php');
    </script>";
}
?>
