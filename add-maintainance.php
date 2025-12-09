<?php include 'sidebar.php';?>
<body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg"style="margin-top:40px">
<script src="assets/js/bundle.js"></script><script src="assets/js/scripts.js"></script>

<div class="nk-content">
<div class="container">
<div class="nk-content-inner">
<div class="nk-content-body">
<div class="nk-block-head">
<div class="nk-block-head-between flex-wrap gap g-2">
<div class="nk-block-head-content"><h2 class="nk-block-title">Add Service</h1>
<nav>
    <ol class="breadcrumb breadcrumb-arrow mb-0">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Maintainance</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Service</li>
    </ol>
</nav>
</div>
<div class="nk-block-head-content"><ul class="d-flex"><li>
    <a href="maintainance.php" class="btn btn-primary btn-md d-md-none">
        <em class="icon ni ni-eye"></em><span>View</span></a></li><li>
    <a href="maintainance.php" class="btn btn-success d-none d-md-inline-flex"><em class="icon ni ni-eye"></em><span>View All Maintainance</span></a></li>
   </ul></div></div></div>
<div class="nk-block">
<?php

if(isset($_POST['submit'])){
        $target_dir = "uploads/";
        $target_file2 = $target_dir . basename($_FILES["machine_photo"]["name"]);
        $check2 = getimagesize($_FILES["machine_photo"]["tmp_name"]);
        if($check1 !== false && $check2 !== false){
            if(move_uploaded_file($_FILES["machine_photo"]["tmp_name"],$target_file2)){
                $ins=mysqli_query($conn,"INSERT INTO maintainance(mid,operator,
                charge,mos,complaints ,date ,machine_photo) VALUES 
                ('".$_POST['mid']."','".$_POST['operator']."','".$_POST['charge']."',
                '".$_POST['mos']."','".$_POST['complaints']."',
                '".$_POST['date']."','".$target_file2."')");
?>
            <script>location.href="maintainance.php"</script>
<?php
                
                }
            }
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
<div class="form-group"><label for="mid" class="form-label">Machine ID</label>
<div class="form-control-wrap">
    <input required type="text" class="form-control" value="#MID" name="mid" id="mid" placeholder="Enter Your Bill Id" minlength="5"></div></div></div>
<div class="col-lg-6">
<div class="form-group"><label for="tax-class" class="form-label">Operator Name</label>
<div class="form-control-wrap">
<input required type="text" name="operator" class="form-control" placeholder="Enter Operator name">
</div></div></div>
<div class="form-control-wrap">
<div class="col-lg-12">
<div class="form-group"><label class="form-label">Date</label>
<input required type="date" name="date" value="<?=date('Y-m-d');?>" class="form-date form-control"></div></div></div>
<div class="col-lg-6">
<div class="form-group"><label for="charge" class="form-label">Charge</label>
<div class="form-control-wrap">
    <input required type="text" class="form-control" id="charge" name="charge" placeholder="Total price"></div></div></div>
<div class="col-lg-6">
<div class="form-group"><label for="tax-class" class="form-label">Mode Of Service</label>
<div class="form-control-wrap">
    <select class="js-select" id="tax-class" name="mos" data-search="true" data-sort="false">
        <option selected hidden>Select an option</option>
        <option value="Service">Service</option>
        <option value="Oil Changing">Oil Changing</option>
        <option value="Painting">Painting</option>
    </select></div></div></div>

<div class="col-lg-12">
<div class="form-group"><label class="form-label">Complaints</label>
<div class="form-control-wrap">
<div class="form-group">
    <center><textarea class="form-control" name="complaints" ></textarea></center></div>
</div></div></div>
<div class="col-lg-12">
<div class="form-group">

</div></div></div></div></div></div>
<div class="gap-col">
<div class="card card-gutter-md">
<div class="card-body">
<div class="form-group"><label class="form-label">Machine Photo</label>
<div class="form-control-wrap">
</div>
<div class="pt-3">
<input required  id="machine_photo" name="machine_photo" type="file" max="1">
<label for="machine_photo" class="btn btn-md btn-primary">Upload Image</label> 
<div class="form-note mt-3">Set the humbnail image. Only *.png, *.jpg and *.jpeg image files are accepted.</div>   
</div></div></div></div></div>
<div class="gap-col"><ul class="d-flex align-items-center gap g-3">
    <li></li></ul></div></div></div></div></div></div>
<div><input required type="submit" name="submit" class="btn btn-primary" style="margin-left:4%;margin-bottom:20px;margin-top:20px;" value="Save Changes"></div></form>
</div></div></div>

</body>
</html>