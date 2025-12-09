<?php include 'sidebar.php';?>
<body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg"style="margin-top:40px">
<script src="assets/js/bundle.js"></script><script src="assets/js/scripts.js"></script>

<div class="nk-content">
<div class="container">
<div class="nk-content-inner">
<div class="nk-content-body">
<div class="nk-block-head">
<div class="nk-block-head-between flex-wrap gap g-2">
<div class="nk-block-head-content"><h2 class="nk-block-title">Add Labour</h1>
<nav>
    <ol class="breadcrumb breadcrumb-arrow mb-0">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Labour</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Labour</li>
    </ol>
</nav>
</div>
<div class="nk-block-head-content"><ul class="d-flex"><li>
    <a href="labour.php" class="btn btn-primary btn-md d-md-none">
        <em class="icon ni ni-eye"></em><span>View</span></a></li><li>
    <a href="labour.php" class="btn btn-success d-none d-md-inline-flex"><em class="icon ni ni-eye"></em><span>View All Labour</span></a></li>
   </ul></div></div></div>
<div class="nk-block">
<?php
if(isset($_POST['submit'])){
        $ins=mysqli_query($conn,"INSERT INTO labour (labour_name,labour_price) VALUES 
        ('".$_POST['labour_name']."','".$_POST['labour_price']."')");
?>
            <script>location.href="labour.php"</script>
<?php
                
        }
?>
<form action="#" method="post" enctype="multipart/form-data">
<div class="row g-gs">
<div class="col-xxl-12">
<div class="gap gy-4">
<div class="gap-col">
<div class="card card-gutter-md">
<div class="card-body">
<div class="row g-gs">
<div class="col-lg-6">
    <div class="form-group"><label for="labourname" class="form-label">Labour Name</label>
<div class="form-control-wrap">
    <input required type="text" class="form-control" id="labourname" name="labour_name" placeholder="Labour Name"></div></div></div>
<div class="col-lg-6">
<div class="form-group"><label for="baseprice" class="form-label">Labour Price</label>
<div class="form-control-wrap">
    <input required type="text" class="form-control" id="baseprice" name="labour_price" placeholder="Labour Price"></div></div></div>
    </div>
    </div>
    </div>
    </div>
</div></div></div>
<br>
    <input type="submit" name="submit" class="btn btn-primary" style="" value="Save Changes"></div></form>
</div></div></div>
</body>
</html>