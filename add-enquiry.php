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
        <h2 class="nk-block-title">Add Customer</h1>
        <nav><ol class="breadcrumb breadcrumb-arrow mb-0">
            <li class="breadcrumb-item">
            <a href="#">Home</a></li>
            <li class="breadcrumb-item">
            <a href="#">Customer</a></li>
            <li class="breadcrumb-item">
            <a href="#">Enquiry</a></li>
            <li class="breadcrumb-item">
            <a href="#">Add Enquiry</a></li>
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
<div class="col-lg-12 form-label" style="font-size:16px;font-weight:700;">&nbsp;Enquiry</div>
<div class="col-lg-6">
<div class="form-group"><label for="name" class="form-label">Name<spam>*</spam></label>
<div class="form-control-wrap">
<input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" required/>
</div></div></div>
<div class="col-lg-6">
<div class="form-group"><label for="date" class="form-label">Date<spam>*</spam></label>
<div class="form-control-wrap">
    <input type="date" class="form-control" id="date" name="date" value="<?=date('Y-m-d');?>" required></div></div></div>
    <div class="col-lg-6">
<div class="form-group"><label for="category" class="form-label">Business Type<spam>*</spam></label>
<div class="form-control-wrap">
<select class="form-select" name="b_type" id="b_type" required>
        <option hidden selected><center>--SELECT--</center></option>
        <option value="Retail">Retail</option>
        <option value="Wholesale">Wholesale</option>
    </select>   
</div></div></div>

<div class="col-lg-6">
<div class="form-group"><label for="category" class="form-label">Quantity<spam>*</spam></label>
<div class="form-control-wrap">
<input type="number" class="form-control" id="date" name="quantity" placeholder="Quantity" required></div></div></div>

<div class="col-lg-6">
<div class="form-group"><label for="mobile_num" class="form-label">Mobile<spam>*</spam></label>
<div class="form-control-wrap">
<input type="tel" class="form-control" pattern="^[0-9]{10}$"  id="mobile_num" name="mobile" placeholder="Enter your mobile number" required></div></div></div>

<div class="col-lg-6">
<div class="form-group"><label for="mobile_num" class="form-label">Email</label>
<div class="form-control-wrap">
<input type="email" class="form-control"  id="mobile_num" name="email" placeholder="Enter your email address"></div></div></div>
<div class="col-lg-6">
<div class="form-group"><label for="address" class="form-label">Address<spam>*</spam></label>
<div class="form-control-wrap">
    <input class="form-control" id="address" name="address" placeholder="Enter your address"></div></div></div>
<div class="col-lg-6">
<div class="form-group"><label for="address" class="form-label">Remarks<spam>*</spam></label>
<div class="form-control-wrap">
    <input class="form-control" id="remarks" name="remarks" placeholder="Enter your remarks"></div></div></div>
    <div class="col-lg-3">
    <input type="submit" name="save" class="btn btn-primary" style="margin-left:4%;margin-bottom:20px;margin-top:20px;" value="Save Changes"></div></form>
</body>
</html>
<?php
    if(isset($_POST['save'])){
        $ins=mysqli_query($conn,"INSERT INTO enquiry (name,email,b_type,quantity ,mobile,date,address,remarks) values 
    ('".$_POST['name']."','".$_POST['email']."',
    '".$_POST['b_type']."','".$_POST['quantity']."',
    '".$_POST['mobile']."','".$_POST['date']."',
    '".$_POST['address']."','".$_POST['remarks']."')");
?>    
<script>location.href='enquiry.php'</script>
<?php
    }
?>