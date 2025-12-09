<?php include 'sidebar.php';?>
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
    <h2 class="nk-block-title">Tax & Discount</h2>
    <nav>
        <ol class="breadcrumb breadcrumb-arrow mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Settings</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tax & Discount</li>
        </ol>
    </nav>
</div>
<div class="nk-block-head-content">
    <ul class="d-flex">

    <li><a href="add-settings.php" class="btn btn-primary btn-md d-md-none">
        <em class="icon ni ni-plus"></em><span>Add</span></a></li>
    
    <li><a href="add-settings.php" class="btn btn-primary btn-md d-md-none">
            <em class="icon ni ni-plus"></em><span>Add</span></a></li>
    <li>&nbsp;&nbsp;<button onclick="history.go(-1)" class="btn btn-danger">Back</button></li></ul></div></div></div>
<div class="nk-block-head-content"><ul class="d-flex"></ul>
<div class="nk-block">
<div class="card">
<table class="datatable-init table" data-nk-container="table-responsive">
<thead class="table-light">
<tr>
<th class="tb-col"><span class="overline-title">SI NO</span></th>
<th class="tb-col"><span class="overline-title">Tax</span></th>
<th class="tb-col"><span class="overline-title">Discount</span></th>
<th class="tb-col"><span class="overline-title">SGST</span></th>
<th class="tb-col"><span class="overline-title">CGST</span></th>
<th class="tb-col tb-col-end"><span class="overline-title">action</span></th>
</tr>
</thead>
<tbody>
<?php      
    $sel=mysqli_query($conn,"SELECT * FROM settings");
    $i=0;
    if(mysqli_num_rows($sel)>0){
        while($fe=mysqli_fetch_assoc($sel)){
?>            
        <tr>
<td class="tb-col title"><?=++$i;?></td>
<td class="tb-col tb-col-md"><span><?=$fe['tax']?></span></td>
<td class="tb-col tb-col-md"><span><?=$fe['discount']?></span></td>
<td class="tb-col tb-col-md"><span><?=$fe['sgst']?></span></td>
<td class="tb-col tb-col-md"><span><?=$fe['cgst']?></span></td>
<td class="tb-col tb-col-xl tb-col-end">
        <a href="edit_tax_discount.php?id=<?=$fe['id'];?>">
            <em style="color:#1db220;font-size:20px" class="icon ni ni-edit"></em>
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
<script src="assets/js/bundle.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="assets/js/data-tables/data-tables.js"></script>
</html>