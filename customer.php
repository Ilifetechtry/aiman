<?php include 'sidebar.php';?>
<style>
    table{
        font-size:17px!important;
    }
</style>
<body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg" style="margin-top:50px">
<div class="nk-content">
    <div class="container">
    <div class="nk-content-inner">
    <div class="nk-content-body">
    <div class="nk-block-head">
    <div class="nk-block-head-between flex-wrap gap g-2">
    <div class="nk-block-head-content">
        <h2 class="nk-block-title">Customer List</h1>
        <nav><ol class="breadcrumb breadcrumb-arrow mb-0">
            <li class="breadcrumb-item">
            <a href="#">Home</a></li>
            <li class="breadcrumb-item">
            <a href="#">Customer</a></li>
        </ol></nav></div>
<div class="nk-block-head-content"><ul class="d-flex"><li>
    <a href="#" class="btn btn-md d-md-none btn-primary"><em class="icon ni ni-plus"></em><span>Create</span></a></li>
    <li><a href="add-customer.php" class="btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Add Customer</span></a></li></ul></div></div></div>
<div class="nk-block">
    <div class="card">
        <table class="datatable-init table" data-nk-container="table-responsive">
            <thead class="table-light">
        <tr>
            
        <th class="tb-col tb-col-start"><span class="overline-title">S No</span></th>
        <th class="tb-col tb-col-start"><span class="overline-title">Customer #</span></th>
        <th class="tb-col tb-col-start"><span class="overline-title">Customer Name</span></th>
    
    <th class="tb-col"><span class="overline-title">phone</span></th>
    <th class="tb-col"><span class="overline-title">date</span></th>
    <th class="tb-col"><span class="overline-title">category</span></th>
    <?php if($ft['crm']==1){ ?><th class="tb-col"><span class="overline-title">action</span></th><?php }?>
</tr></thead><tbody>
    <?php
    $c=1;
    $sel=mysqli_query($conn,"SELECT * FROM customer ORDER BY id desc");
    if(mysqli_num_rows($sel)>0){
        while($fe=mysqli_fetch_assoc($sel)){
            ?>
            <tr>
                <td class="tb-col"><?=$c++;?></td>
                <td class="tb-col">WNCID-<?=$fe['id'];?></td>
                <td class="tb-col"><?=$fe['cname'];?></td>
                <td class="tb-col"><span><?=$fe['mobile'];?></span></td>
                <td class="tb-col tb-col-xl"><span><?php echo date("d-m-Y", strtotime($fe['date']));?></span></td>
                <td class="tb-col tb-col-xl"><span><?=$fe['city'];?></span></td>

        <?php if($ft['crm']==1){ ?>
        <td class="tb-col tb-col-xl">
            <a href="view-customer.php?id=<?=$fe['id'];?>">
            <em style="color:black;font-size:20px" class="icon ni ni-eye"></em>
            <a href="edit-customer.php?id=<?=$fe['id'];?>">
            <em style="color:#1db220;font-size:20px" class="icon ni ni-edit"></em>
            <a href="javascript:void(0);" onclick="confirmDelete(<?= $fe['id']; ?>)">
                <em style="color:red; font-size:20px" class="icon ni ni-trash"></em>
            </a>
        </td>
<?php        }
        }
    }
?>    
</tbody></table></div></div></div></div></div></div>
    <div class="container-fluid">
    <div class="nk-footer-wrap">
    <div class="nk-footer-links"></div></div></div></div></div></div></div></body>

    <script>
        let delete_url='delete-customer.php?id=';
    </script>
    <?php
        include 'common/sweet_confirm.php';
    ?>
    <script src="assets/js/bundle.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/data-tables/data-tables.js"></script>

</html>
