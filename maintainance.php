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
<div class="nk-block-head-content"><h2 class="nk-block-title">Maintainance</h2><nav><ol class="breadcrumb breadcrumb-arrow mb-0"><li class="breadcrumb-item"><a href="#">Home</a></li><li class="breadcrumb-item active" aria-current="page">Maintainance</li></ol></nav></div>
<div class="nk-block-head-content">
    <ul class="d-flex">
    <li><a href="add-maintainance.php" class="btn btn-primary btn-md d-md-none">
        <em class="icon ni ni-plus"></em><span>Add</span></a></li>
        <?php if($ft['service']==1){ ?><li><a href="add-maintainance.php" class="btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em>
        <span>Add Service</span></a></li><li><a href="add-maintainance.php" class="btn btn-primary btn-md d-md-none">
            <em class="icon ni ni-plus"></em><span>Add</span></a></li><?php }?>
    <li>&nbsp;&nbsp;<button onclick="history.go(-1)" class="btn btn-danger">Back</button></li></ul></div></div></div>
<div class="nk-block-head-content"><ul class="d-flex"></ul>
<div class="nk-block">
<div class="card">
<form method="post">

    <input type="hidden" name="ate" id="ate" value="0">
<table class="datatable-init table" data-nk-container="table-responsive">
<thead class="table-light">
<tr>
<th class="tb-col tb-col-check" data-sortable="false">
<div class="form-check"><input class="form-check-input" type="checkbox" value=""></div></th>
<th class="tb-col"><span class="overline-title">MACHINE Id</span></th>
<th class="tb-col"><span class="overline-title">MAchine Photo</span></th>
<th class="tb-col"><span class="overline-title">Service Done</span></th>
<th class="tb-col tb-col-md"><span class="overline-title">Service Date</span></th>
<th class="tb-col tb-col-md"><span class="overline-title">Charge</span></th>
<th class="tb-col"><span class="overline-title">Status</span></th>
<?php if($ft['service']==1){ ?><th class="tb-col tb-col-end p-auto" data-sortable="false"><span class="overline-title">action</span></th><?php }?>
</tr>
</thead>
<tbody>
<?php      
    $sel=mysqli_query($conn,"SELECT * FROM maintainance");
    if(mysqli_num_rows($sel)>0){
        while($fe=mysqli_fetch_assoc($sel)){
?>            
        <tr>
    <td class="tb-col tb-col-check">
<div class="form-check">
    <input class="form-check-input" type="checkbox" value="" id="pid1"></div></td>
<td class="tb-col title"><?=$fe['mid'];?></td>
<td class="tb-col title">
<div class="media-group">
<div class="media media-md media-middle"><a href="edit-maintainance.php?id=<?=$fe['id'];?>"><img src=<?=$fe['machine_photo'];?> height="40px" max-width="30px"></a></div>
</div></td>
<td class="tb-col tb-col-xl">
        <?php if($fe['mos']=="Service" ||$fe['mos']=="service"  ){
?>
        <span class="badge text-bg-danger-soft"><?=$fe['mos'];?></span>
<?php       
}        
?>
<?php 
        if($fe['mos']=="Painting" || $fe['mos']=="painting"){
?>
        <span class="badge text-bg-success-soft"><?=$fe['mos'];?></span>
<?php
}       
?>
<?php 
        if($fe['mos']=="Oil Changing" || $fe['mos']=="Oil Changing"){
?>
        <span class="badge text-bg-warning-soft"><?=$fe['mos'];?></span>
<?php
}       
?>
</td>
<td class="tb-col tb-col-md"><span><?=$fe['date']?></span></td>
<td class="tb-col tb-col-md"><span><?=$fe['charge']?></span></td>
<?php if($fe['ate']==0){ ?>
<td class="tb-col">
    <a class="badge bg-dark text-white" href="form_maintain.php?id=<?=$fe['id'];?>">Add to Expenses</a>
</td>
<?php }
else{
    ?>
    <td class="tb-col">
    <a class="badge bg-dark text-white" href="form_maintain1.php?id=<?=$fe['id'];?>">Remove From Expenses</a>
</td>
<?php
}
?>
<?php if($ft['service']==1){ ?>
<td class="tb-col tb-col-end">
<div class="dropdown"><a href="#" class="btn btn-sm btn-icon btn-zoom me-n1" data-bs-toggle="dropdown">
    <em class="icon ni ni-more-v"></em></a>
    
<div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
<div class="dropdown-content py-1">
    <ul class="link-list link-list-hover-bg-primary link-list-md">
        <li>
            <a href="view-maintainance.php?id=<?=$fe['id'];?>">
            <em class="icon ni ni-eye"></em>
            <span>View Details</span>
            <a href="edit-maintainance.php?id=<?=$fe['id'];?>">
            <em class="icon ni ni-edit"></em>
            <span>Edit</span></a>
            <a id="hi" href="delete-maintainance.php?id=<?=$fe['id'];?>" onclick="return confirm('Are you sure want to delete this bill')">
            <em class="icon ni ni-trash"></em>
            <span>Delete</span></a></li><li> 
                </a>
            </li>
        </ul>
    </div>
</div>
</div>
</td>
<?php
if(isset($_POST['submit'])){
    $ins=mysqli_query($conn,"UPDATE maintainance set ate='".$_POST['ate']."' where id='".$fe['id']."'");
    echo "UPDATE maintainance set ate='".$_POST['ate']."' where id='".$fe['id']."'";
    die;
    }
}
?>
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


<script>
    $(document).ready(function(){
        $(".ate").click(function(){
            $(".ate").toggleClass("hi");
            if($(".ate").hasClass("hi")){
                if(confirm("Are you want to add this in expenses")){
                    $("#ate").val("1")
                }
                else{
                    $("#ate").val("0")
                    return false;
                }                
            }
            else{
                $("#ate").val("0")
            }
        })
        
    })
</script>