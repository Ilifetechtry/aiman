<?php include 'sidebar.php';?>
<style>
    spam{
        color:red;
    }
</style>

<body class="nk-body" style="margin-top:35px" data-sidebar-collapse="lg" data-navbar-collapse="lg">
<script src="assets/js/bundle.js"></script>
<script src="assets/js/scripts.js"></script>
<div class="nk-content">
    <div class="container">
    <div class="nk-content-inner">
    <div class="nk-content-body">
    <div class="nk-block-head">
    <div class="nk-block-head-between flex-wrap gap g-2">
    <div class="nk-block-head-content">
        <h2 class="nk-block-title">Add District</h1>
        <nav><ol class="breadcrumb breadcrumb-arrow mb-0">
            <li class="breadcrumb-item">
            <a href="#">Home</a></li>
            <li class="breadcrumb-item">
            <a href="#">District</a></li>
            <li class="breadcrumb-item">
            <a href="#">Add District</a></li>
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

<div class="col-lg-5">
<div class="form-group"><label for="city" class="form-label">District<spam>*</spam></label>
<div class="form-control-wrap">
<input type="text" class="form-control" name="district" placeholder="Enter your district">
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <div class="col-lg-3">
    <input type="submit" name="save" class="btn btn-primary" style="margin-left:4%;margin-bottom:20px;margin-top:20px;" value="Add District"></div></form>
</body>
</html>
<?php
    if(isset($_POST['save'])){

                $insert1=mysqli_query($conn,"INSERT into district
                (district) values 
                ('".$_POST['district']."')"); 
?>    
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href="district.php";
                    }
                }); 
            </script>
<?php
            }
?>