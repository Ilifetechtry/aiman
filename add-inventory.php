<?php include 'sidebar.php';?>

<body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg"style="margin-top:40px">
<script src="assets/js/bundle.js"></script><script src="assets/js/scripts.js"></script>

<div class="nk-content">
<div class="container">
<div class="nk-content-inner">
<div class="nk-content-body">
<div class="nk-block-head">
<div class="nk-block-head-between flex-wrap gap g-2">
<div class="nk-block-head-content"><h2 class="nk-block-title">Add Inventory</h1>
<nav>
    <ol class="breadcrumb breadcrumb-arrow mb-0">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Inventory</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Inventory</li>
    </ol>
</nav>
</div>
<div class="nk-block-head-content"><ul class="d-flex"><li>
    <a href="inventory.php" class="btn btn-primary btn-md d-md-none">
        <em class="icon ni ni-eye"></em><span>View</span></a></li><li>
    <a href="inventory.php" class="btn btn-success d-none d-md-inline-flex"><em class="icon ni ni-eye"></em><span>View All Inventory</span></a></li>
    </ul></div></div></div>
<div class="nk-block">
<?php
$pc=mysqli_query($conn,"SELECT max(id)+1 from inventory");
$pcq = mysqli_fetch_array($pc);
$bill_number = $pcq[0];
if(isset($_POST['submit'])){
        $target_dir = "uploads/";
        $target_file2 = $target_dir . basename($_FILES["upload_media"]["name"]);
        $check2 = getimagesize($_FILES["upload_media"]["tmp_name"]);
        if($check1 !== false && $check2 !== false){
            if(move_uploaded_file($_FILES["upload_media"]["tmp_name"],$target_file2)){
                $ins=mysqli_query($conn,"INSERT INTO inventory (mid,operator_name,
                machine_name,category ,
                remarks,upload_media) VALUES 
                ('".$_POST['mid']."','".$_POST['operator_name']."',
                '".$_POST['machine_name']."','".$_POST['category']."',
                '".$_POST['remarks']."','".$target_file2."')");
?>
            <script>location.href="inventory.php"</script>
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
<div class="col-lg-12">
<div class="form-group"><label for="ecomid" class="form-label">Machine ID</label>
<div class="form-control-wrap">
    <input required type="text" class="form-control" value="<?="INVID-".$bill_number ;?>" name="mid" placeholder="Enter Machine Id"></div></div></div>
<div class="col-lg-12">
    <div class="form-group"><label for="productname" class="form-label">Operator Name</label>
<div class="form-control-wrap">
    <input required type="text" class="form-control" id="productname" name="operator_name" placeholder="Operator Name"></div></div></div>

<div class="col-lg-6">
<div class="form-group"><label for="baseprice" class="form-label">Machine Name</label>
<div class="form-control-wrap">
    <input required type="text" class="form-control" id="baseprice" name="machine_name" placeholder="Machine Name"></div></div></div>
<div class="col-lg-6">
<div class="form-group"><label for="tax-class" class="form-label">Category</label>
<div class="form-control-wrap">
    <select class="form-select" id="tax-class" name="category" data-search="true" data-sort="false">
        <option selected hidden>Select an option</option>
        <option value="Grinding Machine">Grinding Machine</option>
        <option value="Milling Machine">Milling Machine</option>
        <option value="Drilling Machine">Drilling Machine</option>
    </select></div></div></div>
<div class="col-lg-12">
<div class="form-group"><label class="form-label">Remarks</label>
<div class="form-control-wrap">
<div class="form-group">
<textarea class="form-control" name="remarks" ></textarea></div>
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
<input required  id="upload_media" name="upload_media" type="file" max="1">
<label for="upload_media" class="btn btn-md btn-primary">Upload Image</label> 
<div class="form-note mt-3">Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted.</div>   
</div></div></div></div></div>
<div class="gap-col"><ul class="d-flex align-items-center gap g-3">
    <li></li></ul></div></div></div></div></div></div>
<div><input required type="submit" name="submit" class="btn btn-primary" style="margin-left:4%;margin-bottom:20px;margin-top:20px;" value="Save Changes"></div></form>
</div></div></div>

</body>
</html>