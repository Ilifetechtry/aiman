<?php include 'sidebar.php'?>
<body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg" style="margin-top:40px">
<?php 
    $sel=mysqli_query($conn,"SELECT* FROM quotation WHERE id='".$_GET['id']."' ");
    if(mysqli_num_rows($sel)>0){
        $fe=mysqli_fetch_assoc($sel);
    }
?>

<div class="nk-content">
        <div class="container">
        <div class="nk-content-inner">
        <div class="nk-content-body">
        <div class="nk-block-head">
        <div class="nk-block-head-between flex-wrap gap g-2">
        <div class="nk-block-head-content"><h2 class="nk-block-title">View Quotation</h1><nav><ol class="breadcrumb breadcrumb-arrow mb-0"><li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Order</li>
        <li class="breadcrumb-item active" aria-current="page">View Quotation</li>
    </ol></nav></div>
    <div class="nk-block-head-content"><ul class="d-flex">
        <li><a href="quotation.php" class="btn btn-primary btn-md d-md-none"><em class="icon ni ni-eye"></em><span>View</span></a></li>
        <li>&nbsp;&nbsp;<button onclick="history.go(-1)" class="btn btn-danger">Back</button></li></ul></div></div></div>
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
        <div class="form-group"><label class="form-label">Quotation ID</label>
    <div class="form-control-wrap"><input type="text" class="form-control"  name="bid" value=<?=$fe['qid'];?> readonly></div></div></div>
    
    <div class="col-lg-6">
        <div class="form-group"><label class="form-label">Quotationer Mobile Number</label>
    <div class="form-control-wrap"><input type="text" class="form-control" placeholder="Total price" name="charge" value=<?=$fe['q_mob'];?> readonly>
    </div></div></div>
    <div class="col-lg-12">
        <div class="form-group"><label class="form-label">Date</label>
    <div class="form-control-wrap"><input type="date" class="form-control" placeholder="Total price" name="date" value=<?=$fe['date'];?> readonly> 
    </div></div></div>
    
    <div class="col-lg-12">
        <div class="form-group"><label class="form-label">Quotationer Address</label>
    <div class="form-control-wrap">
        <textarea class="form-control" name="address" readonly><?=$fe['q_address'];?></textarea><br></div></div></div>
    <div class="col-lg-12">
        <div class="form-group"><label class="form-label">Invoice To</label>
    <div class="form-control-wrap">
        <textarea class="form-control" name="remarks" readonly><?=$fe['remarks'];?></textarea><br></div></div></div>
        
    <div class="col-lg-12">
        <div class="form-group">
    </div></div>


    
<div class="gap-col text-center" style="margin-top:40px"><ul class="d-flex align-items-center gap g-3">
        </ul></div>
</form></div></div></div>
        </body>
        <script src="assets/js/bundle.js"></script>
        <script src="assets/js/scripts.js"></script>            
<link rel="stylesheet" href="assets/css/libs/editors/quill20d4.css?v1.1.2"></link>
<script src="assets/js/libs/editors/quill.js"></script>
<script src="assets/js/editors/quill.js"></script>
</html>
