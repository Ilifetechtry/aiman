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
<div class="nk-block-head-content"><h2 class="nk-block-title">Expenses</h2><nav><ol class="breadcrumb breadcrumb-arrow mb-0"><li class="breadcrumb-item"><a href="#">Home</a></li><li class="breadcrumb-item active" aria-current="page">Expenses</li></ol></nav></div>
<div class="nk-block-head-content">
    <ul class="d-flex">
    <li><a href="add-expenses.php" class="btn btn-primary btn-md d-md-none">
        <em class="icon ni ni-plus"></em><span>Add</span></a></li>
    <li><a href="add-expenses.php" class="btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em>
        <span>Add Expenses</span></a></li></ul></div></div></div>
<div class="nk-block-head-content"><ul class="d-flex"></ul>
<div class="nk-block">
<div class="card">
<table class="datatable-init table" data-nk-container="table-responsive">
<thead class="table-light">
<tr>
<th class="tb-col"><span class="overline-title">SI No</span></th>
<th class="tb-col"><span class="overline-title">Type</span></th>
<th class="tb-col"><span class="overline-title">Brand</span></th>
<th class="tb-col"><span class="overline-title">Bill Id</span></th>
<th class="tb-col"><span class="overline-title">Bill Photo</span></th>
<th class="tb-col"><span class="overline-title">Bill Name</span></th>
<th class="tb-col"><span class="overline-title">Price</span></th>
<th class="tb-col"><span class="overline-title">Date</span></th>
<th class="tb-col"><span class="overline-title">Status</span></th>
<th class="tb-col tb-col-end p-auto" data-sortable="false"><span class="overline-title">action</span></th>
</tr>
</thead>
<tbody>
<?php      
    $sel=mysqli_query($conn,"SELECT * FROM expenses");
    $i=1;
    if(mysqli_num_rows($sel)>0){
        while($fe=mysqli_fetch_assoc($sel)){
?>            
        <tr>
<td class="tb-col title"><?=$i++;?></td>
<td class="tb-col title text-capitalize"><?=$fe['type'];?></td>
<td class="tb-col title text-capitalize"><?=$fe['brand'];?></td>
<td class="tb-col title"><?=$fe['bid'];?></td>
<?php if($fe['upload_media']!=''){?>
<td class="tb-col tb-col-md">
<a href="view-expenses.php?id=<?=$fe['id'];?>">
<img src="<?=$fe['upload_media'];?>" height="60px" width="60px">
</a>
</td>
<?php }else if($fe['upload_media']==''){?>
<td class="tb-col tb-col-md">
<a href="view-expenses.php?id=<?=$fe['id'];?>">
<img src="images/slider/a.jpg" height="60px" width="60px">
</a>
</td>
<?php } ?>
<td class="tb-col tb-col-md"><span><?=$fe['name']?></span></td>
<td class="tb-col tb-col-md"><span><?=$fe['price']?></span></td>
<td class="tb-col tb-col-md"><span><?php echo date("d-m-Y", strtotime($fe['date']));?></span></td>
<td class="tb-col tb-col-md">
    <?php if($fe['active'] == 1) { ?>
        <button class="btn btn-success btn-sm toggle-status" data-id="<?= $fe['id']; ?>" data-status="1">
            Active
        </button>
    <?php } else { ?>
        <button class="btn btn-danger btn-sm toggle-status" data-id="<?= $fe['id']; ?>" data-status="0">
            Lock
        </button>
    <?php } ?>
</td>
<td class="tb-col tb-col-xl tb-col-end">
        <a href="view-expenses.php?id=<?=$fe['id'];?>">
        <em style="color:blue;font-size:20px" class="icon ni ni-eye"></em></a>
        <a href="edit-expenses.php?id=<?=$fe['id'];?>">
        <em style="color:#1db220;font-size:20px" class="icon ni ni-edit"></em></a>
        <a href="javascript:void(0);" onclick="confirmDelete(<?= $fe['id']; ?>)">
            <em style="color:red; font-size:20px" class="icon ni ni-trash"></em>
        </a>
</td>
</tr>

<?php
        }
    }   
?>
<script>
    let delete_url='delete-expenses.php?id=';
</script>
<?php
    include 'common/sweet_confirm.php';
?>
<script>
$(document).on("click", ".toggle-status", function () {

    let id = $(this).data("id");
    let currentStatus = $(this).data("status");
    let newStatus = currentStatus == 1 ? 0 : 1;
    let button = $(this);
    console.log('ID:', id, 'Current Status:', currentStatus, 'New Status:', newStatus);
    $.ajax({
        url: "update-expenses-status.php",
        type: "POST",
        data: { id: id, status: newStatus },
        success: function (response) {
            if (newStatus == 1) {
                button.removeClass("btn-danger").addClass("btn-success").text("Active");
            } else {
                button.removeClass("btn-success").addClass("btn-danger").text("Lock");
            }
            button.data("status", newStatus);
        }
    });
});
</script>

<br><br>
</div>
</div>
</form>
</body>
<script src="assets/js/bundle.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="assets/js/data-tables/data-tables.js"></script>
</html>