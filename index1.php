<?php include 'sidebar.php' ?>

<?php
$customer = mysqli_query($conn, "SELECT count(id) FROM customer");
$customer_count = mysqli_fetch_array($customer);
$product = mysqli_query($conn, "SELECT count(id) FROM book");
$product_count = mysqli_fetch_array($product);
$expenses = mysqli_query($conn, "SELECT SUM(price) AS total FROM expenses");
$total_res = mysqli_query($conn, "SELECT SUM(total) as total_amount from invoice");


if ($expenses) {
    $expenses_count = mysqli_fetch_array($expenses);
    $expenses_total = $expenses_count['total'] ?? 0; // Use null coalescing to handle NULL case
} else {
    $expenses_total = 0; // Query failed case
}

if ($total_res) {
    $total_res_count = mysqli_fetch_array($total_res);
    $total_res_total = $total_res_count['total_amount'] ?? 0; // Use null coalescing to handle NULL case
} else {
    $total_res_total = 0; // Query failed case
}
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg" style="margin-top:50px">
    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="row g-gs">
                    <div class="col-12">
                        <!-- <h2>Main Menus</h2> -->
                    </div>
                    <div class="col-xl-3 col-xxl-3 d-none">
                        <a href="customer.php">
                            <div class="card h-100">
                                <div class="card-body">
                                    <br>
                                    <center>
                                        <div class="media media-middle media-circle border bg-bgColor text-white mb-3"><em class="icon ni ni-users-fill"></em></div><b style="font-size:25px" class='text-bgColor'>&nbsp;&nbsp;<?= $customer_count[0]; ?></b>
                                    </center>
                                    <h3 class="text-bgColor" align="center">Customers</h3>
                                    <br>
                                </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-3 d-none">
                    <a href="expenses.php">
                        <div class="card h-100">
                            <div class="card-body">
                                <br>
                                <center>
                                    <div class="media media-middle media-circle border bg-bgColor text-white mb-3"><em class="icon ni ni-growth-fill"></em></div><b style="font-size:25px" class='text-bgColor'>&nbsp;&nbsp;<?= $expenses_total; ?></b>
                                </center>
                                <h3 class="text-bgColor" align="center">Expenses</h3>
                                <br>
                            </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-3 d-none">
                <a href="allincomes.php">
                    <div class="card h-100">
                        <div class="card-body">
                            <br>
                            <center>
                                <div class="media media-middle media-circle border bg-bgColor text-white mb-3"><em class="icon ni ni-sign-inr"></em></div><b style="font-size:25px" class="text-bgColor">&nbsp;&nbsp;<?= $total_res_total; ?></b>
                            </center>
                            <h3 class="text-bgColor" align="center">Income</h3>
                            <br>
                        </div>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-xxl-3 d-none">
            <a href="book.php">
                <div class="card h-100 bg-white">
                    <div class="card-body">
                        <br>
                        <center>
                            <div class="media media-middle media-circle border bg-bgColor text-white mb-3"><em class="icon fas fa-motorcycle"></em></div><b style="font-size:25px" class="text-bgColor">&nbsp;&nbsp;<?= $product_count[0]; ?></b>
                        </center>
                        <h3 class="text-bgColor" align="center">Bikes</h3>
                        <br>
                    </div>
            </a>
        </div>
    </div>
    <!-- <div class='bt'></div> -->
    <div class="col-12 mt-3">
        <h2>Bikes</h2>
    </div>
    <?php
    $all_books = mysqli_query($conn, "SELECT * FROM book");
    if (mysqli_num_rows($all_books) > 0) {
        while ($fe = mysqli_fetch_assoc($all_books)) {
            if ($fe['book_stock'] <= $fett_min_count['minimum_book_stock']) {
                $bg1 = "danger";
                $bg2 = "white";
                $main_bg = 'danger';
                $animate = 'animate';
            } else {
                $bg2 = "success";
                $bg1 = "success";
                $main_bg = 'white';
                $animate = '';
            }
    ?>
            <div class="col-xl-4 col-xxl-4">
                <a href="edit-book.php?id=<?= $fe['id'] ?>">
                    <div class="card h-100 bg-<?= $main_bg; ?> <?= $animate; ?>">
                        <div class="card-body">
                            <br>
                            <center>
                                <?php
                                if ($fe['book_image']) {
                                ?>
                                    <img src="uploads/<?= $fe['book_image'] ?>" alt="" height='60'>
                                <?php
                                } else {
                                ?>
                                    <img src="images/default.jpg" alt="" height='60' style='border:1px solid silver'>
                                <?php
                                }
                                ?> <br>
                                <div class="media media-middle media-circle  bg-<?= $bg2; ?> text-<?= $main_bg ?> mb-3"><em class="icon fas fa-motorcycle"></em></div><b style="font-size:25px" class="text-<?= $bg2; ?>">&nbsp;&nbsp;<?= $fe['book_stock']; ?> Bikes</b>
                            </center>
                            <h3 class="text-<?= $bg2; ?>" align="center"><?= $fe['book_name']; ?></h3>
                            <br>

                        </div>
                </a>
            </div>
            </div>
    <?php
        }
    }
    ?>


    </div>
    </div>
    </div>
    </div>
</body>



<script src="assets/js/bundle.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="assets/js/charts/ecommerce-chart.js"></script>

</html>