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
<div class="nk-block-head-content"><h2 class="nk-block-title">Users List</h2>
<nav>
    <ol class="breadcrumb breadcrumb-arrow mb-0">
        <li class="breadcrumb-item">
    <a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Admin Panel</li></ol></nav></div>
<div class="nk-block-head-content">
    <ul class="d-flex">
    <li><a href="add-user.php" class="btn btn-primary btn-md d-md-none">
        <em class="icon ni ni-plus"></em><span>Add</span></a></li>
        <li><a href="add-user.php" class="btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em>
        <span>Add User</span></a></li>
        <li><a href="add-user.php" class="btn btn-primary btn-md d-md-none">
            <em class="icon ni ni-plus"></em><span>Add</span></a></li>
    <li>&nbsp;&nbsp;<button onclick="history.go(-1)" class="btn btn-danger">Back</button></li></ul></div></div></div>
<div class="nk-block-head-content"><ul class="d-flex"></ul>
<div class="nk-block">
<div class="card">
<table class="datatable-init table" data-nk-container="table-responsive">
<thead class="table-light">
<tr>

<th class="tb-col"><span class="overline-title">Name</span></th>
<th class="tb-col"><span class="overline-title">UserName</span></th>
<th class="tb-col"><span class="overline-title">Password</span></th>
<th class="tb-col"><span class="overline-title">Role</span></th>
<th class="tb-col"><span class="overline-title">Photo</span></th>
<th class="tb-col tb-col-lg"><span class="overline-title">Email ID</span></th>
<th class="tb-col"><span class="overline-title">Mobile</span></th>
<th class="tb-col tb-col-end p-auto" data-sortable="false"><span class="overline-title">action</span></th>
</tr>
</thead>
<tbody>
<?php      
    $sel=mysqli_query($conn,"SELECT * FROM users where age!='' && gender!='' && email !='' ORDER BY id asc");
    if(mysqli_num_rows($sel)>0){
        while($fe=mysqli_fetch_assoc($sel)){
?>            
        <tr>

<td class="tb-col">
        <div class="media-group">
            <div class="media-text"><a href="view-user.php?id=<?=$fe['id'];?>" class="title"><?=$fe['name'];?></a></div></div></td>
            <td class="tb-col tb-col-md"><span><?=$fe['user_name']?></span>
        <?php if($fe['block']==1){?><span class="badge text-bg-dark"><a href="user-permit.php?id=<?=$fe['id'];?>" class="text-white">Blocked</a></span><?php }?></td>
<td class="tb-col tb-col-md"><span><?=$fe['password']?></span></td>

            <td class="tb-col tb-col-md text-danger"><span><b><?=$fe['role']?></b></span></td>
<td class="tb-col"><div class="media media-md media-middle"><a href="user-permit.php?id=<?=$fe['id'];?>"><img src=<?=$fe['image'];?> height="40px" max-width="30px"></a></div></td>

<td class="tb-col tb-col-md"><span><?=$fe['email']?></span></td>

<td class="tb-col"><span><?=$fe['mobile_num']?></span></td>

<td class="tb-col tb-col-end">
<div class="dropdown"><a href="#" class="btn btn-sm btn-icon btn-zoom me-n1" data-bs-toggle="dropdown">
    <em class="icon ni ni-more-v"></em></a>
<div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
<div class="dropdown-content py-1">
    <ul class="link-list link-list-hover-bg-primary link-list-md">
        <li>
            <a href="view-user.php?id=<?=$fe['id'];?>">
            <em class="icon ni ni-eye"></em>
            <span>View Details</span>
            <a href="edit-user.php?id=<?=$fe['id'];?>">
            <em class="icon ni ni-edit"></em>
            <span>Edit</span></a>
            <a id="hi" onclick="myFun()">
            <em class="icon ni ni-trash"></em>
            <span>Delete</span></a>
            </a>
            <a href="user-permit.php?id=<?=$fe['id'];?>">
            <em class="icon ni ni-lock"></em>
            <span>User Permission</span></a></li><li> 
                </a>
            </li>
        </ul>
    </div>
</div>
</div>
</td>
</tr>
<script>
    function myFun(){
        if(confirm("Are you sure want to delete")){
            location.href="delete-user.php?id=<?=$fe['id'];?>";
        }
    }
</script>
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