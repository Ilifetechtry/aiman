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
<div class="nk-block-head-content"><h2 class="nk-block-title">Credit</h2><nav><ol class="breadcrumb breadcrumb-arrow mb-0"><li class="breadcrumb-item"><a href="#">Home</a></li><li class="breadcrumb-item active" aria-current="page">Credit</li></ol></nav></div>
<div class="nk-block-head-content">
    <ul class="d-flex">
</ul></div></div></div>
<div class="nk-block-head-content"><ul class="d-flex"></ul>
<div class="nk-block">
<div class="card">
<table class="datatable-init table" data-nk-container="table-responsive">
<thead class="table-light">
<tr>
<th class="tb-col"><span class="overline-title">Invoice Id</span></th>
<th class="tb-col"><span class="overline-title">Customer Name</span></th>
<th class="tb-col"><span class="overline-title">Date</span></th>
<th class="tb-col tb-col-md"><span class="overline-title">Due Amount</span></th>
<th class="tb-col tb-col-md"><span class="overline-title">Paid Amount</span></th>
<th class="tb-col"><span class="overline-title">Remaining Amount</span></th>
<th class="tb-col"><span class="overline-title">Action</span></th>
</tr>
</thead>
<tbody>
<?php      
    $sel=mysqli_query($conn,"SELECT * FROM credit");
    if(mysqli_num_rows($sel)>0){
        while($fe=mysqli_fetch_assoc($sel)){
            $c=$fe['due_amount']-$fe['balance_amount'];
?>            




<?php 
if($fe['balance_amount']!=0){
?>
<tr>
<td class="tb-col title">#<?=$fe['bill_id'];?>
<a href="credit1.php?id=<?=$fe['bill_id'];?>"><span style="margin-left:10px;background:#42b2e3;padding:3px 20px;color:white;border-radius:4px;font-size:15px;font-weight:700;">History</span></a>
</td>
<td class="tb-col title"><?=$fe['cname'];?></td>
<td class="tb-col"><span><?php echo date("d-m-Y", strtotime($fe['date']));?></span></td>
<td class="tb-col"><span><?=$fe['due_amount'];?></span></td>
<td class="tb-col"><?=$c;?>.00</td>
<td class="tb-col"><span><?=$fe['balance_amount']?>.00</span></td>
 <td class="tb-col"><a href="pay-credit.php?id=<?=$fe['bill_id'];?>"><span class="btn btn-primary btn-sm" style="font-size:11px!important"><b>PAY NOW</b></a></span></td>
</tr>
<?php
}
else{
    ?>
    <tr>
    <td class="tb-col title">#<?=$fe['bill_id'];?>
<a href="credit1.php?id=<?=$fe['bill_id'];?>"><span style="margin-left:10px;background:#42b2e3;padding:3px 20px;color:white;border-radius:4px;font-size:15px;font-weight:700;">History</span></a>
</td>
<td class="tb-col title"><?=$fe['cname'];?></td>
<td class="tb-col"><span><?php echo date("d-m-Y", strtotime($fe['date']));?></span></td>
<td class="tb-col"><span>--</span></td>
<td class="tb-col">--</td>
<td class="tb-col"><span>--</span></td>
    <td class="tb-col"><a href="#"><span style="margin-left:10px;background:#1db220;padding:3px 20px;color:white;border-radius:4px;font-size:13px;font-weight:700;"><b>PAID</b></a></span></td>
</tr>
    <?php
}
?>
   
    <?php
        }
    }
?>
  
</div>
</div>
</form>
</body>
<script src="assets/js/bundle.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="assets/js/data-tables/data-tables.js"></script>
</html>