<?php include 'sidebar.php';?>
<style>
    spam{
        color:red;
    }
</style>
<?php
$select=mysqli_query($conn,"SELECT * from customer where id='".$_GET['id']."'");
        if(mysqli_num_rows($select)>0){
            $fe=mysqli_fetch_assoc($select);
        }

?>
<body class="nk-body" style="margin-top:30px" data-sidebar-collapse="lg" data-navbar-collapse="lg">
<script src="assets/js/bundle.js"></script>
<script src="assets/js/scripts.js"></script>
<div class="nk-content">
    <div class="container">
    <div class="nk-content-inner">
    <div class="nk-content-body">
    <div class="nk-block-head">
    <div class="nk-block-head-between flex-wrap gap g-2">
    <div class="nk-block-head-content">
        <h2 class="nk-block-title">Edit Customer</h1>
        <nav><ol class="breadcrumb breadcrumb-arrow mb-0">
            <li class="breadcrumb-item">
            <a href="#">Home</a></li>
            <li class="breadcrumb-item">
            <a href="#">Customer</a></li>
            <li class="breadcrumb-item">
            <a href="#">CRM</a></li>
            <li class="breadcrumb-item">
            <a href="#">Edit Customer</a></li>
        </ol></nav></div>
<div class="nk-block-head-content"><ul class="d-flex"></ul></div></div></div>   
<form method="post" enctype="multipart/form-data">
<div class="row g- new" id="new">
<div class="col-xxl-12">
<div class="gap gy-4">
<div class="gap-col">
<div class="card card-gutter-md">
<div class="card-body">
<div class="row g-gs">

<div class="col-lg-4">
<div class="form-group"><label for="name" class="form-label">Name<spam>*</spam></label>
<div class="form-control-wrap">
<input type="text" class="form-control" name="cname" value=<?=$fe['cname'];?> id="name"/>
</div></div></div>
<!-- <div class="col-lg-3">
<div class="form-group"><label for="date" class="form-label">Date<spam>*</spam></label>
<div class="form-control-wrap"> -->
<input type="date" class="form-control" id="date" name="date"  value="<?=date('Y-m-d');?>" hidden>
<!-- </div></div></div> -->
<div class="col-lg-4">
<div class="form-group"><label for="category" class="form-label">Place<spam>*</spam></label>
<div class="form-control-wrap">
<select id="districtSelect" class="form-select" name="city">
	<option value=<?=$fe['city'];?> selected hidden><?=$fe['city'];?></option>													
	<?php
		$sel=mysqli_query($conn,"SELECT * FROM district order by district");
		if(mysqli_num_rows($sel)>0){
			while($fd=mysqli_fetch_array($sel)){
		?>
	    <option value="<?=$fd['district'];?>"><?=$fd['district'];?></option>
		<?php
			}
		}
    ?>
</select>
</div></div></div>
<div class="col-lg-4">
<div class="form-group"><label for="mobile_num" class="form-label">Mobile<spam>*</spam></label>
<div class="form-control-wrap">
<input type="tel" class="form-control" pattern="^[0-9]{10}$"  id="mobile_num" name="mobile" value=<?=$fe['mobile'];?>>
</div></div></div>
    </div></div></div></div>
    </div>
    <div class="col-lg-3">
    <input type="submit" name="save" class="btn btn-primary" style="margin-left:4%;margin-bottom:20px;margin-top:20px;" value="Edit"></div></form>
</body>
</html>
<?php
    if(isset($_POST['save'])){
        $upd=mysqli_query($conn,"UPDATE customer
                set cname='".$_POST['cname']."',
                mobile='".$_POST['mobile']."',
                place='".$_POST['city']."'
                where id='".$_GET['id']."'");
?>    
<script>location.href='customer.php'</script>
<?php
        }
?>