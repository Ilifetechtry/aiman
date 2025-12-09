<?php include 'sidebar.php'?>
<body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg" style="margin-top:50px">
<?php 
    $sel=mysqli_query($conn,"SELECT* FROM users WHERE id='".$_GET['id']."' ");
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
        <div class="nk-block-head-content"><h2 class="nk-block-title">View User</h1><nav></nav></div>
    <div class="nk-block-head-content"><ul class="d-flex">
        <li><a href="user.php" class="btn btn-primary btn-md d-md-none"><em class="icon ni ni-eye"></em><span>View</span></a></li>
    <li><button onclick="history.go(-1)" class="btn btn-danger">Back</button></li></ul></div></div></div>
    <div class="nk-block">
<div class="row g-gs">
<div class="col-xxl-12 mt-5">
<div class="gap gy-4">
<div class="gap-col">
<div class="card card-gutter-md">
<div class="card-body">
<div class="row g-gs">
<div class="col-lg-3" style="align-self:center">
    <img src=<?=$fe['image'];?> style="border-radius:20px;box-shadow:2px 2px 10px black" height="160px" width="130px">
</div>
<div class="col-lg-3">
<b style="color:red"><?=$fe['role'];?><br></b>    
<?=$fe['name'];?><br>
<?=$fe['mobile_num'];?><br>
<?=$fe['email'];?><br><br>
<a href="<?=$fe['proof'];?>" target="blank"  class="btn btn-outline-dark mt-3">View Proof</a>
</div>
<div class="col-lg-3">    
    <?=$fe['gender'];?><br>
    <?=$fe['age'];?><br><br><br>
    <a href="<?=$fe['resume'];?>" target="blank" class="btn btn-outline-dark mt-5">View Resume</a>
</div>
<div class="col-lg-3">
<?=$fe['city'];?><br>    
<?=$fe['pincode'];?><br>   
<?=$fe['remarks'];?><br>   
    </div>
    </div>


</html>
<script src="assets/js/bundle.js"></script>
<script src="assets/js/scripts.js"></script>
<link rel="stylesheet" href="assets/css/libs/editors/quill20d4.css?v1.1.2"></link><script src="assets/js/libs/editors/quill.js"></script><script src="assets/js/editors/quill.js"></script>