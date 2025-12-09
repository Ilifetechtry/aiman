<?php include 'sidebar.php'?>
<body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg" style="margin-top:40px">
<?php 
    $sel=mysqli_query($conn,"SELECT* FROM expenses WHERE id='".$_GET['id']."' ");
    if(mysqli_num_rows($sel)>0){
        $fe=mysqli_fetch_assoc($sel);
    }
?>
<style>
    spam{
        color:red;
    }
    li,h2{
        text-transform:capitalize;
    }
</style>
<div class="nk-content">
        <div class="container">
        <div class="nk-content-inner">
        <div class="nk-content-body">
        <div class="nk-block-head">
        <div class="nk-block-head-between flex-wrap gap g-2">
        <div class="nk-block-head-content"><h2 class="nk-block-title">View expenses</h1><nav><ol class="breadcrumb breadcrumb-arrow mb-0"><li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">expenses</li>
        <li class="breadcrumb-item active" aria-current="page">View expenses</li>
    </ol></nav></div>
    <div class="nk-block-head-content"><ul class="d-flex">
        <li><a href="expenses.php" class="btn btn-primary btn-md d-md-none"><em class="icon ni ni-eye"></em><span>View</span></a></li>
</ul></div></div></div>
    <div class="nk-block">
<form method="post" enctype="multipart/form-data">
        <div class="row g-gs">
        <div class="col-xxl-12">
        <div class="gap gy-4">
        <div class="gap-col">
        <div class="card card-gutter-md">
        <div class="card-body">
        <div class="row g-gs">

    <div class="col-lg-4">
    <div class="form-group"><label class="form-label">Bill Name <spam>*</spam>        
    </label>
    <div class="form-control-wrap"><input type="text" class="form-control"  name="name" value="<?=$fe['name'];?>" readonly></div></div></div>
    <div class="col-lg-4">
        <div class="form-group"><label class="form-label">Bill Price <spam>*</spam></label>
    <div class="form-control-wrap"><input type="text" class="form-control" placeholder="Total price" name="price" value="<?=$fe['price'];?>" readonly>
    </div></div></div>
    <div class="col-lg-4">
        <div class="form-group"><label class="form-label">Date <spam>*</spam></label>
    <div class="form-control-wrap"><input type="date" class="form-control" placeholder="Total price" name="date" value="<?=$fe['date'];?>" readonly>
    </div></div></div>

    <div class="col-lg-12">
    <div class="form-group"><label class="form-label">Remarks</label>
    <div class="form-control-wrap">
        <textarea name="remarks" id="" class="form-control" readonly><?=$fe['remarks'];?></textarea>
    </div></div></div>
    
    <div class="gap-col">
    <label class="form-label">Bill Photo</label>
<div class="card card-gutter-md">
<div class="card-body" style='background:#ecfaff;'>
<div class="form-group">
<div class="form-control-wrap">
</div>
<center><img src="<?=$fe['upload_media'];?>" height="150px" width="180px">
</center>

    </div></div></div>
    </div></div></div>
    </div></div>
</form></div></div></div>
        </body>
        <script src="assets/js/bundle.js"></script>
        <script src="assets/js/scripts.js"></script>            
<link rel="stylesheet" href="assets/css/libs/editors/quill20d4.css?v1.1.2"></link>
<script src="assets/js/libs/editors/quill.js"></script>
<script src="assets/js/editors/quill.js"></script>
</html>
