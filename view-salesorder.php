<?php include 'sidebar.php'?>
<body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg"style="margin-top:40px">
<?php 
    $sel=mysqli_query($conn,"SELECT* FROM salesorder WHERE id='".$_GET['id']."' ");
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
    <div class="nk-block-head-content">
        <h2 class="nk-block-title">View Order</h1>
        <nav><ol class="breadcrumb breadcrumb-arrow mb-0">
            <li class="breadcrumb-item">
            <a href="#">Home</a></li>
            <li class="breadcrumb-item">
            <a href="#">Order</a></li>
            <li class="breadcrumb-item">
            <a href="#">View Order</a></li>
        </ol></nav></div>
<div class="nk-block-head-content"><ul class="d-flex">
    <li>&nbsp;&nbsp;<button onclick="history.go(-1)" class="btn btn-danger">Back</button></li></ul></div></div></div>

<div class="nk-block">
        <form method="post"  enctype="multipart/form-data">
        <div class="row g-gs">
        <div class="col-xxl-12">
        <div class="gap gy-4">
        <div class="gap-col">
        <div class="card card-gutter-md">
        <div class="card-body">
        <div class="row g-gs">
        <div class="col-lg-6">
        <div class="form-group"><label class="form-label">Bill ID</label>
    <div class="form-control-wrap"><input readonly type="text" class="form-control" name="mid" value=<?=$fe['bid'];?>></div></div></div>
    <div class="col-lg-6">
        <div class="form-group"><label class="form-label">Vendor Name</label>
    <div class="form-control-wrap"><input readonly type="text" class="form-control" name="machine_name" value=<?=$fe['vendor_name'];?>></div></div></div>
    
    <div class="col-lg-6">
        <div class="form-group"><label class="form-label">Vendor Charge</label>
    <div class="form-control-wrap"><input readonly type="text" class="form-control"  name="operator_name" value=<?=$fe['vendor_charge'];?>></div></div></div>
    <div class="col-lg-6">
        <div class="form-group"><label class="form-label">Date</label>
    <div class="form-control-wrap"><input readonly type="text" class="form-control"  name="operator_name" value=<?=$fe['date'];?>></div></div></div>
 
    <div class="col-lg-6">
        <div class="form-group"><label class="form-label" >Vendor Address</label>
    <div class="form-control-wrap">
       <textarea name="remarks" class="form-control" readonly><?=$fe['vendor_address'];?></textarea></div></div></div>

       <div class="col-lg-6">
        <div class="form-group"><label class="form-label" >Remarks</label>
    <div class="form-control-wrap">
       <textarea name="remarks" class="form-control" readonly><?=$fe['remarks'];?></textarea></div></div></div>
</div></div></div>
</form></div></div></div></div></div>
    
    </div></div></div></div></div></div>
    </body>
    <script src="assets/js/bundle.js"></script>
        <script src="assets/js/scripts.js"></script>
<link rel="stylesheet" href="assets/css/libs/editors/quill20d4.css?v1.1.2"></link><script src="assets/js/libs/editors/quill.js"></script><script src="assets/js/editors/quill.js"></script>
</html>