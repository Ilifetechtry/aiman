<?php include 'sidebar.php';?>
<?php
$select=mysqli_query($conn,"SELECT * from customer where id='".$_GET['id']."'");
        if(mysqli_num_rows($select)>0){
            $fe=mysqli_fetch_assoc($select);
        }
?>
<body class="nk-body" style="margin-top:30px" data-sidebar-collapse="lg" data-navbar-collapse="lg">
<script src="assets/js/bundle.js"></script>
<script src="assets/js/scripts.js"></script>
<div class="nk-content">
    <div class="container">
    <div class="nk-content-inner">
    <div class="nk-content-body">
    <div class="nk-block-head">
    <div class="nk-block-head-between flex-wrap gap g-2">
    <div class="nk-block-head-content">
        <h2 class="nk-block-title">View Customer</h1>
        <nav><ol class="breadcrumb breadcrumb-arrow mb-0">
            <li class="breadcrumb-item">
            <a href="#">Home</a></li>
            <li class="breadcrumb-item">
            <a href="#">Customer</a></li>
            <li class="breadcrumb-item">
            <a href="#">View Customer</a></li>
        </ol></nav></div>
<div class="nk-block-head-content"><ul class="d-flex">
</ul></div></div></div>
<form method="post" enctype="multipart/form-data">
<div class="row g- new" id="new">
<div class="col-xxl-12">
<div class="gap gy-4">
<div class="gap-col">
<div class="card card-gutter-md">
<div class="card-body">
<div class="row g-gs">
<div class="col-lg-12 form-label" style="font-size:16px;font-weight:700;">&nbsp;Customer</div>
<div class="col-lg-3">
<div class="form-group"><label for="name" class="form-label">Name</label>
<div class="form-control-wrap">
<input type="text" class="form-control" name="name" value=<?=$fe['cname'];?> id="name" readonly/>
</div></div></div>
<div class="col-lg-3">
<div class="form-group"><label for="date" class="form-label">Date</label>
<div class="form-control-wrap">
    <input type="text" class="form-control" value=<?=$fe['date'];?> id="date" name="date"  readonly></div></div></div>
    
<div class="col-lg-3">
<div class="form-group"><label for="mobile_num" class="form-label">Mobile</label>
<div class="form-control-wrap">
<input type="text" class="form-control" maxlength="10" id="mobile_num" name="mobile_num" value=<?=$fe['mobile'];?> readonly></div></div></div>

    <div class="col-lg-3">
<div class="form-group"><label for="remarks" class="form-label">Place</label>
<div class="form-control-wrap">
<input type="text" class="form-control" maxlength="10" id="mobile_num" name="mobile_num" value=<?=$fe['city'];?> readonly>
</div></div></div>
</div> 
</body>
</html>
