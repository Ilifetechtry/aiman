<?php include 'sidebar.php';?>
<body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg" style="margin-top:35px">
<div class="nk-content">
    <div class="container">
    <div class="nk-content-inner">
    <div class="nk-content-body">
    <div class="nk-block-head">
    <div class="nk-block-head-between flex-wrap gap g-2">
    <div class="nk-block-head-content">
        <h2 class="nk-block-title">All Invoice List</h1>
        <nav><ol class="breadcrumb breadcrumb-arrow mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Procurement</a></li>
            <li class="breadcrumb-item"><a href="#">Invoice</a></li>
        </ol></nav></div>
        <div class="nk-block-head-content"><ul class="d-flex"><li>
    
</ul></div></div></div>
</div></div>
<div class="nk-block">
    <div class="card">
        <table class="datatable-init table" data-nk-container="table-responsive">
            <thead class="table-light">
        <tr>
            <th class="tb-col tb-col-check" data-sortable="false">
    <div class="form-check"><input class="form-check-input" type="checkbox" value=""></div></th>
    <th class="tb-col "><span class="overline-title">customer id</span></th>
    <th class="tb-col "><span class="overline-title">customer name</span></th>
    <th class="tb-col "><span class="overline-title">product id</span></th>
    <th class="tb-col "><span class="overline-title">product</span></th>
    <th class="tb-col "><span class="overline-title">amount</span></th>
    <th class="tb-col "><span class="overline-title">date</span></th>
    <th class="tb-col "><span class="overline-title">status</span></th>
    <th class="tb-col "><span class="overline-title">Mode of payment</span></th>
    <th class="tb-col tb-col-end" data-sortable="false"><span class="overline-title">Action</span></th>
</tr></thead><tbody>
    <?php
    $sel=mysqli_query($conn,"SELECT * FROM user_details  where uid='".$_GET['id']."'");
    if(mysqli_num_rows($sel)>0){
        while($fe=mysqli_fetch_assoc($sel)){
            $c=$fe['product_description'];
            ?>
            <tr>
            <td class="tb-col tb-col-check">
    <div class="form-check"><input class="form-check-input" type="checkbox" value=""></div></td>
    <td class="tb-col"><span>CID<?=$fe['uid'];?></span></td>
    <td class="tb-col"><span><?=$fe['name'];?></span></td>
    <td class="tb-col">
        <a href="#" class="text-light"><?=$fe['product_id'];?></a></td>
        <td class="tb-col"><span><?=$c;?></span></td>
        <td class="tb-col"><span><?=$fe['price'];?></span></td>
        <td class="tb-col tb-col-xl"><span><?=$fe['date'];?></span></td>
        <td class="tb-col tb-col-xl">
        <?php if($fe['status']=="Wholesale" || $fe['status']=="wholesale"){
?>
        <span class="badge text-bg-primary-soft"><?=$fe['status'];?></span>
<?php       
}        
?>
<?php 
        if($fe['status']=="Retail" || $fe['status']=="retail" ){
?>
        <span class="badge text-bg-success-soft"><?=$fe['status'];?></span>
<?php
}       
?>
<td class="tb-col tb-col-xl">
        <?php if($fe['mop']=="UPI"){
?>
        <span class="badge text-bg-danger-soft"><?=$fe['mop'];?></span>
<?php       
}        
?>
<?php 
        if($fe['mop']=="Cash" || $fe['mop']=="cash"){
?>
        <span class="badge text-bg-info-soft"><?=$fe['mop'];?></span>
<?php
}       
?>
<?php 
        if($fe['mop']=="Credit" || $fe['mop']=="credit"){
?>
        <span class="badge text-bg-warning-soft"><?=$fe['mop'];?></span>
<?php
}       
?>
</td>
        <td class="tb-col tb-col-end">
    <div class="d-flex justify-content-end gap g-2">

<div class="gap-col">
    <a href="billing-invoice2.php?id=<?=$fe['check_id'];?>" class="btn btn-sm btn-lighter">Preview</a></div></div></td></tr>
    
<?php        }
    }
?>    
    
    
</tbody></table></div></div></div></div></div></div>
</body>
<script src="assets/js/bundle.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="assets/js/data-tables/data-tables.js"></script>
</html>
