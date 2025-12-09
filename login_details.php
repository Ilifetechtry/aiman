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
<div class="nk-block-head-content"><h2 class="nk-block-title">Last Login Details</h2>
<nav>
    <ol class="breadcrumb breadcrumb-arrow mb-0">
        <li class="breadcrumb-item">
    <a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Admin Panel</li>
    <li class="breadcrumb-item active" aria-current="page">Last Login Details</li>
</ol></nav></div>
<div class="nk-block-head-content">
    <ul class="d-flex">
    
    <li>&nbsp;&nbsp;<button onclick="history.go(-1)" class="btn btn-danger">Back</button></li></ul></div></div></div>
<div class="nk-block-head-content"><ul class="d-flex"></ul>
<div class="nk-block">
<div class="card">
<table class="datatable-init table" data-nk-container="table-responsive">
<thead class="table-light">
<tr>
<th class="tb-col"><span class="overline-title">Username</span></th>
<th class="tb-col"><span class="overline-title">Photo</span></th>
<th class="tb-col"><span class="overline-title">Ip Adress</span></th>
<th class="tb-col"><span class="overline-title">Last Login Date</span></th>
<th class="tb-col"><span class="overline-title">Last Login Time</span></th>
</tr>
</thead>
<tbody>
<?php      
    $sel=mysqli_query($conn,"SELECT * FROM users where age!='' && gender!='' && email !='' ORDER BY (CONCAT(date, ' ', time,'')) desc");
    if(mysqli_num_rows($sel)>0){
        while($fe=mysqli_fetch_assoc($sel)){
?>            
        <tr>

            <td class="tb-col tb-col-md"><b><?=$fe['user_name']?></b></td>
            <td class="tb-col"><div class="media media-md media-middle"><a href="view-user.php?id=<?=$fe['id'];?>"><img src=<?=$fe['image'];?> height="40px" max-width="30px"></a></div></td>
<td class="tb-col"><span><?=$fe['ipaddress'];?></span></div>
<td class="tb-col tb-col-md"><span><?=$fe['date']?></span></td>
<td class="tb-col tb-col-md"><span><?=$fe['time']?></span></td>


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