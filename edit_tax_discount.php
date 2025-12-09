<?php include 'sidebar.php' ?>
<style>
    spam {
        color: red;
    }
</style>

<body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg" style="margin-top:50px">
    <?php
    $sel = mysqli_query($conn, "SELECT * FROM settings WHERE id='" . $_GET['id'] . "'");
    if (mysqli_num_rows($sel) > 0) {
        $fe = mysqli_fetch_assoc($sel);
    }
    ?>

    <div class="nk-content">
        <div class="container">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head">
                        <div class="nk-block-head-between flex-wrap gap g-2">
                            <div class="nk-block-head-content">
                                <h2 class="nk-block-title">Edit settings</h1>
                                    <nav>
                                        <ol class="breadcrumb breadcrumb-arrow mb-0">
                                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                            <li class="breadcrumb-item active" aria-current="page">Edit Settings</li>
                                        </ol>
                                    </nav>
                            </div>
                            <div class="nk-block-head-content">
                                <ul class="d-flex">
                                    <li><a href="settings.php" class="btn btn-primary btn-md d-md-none"><em class="icon ni ni-eye"></em><span>View</span></a></li>
                                    <li>&nbsp;&nbsp;<button onclick="history.go(-1)" class="btn btn-danger">Back</button></li>
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

                                                        <div class="col-lg-6">
                                                            <div class="form-group"><label class="form-label">Tax <spam>*</spam></label>
                                                                <div class="form-control-wrap"><input type="text" class="form-control" name="tax" value="<?= $fe['tax']; ?>"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group"><label class="form-label">Discount <spam>*</spam></label>
                                                                <div class="form-control-wrap"><input type="text" class="form-control" name="discount" value="<?= $fe['discount']; ?>"></div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="form-group"><label class="form-label">SGST Tax <spam>*</spam></label>
                                                                <div class="form-control-wrap"><input type="text" class="form-control" name="sgst" value="<?= $fe['sgst']; ?>"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group"><label class="form-label">CGST Tax <spam>*</spam></label>
                                                                <div class="form-control-wrap"><input type="text" class="form-control" name="cgst" value="<?= $fe['cgst']; ?>"></div>
                                                            </div>
                                                        </div>


                                                        <div class="row" style="margin-top:20px">
                                                            <div class="col-3">
                                                                <input type="submit" name="submit" value="Edit" class="btn btn-primary" class="form-control">
                                                            </div>
                                                        </div>
                        </form>
                    </div>
                </div>
            </div>
</body>
<script src="assets/js/bundle.js"></script>
<script src="assets/js/scripts.js"></script>
<link rel="stylesheet" href="assets/css/libs/editors/quill20d4.css?v1.1.2">
</link>
<script src="assets/js/libs/editors/quill.js"></script>
<script src="assets/js/editors/quill.js"></script>

</html>
<?php
if (isset($_POST['submit'])) {
    $cgst = (float) $_POST['cgst'];
    $sgst = (float) $_POST['sgst'];
    $taxper = $cgst + $sgst;
    echo ('>' . (float) $taxper . ',' . (float) $_POST['cgst'] . ',' . (float) $_POST['sgst'] );
    $upd = mysqli_query($conn, "UPDATE settings 
                SET tax='$taxper',
                discount='" . $_POST['discount'] . "',
                cgst='" . $_POST['cgst'] . "',
                sgst='" . $_POST['sgst'] . "'
                WHERE id='" . $_GET['id'] . "'");
?>
    <script>
        location.href = "tax_discount.php"
    </script>
<?php
}

?>