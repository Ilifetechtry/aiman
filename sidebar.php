<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db/connection.php';
include 'db/session.php';
include 'common/common_css.php';
?>


<?php
$sel2 = mysqli_query($conn, "SELECT * from users where id='" . $_SESSION['user_id'] . "'");
if (mysqli_num_rows($sel2) > 0) {
    $ft = mysqli_fetch_assoc($sel2);
    echo ($ft['role']);


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/css/style20d4.css?v1.1.2">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <title>ILife </title>
        <link rel="shortcut icon" href="images/fav.png">

    </head>

    <body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg">
        <div class="nk-app-root">
            <div class="nk-main">
                <div class="nk-sidebar nk-sidebar-fixed is-theme" id="sidebar">
                    <div class="nk-sidebar-element nk-sidebar-head">
                        <div class="nk-sidebar-brand">
                            <a href="index1.php" class="logo-link">
                                <img class="app-sidebar-logo-default" src="images/logo1.png" height="120px" width="350px">
                                <div class="logo-wrap"></div>
                            </a>
                            <div class="nk-sidebar-toggle me-n1">
                                <button class="btn btn-md btn-icon text-light btn-no-hover sidebar-toggle">
                                    <em class="icon ni ni-arrow-left"></em></button>
                            </div>
                        </div>
                    </div>
                    <div class="nk-sidebar-element nk-sidebar-body" style="margin-top:-15px">
                        <div class="nk-sidebar-content">
                            <div class="nk-sidebar-menu" data-simplebar>
                                <ul class="nk-menu">
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="index1.php" class="nk-menu-link">
                                                <span class="nk-menu-icon">
                                                    <em class="icon ni ni-box"></em></span>
                                                <span class="nk-menu-text">Dashboard</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="quotation.php" class="nk-menu-link">
                                                <span class="nk-menu-icon">
                                                    <em class="icon ni ni-note-add"></em></span>
                                                <span class="nk-menu-text">Quotation</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="sales.php" class="nk-menu-link">
                                                <span class="nk-menu-icon">
                                                    <em class="icon ni ni-sign-inr"></em></span>
                                                <span class="nk-menu-text">Billing</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="customer.php" class="nk-menu-link">
                                                <span class="nk-menu-icon">
                                                    <em class="icon ni ni-user"></em></span>
                                                <span class="nk-menu-text">Customer</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="credit.php" class="nk-menu-link">
                                                <span class="nk-menu-icon">
                                                    <em class="icon ni ni-cc-alt"></em></span>
                                                <span class="nk-menu-text">Credit</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="invoice.php" class="nk-menu-link">
                                                <span class="nk-menu-icon">
                                                    <em class="icon ni ni-cards"></em></span>
                                                <span class="nk-menu-text">Orders</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="quotation_list.php" class="nk-menu-link">
                                                <span class="nk-menu-icon">
                                                    <em class="icon ni ni-cards"></em></span>
                                                <span class="nk-menu-text">Quotation List</span></a>
                                        </li>



                                        <li class="nk-menu-item">
                                            <a href="book.php" class="nk-menu-link">
                                                <span class="nk-menu-icon">
                                                    <em class="icon ni ni-book"></em>
                                                </span>
                                                <span class="nk-menu-text">Bikes Stock</span>
                                            </a>
                                        </li>

                                        <li class="nk-menu-item">
                                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                                <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
                                                <span class="nk-menu-text">Settings</span></a>
                                            <ul class="nk-menu-sub">
                                                <li class="nk-menu-item">
                                                    <a href="tax_discount.php" class="nk-menu-link">
                                                        <span class="nk-menu-icon">
                                                            <em class="icon ni ni-sign-inr"></em>
                                                        </span>
                                                        <span class="nk-menu-text">Tax & Discount</span>
                                                    </a>
                                                </li>
                                                <li class="nk-menu-item">
                                                    <a href="brand.php" class="nk-menu-link">
                                                        <span class="nk-menu-icon">
                                                            <em class="icon ni ni-truck"></em>
                                                        </span>
                                                        <span class="nk-menu-text">Brand</span>
                                                    </a>
                                                </li>

                                                <li class="nk-menu-item" hidden>
                                                    <a href="district.php" class="nk-menu-link">
                                                        <span class="nk-menu-icon">
                                                            <em class="icon ni ni-location"></em>
                                                        </span>
                                                        <span class="nk-menu-text">City</span>
                                                    </a>
                                                </li>

                                                <li class="nk-menu-item">
                                                    <a href="minimum_book_stock.php" class="nk-menu-link">
                                                        <span class="nk-menu-icon">
                                                            <em class="icon ni ni-box"></em>
                                                        </span>
                                                        <span class="nk-menu-text">Set Bikes Limit</span>
                                                    </a>
                                                </li>

                                            </ul>
                                        </li>


                                        <li class="nk-menu-item">
                                            <a href="expenses.php" class="nk-menu-link">
                                                <span class="nk-menu-icon">
                                                    <em class="icon ni ni-growth-fill"></em></span><span class="nk-menu-text">Expenses</span></a>
                                        </li>
                                        <?php if ($ft['role'] === 'Admin') { ?>
                                            <li class="nk-menu-item">
                                                <a href="#" class="nk-menu-link nk-menu-toggle">
                                                    <span class="nk-menu-icon"><em class="icon ni ni-reports"></em></span>
                                                    <span class="nk-menu-text">Reports</span></a>
                                                <ul class="nk-menu-sub">
                                                    <li class="nk-menu-item">
                                                        <a href="report1.php" class="nk-menu-link">
                                                            <span class="nk-menu-icon">
                                                                <em class="icon ni ni-sign-inr"></em></span>
                                                            <span class="nk-menu-text">Income Report</span></a>
                                                    </li>
                                                    <li class="nk-menu-item">
                                                        <a href="report2.php" class="nk-menu-link">
                                                            <span class="nk-menu-icon">
                                                                <em class="icon ni ni-files"></em></span>
                                                            <span class="nk-menu-text">Expenses Report</span></a>
                                                    </li>
                                                    <li class="nk-menu-item">
                                                        <a href="report3.php" class="nk-menu-link">
                                                            <span class="nk-menu-icon">
                                                                <em class="icon ni ni-cc-alt"></em></span>
                                                            <span class="nk-menu-text">Credit Report</span></a>
                                                    </li>
                                                </ul>
                                            </li>
                                        <?php
                                        }
                                        ?>
                                        <li class="nk-menu-item">
                                            <a href="logout.php" class="nk-menu-link">
                                                <span class="nk-menu-icon">
                                                    <em class="icon ni ni-signout"></em></span>
                                                <span class="nk-menu-text">Logout</span></a>
                                        </li>
                                        </li>

                                    </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-wrap">
                    <div class="nk-header nk-header-fixed">
                        <div class="container-fluid">
                            <div class="nk-header-wrap">
                                <div class="nk-header-logo ms-n1">
                                    <div class="nk-sidebar-toggle">
                                        <button class="btn btn-sm btn-icon btn-zoom sidebar-toggle d-sm-none">
                                            <em class="icon ni ni-menu"></em></button>
                                        <button class="btn btn-md btn-icon btn-zoom sidebar-toggle d-none d-sm-inline-flex">
                                            <em class="icon ni ni-menu"></em></button>
                                    </div>
                                    <div class="nk-navbar-toggle me-2">
                                        <!-- <button class="btn btn-sm btn-icon btn-zoom navbar-toggle d-sm-none">
        <em class="icon ni ni-menu-right"></em></button> -->
                                        <img src="images/logo-mobile.png" style="margin-left:10px">
                                        <button class="btn btn-md btn-icon btn-zoom navbar-toggle d-none d-sm-inline-flex">
                                            <em class="icon ni ni-menu-right"></em></button>
                                    </div>
                                    <a href="index1.php" class="logo-link">
                                        <div class="logo-wrap"></div>
                                    </a>
                                </div>
                                <nav class="nk-header-menu nk-navbar">
                                    </li>
                                    </li>
                                    </ul>
                                </nav>
                                <div class="nk-header-tools">
                                    <ul class="nk-quick-nav ms-2">
                                        <div class="dropdown-menu dropdown-menu-lg">
                                            <div class="dropdown-content dropdown-content-x-lg py-1">
                                                <div class="search-inline">
                                                    <div class="form-control-wrap flex-grow-1"><input placeholder="Type Query" type="text" class="form-control-plaintext"></div><em class="icon icon-sm ni ni-search"></em>
                                                </div>
                                            </div>
                                            <div class="dropdown-divider m-0"></div>
                                            <div class="dropdown-content dropdown-content-x-lg py-3">
                                                <div class="dropdown-title pb-2">
                                                    <h5 class="title">Recent searches</h5>
                                                </div>
                                                <ul class="dropdown-list gap gy-2">
                                                    <li>
                                                        <div class="media-group">
                                                            <div class="media media-sm media-middle media-circle text-bg-light"><em class="icon ni ni-clock"></em></div>
                                                            <div class="media-action media-action-end">
                                                                <button class="btn btn-md btn-zoom btn-icon me-n1"><em class="icon ni ni-trash"></em></button>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="media-group">
                                                            <div class="media media-sm media-middle media-circle text-bg-light"><em class="icon ni ni-clock"></em></div>
                                                            <div class="media-action media-action-end">
                                                                <button class="btn btn-md btn-zoom btn-icon me-n1"><em class="icon ni ni-trash"></em></button>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="media-group">
                                                            <div class="media media-sm media-middle media-circle text-bg-light"><img src="images/admin.png" alt=""></div>
                                                            <div class="media-text">
                                                                <span class="sub-text">Admin</span>
                                                            </div>
                                                            <div class="media-action media-action-end">
                                                                <button class="btn btn-md btn-zoom btn-icon me-n1"><em class="icon ni ni-trash"></em></button>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        </li>
                                        <button onclick="history.go(-1)" style="margin-right:30px;width:150px;height:40px;opacity:0.9;border-radius:30px;" class="btn btn-danger"><em class="icon ni ni-arrow-long-left" style="font-size:32px;"></em><span style="font-size:17px;">Go Back</span></button>
                                        <li class="dropdown"><a href="#" data-bs-toggle="dropdown">
                                                <div class="d-none d-sm-flex">
                                                    <div class="d-sm-none">
                                                        <div class="media media-sm media-circle"><img src="uploads/<?= $ft['image']; ?>" alt="" class="img-thumbnail"></div>
                                                    </div>
                                                    <div class="media media-circle"><img src="uploads/<?= $ft['image']; ?>" alt="" class="img-thumbnail"></div>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-md">
                                                    <div class="dropdown-content dropdown-content-x-lg py-3 border-bottom border-light">
                                                        <div class="media-group">
                                                            <div class="media media-xl media-middle media-circle"><img src="uploads/<?= $ft['image']; ?>" alt="" class="img-thumbnail"></div>

                                                            <div class="media-text">
                                                                <div class="lead-text"><?= $ft['name']; ?></div>
                                                                <span class="sub-text"><?= $ft['role']; ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown-content dropdown-content-x-lg py-3 border-bottom border-light">
                                                        <ul class="link-list">
                                                            <li><a href="view-user.php?id=<?= $_SESSION['user_id']; ?>"><em class="icon ni ni-user"></em>
                                                                    <span>My Profile</span></a></li>
                                                            <?php if ($ft['name'] == "Admin") {
                                                            ?>
                                                                <li><a href="changepassword.php">
                                                                        <em class="icon ni ni-setting-alt"></em>
                                                                        <span>Change Password</span></a>
                                                                </li>
                                                            <?php
                                                            } ?>
                                                        </ul>
                                                    </div>
                                                    <div class="dropdown-content dropdown-content-x-lg py-3">
                                                        <ul class="link-list">
                                                            <li><a href="logout.php">
                                                                    <em class="icon ni ni-signout"></em>
                                                                    <span>Log Out</span></a></li>
                                                            </form>
                                                        </ul>
                                                    </div>
                                                </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </html>
<?php
} else {
    echo "No user found!";
    exit;
}
?>

<?php
$select_book_count = mysqli_query($conn, "SELECT * FROM minimum_book_stock where id=1");
if (mysqli_num_rows($select_book_count) > 0) {
    $fett_min_count = mysqli_fetch_assoc($select_book_count);
}
?>