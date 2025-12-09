<?php 
include 'sidebar.php';

if(isset($_POST['submit'])){
    $sel1=mysqli_query($conn,"SELECT * FROM brand where brand='".$_POST['brand']."'");
    if(mysqli_num_rows($sel1)>0){
        ?>
        <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Already Added',
                    confirmButtonColor: 'red',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "brand.php";
                    }
                }); 
        </script>
        <?php
    }
    else{
        $ins=mysqli_query($conn,"INSERT INTO brand (brand) values ('".$_POST['brand']."')");
        ?>
        <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Added Successfully',
                    confirmButtonText: 'OK',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "brand.php";
                    }
                }); 
        </script>
        <?php
    }

}
?>

<body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg" style="margin-top:50px">
<div class="nk-app-root">
<div class="nk-main">
<div class="nk-content">
<div class="container">
<div class="nk-content-inner">
<div class="nk-content-body">
<div class="nk-block-head">
    <div class="nk-block-head-between flex-wrap gap g-2">
        <div class="nk-block-head-content">
            <h2 class="nk-block-title">Brand</h2>
            <nav>
                <ol class="breadcrumb breadcrumb-arrow mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Settings</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Brand</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<form method="post">
        <div class="col-12">
            <div class="row">
            <div class="col-7">     
            </div>
            <div class="col-3">
                <input  name="brand" type="text" class="form-control" placeholder="Enter Place" style="border:1px solid silver" required>
            </div>
            <div class="col-2">
                <button class="btn btn-primary w-100" name='submit'>
                    <i class='ni ni-plus'></i>Add Brand
                </button>
            </div>
            </div>
            
        </div>
    </form>
<div class="nk-block-head-content"><ul class="d-flex"></ul>
<div class="nk-block">
<div class="card">
    
<table class="datatable-init table" data-nk-container="table-responsive">
<thead class="table-light">
<tr>
<th class="tb-col"><span class="overline-title">SI NO</span></th>
<th class="tb-col"><span class="overline-title">brand</span></th>
<th class="tb-col tb-col-center"><span class="overline-title">action</span></th>
</tr>
</thead>
<tbody>
<?php      
    $sel=mysqli_query($conn,"SELECT * FROM brand order by id desc");
    $i=0;
    if(mysqli_num_rows($sel)>0){
        while($fe=mysqli_fetch_assoc($sel)){
?>            
        <tr>
<td class="tb-col title"><?=++$i;?></td>
<td class="tb-col tb-col-md"><span><?=$fe['brand']?></span></td>
<td class="tb-col tb-col-xl tb-col-center">
            
        <a href="javascript:void(0);" onclick="confirmDelete(<?= $fe['id']; ?>)">
            <em style="color:red; font-size:20px" class="icon ni ni-trash"></em>
        </a>
</td>
</tr>
<?php
        }
    }   
?>
<br><br>
</div>
</div>
</form>
</body>
<script>
    let delete_url='delete-brand.php?id=';
</script>
<?php
    include 'common/sweet_confirm.php';
?>
<script src="assets/js/bundle.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="assets/js/data-tables/data-tables.js"></script>
</html>

<style>
    #add_place{
        color:white;
    }
    #add_place:hover{
        color:white;
    }
    #add_place:active{
        color:white;
    }
    #add_place:focus{
        color:white;
    }
</style>
