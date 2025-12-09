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
<div class="nk-block-head-content"><h2 class="nk-block-title">Bike</h2><nav><ol class="breadcrumb breadcrumb-arrow mb-0"><li class="breadcrumb-item"><a href="#">Home</a></li><li class="breadcrumb-item active" aria-current="page">Bike</li></ol></nav></div>
<div class="nk-block-head-content">
    <ul class="d-flex">
    <li><a href="add-book.php" class="btn btn-primary btn-md d-md-none">
        <em class="icon ni ni-plus"></em><span>Add</span></a></li>
    <li><a href="add-book.php" class="btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em>
        <span>Add Bike</span></a></li>
    <li><a href="add-book.php" class="btn btn-primary btn-md d-md-none">
            <em class="icon ni ni-plus"></em><span>Add</span></a></li></ul></div></div></div>
<div class="nk-block-head-content"><ul class="d-flex"></ul>
<div class="nk-block">
<div class="card">
<table class="datatable-init table" data-nk-container="table-responsive">
<thead class="table-light">
<tr>
<th class="tb-col"><span class="overline-title">Bike Id</span></th>
<th class="tb-col"><span class="overline-title">Bike Image</span></th>
<th class="tb-col"><span class="overline-title">Bike Name</span></th>
<th class="tb-col"><span class="overline-title">Bike Stock</span></th>
<th class="tb-col"><span class="overline-title">Bike Price</span></th>
<?php if($ft['inventory']==1){?><th class="tb-col tb-col-end p-auto" data-sortable="false"><span class="overline-title">action</span></th><?php }?>
</tr>
</thead>
<tbody>
<?php      
    $sel=mysqli_query($conn,"SELECT * FROM book order by id desc");
    $i=0;
    if(mysqli_num_rows($sel)>0){
        while($fe=mysqli_fetch_assoc($sel)){
?>            
        <tr>
<td class="tb-col title"><?=++$i;?></td>
<td class="tb-col tb-col-md">
    <?php
    if($fe['book_image']){
    ?>       
        <img src="uploads/<?=$fe['book_image']?>" alt="" height='70'>
    <?php
    }
    else{
        ?>
        <img src="images/default.jpg" alt="" height='100' style='border:1px solid silver'>
    <?php
    }
    ?>
</td>
<td class="tb-col tb-col-md"><span><?=$fe['book_name']?></span></td>
<td class="tb-col tb-col-md">
    <?php
    if($fe['book_stock']<=$fett_min_count['minimum_book_stock']){
        ?>
        <b class='text-danger animate'><?=$fe['book_stock']?></b>
        <?php
    }
    else{
        ?>
        <b class='text-success'><?=$fe['book_stock']?></b>
        <?php
    }
    ?>
    
</td>

<td class="tb-col tb-col-md"><span>Rs.<?=$fe['book_price']?></span></td>
<?php if($ft['inventory']==1){?>
    <td class="tb-col tb-col-xl tb-col-end">
        <a href="view-book.php?id=<?=$fe['id'];?>"><em style="color:blue;font-size:20px" class="icon ni ni-eye"></em>
        <a href="edit-book.php?id=<?=$fe['id'];?>"><em style="color:#1db220;font-size:20px" class="icon ni ni-edit"></em>
        <a href="javascript:void(0);" onclick="confirmDelete(<?= $fe['id']; ?>)">
            <em style="color:red; font-size:20px" class="icon ni ni-trash"></em>
        </a>
    </td>
<?php }?>
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
    let delete_url='delete-book.php?id=';
</script>
<?php
    include 'common/sweet_confirm.php';
?>


<script src="assets/js/bundle.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="assets/js/data-tables/data-tables.js"></script>
</html>